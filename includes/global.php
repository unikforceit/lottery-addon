<?php
remove_action('lty_lottery_single_product_content', 'LTY_Lottery_Single_Product_Templates::render_date_ranges_template', 10);
add_action('lty_after_add_to_cart_form', 'LTY_Lottery_Single_Product_Templates::render_date_ranges_template', 10);
