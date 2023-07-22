<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'tgmpa_register', 'panpie_register_required_plugins' );
function panpie_register_required_plugins() {
	$plugins = array(
		// Bundled
		array(
			'name'         => 'Panpie Core',
			'slug'         => 'panpie-core',
			'source'       => 'panpie-core.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '2.5'
		),
		array(
			'name'         => 'RT Framework',
			'slug'         => 'rt-framework',
			'source'       => 'rt-framework.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '2.4'
		),
		array(
			'name'         => 'RT Demo Importer',
			'slug'         => 'rt-demo-importer',
			'source'       => 'rt-demo-importer.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '5.0.0'
		),
		array(
			'name'         => 'Slider Revolution',
			'slug'         => 'revslider',
			'source'       => 'revslider.zip',
			'required'     => false,
			'external_url' => 'https://revolution.themepunch.com',
			'version'      => '6.6.8'
		),
		array(
			'name'     => 'Variation Swatches for WooCommerce',
			'slug'     => 'woo-product-variation-swatches',
			'required' => true,
		),
		array(
			'name'         => 'Variation Swatches for WooCommerce Pro',
			'slug'         => 'woo-product-variation-swatches-pro',
			'source'       => 'woo-product-variation-swatches-pro.zip',
			'required'     => true,
			'external_url' => 'https://radiustheme.com',
			'version'      => '2.2.1'
		),
		array(
			'name'     => 'WooCommerce Variation images gallery',
			'slug'     => 'woo-product-variation-gallery',
			'required' => true,
		),
		array(
			'name'         => 'Variation Images Gallery for WooCommerce Pro',
			'slug'         => 'woo-product-variation-gallery-pro',
			'source'       => 'woo-product-variation-gallery-pro.zip',
			'required'     => true,
			'external_url' => 'https://radiustheme.com',
			'version'      => '2.2.2'
		),		
		array(
			'name'     => 'Food Menu',
			'slug'     => 'tlp-food-menu',
			'required' => true,
		),
		array(
			'name'         => 'Food Menu Pro',
			'slug'         => 'food-menu-pro',
			'source'       => 'food-menu-pro.zip',
			'required'     => true,
			'external_url' => 'https://radiustheme.com/',
			'version'      => '4.0.1'
		),
		array(
			'name'     		=> 'Review Schema',
			'slug'     		=> 'review-schema',
			'required' 		=> false,
		),
		array(
			'name'         => 'Review Schema Pro',
			'slug'         => 'review-schema-pro',
			'source'       => 'review-schema-pro.zip',
			'required'     => false,
			'version'      => '1.1.1'
		),
		// Repository
		array(
			'name'     => 'Breadcrumb NavXT',
			'slug'     => 'breadcrumb-navxt',
			'required' => true,
		),
		array(
			'name'     => 'Elementor Page Builder',
			'slug'     => 'elementor',
			'required' => true,
		),		
		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false,
		),
		array(
			'name'     => 'WP Fluent Forms',
			'slug'     => 'fluentform',
			'required' => false,
		),
		array(
			'name'     => 'MailChimp for WordPress',
			'slug'     => 'mailchimp-for-wp',
			'required' => false,
		),
		
	);

	$config = array(
		'id'           => 'panpie',                 	// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => PANPIE_PLUGINS_DIR,       	// Default absolute path to bundled plugins.
		'menu'         => 'panpie-install-plugins', 	// Menu slug.
		'has_notices'  => true,                    		// Show admin notices or not.
		'dismissable'  => true,                    		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   		// Automatically activate plugins after installation or not.
		'message'      => '',                      		// Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}