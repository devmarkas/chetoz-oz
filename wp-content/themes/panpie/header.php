<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php
		// Preloader
		
		if( !empty( PanpieTheme::$options['preloader_image'] ) ) {
			$pre_bg = wp_get_attachment_image_src( PanpieTheme::$options['preloader_image'], 'full', true );
			$preloader_img = $pre_bg[0];
		}else {
			$preloader_img = PANPIE_IMG_URL . 'preloader.gif';
		}
		
        if ( PanpieTheme::$options['preloader'] ) {
            if (!empty($preloader_img)) {                
                echo '<div id="preloader" style="background-image:url(' . esc_url($preloader_img) . ');"></div>';
            }else{ ?>
                <div id="preloader">
				<div class="preloader-wrap">
					<div class="preloader-content">
						<div class="circle"></div>
					</div>
				</div>
			</div>
            <?php }
        }
		
	?>
	<div id="page" class="site">		
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'panpie' ); ?></a>		
		<header id="masthead" class="site-header">			
			<div id="header-<?php echo esc_attr( PanpieTheme::$header_style ); ?>" class="header-area">
				<?php
					$is_ad_active1 = get_post_meta( get_the_ID(), 'panpie_header_top_ad', true );
					if ( $is_ad_active1 == 'on' ) { do_action( 'panpie_header_top' ); }
				?>
				<?php if ( PanpieTheme::$top_bar == 1 ){ ?>			
				<?php get_template_part( 'template-parts/header/header-top', PanpieTheme::$top_bar_style ); ?>
				<?php } ?>
				<?php if ( PanpieTheme::$header_opt == 1 ){ ?>
				<?php get_template_part( 'template-parts/header/header', PanpieTheme::$header_style ); ?>
				<?php } ?>
			</div>
		</header>
		<?php get_template_part('template-parts/header/mobile', 'menu');?>
		<div id="header-area-space"></div>
		<div id="content" class="site-content">	
		
			<?php
				if ( PanpieTheme::$has_banner === 1 || PanpieTheme::$has_banner === "on" ) { 
					get_template_part('template-parts/content', 'banner');
				}
			?>