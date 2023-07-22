jQuery(function ($) {
    
    setTimeout(function () {
        $('.order-tracking').addClass('show');
    }, 2000);

    $('td.woocommerce-table__product-name.product-name a').contents().unwrap();
    
});