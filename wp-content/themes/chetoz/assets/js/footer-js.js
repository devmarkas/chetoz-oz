jQuery(function ($) {
    
    var urlParams = new URLSearchParams(window.location.search);
    var hasPostcode = urlParams.has('postcode');

    // Add class to element if 'postcode' query parameter is present
    if (hasPostcode) {
        // alert('tes');
        $('.elementor-element-143b1a8, .elementor-element-edad1dc').addClass('postcode-active');
    }

    // Disable zooming on mobile when dropdown or input is focused

    var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

    // document.addEventListener('touchstart', function (event) {
    //     if (isMobile) {
    //         if (event.target.nodeName === 'SELECT' || event.target.nodeName === 'INPUT') {
    //             event.preventDefault();
    //         }
    //     }
    // }, { passive: false });

    $('a[href="#"]').click(function (event) {
        event.preventDefault();
    });


    // disable zoom viewport
    function isiPhone() {
        return (
            (navigator.platform.indexOf("iPhone") != -1) ||

            (navigator.platform.indexOf("iPad") != -1)
        );
    }
    if (isiPhone()) {
        document.addEventListener('touchmove', function (event) {
            if (event.scale !== 1) {
                event.preventDefault();
            }
        }, {
            passive: false
        });
    }
    
    // $(".add_to_cart_button").removeClass("ajax_add_to_cart");

    // if (xt_wooqv_close()) {
    //     window.location.replace("https://www.tutorialrepublic.com/");
    // }

    // prevent default hashtag
    $('a[href="#"]').click(function (event) {
        // return false;
        event.preventDefault();
    });

    // Add some classes to body for CSS hooks
    // Get browser
    $.each($.browser, function (i) {
        $('body').addClass(i);
        return false;
    });
    // Get OS
    var os = [
        'iphone',
        'ipad',
        'windows',
        'mac',
        'linux'
    ];

    var match = navigator.appVersion.toLowerCase().match(new RegExp(os.join('|')));
    if (match) {
        $('body').addClass(match[0]);
    };

    // refresh page if update cart
    let timeout;
    $('.woocommerce').on('change', 'input.qty', function () {
        if (timeout !== undefined) {
            clearTimeout(timeout);
        }
        timeout = setTimeout(function () {
            $("[name='update_cart']").trigger("click"); // trigger cart update
        }, 1000); // 1 second delay, half a second (500) seems comfortable too
    });

    $('.e-shop-table a').each(function () {
        var href = $(this).attr('href');
        $(this).removeAttr('href');
        $(this).attr('href', '#' + href);
    });

    var queryParams = window.location.search;

    // Find the anchor inside the specific div
    var $anchor = $('.elementor-element-5e3a718 a');

    // Check if the anchor does not contain the specific query parameter
    if ($anchor.length && $anchor.attr('href').indexOf('postcode=') === -1) {
        // Append the query parameters to the anchor's href
        var updatedHref = $anchor.attr('href') + (($anchor.attr('href').indexOf('?') !== -1) ? '&' : '') + queryParams;

        // Update the anchor's href
        $anchor.attr('href', updatedHref);
    }
});