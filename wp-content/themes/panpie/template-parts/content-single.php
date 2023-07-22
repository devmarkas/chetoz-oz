<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$panpie_has_entry_meta  = ( PanpieTheme::$options['post_date'] || PanpieTheme::$options['post_author_name'] || PanpieTheme::$options['post_comment_num'] || PanpieTheme::$options['post_cats'] || ( PanpieTheme::$options['post_length'] && function_exists( 'panpie_reading_time' ) ) || ( PanpieTheme::$options['post_view'] && function_exists( 'panpie_views' ) ) ) ? true : false;

$panpie_comments_number = number_format_i18n( get_comments_number() );
$panpie_comments_html = $panpie_comments_number == 1 ? esc_html__( 'Comment' , 'panpie' ) : esc_html__( 'Comments' , 'panpie' );
$panpie_comments_html = '<span class="comment-number">'. $panpie_comments_number .'</span> '. $panpie_comments_html;
$panpie_author_bio = get_the_author_meta( 'description' );

$panpie_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$panpie_time_html       = apply_filters( 'panpie_single_time', $panpie_time_html );

$author = $post->post_author;

$news_author_fb = get_user_meta( $author, 'panpie_facebook', true );
$news_author_tw = get_user_meta( $author, 'panpie_twitter', true );
$news_author_ld = get_user_meta( $author, 'panpie_linkedin', true );
$news_author_gp = get_user_meta( $author, 'panpie_gplus', true );
$news_author_pr = get_user_meta( $author, 'panpie_pinterest', true );
$panpie_author_designation = get_user_meta( $author, 'panpie_author_designation', true );

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php if ( PanpieTheme::$options['post_featured_image'] == true ) { ?>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="entry-thumbnail-area"><?php the_post_thumbnail( 'panpie-size2' , ['class' => 'img-responsive'] ); ?>
				<?php if ( PanpieTheme::$options['post_date'] ) { ?>			
					<div class="post-date"><?php echo wp_kses_post( $panpie_time_html ); ?></div>
				<?php } ?>
				</div>
			<?php } ?>
		<?php } ?>
		<div class="entry-meta">
			<?php if ( $panpie_has_entry_meta ) { ?>
			<ul class="post-light">
				<?php if ( PanpieTheme::$options['post_date'] ) { ?>	
				<?php if ( empty(has_post_thumbnail() ) ) { ?>
				<li><i class="far fa-calendar"></i><?php echo get_the_date(); ?></li><?php } ?>
				<?php } if ( PanpieTheme::$options['post_author_name'] ) { ?>
				<li class="item-author"><i class="fas fa-user"></i><?php esc_html_e( 'by ', 'panpie' );?><?php the_author_posts_link(); ?>
				</li>
				<?php } if ( PanpieTheme::$options['post_cats'] ) { ?>			
				<li class="blog-cat"><i class="fas fa-tag"></i><?php echo the_category( ', ' );?></li>
				<?php } if ( PanpieTheme::$options['post_length'] && function_exists( 'panpie_reading_time' ) ) { ?>
				<li class="meta-reading-time meta-item"><i class="far fa-clock"></i><?php echo panpie_reading_time(); ?></li>
				<?php } if ( PanpieTheme::$options['post_view'] && function_exists( 'panpie_views' ) ) { ?>
				<li><i class="fas fa-signal"></i><span class="meta-views meta-item "><?php echo panpie_views(); ?></span></li>
				<?php } if ( PanpieTheme::$options['post_comment_num'] ) { ?>
				<li><i class="fas fa-comment"></i><?php echo wp_kses( $panpie_comments_html , 'alltext_allow' ); ?></li>
				<?php } ?>
			</ul>
			<?php } ?>			
			<div class="clear"></div>
		</div>
		
	</div>
	<div class="entry-content rt-single-content"><?php the_content();?>
		<?php wp_link_pages( array(
			'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'panpie' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) ); ?>
	</div>
	<?php if ( ( PanpieTheme::$options['post_tags'] && has_tag() ) || PanpieTheme::$options['post_share'] ) { ?>
	<div class="entry-footer">
		<div class="entry-footer-meta">
			<?php if ( PanpieTheme::$options['post_tags'] && has_tag() ) { ?>
			<div class="item-tags">
				<span><?php esc_html_e( 'Tags :', 'panpie' );?></span><?php echo get_the_term_list( $post->ID, 'post_tag', '' ); ?>
			</div>	
			<?php } if ( ( PanpieTheme::$options['post_share'] ) && ( function_exists( 'panpie_post_share' ) ) ) { ?>
			<div class="post-share"><span><?php esc_html_e( 'Share :', 'panpie' );?></span><?php panpie_post_share(); ?></div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>
	<!-- author bio -->
	<?php if ( PanpieTheme::$options['post_author_bio'] == '1' ) { ?>
		<?php if ( !empty ( $panpie_author_bio ) ) { ?>
		<div class="media about-author">
			<div class="<?php if ( is_rtl() ) { ?>pull-right<?php } else { ?>pull-left<?php } ?>">
				<?php echo get_avatar( $author, 105 ); ?>
			</div>
			<div class="media-body">
				<div class="about-author-info">
					<h3 class="author-title"><?php the_author_posts_link();?></h3>
				</div>
				<?php if ( $panpie_author_bio ) { ?>
				<div class="author-bio"><?php echo esc_html( $panpie_author_bio );?></div>
				<?php } ?>
				<ul class="author-box-social">
					<?php if ( ! empty( $news_author_fb ) ){ ?><li><a href="<?php echo esc_attr( $news_author_fb ); ?>"><i class="fab fa-facebook-f"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_tw ) ){ ?><li><a href="<?php echo esc_attr( $news_author_tw ); ?>"><i class="fab fa-twitter"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_gp ) ){ ?><li><a href="<?php echo esc_attr( $news_author_gp ); ?>"><i class="fab fa-google-plus-g"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_ld ) ){ ?><li><a href="<?php echo esc_attr( $news_author_ld ); ?>"><i class="fab fa-linkedin-in"></i></a></li><?php } ?>
					<?php if ( ! empty( $news_author_pr ) ){ ?><li><a href="<?php echo esc_attr( $news_author_pr ); ?>"><i class="fab fa-pinterest"></i></a></li><?php } ?>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
	<?php } ?>
	<!-- next/prev post -->
	<?php if ( PanpieTheme::$options['post_links'] ) { panpie_post_links_next_prev(); } ?>
	<?php if( PanpieTheme::$options['show_related_post'] == '1' && is_single() && !empty ( panpie_related_post() ) ) { ?>
		<div class="related-post">
			<?php panpie_related_post(); ?>
		</div>
	<?php } ?>
	<?php
	if ( comments_open() || get_comments_number() ){
		comments_template();
	}
	?>	
</div>