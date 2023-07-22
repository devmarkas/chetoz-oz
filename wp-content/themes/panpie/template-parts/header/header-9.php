<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = PanpieTheme_Helper::nav_menu_args();
$panpie_socials = PanpieTheme_Helper::socials();
// Logo

if( !empty( PanpieTheme::$options['logo'] ) ) {
	$logo_dark = wp_get_attachment_image( PanpieTheme::$options['logo'], 'full' );
	$panpie_dark_logo = $logo_dark;
}else {
	$panpie_dark_logo = "<img width='600' height='218' src='" . PANPIE_IMG_URL . 'logo-dark.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "' loading='lazy'>"; 
}

if( !empty( PanpieTheme::$options['logo_light'] ) ) {
	$logo_lights = wp_get_attachment_image( PanpieTheme::$options['logo_light'], 'full' );
	$panpie_light_logo = $logo_lights;
}else {
	$panpie_light_logo = "<img width='600' height='218' src='" . PANPIE_IMG_URL . 'logo-light.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

?>
<div class="masthead-container mobile-menu">
	<div id="rt-sticky-placeholder"></div>
	<div class="header-menu menu-layout5" id="header-menu">
		<div class="container">
			<div class="menu-full-wrap">
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $panpie_dark_logo, 'allow_link' ); ?></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $panpie_light_logo, 'allow_link' ); ?></a>
				</div>
				<div class="menu-wrap">
					<div id="site-navigation" class="main-navigation">
						<?php wp_nav_menu( $nav_menu_args );?>
					</div>
				</div>	
				<?php if ( PanpieTheme::$options['online_button'] == '1' || PanpieTheme::$options['cart_icon'] && class_exists( 'WC_Widget_Cart' ) ) { ?>
				<div class="header-icon-area">	
					<?php if ( PanpieTheme::$options['cart_icon'] && class_exists( 'WC_Widget_Cart' ) ) { ?>
						<?php get_template_part( 'template-parts/header/icon', 'cart' );?>
						<?php } ?>
					<?php if ( PanpieTheme::$options['online_button'] == '1' ) { ?>
					<div class="header-button">
						<a class="btn-fill-dark" target="_self" href="<?php echo esc_url( PanpieTheme::$options['online_button_link']  );?>"><i class="fas fa-shopping-cart"></i><?php echo esc_html( PanpieTheme::$options['online_button_text'] );?></a>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>