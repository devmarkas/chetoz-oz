<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = PanpieTheme_Helper::nav_menu_args();

if( !empty( PanpieTheme::$options['logo'] ) ) {
    $logo_dark = wp_get_attachment_image( PanpieTheme::$options['logo'], 'full' );
    $panpie_dark_logo = $logo_dark;
}else {
    $panpie_dark_logo = "<img width='600' height='218' src='" . PANPIE_IMG_URL . 'logo-dark.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "' loading='lazy'>"; 
}

?>

<div class="rt-header-menu mean-container" id="meanmenu"> 
    <div class="mean-bar">
    	<a href="<?php echo esc_url(home_url('/'));?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) );?>"><?php echo wp_kses( $panpie_dark_logo, 'alltext_allow' ); ?></a>

		<?php get_template_part( 'template-parts/header/icon', 'menubar' ); ?>

        <span class="sidebarBtn ">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </span>
    </div>
    
    <div class="rt-slide-nav">
        <div class="offscreen-navigation">
            <?php wp_nav_menu( $nav_menu_args );?>
        </div>
    </div>

</div>
