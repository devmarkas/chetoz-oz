<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

/*-------------------------------------
INDEX
=======================================
#. Container
#. Typography
#. Top Bar
#. Header
#. Banner
#. Footer
#. Widgets
#. Inner Contents
#. Error 404
#. comment
#. Buttons
#. Gradient
#. Single Content
#. Archive Contents
#. Pagination
#. Contact Form 7
#. Single Team
#. WooCommerce
#. Miscellaneous
-------------------------------------*/

$primary_color         = PanpieTheme::$options['primary_color']; // #df1c2b
$primary_rgb           = PanpieTheme_Helper::hex2rgb( $primary_color ); // 255, 3, 2
$secondary_color       = PanpieTheme::$options['secondary_color']; // #fdc902
$secondary_rgb         = PanpieTheme_Helper::hex2rgb( $secondary_color ); // 253, 201, 2

$gradient_dark_color   = PanpieTheme::$options['gradient_dark_color'];
$gradient_light_color  = PanpieTheme::$options['gradient_light_color'];

$container_width	   = PanpieTheme::$options['container_width']; // Grid Container width

$menu_color            = PanpieTheme::$options['menu_color'];
$menu_color_tr         = PanpieTheme::$options['menu_color_tr'];
$menu_hover_color      = PanpieTheme::$options['menu_hover_color'];
$submenu_color         = PanpieTheme::$options['submenu_color'];
$submenu_bgcolor       = PanpieTheme::$options['submenu_bgcolor'];
$submenu_hover_color   = PanpieTheme::$options['submenu_hover_color'];
$submenu_hover_bgcolor = PanpieTheme::$options['submenu_hover_bgcolor'];

$panpie_typo_body     = PanpieTheme::$options['typo_body'];
$panpie_typo_h1       = PanpieTheme::$options['typo_h1'];
$panpie_typo_h2       = PanpieTheme::$options['typo_h2'];
$panpie_typo_h3       = PanpieTheme::$options['typo_h3'];
$panpie_typo_h4       = PanpieTheme::$options['typo_h4'];
$panpie_typo_h5       = PanpieTheme::$options['typo_h5'];
$panpie_typo_h6       = PanpieTheme::$options['typo_h6'];


/* = Body Typo Area
=======================================================*/
$typo_body = json_decode( PanpieTheme::$options['typo_body'], true );
if ($typo_body['font'] == 'Inherit') {
	$typo_body['font'] = 'Roboto';
} else {
	$typo_body['font'] = $typo_body['font'];
}

/* = Menu Typo Area
=======================================================*/
$typo_menu = json_decode( PanpieTheme::$options['typo_menu'], true );
if ($typo_menu['font'] == 'Inherit') {
	$typo_menu['font'] = 'Barlow';
} else {
	$typo_menu['font'] = $typo_menu['font'];
}

/* = Heading Typo Area
=======================================================*/
$typo_heading = json_decode( PanpieTheme::$options['typo_heading'], true );
if ($typo_heading['font'] == 'Inherit') {
	$typo_heading['font'] = 'Barlow';
} else {
	$typo_heading['font'] = $typo_heading['font'];
}
$typo_h1 = json_decode( PanpieTheme::$options['typo_h1'], true );
if ($typo_h1['font'] == 'Inherit') {
	$typo_h1['font'] = 'Barlow';
} else {
	$typo_h1['font'] = $typo_h1['font'];
}
$typo_h2 = json_decode( PanpieTheme::$options['typo_h2'], true );
if ($typo_h2['font'] == 'Inherit') {
	$typo_h2['font'] = 'Barlow';
} else {
	$typo_h2['font'] = $typo_h2['font'];
}
$typo_h3 = json_decode( PanpieTheme::$options['typo_h3'], true );
if ($typo_h3['font'] == 'Inherit') {
	$typo_h3['font'] = 'Barlow';
} else {
	$typo_h3['font'] = $typo_h3['font'];
}
$typo_h4 = json_decode( PanpieTheme::$options['typo_h4'], true );
if ($typo_h4['font'] == 'Inherit') {
	$typo_h4['font'] = 'Barlow';
} else {
	$typo_h4['font'] = $typo_h4['font'];
}
$typo_h5 = json_decode( PanpieTheme::$options['typo_h5'], true );
if ($typo_h5['font'] == 'Inherit') {
	$typo_h5['font'] = 'Barlow';
} else {
	$typo_h5['font'] = $typo_h5['font'];
}
$typo_h6 = json_decode( PanpieTheme::$options['typo_h6'], true );
if ($typo_h6['font'] == 'Inherit') {
	$typo_h6['font'] = 'Barlow';
} else {
	$typo_h6['font'] = $typo_h6['font'];
}

?>
<?php
/*-------------------------------------
#. Container
---------------------------------------*/
?>
@media ( min-width:1200px ) {
	.container {
		max-width: <?php echo esc_html( $container_width ); ?>px;
	}
}
a {
	color: <?php echo esc_html( $primary_color ); ?>;
}
a:hover {
	color: <?php echo esc_html( $secondary_color ); ?>;
}
.primary-color {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.secondary-color {
	color: <?php echo esc_html( $secondary_color ); ?>;
}
#preloader {
	background-color: <?php echo esc_html( PanpieTheme::$options['preloader_bg_color'] ); ?>;
}

<?php
/*-------------------------------------
#. Typography
---------------------------------------*/
?>
body {
	color: <?php echo esc_html( PanpieTheme::$options['body_color'] ); ?>;
	font-family: '<?php echo esc_html( $typo_body['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( PanpieTheme::$options['typo_body_size'] ) ?>;
	line-height: <?php echo esc_html( PanpieTheme::$options['typo_body_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_body['regularweight'] ) ?>;
	font-style: normal;
}
h1,h2,h3,h4,h5,h6 {
	font-family: '<?php echo esc_html( $typo_heading['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_heading['regularweight'] ); ?>;
}

<?php if (!empty($typo_h1['font'])){ ?>
h1 {
	font-family: '<?php echo esc_html( $typo_h1['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h1['regularweight'] ); ?>;
}
<?php } ?>
h1 {
	font-size: <?php echo esc_html( PanpieTheme::$options['typo_h1_size'] ); ?>;
	line-height: <?php echo esc_html(  PanpieTheme::$options['typo_h1_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h2['font'])) { ?>
h2 {
	font-family: '<?php echo esc_html( $typo_h2['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h2['regularweight'] ); ?>;
}
<?php } ?>
h2 {
	font-size: <?php echo esc_html( PanpieTheme::$options['typo_h2_size'] ); ?>;
	line-height: <?php echo esc_html( PanpieTheme::$options['typo_h2_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h3['font'])) { ?>
h3 {
	font-family: '<?php echo esc_html( $typo_h3['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h3['regularweight'] ); ?>;
}
<?php } ?>
h3 {
	font-size: <?php echo esc_html( PanpieTheme::$options['typo_h3_size'] ); ?>;
	line-height: <?php echo esc_html(  PanpieTheme::$options['typo_h3_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h4['font'])) { ?>
h4 {
	font-family: '<?php echo esc_html( $typo_h4['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h4['regularweight'] ); ?>;
}
<?php } ?>
h4 {
	font-size: <?php echo esc_html( PanpieTheme::$options['typo_h4_size'] ); ?>;
	line-height: <?php echo esc_html(  PanpieTheme::$options['typo_h4_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h5['font'])) { ?>
h5 {
	font-family: '<?php echo esc_html( $typo_h5['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h5['regularweight'] ); ?>;
}
<?php } ?>
h5 {
	font-size: <?php echo esc_html( PanpieTheme::$options['typo_h5_size'] ); ?>;
	line-height: <?php echo esc_html(  PanpieTheme::$options['typo_h5_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h6['font'])) { ?>
h6 {
	font-family: '<?php echo esc_html( $typo_h6['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h6['regularweight'] ); ?>;
}
<?php } ?>
h6 {
	font-size: <?php echo esc_html( PanpieTheme::$options['typo_h6_size'] ); ?>;
	line-height: <?php echo esc_html(  PanpieTheme::$options['typo_h6_height'] ); ?>;
	font-style: normal;
}

<?php
/*-------------------------------------
#. Top Bar
---------------------------------------*/
?>
.topbar-style-1 .header-top-bar {
	background-color: <?php echo esc_html( PanpieTheme::$options['top_bar_bgcolor'] ); ?>;
	color: <?php echo esc_html( PanpieTheme::$options['top_bar_color'] ); ?>;
}
.topbar-style-1 .header-top-bar a {
	color: <?php echo esc_html( PanpieTheme::$options['top_bar_color'] ); ?>;
}
.topbar-style-1 .tophead-left i,
.topbar-style-1 .tophead-right .header-button i,
.topbar-style-1 .tophead-right .tophead-social a:hover {
	color: <?php echo esc_html( PanpieTheme::$options['top_baricon_color'] ); ?>;
}
.topbar-style-1.trheader .header-top-bar {
	color: <?php echo esc_html( PanpieTheme::$options['top_bar_color_tr'] ); ?>;
}
.topbar-style-1.trheader .header-top-bar a {
	color: <?php echo esc_html( PanpieTheme::$options['top_bar_color_tr'] ); ?>;
}
.topbar-style-1.trheader .header-top-bar .tophead-right i,
.topbar-style-1.trheader .header-top-bar .tophead-left i:before {
	color: <?php echo esc_html( PanpieTheme::$options['top_baricon_color_tr'] ); ?>;
}
.topbar-style-1 .header-top-bar a:hover {
	color: <?php echo esc_html( PanpieTheme::$options['top_baricon_color'] ); ?>;
}
.topbar-style-2 .header-top-bar {
	background-color: <?php echo esc_html( PanpieTheme::$options['top_bar_bgcolor_2'] ); ?>;
	color: <?php echo esc_html( PanpieTheme::$options['top_bar_color_2'] ); ?>;
}
.topbar-style-2 .header-top-bar a {
	color: <?php echo esc_html( PanpieTheme::$options['top_bar_color_2'] ); ?>;
}
.topbar-style-2 .tophead-left i {
	color: <?php echo esc_html( PanpieTheme::$options['top_baricon_color_2'] ); ?>;
}
.topbar-style-2 .header-top-bar .tophead-right a:hover i, 
.topbar-style-2 .header-top-bar .tophead-left a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}

.topbar-style-2.trheader .header-top-bar,
.topbar-style-2.trheader .header-top-bar a {
	color: <?php echo esc_html( PanpieTheme::$options['top_bar_color_tr_2'] ); ?>;
}
.topbar-style-2.trheader .header-top-bar .tophead-right i, 
.topbar-style-2.trheader .header-top-bar .tophead-left i:before {
	color: <?php echo esc_html( PanpieTheme::$options['top_baricon_color_tr_2'] ); ?>;
}

<?php
/*-------------------------------------
#. Header
---------------------------------------*/
?>
<?php // Main Menu ?>
.site-header .main-navigation nav ul li a {
	font-family: '<?php echo esc_html( $typo_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( PanpieTheme::$options['typo_menu_size'] ) ?>;
	line-height: <?php echo esc_html( PanpieTheme::$options['typo_menu_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_menu['regularweight'] ) ?>;
	color: <?php echo esc_html( $menu_color ); ?>;
	font-style: normal;
}
.site-header .main-navigation ul li ul li a {
	font-family: '<?php echo esc_html( $typo_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( PanpieTheme::$options['typo_submenu_size'] ) ?>;
	line-height: <?php echo esc_html( PanpieTheme::$options['typo_submenu_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_menu['regularweight'] ) ?>;
	color: <?php echo esc_html( $submenu_color ); ?>;
	font-style: normal;
}
.mean-container .mean-nav ul li a {
	font-family: '<?php echo esc_html( $typo_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( PanpieTheme::$options['typo_submenu_size'] ) ?>;
	line-height: <?php echo esc_html( PanpieTheme::$options['typo_submenu_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_menu['regularweight'] ) ?>;
	font-style: normal;
}

.site-header .main-navigation ul.menu > li > a:hover,
.site-header .main-navigation ul.menu > li.current-menu-item > a,
.site-header .main-navigation ul.menu > li.current > a {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.header-style-1 .site-header .rt-sticky-menu .main-navigation nav > ul > li > a,
.header-style-2 .site-header .rt-sticky-menu .main-navigation nav > ul > li > a,
.header-style-3 .site-header .rt-sticky-menu .main-navigation nav > ul > li > a,
.header-style-4 .site-header .rt-sticky-menu .main-navigation nav > ul > li > a {
	color: <?php echo esc_html( $menu_color ); ?>;
}
.header-style-1 .site-header .rt-sticky-menu .main-navigation nav > ul > li > a:hover,
.header-style-2 .site-header .rt-sticky-menu .main-navigation nav > ul > li > a:hover,
.header-style-3 .site-header .rt-sticky-menu .main-navigation nav > ul > li > a:hover,
.header-style-4 .site-header .rt-sticky-menu .main-navigation nav > ul > li > a:hover {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.site-header .main-navigation nav ul li a.active {
	color: <?php echo esc_html( $menu_hover_color );?>;
}
.trheader .site-header .main-navigation nav > ul > li > a,
.trheader .site-header .main-navigation .menu > li > a {
	color: <?php echo esc_html( $menu_color_tr );?>;
}
.header-style-1 .site-header .main-navigation ul.menu > li.current > a:hover,
.header-style-1 .site-header .main-navigation ul.menu > li.current-menu-item > a:hover,
.header-style-1 .site-header .main-navigation  ul li a.active,
.header-style-1 .site-header .main-navigation ul.menu > li.current-menu-item > a,
.header-style-1 .site-header .main-navigation ul.menu > li.current > a  {
	color: <?php echo esc_html( $menu_hover_color );?>;
}
.info-menu-bar .cart-icon-area .cart-icon-num,
.header-search-field .search-form .search-button:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.header-search-field .search-form .search-button,
.additional-menu-area .sidenav .closebtn {
	background-color: <?php echo esc_html( $secondary_color ); ?>;
}
.additional-menu-area .sidenav ul li a:hover {
	color: <?php echo esc_html( $submenu_hover_color );?>;
}
.additional-menu-area .sidenav-social span a:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
<?php // Submenu ?>
.site-header .main-navigation ul li ul li {
	background-color: <?php echo esc_html( $submenu_bgcolor ); ?>;
}
.site-header .main-navigation ul.menu li ul.sub-menu li a:hover {
	color: <?php echo esc_html( $submenu_hover_color );?>;
}
.site-header .main-navigation ul.menu li ul.sub-menu li a:hover:after {
	background-color: <?php echo esc_html( $submenu_hover_bgcolor ); ?>;
}
.site-header .main-navigation ul li.mega-menu ul.sub-menu li a:hover {
	color: <?php echo esc_html( $submenu_hover_color ); ?>;
}
.offscreen-navigation li.current-menu-item > a, 
.offscreen-navigation li.current-menu-parent > a {
	color: <?php echo esc_html( $primary_color ); ?>;
}
<?php // Sticky Menu ?>
.rt-sticky-menu-wrapper {
	border-color: <?php echo esc_html( $primary_color ); ?>
}
<?php // Multi Column Menu ?>
.site-header .main-navigation ul li.mega-menu > ul.sub-menu {
	background-color: <?php echo esc_html( $submenu_bgcolor ); ?>
}
.site-header .main-navigation ul li.mega-menu ul.sub-menu li a {
	color: <?php echo esc_html( $submenu_color ); ?>
}
.site-header .main-navigation ul li.mega-menu > ul.sub-menu li:before {
	color: <?php echo esc_html( $primary_color ); ?>;
}
<?php // Mean Menu ?>
.mean-container a.meanmenu-reveal,
.mean-container .mean-nav ul li a.mean-expand {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.mean-container a.meanmenu-reveal span {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.mean-container .mean-bar {	
	border-color: <?php echo esc_html( $primary_color ); ?>;
}
.mean-container .mean-nav ul li a:hover,
.mean-container .mean-nav > ul > li.current-menu-item > a {
	color: <?php echo esc_html( $menu_hover_color ); ?>;
}
.mean-container .mean-nav ul li.current_page_item > a,
.mean-container .mean-nav ul li.current-menu-item > a,
.mean-container .mean-nav ul li.current-menu-parent > a {
	color: <?php echo esc_html( $primary_color );?>;
}
<?php // Header icons ?>
.additional-menu-area a.side-menu-trigger:hover,
.trheader.non-stick .additional-menu-area a.side-menu-trigger:hover {
	color: <?php echo esc_html( $menu_hover_color );?>;
}
.site-header .search-box .search-text {
	border-color: <?php echo esc_html( $primary_color );?>;
}
<?php // Header Layout 1 ?>
.header-style-1 .site-header .header-top .icon-left {
	border-color: <?php echo esc_html( $secondary_color ); ?>;
}
<?php // Header Layout 2 ?>
.header-style-2 .header-icon-area .header-search-box a:hover i {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
<?php // Header Layout 3 ?>
.header-style-3 .site-header .header-button .button-btn:before {
    background: <?php echo esc_html( $secondary_color ); ?>;
}
.header-style-3 .site-header .header-button .button-btn {
    background: <?php echo esc_html( $primary_color ); ?>;
}
<?php // Header Layout 4 ?>
.header-style-4.trheader .site-header .main-navigation nav > ul > li > a:hover {
	color: <?php echo esc_html( $menu_hover_color );?>;
}
<?php // Header Layout 5 ?>
.header-style-5 .header-icon-area .contact-info .icon-left {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.header-style-6 .header-icon-area .contact-info .info-text a {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.header-style-8 .header-icon-area .cart-icon-area .cart-icon-num {
	background-color: <?php echo esc_html( $secondary_color ); ?>;
}
<?php
/*-------------------------------------
#. Banner
---------------------------------------*/
?>
.entry-banner .entry-banner-content h1 {
	color: <?php echo esc_html( PanpieTheme::$options['banner_heading_color'] );?>;
}
.breadcrumb-area .entry-breadcrumb span a,
.breadcrumb-trail ul.trail-items li a {
	color: <?php echo esc_html( PanpieTheme::$options['breadcrumb_link_color'] );?>;
}
.breadcrumb-area .entry-breadcrumb span a:hover,
.breadcrumb-trail ul.trail-items li a:hover {
	color: <?php echo esc_html( PanpieTheme::$options['breadcrumb_link_hover_color'] );?>;
}
.breadcrumb-trail ul.trail-items li,
.entry-banner .entry-breadcrumb .delimiter,
.entry-banner .entry-breadcrumb .dvdr {
	color: <?php echo esc_html( PanpieTheme::$options['breadcrumb_seperator_color'] );?>;
}
.breadcrumb-area .entry-breadcrumb > span:last-child,
.breadcrumb-trail ul.trail-items li > span {
	color: <?php echo esc_html( PanpieTheme::$options['breadcrumb_active_color'] );?>;
}
.entry-banner:after {
    background: rgba(0, 0, 0, <?php  echo esc_html( PanpieTheme::$options['banner_bg_opacity'] ); ?>);
}
.entry-banner .entry-banner-content {
	padding-top: <?php  echo esc_html( PanpieTheme::$options['banner_top_padding'] ); ?>px;
	padding-bottom: <?php  echo esc_html( PanpieTheme::$options['banner_bottom_padding'] ); ?>px;
}
<?php
/*-------------------------------------
#. Footer
---------------------------------------*/
?> 
a.scrollup {
	background-color: <?php echo esc_html( $primary_color ); ?>;
} 
a.scrollup:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area {
	background-color: <?php echo esc_html( PanpieTheme::$options['fbgcolor'] ); ?>;
	color: <?php echo esc_html( PanpieTheme::$options['footer_color'] ); ?>;
}
.footer-area .widgettitle {
	color: <?php echo esc_html( PanpieTheme::$options['footer_title_color'] ); ?>;
}
.footer-top-area .widget a,
.footer-style-1 .footer-area .copyright a,
.footer-top-area .widget ul.menu li a:before,
.footer-top-area .widget_archive li a:before,
.footer-top-area ul li.recentcomments a:before,
.footer-top-area ul li.recentcomments span a:before,
.footer-top-area .widget_categories li a:before,
.footer-top-area .widget_pages li a:before,
.footer-top-area .widget_meta li a:before,
.footer-top-area .widget_recent_entries ul li a:before {
	color: <?php echo esc_html( PanpieTheme::$options['footer_link_color'] ); ?>;
}
.footer-top-area .widget a:hover,
.footer-top-area .widget a:active,
.footer-top-area ul li a:hover i,
.footer-style-1 .footer-area .copyright a:hover,
.footer-top-area .widget ul.menu li a:hover:before,
.footer-top-area .widget_archive li a:hover:before,
.footer-top-area .widget_categories li a:hover:before,
.footer-top-area .widget_pages li a:hover:before,
.footer-top-area .widget_meta li a:hover:before,
.footer-top-area .widget_recent_entries ul li a:hover:before{
	color: <?php echo esc_html( PanpieTheme::$options['footer_link_hover_color'] ); ?>;
}
.footer-top-area .rt_footer_social_widget .footer-social li a:hover {
	background: <?php echo esc_html( $primary_color ); ?>;
}
.widget-open-hour ul.opening-schedule li .os-close {
	color: <?php echo esc_html( $secondary_color ); ?>;
}
.footer-style-2 .footer-top-area .rt_footer_social_widget .footer-social li a:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-box-title-1 span {
	border-top-color: <?php echo esc_html( $primary_color ); ?>;
}

<?php
/*-------------------------------------
#. Widgets
---------------------------------------*/
?>
.search-form button,
.woocommerce.widget_product_search button {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.search-form input:focus,
.woocommerce.widget_product_search .search-field:focus {
	border-color: <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .rt_widget_recent_entries_with_image .media-body .posted-date a,
.sidebar-widget-area .widget ul li.active a,
.sidebar-widget-area .widget ul li.active a:before,
.footer-top-area .search-form input.search-submit,
.footer-top-area ul li:before,
.footer-top-area ul li a:before {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area .search-form input.search-submit,
.footer-top-area ul li a:before,
.footer-top-area .stylish-input-group .input-group-addon button i {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-top-area .stylish-input-group .input-group-addon button:hover {
	background: <?php echo esc_html( $primary_color ); ?>;
}
.rt-box-title-1 {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-topbar,
.footer-topbar .emergrncy-content-holder{
	background: <?php echo esc_html( $primary_color ); ?>;
}
.footer-topbar .emergrncy-content-holder:before {
	border-color: transparent <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget_recent_comments ul li.recentcomments:hover > span:before {
	background-color: <?php echo esc_html( $secondary_color ); ?>;
}
.post-box-style .post-box-date ul li a,
.post-tab-layout .post-box-date ul li:first-child {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.widget ul li a:hover,
.sidebar-widget-area .widget ul li a:hover,
.post-box-style .media-body h3 a:hover,
.post-tab-layout .entry-title a:hover,
.feature-post-layout .entry-title a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.feature-post-layout .post-box-date ul li.feature-date,
.rt_widget_recent_entries_with_image .topic-box .widget-recent-post-title a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.rt_widget_recent_entries_with_image .topic-box .post-date1 span {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .mc4wp-form .form-group .item-btn {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .mc4wp-form .form-group .item-btn:hover {
	background-color: <?php echo esc_html( $secondary_color ); ?>;
}
.post-tab-layout ul.btn-tab li .active {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.call-to-action-content .rtin-des .item-btn:hover,
.sidebar-widget-area .widget .download-list ul li a {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget .download-list ul li a:hover {
	background-color: <?php echo esc_html( $secondary_color ); ?>;
}
.sidebar-widget-area .widget_calendar td a,
.sidebar-widget-area .widget_calendar a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
<?php
/*-------------------------------------
#. Inner Contents
---------------------------------------*/
?>
.entry-footer .about-author .media-body .author-title,
.entry-title h1 a {
	color: <?php echo esc_html( $primary_color );?>;
}
.comments-area .main-comments .replay-area a:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.blog-style-2 .readmore-btn:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
	color: #ffffff;
}
.blog-box .entry-content h3 a:hover,
.blog-layout-2 .entry-content h3 a:hover {
  color: <?php echo esc_html( $primary_color );?>;
}
.blog-box .blog-bottom-content-holder ul li i,
.blog-box .blog-bottom-content-holder ul li a:hover {
  color: <?php echo esc_html( $primary_color );?>;
}
.blog-box .blog-bottom-content-holder ul li,
.blog-box .blog-bottom-content-holder ul li a,
.rt-news-box .post-date-dark ul li i,
.entry-header .entry-meta .post-date i {
  color: <?php echo esc_html( $secondary_color );?>;
}

<?php
/*-------------------------------------
#. Error 404
---------------------------------------*/
?>
.error-page-area {
    background-color: <?php echo esc_html( PanpieTheme::$options['error_bodybg'] );?>;
}
.error-page-area .text-1 {	
	color: <?php echo esc_html( PanpieTheme::$options['error_text1_color'] );?>;
}
.error-page-area .text-2 {
	color: <?php echo esc_html( PanpieTheme::$options['error_text2_color'] );?>;
}
.error-page-area .error-page-content .go-home a:after {
    background: <?php echo esc_html( $primary_color );?>;
}
.error-page-area .error-page-content .go-home a:before {
    background: <?php echo esc_html( $secondary_color );?>;
}
<?php
/*-------------------------------------
#. Comment
---------------------------------------*/
?>
#respond form .btn-send {
	background-color: <?php echo esc_html( $primary_color );?>;
}
#respond form .btn-send:hover {
    background: <?php echo esc_html( $secondary_color );?>;
}
.item-comments .item-comments-list ul.comments-list li .comment-reply {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.title-bar35:after {
	background: <?php echo esc_html( $primary_color );?>;
}
form.post-password-form input[type="submit"] {
    background: <?php echo esc_html( $primary_color );?>;
}
form.post-password-form input[type="submit"]:hover {
    background: <?php echo esc_html( $secondary_color );?>;
}
<?php
/*------------------------------------
#. Buttons
------------------------------------*/
?>
.panpie-button-1,
.panpie-button-3 {
    color: <?php echo esc_html( $primary_color );?>;
}
.panpie-button-1:hover,
.panpie-button-2:hover,
.panpie-button-2:hover i {
	color: <?php echo esc_html( $secondary_color );?>;
}
.panpie-button-3:hover,
.btn-read-more:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.submit-btn:hover {
	background-color: <?php echo esc_html( $secondary_color );?>;
}
.footer-top-area .mc4wp-form .form-group .item-btn:hover {
	background-color: <?php echo esc_html( $secondary_color );?>;
}
.submit-btn:after {
    background: <?php echo esc_html( $primary_color );?>;
}
.submit-btn:before {
    background: <?php echo esc_html( $secondary_color );?>;
}
.shop-layout-4 .food-box .item-content .cart-btn:after {
	background: <?php echo esc_html( $primary_color );?>;
}
.shop-layout-4 .food-box .item-content .cart-btn:before {
    background: <?php echo esc_html( $secondary_color );?>;
}

<?php
/*------------------------------------
#. Gradient
------------------------------------*/
?>
.header-style-1 .masthead-container {
    background: linear-gradient(to left, <?php echo esc_html( $gradient_light_color );?> 0%, <?php echo esc_html( $gradient_dark_color );?> 100%);
}
.header-style-2 .site-header .info-wrap .info a {
    background: linear-gradient(to left, <?php echo esc_html( $gradient_light_color );?> 0%, <?php echo esc_html( $gradient_dark_color );?> 100%);
}
.header-style-4 .header-area .header-menu {
    background: linear-gradient(to left, <?php echo esc_html( $gradient_light_color );?> 0%, <?php echo esc_html( $gradient_dark_color );?> 100%);
}
.sidebar-widget-area .widget_calendar caption,
.sidebar-widget-area .widget_calendar table td#today {
	background: <?php echo esc_html( $primary_color );?>;
}

.footer-top-area .mc4wp-form .form-group .item-btn {
	background: <?php echo esc_html( $primary_color );?>;
}

<?php
/*-------------------------------------
#. Single Content
---------------------------------------*/
?>
.entry-footer ul.item-tags li a:hover,
.entry-header .entry-meta ul li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.rt-related-post-info .post-title a:hover,
.rt-related-post-info .post-date ul li.post-relate-date {
	color: <?php echo esc_html( $primary_color );?>;
}
.about-author ul.author-box-social li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.entry-header .post-date,
.entry-footer .post-share .share-links a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.post-navigation .post-nav-title a:hover,
.post-navigation .prev-article:hover,
.post-navigation .next-article:hover,
.post-navigation .prev-article a:hover,
.post-navigation .next-article a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.post-navigation .next-article i,
.post-navigation .prev-article i {
	color: <?php echo esc_html( $primary_color );?>;
}
.entry-header .entry-meta ul li i,
.entry-header .entry-post-meta ul li a {
	color: <?php echo esc_html( $secondary_color );?>;
}
.single-post .entry-content ol li:before,
.entry-content ol li:before {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-related-post .title-section h2:after {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.wp-block-quote,
blockquote {
	border-color: <?php echo esc_html( $primary_color );?>;
}
.entry-footer .item-tags a:hover,
.rt-swiper-slider .rt-swiper-container .swiper-button > div:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*-------------------------------------
#. Archive Contents
---------------------------------------*/
?>
.rt-blog-layout .entry-thumbnail-area ul li i {
  color: <?php echo esc_html( $primary_color );?>;
}
.rt-blog-layout .entry-thumbnail-area ul li a:hover,
.blog-layout-1 .blog-box .entry-content .blog-btn:hover {
  color: <?php echo esc_html( $primary_color );?>;
}
.rt-blog-layout .entry-thumbnail-area ul .active,
.blog-layout-1 .blog-box .blog-img .date-meta {
  background: <?php echo esc_html( $primary_color );?>;
}
.rt-blog-layout .entry-content h3 a:hover {
  color: <?php echo esc_html( $primary_color );?>;
}
.blog-box .blog-social li a:hover i {
  color: <?php echo esc_html( $primary_color );?>;
}
<?php /*blog style 2*/ ?>
.blog-box .blog-img-holder .entry-content {
  background: <?php echo esc_html( $primary_color );?>;
}
.blog-box .entry-content ul li i,
.blog-layout-2 .entry-content ul li i {
	color: <?php echo esc_html( $secondary_color );?>;
}
.blog-box .entry-content ul li a:hover,
.blog-layout-2 .entry-content ul li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*-------------------------------------
#. Pagination
---------------------------------------*/
?>
.pagination-area li.active a:hover,
.pagination-area ul li.active a,
.pagination-area ul li a:hover,
.pagination-area ul li span.current {
	background-color: <?php echo esc_html( $secondary_color );?>;
}
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li .current,
.woocommerce nav.woocommerce-pagination ul li span.current,
.woocommerce nav.woocommerce-pagination ul li.active a {
    background-color: <?php echo esc_html( $secondary_color );?>;
}
<?php
/*-------------------------------------
#. Contact Form 7
---------------------------------------*/
?>
.contact-form h3:after {
    background-color: <?php echo esc_html( $primary_color );?>;
}
.fluentform .contact-form .ff-el-form-control:focus,
.fluentform .team-form .ff-el-form-control:focus {
    border-color: <?php echo esc_html( $primary_color );?>;
}
.fluentform .contact-form .text-danger,
.fluentform .team-form .text-danger {
    color: <?php echo esc_html( $secondary_color );?> !important;
}
.fluentform .contact-form .ff-el-is-error .ff-el-form-control,
.fluentform .contact-form.ff-el-is-error .ff-el-form-control,
.fluentform .team-form .ff-el-is-error .ff-el-form-control,
.fluentform .team-form.ff-el-is-error .ff-el-form-control {
    border-color: <?php echo esc_html( $secondary_color );?>;
}
<?php
/*-------------------------------------
#. Single Team
---------------------------------------*/
?>
.team-details-social li a {
  background: <?php echo esc_html( $primary_color );?>;
  border: 1px solid <?php echo esc_html( $primary_color );?>;
}
.team-details-social li:hover a {
  border: 1px solid <?php echo esc_html( $primary_color );?>;
}
.team-details-social li:hover a i {
  color: <?php echo esc_html( $primary_color );?>;
}
.skill-area .progress .lead {
  border: 2px solid <?php echo esc_html( $primary_color );?>;
}
.skill-area .progress .progress-bar {
  background: <?php echo esc_html( $primary_color );?>;
}
.team-details-info li i {
  color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*-------------------------------------
#. WooCommerce
---------------------------------------*/
?>

.rt-woo-nav .owl-custom-nav .owl-prev:hover,
.rt-woo-nav .owl-custom-nav .owl-next:hover {
	background-color: <?php echo esc_html( $secondary_color );?>;
}
.woocommerce ul.products li.product .onsale,
.woocommerce span.onsale,
.woocommerce a.added_to_cart,
.woocommerce input.button:hover,
p.demo_store,
.woocommerce #respond input#submit.disabled:hover,
.woocommerce #respond input#submit:disabled:hover,
.woocommerce #respond input#submit[disabled]:disabled:hover,
.woocommerce a.button.disabled:hover,
.woocommerce a.button:disabled:hover,
.woocommerce a.button[disabled]:disabled:hover,
.woocommerce button.button.disabled:hover,
.woocommerce button.button:disabled:hover,
.woocommerce button.button[disabled]:disabled:hover,
.woocommerce input.button.disabled:hover,
.woocommerce input.button:disabled:hover,
.woocommerce input.button[disabled]:disabled:hover,
.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce ul.products li.product h3 a,
.woocommerce div.product .product-meta a:hover,
.woocommerce a.woocommerce-review-link:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce div.product p.price,
.woocommerce div.product span.price {
	color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.header-icon-area .cart-icon-area > a {
	background-color: <?php echo esc_html( $secondary_color );?>;
}
.woocommerce-message,
.woocommerce-info {
	border-color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce .product-thumb-area .overlay {
	background-color: rgba(<?php echo esc_html( $primary_rgb );?>, 0.8);
}
.woocommerce .product-thumb-area:after {
	background-color: rgba(<?php echo esc_html( $secondary_rgb );?>, 0.9);
}
.woocommerce .product-thumb-area .product-info ul li a:hover,
.single-product.woocommerce .entry-summary a.compare:hover,
.single-product.woocommerce .entry-summary a.add_to_wishlist:hover,
.single-product.woocommerce .entry-summary .yith-wcwl-wishlistaddedbrowse a:hover,
.single-product.woocommerce .entry-summary .yith-wcwl-wishlistexistsbrowse a:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce input.button:hover,
.woocommerce div.product form.cart .button:hover,
.woocommerce a.added_to_cart:hover,
.woocommerce #respond input#submit.alt:hover,
.woocommerce a.button.alt:hover,
.woocommerce button.button.alt:hover,
.woocommerce input.button.alt:hover {
  background-color: <?php echo esc_html( $secondary_color );?>;
}
.rt-woo-nav .section-title p {
  color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce ul.products li.product h3 a:hover,
.woocommerce ul.products li.product .price {
	color: <?php echo esc_html( $secondary_color );?>;
}
.woocommerce div.product .woocommerce-tabs .panel ul li:before {
	color: <?php echo esc_html( $primary_color );?>;
}
.cart-icon-products .widget_shopping_cart .mini_cart_item a:hover {
  color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce ul.product_list_widget li span.amount {
  color: <?php echo esc_html( $primary_color );?>;
}
.cart-icon-products .woocommerce.widget_shopping_cart .cart_list li a.remove {
	color: <?php echo esc_html( $primary_color );?> !important;
}
.cart-icon-products .woocommerce.widget_shopping_cart .cart_list li a.remove:hover {
    background: <?php echo esc_html( $primary_color );?>;
}
.woocommerce.product-list-view .product-info-area .product-list-info ul li a:hover {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce #review_form #respond .comment-form .form-submit input.submit {
	background: <?php echo esc_html( $primary_color );?>;
}
.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
.woocommerce #review_form #respond .comment-form .form-submit input.submit:hover {
	background: <?php echo esc_html( $secondary_color );?>;
}
.product-grid-view .filter-heading .view-mode ul li.grid-view-nav a,
.product-list-view .filter-heading .view-mode ul li.list-view-nav a {
	background-color: <?php echo esc_html( $primary_color );?>;
    border-color: <?php echo esc_html( $primary_color );?>;
}
.food-menu-inner .filter-heading .isotope-classes-tab .nav-item.current {
    background: <?php echo esc_html( $secondary_color );?>;
    border-color: <?php echo esc_html( $secondary_color );?>;
}
.woocommerce #respond input#submit:after, 
.woocommerce a.button:after, 
.woocommerce button.button:after, 
.woocommerce input.button:after {
	background: <?php echo esc_html( $primary_color );?>;
}
.woocommerce #respond input#submit:before, 
.woocommerce a.button:before, 
.woocommerce button.button:before, 
.woocommerce input.button:before {
    background: <?php echo esc_html( $secondary_color );?>;
}
.shop-layout-4 .food-box .entry-meta .select2-container--default .select2-selection--single .select2-selection__arrow {
    background: <?php echo esc_html( $secondary_color );?>;
}
.product-grid-view .woo-shop-top .view-mode ul li.grid-view-nav a,
.product-list-view .woo-shop-top .view-mode ul li.list-view-nav a {
    background-color: <?php echo esc_html( $secondary_color );?>;
    border-color: <?php echo esc_html( $secondary_color );?>;
}
.woocommerce div.product form.variations_form .variations td.value input[type="radio"]:checked + label::after {
    background: <?php echo esc_html( $secondary_color );?>;
}
<?php
/*----------------------
#. Miscellaneous
----------------------*/
?>
.rt-drop,
.post-detail-style3 .breadcrumbs-area2 .breadcrumbs-content ul li,
.post-detail-style3 .breadcrumbs-area2 .breadcrumbs-content ul li a, 
.post-detail-style3 .breadcrumbs-area2 .breadcrumbs-content ul li a:hover,
.breadcrumbs-area2 .breadcrumbs-content h3 a:hover,
.post-detail-style3 .post-3-no-img-meta ul.post-info-light li a:hover,
.post-detail-style3 .entry-meta li a:hover,
.sidebar-widget-area .widget .corporate-address li i,
.sidebar-widget-area .widget .corporate-address li i.fa-map-marker,
.rt-news-box .post-cat span a:hover,
.rt-news-box .topic-box .post-date1 span a:hover,
.rt_widget_recent_entries_with_image .topic-box .post-date1 span a:hover,
.sidebar-widget-area .widget.title-style-1 h3.widgettitle,
.search-form input.search-submit,
ul.news-info-list li i,
.search-form input.search-submit:hover,
.rt-cat-list-widget li:hover a,
.footer-top-area .search-form input.search-submit,
.ui-cat-tag a:hover,
.entry-post-meta .post-author a:hover,
.post-detail-style2 .post-info-light ul li a:hover,
.post-detail-style2 .entry-meta li a:hover,
.entry-title a:hover,
.rt-blog-layout .entry-thumbnail-area ul li i,
.rt-blog-layout .entry-thumbnail-area ul li a:hover,
.rt-blog-layout .entry-content h3 a:hover,
.blog-layout-1 .entry-meta ul li a:hover,
.blog-box .blog-bottom-content-holder ul li i,
.footer-top-area .rt-news-box .dark .rt-news-box-widget .media-body a:hover,
.entry-footer .share-social ul a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce-cart .woocommerce table.shop_table td.product-name > a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.rt-box-title-2,.blog-box .blog-img-holder .entry-content,
button, input[type="button"], input[type="reset"], input[type="submit"],
.sidebar-widget-area .widget.title-style-1 h3.widgettitle, 
.rt-cat-list-widget li:before, 
.elementor-widget-wp-widget-categories ul li:before, 
.cat-holder-text, 
.rt-blog-layout .entry-thumbnail-area ul .active,
.blog-layout-2 .entry-meta .blog-cat ul li a:hover,
.blog-layout-3 .entry-meta ul li.blog-cat li a:hover {
    background-color: <?php echo esc_html( $primary_color );?>;
}
.elementor-widget-wp-widget-categories ul li a:before {
    color: <?php echo esc_html( $primary_color );?>;
}
.elementor-widget-wp-widget-categories ul li:hover a {
	color: <?php echo esc_html($secondary_color); ?>;
}
.post-detail-style2 .cat-holder:before {
    border-top: 8px solid <?php echo esc_html( $primary_color );?>;
}
.footer-top-area .widget_tag_cloud a:hover {
	background-color: <?php echo esc_html( $primary_color );?> !important;
}
.entry-content .wpb_layerslider_element a.layerslider-button, 
.comments-area h3.comment-num:after {	
	background: <?php echo esc_html( $primary_color );?>; 
}
.entry-content .btn-read-more-h-b, .pagination-area ul li span 
.header-style-10.trheader #tophead .tophead-social li a:hover {
    border: 1px solid <?php echo esc_html( $primary_color );?>;
}
.woocommerce nav.woocommerce-pagination ul li span {
    border-color: <?php echo esc_html( $primary_color );?>;
}
.woocommerce div.product .share-links a:hover {
    color: <?php echo esc_html( $primary_color );?>;
}
.bottomBorder {
    border-bottom: 2px solid <?php echo esc_html( $primary_color ); ?>;
}
.search-form input.search-field {
	border-color: <?php echo esc_html( $primary_color ); ?>;
}
#respond form input:focus,
#respond form textarea:focus {
	border-color: <?php echo esc_html( $primary_color ); ?>;
}
.search-form input.search-submit  {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	border: 2px solid <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget.title-style-1 h3.widgettitle span {
	border-top: 10px solid <?php echo esc_html( $primary_color ); ?>;
}
.sidebar-widget-area .widget_tag_cloud a:hover,
.sidebar-widget-area .widget_product_tag_cloud a:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.cat-holder:before {
    border-top: 8px solid <?php echo esc_html( $primary_color ); ?>;
}
.footer-bottom-social ul li a {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.footer-bottom-social ul li a:hover {
    background-color: <?php echo esc_html( $secondary_color ); ?>;
}

.page-links span.current .page-number,
.page-links a.post-page-numbers:hover .page-number {
	background-color: <?php echo esc_html( $secondary_color ); ?>;
}
