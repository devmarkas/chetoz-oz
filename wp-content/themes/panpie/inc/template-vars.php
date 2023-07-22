<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'template_redirect', 'panpie_template_vars' );
if( !function_exists( 'panpie_template_vars' ) ) {
    function panpie_template_vars() {
        // Single Pages
        if( is_single() || is_page() ) {
            $post_type = get_post_type();
            $post_id   = get_the_id();
            switch( $post_type ) {
                case 'page':
                $prefix = 'page';
                break;
				case 'panpie_event':
                $prefix = 'event';
                break;		  
                case 'panpie_gallery':
                $prefix = 'gallery';
                break; 		  
                case 'panpie_team':
                $prefix = 'team';
                break;  
                case 'product':
                $prefix = 'product';
                break;
                default:
                $prefix = 'single_post';
                break;
            }
			
			$layout_settings    = get_post_meta( $post_id, 'panpie_layout_settings', true );
            
            PanpieTheme::$layout = ( empty( $layout_settings['panpie_layout'] ) || $layout_settings['panpie_layout']  == 'default' ) ? PanpieTheme::$options[$prefix . '_layout'] : $layout_settings['panpie_layout'];

			//PanpieTheme::$sidebar = ( empty( $layout_settings['panpie_sidebar'] ) || $layout_settings['panpie_sidebar'] == 'default' ) ? PanpieTheme::$options[$prefix . '_sidebar'] : $layout_settings['panpie_sidebar'];
			
			PanpieTheme::$tr_header = ( empty( $layout_settings['panpie_tr_header'] ) || $layout_settings['panpie_tr_header'] == 'default' ) ? PanpieTheme::$options['tr_header'] : $layout_settings['panpie_tr_header'];
            
            PanpieTheme::$top_bar = ( empty( $layout_settings['panpie_top_bar'] ) || $layout_settings['panpie_top_bar'] == 'default' ) ? PanpieTheme::$options['top_bar'] : $layout_settings['panpie_top_bar'];
            
            PanpieTheme::$top_bar_style = ( empty( $layout_settings['panpie_top_bar_style'] ) || $layout_settings['panpie_top_bar_style'] == 'default' ) ? PanpieTheme::$options['top_bar_style'] : $layout_settings['panpie_top_bar_style'];
			
			PanpieTheme::$header_opt = ( empty( $layout_settings['panpie_header_opt'] ) || $layout_settings['panpie_header_opt'] == 'default' ) ? PanpieTheme::$options['header_opt'] : $layout_settings['panpie_header_opt'];
            
            PanpieTheme::$header_style = ( empty( $layout_settings['panpie_header'] ) || $layout_settings['panpie_header'] == 'default' ) ? PanpieTheme::$options['header_style'] : $layout_settings['panpie_header'];
			
            PanpieTheme::$footer_style = ( empty( $layout_settings['panpie_footer'] ) || $layout_settings['panpie_footer'] == 'default' ) ? PanpieTheme::$options['footer_style'] : $layout_settings['panpie_footer'];
			
			PanpieTheme::$footer_area = ( empty( $layout_settings['panpie_footer_area'] ) || $layout_settings['panpie_footer_area'] == 'default' ) ? PanpieTheme::$options['footer_area'] : $layout_settings['panpie_footer_area'];
			
			//PanpieTheme::$footer_area2 = ( empty( $layout_settings['panpie_footer_area2'] ) || $layout_settings['panpie_footer_area2'] == 'default' ) ? PanpieTheme::$options['footer_area2'] : $layout_settings['panpie_footer_area2'];
			
            $padding_top = ( empty( $layout_settings['panpie_top_padding'] ) || $layout_settings['panpie_top_padding'] == 'default' ) ? PanpieTheme::$options[$prefix . '_padding_top'] : $layout_settings['panpie_top_padding'];
			
            PanpieTheme::$padding_top = (int) $padding_top;
            
            $padding_bottom = ( empty( $layout_settings['panpie_bottom_padding'] ) || $layout_settings['panpie_bottom_padding'] == 'default' ) ? PanpieTheme::$options[$prefix . '_padding_bottom'] : $layout_settings['panpie_bottom_padding'];
			
            PanpieTheme::$padding_bottom = (int) $padding_bottom;
			
            PanpieTheme::$has_banner = ( empty( $layout_settings['panpie_banner'] ) || $layout_settings['panpie_banner'] == 'default' ) ? PanpieTheme::$options[$prefix . '_banner'] : $layout_settings['panpie_banner'];
            
            PanpieTheme::$has_breadcrumb = ( empty( $layout_settings['panpie_breadcrumb'] ) || $layout_settings['panpie_breadcrumb'] == 'default' ) ? PanpieTheme::$options[ $prefix . '_breadcrumb'] : $layout_settings['panpie_breadcrumb'];
            
            PanpieTheme::$bgtype = ( empty( $layout_settings['panpie_banner_type'] ) || $layout_settings['panpie_banner_type'] == 'default' ) ? PanpieTheme::$options[$prefix . '_bgtype'] : $layout_settings['panpie_banner_type'];
            
            PanpieTheme::$bgcolor = empty( $layout_settings['panpie_banner_bgcolor'] ) ? PanpieTheme::$options[$prefix . '_bgcolor'] : $layout_settings['panpie_banner_bgcolor'];
			
			if( !empty( $layout_settings['panpie_banner_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['panpie_banner_bgimg'], 'full', true );
                PanpieTheme::$bgimg = $attch_url[0];
            } elseif( !empty( PanpieTheme::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( PanpieTheme::$options[$prefix . '_bgimg'], 'full', true );
                PanpieTheme::$bgimg = $attch_url[0];
            } else {
                PanpieTheme::$bgimg = PANPIE_IMG_URL . 'banner.png';
            }
			
            PanpieTheme::$pagebgcolor = empty( $layout_settings['panpie_page_bgcolor'] ) ? PanpieTheme::$options[$prefix . '_page_bgcolor'] : $layout_settings['panpie_page_bgcolor'];			
            
            if( !empty( $layout_settings['panpie_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['panpie_page_bgimg'], 'full', true );
                PanpieTheme::$pagebgimg = $attch_url[0];
            } elseif( !empty( PanpieTheme::$options[$prefix . '_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( PanpieTheme::$options[$prefix . '_page_bgimg'], 'full', true );
                PanpieTheme::$pagebgimg = $attch_url[0];
            }
        }
        
        // Blog and Archive
        elseif( is_home() || is_archive() || is_search() || is_404() ) {
            if( is_search() ) {
                $prefix = 'search';
            } else if( is_404() ) {
                $prefix                                = 'error';
                PanpieTheme::$options[$prefix . '_layout'] = 'full-width';
            } else if( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
                $prefix = 'shop';
            } elseif( is_post_type_archive( "panpie_event" ) || is_tax( "panpie_event_category" ) ) {
                $prefix = 'event_archive';            
            } elseif( is_post_type_archive( "panpie_gallery" ) || is_tax( "panpie_gallery_category" ) ) {
                $prefix = 'gallery_archive'; 
			} elseif( is_post_type_archive( "panpie_team" ) || is_tax( "panpie_team_category" ) ) {
                $prefix = 'team_archive'; 
			} else {
                $prefix = 'blog';
            }
            
            PanpieTheme::$layout         		= PanpieTheme::$options[$prefix . '_layout'];
            PanpieTheme::$tr_header      		= PanpieTheme::$options['tr_header'];
            PanpieTheme::$top_bar        		= PanpieTheme::$options['top_bar'];
            PanpieTheme::$header_opt      		= PanpieTheme::$options['header_opt'];
            PanpieTheme::$footer_area     		= PanpieTheme::$options['footer_area'];
            //PanpieTheme::$footer_area2     		= PanpieTheme::$options['footer_area2'];
            PanpieTheme::$top_bar_style  		= PanpieTheme::$options['top_bar_style'];
            PanpieTheme::$header_style   		= PanpieTheme::$options['header_style'];
            PanpieTheme::$footer_style   		= PanpieTheme::$options['footer_style'];
            PanpieTheme::$padding_top    		= PanpieTheme::$options[$prefix . '_padding_top'];
            PanpieTheme::$padding_bottom 		= PanpieTheme::$options[$prefix . '_padding_bottom'];
            PanpieTheme::$has_banner     		= PanpieTheme::$options[$prefix . '_banner'];
            PanpieTheme::$has_breadcrumb 		= PanpieTheme::$options[$prefix . '_breadcrumb'];
            PanpieTheme::$bgtype         		= PanpieTheme::$options[$prefix . '_bgtype'];
            PanpieTheme::$bgcolor        		= PanpieTheme::$options[$prefix . '_bgcolor'];
			
            if( !empty( PanpieTheme::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( PanpieTheme::$options[$prefix . '_bgimg'], 'full', true );
                PanpieTheme::$bgimg = $attch_url[0];
            } else {
                PanpieTheme::$bgimg = PANPIE_IMG_URL . 'banner.png';
            }
			
            PanpieTheme::$pagebgcolor = PanpieTheme::$options[$prefix . '_page_bgcolor'];
            if( !empty( PanpieTheme::$options[$prefix . '_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( PanpieTheme::$options[$prefix . '_page_bgimg'], 'full', true );
                PanpieTheme::$pagebgimg = $attch_url[0];
            }
			
			
        }
    }
}

// Add body class
add_filter( 'body_class', 'panpie_body_classes' );
if( !function_exists( 'panpie_body_classes' ) ) {
    function panpie_body_classes( $classes ) {
		
		// Header
    	if ( PanpieTheme::$options['sticky_menu'] == 1 ) {
			$classes[] = 'sticky-header';
		}
		
        $classes[] = 'header-style-'. PanpieTheme::$header_style;		
        $classes[] = 'footer-style-'. PanpieTheme::$footer_style;

        if ( PanpieTheme::$top_bar == 1 || PanpieTheme::$top_bar == 'on' ){
            $classes[] = 'has-topbar topbar-style-'. PanpieTheme::$top_bar_style;
        }
		
        if ( PanpieTheme::$tr_header === 1 || PanpieTheme::$tr_header === "on" ){
           $classes[] = 'trheader';
        }
        
        $classes[] = ( PanpieTheme::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';
		
		$classes[] = ( PanpieTheme::$layout == 'left-sidebar' ) ? 'left-sidebar' : 'right-sidebar';
        
        if( isset( $_COOKIE["shopview"] ) && $_COOKIE["shopview"] == 'list' ) {
            $classes[] = 'product-list-view';
        } else {
            $classes[] = 'product-grid-view';
        }
		if ( is_singular('post') ) {
			$classes[] =  ' post-detail-' . PanpieTheme::$options['post_style'];
        }
        return $classes;
    }
}