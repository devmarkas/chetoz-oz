<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
 
if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
	$panpie_title = woocommerce_page_title( false );
} else if ( is_404() ) {
	$panpie_title = PanpieTheme::$options['error_title'];
} else if ( is_search() ) {
	$panpie_title = esc_html__( 'Search Results for : ', 'panpie' ) . get_search_query();
} else if ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$panpie_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$panpie_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'panpie' ) );
	}
} else if ( is_archive() ) {
	$panpie_title = get_the_archive_title();
} else if ( is_page() ) {
	$panpie_title = get_the_title();
} else if ( is_single() ) {
	$panpie_title = get_the_title();
}

if ( !empty( PanpieTheme::$options['post_banner_title'] ) ){
	$post_banner_title = PanpieTheme::$options['post_banner_title'];
} else {
	$post_banner_title = esc_html__( 'Our News' , 'panpie' );
}

?>
<?php if ( PanpieTheme::$has_banner === 1 || PanpieTheme::$has_banner === "on" ): ?>
	<div class="entry-banner">
		<div class="container">
			<div class="entry-banner-content">
				<?php if ( is_single() ) { ?>
				<h1 class="entry-title"><?php echo wp_kses( $panpie_title , 'alltext_allow' );?></h1>
				<?php } else if ( is_page() ) { ?>
					<h1 class="entry-title"><?php echo wp_kses( $panpie_title , 'alltext_allow' );?></h1>
				<?php } else { ?>
					<h1 class="entry-title"><?php echo wp_kses( $panpie_title , 'alltext_allow' );?></h1>
				<?php } ?>
				<?php if ( PanpieTheme::$has_breadcrumb == 1 ) { ?>
					<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
				<?php } ?>
			</div>
		</div>
	</div>
<?php endif; ?>