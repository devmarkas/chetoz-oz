<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
?>

<?php
if (!empty( $_GET["archive"] )) {
$get_archive = $_GET["archive"];
} else {
$get_archive = '';
}
if ( PanpieTheme::$options['wc_archive_layouts'] == 'regular' ) { ?>
	<div class="woo-shop-top">
		<div class="col-md-5 col-sm-12 col-12 top-left">
			<div class="limit-show media-body">
				<div><?php woocommerce_result_count();?></div>
			</div>
		</div>
		<div class="col-md-7 col-sm-12 col-12 top-right">
			<div class="sort-list">
				<?php woocommerce_catalog_ordering();?>
			</div>
			<div class="view-mode <?php if ( is_rtl() ) { ?>pull-left<?php } else { ?>pull-right<?php } ?>" id="shop-view-mode">
				<ul>
					<li class="grid-view-nav"><a href="#" ><i class="fa fa-th-large"></i></a></li> 
					<li class="list-view-nav"><a href="#"><i class="fa fa-list"></i></a></li>            
				</ul>
			</div>
		</div>
	</div>
<?php } else { ?>
<div class="filter-heading isotop-btn-heading">
		<div class="row ml-0 mr-0 isotop-wrap align-items-center justify-content-between">
			<div class="top-left">
				<div class="show-result"><?php woocommerce_result_count();?></div>
			</div>
			<div class="order-xl-2 top-right">
				<div class="filter-sort"><?php woocommerce_catalog_ordering();?></div>
				<?php if ( $get_archive == '2' ) {  ?>
				<div class="view-mode <?php if ( is_rtl() ) { ?>pull-left<?php } else { ?>pull-right<?php } ?>" id="shop-view-mode">
					<ul>
						<li class="grid-view-nav"><a href="#" ><i class="fa fa-th-large"></i></a></li> 
						<li class="list-view-nav"><a href="#"><i class="fa fa-list"></i></a></li>            
					</ul>
				</div>
			<?php } ?>
			</div>
			<?php if ( $get_archive != '2' ) {  ?>
			<div class="order-xl-1">			
				<div class="isotope-classes-tab">
					<a class="nav-item current" href="#" data-filter="*" ><?php esc_html_e( 'All', 'panpie' );?></a>
					<?php
					
						if ( !empty( $data['category_list'] ) ) {
							foreach ( $data['category_list'] as $cat ) {
								$cats[] = array(
									'cat_multi_box' => $cat['cat_multi_box'],
								);
							}
						} else {
							$product_terms = get_terms( 'product_cat', array(
								'hide_empty' => true,
							) );
							foreach ( $product_terms as $product_term ){
								$cats[] = array(
									'cat_multi_box' => $product_term->term_id,
								);
							}	
						}
						
						if ( !empty( $cats ) ) {
						//category
						$category_number = count( $cats );
							foreach ( $cats as $cat ) {
							if ( $cat['cat_multi_box'] != 0 ) {
								$term_name = get_term( $cat['cat_multi_box'], 'product_cat' );						
								$cat_filter = $term_name->slug;
					?>				
					<a class="nav-item" href="#" data-filter=".<?php echo esc_attr( $cat_filter );?>"><?php echo esc_html( $term_name->name ); ?></a>
					<?php } } } ?>
				</div>
			</div>
			<?php } ?>
		</div>
</div>
<?php } ?>