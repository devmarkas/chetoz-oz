<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if( ! function_exists( 'panpie_related_team' )){
	
	function panpie_related_team(){
		$thumb_size = 'panpie-size4';
		$post_id = get_the_id();	
		$number_of_avail_post = '';
		$current_post = array( $post_id );
		$title_length = PanpieTheme::$options['related_team_title_limit'] ? PanpieTheme::$options['related_team_title_limit'] : '';
		$related_post_number = PanpieTheme::$options['related_team_number'];
		
		$content 	= get_the_content();
		$content 	= apply_filters( 'the_content', $content );
		
		$team_related_title  = get_post_meta( get_the_ID(), 'team_related_title', true );

		# Making ready to the Query ...
		$query_type = PanpieTheme::$options['related_post_query'];

		$args = array(
			'post_type'				 => 'panpie_team',
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
			
			$terms = get_the_terms( $post_id, 'panpie_team_category' );
			if ( $terms && ! is_wp_error( $terms ) ) {
			 
				$port_cat_links = array();
			 
				foreach ( $terms as $term ) {
					$port_cat_links[] = $term->term_id;
				}
			}
			
			$args['tax_query'] = array (
				array (
					'taxonomy' => 'panpie_team_category',
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
				'768'  => array( 'items' => 2 ),
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
		
		<div class="team-default team-multi-layout-1 team-grid-style1 owl-wrap rt-woo-nav rt-related-post">
			<div class="title-section">
			<?php if ( PanpieTheme::$options['team_related_title'] ) { ?>
			<h3 class="owl-custom-nav-title"><?php echo wp_kses( PanpieTheme::$options['team_related_title'] , 'alltext_allow' );?></h3><?php } ?>
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
					$id = get_the_ID();
					$socials       	= get_post_meta( $id, 'panpie_team_socials', true );
					$social_fields 	= PanpieTheme_Helper::team_socials();
					$position   	= get_post_meta( $id, 'panpie_team_position', true );
				?>
					<div class="rtin-item">						
						<div class="rtin-content-wrap">		
							<figure>
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
								<?php if ( PanpieTheme::$options['related_team_social'] ) { ?>
									<ul class="rtin-social">
										<?php foreach ( $socials as $key => $social ): ?>
											<?php if ( !empty( $social ) ): ?>
												<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
											<?php endif; ?>
										<?php endforeach; ?>
									</ul>
								<?php } ?>
							</figure>
							<div class="mask-wrap">
								<div class="rtin-content">
									<h3 class="rtin-title"><a href="<?php the_permalink();?>"><?php echo wp_kses( $trimmed_title , 'alltext_allow' ); ?></a></h3>
									<?php if ( PanpieTheme::$options['related_team_position'] ) { ?>
									<div class="rtin-designation"><?php echo esc_html( $position );?></div>
									<?php } ?>
								</div>
							</div>
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