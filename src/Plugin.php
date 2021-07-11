<?php

namespace SlimSlider;

use DevUri\Meta\MetaBox;
use SlimSlider\EasyAdmin\Admin;
use SlimSlider\Admin\GetStarted;
use SlimSlider\MetaView\Slide;

/**
 * The sim Slider class.
 *
 * @package sim
 */
final class Plugin
{

	/**
	 * [__construct description]
	 */
	public function __construct() {

		// Get Started Page.
		$this->add_admin_page();

		// add IDs to Items.
		add_filter( 'manage_slimslide_posts_columns',
			function( $columns ) {
				unset( $columns['date'] );
				$columns['slide_image'] = __( 'Slider Image', 'slim-slider' );
				$columns['slide_id']    = __( 'ID', 'slim-slider' );
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
	 * Slider loaded
	 *
	 * @return void
	 */
	public static function is_ready() {
		do_action( 'slim_slider_loaded' );
	}

	/**
	 * Slider Getting Started Page.
	 *
	 * @return void
	 */
	public function add_admin_page() {
		new Admin(
			new GetStarted( 'Slim Slider: Getting Started' ),
			'edit.php?post_type=slimslide'
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
			add_shortcode( 'slim_slider', [ $this, 'slimslider' ] );
		}
		// post type.
		add_action( 'init', [ SlimSlide::class, 'slider_post_type' ] );

		// meta data.
		new MetaBox( new Slide( 'slimslide' ) );
	}

	/**
	 * The Slider.
	 *
	 * @param array $atts .
	 */
	public function slimslider( array $atts ) {
		$atts = shortcode_atts(
			array(
				'id'       => '904562',  // The slider ID.
				'height'   => '740',     // Height of every slide in pixels.
				'nav'      => 'ab',      // Navigation type, b: bullet navigator or a: arrow navigator.
				'swipe'    => '800',     // Swipe animation duration (in milliseconds).
				'fill'     => 'stretch', // Type of image fill for the slide.
				'duration' => '300',     // Transition speed.
				'opacity'  => '2',       // Transition Opacity.
				'speed'    => '3000',    // Slider speed (in milliseconds).
				'slides'   => array(),   // List of slide IDs.
				'get'      => false,     // Get the slide when do_shortcode().
			),
			$atts,
			'slim_slider'
		);

		/**
		 * Lets check if we have slides.
		 */
		if ( ! Slides::init( $atts )->get() ) {
			return '<div style="display: block; text-align: center; padding:12px;">No slides to show.</div>';
		}

		/**
		 * Just Get the slider.
		 *
		 * Useful when using do_shortcode()
		 */
		if ( 'true' === $atts['get'] || 'yes' === $atts['get'] ) {
			Slides::init( $atts )->get()->output();
			return;
		}

		ob_start();

			Slides::init( $atts )->get()->output();

		return ob_get_clean();

	}

}
