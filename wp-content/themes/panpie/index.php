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
$panpie_is_post_archive = is_home() || ( is_archive() && get_post_type() == 'post' ) ? true : false;

if ( is_post_type_archive( "panpie_event" ) || is_tax( "panpie_event_category" ) ) {
		get_template_part( 'template-parts/archive', 'events' );
	return;
}
if ( is_post_type_archive( "panpie_gallery" ) || is_tax( "panpie_gallery_category" ) ) {
		get_template_part( 'template-parts/archive', 'gallery' );
	return;
}
if ( is_post_type_archive( "panpie_team" ) || is_tax( "panpie_team_category" ) ) {
		get_template_part( 'template-parts/archive', 'team' );
	return;
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php
			if ( PanpieTheme::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
			<div class="<?php echo esc_attr( $panpie_layout_class );?>">
				<main id="main" class="site-main">				
					<?php
					if ( have_posts() ) { ?>
						<?php
						if ( $panpie_is_post_archive && PanpieTheme::$options['blog_style'] == 'style1' ) {
							echo '<div class="row rt-masonry-grid">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $panpie_is_post_archive && PanpieTheme::$options['blog_style'] == 'style2' ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-2', get_post_format() );
							endwhile;
						} else if ( class_exists( 'Panpie_Core' ) ) {
							if ( is_tax( 'panpie_portfolio_category' ) ) {
								echo '<div class="row rt-masonry-grid">';
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-1', get_post_format() );
								endwhile;
								echo '</div>';
							}							
						}
						else {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
						}

						?>
						<?php PanpieTheme_Helper::pagination(); ?>
						
					<?php } else {?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php } ?>					
				</main>
			</div>
			<?php
			if( PanpieTheme::$layout == 'right-sidebar' ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>