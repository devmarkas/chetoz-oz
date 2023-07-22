<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( PanpieTheme::$layout == 'full-width' ) {
	$panpie_layout_class = 'col-sm-12 col-12';
} else {
	$panpie_layout_class = PanpieTheme_Helper::has_active_widget();
}
$event_layout_ops = get_post_meta( get_the_ID() ,'panpie_event_style', true );
$f_layout = ( empty( $event_layout ) || ( $event_layout  == 'default' ) ) ? $event_layout_ops : $event_layout;

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php
			if ( PanpieTheme::$layout == 'left-sidebar' ) {
				if ( is_active_sidebar( 'event-sidebar' ) ) {
					get_sidebar('panpie_event');
				}
			}
			?>
			<div class="<?php echo esc_attr( $panpie_layout_class );?>">
				<main id="main" class="site-main <?php echo esc_attr( $f_layout );?>">						
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content-single', 'event' );?>
					<?php endwhile; ?>
				</main>
			</div>
			<?php
			if ( PanpieTheme::$layout == 'right-sidebar' ) {				
				if ( is_active_sidebar( 'event-sidebar' ) ) {
					get_sidebar('panpie_event');
				}
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
