<?php
$panpie_footer_column = PanpieTheme::$options['footer_column_3'];
switch ( $panpie_footer_column ) {
	case '1':
	$panpie_footer_class = 'col-sm-12 col-12';
	break;
	case '2':
	$panpie_footer_class = 'col-sm-6 col-12';
	break;
	case '3':
	$panpie_footer_class = 'col-md-4 col-12';
	break;		
	default:
	$panpie_footer_class = 'col-lg-3 col-md-6 col-12';
	break;
}
// Logo
/*$panpie_light_logo = empty( PanpieTheme::$options['footer_logo_light']['url'] ) ? PANPIE_IMG_URL . 'logo-light.png' : PanpieTheme::$options['footer_logo_light']['url'];
*/

if( !empty( PanpieTheme::$options['footer_logo_light'] ) ) {
	$panpie_light_logo = wp_get_attachment_image( PanpieTheme::$options['footer_logo_light'], 'full' );
	$panpie_light_logo = $panpie_light_logo;
}else {
	$panpie_light_logo = "<img width='330' height='120' src='" . PANPIE_IMG_URL . 'logo-light.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

$panpie_socials = PanpieTheme_Helper::socials();



if( !empty( PanpieTheme::$options['fbgimg'] ) ) {
	$f1_bg = wp_get_attachment_image_src( PanpieTheme::$options['fbgimg'], 'full', true );
	$footer_bg_img = $f1_bg[0];
}else {
	$footer_bg_img = PANPIE_IMG_URL . 'footer2_bg.jpg';
}

if ( PanpieTheme::$options['footer_bgtype'] == 'fbgcolor' ) {
	$panpie_bg = PanpieTheme::$options['fbgcolor'];
} else {
	$panpie_bg = 'url(' . $footer_bg_img . ') no-repeat center bottom / cover';
}

?>

<?php if ( PanpieTheme::$footer_area == 1 ) { ?>
	<div class="footer-top-area" style="background:<?php echo esc_html( $panpie_bg ); ?>">
		<?php if ( PanpieTheme::$options['footer_shape3'] ) { ?>
			<ul class="shape-holder">
				<li class="shape1 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.5s">
					<img width="215" height="195" loading='lazy' src="<?php echo PANPIE_ASSETS_URL . 'element/footer_shape01.png'; ?>" alt="<?php esc_html_e('footer-shape1', 'panpie'); ?>">
				</li>
				<li class="shape2 wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="2.1s">
					<img width="154" height="135" loading='lazy' src="<?php echo PANPIE_ASSETS_URL . 'element/footer_shape02.png'; ?>" alt="<?php esc_html_e('footer-shape2', 'panpie'); ?>">
				</li>
			</ul>
		<?php } ?>
		<div class="container">
			<div class="footer-logo">
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $panpie_light_logo, 'allow_link' ); ?></a>
			</div>
			<div class="row">
				<?php
				for ( $i = 1; $i <= $panpie_footer_column; $i++ ) {
					echo '<div class="' . $panpie_footer_class . '">';
					dynamic_sidebar( 'footer-style-3-'. $i );
					echo '</div>';
				}
				?>
			</div>			
		</div>	
		<div class="copyright_wrap">
			<div class="copyright"><?php echo wp_kses( PanpieTheme::$options['copyright_text'] , 'allow_link' );?></div>
			<span class="right-line"></span>
		</div>
	</div>
<?php } ?>
