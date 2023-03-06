(function($) {
    var slider = $( 'input[type="range"]' ),
        quantity = $( '.quantity_slide' );

    slider.on( 'input', function() {
        var val = $(this).val();
        quantity.text( val );
        $('input.qty').val(val).trigger('change');
    });
})(jQuery);