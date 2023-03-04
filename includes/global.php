<?php
/**
 * Enqueue JavaScript and CSS files for the plugin
 */
function lottery_addons_enqueue_scripts() {
    wp_enqueue_script('jquery-ui-slider');
    // Enqueue JavaScript file
    wp_enqueue_script('lottery-addons-plugin', LotteryAddons_PLUG_URL . 'includes/assets/global/global.js', array('jquery'), '1.0', true);

    // Enqueue CSS file
    wp_enqueue_style('lottery-addons-plugin', LotteryAddons_PLUG_URL . 'includes/assets/global/global.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'lottery_addons_enqueue_scripts');

remove_action('lty_lottery_single_product_content', 'LTY_Lottery_Single_Product_Templates::render_date_ranges_template', 10);
add_action('lty_after_add_to_cart_form', 'LTY_Lottery_Single_Product_Templates::render_date_ranges_template', 10);
