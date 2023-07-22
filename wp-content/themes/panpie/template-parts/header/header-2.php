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
	<div class="header-menu menu-layout2" id="header-menu">
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
				<div class="info-wrap">
				<?php get_template_part( 'template-parts/header/icon', 'area' );?>
					<?php if ( PanpieTheme::$options['phone'] ) { ?>
					<div class="header-phone">
						<div class="info"><a href="tel:<?php echo esc_attr( PanpieTheme::$options['phone'] );?>"><i class="fas fa-phone-alt"></i><?php echo wp_kses( PanpieTheme::$options['phone'] , 'alltext_allow' );?></a></div>
					<?php } ?>
					</div>				
				</div>			
			</div>
		</div>
	</div>
</div>