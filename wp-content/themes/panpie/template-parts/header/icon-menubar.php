<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>


<?php if ( PanpieTheme::$options['search_icon'] || PanpieTheme::$options['cart_icon'] && class_exists( 'WC_Widget_Cart' ) ) { ?>
<div class="info-menu-bar">
	<?php if ( PanpieTheme::$options['cart_icon'] && class_exists( 'WC_Widget_Cart' ) ) { ?>
	<div class="cart-icon-area">
		<a href="<?php echo esc_url( wc_get_cart_url() );?>" ><i class="fas fa-shopping-cart" aria-hidden="true"></i><span class="cart-icon-num"><?php echo WC()->cart->get_cart_contents_count();?></span> – <?php echo wp_kses( WC()->cart->get_cart_total(), 'alltext_allow' ); ?></a>
	</div>
	<?php } ?>
	<?php if ( PanpieTheme::$options['search_icon'] ) { ?>
	<div class="header-search-box">
		<a class="glass-icon" href="#header-search" title="<?php esc_attr_e( 'Search', 'panpie');?>">
			<i class="fas fa-search"></i>
		</a>
		<a class="cross-icon" href="#header-cross" title="<?php esc_attr_e( 'Search', 'panpie');?>">
		  <i class="fa fa-times" aria-hidden="true"></i>
		</a>
		<div class="header-search-field">
			<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) )  ?>" class="search-form">
				<input required="" type="text" id="search-form-5f51fb188e3b0" class="search-field" placeholder="Search …" value="" name="s">
				<button class="search-button" type="submit">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</form>
		</div>
	</div>
	<?php } ?>
</div>
<?php } ?>