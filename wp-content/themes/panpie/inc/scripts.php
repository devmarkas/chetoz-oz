<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Plugin; 


function panpie_get_maybe_rtl( $filename ){
	$file = get_template_directory_uri() . '/assets/';
	if ( is_rtl() ) {
		return $file . 'rtl-css/' . $filename;
	}
	else {
		return $file . 'css/' . $filename;
	}
}
add_action( 'wp_enqueue_scripts','panpie_enqueue_high_priority_scripts', 1500 );
function panpie_enqueue_high_priority_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'rtlcss', PANPIE_CSS_URL . 'rtl.css', array(), PANPIE_VERSION );
	}
}

add_action( 'wp_enqueue_scripts', 'panpie_register_scripts', 12 );
if ( !function_exists( 'panpie_register_scripts' ) ) {
	function panpie_register_scripts(){
		wp_deregister_style( 'font-awesome' );
        wp_deregister_style( 'layerslider-font-awesome' );
        wp_deregister_style( 'yith-wcwl-font-awesome' );

		/*CSS*/
		// owl.carousel CSS
		wp_register_style( 'owl-carousel',       PANPIE_CSS_URL . 'owl.carousel.min.css', array(), PANPIE_VERSION );
		wp_register_style( 'owl-theme-default',  PANPIE_CSS_URL . 'owl.theme.default.min.css', array(), PANPIE_VERSION );		
		wp_register_style( 'magnific-popup',     panpie_get_maybe_rtl('magnific-popup.css'), array(), PANPIE_VERSION );
		// Swiper CSS
		wp_register_style( 'swiper-slider',      panpie_get_maybe_rtl('swiper.min.css'), array(), PANPIE_VERSION );
		wp_register_style( 'animate',        	 panpie_get_maybe_rtl('animate.min.css'), array(), PANPIE_VERSION );
		wp_register_style( 'multiscroll',        panpie_get_maybe_rtl('jquery.multiscroll.min.css'), array(), PANPIE_VERSION );


		/*JS*/
		// owl.carousel.min js
		wp_register_script( 'owl-carousel',      PANPIE_JS_URL . 'owl.carousel.min.js', array( 'jquery' ), PANPIE_VERSION, true );
		
		// counter js
		wp_register_script( 'rt-waypoints',      PANPIE_JS_URL . 'waypoints.min.js', array( 'jquery' ), PANPIE_VERSION, true );
		wp_register_script( 'counterup',         PANPIE_JS_URL . 'jquery.counterup.min.js', array( 'jquery' ), PANPIE_VERSION, true );
		wp_register_script( 'knob',         	 PANPIE_JS_URL . 'jquery.knob.js', array( 'jquery' ), PANPIE_VERSION, true );
		wp_register_script( 'appear',         	 PANPIE_JS_URL . 'jquery.appear.js', array( 'jquery' ), PANPIE_VERSION, true );
		
		// magnific popup
		wp_register_script( 'magnific-popup',    PANPIE_JS_URL . 'jquery.magnific-popup.min.js', array( 'jquery' ), PANPIE_VERSION, true );
		// theia sticky
		wp_register_script( 'theia-sticky',    	 PANPIE_JS_URL . 'theia-sticky-sidebar.min.js', array( 'jquery' ), PANPIE_VERSION, true );
		// Swiper Slider
		wp_register_script( 'swiper-slider',     PANPIE_JS_URL . 'swiper.min.js', array( 'jquery' ), PANPIE_VERSION, true );
		wp_register_script( 'isotope-pkgd',      PANPIE_JS_URL . 'isotope.pkgd.min.js', array( 'jquery' ), PANPIE_VERSION, true );
		
		// Split slider
		wp_register_script( 'multiscroll',      PANPIE_JS_URL . 'jquery.multiscroll.min.js', array( 'jquery' ), PANPIE_VERSION, true );
		wp_register_script( 'rt-easings',      PANPIE_JS_URL . 'jquery.easings.min.js', array( 'jquery' ), PANPIE_VERSION, true );
		
		// parallax scroll js
		wp_register_script( 'parallax-scroll',   PANPIE_JS_URL . 'jquery.parallax-scroll.js', array( 'jquery' ), PANPIE_VERSION, true );
		
		// wow js
		wp_register_script( 'rt-wow',   		 PANPIE_JS_URL . 'wow.min.js', array( 'jquery' ), PANPIE_VERSION, true );
	}
}

add_action( 'wp_enqueue_scripts', 'panpie_enqueue_scripts', 15 );
if ( !function_exists( 'panpie_enqueue_scripts' ) ) {
	function panpie_enqueue_scripts() {
		$dep = array( 'jquery' );
		/*CSS*/
		// Google fonts
		wp_enqueue_style( 'panpie-gfonts', 		PanpieTheme_Helper::fonts_url(), array(), PANPIE_VERSION );
		// Bootstrap CSS  //@rtl
		wp_enqueue_style( 'bootstrap', 			panpie_get_maybe_rtl('bootstrap.min.css'), array(), PANPIE_VERSION );
		
		// Flaticon CSS
		wp_enqueue_style( 'flaticon-panpie',    PANPIE_ASSETS_URL . 'fonts/flaticon-panpie/flaticon.css', array(), PANPIE_VERSION );
		
		elementor_scripts();
		//Video popup
		wp_enqueue_style( 'magnific-popup' );
		// font-awesome CSS
		wp_enqueue_style( 'font-awesome',       PANPIE_CSS_URL . 'font-awesome.min.css', array(), PANPIE_VERSION );
		// animate CSS
		wp_enqueue_style( 'animate',            panpie_get_maybe_rtl('animate.min.css'), array(), PANPIE_VERSION );	
		// Select 2 CSS
		wp_enqueue_style( 'select2',            panpie_get_maybe_rtl('select2.min.css'), array(), PANPIE_VERSION );		
		// main CSS // @rtl
		wp_enqueue_style( 'panpie-default',    	panpie_get_maybe_rtl('default.css'), array(), PANPIE_VERSION );
		// vc modules css
		wp_enqueue_style( 'panpie-elementor',   panpie_get_maybe_rtl('elementor.css'), array(), PANPIE_VERSION );
			
		// Style CSS
		wp_enqueue_style( 'panpie-style',     	panpie_get_maybe_rtl('style.css'), array(), PANPIE_VERSION );
		
		// Template Style
		wp_add_inline_style( 'panpie-style',   	panpie_template_style() );

		/*JS*/
		wp_enqueue_script( 'isotope-pkgd' );
		// bootstrap js
		wp_enqueue_script( 'popper',            PANPIE_JS_URL . 'popper.js', array( 'jquery' ), PANPIE_VERSION, true );
		// bootstrap js
		wp_enqueue_script( 'bootstrap',         PANPIE_JS_URL . 'bootstrap.min.js', array( 'jquery' ), PANPIE_VERSION, true );
		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		// Select2 js
		wp_enqueue_script( 'select2',           PANPIE_JS_URL . 'select2.min.js', array( 'jquery' ), PANPIE_VERSION, true );
		// Countdown
		wp_enqueue_script( 'countdown',      	PANPIE_JS_URL . 'jquery.countdown.min.js', array( 'jquery' ), PANPIE_VERSION, true );
		// Cookie js
		wp_enqueue_script( 'cookie',       		PANPIE_JS_URL . 'js.cookie.min.js', array( 'jquery' ), PANPIE_VERSION, true );
		
		wp_enqueue_script( 'theia-sticky' );
		wp_enqueue_script( 'magnific-popup' );
		wp_enqueue_script( 'rt-wow' );
		
		if ( is_singular() ) {
			wp_enqueue_style( 'swiper-slider' );
			wp_enqueue_script( 'swiper-slider' );		
		}
		
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'panpie-main',    	PANPIE_JS_URL . 'main.js', $dep , PANPIE_VERSION, true );
		
		if( !empty( PanpieTheme::$options['logo'] ) ) {
			$logo_dark = wp_get_attachment_image( PanpieTheme::$options['logo'], 'full' );
			$logo = $logo_dark;
		}else {
			$logo = "<img width='92' height='39' loading='lazy' class='logo-small' src='" . PANPIE_IMG_URL . 'logo.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>"; 
		}
		
		// localize script
		$panpie_localize_data = array(
			'stickyMenu' 	=> PanpieTheme::$options['sticky_menu'],
			'meanWidth'    => PanpieTheme::$options['resmenu_width'],
			'siteLogo'   	=> '<a href="' . esc_url( home_url( '/' ) ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">' . esc_html ( $logo ) . '</a>',
			'extraOffset' => PanpieTheme::$options['sticky_menu'] ? 70 : 0,
			'extraOffsetMobile' => PanpieTheme::$options['sticky_menu'] ? 52 : 0,
			'rtl' => is_rtl()?'yes':'no',
			
			// Ajax
			'ajaxURL' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce( 'panpie-nonce' )
		);
		wp_localize_script( 'panpie-main', 'panpieObj', $panpie_localize_data );
	}	
}

function elementor_scripts() {
	
	if ( !did_action( 'elementor/loaded' ) ) {
		return;
	}
	
	if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		// do stuff for preview
		wp_enqueue_style(  'owl-carousel' );
		wp_enqueue_style(  'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );
		
		wp_enqueue_style( 'timepicker-css' );
		wp_enqueue_script( 'timepicker-js' );
		
		wp_enqueue_script( 'knob' );
		wp_enqueue_script( 'appear' );
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'rt-waypoints' );		
		wp_enqueue_script( 'rt-wow' );
		
	} 
}

add_action( 'wp_enqueue_scripts', 'panpie_high_priority_scripts', 1500 );
if ( !function_exists( 'panpie_high_priority_scripts' ) ) {
	function panpie_high_priority_scripts() {
		// Dynamic style
		PanpieTheme_Helper::dynamic_internal_style();
	}
}

function panpie_template_style(){
	ob_start();
	?>
	
	.entry-banner {
		<?php if ( PanpieTheme::$bgtype == 'bgcolor' ): ?>
			background-color: <?php echo esc_html( PanpieTheme::$bgcolor );?>;
		<?php else: ?>
			background: url(<?php echo esc_url( PanpieTheme::$bgimg );?>) no-repeat scroll center bottom / cover;
		<?php endif; ?>
	}

	.content-area {
		padding-top: <?php echo esc_html( PanpieTheme::$padding_top );?>px; 
		padding-bottom: <?php echo esc_html( PanpieTheme::$padding_bottom );?>px;
	}
	<?php if( isset( PanpieTheme::$pagebgimg ) && !empty( PanpieTheme::$pagebgimg ) ) { ?>
	#page .content-area {
		background-image: url( <?php echo PanpieTheme::$pagebgimg; ?> );
		background-color: <?php echo PanpieTheme::$pagebgcolor; ?>;
	}
	<?php } ?>
	.error-page-area .error-page-content {		 
		background-color: <?php echo esc_html( PanpieTheme::$options['error_bodybg'] );?>;
	}
	
	<?php
	return ob_get_clean();
}

function load_custom_wp_admin_script_gutenberg() {
	wp_enqueue_style( 'panpie-gfonts', PanpieTheme_Helper::fonts_url(), array(), PANPIE_VERSION );
	// font-awesome CSS
	wp_enqueue_style( 'font-awesome',       PANPIE_CSS_URL . 'font-awesome.min.css', array(), PANPIE_VERSION );
	// Flaticon CSS
	wp_enqueue_style( 'flaticon-panpie',    PANPIE_ASSETS_URL . 'fonts/flaticon-panpie/flaticon.css', array(), PANPIE_VERSION );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script_gutenberg', 1 );

function load_custom_wp_admin_script() {
	wp_enqueue_style( 'panpie-admin-style',  PANPIE_CSS_URL . 'admin-style.css', false, PANPIE_VERSION );
	wp_enqueue_script( 'panpie-admin-main',  PANPIE_JS_URL . 'admin.main.js', false, PANPIE_VERSION, true );
	
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script' );
