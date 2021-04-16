<?php

namespace SlimSlider;

use DevUri\Meta\MetaBox;
use SlimSlider\MetaView\Slide;
use DevUri\Meta\Data;

/**
 * The sim Slider class.
 *
 * @package sim
 */
final class Slider
{

	use Asset;

	/**
	 * Define Version
	 */
	const VERSION = '0.4.5';

	/**
	 * [__construct description]
	 */
	public function __construct() {

		// add IDs to Items.
		add_filter( 'manage_slimslide_posts_columns',
			function( $columns ) {
				unset( $columns['date'] );
				$columns['slide_image'] = __( 'Slider Image', 'slim-slider' );
				$columns['slide_id']  = __( 'ID', 'slim-slider' );
				return $columns;
			}
		);

		add_action( 'manage_slimslide_posts_custom_column',
			function( $column, $post_id ) {
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
			}, 10, 2
		);
	}

	/**
	 * Init
	 *
	 * @return void
	 */
	public function init() {

		// dont render the shortcode in admin.
		if ( ! is_admin() ) {
			add_shortcode( 'slim_slider', array( $this, 'slimslider' ) );
		}
		// post type.
		add_action( 'init', array( SlimSlide::class, 'slider_post_type' ) );

		// meta data.
		new MetaBox( new Slide( 'slimslide' ) );
	}

	/**
	 * Enqueue
	 *
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_style( 'slim-slider', Asset::uri() . '/css/style.css', array(), self::VERSION, 'all' );
		wp_enqueue_script( 'slim-slider', Asset::uri() . '/js/slim.jssor.slider.min.js', array( 'jquery' ), self::VERSION, true );
		wp_enqueue_script( 'slim-slider-options', Asset::uri() . '/js/options.js', array( 'jquery' ), self::VERSION, true );
		wp_enqueue_script( 'slim-slider-init', Asset::uri() . '/js/init.js', array( 'jquery' ), self::VERSION, true );
	}

    /**
     * Get The Slide.
     *
     * Get meta data for the current slide.
     *
     * @param  int $id the slide ID.
     * @return array
     */
	public function get_slide( $id ) {

		if ( ! get_post( $id ) ) return false;

		$slide = new Data( 'slimslide' );

		return $slide->meta( $id, 'slide_meta' );
	}

	/**
	 * Get All Slides.
	 *
	 * @param bool $array .
	 *
	 * @return string
	 */
	public function slides( $array = true ) {

		$slides = new Data( 'slimslide' );

		if ( $array ) {
			return $slides->list();
		}
		return $slides->items();
	}

	/**
	 * The Slider.
	 *
	 * @param  array $atts .
	 */
	public function slimslider( $atts ) {
		$atts = shortcode_atts(
			array(
				'id'     => '904562',
				'width'  => '1920',
				'height' => '740',
				'nav'    => 'b',
				'slides' => array(),
			),
			$atts,
			'slim_slider'
		);
		$this->enqueue();

		echo Slides::init( $atts )->get();
	}

}
