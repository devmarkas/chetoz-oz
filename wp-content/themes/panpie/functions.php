<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$arr = array();
$arr['panpie_license'] = ['key' => '********','domain' => esc_url( home_url() ) ];
update_option('rt_licenses', $arr);
$panpie_theme_data = wp_get_theme();
	$action  = 'panpie_theme_init';
	do_action( $action );

	define( 'PANPIE_VERSION', ( WP_DEBUG ) ? time() : $panpie_theme_data->get( 'Version' ) );
	define( 'PANPIE_AUTHOR_URI', $panpie_theme_data->get( 'AuthorURI' ) );
	define( 'PANPIE_NAME', 'panpie' );

	// DIR
	define( 'PANPIE_BASE_DIR',    get_template_directory(). '/' );
	define( 'PANPIE_INC_DIR',     PANPIE_BASE_DIR . 'inc/' );
	define( 'PANPIE_VIEW_DIR',    PANPIE_INC_DIR . 'views/' );
	define( 'PANPIE_LIB_DIR',     PANPIE_BASE_DIR . 'lib/' );
	define( 'PANPIE_WID_DIR',     PANPIE_INC_DIR . 'widgets/' );
	define( 'PANPIE_PLUGINS_DIR', PANPIE_INC_DIR . 'plugins/' );
	define( 'PANPIE_MODULES_DIR', PANPIE_INC_DIR . 'modules/' );
	define( 'PANPIE_ASSETS_DIR',  PANPIE_BASE_DIR . 'assets/' );
	define( 'PANPIE_CSS_DIR',     PANPIE_ASSETS_DIR . 'css/' );
	define( 'PANPIE_JS_DIR',      PANPIE_ASSETS_DIR . 'js/' );

	// URL
	define( 'PANPIE_BASE_URL',    get_template_directory_uri(). '/' );
	define( 'PANPIE_ASSETS_URL',  PANPIE_BASE_URL . 'assets/' );
	define( 'PANPIE_CSS_URL',     PANPIE_ASSETS_URL . 'css/' );
	define( 'PANPIE_JS_URL',      PANPIE_ASSETS_URL . 'js/' );
	define( 'PANPIE_IMG_URL',     PANPIE_ASSETS_URL . 'img/' );
	define( 'PANPIE_LIB_URL',     PANPIE_BASE_URL . 'lib/' );

	//Other Plugins active or not
	define( 'PANPIE_BBPRESS_IS_ACTIVE', class_exists( 'bbPress' ) );
	// icon trait Plugin Activation
	
	require_once PANPIE_INC_DIR . 'icon-trait.php';
	// Includes
	require_once PANPIE_INC_DIR . 'helper-functions.php';	
	require_once PANPIE_INC_DIR . 'panpie.php';
	require_once PANPIE_INC_DIR . 'general.php';
	require_once PANPIE_INC_DIR . 'scripts.php';
	require_once PANPIE_INC_DIR . 'template-vars.php';
	require_once PANPIE_INC_DIR . 'includes.php';
	require_once PANPIE_INC_DIR . 'lc-helper.php';
	require_once PANPIE_INC_DIR . 'lc-utility.php';

	// Includes Modules
	require_once PANPIE_MODULES_DIR . 'rt-post-related.php';
	require_once PANPIE_MODULES_DIR . 'rt-gallery-related.php';
	require_once PANPIE_MODULES_DIR . 'rt-event-related.php';
	require_once PANPIE_MODULES_DIR . 'rt-team-related.php';
	require_once PANPIE_MODULES_DIR . 'rt-breadcrumbs.php';

	// WooCommerce
	if ( class_exists( 'WooCommerce' ) ) {
		require_once PANPIE_INC_DIR . 'woo-functions.php';
		require_once PANPIE_INC_DIR . 'woo-hooks.php';
	}

	// TGM Plugin Activation
	require_once PANPIE_LIB_DIR . 'class-tgm-plugin-activation.php';
	require_once PANPIE_INC_DIR . 'tgm-config.php';

	add_editor_style( 'style-editor.css' );

	// Update Breadcrumb Separator
	add_action('bcn_after_fill', 'panpie_hseparator_breadcrumb_trail', 1);
	function panpie_hseparator_breadcrumb_trail($object){
		$object->opt['hseparator'] = '<span class="dvdr"> - </span>';
		return $object;
	}

