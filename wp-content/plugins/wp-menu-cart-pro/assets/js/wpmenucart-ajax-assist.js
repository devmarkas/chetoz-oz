/* This script is intended for sites with server side caching enabled - normally the classes in the menu would follow the cart state */
jQuery( function( $ ) {
	/* Cart Hiding */
	if ( typeof wpmenucart_ajax_assist.shop_plugin !== 'undefined' && wpmenucart_ajax_assist.shop_plugin.toLowerCase() == 'woocommerce' ) {
		// update on page load
		wpmenucart_update_menu_classes();
		// update when cart is updated
		$( document.body ).on( 'adding_to_cart added_to_cart updated_wc_div', wpmenucart_update_menu_classes );
	}

	function wpmenucart_update_menu_classes() {
		if ( typeof window.Cookies !== 'undefined' ) { // WC3.0
			items_in_cart = Cookies.get( 'woocommerce_items_in_cart' );
		} else if ( typeof $.cookie !== 'undefined' && $.isFunction($.cookie) ){ // WC2.X
			items_in_cart = $.cookie( 'woocommerce_items_in_cart' );
		} else {
			return; // no business here
		}

		if ( items_in_cart > 0 ) {
			$('.empty-wpmenucart-visible').removeClass('empty-wpmenucart-visible');
			$('.empty-wpmenucart').removeClass('empty-wpmenucart');
			$('li.wpmenucart').removeClass('empty');
			$('.wpmenucart-floating-cart').removeClass('empty');
			$('.wpmenucart-floating-contents').removeClass('empty-wpmenucart-floating-visible');
		} else {
			if ( !(wpmenucart_ajax_assist.always_display) ) {
				$('.wpmenucart-floating-cart').addClass('empty');
				$('li.wpmenucart').addClass('empty');
				$('.wpmenucartli').addClass('empty-wpmenucart');
				$('.wpmenucart-shortcode').addClass('empty-wpmenucart');
			} else {
				$('wpmenucart-contents').addClass('empty-wpmenucart-visible');
				$('.wpmenucart-floating-contents').addClass('empty-wpmenucart-floating-visible');
			}
		}
	}
});