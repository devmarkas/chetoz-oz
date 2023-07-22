<?php
$panpie_footer_column = PanpieTheme::$options['footer_column_1'];
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
$panpie_light_logo = empty( PanpieTheme::$options['footer_logo_light']['url'] ) ? PANPIE_IMG_URL . 'logo-light.png' : PanpieTheme::$options['footer_logo_light']['url'];
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
		<?php if ( PanpieTheme::$options['footer_shape'] ) { ?>
			<ul class="shape-holder">
				<li class="shape1 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.5s">
					<img width="215" height="195" loading='lazy' src="<?php echo PANPIE_ASSETS_URL . 'element/footer_shape01.png'; ?>" alt="<?php esc_html_e('footer-shape1', 'panpie'); ?>">
				</li>
				<li class="shape2 wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="2.1s">
					<img width="154" height="135" loading='lazy' src="<?php echo PANPIE_ASSETS_URL . 'element/footer_shape02.png'; ?>" alt="<?php esc_html_e('footer-shape2', 'panpie'); ?>">
				</li>
				<li class="shape3 wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.9s">
					<img width="102" height="120" loading='lazy' src="<?php echo PANPIE_ASSETS_URL . 'element/footer_shape03.png'; ?>" alt="<?php esc_html_e('footer-shape3', 'panpie'); ?>">
				</li>
			</ul>
		<?php } ?>
		<div class="container">
			<?php if ( is_active_sidebar( 'footer-style-1-1' ) ) { ?>
			<div class="row">
				<?php
				for ( $i = 1; $i <= $panpie_footer_column; $i++ ) {
					echo '<div class="' . $panpie_footer_class . '">';
					dynamic_sidebar( 'footer-style-1-'. $i );
					echo '</div>';
				}
				?>
			</div>
			<?php } ?>
			<div class="copyright_wrap">
				<span class="left-line"></span>
				<div class="copyright"><?php echo wp_kses( PanpieTheme::$options['copyright_text'] , 'allow_link' );?></div>
				<span class="right-line"></span>
			</div>
		</div>		
	</div>
<?php } ?>
