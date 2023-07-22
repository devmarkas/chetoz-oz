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

$excerpt_count = PanpieTheme::$options['wc_show_excerpt_limit'];

//new set here
$product_id = get_the_ID();
$product_title = wp_trim_words(get_the_title(), 3, '');
//$selected_attribute = PanpieTheme::$options['wc_variation_select'];
$attribute_limit = PanpieTheme::$options['wc_attribute_limit'];

global $product;
global $woocommerce;
$currency = get_woocommerce_currency_symbol();
$price = get_post_meta(get_the_ID(), '_regular_price', true);
$sale = get_post_meta(get_the_ID(), '_sale_price', true);
$ext_button_text = get_post_meta(get_the_ID(), '_button_text', true);
$ext_product_url = get_post_meta(get_the_ID(), '_product_url', true);

$variation_price_html = '';
$itemAttributes = [];
$variations = [];
$sltAttributes = [];

if ($product->get_type() == 'variable') {
	$variations = $product->get_available_variations();
	$attributes = $product->get_variation_attributes();

	$selected_attribute = '';
	if ( $attributes ) { 
		$keys = array_keys($attributes);
		$selected_attribute = str_replace('pa_', '', $keys[0]);
	} 

	$itemAttributes = !empty($attributes['pa_' . $selected_attribute]) && is_array($attributes['pa_' . $selected_attribute]) ? $attributes['pa_' . $selected_attribute ] : [];
	if (!empty($variations)) {
		foreach ($variations as $variation) {
			if (!empty($variation['attributes']['attribute_pa_' . $selected_attribute]) && $variation['attributes']['attribute_pa_' . $selected_attribute] === $itemAttributes[0]) {
				$sltAttributes = $variation['attributes'];
				$variation_price_html = $variation['price_html'];
				break;
			}
		}
	}
}

?>
<div class="col shop-layout-1 <?php echo esc_html( $terms_of_item ); ?>">
	<div class="food-box variation-number-<?php echo esc_attr($attribute_limit); ?>" data-product_id="<?php echo absint($product_id); ?>"
        data-product_variations="<?php echo htmlspecialchars(wp_json_encode($variations)); ?>">
		<div class="img-wrap">
			<div class="item-img">
				<a href="<?php the_permalink(); ?>">
					<?php
						if ( has_post_thumbnail() ){
							the_post_thumbnail( $thumb_size , ['class' => 'img-fluid mb-10 width-100'] );
						} else {
							if ( !empty( PanpieTheme::$options['no_preview_image']['id'] ) ) {
								echo wp_get_attachment_image( PanpieTheme::$options['no_preview_image']['id'], $thumb_size );
							} else {
								echo '<img class="wp-post-image" src="' . PanpieTheme_Helper::get_img( 'noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
							}
						}
					?>
				</a>
				<?php
					if ( $block_data['cart_show'] == '1' ) {
					
						switch ( $product->get_type() ) {
							case "variable" :
							$link = get_permalink($product->get_id());
							$label  = apply_filters('variable_add_to_cart_text', esc_html__('View options', 'panpie'));
						?>				
							<div class="btn-wrap">
								<a href="<?php echo esc_url(add_query_arg($sltAttributes, get_the_permalink())); ?>" class="cart-btn"><i
											class="fas fa-shopping-cart"></i><?php echo esc_html($label); ?>
								</a>
							</div>
						<?php break;
							case "grouped" :
								$link   = get_permalink($product->get_id());
								$label  = apply_filters('grouped_add_to_cart_text', esc_html__('Select Product', 'panpie'));
						?>
							<div class="btn-wrap">
								<a href="<?php echo esc_url( $link ); ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i><?php echo esc_html( $label ); ?></a>
							</div>
						<?php
							break;
							case "external" :
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
						<div class="btn-wrap">
							<a href="<?php echo esc_url( $link ); ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i><?php echo esc_html( $label ); ?></a>
						</div>
						<?php
							break;
							default :
							$link   = esc_url( $product->add_to_cart_url() );
							$label  = apply_filters('add_to_cart_text', esc_html__('Add to cart', 'panpie'));
						?>
						<div class="btn-wrap">
							<a href="<?php echo esc_url( $link ); ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i><?php echo esc_html( $label ); ?></a>	
							<form action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="cart" method="post" enctype='multipart/form-data'>
								<?php woocommerce_quantity_input(); ?>
								<button type="submit" data-quantity="1" data-product_id="<?php echo esc_attr( $product->get_id()) ; ?>"
									class="button alt ajax_add_to_cart add_to_cart_button product_type_simple"><?php echo esc_html ( $label ); ?></button>
							</form>
						</div>
						<?php
							break;
						}
					}
				?>
			</div>
		</div>
		<div class="item-content">
			<?php if ( PanpieTheme::$options['wc_show_title'] == '1' ) { ?><h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><?php } ?>			
			
			<?php echo wp_kses( the_excerpt() , 'alltext_allow' ); ?>

			<?php if ( PanpieTheme::$options['wc_show_price'] == '1' ) { ?>
			
			<ul class="entry-meta">
				<?php 
					// variables and other name
					switch ( $product->get_type() ) {
						case "variable" :
							$uqid = rand( 1,5 ). time();
							?>
							<?php
							// variables and other name
							if ("variable" === $product->get_type()) { 
								?>
								<li class="variable-prod-price"> 
									<?php
										$index_i = 1;
										foreach( $attributes as $key => $attribute ) {
											$key = str_replace('pa_', '', $key);
											?>
												<select class="variable-prod-select" data-attribute="<?php echo esc_attr($key) ?>">
													<?php
													if (!empty($attribute)) {
														foreach ($attribute as $itemAttribute) {
															printf('<option value="%1$s">%1$s</option>', $itemAttribute);
														}
													}
													?>
												</select>
											<?php
											if ( $attribute_limit == $index_i ) {
												break;
											}
											$index_i++;
										}
									?>
								</li>
								<?php
							}
							?>
						<?php break;
							case "grouped" : ?>
						<?php break; ?>
						<?php
							case "external" : ?>
						<?php break; ?>
						<?php
							default : ?>
							
						<?php break;
					}
				?>
				<li class="text-center">							
				<?php
					// Price
					switch ( $product->get_type() ) {
						case "variable" : ?>
						<div class="item-price">
							<?php echo wp_kses($variation_price_html, 'alltext_allow' ); ?>
						</div>
						<?php break;
							case "grouped" :
							$link = get_permalink($product->get_id());
						?>
							<a href="<?php echo esc_url( $link ); ?>"><?php $label = apply_filters('grouped_add_to_cart_text', esc_html__('View Product', 'panpie')); echo esc_html( $label ); ?></a>
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
							<a href="<?php echo esc_url( $link ); ?>"><?php echo wp_kses( $label, 'alltext_allow' ) ; ?></a>
						<?php break; ?>
						<?php
							default : ?>
							<?php echo wp_kses ( $product->get_price_html() , 'alltext_allow' ); ?>
						<?php break;
					}
					
				?>
				</li>
			</ul>			
		<?php } ?>
	</div>
</div>