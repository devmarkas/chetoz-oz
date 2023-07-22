<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || !$product->is_visible() ) {
	return;
}

$product_col_class  = ( PanpieTheme::$layout == 'full-width' ) ? 'row row-cols-xl-4 row-cols-lg-2 row-cols-md-2 featuredContainer' : 'row row-cols-xl-3 row-cols-lg-3 row-cols-md-2';
$product_class      = '';


if ( PanpieTheme::$options['wc_block_layouts'] !== 'regular' ) {

	$block_data = array(
		'type'           => isset( $_GET["shopview"] ) && $_GET["shopview"] == 'list' ? 'list' : 'grid',
		'layout'         => PanpieTheme::$options['wc_block_layouts'],
		'list_layout'    => 1,
		'v_swatch'       => true,
		'cart_show'      => PanpieTheme::$options['wc_show_cart'],
		'archive_layout' => PanpieTheme::$options['wc_archive_layouts'],
		'classes' 		 => $product_col_class,
	);
?>
	
	<?php
		wc_get_template( "custom/product-block/blocks.php" , compact( 'product', 'block_data' ) );
	?>
	</div>
<?php
} else {	
	wc_get_template( "custom/product-block/block-regular.php" );
}