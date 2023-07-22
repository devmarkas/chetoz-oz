<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'panpie-size1';

global $post;

$panpie_port_gallerys_raw  	= get_post_meta( $post->ID, 'panpie_port_gallery', true );

$panpie_port_button  	    = get_post_meta( $post->ID, 'panpie_port_button', true );
$panpie_port_url  	    	= get_post_meta( $post->ID, 'panpie_port_url', true );

?>
<div id="post-<?php the_ID();?>" <?php post_class( 'gallery-single' );?>>
	<?php $panpie_port_gallerys = explode( "," , $panpie_port_gallerys_raw );	
	if ( !empty( $panpie_port_gallerys_raw ) ) { ?>
		<div class="rt-swiper-slider single-gallery-slider">
			<div class="gallery-loading"></div>
			<div class="rt-swiper-container" data-autoplay="false" data-autoplay-timeout="true" data-slides-per-view="1" 
			data-centered-slides="true" data-space-between="30" data-r-x-small="1" data-r-small="1" data-r-medium="1" data-r-large="1" 
			data-r-x-large="1">
				<div class="swiper-wrapper">
				<?php foreach( $panpie_port_gallerys as $panpie_port_gallery ) { ?>
				<div class="swiper-slide">
					<?php echo wp_get_attachment_image( $panpie_port_gallery, 'full', "", array( "class" => "img-responsive" ) ); ?>
				</div>
				<?php } ?>
				</div>
				<div class="swiper-button">
					<div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
					<div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
				</div>
			</div>
		</div>
	<?php } ?>	
	<?php if ( empty( $panpie_port_gallerys_raw ) ) { ?>
		<div class="rtin-thumbnail">
			<?php if ( has_post_thumbnail() ) { ?>
			<?php 
				the_post_thumbnail( $thumb_size );
			} ?>
		</div>
	<?php } ?>
	
	<div class="rtin-gallery-content">
		<?php the_content();?>
	</div>
	<?php if( PanpieTheme::$options['show_related_port'] == '1' && is_single() && !empty ( panpie_related_port() ) ) { ?>
	<div class="related-post">
		<?php panpie_related_port(); ?>
	</div>
	<?php } ?>
	<?php if ( PanpieTheme::$options['port_button'] ) { ?>
	<?php if ( !empty ( $panpie_port_button ) || !empty ( $panpie_port_url ) ) { ?>
	<div class="single-port-button">
		<a href="<?php echo esc_url ( $panpie_port_url ); ?>" class="btn-fill-dark"><?php echo wp_kses( $panpie_port_button , 'alltext_allow' );?></a></div>
	<?php } } ?>
	
</div>