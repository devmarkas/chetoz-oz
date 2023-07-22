<?php
if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area single-blog-bottom">
    <?php
		if ( have_comments() ):
		$panpie_comment_count = get_comments_number();
		$panpie_comments_text = number_format_i18n( $panpie_comment_count ) . ' ';
		if ( $panpie_comment_count > 1 && $panpie_comment_count != 0 ) {
			$panpie_comments_text .= esc_html__( 'Comments', 'panpie' );
		} else if ( $panpie_comment_count == 0 ) {
			$panpie_comments_text .= esc_html__( 'Comment', 'panpie' );
		} else {
			$panpie_comments_text .= esc_html__( 'Comment', 'panpie' );
		}
	?>
		<h4><?php echo esc_html( $panpie_comments_text );?></h4>
	<?php
		$panpie_avatar = get_option( 'show_avatars' );
	?>
		<ul class="comment-list<?php echo empty( $panpie_avatar ) ? ' avatar-disabled' : '';?>">
		<?php
			wp_list_comments(
				array(
					'style'             => 'ul',
					'callback'          => 'PanpieTheme_Helper::comments_callback',
					'reply_text'        => esc_html__( 'Reply', 'panpie' ),
					'avatar_size'       => 105,
					'format'            => 'html5',
					)
				);
		?>
		</ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav class="pagination-area comment-navigation">
				<ul>
					<li><?php previous_comments_link( esc_html__( 'Older Comments', 'panpie' ) ); ?></li>
					<li><?php next_comments_link( esc_html__( 'Newer Comments', 'panpie' ) ); ?></li>
				</ul>
			</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation.?>

	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'panpie' ); ?></p>
	<?php endif;?>
	<div>
	<?php
		$panpie_commenter = wp_get_current_commenter();
		$panpie_req = get_option( 'require_name_email' );
		$panpie_aria_req = ( $panpie_req ? " required" : '' );

		$panpie_fields =  array(
			'author' =>
			'<div class="row"><div class="col-sm-6"><div class="form-group comment-form-author"><input type="text" id="author" name="author" value="' . esc_attr( $panpie_commenter['comment_author'] ) . '" placeholder="'. esc_attr__( 'Name', 'panpie' ).( $panpie_req ? ' *' : '' ).'" class="form-control"' . $panpie_aria_req . '></div></div>',

			'email' =>
			'<div class="col-sm-6 comment-form-email"><div class="form-group"><input id="email" name="email" type="email" value="' . esc_attr(  $panpie_commenter['comment_author_email'] ) . '" class="form-control" placeholder="'. esc_attr__( 'Email', 'panpie' ).( $panpie_req ? ' *' : '' ).'"' . $panpie_aria_req . '></div></div></div>',
			);

		$panpie_args = array(
			'class_submit'      => 'submit btn-send ghost-on-hover-btn',
			'submit_field'         => '<div class="form-group form-submit">%1$s %2$s</div>',
			'comment_field' =>  '<div class="form-group comment-form-comment"><textarea id="comment" name="comment" required placeholder="'.esc_attr__( 'Comment *', 'panpie' ).'" class="textarea form-control" rows="10" cols="40"></textarea></div>',
			'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
			'title_reply_after' => '</h4>',
			'fields' => apply_filters( 'comment_form_default_fields', $panpie_fields ),
			);

	?>
	<?php comment_form( $panpie_args );?>
	</div>
</div>