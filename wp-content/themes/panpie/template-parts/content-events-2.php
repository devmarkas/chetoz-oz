<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size 			= 'panpie-size2';
$id            			= get_the_id();
$panpie_event_address   = get_post_meta( get_the_ID(), 'panpie_event_address', true );
$panpie_event_phone   	= get_post_meta( get_the_ID(), 'panpie_event_phone', true );

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), PanpieTheme::$options['event_excerpt_limit'], '' );

$panpie_time_html       = sprintf( '%s<span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ) );
$panpie_time_html       = apply_filters( 'panpie_single_time', $panpie_time_html );

?>
<article id="post-<?php the_ID(); ?>">
	<div class="rtin-item">
		<div class="rtin-figure">
			<a href="<?php the_permalink(); ?>">
				<?php
					if ( has_post_thumbnail() ){
						the_post_thumbnail( $thumb_size, ['class' => 'img-fluid mb-10 width-100'] );
					} else {
						if ( !empty( PanpieTheme::$options['no_preview_image']['id'] ) ) {
							echo wp_get_attachment_image( PanpieTheme::$options['no_preview_image']['id'], $thumb_size );
						} else {
							echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img( 'noimage_870X420.jpg' ) . '" alt="'.get_the_title().'">';
						}
					}
				?>
			</a>
			<div class="event-date"><?php echo wp_kses($panpie_time_html, 'alltext_allow' ); ?></div>
		</div>
		<div class="rtin-content">
			<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<div class="event-text"><?php echo wp_kses( $content , 'alltext_allow' ); ?></div>			
			<?php if ( PanpieTheme::$options['event_ar_address'] || PanpieTheme::$options['event_ar_phone'] ) { ?>
			<?php if (!empty( $panpie_event_address ) || !empty( $panpie_event_phone ) ) { ?>
			<div class="rtin-info">
				<?php if ( PanpieTheme::$options['event_ar_address'] && !empty( $panpie_event_address ) ) { ?>
					<span><i class="fas fa-map-marker-alt"></i><?php echo wp_kses( $panpie_event_address , 'allow_link' ); ?></span>
				<?php } if ( PanpieTheme::$options['event_ar_phone'] && !empty( $panpie_event_phone ) ) { ?>
					<span><i class="fas fa-phone-alt"></i><?php echo wp_kses( $panpie_event_phone , 'allow_link' );?></span>
				<?php } ?>
			</div>
			<?php } } ?>
			<?php if ( PanpieTheme::$options['event_ar_button'] ) { ?>
				<div class="event-button">
					<a class="btn-fill-dark" href="<?php the_permalink(); ?>"><?php esc_html_e( 'SEE DETAILS', 'panpie' );?></a></div>
			<?php } ?>
			
		</div>
	</div>
</article>