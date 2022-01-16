<?php
/**
 * Plugin Name:       Theoriemakkie Addons
 * Plugin URI:        https://unikforce.com
 * Description:       Simple elementor addons
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            UnikForce IT
 * Author URI:        https://unikforce.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       theoriemakkie
 * Elementor tested up to:     3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'Theoriemakkie_PLUG_DIR', dirname(__FILE__).'/' );
define('Theoriemakkie_PLUG_URL', plugin_dir_url(__FILE__));

function theoriemakkie_addon() {

    // Load plugin file
    require_once( __DIR__ . '/codestar-framework/codestar-framework.php' );
    require_once( __DIR__ . '/includes/index.php' );

    // Run the plugin
    \Theoriemakkie_Addon\TheoriemakkiePlugin::instance();

}
add_action( 'plugins_loaded', 'theoriemakkie_addon' );