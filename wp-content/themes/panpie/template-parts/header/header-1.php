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
<div class="masthead-container" id="header-top-fix">
	<div class="container">
		<div class="header-top">			
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $panpie_dark_logo, 'allow_link' ); ?></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $panpie_light_logo, 'allow_link' ); ?></a>
				</div>
				<div class="header-address">
				<?php if ( PanpieTheme::$options['address'] ) { ?>
				<div>
					<div class="icon-left">
					<i class="fas fa-map-marker-alt"></i>
					</div>
					<div class="info"><span class="info-label"><?php $header_location = PanpieTheme::$options['header_location'];
					if ( !empty( $header_location ) ){ echo esc_html( $header_location ); } else { esc_html_e( 'Location', 'panpie' ); } ?>: </span><span class="info-text"><?php echo wp_kses( PanpieTheme::$options['address'] , 'alltext_allow' );?></span></div>
				</div>
				<?php } ?>
				<?php if ( PanpieTheme::$options['openhour'] ) { ?>
				<div>
					<div class="icon-left">
					<i class="far fa-clock"></i>
					</div>
					<div class="info"><span class="info-label"><?php $header_open_txt = PanpieTheme::$options['header_open_txt'];
					if ( !empty( $header_open_txt ) ){ echo esc_html( $header_open_txt ); } else { esc_html_e( 'Saturday - Friday', 'panpie' ); } ?>: </span><span class="info-text"><?php echo wp_kses( PanpieTheme::$options['openhour'] , 'alltext_allow' );?></span></div>
				</div>
				<?php } ?>				
				<?php if ( PanpieTheme::$options['phone'] ) { ?>
				<div>
					<div class="icon-left">
					<i class="fas fa-phone-alt"></i>
					</div>
					<div class="info"><span class="info-label"><?php $header_hotline_txt = PanpieTheme::$options['header_hotline_txt'];
					if ( !empty( $header_hotline_txt ) ){ echo esc_html( $header_hotline_txt ); } else { esc_html_e( 'Any Question', 'panpie' ); } ?>: </span><span class="info-text"><a href="tel:<?php echo esc_attr( PanpieTheme::$options['phone'] );?>"><?php echo wp_kses( PanpieTheme::$options['phone'] , 'alltext_allow' );?></a></span></div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div id="rt-sticky-placeholder"></div>
<div class="header-menu mobile-menu menu-layout1" id="header-menu">
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