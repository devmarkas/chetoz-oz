<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = PanpieTheme_Helper::nav_menu_args();

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
<div class="masthead-container mobile-menu" id="header-top-fix">
	<div class="container">
		<div class="header-3-wrap">
			<?php if ( PanpieTheme::$options['phone'] ) { ?>
			<div class="info-wrap">			
				
					<div class="icon-left">
					<i class="flaticon-phone-call"></i>
					</div>
					<div class="info"><span><?php $header_hotline_txt = PanpieTheme::$options['header_hotline_txt'];
					if ( !empty( $header_hotline_txt ) ){ echo esc_html( $header_hotline_txt ); } else { esc_html_e( 'Call Us Now', 'panpie' ); } ?></span><a href="tel:<?php echo esc_attr( PanpieTheme::$options['phone'] );?>"><?php echo wp_kses( PanpieTheme::$options['phone'] , 'alltext_allow' );?></a></div>
					
			</div>
			<?php } ?>	
			<div class="header-3-middle">
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $panpie_dark_logo, 'allow_link' ); ?></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $panpie_light_logo, 'allow_link' ); ?></a>
				</div>
			</div>
			<?php if ( PanpieTheme::$options['online_button'] == '1' ) { ?>
			<div class="header-3-right">
				<div class="header-button">
					<a class="button-btn" target="_self" href="<?php echo esc_url( PanpieTheme::$options['online_button_link']  );?>"><?php echo esc_html( PanpieTheme::$options['online_button_text'] );?><i class="fas fa-long-arrow-alt-right"></i></a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<div id="rt-sticky-placeholder"></div>
<div class="header-menu menu-layout3" id="header-menu">
	<div class="container">
		<div class="menu-full-wrap">
			<div class="menu-wrap">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>
			<?php get_template_part( 'template-parts/header/icon', 'area' );?>
		</div>
	</div>
</div>