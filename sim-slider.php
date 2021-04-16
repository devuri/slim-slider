<?php
/**
 * SlimSlider
 *
 * @package         Slim Slider.
 * @author          Uriel Wilson
 * @copyright       2021 Uriel Wilson
 * @license         GPL-2.0
 * @link            https://urielwilson.com
 *
 * @wordpress-plugin
 * Plugin Name:       Slim Slider
 * Plugin URI:        https://switchwebdev.com/wordpress-plugins/
 * Description:       Simple WordPress slider use [sim_slider] shortcode.
 * Version:           0.3.3
 * Requires at least: 3.4
 * Requires PHP:      5.6
 * Author:            Uriel Wilson
 * Author URI:        https://urielwilson.com
 * Text Domain:       wp-sim-slider
 * Domain Path:       languages
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

# deny direct access
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Load composer
 */
require __DIR__ . '/vendor/autoload.php';

//plugin directory CONSTANT
define("SLIMSLIDER_DIR", dirname(__FILE__));

//PLUGIN URL
define("SLIMSLIDER_URL", plugins_url( "/",__FILE__ ));

// setup the slider.
( new SlimSlider\Slider() )->init();
