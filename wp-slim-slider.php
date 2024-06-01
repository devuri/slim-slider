<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Slim Slider
 * Plugin URI:        https://wpbrisko.com/wordpress-plugins/
 * Description:       Slim Slider is a simple slider plugin that allows you to add a slider in posts and pages.
 * Version:           2.0.2
 * Requires at least: 4.6
 * Requires PHP:      7.4
 * Author:            uriel
 * Author URI:        https://wpbrisko.com
 * Text Domain:       slim-slider
 * Domain Path:       languages
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// start plugin.
if ( ! \defined( 'ABSPATH' ) ) {
    exit;
}

// plugin directory CONSTANT.
\define( 'SLIMSLIDER_DIR', \dirname( __FILE__ ) );

// plugin url.
\define( 'SLIMSLIDER_URL', plugins_url( '/', __FILE__ ) );

// php 8 check.
function slimslide_php8_version_check()
{
    // always return false since it has been fixed.
    return false;
}

// Load composer.
require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

// setup the slider.
( new SlimSlider\Plugin() )->init();

// ready.
SlimSlider\Plugin::is_ready();
