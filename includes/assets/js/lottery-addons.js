(function ($) {
"use strict";

    var LotteryAddonsGlobal = function ($scope, $) {

        // Js Start
        $('[data-background]').each(function() {
            $(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
        });
        // Js End

    };
    var StickySection = function ($scope, $) {

        // Js Start
        var link = $('.chart-product-text-body').data('link');
        $(".chart-product-text-body").click( function() {
            window.location.href=link;
        });
        // Js End

    };

    $(window).on('elementor/frontend/init', function () {
        if (elementorFrontend.isEditMode()) {
            elementorFrontend.hooks.addAction('frontend/element_ready/global', LotteryAddonsGlobal);
            //elementorFrontend.hooks.addAction('frontend/element_ready/lotteryaddons_ad_block.default', adblocklist);
        }
        else {
            elementorFrontend.hooks.addAction('frontend/element_ready/global', LotteryAddonsGlobal);
            //elementorFrontend.hooks.addAction('frontend/element_ready/lotteryaddons_ad_block.default', adblocklist);
        }
    });

//    add custom text after after price in shop page
    $( "span.woocommerce-Price-amount.amount:last-child" ).append( "<span class='lta_after_price'>Per Entry</span>" );
console.log('addon js loaded');
})(jQuery);