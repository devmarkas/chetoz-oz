<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$primary_color     = PanpieTheme::$options['primary_color']; // #df1c2b
$primary_rgb       = PanpieTheme_Helper::hex2rgb( $primary_color ); // 223, 28, 43
$secondary_color   = PanpieTheme::$options['secondary_color']; // #fdc902
$secondary_rgb     = PanpieTheme_Helper::hex2rgb( $secondary_color ); // 253, 201, 2

$gradient_dark_color   = PanpieTheme::$options['gradient_dark_color'];
$gradient_light_color  = PanpieTheme::$options['gradient_light_color'];

/*---------------------------------    
INDEX
===================================
#. EL: Button
#. EL: Section Title
#. EL: Slider
#. EL: Owl Nav 1
#. EL: Owl Nav 2
#. EL: Owl Nav 3
#. EL: Text/image With Button
#. EL: Info Box
#. EL: Counter
#. EL: Team
#. EL: Gallery
#. EL: Event Layout
#. EL: Service Layout
#. EL: Testimonial
#. EL: Post Grid
#. EL: Pricing Table
#. EL: Tab Form
#. EL: Widget
#. EL: Others
#. WooCommerce
----------------------------------*/

/*-----------------------
#. EL: Button
------------------------*/
?>
.btn-fill-light {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.btn-fill-dark,
.btn-fill-red-white {
    background: <?php echo esc_html($primary_color); ?>;
}
.btn-fill-black:before {
	background-color: <?php echo esc_html($primary_color); ?>;
}
a.slider-button:before,
.btn-fill-dark:before,
a.slider-button-2 {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
a.slider-button:after,
.btn-fill-white:before {
	background: <?php echo esc_html($primary_color); ?>;
}
.panpie-style-style5 .food-box .img-wrap .cart-btn:after,
.food-menu-combo .food-box-3 .item-content .btn-wrap .cart-btn:after  {
	background: <?php echo esc_html($primary_color); ?>;
}
.panpie-style-style5 .food-box .img-wrap .cart-btn:before,
.food-menu-combo .food-box-3 .item-content .btn-wrap .cart-btn:before {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.panpie-style-style5 .food-box .entry-meta .select2-container--default .select2-selection--single .select2-selection__arrow {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.rt-button .button {
	background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-----------------------
#. EL: Section Title
------------------------*/
?>
.sec-title .sub-title {
	color: <?php echo esc_html($primary_color); ?>;
}
.section-title h2:after,
.sec-title.style2 .rtin-title:before,
.sec-title.style2 .rtin-title:after {
	background: <?php echo esc_html($primary_color); ?>;
}
.sec-title.style2 .section-title span {
	color: <?php echo esc_html($primary_color); ?>;
}
.barshow .title-bar,
.about-info-text h2:after {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.sec-title.style4 .rtin-title:after {
	background-color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*-----------------------
#. EL: Slider
------------------------*/
?>
.free-delivery {
    background: <?php echo esc_html( $primary_color );?>;
}
.wp-block-themepunch-revslider .custom.tparrows:before {
	color: <?php echo esc_html( $primary_color );?> !important;
}
.wp-block-themepunch-revslider .custom.tparrows:hover {
    background: <?php echo esc_html( $primary_color );?> !important;
}
.custom .tp-bullet.selected {
    background: <?php echo esc_html( $primary_color );?> !important;
}
ul.slide-feature-list li i {
	color: <?php echo esc_html( $primary_color );?>;
}
.custom2 .hephaistos.tparrows:hover {
    background: <?php echo esc_html($secondary_color); ?> !important;
}
<?php
/*------------------------------
#. EL: Text/image With Button
-------------------------------*/
?>
.title-text-button ul.single-list li:after,
.title-text-button ul.dubble-list li:after {
	color: <?php echo esc_html($primary_color); ?>;
}
.title-text-button .subtitle {
	color: <?php echo esc_html($primary_color); ?>;
}
.title-text-button.text-style1 .subtitle:after {
	background: <?php echo esc_html($secondary_color); ?>;
}
.about-image-text .about-content .sub-rtin-title {
	color: <?php echo esc_html($primary_color); ?>;
}
.about-image-text ul li:before {
	color: <?php echo esc_html($primary_color); ?>;
}
.about-image-text ul li:after {
	color: <?php echo esc_html($primary_color); ?>;
}
.limited-offer:before {
	background: <?php echo esc_html($secondary_color); ?>;
}
<?php
/*-------------------------------------
#. EL: Owl Nav 1
---------------------------------------*/
?>
.rt-owl-nav-1.slider-nav-enabled .owl-carousel .owl-nav > div {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-1.slider-nav-enabled .owl-carousel .owl-nav > div:hover {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.rt-owl-nav-1.slider-dot-enabled .owl-carousel .owl-dot:hover span,
.rt-owl-nav-1.slider-dot-enabled .owl-carousel .owl-dot.active span {
	background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. EL: Owl Nav 2
---------------------------------------*/
?>
.rt-owl-nav-2.slider-dot-enabled .owl-carousel .owl-dot:hover span,
.rt-owl-nav-2.slider-dot-enabled .owl-carousel .owl-dot.active span {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-2.slider-nav-enabled .owl-carousel .owl-nav > div:hover {
	background: <?php echo esc_html($secondary_color); ?>;
}
<?php
/*-------------------------------------
#. EL: Info Box
---------------------------------------*/
?>
.info-box .rtin-title a:hover,
.info-style1 .rtin-item .rtin-icon,
.info-box .rtin-item .rtin-price {
    color: <?php echo esc_html($primary_color); ?>;
}
.info-style3 .rtin-item .rtin-serial,
.info-style4 .rtin-item .rtin-button a:before,
.info-style5 .rtin-item .rtin-button .info-button:before,
.info-style7 .rtin-item .rtin-button .info-button:before {
	background: <?php echo esc_html($secondary_color); ?>;
}
.info-style3 .rtin-item:hover .rtin-serial {
    background-color: <?php echo esc_html($primary_color); ?>;
}
.info-style5 .rtin-item .rtin-header,
.info-style7 .rtin-item .rtin-button .info-button {
    background-color: <?php echo esc_html($primary_color); ?>;
}
.info-style5 .rtin-item .rtin-button .info-button {
	border-color: <?php echo esc_html($secondary_color); ?>;
}
<?php
/*-----------------------
#. EL: Counter
------------------------*/
?>
.rt-counter .rtin-item .rtin-counter,
.rtin-skills .rtin-skill-each .progress .progress-bar > span,
.rtin-progress-bar .progress .progress-bar > span {
	color: <?php echo esc_html($primary_color); ?>;
}
.rt-counter.rtin-counter-style3 .rtin-item,
.rtin-skills .rtin-skill-each .progress .progress-bar {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.rtin-skills .rtin-skill-each .progress .progress-bar > span:before,
.rtin-progress-bar .progress .progress-bar > span:before {
	border-top-color: <?php echo esc_html($primary_color); ?>;
}
.rtin-progress-bar .progress .progress-bar {
    background-color: <?php echo esc_html($secondary_color); ?>;
}
.rt-counter.rtin-counter-style2 .rtin-item svg path {
    stroke: <?php echo esc_html($secondary_color); ?>;
}
<?php
/*------------------------------
#. EL: Team
--------------------------------*/
?>
.team-default .rtin-content .rtin-title a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.team-default .rtin-content .rtin-designation {
	color: <?php echo esc_html($primary_color); ?>;
}
.team-single .rtin-heading .designation,
.team-single .rtin-heading .designation span {
	color: <?php echo esc_html($primary_color); ?>;
}
.team-single ul.rtin-social li a {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.team-multi-layout-4 .rtin-social li a:hover,
.team-multi-layout-4 .rtin-item .mask-wrap:after,
.team-single .rtin-content ul.rtin-social li a:hover {
    background-color: <?php echo esc_html($primary_color); ?>;
}
.team-single .rtin-content a:hover,
.team-single .rtin-team-info a:hover{
    color: <?php echo esc_html($primary_color); ?>;
}
.team-single .rtin-skills h3:after,
.team-single .team-contact-wrap h3:after,
.team-single .rtin-team-skill-info h3:after {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.team-multi-layout-1 .rtin-item .rtin-social li a:hover {
    color: <?php echo esc_html($primary_color); ?>;
}
.team-multi-layout-1 .rtin-item .rtin-social,
.team-multi-layout-2 .rtin-social li a {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.team-multi-layout-2 .rtin-content-wrap .mask-wrap,
.team-multi-layout-2 .rtin-social li a:hover {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.team-multi-layout-3 .rtin-item .rtin-content-wrap .rtin-content:after {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.team-multi-layout-3 .rtin-social li a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
<?php
/*------------------------------
#. EL: Gallery
--------------------------------*/
?>
.gallery-multi-layout-2 .rtin-item h3 a:hover {
    color: <?php echo esc_html($primary_color); ?>;
}
.gallery-multi-layout-1 .rtin-item h3 a:hover {
    color: <?php echo esc_html($secondary_color); ?>;
}
.gallery-multi-layout-1 .rtin-item:after,
.gallery-multi-layout-2 .rtin-item .rtin-figure:after {
    background-color: rgba(<?php echo esc_html( $primary_rgb );?>, 1);
}
.gallery-multi-layout-1 .rtin-item .item-icon a:hover,
.gallery-multi-layout-2 .rtin-item .item-icon a:hover {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
<?php
/*------------------------------
#. EL: Event Layout
--------------------------------*/
?>
.event-grid-layout1 .rtin-figure .event-date,
.event-grid-layout2 .rtin-figure .event-date {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.event-grid-layout1 .rtin-content .rtin-title a:hover,
.event-grid-layout2 .rtin-item .rtin-title a:hover {
    color: <?php echo esc_html($primary_color); ?>;
}
.rtin-event-wrap .rtin-event-info li i,
.event-grid-layout1 .rtin-content .rtin-info span i,
.event-grid-layout2 .rtin-content .rtin-info span i {
    color: <?php echo esc_html($secondary_color); ?>;
}
.event-single .single-event-inner .post-thumb .event-date {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
<?php
/*------------------------------
#. EL: Service Layout
--------------------------------*/
?>
.event-grid-layout2 .rtin-item .rtin-btn,
.event-grid-layout2 .rtin-item .rtin-icon i:before {
	color: <?php echo esc_html($primary_color); ?>;
}
.event-grid-layout1 .rtin-item:before {
    background: -webkit-linear-gradient(bottom, <?php echo esc_html($primary_color); ?>, transparent);
    background: linear-gradient(to top, <?php echo esc_html($primary_color); ?>, transparent);
}
.rtin-service-wrap,
.event-grid-layout2 .rtin-item:after {
	background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*------------------------------
#. EL: Testimonial
--------------------------------*/
?>
.rtin-testimonial-3 .slick-carousel-nav .slick-list .slick-track .slick-slide.slick-current .nav-item img {
    border-color: <?php echo esc_html($primary_color); ?>;
}
.rtin-testimonial-1 .rtin-item .rtin-content svg path {
    fill: <?php echo esc_html($primary_color); ?>;
    stroke: <?php echo esc_html($primary_color); ?>;
}
<?php
/*------------------------------
#. EL: Post Grid
--------------------------------*/
?>
.post-default .rtin-item-post .rtin-content h3 a:hover,
.post-grid-style3 .blog-box .rtin-content h3 a:hover,
.post-grid-style2 .rtin-item-post .post-grid-more i {
	color: <?php echo esc_html($primary_color); ?>;
}
.post-default ul.post-grid-meta li i {
	color: <?php echo esc_html($secondary_color); ?>;
}
.post-default ul.post-grid-meta li a:hover,
.post-grid-style3 .blog-box .blog-btn:hover,
.post-default.post-grid-style2 .blog-btn:hover,
.post-default.post-grid-style4 .blog-btn:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*------------------------------
#. EL: Pricing Table
--------------------------------*/
?>
.offer-active .rt-price-table-box .offer,
.offer-active .rt-price-table-box .popular-shape:after {
    background: <?php echo esc_html( $primary_color );?>;
}
.rtin-pricing-layout1 .rtin-pricing-price .rtin-price,
.default-pricing .rt-price-table-box ul li i {
	color: <?php echo esc_html($primary_color); ?>;
}
.rtin-pricing-layout2:hover .rt-price-table-box .price-header .rtin-title,
.rtin-pricing-layout2.active-class .rt-price-table-box .price-header .rtin-title,
.rtin-pricing-layout2 .rt-price-table-box .header-wrap {
    background: <?php echo esc_html( $primary_color );?>;
}
.rtin-pricing-layout2 .price-header .rtin-title,
.rtin-pricing-layout2:hover .rt-price-table-box .header-wrap,
.rtin-pricing-layout2.active-class .rt-price-table-box .header-wrap {
    background: <?php echo esc_html( $secondary_color );?>;
}
<?php
/*------------------------------
#. EL: Tab Form
--------------------------------*/
?>
.tab-form-1 .elementor-tabs .elementor-tab-title.elementor-active,
.tab-form-1 .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title a:hover {
    color: <?php echo esc_html( $primary_color );?>;
}
.tab-form-1 .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title a:after {
    background-color: <?php echo esc_html( $primary_color );?>;
}
<?php
/*------------------------------
#. EL: Widget
--------------------------------*/
?>
.fixed-sidebar-left .elementor-widget-wp-widget-nav_menu ul > li > a:hover,
.fix-bar-bottom-copyright .rt-about-widget ul li a:hover, 
.fixed-sidebar-left .rt-about-widget ul li a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.element-side-title h5:after {
    background: <?php echo esc_html( $secondary_color );?>;
}
<?php
/*------------------------------
#. EL: Others
--------------------------------*/
?>
.element-side-title h5 {
    color: <?php echo esc_html( $primary_color );?>;
}
.fixed-sidebar-addon .elementor-widget-wp-widget-nav_menu ul > li > a:hover,
.fixed-sidebar-addon .rt-about-widget .footer-social li a:hover {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-cat-list-widget li:before,
.rtin-faq .faq-item .faq-number span {
    background: <?php echo esc_html( $primary_color );?>;
}
.elementor-icon-list-items .elementor-icon-list-item i,
.address-style2 .rtin-item:hover .rtin-icon i {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.rtin-address-default .rtin-item .rtin-info a:hover,
.rtin-address-default .rtin-item .rtin-icon i {
	color: <?php echo esc_html( $secondary_color );?>;
}
.rtin-logo-slider .rtin-item:hover {
    border-color: <?php echo esc_html($primary_color); ?>;
}
.video-style2 .rtin-video .item-icon .rtin-play,
.video-style1 .rtin-video .item-icon .rtin-play:hover,
.video-style3 .rtin-video .item-icon .rtin-play {
	color: <?php echo esc_html( $primary_color );?>;
}
.video-style1 .rtin-video .item-icon .rtin-play:before {
    background: <?php echo esc_html( $primary_color );?>;
}
.elementor-accordion .elementor-tab-title.elementor-active .elementor-accordion-icon-opened {
	color: <?php echo esc_html( $primary_color );?>;
}
.elementor-accordion .elementor-accordion-item .elementor-tab-title:before,
.elementor-accordion .elementor-accordion-item .elementor-tab-content:before {
    background: <?php echo esc_html( $primary_color );?>;
}
.cta-style2 .action-box .rtin-phone {
    background: <?php echo esc_html( $secondary_color );?>;
}
.cta-style5 .action-box .rtin-title:before {
    background: <?php echo esc_html( $primary_color );?>;
}
.category-box-style2 .media:hover .rt-categoty-icon .svg-shape .shape-1 {
    fill: <?php echo esc_html( $secondary_color );?>;
}
.multiscroll-wrapper .ms-social-link li a:hover,
.multiscroll-wrapper .ms-copyright a:hover {
	color: <?php echo esc_html( $primary_color );?>;
}
.ms-menu-list li.active {
	background: <?php echo esc_html( $primary_color );?>;
}
.cta-style6 .action-box .rtin-title:after {
    border-color: transparent <?php echo esc_html( $primary_color );?> transparent transparent;
}
<?php
/*------------------------------
#. WooCommerce
--------------------------------*/
?>
.select2-container--open .select2-dropdown--below,
.select2-container--open .select2-dropdown--above {
    background-color: <?php echo esc_html($secondary_color); ?>;
}
.food-box .img-wrap .item-img .cart-btn:after,
.food-box-5 .item-content .variable-icon a:hover,
.food-menu-combo .food-box-2 .img-wrap .item-img .cart-btn:after {
	background: <?php echo esc_html( $primary_color );?>;
}
.food-box-5 .item-content .variable-icon a,
.food-box .img-wrap .item-img .cart-btn:before,
.food-menu-combo .food-box-2 .img-wrap .item-img .cart-btn:before,
.food-menu-isotop-style11 .item-box .btn-wrap .cart-btn:before {
	background: <?php echo esc_html( $secondary_color );?>;
}
.food-box .item-content .item-title a:hover,
.food-menu-isotop .media .media-body .item-title a:hover,
.food-menu-combo .food-box-2 .item-content .item-title a:hover,
.food-menu-combo .food-box-3 .item-content .item-title a:hover,
.food-menu-isotop-style9 .media .media-body .item-title a:hover,
.food-box-5 .item-content .item-title a:hover {
    color: <?php echo esc_html( $primary_color );?>;
}
.food-box .entry-meta .select2-container .select2-selection--single {
    background-color: <?php echo esc_html($secondary_color); ?>;
}
.food-menu-isotop .media .media-body .item-price,
.food-menu-combo .food-box-2 .item-content .item-price,
.food-box .item-content .entry-meta .other-prices, 
.food-box .item-content .entry-meta .item-price,
.food-box .item-content .entry-meta li,
.food-menu-isotop-style9 .media .media-body .item-price,
.food-box-5 .item-price .price,
.food-menu-isotop-style11 .item-box .item-body .item-price {
    color: <?php echo esc_html( $primary_color );?>;
}
.food-menu-isotop .isotope-classes-tab .nav-item.current {
    background-color: <?php echo esc_html($secondary_color); ?>;
    border-color: <?php echo esc_html($secondary_color); ?>;
}
.food-menu-combo .food-box-3 .item-content .item-price {
    color: <?php echo esc_html( $primary_color );?>;
}
.food-menu-isotop-style11 .item-box .btn-wrap .cart-btn {
	color: <?php echo esc_html( $secondary_color );?>;
}
.shop-layout-style7 .food-box .item-header .item-title a:hover,
.shop-layout-style7 .food-box .item-header .item-price,
.food-menu-isotop-style8 .media .media-body .item-price,
.food-menu-isotop-style8 .media .media-body .item-title a:hover,
.food-menu-isotop-style11 .item-box .item-body .item-title a:hover {
    color: <?php echo esc_html( $primary_color );?>;
}
.shop-layout-style7 .food-box .entry-meta .select2-container--default .select2-selection--single .select2-selection__arrow {
    background-color: <?php echo esc_html($secondary_color); ?>;
}
.shop-layout-style7 .food-box .variable-icon a:hover {
    background-color: <?php echo esc_html($primary_color); ?>;
}
.food-menu-isotop-style8 .isotope-classes-tab .nav-item.current,
.food-menu-isotop-style11 .isotope-classes-tab .nav-item.current {
    border-color: <?php echo esc_html($primary_color); ?>;
}
.food-menu-isotop-style9 .isotope-classes-tab .nav-item.current,
.food-menu-isotop-style11 .item-box .btn-wrap .cart-btn:after {
    border-color: <?php echo esc_html($secondary_color); ?>;
}
.fmp-layout3 .fmp-title h3 a:hover,
.fmp-layout4 .fmp-media-body h3 a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.fmp-isotope-layout .fmp-isotope-buttons > button.selected {
    border-color: <?php echo esc_html($primary_color); ?>;
}




