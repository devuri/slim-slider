<?php

namespace SlimSlider;

use SlimSlider\Admin\GetStarted;
use SlimSlider\CtpMeta\MetaBox;
use SlimSlider\EasyAdmin\Admin;
use SlimSlider\MetaView\Slide;
use SlimSlider\MetaView\Sliders;
use SlimSlider\PostType\Slider;
use SlimSlider\PostType\SlimSlide;

/**
 * The sim Slider class.
 */
class Plugin
{
    /**
     * [__construct description].
     */
    public function __construct()
    {
        // Get Started Page.
        $this->add_admin_page();

        // add IDs to Items.
        add_filter(
            'manage_slimslide_posts_columns',
            function ( $columns ) {
                unset( $columns['date'] );
                $columns['slide_image'] = __( 'Slider Image', 'slim-slider' );
                $columns['slide_id']    = __( 'ID', 'slim-slider' );

                return $columns;
            }
        );

        add_action(
            'manage_slimslide_posts_custom_column',
            function ( $column, $post_id ): void {
                switch ( $column ) {
                    case 'slide_id':
                        echo '<strong>' . esc_attr( $post_id ) . '</strong>';

                        break;
                    case 'slide_image':
                        echo '<img width="110" data-u="image" src="' . esc_url( get_the_post_thumbnail_url( $post_id ) ) . '" />';

                        break;
                    default:
                        break;
                }
            },
            10,
            2
        );
    }

    /**
     * Slider loaded.
     *
     * @return void
     */
    public static function is_ready(): void
    {
        do_action( 'slim_slider_loaded' );
    }

    /**
     * Slider Getting Started Page.
     *
     * @return void
     */
    public function add_admin_page(): void
    {
        new Admin(
            new GetStarted( 'Slim Slider: Getting Started' ),
            'edit.php?post_type=slimslide'
        );
    }

    /**
     * Init.
     *
     * @return void
     */
    public function init(): void
    {
        // dont render the shortcode in admin.
        if ( ! is_admin() ) {
            add_shortcode( 'slim_slider', [ $this, 'slimslider' ] );
        }
        // post type.
        add_action( 'init', [ SlimSlide::class, 'register_type' ] );

        add_action( 'init', [ Slider::class, 'register_type' ] );

        // meta data.
        new MetaBox( new Slide( 'slimslide' ) );

        new MetaBox( new Sliders( 'slslider' ) );
    }

    /**
     * The Slider.
     *
     * @param array|string $atts Attributes for the slider.
     */
    public function slimslider( $atts )
    {
        $meta = get_post_meta( $atts['id'], 'sliders_meta', true );
        $attr = shortcode_atts( self::slider_args( $meta ), $atts, 'slim_slider' );

        // Check if we have slides.
        $slider = Slides::init( $attr )->get();
        if ( ! $slider ) {
            return '<div style="display: block; text-align: center; padding:12px;">No slides to show.</div>';
        }

        // Just get the slider if needed (useful when using do_shortcode()).
        if ( \in_array( $attr['get'], [ 'true', 'yes' ], true ) ) {
            $slider->output();

            return;
        }

        ob_start();
        $slider->output();

        return ob_get_clean();
    }

    public static function slider_args( $meta ): array
    {
        return [
            'id'       => '0',
            'width'    => ! empty( $meta['width'] ) ? $meta['width'] : '1920',
            'height'   => ! empty( $meta['height'] ) ? $meta['height'] : '740',
            'nav'      => ! empty( $meta['nav'] ) ? $meta['nav'] : 'ab',
            'swipe'    => ! empty( $meta['swipe_animation_duration'] ) ? $meta['swipe_animation_duration'] : '800',
            'fill'     => ! empty( $meta['image_fill_mode'] ) ? $meta['image_fill_mode'] : 'stretch',
            'duration' => ! empty( $meta['transition_speed'] ) ? $meta['transition_speed'] : '300',
            'opacity'  => ! empty( $meta['transition_opacity'] ) ? $meta['transition_opacity'] : '2',
            'speed'    => ! empty( $meta['speed'] ) ? $meta['speed'] : '3000',
            'slides'   => [],
            'get'      => false,
        ];
    }
}
