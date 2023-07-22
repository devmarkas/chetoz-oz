<?php
/////////////////////////////
// BEGIN SETUP CHILD THEME //
/////////////////////////////

// Exit if accessed directly 
if (!defined('ABSPATH'))
  exit;
if (!function_exists('suffice_child_enqueue_child_styles')) {
  function load_child_theme()
  {

    // loading parent style
    wp_register_style(
      'parent-style',
      get_template_directory_uri() . '/style.css'
    );
    wp_enqueue_style('parent-style');

    // loading child style
    wp_register_style(
      'child-style',
      get_stylesheet_directory_uri() . '/style.css?v=' . time()
    );
    wp_enqueue_style('child-style');
  }
}
add_action('wp_enqueue_scripts', 'load_child_theme');


//////////////////////
// Start ur Journey //
//////////////////////

// Display dynamic year copyright echo comicpress_copyright(); --> output © 2009 – 2021
function comicpress_copyright()
{
  global $wpdb;
  $copyright_dates = $wpdb->get_results("
        SELECT
        YEAR(min(post_date_gmt)) AS firstdate,
        YEAR(max(post_date_gmt)) AS lastdate
        FROM
        $wpdb->posts
        WHERE
        post_status = 'publish'
        ");
  $output = '';
  if ($copyright_dates) {
    $copyright = "&copy; " . $copyright_dates[0]->firstdate;
    if ($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
      $copyright .= '-' . $copyright_dates[0]->lastdate;
    }
    $output = $copyright;
  }
  echo "Copyright" . $output . ". All rights reserved.<br>";
  echo 'Developed by <a title="Professional Web & Apps Development" alt="Professional Web & Apps Development" target="_blank" style="color:#fff" href="https://markaswebsite.id">Markas Website</a>.';
  // echo 'Developed by <a title="Professional Web & Apps Development" alt="Professional Web & Apps Development" target="_blank" style="color:#fff" href="https://markashosting.com">Markas Hosting</a>.';
}
add_shortcode('copyright', 'comicpress_copyright');

function enqueue_scripts_in_footer()
{

  if (is_page('order-tracking')) {
    wp_enqueue_script('order-tracking-js', get_stylesheet_directory_uri() . '/assets/js/order-tracking-js.js?v' . time());
  }

  // Enqueue your scripts
  wp_enqueue_script('footer-js', get_stylesheet_directory_uri() . '/assets/js/footer-js.js?v' . time());
  wp_enqueue_script('sweetalert2-js', 'https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.all.min.js');

  // wp_enqueue_script('animate-when-iddle', get_stylesheet_directory_uri() . '/assets/js/animate-when-iddle.js?v' . time());

  if (is_shop()) {
    wp_enqueue_script('shop-page-js', get_stylesheet_directory_uri() . '/assets/js/shop-page.js?v' . time());
  }

  if (is_cart()) {
    wp_enqueue_script('cart-page-js', get_stylesheet_directory_uri() . '/assets/js/cart-page.js?v' . time());
    // wp_enqueue_script('sticky-kit-js', 'https://cdn.jsdelivr.net/gh/leafo/sticky-kit@v1.1.2/jquery.sticky-kit.min.js');
  }
  if (is_checkout()) {
    wp_enqueue_script('checkout-js', get_stylesheet_directory_uri() . '/assets/js/checkout-js.js?v' . time());
    wp_enqueue_style('custom-datepicker-js', get_stylesheet_directory_uri() . '/assets/css/datepicker.min.css?v' . time());
    wp_enqueue_script('custom-datepicker-js', get_stylesheet_directory_uri() . '/assets/js/datepicker.min.js?v' . time());
  }
}
add_action('wp_enqueue_scripts', 'enqueue_scripts_in_footer', 20);

// enqueue JavaScript files in the <head> 
function head_scripts()
{
  wp_enqueue_script('head-js', get_stylesheet_directory_uri() . '/assets/js/head-js.js?v' . time());
}
add_action('wp_enqueue_scripts', 'head_scripts');

function add_jquery_migrate()
{
  // Register jQuery Migrate script
  wp_register_script('jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.3.2.min.js', array('jquery'), '3.3.2', true);

  // Enqueue jQuery Migrate script
  wp_enqueue_script('jquery-migrate');
}
add_action('wp_enqueue_scripts', 'add_jquery_migrate');


function _include_custom_script()
{
  // wp_enqueue_script(
  //     'selectric-select-script',
  //     get_stylesheet_directory_uri() . '/lib/js/jquery.selectric.min.js',
  //     array('jquery')
  // );
  // wp_enqueue_script(
  //   'js-mousewheel-script',
  //   get_stylesheet_directory_uri() . '/lib/js/jquery.mousewheel.js',
  //   array( 'jquery' )
  // );
  // wp_enqueue_script(
  //   'jscrollpane-script',
  //   get_stylesheet_directory_uri() . '/lib/js/jquery.jscrollpane.min.js',
  //   array( 'jquery' )
  // );
  // wp_enqueue_script(
  //     'jquery-3.6.0-script',
  //     '//code.jquery.com/jquery-3.6.0.min.js',
  //     array('jquery')
  // );
}
function _include_select_style()
{
  //   if (is_shop()) {
  wp_enqueue_style('sweetalert2-style', 'https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css', false, '1.0', 'all');
  //   }
  // wp_enqueue_style( 'prettify-style', get_stylesheet_directory_uri() . '/lib/css/prettify.css', false, '1.0', 'all' );
}

add_action('wp_head', '_include_select_style');
// add_action('wp_enqueue_scripts', '_include_custom_script');

// disable double child theme
function mywptheme_child_deregister_styles()
{
  wp_dequeue_style('parent-style');
  wp_dequeue_style('panpie-elementor');
  // wp_dequeue_style('panpie-elementor');
}
add_action('wp_enqueue_scripts', 'mywptheme_child_deregister_styles', 999);
add_action('wp_head', 'mywptheme_child_deregister_styles', 999);

// disable plugins update
function filter_plugin_updates_pionet_addons($value)
{
  unset($value->response['piotnet-addons-for-elementor-pro/piotnet-addons-for-elementor-pro.php']);
  return $value;
}
add_filter(
  'site_transient_update_plugins',
  'filter_plugin_updates_pionet_addons'
);

function filter_plugin_updates_smush_pro($value)
{
  unset($value->response['wp-smush-pro/wp-smush.php']);
  return $value;
}
add_filter(
  'site_transient_update_plugins',
  'filter_plugin_updates_smush_pro'
);

function filter_plugin_updates_elementor($value)
{
  unset($value->response['elementor/elementor.php']);
  return $value;
}
add_filter(
  'site_transient_update_plugins',
  'filter_plugin_updates_elementor'
);

function filter_plugin_updates_elementor_pro($value)
{
  unset($value->response['elementor-pro/elementor-pro.php']);
  return $value;
}
add_filter(
  'site_transient_update_plugins',
  'filter_plugin_updates_elementor_pro'
);

function filter_plugin_updates_revslider($value)
{
  unset($value->response['revslider/revslider.php']);
  return $value;
}
add_filter(
  'site_transient_update_plugins',
  'filter_plugin_updates_revslider'
);

function filter_plugin_updates_admin_menu_editor_pro($value)
{
  unset($value->response['admin-menu-editor-pro/menu-editor.php']);
  return $value;
}
add_filter(
  'site_transient_update_plugins',
  'filter_plugin_updates_admin_menu_editor_pro'
);

function filter_plugin_updates_wp_multi_step_checkout_pro($value)
{
  unset($value->response['wp-multi-step-checkout-pro/wp-multi-step-checkout-pro.php']);
  return $value;
}
add_filter(
  'site_transient_update_plugins',
  'filter_plugin_updates_wp_multi_step_checkout_pro'
);

// add favicon to admin dashboard
add_action('admin_head', 'add_my_favicon');
function add_my_favicon()
{
  echo '<link rel="shortcut icon" href=' . get_stylesheet_directory_uri() . '/favicon.png" />';
}

// add css to wp-admin
add_action('admin_head', 'admin_css'); // admin_head is a hook my_custom_fonts is a function we are adding it to the hook
function admin_css()
{
  echo '<style>
    body {
        opacity: 1;
    }
    div#duplicate-post-notice {
        display: none !important;
    }
  </style>';
}

/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 */
remove_action('shutdown', 'wp_ob_end_flush_all', 1);
add_action('shutdown', function () {
  while (ob_get_level()) {
    ob_end_flush();
  }
});

// Create new menu location
function custom_new_menu()
{
  register_nav_menu('footer-menu-one', __('Footer Menu 1'));
  register_nav_menu('footer-menu-two', __('Footer Menu 2'));
  register_nav_menu('cart-menu', __('Cart Menu'));
}
add_action('init', 'custom_new_menu');

// create back button link
function back_button_link()
{
  echo wp_get_referer();
}
add_shortcode("back_link", "back_button_link");

function disable_template_redirect_in_elementor_editor()
{
  if (class_exists('Elementor\Plugin') && \Elementor\Plugin::$instance->editor->is_edit_mode()) {
    return;
    remove_all_actions('template_redirect');
  }
}
add_action('template_redirect', 'disable_template_redirect_in_elementor_editor');


function show_mini_cart()
{
  // if (sizeof( WC()->cart->get_cart() ) > 0 ) { 
  echo '<a href="#" class="dropdown-back" data-toggle="dropdown"> ';
  echo '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
  echo '<div class="basket-item-count" style="display: inline;">';
  echo '<span class="cart-items-count count">';
  echo WC()->cart->get_cart_contents_count();
  echo '</span>';
  echo '</div>';
  echo '</a>';
  echo '<ul class="dropdown-menu dropdown-menu-mini-cart">';
  echo '<li> <div class="widget_shopping_cart_content">';
  woocommerce_mini_cart();
  echo '</div></li></ul>';
  // } else {
  // //  hide
  // }
}
function redirect_after_add_to_cart($url)
{
  if (is_shop()) {
    $url = get_permalink(1); // URL to redirect to (1 is the page ID here)
    $url .= '#summary-order'; // Append the anchor tag to the URL
    echo '
        <script>
                window.location.href = "' . esc_url($url) . '";
        </script>';

    // return false; // Return false to prevent the default WooCommerce redirect
  }
}
// add_filter('woocommerce_add_to_cart_redirect', 'redirect_after_add_to_cart');



add_action('init', 'register_postcode_param');
function register_postcode_param()
{
  global $wp;
  $wp->add_query_var('postcode');
}

function append_query_parameters_to_links($atts, $item, $args)
{
  $atts['href'] = add_query_arg($_GET, $atts['href']);
  return $atts;
}
add_filter('nav_menu_link_attributes', 'append_query_parameters_to_links', 10, 3);

// check delivery page has a postcode query params
function redirect_if_missing_query_params()
{
  $pages = array(
    // Specify the pages you want to check and redirect
    'delivery',
    'checkout',
  );

  $requiredParams = array(
    // Specify the required query parameters
    'postcode',
  );

  global $wp;

  // Get the current page slug
  $currentSlug = $wp->request;

  // Check if the current page matches the specified pages
  if (in_array($currentSlug, $pages)) {
    foreach ($requiredParams as $param) {
      // Check if a required query parameter is missing
      if (!isset($_GET[$param])) {
        // Redirect to a fallback URL or a custom error page
        wp_redirect(home_url('/select-postcode'));
        exit;
      }
    }
  }
}
add_action('template_redirect', 'redirect_if_missing_query_params');

// Display customer postcode
function current_url_query_param_shortcode($atts)
{
  $atts = shortcode_atts(
    array(
      'param' => ''
    ),
    $atts
  );

  // $param_value = '';

  if (!empty($atts['param'])) {
    $query_params = $_GET;
    $param = $atts['param'];

    if (isset($query_params[$param])) {
      $param_value = $query_params[$param];
    }
  }
  if (isset($query_params[$param])) {
    echo "<span class=customer_postcode>Your Postcode is <strong>" . $param_value . "</strong>";
    echo "<a href=" . home_url("select-postcode") . " title='Change your postcode'><i class='fas'>&#xf044;</i></a>";
    echo "</span>";
  }
  // return $param_value;
}
add_shortcode('current_url_query_param', 'current_url_query_param_shortcode');

function exclude_blog_archive_for_home_url()
{
  if (is_home() && !empty($_GET)) {
    wp_redirect(home_url());
    exit;
  }
}
add_action('template_redirect', 'exclude_blog_archive_for_home_url');

function redirect_specific_page()
{
  if (is_page('cart')) { // Replace 'your-source-page-slug' with the slug of the specific source page
    $destinationURL = home_url('/delivery/') . $_SERVER['QUERY_STRING']; // Replace 'your-destination-page-slug' with the slug of the specific destination page
    wp_redirect($destinationURL);
    exit;
  }
}
// add_action('template_redirect', 'redirect_specific_page');


function replace_checkout_button_if_subtotal_under_minimum_order_amount()
{
  // Get the cart subtotal
  $subtotal = WC()->cart->get_subtotal();

  // Convert subtotal to float value
  $subtotal = floatval(preg_replace('#[^\d.]#', '', $subtotal));

  // Retrieve the minimum order amount based on the customer's postcode
  $minimum_order_amount = get_minimum_order_amount_for_postcode();

  // Check if subtotal is less than the minimum order amount
  if ($subtotal < $minimum_order_amount) {
    // Replace the "Proceed to Checkout" button with a custom button
    remove_action('woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20);
    add_action('woocommerce_proceed_to_checkout', 'custom_button_proceed_to_checkout', 20);
  }
}
add_action('template_redirect', 'replace_checkout_button_if_subtotal_under_minimum_order_amount');

function custom_button_proceed_to_checkout()
{
  $minimum_order_amount = __('Based on your postcode, a minimum order of <span class=the-minimum-amount>A$' . get_minimum_order_amount_for_postcode() . '</span> is required.', 'your-text-domain');

  echo '<a href="#" class="button alt no-checkout">' . $minimum_order_amount . '</a>';
}

function get_data_postcode_chetoz()
{
  $data_json = file_get_contents(get_stylesheet_directory() . '/assets/json/postcodes.json');
  $data_array = json_decode($data_json, true);

  return $data_array['postcodes'];
}

function get_minimum_order_amount_for_postcode()
{
  // Define the group array list with possible duplicates
  $group_postcode_list = get_data_postcode_chetoz();

  // Get the current URL query parameters
  $query_params = $_GET;

  // Check if the 'postcode' parameter is present in the query parameters
  if (isset($query_params['postcode'])) {
    $postcode = $query_params['postcode'];

    // Loop through each group in the array
    foreach ($group_postcode_list as $index => $group) {
      // Check if the postcode exists in the current group
      if (in_array($postcode, $group)) {
        // Return a specific value based on the matched group
        // Adjust the condition to match the group index in the JSON array

        // A - Zone 1 - delivery by Australian Post
        if ($index === 0) {
          return 50;
        }

        // A - Zone 2 - delivery by Australian Post
        elseif ($index === 1) {
          return 50;
        }

        // C - Zone 1 - delivery by Chetoz Oz
        elseif ($index === 2) {
          return 4;
        }

        // C - Zone 2 - delivery by Chetoz Oz
        elseif ($index === 3) {
          return 4;
        }

        // C - Zone 3 - delivery by Chetoz Oz
        elseif ($index === 4) {
          return 40;
        }

        // C - Zone 4 - delivery by Chetoz Oz
        elseif ($index === 5) {
          return 50;
        }

        // Add more conditions for other groups if needed
      }
    }
  }

  // Default return value if no match is found
  return 0;
}


// Remove "Mild" attribute option based on query parameter value
function remove_mild_attribute_option()
{
  // Get the group postcode array

  $group_postcode_list_get = get_data_postcode_chetoz();

  $group_postcode_list = array(
    $group_postcode_list_get[0],
    $group_postcode_list_get[1]
  );

  // Get the query parameter value
  $query_param = isset($_GET['postcode']) ? $_GET['postcode'] : '';

  // Check if the query parameter value matches any group in the postcode array
  foreach ($group_postcode_list as $index => $group) {
    if (in_array($query_param, $group)) {
      // Remove the "Mild" option from the "cuko-sauce" attribute for variations
      $attribute_slug = 'cuko-sauce';
      $attribute_taxonomy_name = wc_attribute_taxonomy_name($attribute_slug);
      $terms = get_terms(
        array(
          'taxonomy' => $attribute_taxonomy_name,
          'hide_empty' => false,
        )
      );

      foreach ($terms as $term) {
        if ($term->slug === 'mild') {
          echo '<script type="text/javascript">
                jQuery(document).ready(function($) {
                    $("select[name=\'attribute_pa_cuko-sauce\'] option[value=\'mild\']").hide();
                });
            </script>';
        }
      }

      break;
    }
  }
}
add_action('woocommerce_before_add_to_cart_form', 'remove_mild_attribute_option');

function remove_hide_product_items()
{
  // Get the query parameter value
  $query_param = isset($_GET['postcode']) ? $_GET['postcode'] : '';

  // Define the group postcode lists
  $group_postcode_list_get = get_data_postcode_chetoz();

  //   untuk grouping hide produk ready to eat and remove element di checkout
  $group_postcode_list1 = array(
    $group_postcode_list_get[0],
    $group_postcode_list_get[1]
  );

  // untuk remove element di checkout
  $group_postcode_list2 = array(
    $group_postcode_list_get[2],
    $group_postcode_list_get[3],
    $group_postcode_list_get[4],
    $group_postcode_list_get[5]
  );

  //   untuk remove delivery box message
  $group_postcode_list3 = array(
    $group_postcode_list_get[1]
  );

  // Check if the query parameter value matches any group in the postcode arrays
  $remove_classes = '';

  if (in_array($query_param, array_merge(...$group_postcode_list1))) {
    // For matched postcode, hide specific elements
    $remove_classes .= '.ue-item.hide-product-item, .sydney-delivery-info, ';
  }

  if (in_array($query_param, array_merge(...$group_postcode_list2))) {
    // For matched postcode, hide specific elements
    $remove_classes .= '.interstate-delivery-info, ';
  }

  if (in_array($query_param, array_merge(...$group_postcode_list3))) {
    // For matched postcode, hide specific elements
    
    if (is_checkout()) {
      echo '<script>
        jQuery(document).ready(function($) {
            setInterval(function () {
                $("tr.order-message").addClass("none");
            }, 100);
        });
        </script>';
    }
    
    if (is_cart()) {
      echo '<script>
        jQuery(document).ready(function($) {
            $(".get-free-delivery").removeClass("0");
            $(".get-free-delivery .inner-illustration").removeClass("congrats");
            $(".get-free-delivery .inner-illustration").addClass("shipping-charged");
            
            // Define a flag to track if the replacement has occurred
            var contentReplaced = false;
      
            // Function to replace the content
            function replaceContent() {
            
                // Find the element with class "inner-content"
                var innerContent = $(".get-free-delivery .inner-content");
        
                // Check if the element exists and if the replacement hasnt happened yet
                if (innerContent.length && !contentReplaced) {
                    // Replace the HTML content with the new content
                    innerContent.html("<h2>Information!</h2><p>Delivery fee: $15 charged for your order.</p>");
          
                    // Set the flag to true to indicate that the replacement has occurred
                    contentReplaced = true;
                }
            }
      
            // Call the replaceContent function every 10 milliseconds using setInterval
            setInterval(replaceContent, 10);
        });
    </script>';
    }
  }

  // Remove trailing comma and space
  $remove_classes = rtrim($remove_classes, ', ');

  // Output JavaScript code to remove the elements
  echo '<script type="text/javascript">
          jQuery(document).ready(function($) {
            setInterval(function () {
              $("' . $remove_classes . '").remove();
            }, 10);
          });
        </script>';
}

add_action('wp_footer', 'remove_hide_product_items');

// Modify datepicker in checkout page
function modify_datepicker_value()
{

  if (is_checkout()) {
    // Get the current URL query parameters
    $query_params = $_GET;

    // Check if the 'postcode' parameter is present in the query parameters
    if (isset($query_params['postcode'])) {
      $postcode = $query_params['postcode'];

      $today = new DateTime();

      // Calculate the end date by adding 30 days to the current date
      $endDate = clone $today;
      $endDate->modify('+30 days');

      // Parameter around Wednesday
      $nextWednesday = clone $today;
      $nextWednesday->modify('next Wednesday');
      $lastWednesday = clone $today;
      $lastWednesday->modify('last Wednesday');

      // Parameter around Monday
      $nextMonday = clone $today;
      $nextMonday->modify('next Monday');
      $lastMonday = clone $today;
      $lastMonday->modify('last Monday');

      // Parameter around Tuesday
      $nextTuesday = clone $today;
      $nextTuesday->modify('next Tuesday');
      $lastTuesday = clone $today;
      $lastTuesday->modify('last Tuesday');

      // Difference around Wednesday
      $intervalToNextWednesday = $nextWednesday->getTimestamp() - $today->getTimestamp();
      $intervalToLastWednesday = $today->getTimestamp() - $lastWednesday->getTimestamp();

      // Difference around Monday
      $intervalToNextMonday = $nextMonday->getTimestamp() - $today->getTimestamp();
      $intervalToLastMonday = $today->getTimestamp() - $lastMonday->getTimestamp();

      // Difference around Tuesday
      $intervalToNextTuesday = $nextTuesday->getTimestamp() - $today->getTimestamp();
      $intervalToLastTuesday = $today->getTimestamp() - $lastTuesday->getTimestamp();

      // Calculate the number of hours in 24 hours    
      $hoursIn24Hours = 24 * 60 * 60;

      // Convert the endDate to the required format 'mm/dd/yyyy'
      $endDateFormatted = $endDate->format('m/d/Y');
?>

      <script>
        jQuery(function($) {
          // Initialize the datepicker with filter function and dynamic start/end dates
          $('[data-toggle="datepicker"]').datepicker({
            //   format: 'DD, mm dd, yyyy',
            filter: function(date, view) {
              <?php
              // Get the postcode group data
              $group_postcode_list = get_data_postcode_chetoz();

              foreach ($group_postcode_list as $index => $group) {
                // Check if the postcode exists in the current group
                if (in_array($postcode, $group)) {
                  // Disable specific days based on the group index
                  if ($index === 0 || $index === 1) {
                    if ($intervalToNextMonday < $hoursIn24Hours || $intervalToLastMonday < $hoursIn24Hours || $intervalToNextTuesday < $hoursIn24Hours || $intervalToLastTuesday < $hoursIn24Hours) {
                      // Move the date to next week
                      $today->modify('+1 days');
                    }
                    // enable monday and tuesday only
              ?>if(date.getDay() === 1 || date.getDay() === 2) {
                return true;
              }
              <?php
                  } else if ($index === 2 || $index === 3 || $index === 4 || $index === 5) {
                    if ($intervalToNextWednesday > $hoursIn24Hours || $intervalToLastWednesday > $hoursIn24Hours) {
                      // Move the date to next week
                      $today->modify('+1 days');
                    }
                    // enable wednesday
              ?>if(date.getDay() === 3) {
                return true;
              }
            <?php
                  }
                }
              }
            ?>
            return false;
            },
            startDate: '<?php echo $today->format('m/d/Y'); ?>',
            endDate: '<?php echo $endDateFormatted; ?>',
            autoHide: true
          });
        });
      </script>
  <?php
    }
  }
}
add_action('wp_footer', 'modify_datepicker_value');




// Add custom button below table review order on WooCommerce checkout page
add_action('woocommerce_review_order_after_order_total', 'add_custom_button_below_review_order');
function add_custom_button_below_review_order()
{
  // Get the current URL query parameters
  $query_params = $_SERVER['QUERY_STRING'];

  // Check if the query parameter 'postcode' exists
  if (strpos($query_params, 'postcode=') !== false) {
    // Construct the custom link with the current query parameters
    $custom_link = home_url('cart') . '/?' . $query_params;

    // Output the custom button
    echo '<div class=want-modify-cart>';
    echo '<p>Want modify your delivery cart?</p>';
    echo '<p><a href="' . $custom_link . '" class="custom-button-class">Click here</a></p>';
    echo '</div>';
  }
}

// Hook to display custom extra options product in quick view
add_filter('hook_name_before_single_product', 'thwepof_change_prepare_hook');
function thwepof_change_prepare_hook()
{
  return 'woocommerce_before_add_to_cart_button';
}

// Add order note field before Add to Cart button or around quantity field
function add_order_note_field()
{
  echo '<div class="order-note">';
  echo '<label for="order_note">Order Note (optional)</label>';
  echo '<textarea placeholder="Please use this space to provide any additional information or special requests for your pempek order." name="order_note" id="order_note" rows="3"></textarea>';
  echo '</div>';
}
add_action('woocommerce_before_add_to_cart_button', 'add_order_note_field');

// Save order note to each product item in the cart
function save_order_note_to_cart_item_data($cart_item_data, $product_id, $variation_id, $quantity)
{
  if (!empty($_POST['order_note'])) {
    $cart_item_data['order_note'] = sanitize_text_field($_POST['order_note']);
  }
  return $cart_item_data;
}
add_filter('woocommerce_add_cart_item_data', 'save_order_note_to_cart_item_data', 10, 4);

// Display order note in the cart
function display_order_note_in_cart($item_data, $cart_item)
{
  if (isset($cart_item['order_note'])) {
    $item_data[] = array(
      'key' => 'Order Note',
      'value' => wc_clean($cart_item['order_note']),
      'display' => '',
    );
  }
  return $item_data;
}
add_filter('woocommerce_get_item_data', 'display_order_note_in_cart', 10, 2);





// apply_filters('thwepo_extra_fields_display_position', $positions);
// add_filter('thwepo_extra_fields_display_position', 'th_extra_fields_display_position', 10, 2);
// function th_extra_fields_display_position($positions){
//     $positions['woocommerce_before_add_to_cart_button'] = 'tes';
//     return $positions;
// }

// Empty cart when 'postcode' query parameter changes
function empty_cart_on_postcode_change()
{
  if (isset($_GET['postcode'])) {
    $current_postcode = $_GET['postcode'];
    $previous_postcode = WC()->session->get('previous_postcode');

    // Check if 'postcode' value has changed
    if ($previous_postcode && $previous_postcode !== $current_postcode) {
      // Empty the cart
      WC()->cart->empty_cart();
    }

    // Store the current 'postcode' value for future comparison
    WC()->session->set('previous_postcode', $current_postcode);
  }
}
add_action('template_redirect', 'empty_cart_on_postcode_change');

function add_free_delivery_message()
{
  // Get the current cart subtotal
  $subtotal = WC()->cart->subtotal;

  // Get the dynamic number based on the array values
  $dynamic_number = get_dynamic_number_from_array();

  $message_get_free_delivery = '<div class=\"inner-illustration congrats\"></div><div class=\"inner-content\"><h2>Congratulations!</h2><p>Enjoy free delivery on your order.</p></div>';


  // Check if the subtotal is less than the dynamic number
  if ($subtotal < $dynamic_number) {
    // Calculate the difference needed to reach the dynamic number
    $difference = $dynamic_number - $subtotal;

    // Create the message
    $message = '<div class=\"inner-illustration\"></div><div class=\"inner-content\"><h2>Get Free Delivery!</h2><p>Spend <span class=\"spend-amount\">$' . $difference . '</span> more for free delivery.</p></div>';

    // Output the message as a JavaScript snippet
    echo '<script>jQuery(function($) { $(".e-cart__column.e-cart__column-start").after("<div class=\"get-free-delivery ' . $dynamic_number . '\">" + "' . $message . '" + "</div>"); });</script>';
  } elseif ($subtotal >= $dynamic_number) {

    echo '<script>jQuery(function($) { $(".e-cart__column.e-cart__column-start").after("<div class=\"get-free-delivery ' . $dynamic_number . '\">" + "' . $message_get_free_delivery . '" + "</div>"); });</script>';
  }
  echo '<script>jQuery(function($) { 
        $(document.body).on("updated_cart_totals", function() {
            location.reload();
        });
    });</script>';
}

// get parameter free delivery message 
function get_dynamic_number_from_array()
{
  // Define the group array list with possible duplicates
  $group_postcode_list = get_data_postcode_chetoz();

  // Get the current URL query parameters
  $query_params = $_GET;

  // Check if the 'postcode' parameter is present in the query parameters
  if (isset($query_params['postcode'])) {
    $postcode = $query_params['postcode'];

    // Loop through each group in the array
    foreach ($group_postcode_list as $index => $group) {
      // Check if the postcode exists in the current group
      if (in_array($postcode, $group)) {
        // Return a specific value based on the matched group
        // Adjust the condition to match the group index in the JSON array

        // A - Zone 1 - delivery by Australian Post
        if ($index === 0) {
          return 100;
        }

        // A - Zone 2 - delivery by Australian Post
        elseif ($index === 1) {
          return 0;
        }

        // C - Zone 1 - delivery by Chetoz Oz
        elseif ($index === 2) {
          return 50;
        }

        // C - Zone 2 - delivery by Chetoz Oz
        elseif ($index === 3) {
          return 60;
        }

        // C - Zone 3 - delivery by Chetoz Oz
        elseif ($index === 4) {
          return 70;
        }

        // C - Zone 4 - delivery by Chetoz Oz
        elseif ($index === 5) {
          return 80;
        }

        // Add more conditions for other groups if needed
      }
    }
  }

  // Default return value if no match is found
  return 0;
}
add_action('woocommerce_before_cart', 'add_free_delivery_message');


function redirect_to_select_postcode()
{
  $group_postcode_list = get_data_postcode_chetoz();
  $current_slug = get_post_field('post_name', get_queried_object_id());

  // If the current page has the slug 'select-postcode', do not perform the redirection
  if ($current_slug === 'select-postcode') {
    return;
  }

  // Get the value of the 'postcode' query parameter
  $postcode = isset($_GET['postcode']) ? $_GET['postcode'] : '';
  if (is_shop()) {
    // Check if the postcode is not found in the array
    if (!in_array($postcode, array_merge(...$group_postcode_list))) {
      // Redirect to the 'select-postcode' page
      wp_redirect(home_url('select-postcode'));
      exit;
    }
  }
}
add_action('template_redirect', 'redirect_to_select_postcode');

// Modify WooCommerce variations price display to show lower price only
function modify_variation_price_display($price, $product)
{
  if ($product->is_type('variable')) {
    $variation_prices = $product->get_variation_prices();

    if (!empty($variation_prices['price'])) {
      $min_price = min($variation_prices['price']);
      $price = wc_price($min_price);
    }
  }

  return $price;
}
add_filter('woocommerce_variable_sale_price_html', 'modify_variation_price_display', 10, 2);
add_filter('woocommerce_variable_price_html', 'modify_variation_price_display', 10, 2);

// Add description field to product attributes page
function edit_wc_attribute_description_field($attribute)
{
  $id = isset($_GET['edit']) ? absint($_GET['edit']) : 0;
  $description = $id ? get_option("wc_attribute_description_$id") : '';
  ?>
  <tr class="form-field">
    <th scope="row" valign="top">
      <label for="attribute_description">
        <?php _e('Attribute Description', 'your-textdomain'); ?>
      </label>
    </th>
    <td>
      <textarea name="attribute_description" id="attribute_description" rows="3"><?php echo esc_textarea($description); ?></textarea>
      <p class="description">
        <?php _e('Enter a description for this attribute.', 'your-textdomain'); ?>
      </p>
    </td>
  </tr>
<?php
}
add_action('woocommerce_after_add_attribute_fields', 'edit_wc_attribute_description_field');
add_action('woocommerce_after_edit_attribute_fields', 'edit_wc_attribute_description_field');

function save_wc_attribute_description_field($attribute_id)
{
  if (isset($_POST['attribute_description'])) {
    $description = sanitize_text_field($_POST['attribute_description']);
    update_option("wc_attribute_description_$attribute_id", $description);
  }
}
add_action('woocommerce_attribute_added', 'save_wc_attribute_description_field');
add_action('woocommerce_attribute_updated', 'save_wc_attribute_description_field');

// Display attribute description below variation dropdowns on the frontend
function custom_attribute_label($label, $name, $product)
{
  // Check if we are in the admin area
  if (is_admin()) {
    return $label; // Return the original label unchanged
  }

  $attribute_id = wc_attribute_taxonomy_id_by_name($name);
  $description = get_option("wc_attribute_description_$attribute_id");

  if (!empty($description)) {
    $label .= '<span class="attribute-description-icon" data-tooltip="' . esc_attr($description) . '"> ℹ️</span>';
  }

  return $label;
}
add_filter('woocommerce_attribute_label', 'custom_attribute_label', 10, 3);


function add_view_port()
{
  echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">';
}
add_action('wp_head', 'add_view_port');


// Prevent visitor access product page
function restrict_product_detail_page()
{
  if (is_product()) {
    wp_redirect(home_url()); // Redirect to the homepage or any other desired URL
    exit;
  }
}
add_action('template_redirect', 'restrict_product_detail_page');


// Handle deactivate and auto activate again plugin WP Multi Step Checkout Pro
function reactivate_plugin_after_delay()
{
  // Check if the current page is the checkout page
  if (is_checkout()) {
    // Delay the reactivation of plugins using a WordPress transient
    if (!get_transient('plugin_reactivation_delay')) {
      set_transient('plugin_reactivation_delay', true, 5); // 5 seconds delay, adjust as needed

      // Reactivate the plugins after the delay
      deactivate_plugins('wp-multi-step-checkout-pro/wp-multi-step-checkout-pro.php');
      activate_plugin('wp-multi-step-checkout-pro/wp-multi-step-checkout-pro.php');

      deactivate_plugins('wps-hide-login/wps-hide-login.php');
      activate_plugin('wps-hide-login/wps-hide-login.php');
    }
  }
}
add_action('admin_init', 'reactivate_plugin_after_delay');


add_filter('woocommerce_currency_symbol', 'change_woocommerce_currency_symbol', 10, 2);

function change_woocommerce_currency_symbol($currency_symbol, $currency)
{
  // Replace 'AUD' with your desired currency code
  if ($currency === 'AUD') {
    // Replace '₱' with your custom currency symbol
    $currency_symbol = 'A$';
  }
  return $currency_symbol;
}

function remove_product_link_in_order_table($product_name, $product, $is_visible)
{
  if (is_admin() && !empty($product) && $is_visible) {
    $product_name = $product->get_name();
  }
  return $product_name;
}
add_filter('woocommerce_order_item_name', 'remove_product_link_in_order_table', 10, 3);

function add_custom_order_information()
{
  echo '<div class="custom-order-information">';
  echo '<p>Thank you for your order. An email with details of your order has been sent to your inbox. If you do not receive the email within an hour, please <a href="' . esc_url(get_permalink(wc_get_page_id('contact'))) . '">contact us.</a></p>';
  echo '<a href="' . esc_url(get_permalink(wc_get_page_id('shop'))) . '" class="button">Would you like the delivery to a different address? Click here</a>';
  echo '</div>';
}
add_action('woocommerce_thankyou', 'add_custom_order_information', 20);


function add_edit_product_button()
{
  // Show the edit button only for admin and shop manager roles
  if (current_user_can('edit_products')) {
    // Change the button text to include the Font Awesome icon
    echo '<a target="_blank" href="' . get_edit_post_link() . '" class="edit-product-button button">';
    echo '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> ' . __(' Edit Product', 'text-domain');
    echo '</a>';
  }
}
add_action('woocommerce_before_add_to_cart_button', 'add_edit_product_button');

// Add custom tax 'Surcharge' Chetoz
// Define the tax rate as a constant (1.75%)
define('CUSTOM_TAX_RATE', 0.0175);
$tax_label = __('Surcharge Card Payment', 'text-domain');

// Add the custom tax to the order total
add_action('woocommerce_cart_calculate_fees', 'add_custom_tax_to_order_total');
function add_custom_tax_to_order_total($cart)
{
  if (is_admin() && !defined('DOING_AJAX')) {
    return;
  }

  global $tax_label;

  // Check the chosen payment method
  $chosen_payment_method = WC()->session->get('chosen_payment_method');

  // Calculate the tax amount
  $subtotal = $cart->subtotal; // Total order (subtotal)
  $tax_amount = ($subtotal / 0.9825) + 0.306 - $subtotal;

  // If PayID is chosen or tax amount is zero, set the tax amount to zero
  if ($chosen_payment_method === 'payid_payment' || $tax_amount === 0) {
    $tax_amount = 0;
    $tax_amount_formatted = __('Free Surcharge', 'text-domain');
  } else {
    // Format the tax amount to three decimal places with comma as a thousand separator
    $tax_amount_formatted = number_format($tax_amount, 3);
  }

  // Add the custom tax as a fee to the order
  $cart->add_fee($tax_label, $tax_amount_formatted, true);
}

// Display the custom tax in the review order table
add_action('woocommerce_review_order_after_order_total', 'display_custom_tax_in_review_order_table');
function display_custom_tax_in_review_order_table()
{
  global $tax_label;

  $order = wc_get_order(wc_get_order_id_by_order_key($_POST['woocommerce-order-key']));

  if ($order) {
    // Calculate the tax amount for the order
    $subtotal = $order->get_subtotal(); // Total order (subtotal)

    // Check the chosen payment method
    $chosen_payment_method = WC()->session->get('chosen_payment_method');

    // Calculate the tax amount
    $tax_amount = ($subtotal / 0.9825) + 0.306 - $subtotal;

    // If PayID is chosen or tax amount is zero, set the tax amount to zero
    if ($chosen_payment_method === 'payid_payment' || $tax_amount === 0) {
      $tax_amount = 0;
      $tax_amount_formatted = __('Free Surcharge', 'text-domain');
    } else {
      // Format the tax amount to three decimal places with comma as a thousand separator
      $tax_amount_formatted = number_format($tax_amount, 3);
    }

    // Display the custom tax row in the review order table
    echo '<tr class="custom-tax-row"><th>' . $tax_label . '</th><td>' . wc_price($tax_amount_formatted) . '</td></tr>';
  }
}

// Update the order review table when payment method changes
add_action('woocommerce_review_order_before_payment', 'update_order_review_table');
add_action('woocommerce_after_checkout_form', 'update_order_review_table');
function update_order_review_table()
{
  wc_enqueue_js('
        jQuery("form.checkout").on("change", "input[name=payment_method]", function(){
            jQuery("body").trigger("update_checkout");
        });
    ');
}

function redirect_cart_to_shop_with_query_params()
{
  // Check if the current page is the cart page
  if (is_cart()) {
    // Get the current query parameters from the URL
    $current_params = $_SERVER['QUERY_STRING'];

    // Check if the cart page already has query parameters
    if (empty($current_params)) {
      // Redirect to the shop page with the current query parameters
      wp_redirect(get_permalink(wc_get_page_id('shop')) . '?' . $current_params);
      exit;
    }
  }
}
add_action('template_redirect', 'redirect_cart_to_shop_with_query_params');

function custom_back_button_shortcode()
{
  // SVG icon for the back arrow
  $back_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>';

  return '<a href="javascript:void(0);" onclick="history.back();" class="back-button">' . $back_icon . ' Add more products</a>';
}
add_shortcode('back_button', 'custom_back_button_shortcode');

// Step 1: Add custom field 'Select Delivery Day' as datepicker to billing details
function custom_checkout_field_datepicker($checkout)
{
  woocommerce_form_field('delivery_day', array(
    'type' => 'text',
    'class' => array('form-row-wide'),
    'label' => __('Select Delivery Day'),
    'required' => true,
    'custom_attributes' => array(
      'autocomplete' => 'off',
      'readonly' => 'readonly',
      'data-toggle' => 'datepicker', // Add the data-toggle attribute here
    ),
  ), $checkout->get_value('delivery_day')); // Include the default value

}

add_action('woocommerce_after_checkout_billing_form', 'custom_checkout_field_datepicker');

// Step 5: Save the selected date to the order's additional notes
function custom_save_datepicker_to_order_notes($order_id)
{
  if (isset($_POST['delivery_day']) && !empty($_POST['delivery_day'])) {
    $delivery_day = sanitize_text_field($_POST['delivery_day']);
    $order = wc_get_order($order_id);
    $order->set_customer_note('<strong>Delivery Date:</strong><br>' . $delivery_day);
    $order->save();
  }
}
add_action('woocommerce_checkout_update_order_meta', 'custom_save_datepicker_to_order_notes');

function redirect_empty_cart_to_shop_with_postcode_parameter() {
    if (is_cart() && WC()->cart->is_empty()) {
        $postcode = isset($_GET['postcode']) ? $_GET['postcode'] : '';
        $shop_url = get_permalink(get_option('woocommerce_shop_page_id'));

        // Add the postcode as a query parameter to the shop URL
        $redirect_url = add_query_arg('postcode', $postcode, $shop_url);

        wp_redirect($redirect_url);
        exit;
    }
}
add_action('template_redirect', 'redirect_empty_cart_to_shop_with_postcode_parameter');

