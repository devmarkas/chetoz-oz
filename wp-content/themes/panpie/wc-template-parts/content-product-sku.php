<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

global $product;?>

<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
	<?php if (  PanpieTheme::$options['wc_sku'] ) { ?>
	<div class="sku">
		<span><?php esc_html_e( 'SKU:', 'panpie' ); ?></span> <?php echo esc_html ( $sku = $product->get_sku() ) ? $sku : esc_html ( 'N/A', 'panpie' ); ?>
	</div>
	<?php } ?>
<?php endif;