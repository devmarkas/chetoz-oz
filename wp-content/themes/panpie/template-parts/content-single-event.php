<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$thumb_size = 'panpie-size2';

$panpie_time_html       = sprintf( '%s<span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ) );
$panpie_time_html       = apply_filters( 'panpie_single_time', $panpie_time_html );

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'event-single' ); ?>>
	<div class="single-event-inner">
		<div class="post-thumb">
			<?php
				if ( has_post_thumbnail() ){
					the_post_thumbnail( $thumb_size );
				} else {
					if ( !empty( PanpieTheme::$options['no_preview_image']['id'] ) ) {
						echo wp_get_attachment_image( PanpieTheme::$options['no_preview_image']['id'], $thumb_size );
					} else {
						echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img( 'noimage_1210X584.jpg' ) . '" alt="'.get_the_title().'">';
					}
				}
			?>
			<div class="event-date"><?php echo wp_kses($panpie_time_html, 'alltext_allow' ); ?></div>
		</div>
		<?php the_content(); ?>
		<?php if( PanpieTheme::$options['show_related_event'] == '1' && is_single() && !empty ( panpie_related_event() ) ) { ?>	
		<div class="related-event">
			<?php panpie_related_event(); ?>
		</div>
		<?php } ?>
	</div>
</div>