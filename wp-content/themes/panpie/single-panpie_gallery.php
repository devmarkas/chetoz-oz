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
	<div class="container">
		<div class="row">
			<?php if ( PanpieTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
				<div class="<?php echo esc_attr( $panpie_layout_class );?>">
					<main id="main" class="site-main">
						<?php							
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-single', 'gallery' );
							endwhile;						
						?>
					</main>
				</div>
			<?php if ( PanpieTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
		</div>
	</div>
</div>
<?php get_footer(); ?>