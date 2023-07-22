<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
if ( PanpieTheme::$layout == 'full-width' ) {
	$panpie_layout_class = 'col-sm-12 col-12';
}  else {
	$panpie_layout_class = PanpieTheme_Helper::has_active_widget();	
}
?>
<div id="primary" class="content-area shop-page <?php if ( PanpieTheme::$options['wc_archive_layouts'] !== 'regular' ) { ?>food-menu-inner<?php } ?>">
	<div class="container">
		<div class="row">
			<?php if ( PanpieTheme::$layout == 'left-sidebar' ) { ?>
				<div class="col-lg-4 col-md-12 col-12">
					<aside class="sidebar-widget-area">
						<?php if ( is_active_sidebar( 'shop-sidebar-1' ) ) dynamic_sidebar( 'shop-sidebar-1' ); ?>
					</aside>
				</div>
			<?php } ?>
			
			<div class="<?php echo esc_attr( $panpie_layout_class );?>">				
				<?php
					if ( PanpieTheme::$options['wc_block_layouts'] == 'regular' ){ 
						$product_box_class = 'regular';
					} else if( PanpieTheme::$options['wc_block_layouts'] == 'panpiestyle' ){
						$product_box_class = 'isotope-wrap';
					} else if( PanpieTheme::$options['wc_block_layouts'] == 'panpiestyle2' ){
						$product_box_class = 'isotope-wrap food-menu-combo menu-combo-inner';
					} else if( PanpieTheme::$options['wc_block_layouts'] == 'panpiestyle3' ){
						$product_box_class = 'food-menu-isotop isotope-wrap';
					} else if( PanpieTheme::$options['wc_block_layouts'] == 'panpiestyle4' ){
						$product_box_class = 'isotope-wrap';
					}
				?>
				<main id="main" class="site-main <?php echo esc_attr( $product_box_class ); ?>">
				