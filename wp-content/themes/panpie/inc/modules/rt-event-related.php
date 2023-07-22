<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if( ! function_exists( 'panpie_related_event' )){	
	function panpie_related_event(){
		$post_id = get_the_id();	
		$number_of_avail_post = '';
		$current_post = array( $post_id );
		# Making ready to the Query ...
		$query_type = PanpieTheme::$options['related_post_query'];
		
		$title_length = PanpieTheme::$options['related_event_title_limit'] ? PanpieTheme::$options['related_event_title_limit'] : '';
		$related_post_number = PanpieTheme::$options['related_event_number'];

		$args = array(
			'post_type'				 => 'panpie_event',
			'post__not_in'           => $current_post,
			'posts_per_page'         => $related_post_number,
			'no_found_rows'          => true,
			'post_status'            => 'publish',
			'ignore_sticky_posts'    => true,
			'update_post_term_cache' => false,
		);

		# Checking Related Posts Order ----------
		if( PanpieTheme::$options['related_post_sort'] ){

			$post_order = PanpieTheme::$options['related_post_sort'];

			if( $post_order == 'rand' ){
				$args['orderby'] = 'rand';
			}
			elseif( $post_order == 'views' ){
				$args['orderby']  = 'meta_value_num';
				$args['meta_key'] = 'panpie_views';
			}
			elseif( $post_order == 'popular' ){
				$args['orderby'] = 'comment_count';
			}
			elseif( $post_order == 'modified' ){
				$args['orderby'] = 'modified';
				$args['order']   = 'ASC';
			}
			elseif( $post_order == 'recent' ){
				$args['orderby'] = '';
				$args['order']   = '';
			}
		}


		# Get related posts by author ----------
		if( $query_type == 'author' ){
			$args['author'] = get_the_author_meta( 'ID' );
		}

		# Get related posts by tags ----------
		elseif( $query_type == 'tag' ){
			$tags_ids  = array();
			$post_tags = get_the_terms( $post_id, 'post_tag' );

			if( ! empty( $post_tags ) ){
				foreach( $post_tags as $individual_tag ){
					$tags_ids[] = $individual_tag->term_id;
				}
				$args['tag__in'] = $tags_ids;
			}
		}
		# Get related posts by categories ----------
		else{			
			$terms = get_the_terms( $post_id, 'panpie_event_category' );
			if ( $terms && ! is_wp_error( $terms ) ) {			 
				$port_cat_links = array();			 
				foreach ( $terms as $term ) {
					$port_cat_links[] = $term->term_id;
				}
			}			
			$args['tax_query'] = array (
				array (
					'taxonomy' => 'panpie_event_category',
					'field'    => 'ID',
					'terms'    => $port_cat_links,
				)
			);

		}

		# Get the posts ----------
		$related_query = new wp_query( $args );
		/*the_carousel*/
		if ( PanpieTheme::$layout == 'full-width' ) {
			$responsive = array(
				'0'    => array( 'items' => 1 ),
				'480'  => array( 'items' => 2 ),
				'768'  => array( 'items' => 3 ),
				'992'  => array( 'items' => 3 ),
			);
		}
		else {
			$responsive = array(
				'0'    => array( 'items' => 1 ),
				'480'  => array( 'items' => 2 ),
				'768'  => array( 'items' => 2 ),
				'992'  => array( 'items' => 3 ),
			);
		}
		
		$count_post = $related_query->post_count;
		if ( $count_post < 4 ) {
			$number_of_avail_post = false;
		} else {
			$number_of_avail_post = true;
		}
		$owl_data = array( 
			'nav'                => false,
			'dots'               => false,
			'autoplay'           => false,
			'autoplayTimeout'    => '5000',
			'autoplaySpeed'      => '200',
			'autoplayHoverPause' => true,
			'loop'               => $number_of_avail_post,
			'margin'             => 30,
			'responsive'         => $responsive
		);

		$owl_data = json_encode( $owl_data );
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_style( 'owl-theme-default' );
		wp_enqueue_script( 'owl-carousel' );		
		
		$wrapper_class = '';
		if ( !$count_post ) {
			$wrapper_class .= ' no-nav';
		}
		
		if( $related_query->have_posts() ) { ?>		
		<div class="event-default gallery-multi-layout-1 owl-wrap rt-woo-nav rt-related-event zoom-gallery <?php echo esc_attr( $wrapper_class );?>">
			<div class="title-section">
			<?php if ( PanpieTheme::$options['event_related_title'] ) { ?>
			<h3 class="owl-custom-nav-title"><?php echo wp_kses( PanpieTheme::$options['event_related_title'] , 'alltext_allow' );?></h3><?php } ?>
				<?php if ( $count_post > 3 ){ ?>
				<div class="owl-custom-nav owl-nav">
					<div class="owl-prev"><i class="fas fa-arrow-left"></i></div><div class="owl-next"><i class="fas fa-arrow-right"></i></div>
				</div>
				<?php } ?>
				<div class="owl-custom-nav-bar"></div>
				<div class="clear"></div>
			</div>
			<div class="owl-theme owl-carousel rt-owl-carousel" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
				<?php
					while ( $related_query->have_posts() ) {
					$related_query->the_post();
					$trimmed_title = wp_trim_words( get_the_title(), $title_length, '' );
				?>
					<div class="rtin-item">						
						<div class="rtin-figure">
							<a href="<?php the_permalink(); ?>">
								<?php
									$id = get_the_ID();
									$thumbnail = false;
									if ( has_post_thumbnail() ){
										$post_thumbnail_id = get_post_thumbnail_id( $id );
										$image_attributes = wp_get_attachment_image_src( $post_thumbnail_id , 'panpie-size7'  );
										if ( $image_attributes ) : ?>
											<img src="<?php echo esc_attr( $image_attributes[0] ); ?>" width="<?php echo esc_attr( $image_attributes[1] ); ?>" height="<?php echo esc_attr( $image_attributes[2] ); ?>" />
										<?php endif; 
									} else {
										$thumbnail = '<img class="" src="'.PANPIE_IMG_URL.'noimage_370X328.jpg" alt="'. the_title_attribute(array('echo'=> false)) .'">';
									}
									echo wp_kses( $thumbnail , 'alltext_allow' );
								?>
							</a>
						</div>
						<div class="rtin-content">							
							<h3><a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" class="panpie-popup-zoom"><?php echo wp_kses( $trimmed_title , 'alltext_allow' ); ?></a></h3>
							<?php if ( PanpieTheme::$options['event_view'] || PanpieTheme::$options['event_link'] ) { ?>
							<div class="item-icon">
								<?php if ( PanpieTheme::$options['event_view'] ) { ?>
								<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" class="panpie-popup-zoom img-popup-icon" title="<?php echo get_the_title(); ?>"><i class="far fa-eye"></i></a>
								<?php } if ( PanpieTheme::$options['event_link'] ) { ?>
								<a href="<?php the_permalink();?>"><i class="fas fa-expand-alt"></i></a>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php }
		wp_reset_postdata();
	}
}
?>