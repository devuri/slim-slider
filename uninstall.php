<?php

// Deny direct access.
if ( ! \defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

/**
 * Delete All Slides.
 */
$get_slimslides = get_posts(
    [
        'numberposts' => -1,
        'post_type'   => 'slimslide',
    ]
);

// delete the slides.
foreach ( $get_slimslides as $slimslide ) {
    wp_delete_post( $slimslide->ID );
}

// clear the cache.
wp_cache_flush();
