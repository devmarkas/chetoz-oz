<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$ul_class = $post_classes = '';

$thumb_size = 'panpie-size3';

$panpie_has_entry_meta  = ( PanpieTheme::$options['blog_author_name'] || PanpieTheme::$options['blog_cats'] || PanpieTheme::$options['blog_comment_num'] || PanpieTheme::$options['blog_length'] && function_exists( 'panpie_reading_time' ) || PanpieTheme::$options['blog_view'] && function_exists( 'panpie_views' ) ) ? true : false;

$panpie_time_html = sprintf( '<span><span>%s</span><br>%s<br>%s<br></span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$panpie_time_html = apply_filters( 'panpie_single_time', $panpie_time_html );

$panpie_time_html_2  = apply_filters( 'panpie_single_time_no_thumb', get_the_time( get_option( 'date_format' ) ) );

$panpie_comments_number = number_format_i18n( get_comments_number() );
$panpie_comments_html = $panpie_comments_number == 1 ? esc_html__( 'Comment: ' , 'panpie' ) : esc_html__( 'Comments: ' , 'panpie' );
$panpie_comments_html = $panpie_comments_html . '<span class="comment-number">'. $panpie_comments_number .'</span> ';

$thumbnail = false;

if (  PanpieTheme::$layout == 'right-sidebar' || PanpieTheme::$layout == 'right-sidebar' ){
	$post_classes = array( 'col-lg-6 col-md-6 col-sm-6 col-12 rt-grid-item blog-layout-1' );
	$ul_class = 'side_bar';
} else {
	$post_classes = array( 'col-lg-4 col-md-4 col-sm-4 col-12 rt-grid-item blog-layout-1' );
	$ul_class = '';
}

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), PanpieTheme::$options['post_content_limit'], '' );
	
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>
	<div class="blog-box">
		<?php if ( has_post_thumbnail() || PanpieTheme::$options['display_no_preview_image'] == '1'  ) { ?>
		<div class="blog-img-holder">
			<div class="blog-img">
				<a href="<?php the_permalink(); ?>" class="img-opacity-hover"><?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail( $thumb_size, ['class' => 'img-responsive'] ); ?>
						<?php } else {
						if ( PanpieTheme::$options['display_no_preview_image'] == '1' ) {
							if ( !empty( PanpieTheme::$options['no_preview_image']['id'] ) ) {
								$thumbnail = wp_get_attachment_image( PanpieTheme::$options['no_preview_image']['id'], $thumb_size );						
							}
							elseif ( empty( PanpieTheme::$options['no_preview_image']['id'] ) ) {
								$thumbnail = '<img class="wp-post-image" src="'.PANPIE_IMG_URL.'noimage_520X350.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
							}
							echo wp_kses( $thumbnail , 'alltext_allow' );
						}
					}
					?>
				</a>
			</div>
		</div>
		<?php } ?>
		<div class="entry-content">
			<?php if ( PanpieTheme::$options['blog_date'] ) { ?>
				<div class="blog-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></div>
			<?php } ?>
			<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<?php if ( PanpieTheme::$options['blog_content'] ) { ?>
			<div class="blog-text"><p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p></div>
			<?php } ?>
			<?php if ( $panpie_has_entry_meta ) { ?>
			<ul class="top-meta">
				<?php if ( !has_post_thumbnail() && ( PanpieTheme::$options['display_no_preview_image'] == '0'  ) ) { ?>				
				<?php } if ( PanpieTheme::$options['blog_author_name'] ) { ?>
				<li class="item-author"><i class="fas fa-user"></i><?php esc_html_e( 'by ', 'panpie' );?><?php the_author_posts_link(); ?></li>
				<?php } if ( PanpieTheme::$options['blog_cats'] ) { ?>
				<li class="blog-cat"><i class="fas fa-tag"></i><?php echo the_category( ', ' );?></li>
				<?php } if ( PanpieTheme::$options['blog_comment_num'] ) { ?>
				<li class="blog-comment"><i class="far fa-comment"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $panpie_comments_html , 'alltext_allow' );?></a></li>
				<?php } if ( PanpieTheme::$options['blog_length'] && function_exists( 'panpie_reading_time' ) ) { ?>
				<li class="meta-reading-time meta-item"><i class="far fa-clock"></i><?php echo panpie_reading_time(); ?></li>
				<?php } if ( PanpieTheme::$options['blog_view'] && function_exists( 'panpie_views' ) ) { ?>
				<li><i class="far fa-heart"></i><span class="meta-views meta-item "><?php echo panpie_views(); ?></span></li>
				<?php } ?>
			</ul>
			<?php } ?>			
		</div>
	</div>
</div>