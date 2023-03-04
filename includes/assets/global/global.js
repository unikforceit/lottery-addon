(function ($) {
    "use strict";
    jQuery(document).ready(function($) {
        // Convert quantity input field to quantity slider
        $('.quantity input[type="number"]').each(function() {
            var input = $(this);
            var max = parseInt(input.attr('max'));
            var value = parseInt(input.val());
            var slider = $('<div class="quantity-slider"></div>');
            input.hide().after(slider);
            slider.slider({
                range: 'min',
                min: 1,
                max: max,
                value: value,
                slide: function(event, ui) {
                    input.val(ui.value).trigger('change');
                }
            });
        });
    });
    console.log('Global JS');
})(jQuery);