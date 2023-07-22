<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'panpie-size4';
$id  = $product->get_id();
$item_terms = get_the_terms( get_the_ID(), 'product_cat' );
$term_links = array();

foreach ( $item_terms as $term ) {
	$term_links[] = $term->slug;
}
$terms_of_item = join( " ", $term_links );
$currency = get_woocommerce_currency_symbol();
$excerpt_count = PanpieTheme::$options['wc_show_excerpt_limit'];

?>
<div class="col shop-layout-3 <?php echo esc_html( $terms_of_item ); ?>">
<div class="food-menu-isotop">
	<div class="food-menu-box">
		<div class="media">
			<div class="item-img">
			<?php
				if ( has_post_thumbnail() ){
					the_post_thumbnail( array( 105, 105 ) , ['class' => 'img-fluid mb-10 width-100'] );
				} else {
					if ( !empty( PanpieTheme::$options['no_preview_image']['id'] ) ) {
						echo wp_get_attachment_image( PanpieTheme::$options['no_preview_image']['id'], $thumb_size );
					} else {
						echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
					}
				}
			?>
			</div>
			<div class="media-body">
				<?php if ( PanpieTheme::$options['wc_show_title'] == '1' ) { ?><h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><?php } ?>
				<?php if ( PanpieTheme::$options['wc_show_excerpt'] == '1' ) { ?><p><?php 
					$excerpt = wp_trim_words( get_the_excerpt(), $excerpt_count, '' ); echo wp_kses( $excerpt , 'alltext_allow' ); ?></p>
				<?php } ?>
				<?php
				global $product;
				global $woocommerce;
				
				if ( PanpieTheme::$options['wc_show_price'] == '1' ) {

					// Price
					switch ( $product->get_type() ) {
						case "variable" : ?>
							<div class="item-price var-price">
							<?php
								$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
								echo wp_kses( $currency . number_format(($prices[0] + $prices[1])/2 , 2 ) , 'alltext_allow' );
							?></div>		
						<?php break;
							case "grouped" :
							$link = get_permalink($product->get_id());
						?>
							<div class="item-price"><a href="<?php echo esc_url( $link ); ?>"><?php $label = apply_filters('grouped_add_to_cart_text', esc_html__('View Product', 'panpie')); echo esc_html( $label ); ?></a></div>
						<?php break; ?>
						<?php
							case "external" : ?>
						<?php
							if ( !empty( $ext_product_url ) ) {
								$link  = $ext_product_url;
							} else {
								$link   = get_permalink($product->get_id());
							}
							
							if ( !empty( $ext_button_text ) ) {
								$label  = $ext_button_text;
							} else {
								$label  = apply_filters('external_add_to_cart_text', esc_html__('Read More', 'panpie'));
							}
						?>
							<div class="item-price"><a href="<?php echo esc_url( $link ); ?>"><?php echo wp_kses( $label, 'alltext_allow' ) ; ?></a></div>
						<?php break; ?>
						<?php
							default : ?>
							<div class="item-price"><?php echo wp_kses( $product->get_price_html() , 'alltext_allow' ); ?></div>
						<?php break;
					}
				} ?>
				
			</div> 
		</div>
	</div>
</div>