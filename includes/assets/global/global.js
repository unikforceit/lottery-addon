(function ($) {
    "use strict";
    jQuery(document).ready(function($) {
        // Get the quantity slider, value display, minimum and maximum values, step and stock quantity
        var quantitySlider = $('.quantity-slider');
        var quantityValue = $('.quantity-value');
        var minQuantity = parseInt(quantitySlider.attr('min'));
        var maxQuantity = parseInt(quantitySlider.attr('max'));
        var stepQuantity = parseInt(quantitySlider.attr('step'));
        var stockQuantity = parseInt($('.stock').text());

        // Set the initial value of the quantity value display
        quantityValue.html(quantitySlider.val());

        // Update the hidden quantity input field and value display as the user adjusts the slider
        quantitySlider.on('input', function() {
            var currentValue = $(this).val();
            // Update the value display
            quantityValue.html(currentValue);
            // Update the hidden input field
            $('input[name="quantity"]').val(currentValue);
            // Check the stock availability and update the slider accordingly
            checkStock(currentValue);
        });

        // Check the stock availability and update the slider accordingly
        function checkStock(currentValue) {
            // Get the stock information
            var stockStatus = $('.stock').attr('data-stock-status');
            // Disable the slider if the product is out of stock
            if (stockStatus === 'out_of_stock') {
                quantitySlider.attr('disabled', true);
                $('.quantity-slider-wrapper').addClass('out-of-stock');
                return;
            }
            // Enable the slider if the product is in stock
            quantitySlider.attr('disabled', false);
            $('.quantity-slider-wrapper').removeClass('out-of-stock');
            // Update the minimum and maximum values of the slider based on the stock and WooCommerce settings
            minQuantity = parseInt(quantitySlider.attr('min'));
            maxQuantity = parseInt(quantitySlider.attr('max'));
            stepQuantity = parseInt(quantitySlider.attr('step'));
            if (minQuantity < 1) {
                minQuantity = 1;
            }
            if (maxQuantity > stockQuantity) {
                maxQuantity = stockQuantity;
            }
            var range = maxQuantity - minQuantity;
            var newValue = Math.round(currentValue / stepQuantity) * stepQuantity;
            if (newValue < minQuantity) {
                newValue = minQuantity;
            } else if (newValue > maxQuantity) {
                newValue = maxQuantity;
            }
            quantitySlider.attr('min', minQuantity);
            quantitySlider.attr('max', maxQuantity);
            quantitySlider.attr('step', stepQuantity);
            quantityValue.html(newValue);
            quantitySlider.val(newValue);
        }

        // Call the checkStock function initially to set the slider values based on the stock and WooCommerce settings
        checkStock(quantitySlider.val());
    });

    console.log('Global JS');
})(jQuery);