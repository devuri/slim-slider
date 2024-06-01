<?php

namespace SlimSlider\PostType;

use SlimSlider\CtpMeta\Data;

/**
 * The Slider class.
 */
final class SlimSlide
{
    /**
     * Get All Slides.
     *
     * @param bool $array .
     *
     * @return array
     */
    public static function slides( $array = true ): array
    {
        $slides = new Data( 'slimslide' );

        if ( ! $slides ) {
            return [];
        }

        if ( $array ) {
            return $slides->list();
        }

        return $slides->items();
    }

    /**
     * Post Type: Slim Slides.
     */
    public static function register_type(): void
    {
        $labels = [
            'name'                  => __( 'Slim Slides', 'slim-slider' ),
            'singular_name'         => __( 'Slim Slide', 'slim-slider' ),
            'menu_name'             => __( 'Slim Slides', 'slim-slider' ),
            'name_admin_bar'        => __( 'Slim Slide', 'slim-slider' ),
            'archives'              => __( 'Slide Archives', 'slim-slider' ),
            'attributes'            => __( 'Slide Attributes', 'slim-slider' ),
            'parent_item_colon'     => __( 'Parent Slide:', 'slim-slider' ),
            'all_items'             => __( 'All Slides', 'slim-slider' ),
            'add_new_item'          => __( 'Add New Slide', 'slim-slider' ),
            'add_new'               => __( 'Add New', 'slim-slider' ),
            'new_item'              => __( 'New Slide', 'slim-slider' ),
            'edit_item'             => __( 'Edit Slide', 'slim-slider' ),
            'update_item'           => __( 'Update Slide', 'slim-slider' ),
            'view_item'             => __( 'View Slide', 'slim-slider' ),
            'view_items'            => __( 'View Slides', 'slim-slider' ),
            'search_items'          => __( 'Search Slides', 'slim-slider' ),
            'not_found'             => __( 'Not found', 'slim-slider' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'slim-slider' ),
            'featured_image'        => __( 'Slide Image', 'slim-slider' ),
            'set_featured_image'    => __( 'Add slide image', 'slim-slider' ),
            'remove_featured_image' => __( 'Remove slide image', 'slim-slider' ),
            'use_featured_image'    => __( 'Use as slide image', 'slim-slider' ),
            'insert_into_item'      => __( 'Insert into item', 'slim-slider' ),
            'uploaded_to_this_item' => __( 'Uploaded to this slide', 'slim-slider' ),
            'items_list'            => __( 'Slides list', 'slim-slider' ),
            'items_list_navigation' => __( 'Slides list navigation', 'slim-slider' ),
            'filter_items_list'     => __( 'Filter slides list', 'slim-slider' ),
        ];

        $args = [
            'label'                 => __( 'Slim Slides', 'slim-slider' ),
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
                'slug'       => 'slimslide',
                'with_front' => true,
            ],
            'query_var'             => true,
            'menu_icon'             => 'dashicons-images-alt2',
            'supports'              => [ 'title', 'thumbnail' ],
        ];
        register_post_type( 'slimslide', $args );
    }
}
