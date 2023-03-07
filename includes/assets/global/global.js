(function($) {
    var slider = $( 'input[type="range"]' ),
        quantity = $( '.quantity_slide' );
        minus = $( '.minus' ),
        plus = $( '.plus' );
    slider.on( 'input', function() {
        var val = $(this).val();
        quantity.text( val );
        $('input.qty').val(val).trigger('change');
    });

    minus.on( 'click', function() {
        var val = parseInt( slider.val() ) - 1;
        if ( val < parseInt( slider.attr( 'min' ) ) ) {
            val = parseInt( slider.attr( 'min' ) );
        }
        slider.val( val ).trigger( 'input' );
    });

    plus.on( 'click', function() {
        var val = parseInt( slider.val() ) + 1;
        if ( val > parseInt( slider.attr( 'max' ) ) ) {
            val = parseInt( slider.attr( 'max' ) );
        }
        slider.val( val ).trigger( 'input' );
    });
    //    add custom text after after price in shop page
    $( "span.woocommerce-Price-amount.amount:last-child" ).append( "<span class='lta_after_price'>Per Entry</span>" );
})(jQuery);