<?php
$panpie_footer_column = 1;
switch ( $panpie_footer_column ) {
	case '1':
	$panpie_footer_class = 'col-lg-12 col-sm-12 col-12';
	break;
	case '2':
	$panpie_footer_class = 'col-lg-6 col-sm-6 col-12';
	break;
	case '3':
	$panpie_footer_class = 'col-lg-4 col-sm-4 col-12';
	break;		
	default:
	$panpie_footer_class = 'col-lg-3 col-sm-6 col-12';
	break;
}
// Logo
if( !empty( PanpieTheme::$options['footer_logo_light'] ) ) {
	$panpie_light_logo = wp_get_attachment_image( PanpieTheme::$options['footer_logo_light'], 'full' );
	$panpie_light_logo = $panpie_light_logo;
}else {
	$panpie_light_logo = "<img width='330' height='120' src='" . PANPIE_IMG_URL . 'logo-light.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

$panpie_socials = PanpieTheme_Helper::socials();

$f1_bg = wp_get_attachment_image_src( PanpieTheme::$options['fbgimg'], 'full', true );
$footer_bg_img = empty( $f1_bg ) ? PANPIE_IMG_URL . 'footer2_bg.jpg' : $f1_bg[0];

if ( PanpieTheme::$options['footer_bgtype'] == 'fbgcolor' ) {
	$panpie_bg = PanpieTheme::$options['fbgcolor'];
} else {
	$panpie_bg = 'url(' . $footer_bg_img . ') no-repeat center bottom / cover';
}

?>
<?php if ( PanpieTheme::$footer_area == 1 ) { ?>
		<div class="footer-top-area" style="background:<?php echo esc_html( $panpie_bg ); ?>">
			<div class="container">
				<div class="footer-logo">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $panpie_light_logo, 'allow_link' ); ?></a>
				</div>
				<div class="row">
					<?php
					for ( $i = 1; $i <= $panpie_footer_column; $i++ ) {
						echo '<div class="' . $panpie_footer_class . '">';
						dynamic_sidebar( 'footer-style-2' );
						echo '</div>';
					}
					?>
				</div>
				<div class="footer-wrap">		
					<div class="footer-social"><?php dynamic_sidebar( 'footer_two_social' ); ?></div>				
					<div class="copyright_wrap">
						<div class="copyright"><?php echo wp_kses( PanpieTheme::$options['copyright_text'] , 'allow_link' );?></div>
					</div>
				</div>
			</div>
		</div>
<?php } ?>
