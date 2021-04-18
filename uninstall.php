<?php
/**
 *  Uninstall stuff.
 *  do some cleanup after user uninstalls the plugin
 *  ----------------------------------------------------------------------------
 *  -remove stuff
 * ----------------------------------------------------------------------------
 *
 * @category   Plugin
 * @copyright  Copyright © 2020 Uriel Wilson.
 * @package    SlimSlider
 * @author     Uriel Wilson
 * @link       https://switchwebdev.com
 *  ----------------------------------------------------------------------------
 */

// Deny direct access.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

	/**
	 * Delete All Slides
	 */
	$get_slimslides = get_posts(
 		array(
 			'numberposts' => -1,
 			'post_type'   => 'slimslide',
 		)
 	);

	// delete the slides.
 	foreach ( $get_slimslides as $slimslide ) {
 		wp_delete_post( $slimslide->ID );
 	}

	// clear the cache.
	wp_cache_flush();
