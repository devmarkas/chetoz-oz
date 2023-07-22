jQuery(function ($) {

  $('#delivery_day').on('click', function (event) {
    event.preventDefault();
  });

  var deliveryInfo = `
<div class="delivery-info">
  <h2>Your package will be delivered by:</h2>
  <div class="sydney-delivery-info">
    <h2>Local Delivery (by Chetoz Oz)</h2>
    <ul>
      <li>Delivery Day: <strong>Every Wednesday</strong></li>
      <li>Order Cut-off Time: 24 hours before the delivery day</li>
      <li>Customers can pre-order up to 30 days in advance.</li>
    </ul>
  </div>
  <div class="interstate-delivery-info">
    <h2>Interstate Delivery (by Aus Post)</h2>
    <ul>
      <li>Delivery Days: Every <strong>Monday</strong> and <strong>Tuesday</strong></li>
      <li>Order Cut-off Time: 24 hours before the delivery date</li>
      <li>Customers can pre-order up to 30 days in advance.</li>
    </ul>
  </div>
</div>
`;

  if (!$('#delivery_day_field ul').length) {
    // Append the new element
    $('#delivery_day_field').append(deliveryInfo);
  }

  function refreshOrder() {
    $("form.checkout").on("change", "input[name=payment_method]", function () {
      $("body").trigger("update_checkout");
    });
  }

  // Event handlers for the elements
  $("li.wpmc-tab-item.wpmc-ripple.wpmc-review, button#wpmc-next").click(function () {
    // Refresh the order
    refreshOrder();
  });

  setTimeout(function () {
    $('.woocommerce-order.thankyou-page').addClass('show');
  }, 2000);

  $('td.woocommerce-table__product-name.product-name a').contents().unwrap();


  // Function to retrieve the value of a specific query parameter from the URL
  function getQueryParamValue(paramName) {
    var urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(paramName);
  }

  var paramName = 'postcode'; // Replace with the name of your specific query parameter
  var inputField = $('#billing_postcode'); // Replace with the ID of your specific input field

  // Check if the input field is selected or clicked
  inputField.on('focus', function () {
    // Get the value of the specific query parameter from the URL
    var paramValue = getQueryParamValue(paramName);

    // Set the value of the input field with the query parameter value
    inputField.val(paramValue);

    // Disable the input field
    // inputField.prop('disabled', true);
  });

  // Click event for 'li.wpmc-tab-item.wpmc-ripple.wpmc-review' and '#wpmc-next' elements
  $('li.wpmc-tab-item.wpmc-ripple.wpmc-review, #wpmc-next').click(function () {
    // Add CSS class to disable input editing
    $('input[name="billing_postcode"]').addClass('disabled-input');
  });


  // Check if the browser supports the 'sessionStorage' API
  if (typeof (Storage) !== "undefined") {
    // Check if the billing fields are already filled
    if (sessionStorage.getItem('billing_fields_filled')) {
      // Retrieve the values from session storage
      var billingFirstName = sessionStorage.getItem('billingFirstName');
      var billingLastName = sessionStorage.getItem('billingLastName');
      var billingEmail = sessionStorage.getItem('billing_email');
      var billingPhone = sessionStorage.getItem('billing_phone');
      var deliveryDay = sessionStorage.getItem('deliveryDay');

      // Fill the billing fields with the retrieved values
      $('#billing_first_name').val(billingFirstName);
      $('#billing_last_name').val(billingLastName);
      $('#billing_email').val(billingEmail);
      $('#billing_phone').val(billingPhone);
      $('#delivery_day').val(deliveryDay);
    }

    // Listen for changes in the billing fields
    $('input#billing_first_name, input#billing_last_name, input#billing_email, input#billing_phone, input#delivery_day').on('input', function () {
      // Store the values in session storage
      sessionStorage.setItem('billing_fields_filled', true);
      sessionStorage.setItem('billingFirstName', $('#billing_first_name').val());
      sessionStorage.setItem('billingLastName', $('#billing_last_name').val());
      sessionStorage.setItem('billing_email', $('#billing_email').val());
      sessionStorage.setItem('billing_phone', $('#billing_phone').val());
      sessionStorage.setItem('deliveryDay', $('#delivery_day').val());
    });
  }

  setInterval(function () {

    if ($('.payment_box.payment_method_payid_payment').length) {
      // Check if the 'textarea#payid_payment-admin-note' element exists inside it
      if ($('.payment_box.payment_method_payid_payment textarea#payid_payment-admin-note').length) {
        // Remove the 'textarea#payid_payment-admin-note' element
        $('.payment_box.payment_method_payid_payment textarea#payid_payment-admin-note').remove();
      }
    }

    if ($('td[data-title="Shipping"]').text().includes("A$")) {
      // Check if the append content does not exist yet
      if ($('.cart-subtotal').next('.order-message').length === 0) {
        // Get the link from the '.want-modify-cart' element
        var linkToModifyCart = $('.want-modify-cart a').attr('href');

        // Append the message after the '<tr class="cart-subtotal">' element
        $('.cart-subtotal').after(`
    <tr class="order-message">
        <td colspan="2">
            <h2>Attention</h2>
            <ul>
                <li>Your order does not meet the minimum order.</li>
                <li>Shipping fee applies.</li>
                <li>You can modify your order to get free shipping by following this link: <a href="${linkToModifyCart}">Modify Your Cart</a></li>
            </ul>
        </td>
    </tr>
`);

      }
    }

    if (!$('#delivery_day_field').closest('.woocommerce-billing-fields__field-wrapper').length) {
      // Move or wrap the element
      $('#delivery_day_field').appendTo('.woocommerce-billing-fields__field-wrapper');
    }
    $('#stripe-payment-data fieldset').eq(1).remove();
    var labelElement = $('label[for="payment_method_payid_payment"]');

    // Check if the HTML is already replaced
    if (!labelElement.hasClass('html-replaced')) {
      // Replace the HTML code
      labelElement.html('<div>PayID Payment Number: <num>0412 663 164</num><an>(CHETOZ OZ PTY LTD)</an></div> <span>Choose this payment method to enjoy a surcharge-free transaction.</span>');
      labelElement.addClass('html-replaced');
    }

    // Check if the button is already appended
    if (!$('.copy-button').length) {
      // Append the button after the <num> tag
      $('num').after('<span class="copy-button">Copy</span>');
    }

    // Add click event for the copy button
    $('.copy-button').on('click', function () {
      var textToCopy = $('num').text();

      // Create a temporary input element to copy the text
      var tempInput = $('<input>');
      $('body').append(tempInput);
      tempInput.val(textToCopy).select();

      // Copy the text to the clipboard
      document.execCommand('copy');

      // Remove the temporary input element
      tempInput.remove();

      // Show animation for copy success (you can customize the animation here)
      $('num').addClass('copied');
      setTimeout(function () {
        $('num').removeClass('copied');
      }, 1000); // Remove the 'copied' class after 1 second to remove the animation
    });

  }, 100);
  // Delay in milliseconds

  setInterval(function () {
    var inputValue = $('input#delivery_day').val();

    // Convert the input value to a JavaScript Date object
    var dateObject = new Date(inputValue);

    if (!isNaN(dateObject.getTime())) {
      // Format the date as 'Wednesday - Jul 25, 2023'
      var formattedDate = $.datepicker.formatDate('DD - M dd, yy', dateObject);

      // Update the input value with the formatted date
      $('input#delivery_day').val(formattedDate);
    }

  }, 50);

});