<?php

namespace SlimSlider\PostType;

use SlimSlider\CtpMeta\Data;

/**
 * The Slider class.
 */
final class Slider
{
    /**
     * Get All Sliders.
     *
     * @param bool $array .
     *
     * @return array
     */
    public static function sliders( $array = true ): array
    {
        $sliders = new Data( 'slslider' );

        if ( ! $sliders ) {
            return [];
        }

        if ( $array ) {
            return $sliders->list();
        }

        return $sliders->items();
    }

    /**
     * Post Type: Sl Slider.
     */
    public static function register_type(): void
    {
        $labels = [
            'name'                  => __( 'Sl Slider', 'slim-slider' ),
            'singular_name'         => __( 'Sl Slider', 'slim-slider' ),
            'menu_name'             => __( 'Sl Slider', 'slim-slider' ),
            'name_admin_bar'        => __( 'Sl Slider', 'slim-slider' ),
            'archives'              => __( 'Slider Archives', 'slim-slider' ),
            'attributes'            => __( 'Slider Attributes', 'slim-slider' ),
            'parent_item_colon'     => __( 'Parent Slider:', 'slim-slider' ),
            'all_items'             => __( 'All Sliders', 'slim-slider' ),
            'add_new_item'          => __( 'Add New Slider', 'slim-slider' ),
            'add_new'               => __( 'Add New', 'slim-slider' ),
            'new_item'              => __( 'New Slider', 'slim-slider' ),
            'edit_item'             => __( 'Edit Slider', 'slim-slider' ),
            'update_item'           => __( 'Update Slider', 'slim-slider' ),
            'view_item'             => __( 'View Slider', 'slim-slider' ),
            'view_items'            => __( 'View Sliders', 'slim-slider' ),
            'search_items'          => __( 'Search Sliders', 'slim-slider' ),
            'not_found'             => __( 'Not found', 'slim-slider' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'slim-slider' ),
            'featured_image'        => __( 'Slider Image', 'slim-slider' ),
            'set_featured_image'    => __( 'Add slide image', 'slim-slider' ),
            'remove_featured_image' => __( 'Remove slide image', 'slim-slider' ),
            'use_featured_image'    => __( 'Use as slide image', 'slim-slider' ),
            'insert_into_item'      => __( 'Insert into item', 'slim-slider' ),
            'uploaded_to_this_item' => __( 'Uploaded to this slide', 'slim-slider' ),
            'items_list'            => __( 'Sliders list', 'slim-slider' ),
            'items_list_navigation' => __( 'Sliders list navigation', 'slim-slider' ),
            'filter_items_list'     => __( 'Filter sliders list', 'slim-slider' ),
        ];

        $args = [
            'label'                 => __( 'Sl Slider', 'slim-slider' ),
            'labels'                => $labels,
            'description'           => '',
            'public'                => false,
            'publicly_queryable'    => false,
            'show_ui'               => true,
            'show_in_rest'          => false,
            'rest_base'             => '',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'has_archive'           => false,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => false,
            'delete_with_user'      => false,
            'exclude_from_search'   => false,
            'capability_type'       => 'post',
            'map_meta_cap'          => true,
            'hierarchical'          => false,
            'rewrite'               => [
                'slug'       => 'slslider',
                'with_front' => true,
            ],
            'query_var'             => true,
            'menu_icon'             => 'dashicons-images-alt2',
            'supports'              => [ 'title' ],
        ];
        register_post_type( 'slslider', $args );
    }
}
