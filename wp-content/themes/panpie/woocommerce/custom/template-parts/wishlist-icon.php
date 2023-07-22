<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie;

global $product;
$product_id      = $product->get_id();
$is_in_wishlist  = YITH_WCWL()->is_product_in_wishlist( $product_id, false );
$wishlist_url    = YITH_WCWL()->get_wishlist_url();

$title_before = esc_html__( 'Add to Wishlist', 'panpie' );
$title_after  = esc_html__( 'Aleady exists in Wishlist! Click here to view Wishlist', 'panpie' );

if ( $is_in_wishlist ) {
	$class      = 'rdtheme-remove-from-wishlist';
	$icon_font  = 'fa fa-heart';
	$title      = $title_after;
}
else {
	$class      = 'rdtheme-add-to-wishlist';
	$icon_font  = 'fa fa-heart-o';
	$title      = $title_before;
}

$html = '';

if ( $icon ) {
	$html .= '<i class="wishlist-icon '.$icon_font.'"></i>';
}

$html .= '<img class="ajax-loading" alt="spinner" src="'.URI_Helper::get_img( 'spinner2.gif' ).'">';

if ( $text ) {
	$html .= '<span>' . esc_html__( 'WishList', 'panpie' ) . '</span>';
}
?>
<a href="<?php echo esc_url( $wishlist_url );?>" title="<?php echo esc_attr( $title );?>" rel="nofollow" data-product-id="<?php echo esc_attr( $product_id );?>" data-title-after="<?php echo esc_attr( $title_after );?>" class="rdtheme-wishlist-icon <?php echo esc_attr( $class );?>" target="_blank">
	<?php echo wp_kses( $html , 'alltext_allow' ); ?>
</a>