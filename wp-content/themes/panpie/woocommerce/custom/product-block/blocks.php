<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !isset( $product ) ) {
	return;
}

if ( !isset( $block_data ) ) {
	$block_data = array();
}

$defaults = array(
	'type'           => 'grid',
	//'list_layout'    => 1,
	'thumb_size'     => 'woocommerce_thumbnail',
	'rating_display' => true,
	'wishlist'       => true,
	'compare'        => true,
	'quickview'      => true,
	'v_swatch'       => false,
	'gallery'        => true,	
	'layout'         => 'panpiestyle',
);
$block_data = wp_parse_args( $block_data, $defaults );
$block_data = apply_filters( 'panpie_block_args', $block_data );

if ( $block_data['type'] == 'list' ) {
	wc_get_template( "custom/product-block/list-{$block_data['list_layout']}.php" , compact( 'product', 'block_data' ) );
} else {	
	wc_get_template( "custom/product-block/block-{$block_data['layout']}.php" , compact( 'product', 'block_data' ) );
}