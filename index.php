<?php
/**
 * Plugin Name:       Lottery Addons
 * Plugin URI:        https://unikforce.com
 * Description:       Simple elementor addons
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            UnikForce IT
 * Author URI:        https://unikforce.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       lotteryaddons
 * Elementor tested up to:     3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'LotteryAddons_PLUG_DIR', dirname(__FILE__).'/' );
define('LotteryAddons_PLUG_URL', plugin_dir_url(__FILE__));

function lottery_addons() {

    // Load plugin file
    require_once( __DIR__ . '/includes/index.php' );
    require_once( __DIR__ . '/includes/global.php' );
    // Run the plugin
    \LotteryAddons\LotteryAddonsPlugin::instance();

}
add_action( 'plugins_loaded', 'lottery_addons' );