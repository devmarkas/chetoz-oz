jQuery(function ($) {

   var $refreshLoader_cart = $('<div class="adding-product-to-your-cart-loading cartempty"></div>');
//   var $refreshLoader_addtocart = $('<div class="adding-product-to-your-cart-loading addto_cart"></div>');

  // 1. Add button to remove all product items in mini cart
  $('.woocommerce-cart-form__contents').after('<button id="remove-all-items-button" class="button" aria-label="Remove all items in this cart"><span class="button-icon"><i class="fas fa-trash"></i></span></button>');

  $('#remove-all-items-button').on('click', function (e) {
    e.preventDefault();

    Swal.fire({
      title: 'Confirmation',
      text: 'Are you sure you want to remove all items from the cart?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'No',
      reverseButtons: true
    }).then(function (result) {
      if (result.isConfirmed) {
        var newValue = 0; // New value to set for all input numbers
        $('.woocommerce-cart-form__contents .quantity input[type="number"]').val(newValue).change();

        $("[name='update_cart']").trigger("click");
      }
    });
  });

//   handle loading after customer change quantity
   $('.elementor-element-bd20e2b input[type="number"]').on('change', function () {
       // $('.elementor-element-0f38be7').addClass('disable-wrapper');
       $('body').prepend($refreshLoader_cart);
   });

  $('.get-free-delivery.0').remove();

  // Check if the user agent indicates a mobile device
  // var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

  // if (isMobile) {
  //     $('.elementor-element-2e9a3a2').stick_in_parent({
  //         offset_top: 20,
  //     });
  // }

  if ($('.wc-proceed-to-checkout .button').hasClass('no-checkout')) {
    $('.checkout-button').remove();
  }

  setInterval(function () {

    if (!$('.xt_wooqv-is-visible').length) {
      $('.text-flying').remove();
    }

    // Check for specific class and remove another element
    if ($('.wc-proceed-to-checkout .button').hasClass('no-checkout')) {
      $('.checkout-button').remove();
    }

    // Get the current URL query parameters
    var queryParams = window.location.search.substr(1);
    var anchorSelector = '.wc-proceed-to-checkout a';
    var anchorElement = $(anchorSelector);

    // Check if the anchor element exists and has the href attribute
    if (anchorElement.length && anchorElement.attr('href')) {
      var href = anchorElement.attr('href');

      // Check if the href includes the query parameters
      if (!href.includes(queryParams)) {
        // Append the query parameters to the href
        var updatedHref = href + (href.indexOf('?') !== -1 ? '&' : '?') + queryParams;

        // Update the anchor's href
        anchorElement.attr('href', updatedHref);
      }
    }

    var $button = $('.single_add_to_cart_button');
    if ($button.hasClass('added')) {
      if (!$('.adding-product-to-your-cart-loading.addto_cart').length) {
        // $('body').prepend($refreshLoader_addtocart);
      }
      // location.reload(); // Refresh the current page
      $button.removeClass('added');
    }

    if ($('.cart-empty').length) {
      $($refreshLoader_cart).remove();
    }

  }, 100);
  // Delay in milliseconds
});