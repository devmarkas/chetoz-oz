<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'panpie-size4';
$id = get_the_ID();

$position   	= get_post_meta( $id, 'panpie_team_position', true );
$socials       	= get_post_meta( $id, 'panpie_team_socials', true );
$social_fields 	= PanpieTheme_Helper::team_socials();

$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), PanpieTheme::$options['team_arexcerpt_limit'], '' );

?>
<article id="post-<?php the_ID(); ?>">
	<div class="rtin-item">
		<div class="rtin-content-wrap">		
			<div class="rtin-thums">
				<a href="<?php the_permalink();?>">
					<?php
					if ( has_post_thumbnail() ){
						the_post_thumbnail( $thumb_size );
					}
					else {
						if ( !empty( PanpieTheme::$options['no_preview_image']['id'] ) ) {
							echo wp_get_attachment_image( PanpieTheme::$options['no_preview_image']['id'], $thumb_size );
						}
						else {
							echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
						}
					}
					?>
				</a>
				<?php if ( PanpieTheme::$options['team_ar_social'] ) { ?>
					<ul class="rtin-social">
						<?php foreach ( $socials as $key => $social ): ?>
							<?php if ( !empty( $social ) ): ?>
								<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				<?php } ?>
			</div>
			<div class="mask-wrap">
				<div class="rtin-content">
					<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php if ( PanpieTheme::$options['team_ar_position'] ) { ?>
					<div class="rtin-designation"><?php echo esc_html( $position );?></div>
					<?php } if ( PanpieTheme::$options['team_ar_excerpt'] ) { ?>
					<p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</article>