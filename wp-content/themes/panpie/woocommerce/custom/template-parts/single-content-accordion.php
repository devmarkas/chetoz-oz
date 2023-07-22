<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Panpie;

$right_col = is_active_sidebar( 'product-left-area' ) ? 'product-sidebar-active col-xl-9 col-lg-8 col-md-7 col-12' : 'col-12';
?>

<div class="single-product-accordion-layout row">

	<?php if ( is_active_sidebar( 'product-left-area' ) ): ?>
		<div class="col-xl-3 col-lg-4 col-md-5 col-12">
			<div class="sidebar-widget-area"><?php dynamic_sidebar( 'product-left-area' );?></div>
		</div>		
	<?php endif; ?>

	<div class="<?php echo esc_attr( $right_col );?>">
		<div class="rtin-inner position-relative">

			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>

			<div class="summary entry-summary">
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
				?>
			</div>

			<?php WC_Functions::get_custom_template_part( 'product-tab-accordian' );?>

		</div>
	</div>
</div>

<?php
/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
do_action( 'woocommerce_after_single_product_summary' );