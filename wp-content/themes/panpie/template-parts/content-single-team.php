<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

global $post;

$panpie_team_position 		= get_post_meta( $post->ID, 'panpie_team_position', true );
$panpie_team_experience    	= get_post_meta( $post->ID, 'panpie_team_experience', true );
$panpie_team_email    		= get_post_meta( $post->ID, 'panpie_team_email', true );
$panpie_team_phone    		= get_post_meta( $post->ID, 'panpie_team_phone', true );
$panpie_team_address    	= get_post_meta( $post->ID, 'panpie_team_address', true );
$panpie_team_skill       	= get_post_meta( $post->ID, 'panpie_team_skill', true );
$panpie_team_counter      	= get_post_meta( $post->ID, 'panpie_team_count', true );
$socials        			= get_post_meta( $post->ID, 'panpie_team_socials', true );
$socials        			= array_filter( $socials );
$socials_fields 			= PanpieTheme_Helper::team_socials();

$panpie_team_contact_form 	= get_post_meta( $post->ID, 'panpie_team_contact_form', true );

$thumb_size = 'panpie-size4';
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'team-single' ); ?>>
	<div class="team-content-wrap">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="rtin-content">
					<div class="rtin-heading">
						<h2 class="rtin-title"><?php the_title(); ?></h2>
						<?php if ( $panpie_team_position ) { ?>
						<span class="designation"><?php echo esc_html( $panpie_team_position );?></span>
						<?php } ?>
					</div>
					<?php the_content();?>
					<?php if ( !empty( $socials ) ) { ?>
					<ul class="rtin-social">
						<?php foreach ( $socials as $key => $value ): ?>
							<li><a target="_blank" href="<?php echo esc_url( $value ); ?>"><i class="fab <?php echo esc_attr( $socials_fields[$key]['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>						
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="rtin-thumb">
					<?php
						if ( has_post_thumbnail() ){
							the_post_thumbnail( $thumb_size );
						} else {
							if ( !empty( PanpieTheme::$options['no_preview_image']['id'] ) ) {
								echo wp_get_attachment_image( PanpieTheme::$options['no_preview_image']['id'], $thumb_size );
							} else {
								echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
							}
						}
					?>	
				</div>
			</div>
		</div>
	</div>
	<?php if ( PanpieTheme::$options['team_info'] || PanpieTheme::$options['team_skill'] ) { ?>
	<div class="rtin-team-skill-info">
	<!-- Team info -->
	<?php if ( PanpieTheme::$options['team_info'] ) { ?>
	<?php if ( !empty( $panpie_team_experience ) ||  !empty( $panpie_team_phone ) || !empty( $panpie_team_email ) || !empty( $panpie_team_address )) { ?>
	<div class="rtin-team-info">
		<h4><?php esc_html_e( 'Info', 'panpie' );?></h4>
		<ul>
			<?php if ( !empty( $panpie_team_experience ) ) { ?>	
				<li><span class="rtin-label"><?php esc_html_e( 'Experience', 'panpie' );?> : </span><?php echo esc_html( $panpie_team_experience );?></li>
			<?php } if ( !empty( $panpie_team_phone ) ) { ?>	
				<li><span class="rtin-label"><?php esc_html_e( 'Phone', 'panpie' );?> : </span><a href="tel:<?php echo esc_html( $panpie_team_phone );?>"><?php echo esc_html( $panpie_team_phone );?></a></li>
			<?php } if ( !empty( $panpie_team_email ) ) { ?>	
				<li><span class="rtin-label"><?php esc_html_e( 'Email', 'panpie' );?> : </span><a href="mailto:<?php echo esc_html( $panpie_team_email );?>"><?php echo esc_html( $panpie_team_email );?></a></li>
			<?php } if ( !empty( $panpie_team_address ) ) { ?>	
				<li><span class="rtin-label"><?php esc_html_e( 'Address', 'panpie' );?> : </span><?php echo esc_html( $panpie_team_address );?></li>	
			<?php } ?>
		</ul>
	</div>
	<?php } } ?>
	<!-- Team Skills -->
	<?php if ( PanpieTheme::$options['team_skill'] ) { ?>
		<?php if ( !empty( $panpie_team_skill ) ) { ?>
		<div class="team-skill-wrap">
			<div class="rtin-skills">
				<h4><?php esc_html_e( 'Skill', 'panpie' );?></h4>
				<?php foreach ( $panpie_team_skill as $skill ): ?>
					<?php
					if ( empty( $skill['skill_name'] ) || empty( $skill['skill_value'] ) ) {
						continue;
					}
					$skill_value = (int) $skill['skill_value'];
					$skill_style = "width:{$skill_value}%;";

					if ( !empty( $skill['skill_color'] ) ) {
						$skill_style .= "background-color:{$skill['skill_color']};";
					}
					?>
					<div class="rtin-skill-each">
						<div class="rtin-name"><?php echo esc_html( $skill['skill_name'] );?></div>
						<div class="progress">
							<div class="progress-bar progress-bar-striped fadeInLeft animated" data-progress="<?php echo esc_attr( $skill_value );?>%" style="<?php echo esc_attr( $skill_style );?>"> <span><?php echo esc_html( $skill_value );?>%</span></div>
						</div>								
					</div>
				<?php endforeach;?> 
			</div>
		</div>
		<?php } ?>
	<?php } ?>
	</div>
	<?php } ?>
	<!-- Contact form -->
	<?php if ( PanpieTheme::$options['team_form'] ) { ?>
	<?php if ( !empty( $panpie_team_contact_form ) ) { ?>
	<div class="team-contact-wrap"> 
		<div class="form-box">
			<h3><?php echo wp_kses( PanpieTheme::$options['team_form_title'] , 'alltext_allow' );?></h3>
			<?php echo do_shortcode( $panpie_team_contact_form );?>
		</div>
	</div>
	<?php } ?>
	<?php } ?>
	
	<?php if( PanpieTheme::$options['show_related_team'] == '1' && is_single() && !empty ( panpie_related_team() ) ) { ?>
	<div class="related-post">
		<?php echo panpie_related_team(); ?>
	</div>
	<?php } ?>
	
	
</div>