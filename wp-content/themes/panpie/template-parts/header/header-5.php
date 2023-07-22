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
				<div class="menu-wrap">
					<div id="site-navigation" class="main-navigation">
						<?php wp_nav_menu( $nav_menu_args );?>
					</div>
				</div>
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo wp_kses( $panpie_dark_logo, 'allow_link' ); ?></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo wp_kses( $panpie_light_logo, 'allow_link' ); ?></a>
				</div>
				<?php if ( PanpieTheme::$options['phone'] || PanpieTheme::$options['cart_icon'] && class_exists( 'WC_Widget_Cart' ) || PanpieTheme::$options['search_icon'] ) { ?>
				<div class="header-icon-area">
					<?php if ( PanpieTheme::$options['phone'] ) { ?>
					<div class="contact-info">
						<div class="icon-left">
						<i class="fas fa-phone-volume"></i>
						</div>
						<div class="info"><span class="info-label"><?php $header_hotline_txt = PanpieTheme::$options['header_hotline_txt'];
						if ( !empty( $header_hotline_txt ) ){ echo esc_html( $header_hotline_txt ); } else { esc_html_e( 'Any Question', 'panpie' ); } ?>: </span><span class="info-text"><a href="tel:<?php echo esc_attr( PanpieTheme::$options['phone'] );?>"><?php echo wp_kses( PanpieTheme::$options['phone'] , 'alltext_allow' );?></a></span></div>
					</div>
					<?php } ?>
					<?php if ( PanpieTheme::$options['cart_icon'] && class_exists( 'WC_Widget_Cart' ) ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'cart' );?>
					<?php } ?>
					<?php if ( PanpieTheme::$options['search_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'search' );?>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>