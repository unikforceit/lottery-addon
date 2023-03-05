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


//remove woocommere breadcrumb
remove_action('woocommerce_before_main_content' , 'woocommerce_breadcrumb', 20);

//remove woocommere page Title
add_filter( 'woocommerce_show_page_title', '__return_false');

//remove woocommere result count
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

//remove woocommere sale badge
add_filter('woocommerce_before_shop_loop_item_title', '__return_false');

// Change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_add_to_cart_button_text_single' );
function woocommerce_add_to_cart_button_text_single() {
    return __( 'Enter Now', 'woocommerce' );
}

// Change add to cart text on product archives page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_add_to_cart_button_text_archives' );
function woocommerce_add_to_cart_button_text_archives() {
    return __( 'Enter Now', 'woocommerce' );
}
function add_quantity_slider() {
    echo '<div class="quantity-slider-wrapper">';
    echo '<label for="quantity-slider">Quantity:</label>';
    echo '<input type="range" name="quantity" min="1" max="10" value="1" class="quantity-slider" id="quantity-slider">';
    echo '<span class="quantity-value">1</span>';
    echo '</div>';
}
add_action( 'woocommerce_before_add_to_cart_button', 'add_quantity_slider' );
function add_hidden_quantity_field() {
    global $product;
    echo '<input type="hidden" name="add-to-cart" value="' . esc_attr( $product->get_id() ) . '">';
}
add_action( 'woocommerce_before_add_to_cart_button', 'add_hidden_quantity_field' );

