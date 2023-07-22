<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'panpie-size6';
$id 		= get_the_ID();
$content 	= get_the_content();
$content 	= apply_filters( 'the_content', $content );
$content 	= wp_trim_words( get_the_excerpt(), PanpieTheme::$options['gallery_arexcerpt_limit'], '' );
$panpie_port_no  = get_post_meta( $post->ID, 'panpie_port_no', true );

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
							echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img( 'noimage_370X328.jpg' ) . '" alt="'.get_the_title().'">';
						}
					}
				?>
			</a>
			<?php if ( PanpieTheme::$options['gallery_ar_view'] || PanpieTheme::$options['gallery_ar_link'] ) { ?>
			<div class="item-icon">
				<?php if ( PanpieTheme::$options['gallery_ar_view'] ) { ?>
				<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" class="panpie-popup-zoom img-popup-icon" title="<?php echo get_the_title(); ?>"><i class="far fa-eye"></i></a>
				<?php } if ( PanpieTheme::$options['gallery_ar_link'] ) { ?>
				<a href="<?php the_permalink();?>"><i class="fas fa-expand-alt"></i></a>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
		<div class="rtin-content">
			<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<?php if ( PanpieTheme::$options['gallery_ar_excerpt'] ) { ?>
			<p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
			<?php } ?>
			<?php if ( PanpieTheme::$options['gallery_ar_category'] ) { ?>
			<div class="rtin-cat"><?php
				$i = 1;
				$term_lists = get_the_terms( get_the_ID(), 'panpie_gallery_category' );
				foreach ( $term_lists as $term_list ){ 
				$link = get_term_link( $term_list->term_id, 'panpie_gallery_category' ); ?><?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a><?php $i++; } ?></div>
			<?php } ?>
		</div>
	</div>
</article>