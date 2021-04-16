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
	const VERSION = '0.3.0';

	public function __construct()
	{
		// add IDs to Items.
		add_filter( 'manage_slimslide_posts_columns', function( $columns ) {

			unset( $columns['date'] );
			$columns['slide_image'] = __('Slider Image');
			$columns['slide_id']  = __('ID');
			return $columns;

		});

		add_action( 'manage_slimslide_posts_custom_column' , function( $column, $post_id ) {

			switch ( $column ) {
				case 'slide_id':
					echo '<strong>'.$post_id.'</strong>';
					break;
				case 'slide_image':
					echo '<img width="110" data-u="image" src="'.get_the_post_thumbnail_url($post_id).'" />' ;
					break;
				default:
					break;
			}

		}, 10, 2 );

	}

	/**
	 * init
	 * @return void
	 */
	public function init() {

		// dont render the shortcode in admin.
		if ( ! is_admin() ) {
			add_shortcode( 'slim_slider', array( $this, 'slimslider') );
		}
		// post type.
		add_action( 'init', array( $this, 'slimslide_post_type') );

		// meta data.
		new MetaBox( new Slide('slimslide') );
	}

	public function enqueue() {
		wp_enqueue_style( 'slim-slider', Asset::uri() . '/css/style.css', array(), self::VERSION, 'all');
		wp_enqueue_script( 'slim-slider', Asset::uri() . '/js/slim.slider.min.js', array( 'jquery' ), self::VERSION, true );
	}

	/**
	 * Get The Slide.
	 *
	 * @param  array $atts
	 *
	 * @return string
	 */
	public function get_slide( $id ) {

		if ( ! get_post($id) ) return false;

		$slide = new Data('slimslide');

		return $slide->meta( $id, 'slide_meta' );
	}

	/**
	 * Get All Slides.
	 *
	 * @param bool $array
	 *
	 * @return string
	 */
	public function slides( $array = true ) {

		$slides = new Data('slimslide');

		if ( $array ) {
			return $slides->list();
		}
		return $slides->items();
	}

	/**
	 * The Slider.
	 *
	 * @param  array $atts
	 *
	 * @return string
	 */
	public function slimslider( $atts ) {
		$atts = shortcode_atts(
			array(
				'id'      => '904562',
				'width'   => '1920',
				'height'  => '740',
				'navtype' => 'b',
				'nav'     => 1,
				'slides'  => array(),
			),
			$atts
		);
		$this->enqueue();

		wp_enqueue_script( 'slim-slider-options', Asset::uri() . '/js/options.js', array( 'jquery' ), self::VERSION, true );
		wp_enqueue_script( 'slim-slider-init', Asset::uri() . '/js/init.js', array( 'jquery', 'slim-slider-options' ), self::VERSION, true );
		echo Slides::get($atts);
	}

	/**
	 * Post Type: Slim Slides.
	 */
	public function slimslide_post_type() {

		$labels = [
			"name" => __( "Slim Slides", "brisko" ),
			"singular_name" => __( "Slim Slide", "brisko" ),
			"all_items" => __( "All Slides", "brisko" ),
			"add_new_item" => __( "Add New Slide", "brisko" ),
			"edit_item" => __( "Edit Slide", "brisko" ),
			"new_item" => __( "New Slide", "brisko" ),
			"view_item" => __( "View Slide", "brisko" ),
			"view_items" => __( "View Slides", "brisko" ),
			"search_items" => __( "Search Slides", "brisko" ),
			"not_found" => __( "No Slide Found", "brisko" ),
			"not_found_in_trash" => __( "No Slide Found in Trash", "brisko" ),
			"parent" => __( "Parent Slide", "brisko" ),
			"featured_image" => __( "Slide Image", "brisko" ),
			"set_featured_image" => __( "Set slide image", "brisko" ),
			"remove_featured_image" => __( "Remove slide image", "brisko" ),
			"use_featured_image" => __( "Use as slide image", "brisko" ),
			"uploaded_to_this_item" => __( "Uploaded to this slide", "brisko" ),
			"filter_items_list" => __( "Filter Slide list", "brisko" ),
			"items_list_navigation" => __( "Slide list navigation", "brisko" ),
			"items_list" => __( "Slide list", "brisko" ),
			"attributes" => __( "Slide Attributes", "brisko" ),
			"name_admin_bar" => __( "Slide", "brisko" ),
			"item_published" => __( "Slide published", "brisko" ),
			"item_published_privately" => __( "Slide  published privately.", "brisko" ),
			"item_reverted_to_draft" => __( "Slide  reverted to draft.", "brisko" ),
			"item_scheduled" => __( "Slide scheduled.", "brisko" ),
			"item_updated" => __( "Slide updated.", "brisko" ),
			"parent_item_colon" => __( "Parent Slide", "brisko" ),
		];

		$args = [
			"label" => __( "Slim Slides", "brisko" ),
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"publicly_queryable" => false,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => false,
			"delete_with_user" => false,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => [ "slug" => "slimslide", "with_front" => true ],
			"query_var" => true,
			"menu_icon" => "dashicons-images-alt2",
			"supports" => [ "title", "thumbnail" ],
		];

		register_post_type( "slimslide", $args );
	}
}
