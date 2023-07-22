<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


// Layout class

if ( PanpieTheme::$layout == 'full-width' ) {
	$panpie_layout_class = 'col-sm-12 col-xs-12';
	$col_class    = 'col-lg-4 col-md-6 col-sm-6 col-xs-12 no-equal-item';
}
else{
	$panpie_layout_class = 'col-lg-8 col-12';
	$col_class    = 'col-lg-4 col-md-6 col-sm-6 col-xs-12 no-equal-item';
}

// Template

$template_bg_sty		= 'bg-light-accent100';
$gutters				= '';
$container_class		= 'container';
$iso					= 'no-equal-gallery rt-masonry-grid';

if ( PanpieTheme::$options['events_style'] == 'style1' ){
	$events_archive_layout = "event-default event-grid-layout1";
	$template 				 = 'events-1';
}elseif( PanpieTheme::$options['events_style'] == 'style2' ){
	$events_archive_layout = "event-default event-grid-layout2";
	$template 				 = 'events-2';
}else{
	$events_archive_layout = "event-default event-grid-layout1";
	$template 				 = 'events-1';
}


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
			}?>
			<div class="<?php echo esc_attr( $events_archive_layout );?> <?php echo esc_attr( $panpie_layout_class );?>">
				<main id="main" class="site-main">
					<?php if ( have_posts() ) :?>
						<div class="row">
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="rt-grid-item">
									<?php get_template_part( 'template-parts/content', $template ); ?>
								</div>
							<?php endwhile; ?>
						</div>

					<?php PanpieTheme_Helper::pagination(); ?>	
					<?php else:?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
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
