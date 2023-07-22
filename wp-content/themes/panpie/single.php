<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( PanpieTheme::$layout == 'full-width' ) {
	$panpie_layout_class = 'col-sm-12 col-12';
}
else{
	$panpie_layout_class = PanpieTheme_Helper::has_active_widget();
}
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<?php if ( PanpieTheme::$options['post_style'] == 'style1' ) { ?>
		<div class="container">
			<div class="row">
				<?php if ( PanpieTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
					<div class="<?php echo esc_attr( $panpie_layout_class );?>">
						<main id="main" class="site-main">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/content-single', get_post_format() );?>						
							<?php endwhile; ?>
						</main>
					</div>
				<?php if ( PanpieTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
			</div>
		</div>
	<?php } else if ( PanpieTheme::$options['post_style'] == 'style2' ) { ?>
		<div class="container">
			<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content-single-2', get_post_format() );?>
			<?php endwhile; ?>
			</div>
		</div>
	<?php } ?>
</div>
<?php get_footer(); ?>