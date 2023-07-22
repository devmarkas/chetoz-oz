jQuery(function ($) {

  $('.xt_wooqv-trigger').on('click', function () {

    if (window.innerWidth <= 768) { // Apply only in mobile (up to 768px)
      $('#xt_wooqv').append('<span class="text-flying"><span><strong>Important Notice:</strong> This page is exclusively for interstate and Sydney delivery orders. If you prefer self-pickup or QR code ordering, please go back and click the corresponding option at the top of the page. Thank you for your cooperation. We are dedicated to providing you with excellent service.</span></span>');
    }
  });

  $('.text-flying span').hover(
    function () {
      $(this).css('animation-play-state', 'paused');
    },
    function () {
      $(this).css('animation-play-state', 'running');
    }
  );

  setInterval(function () {

    var $tdElement = $('table.extra-options td.value');

    // Loop through each label element within the <td> element
    $tdElement.find('label').each(function () {
      // Get the label text
      var labelText = $(this).text();

      // Check if the label text contains '(' and ')'
      if (labelText.includes('(') && labelText.includes(')')) {
        // Remove the '(' and ')' characters
        var modifiedLabelText = labelText.replace(/\(|\)/g, '');

        // Find the currency symbol and value within the modified label text
        var currencySymbol = modifiedLabelText.match(/([A-Z]{1}\$[0-9]+\.[0-9]{2})/);

        if (currencySymbol) {
          var modifiedContent = modifiedLabelText.replace(currencySymbol[0], '<span class="extra-fee">' + currencySymbol[0] + '</span>');

          // Update the label content with the modified content
          $(this).html($(this).find('input[type="checkbox"]').prop('outerHTML') + ' ' + modifiedContent);
        }
      }
    });

    var $table = $('table.extra-options');
    var $leftside = $table.find('td.leftside');

    // Find the <table> element
    var $table = $('table.extra-options');

    // Find the <div> element with class "order-note"
    var $orderNote = $('.order-note');

    // Check if the table exists before the order note div
    if ($table.length && $table.prevAll().filter($orderNote).length > 0) {

      $table.insertBefore($orderNote);
    } else {
      // Silence is gold
    }

    $(".xt_wooqv-trigger span").each(function () {
      var originalText = $(this).html();
      var newText = originalText.replace("Quick View", "View Product");
      $(this).html(newText);
    });

    var currentParams = new URLSearchParams(window.location.search);

    // Check if the '.elementor-element-53ebda4' element exists on the page
    if ($('.elementor-element-53ebda4').length) {
      // Loop through all anchor tags inside the element
      $('.elementor-element-53ebda4 a').each(function () {
        // Get the href attribute of the anchor
        var href = $(this).attr('href');

        // Check if the anchor already has a query parameter
        if (href.indexOf('?') === -1) {
          // Add the current query parameters to the anchor's href
          var updatedHref = href + '?' + currentParams.toString();

          // Update the anchor's href attribute
          $(this).attr('href', updatedHref);
        }
      });
    }

    if (!$('.xt_wooqv-item-info .quantity, .xt_wooqv-item-info button[type="submit"]').parent().hasClass('grouped-add-to-cart')) {
      // Wrap the elements with a new wrapper div
      $('.xt_wooqv-item-info .quantity, .xt_wooqv-item-info button[type="submit"]').wrapAll('<div class="grouped-add-to-cart"></div>');
    }

  }, 100);

});