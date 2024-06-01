<?php

namespace SlimSlider;

use SlimSlider\CtpMeta\Data;
use SlimSlider\PostType\SlimSlide;

class Slides
{
    use Asset;

    /**
     * Define Version.
     */
    public const VERSION = '0.8.6';

    /**
     * Shortcode $args.
     *
     * @var array
     */
    protected $args = [];

    /**
     * Start here.
     *
     * @param array $args uses shortcode $atts.
     */
    public function __construct( array $args )
    {
        $this->args         = $args;
        $this->args['fill'] = $this->fillmode();
    }

    /**
     * Init.
     *
     * @param array $args uses shortcode $atts.
     *
     * @return Slides
     */
    public static function init( array $args ): self
    {
        return new self( $args );
    }

    /**
     * Get the Slider.
     */
    public function get()
    {
        if ( empty( $this->get_slides() ) ) {
            return false;
        }

        return $this;
    }

    /**
     * Output the Slider.
     */
    public function output(): void
    {
        /**
         * Enqueue the slider assets.
         */
        wp_enqueue_style( 'slim-slider', Asset::uri() . '/css/slimslider.css', [], self::VERSION, 'all' );
        wp_enqueue_script( 'slim-slider-jssor', Asset::uri() . '/js/slim.jssor.slider.min.js', [ 'jquery' ], self::VERSION, true );
        wp_enqueue_script( 'slim-slider', Asset::uri() . '/js/slimslider.js', [ 'slim-slider-jssor' ], self::VERSION, true );

        // pass on options to slimslider.js.
        wp_localize_script( 'slim-slider', 'SlimSliderData', $this->options() );

        echo $this->slider_main();
    }

    /**
     * Get The Slide.
     *
     * Get meta data for the current slide.
     *
     * @param int $id the slide ID.
     *
     * @return array|false
     */
    protected function slide_data( int $id )
    {
        if ( ! get_post( $id ) ) {
            return false;
        }

        $slide = new Data( 'slimslide' );

        return $slide->meta( $id, 'slide_meta' );
    }

    /**
     * Setup the main slider.
     *
     * @return string
     */
    protected function slider_main(): string
    {
        if ( slimslide_php8_version_check() ) {
            if ( current_user_can( 'manage_options' ) ) {
                return slimslide_php8_version_check();
            }

            return false;
        }

        // PHP8.0 fix The percentage sign (%) inside the style attributes needs to be escaped
        // as %% to avoid conflicts with sprintf, which uses % for placeholders.
        return sprintf(
            '<div id="slimslider_%6$s" style="position:relative;margin:0 auto;top:0px;left:0px;width:%1$spx;height:%2$spx;overflow:hidden;visibility:hidden;">
		        <div data-u="loading" class="slimslrl-009-spin" style="position:absolute;top:0px;left:0px;width:100%%;height:100%%;text-align:center;background-color:rgba(0,0,0,0.7);">
		            <img style="margin-top:-19px;position:relative;top:50%%;width:38px;height:38px;" src="%3$s/svg/loading/static-svg/spin.svg" />
		        </div> %4$s %5$s</div>',
            $this->args['width'],
            $this->args['height'],
            Asset::uri(),
            $this->image_slides(),
            Navigation::get( $this->args ),
            $this->args['id']
        );
    }

    /**
     * Slides.
     *
     * Get slides by ID, if not just use the slides defined.
     *
     * @return array
     */
    protected function get_slides(): array
    {
        if ( self::_slider_id( (int) $this->args['id'] ) ) {
            return $this->get_sliderby_id();
        }

        if ( empty( $this->args['slides'] ) ) {
            return array_keys( SlimSlide::slides() );
        }

        return $this->user_slides();
    }

    /**
     * Get slides by Slider ID.
     *
     * @return array
     */
    protected function get_sliderby_id(): array
    {
        $slider_id = (int) $this->args['id'];

        $slim_slides = get_post_meta( $slider_id, 'sliders_meta', true );

        if ( ! $slim_slides ) {
            return [];
        }

        $slides = explode( ',', $slim_slides['slides'] );

        return \is_array( $slides ) ? $slides : [];
    }

    /**
     * Get user defined slides.
     *
     * @return array
     */
    protected function user_slides(): array
    {
        $slides = explode( ',', $this->args['slides'] );
        foreach ( $slides as $slide ) {
            if ( ! get_post( $slide ) ) {
                continue;
            }
        }

        return $slides;
    }

    /**
     * Slide Images.
     *
     * @return string
     */
    protected function images(): string
    {
        $slider_image = '';
        foreach ( $this->get_slides() as $slide ) {
            $slide = \intval( $slide );
            if ( 'publish' !== get_post_status( $slide ) ) {
                continue;
            }

            $meta = $this->slide_data( $slide );
            $alt  = $meta['alt'] ?? get_the_title( $meta['ID'] );

            // Add js onClick event handler.
            // this will require # in place where link would be.
            $js_event_safe = $meta['onclick'] ?? null;

            $click_event = null;

            if ( $js_event_safe ) {
                $click_event = 'onclick="' . esc_html( $js_event_safe ) . '" ';
            }

            if ( \is_null( $meta['url'] ) || empty( $meta['url'] ) ) {
                $slider_image .= '<div><img data-u="image" alt="' . $alt . '" src="' . wp_get_attachment_url( $meta['thumbnail'] ) . '" /></div>';
            } else {
                $slider_image .= '<div><a ' . $click_event . ' href="' . $meta['url'] . '"><img data-u="image" alt="' . $alt . '" src="' . wp_get_attachment_url( $meta['thumbnail'] ) . '" /></a></div>';
            }
        }// end foreach

        return $slider_image;
    }

    /**
     * Image container.
     *
     * @return string
     */
    protected function image_slides()
    {
        return sprintf(
            '<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:%1$spx;height:%2$spx;overflow:hidden;">
				%3$s
			</div>',
            $this->args['width'],
            $this->args['height'],
            $this->images()
        );
    }

    /**
     * Slider Options.
     *
     * @return int .
     */
    protected function fillmode(): int
    {
        /**
         * 0: stretch
         * 1: contain
         * 2: cover
         * 4: actual size
         * 5: contain.
         */
        switch ( $this->args['fill'] ) {
            case 'stretch':
                $fillmode = 0;

                break;
            case 'contain':
                $fillmode = 1;

                break;
            case 'cover':
                $fillmode = 2;

                break;
            case 'actual':
                $fillmode = 4;

                break;
            case 'contain':
                $fillmode = 5;

                break;
            default:
                $fillmode = 0;

                break;
        }// end switch

        return $fillmode;
    }

    /**
     * Slider Options.
     *
     * @return array .
     */
    protected function options(): array
    {
        return $this->args;
    }

    /**
     * Check slider ID is active.
     *
     * @param string $slider_id
     *
     * @return null|int
     */
    private static function _slider_id( int $slider_id ): ?int
    {
        if ( \boolval( $slider_id ) ) {
            return $slider_id;
        }

        return null;
    }
}
