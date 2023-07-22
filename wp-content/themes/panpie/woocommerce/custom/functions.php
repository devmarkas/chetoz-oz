<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

class WC_Functions {

	protected static $instance = null;

	public function __construct() {
		/* Theme supports for WooCommerce */
		add_action( 'after_setup_theme',                               array( $this, 'theme_support' ) );

		/* Body class */
		add_filter( 'body_class',                                      array( $this, 'body_classes' ) );

		/* Title */
		add_filter( 'rdtheme_page_title',                              array( $this, 'page_title' ) );

		/* Header cart count number */
		add_filter( 'woocommerce_add_to_cart_fragments',               array( $this, 'header_cart_count' ) );

		/* Breadcrumb */
		remove_action( 'woocommerce_before_main_content',              'woocommerce_breadcrumb', 20, 0 );

		/* Replace default placeholder image */
		add_filter( 'woocommerce_placeholder_img_src',                 array( $this, 'placeholder_img_src' ) );

		/* Modify responsive smallscreen size */
		add_filter( 'woocommerce_style_smallscreen_breakpoint',        array( $this, 'smallscreen_breakpoint' ) );

		/* Shop hide default page title */
		add_filter( 'woocommerce_show_page_title',                     '__return_false' );

		/* Star rating html */
		add_filter( 'woocommerce_product_get_rating_html',             array( $this, 'star_rating_html' ), 10, 3 );

		/* Shop/Archive Wrapper */
		remove_action( 'woocommerce_before_main_content',              'woocommerce_output_content_wrapper', 10 );
		remove_action( 'woocommerce_sidebar',                          'woocommerce_get_sidebar', 10 );
		remove_action( 'woocommerce_after_main_content',               'woocommerce_output_content_wrapper_end', 10 );
		add_action( 'woocommerce_before_main_content',                 array( $this, 'wrapper_start' ), 10 );
		add_action( 'woocommerce_after_main_content',                  array( $this, 'wrapper_end' ), 10 );

		/* Shop top tab */
		remove_action( 'woocommerce_before_shop_loop',                 'woocommerce_result_count', 20 );
		remove_action( 'woocommerce_before_shop_loop',                 'woocommerce_catalog_ordering', 30 );
		add_action( 'woocommerce_before_shop_loop',                    array( $this, 'shop_topbar' ), 20 );

		/* Shop loop */
		add_filter( 'loop_shop_per_page',                              array( $this, 'loop_shop_per_page' ) );
		add_filter( 'loop_shop_columns',                               array( $this, 'loop_shop_columns' ) );

		remove_action( 'woocommerce_before_shop_loop_item',            'woocommerce_template_loop_product_link_open', 10 );
		remove_action( 'woocommerce_before_shop_loop_item_title',      'woocommerce_show_product_loop_sale_flash', 10 );
		remove_action( 'woocommerce_before_shop_loop_item_title',      'woocommerce_template_loop_product_thumbnail', 10 );
		remove_action( 'woocommerce_shop_loop_item_title',             'woocommerce_template_loop_product_title', 10 );
		remove_action( 'woocommerce_after_shop_loop_item_title',       'woocommerce_template_loop_rating', 5 );
		remove_action( 'woocommerce_after_shop_loop_item_title',       'woocommerce_template_loop_price', 10 );
		remove_action( 'woocommerce_after_shop_loop',                  'woocommerce_pagination', 10 );
		remove_action( 'woocommerce_after_shop_loop_item',             'woocommerce_template_loop_product_link_close', 5 );
		remove_action( 'woocommerce_after_shop_loop_item',             'woocommerce_template_loop_add_to_cart', 10 );
		add_action( 'woocommerce_after_shop_loop',                     array( $this, 'pagination' ), 10 );

		/* Single Product */
		remove_action( 'woocommerce_single_product_summary',           'woocommerce_template_single_meta', 40 );
		remove_action( 'woocommerce_review_before_comment_meta',       'woocommerce_review_display_rating', 10 );
		remove_action( 'woocommerce_after_single_product_summary',     'woocommerce_output_product_data_tabs', 10 );

		add_action( 'woocommerce_single_product_summary',              'woocommerce_template_single_meta', 15 );
		add_action( 'woocommerce_before_add_to_cart_button',           array( $this, 'add_to_cart_button_wrapper_start' ), 3 );
		add_action( 'woocommerce_after_add_to_cart_button',            array( $this, 'single_add_to_cart_button' ) );
		add_action( 'woocommerce_after_add_to_cart_button',            array( $this, 'add_to_cart_button_wrapper_end' ), 90 );
		add_action( 'init',                                            array( $this, 'show_or_hide_related_products' ) );

		// Hide product data tabs
		add_filter( 'woocommerce_product_tabs',                        array( $this, 'hide_product_data_tab' ) );
		add_filter( 'woocommerce_product_review_comment_form_args',    array( $this, 'product_review_form' ) );

		// Hide some tab headings
		add_filter( 'woocommerce_product_description_heading',            '__return_false' );
		add_filter( 'woocommerce_product_additional_information_heading', '__return_false' );

		// Review avatar size
		add_filter( 'woocommerce_review_gravatar_size',                 array( $this, 'review_gravatar_size' ) );


		/* Cart */
		remove_action( 'woocommerce_cart_collaterals',                 'woocommerce_cross_sell_display' );
		remove_action( 'woocommerce_cart_collaterals',                 'woocommerce_cart_totals', 10 );
		add_action( 'woocommerce_cart_collaterals',                    'woocommerce_cart_totals' );

		add_action( 'init',                                            array( $this, 'show_or_hide_cross_sells' ) );

		/* Checkout */
		remove_action( 'woocommerce_checkout_order_review',            'woocommerce_checkout_payment', 20 );
		add_action( 'woocommerce_checkout_after_order_review',         'woocommerce_checkout_payment' );

		/* Yith Quickview */
		if ( function_exists( 'YITH_WCQV_Frontend' ) ) {
			remove_action( 'woocommerce_after_shop_loop_item',         array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
			remove_action( 'yith_wcwl_table_after_product_name',       array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
			remove_action( 'yith_wcqv_product_summary',                'woocommerce_template_single_meta', 30 );
			add_action( 'yith_wcqv_product_summary',                   'woocommerce_template_single_meta', 15 );
		}

		/* Yith Compare */
		if ( class_exists( 'YITH_Woocompare' ) ) {
			global $yith_woocompare;
			remove_action( 'woocommerce_after_shop_loop_item',          array( $yith_woocompare->obj, 'add_compare_link' ), 20 );
			remove_action( 'woocommerce_single_product_summary',        array( $yith_woocompare->obj, 'add_compare_link' ), 35 );
			add_filter( 'yith_woocompare_compare_added_label',          '__return_empty_string' );
		}

		/* Yith Wishlist */
		if ( function_exists( 'YITH_WCWL_Init' ) && function_exists( 'YITH_WCWL' )  ) {
			$wishlist_init = YITH_WCWL_Init();
			$wishlist      = YITH_WCWL();
			remove_action( 'wp_head',                                   array( $wishlist_init, 'add_button' ) );
			remove_action( 'init', 										array( $wishlist, 'add_to_wishlist' ) );
			remove_action( 'init', 										array( $wishlist, 'remove_from_wishlist' ) );

			add_action('wp_ajax_rdtheme_wishlist',                      array( $this, 'ajax_wishlist_icon' ) );
			add_action('wp_ajax_nopriv_rdtheme_wishlist',               array( $this, 'ajax_wishlist_icon' ) );
		}

		/* Variation Swatch and Gallery */

		// Remove variation swatch auto calling from archive
		remove_action( 'init', array( 'Rtwpvs\Controllers\ShopPage', 'shop_page_init' ) );

		// Disable license notice
		add_filter( 'rtwpvs_check_license', '__return_false' );
		add_filter( 'rtwpvg_check_license', '__return_false' );

		// Disable promotional tabs
		add_action( 'rtwpvs_settings_fields', array( $this, 'rtwpv_disable_promotion' ) );
		add_action( 'rtwpvg_settings_fields', array( $this, 'rtwpv_disable_promotion' ) );
	}

	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function theme_support() {
		add_theme_support( 'woocommerce', array(
		    'gallery_thumbnail_image_width' => 150
		) );

		add_theme_support( 'wc-product-gallery-lightbox' );
		add_post_type_support( 'product', 'page-attributes' );
	}

	public function body_classes( $classes ) {
		if( isset( $_GET["shopview"] ) && $_GET["shopview"] == 'list' ) {
			$classes[] = 'product-list-view';
		}
		else {
			$classes[] = 'product-grid-view';
		}

		if ( is_singular( 'product' ) ) {
			$classes[] = 'single-product-layout-' . RDTheme::$options['wc_single_product_layout'];
		}

		if ( function_exists( 'rtwpvg' ) ) {
			$classes[] = 'thumb-pos-' . rtwpvg()->get_option('thumbnail_position');
		}

		return $classes;
	}

	public function page_title( $title ) {
		if ( is_woocommerce() ) {
			$title = woocommerce_page_title( false );
		}
		
		return $title;
	}

	public function header_cart_count( $fragments ) {
		$number = '<span class="cart-icon-num">' . WC()->cart->get_cart_contents_count() . '</span>';
		$total  = '<div class="cart-icon-total">' . WC()->cart->get_cart_total() . '</div>';
		$fragments['span.cart-icon-num']   = $number;
		$fragments['div.cart-icon-total']  = $total;
		return $fragments;
	}

	public function placeholder_img_src( $src ) {
		$default = WC()->plugin_url() . '/assets/images/placeholder.png';

		if ( $src == $default ) {
			$src = URI_Helper::get_img( 'wc-placeholder.jpg' );
		}

		return $src;
	}

	public function pagination() {
		if ( RDTheme::$options['wc_pagination'] == 'load-more' ) {
			LoadMore::instance()->init( 'loadmore' );
		}
		else if ( RDTheme::$options['wc_pagination'] == 'infinity-scroll' ) {
			LoadMore::instance()->init( 'infiscroll' );
		}
		else {
			get_template_part( 'template-parts/pagination' );
		}
	}

	public function smallscreen_breakpoint(){
		return '767px';
	}

	public function star_rating_html( $html, $rating, $count ){
		$html = 0 < $rating ?'<div class="rdtheme-star-rating"><span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"></span></div>' : '';
		return $html;
	}

	public function wrapper_start() {
		self::get_custom_template_part( 'shop-header' );
	}

	public function wrapper_end() {
		self::get_custom_template_part( 'shop-footer' );
	}

	public function shop_topbar() {
		self::get_custom_template_part( 'shop-top' );
	}

	public function loop_shop_per_page(){
		return RDTheme::$options['wc_num_product'];
	}

	public function loop_shop_columns(){
		if ( RDTheme::$layout == 'full-width' ) {
			return 4;
		}
		return 3;
	}

	public function add_to_cart_button_wrapper_start(){
		echo '<div class="single-add-to-cart-wrapper">';
	}

	public function add_to_cart_button_wrapper_end(){
		echo '</div>';
	}

	public function single_add_to_cart_button(){
		echo '<div class="product-single-meta-btns">';
		self::print_add_to_wishlist_icon();
		self::print_quickview_icon();
		self::print_compare_icon();
		echo '</div>';
	}	

	public function show_or_hide_related_products(){
		// Show or hide related products
		if ( empty( RDTheme::$options['wc_related'] ) ) {
			remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
		}
	}

	public function hide_product_data_tab( $tabs ){
		if ( empty( RDTheme::$options['wc_description'] ) ) {
			unset( $tabs['description'] );
		}
		if ( empty( RDTheme::$options['wc_reviews'] ) ) {
			unset( $tabs['reviews'] );
		}
		if ( empty( RDTheme::$options['wc_additional_info'] ) ) {
			unset( $tabs['additional_information'] );
		}
		return $tabs;
	}
	
	public function review_gravatar_size(){
		return '85';
	}
	
	public function product_review_form( $comment_form ){
		$commenter = wp_get_current_commenter();

		$comment_form['fields'] = array(
			'author' => '<div class="row"><div class="col-sm-6"><div class="comment-form-author form-group"><input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . esc_html__( 'Name *', 'panpie' ) . '" required /></div></div>',
			'email'  => '<div class="comment-form-email col-sm-6"><div class="form-group"><input id="email" class="form-control" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_html__( 'Email *', 'panpie' ) . '" required /></div></div></div>',
		);

		$comment_form['comment_field'] = '';

		if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
			$comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__( 'Your Rating', 'panpie' ) .'</label>
			<select name="rating" id="rating" required>
			<option value="">' . esc_html__( 'Rate&hellip;', 'panpie' ) . '</option>
			<option value="5">' . esc_html__( 'Perfect', 'panpie' ) . '</option>
			<option value="4">' . esc_html__( 'Good', 'panpie' ) . '</option>
			<option value="3">' . esc_html__( 'Average', 'panpie' ) . '</option>
			<option value="2">' . esc_html__( 'Not that bad', 'panpie' ) . '</option>
			<option value="1">' . esc_html__( 'Very Poor', 'panpie' ) . '</option>
			</select></p>';
		}

		$comment_form['comment_field'] .= '<div class="form-group comment-form-comment"><textarea id="comment" name="comment" class="form-control" placeholder="' . esc_html__( 'Your Review *', 'panpie' ) . '" cols="45" rows="8" required></textarea></div>';

		return $comment_form;
	}

	public function show_or_hide_cross_sells(){
		// Show or hide related cross sells
		if ( !empty( RDTheme::$options['wc_cross_sell'] ) ) {
			add_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
		}
	}

	public static function get_template_part( $template, $args = array() ){
		extract( $args );

		$template = '/' . $template . '.php';

		if ( file_exists( get_stylesheet_directory() . $template ) ) {
			$file = get_stylesheet_directory() . $template;
		}
		else {
			$file = get_template_directory() . $template;
		}

		require $file;
	}

	public static function get_custom_template_part( $template, $args = array() ){
		$template = 'woocommerce/custom/template-parts/' . $template;
		self::get_template_part( $template, $args );
	}

	public static function product_slider( $products, $title, $type='' ) {
		$filename = '/woocommerce/custom/template-parts/product-slider.php';

		$child_file  = get_stylesheet_directory() . $filename;
		$parent_file = get_template_directory() . $filename;

		if ( file_exists( $child_file ) ) {
			$file = $child_file;
		}
		else {
			$file = $parent_file;
		}

		include $file;
	}

	public static function print_add_to_cart_icon( $icon = true, $text = true ){
		global $product;
		$quantity = 1;
		$class = implode( ' ', array_filter( array(
			'action-cart',
			'product_type_' . $product->get_type(),
			$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
			$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
		) ) );

		$html = '';

		if ( $icon ) {
			$html .= '<i class="flaticon-shopping-cart"></i>';
		}

		if ( $text ) {
			$html .= '<span>' . $product->add_to_cart_text() . '</span>';
		}

		echo sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">' . $html . '</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $quantity ) ? $quantity : 1 ),
			esc_attr( $product->get_id() ),
			esc_attr( $product->get_sku() ),
			esc_attr( isset( $class ) ? $class : 'action-cart' )
		);
	}

	public static function print_quickview_icon( $icon = true, $text = false ){
		if ( !function_exists( 'YITH_WCQV_Frontend' ) ) {
			return false;
		}

		if ( is_shop() && !RDTheme::$options['wc_shop_quickview_icon'] ) {
			return false;
		}

		if ( is_product() && !RDTheme::$options['wc_product_quickview_icon'] ) {
			return false;
		}

		global $product;

		$html = '';

		if ( $icon ) {
			$html .= '<i class="flaticon-eye"></i>';
		}

		if ( $text ) {
			$html .= '<span>' . esc_html__( 'QuickView', 'panpie' ) . '</span>';
		}

		?>
		<a href="#" class="yith-wcqv-button" data-product_id="<?php echo esc_attr( $product->get_id() );?>" title="<?php esc_attr_e( 'QuickView', 'panpie' ); ?>"><?php echo wp_kses( $html , 'alltext_allow' ); ?></a>
		<?php
	}
	
	public static function print_compare_icon( $icon = true, $text = false ){
		if ( !class_exists( 'YITH_Woocompare' ) ) {
			return false;
		}

		if ( is_shop() && !RDTheme::$options['wc_shop_compare_icon'] ) {
			return false;
		}

		if ( is_product() && !RDTheme::$options['wc_product_compare_icon'] ) {
			return false;
		}

		global $product;
		global $yith_woocompare;
		$id  = $product->get_id();
		$url = method_exists( $yith_woocompare->obj, 'add_product_url' ) ? $yith_woocompare->obj->add_product_url( $id ) : '';

		$html = '';

		if ( $icon ) {
			$html .= '<i class="fa fa-exchange" aria-hidden="true"></i>';
		}

		if ( $text ) {
			$html .= '<span>' . esc_html__( 'Compare', 'panpie' ) . '</span>';
		}

		?>
		<a href="<?php echo esc_url( $url );?>" class="compare" data-product_id="<?php echo esc_attr( $id );?>" title="<?php esc_attr_e( 'Add To Compare', 'panpie' ); ?>"><?php echo wp_kses( $html , 'alltext_allow' ); ?></a>
		<?php
	}

	public static function print_add_to_wishlist_icon( $icon = true, $text = false ){
		if ( !defined( 'YITH_WCWL' ) ) {
			return false;
		}

		if ( is_shop() && !RDTheme::$options['wc_shop_wishlist_icon'] ) {
			return false;
		}

		if ( is_product() && !RDTheme::$options['wc_product_wishlist_icon'] ) {
			return false;
		}

		self::get_custom_template_part( 'wishlist-icon', compact( 'icon', 'text' ) );
	}

	public function ajax_wishlist_icon() {
		$wishlist = YITH_WCWL();
		$result = $wishlist->add();
		echo wp_kses( $result , 'alltext_allow' );
		wp_die();
	}

	public static function social_sharing() {
		$url   = urlencode( get_permalink() );
		$title = urlencode( get_the_title() );

		$sharer = array(
			'facebook' => array(
				'url'  => "http://www.facebook.com/sharer.php?u=$url",
				'icon' => 'fa-facebook',
			),
			'twitter'  => array(
				'url'  => "https://twitter.com/intent/tweet?source=$url&text=$title:$url",
				'icon' => 'fa-twitter'
			),
			'linkedin' => array(
				'url'  => "http://www.linkedin.com/shareArticle?mini=true&url=$url&title=$title",
				'icon' => 'fa-linkedin'
			),
			'pinterest'=> array(
				'url'  => "http://pinterest.com/pin/create/button/?url=$url&description=$title",
				'icon' => 'fa-pinterest'
			),
			'tumblr'   => array(
				'url'  => "http://www.tumblr.com/share?v=3&u=$url &quote=$title",
				'icon' => 'fa-tumblr'
			),
			'reddit'   => array(
				'url'  => "http://www.reddit.com/submit?url=$url&title=$title",
				'icon' => 'fa-reddit'
			),
			'vk'       => array(
				'url'  => "http://vkontakte.ru/share.php?url=$url",
				'icon' => 'fa-vk'
			),
		);

		foreach ( RDTheme::$options['wc_share'] as $key => $value ) {
			if ( !$value ) {
				unset( $sharer[$key] );
			}
		}

		return $sharer;
	}

	public function rtwpv_disable_promotion( $options ) {
		if ( isset( $options['license'] ) ) {
			unset( $options['license'] );
		}

		if ( isset( $options['premium_plugins'] ) ) {
			unset( $options['premium_plugins'] );
		}

		return $options;
	}

	public static function get_top_category_name(){
		global $product;

		$terms = wc_get_product_terms( $product->get_id(), 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) );

		if ( empty( $terms ) ) {
			return '';
		}

		if ( $terms[0]->parent == 0 ) {
			$cat = $terms[0];
		}
		else {
			$ancestors = get_ancestors( $terms[0]->term_id, 'product_cat', 'taxonomy' );
			$cat_id    = end( $ancestors );
			$cat       = get_term( $cat_id, 'product_cat' );
		}

		return $cat->name;
	}

	public static function get_product_thumbnail( $product, $thumb_size = 'woocommerce_thumbnail' ) {
		$thumbnail   = $product->get_image( $thumb_size, array(), false );
		if ( !$thumbnail ) {
			$thumbnail = wc_placeholder_img( $thumb_size );
		}
		return $thumbnail;
	}

	public static function get_product_thumbnail_link( $product, $thumb_size = 'woocommerce_thumbnail' ) {
		return '<a href="'.esc_attr( $product->get_permalink() ).'">'.self::get_product_thumbnail( $product, $thumb_size ).'</a>';
	}

	public static function get_product_thumbnail_gallery( $product, $thumb_size = 'woocommerce_thumbnail' ) {
		$attachment_ids = $product->get_gallery_image_ids();

		if ( empty( $attachment_ids ) ) {
			return self::get_product_thumbnail_link( $product, $thumb_size );
		}

		$thumb = $product->get_image_id();
		if ( $thumb ) {
			array_unshift( $attachment_ids, $thumb );
		}

		$data = array( 
			'slidesToShow' => 1,
			'prevArrow'    => '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
			'nextArrow'    => '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
			'dots'         => false,

		);
		$data = json_encode( $data );
		?>
		<div class="rt-slick-slider" data-slick="<?php echo esc_attr( $data );?>">
			<?php foreach ( $attachment_ids as $attachment_id ): ?>
				<a href="<?php echo esc_attr( $product->get_permalink() );?>"><?php echo wp_get_attachment_image( $attachment_id, $thumb_size )?></a>
			<?php endforeach; ?>
		</div>
		<?php
	}

	public static function is_product_archive() {
		return is_shop() || is_product_taxonomy() ? true : false;
	}

	public static function run_variation_swatch() {
		if ( class_exists( '\Rtwpvs\Controllers\ShopPage' ) ) {
			\Rtwpvs\Controllers\ShopPage::archive_shop_attribute_swatches();
		}
	}

	public static function kses_img( $img ) {
		$allowed_tags = wp_kses_allowed_html( 'post' );
		$attributes = array( 'srcset', 'sizes' );

		foreach ( $attributes as $attribute ) {
			$allowed_tags['img'][$attribute] = true;
		}

		return wp_kses( $img, $allowed_tags );
	}
}

WC_Functions::instance();