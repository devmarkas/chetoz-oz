<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$panpie_socials = PanpieTheme_Helper::socials();
// Logo
if( !empty( PanpieTheme::$options['logo'] ) ) {
    $logo_dark = wp_get_attachment_image( PanpieTheme::$options['logo'], 'full' );
    $panpie_dark_logo = $logo_dark;
}else {
    $panpie_dark_logo = "<img width='600' height='218' src='" . PANPIE_IMG_URL . 'logo-dark.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "' loading='lazy'>"; 
}

$panpie_has_entry_meta  = ( PanpieTheme::$options['address'] || PanpieTheme::$options['email'] || PanpieTheme::$options['phone'] ) ? true : false;

?>

<div class="additional-menu-area">
	<div class="sidenav">
		<a href="#" class="closebtn">x</a>
		<div class="additional-logo">			
			<a href="<?php echo esc_url(home_url('/'));?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) );?>"><?php echo wp_kses( $panpie_dark_logo, 'alltext_allow' ); ?></a>
		</div>
		<?php wp_nav_menu( array( 'theme_location' => 'topright','container' => '' ) );?>
		<?php if ( $panpie_has_entry_meta ) { ?>
		<div class="sidenav-address">
			<h4><?php esc_html_e( 'Contact', 'panpie' );?></h4>
			<?php if ( PanpieTheme::$options['address'] ) { ?>
			<span><i class="fas fa-map-marker-alt list-icon"></i><?php echo wp_kses( PanpieTheme::$options['address'] , 'alltext_allow' );?></span>
			<?php } ?>
			<?php if ( PanpieTheme::$options['email'] ) { ?>
			<span><i class="fas fa-envelope list-icon"></i><a href="mailto:<?php echo esc_attr( PanpieTheme::$options['email'] );?>"><?php echo esc_html( PanpieTheme::$options['email'] );?></a></span>
			<?php } ?>			
			<?php if ( PanpieTheme::$options['phone'] ) { ?>
			<span><i class="fas fa-phone-alt list-icon"></i><a href="tel:<?php echo esc_attr( PanpieTheme::$options['phone'] );?>"><?php echo esc_html( PanpieTheme::$options['phone'] );?></a></span>
			<?php } ?>
		<?php if ( !empty ( $panpie_socials ) ) { ?>
			<h4><?php esc_html_e( 'Follow Me', 'panpie' );?></h4>
		<?php } ?>
			<?php if ( $panpie_socials ) { ?>
				<div class="sidenav-social">
					<?php foreach ( $panpie_socials as $panpie_social ): ?>
						<span><a target="_blank" href="<?php echo esc_url( $panpie_social['url'] );?>"><i class="fab <?php echo esc_attr( $panpie_social['icon'] );?>"></i></a></span>
					<?php endforeach; ?>					
				</div>						
			<?php } ?>
		</div>
		<?php } ?>
	</div>
	<span class="side-menu-open side-menu-trigger">
		<span></span>
		<span></span>
		<span></span>
	</span>
</div>