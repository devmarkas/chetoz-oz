
<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if( !empty( PanpieTheme::$options['error_bodybanner'] ) ) {
	$error_bg = wp_get_attachment_image_src( PanpieTheme::$options['error_bodybanner'], 'full', true );
	$panpie_error_img = $error_bg[0];
}else {
	$panpie_error_img = PANPIE_IMG_URL . '404.png';
}

?>
<?php get_header();?>
<div id="primary" class="content-area error-page-area" >
	<div class="container">
		<div class="error-page-content">
			<div class="item-img">
				<img src="<?php echo esc_url($panpie_error_img); ?>">
			</div>
			<?php if ( !empty( PanpieTheme::$options['error_text1'] || PanpieTheme::$options['ops_text']) ) { ?>
			<h2 class="text-1"><span><?php echo wp_kses( PanpieTheme::$options['ops_text'] , 'alltext_allow' );?></span><?php echo wp_kses( PanpieTheme::$options['error_text1'] , 'alltext_allow' );?></h2>
			<?php } ?>
			<?php if ( !empty(PanpieTheme::$options['error_text2'])) { ?>
			<p class="text-2"><?php echo wp_kses( PanpieTheme::$options['error_text2'] , 'alltext_allow' );?></p>
			<?php } ?>
			<div class="go-home">
			  <a href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo esc_html( PanpieTheme::$options['error_buttontext'] );?></a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>