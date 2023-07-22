<?php
// Customizer Default Data
if ( ! function_exists( 'rttheme_generate_defaults' ) ) {
    function rttheme_generate_defaults() {
        $customizer_defaults = array(

            // General  
            'logo'               	=> '',
            'logo_light'          	=> '',
			'container_width'		=> '1200',
            'preloader'          	=> 1,
            'preloader_image'    	=> '',
			'preloader_bg_color' 	=> '#ffffff',
            'back_to_top'     		=> 1,
            'display_no_preview_image'    => 0,
            'display_no_prev_img_related_post'  => 0,

            // Contact Socials
            'phone'   			=> '',
            'email'   			=> '',
            'openhour'   		=> '',
            'address'   		=> '',
            'social_facebook'  	=> '',
            'social_twitter'   	=> '',
            'social_gplus' 		=> '',
            'social_linkedin'   => '',
            'social_behance' 	=> '',
            'social_dribbble'  	=> '',
            'social_youtube'    => '',
            'social_pinterest'  => '',
            'social_instagram'  => '',
            'social_skype'      => '',
            'social_rss'       	=> '',
            'social_snapchat'   => '',
			
			// Color
			'primary_color' 			=> '#f43127',
			'secondary_color' 			=> '#fcb302',
			'gradient_dark_color' 		=> '#ff0000',
			'gradient_light_color' 		=> '#fc4b33',
			'body_color' 				=> '#646464',			
			'menu_color' 				=> '#010101',
			'menu_hover_color' 			=> '#f43127',
			'menu_color_tr' 			=> '#010101',			
			'submenu_color' 			=> '#010101',
			'submenu_hover_color' 		=> '#fcb302',
			'submenu_bgcolor' 			=> '#ffffff',
			'submenu_hover_bgcolor' 	=> '#ffffff',

            // header
			'top_bar'  					=> 0,
			'top_bar_style'  			=> 1,
			'top_bar_bgcolor'			=> '#ffffff',
			'top_bar_color'				=> '#646464',
			'top_baricon_color'			=> '#ff0302',
			'top_bar_color_tr'			=> '#ffffff',
			'top_baricon_color_tr'		=> '#ffffff',			
			'top_bar_bgcolor_2'			=> '#f3f4f7',
			'top_bar_color_2'			=> '#646464',
			'top_baricon_color_2'		=> '#646464',
			'top_bar_color_tr_2'		=> '#ffffff',
			'top_baricon_color_tr_2'	=> '#ffffff',		
			
			'sticky_menu'       		=> 1,
			'tr_header'       			=> 0,
			'header_opt'       			=> 1,
            'header_style'      		=> 6,
            'header_location'      		=> 'Location',
            'header_hotline_txt'      	=> 'Call and Order in',
            'header_mailus_txt'      	=> 'E-mail Us',
            'header_open_txt'      		=> 'Saturday - Friday',			
            'search_icon'      			=> 0,
            'cart_icon'      			=> 0,
            'vertical_menu_icon' 		=> 0,
			'online_button'				=>'1',
            'online_button_text' 		=> 'Order Now',
            'online_button_link' 		=> '#',
            'resmenu_width' 			=> 992,
			
			// Footer
            'footer_style'        		=> 1,
            'copyright_text'      		=> '&copy; ' . date('Y') . ' panpie. All Rights Reserved by <a target="_blank" rel="nofollow" href="' . PANPIE_AUTHOR_URI . '">RadiusTheme</a>',
			'footer_column_1'			=> 3,
			'footer_column_3'			=> 4,
			'footer_area'				=> 1,
			'footer_shape'				=> 0,
			'footer_shape3'				=> 0,
			'footer_bgtype' 			=> 'fbgcolor',
			'fbgcolor' 					=> '#1a1a1a',
			'fbgimg'					=> '',
			'footer_title_color' 		=> '#ffffff',
			'footer_color' 				=> '#c8c9cc',
			'footer_link_color' 		=> '#c8c9cc',
			'footer_link_hover_color' 	=> '#ffffff',
			'footer_logo_light' 		=> '',
			
			// Banner 
			'banner_heading_color' 		=> '#111111',
			'breadcrumb_link_color' 	=> '#9e9586',
			'breadcrumb_link_hover_color' 	=> '#f43127',
			'breadcrumb_active_color' 	=> '#f43127',
			'breadcrumb_seperator_color'=> '#9e9586',
			'banner_bg_opacity' 		=> 0,
			'banner_top_padding'    	=> 140,
            'banner_bottom_padding' 	=> 150,
            'breadcrumb_active' 		=> 0,
			
			// Post Type Slug
			'team_slug' 				=> 'team',
			'event_slug' 				=> 'event',
			'gallery_slug' 				=> 'gallery',
			'testimonial_slug' 			=> 'testimonial',
			'team_cat_slug' 			=> 'team-category',
			'event_cat_slug' 			=> 'event-category',
			'gallery_cat_slug' 			=> 'gallery-category',
			'testim_cat_slug' 			=> 'testimonial-category',			
			
            // Page Layout Setting 
            'page_layout'        => 'full-width',
			'page_padding_top'    => 130,
            'page_padding_bottom' => 120,
            'page_banner' => 1,
            'page_breadcrumb' => 1,
            'page_bgtype' => 'bgcolor',
            'page_bgcolor' => '#f4ecdf',
            'page_bgimg' => '',
            'page_page_bgimg' => '',
            'page_page_bgcolor' => '#ffffff',
			
			//Blog Layout Setting 
            'blog_layout' => 'right-sidebar',
			'blog_padding_top'    => 130,
            'blog_padding_bottom' => 120,
            'blog_banner' => 1,
            'blog_breadcrumb' => 1,			
			'blog_bgtype' => 'bgcolor',
            'blog_bgcolor' => '#f4ecdf',
            'blog_bgimg' => '',
            'blog_page_bgimg' => '',
            'blog_page_bgcolor' => '#ffffff',
			
			//Single Post Layout Setting 
			'single_post_layout' => 'right-sidebar',
			'single_post_padding_top'    => 120,
            'single_post_padding_bottom' => 120,
            'single_post_banner' => 1,
            'single_post_breadcrumb' => 1,			
			'single_post_bgtype' => 'bgcolor',
            'single_post_bgcolor' => '#f4ecdf',
            'single_post_bgimg' => '',
            'single_post_page_bgimg' => '',
            'single_post_page_bgcolor' => '#ffffff',
			
			//Event Layout Setting 
			'event_archive_layout' => 'right-sidebar',
			'event_archive_padding_top'    => 120,
            'event_archive_padding_bottom' => 120,
            'event_archive_banner' => 1,
            'event_archive_breadcrumb' => 1,			
			'event_archive_bgtype' => 'bgcolor',
            'event_archive_bgcolor' => '#f4ecdf',
            'event_archive_bgimg' => '',
            'event_archive_page_bgimg' => '',
            'event_archive_page_bgcolor' => '#ffffff',
			
			//Event Single Layout Setting 
			'event_layout' => 'right-sidebar',
			'event_padding_top'    => 120,
            'event_padding_bottom' => 120,
            'event_banner' => 1,
            'event_breadcrumb' => 1,			
			'event_bgtype' => 'bgcolor',
            'event_bgcolor' => '#f4ecdf',
            'event_bgimg' => '',
            'event_page_bgimg' => '',
            'event_page_bgcolor' => '#ffffff',
			
			//Gallery Layout Setting 
			'gallery_archive_layout' => 'full-width',
			'gallery_archive_padding_top'    => 120,
            'gallery_archive_padding_bottom' => 120,
            'gallery_archive_banner' => 1,
            'gallery_archive_breadcrumb' => 1,			
			'gallery_archive_bgtype' => 'bgcolor',
            'gallery_archive_bgcolor' => '#f4ecdf',
            'gallery_archive_bgimg' => '',
            'gallery_archive_page_bgimg' => '',
            'gallery_archive_page_bgcolor' => '#ffffff',
			
			//Gallery Single Layout Setting 
			'gallery_layout' => 'full-width',
			'gallery_padding_top'    => 120,
            'gallery_padding_bottom' => 120,
            'gallery_banner' => 1,
            'gallery_breadcrumb' => 1,			
			'gallery_bgtype' => 'bgcolor',
            'gallery_bgcolor' => '#f4ecdf',
            'gallery_bgimg' => '',
            'gallery_page_bgimg' => '',
            'gallery_page_bgcolor' => '#ffffff',
			
			//Team Layout Setting 
			'team_archive_layout' => 'full-width',
			'team_archive_padding_top'    => 120,
            'team_archive_padding_bottom' => 120,
            'team_archive_banner' => 1,
            'team_archive_breadcrumb' => 1,			
			'team_archive_bgtype' => 'bgcolor',
            'team_archive_bgcolor' => '#f4ecdf',
            'team_archive_bgimg' => '',
            'team_archive_page_bgimg' => '',
            'team_archive_page_bgcolor' => '#ffffff',
			
			//Team Single Layout Setting 
			'team_layout' => 'full-width',
			'team_padding_top'    => 120,
            'team_padding_bottom' => 120,
            'team_banner' => 1,
            'team_breadcrumb' => 1,			
			'team_bgtype' => 'bgcolor',
            'team_bgcolor' => '#f4ecdf',
            'team_bgimg' => '',
            'team_page_bgimg' => '',
            'team_page_bgcolor' => '#ffffff',
			
			//Search Layout Setting 
			'search_layout' => 'right-sidebar',
			'search_padding_top'    => 120,
            'search_padding_bottom' => 120,
            'search_banner' => 1,
            'search_breadcrumb' => 1,			
			'search_bgtype' => 'bgcolor',
            'search_bgcolor' => '#f4ecdf',
            'search_bgimg' => '',
            'search_page_bgimg' => '',
            'search_page_bgcolor' => '#ffffff',
            'search_excerpt_length' => 40,
			
			//Error Layout Setting 
			'error_padding_top'    => 120,
            'error_padding_bottom' => 120,
            'error_banner' => 1,
            'error_breadcrumb' => 1,			
			'error_bgtype' => 'bgcolor',
            'error_bgcolor' => '#f4ecdf',
            'error_bgimg' => '',
            'error_page_bgimg' => '',
            'error_page_bgcolor' => '#ffffff',
			
			//Shop Archive Layout Setting 
			'shop_layout' => 'left-sidebar',
			'shop_padding_top'    => 120,
            'shop_padding_bottom' => 120,
            'shop_banner' => 1,
            'shop_breadcrumb' => 1,			
			'shop_bgtype' => 'bgcolor',
            'shop_bgcolor' => '#f4ecdf',
            'shop_bgimg' => '',
            'shop_page_bgimg' => '',
            'shop_page_bgcolor' => '#ffffff',
			
			//Product Single Layout Setting 
			'product_layout' => 'full-width',
			'product_padding_top'    => 120,
            'product_padding_bottom' => 120,
            'product_banner' => 1,
            'product_breadcrumb' => 1,			
			'product_bgtype' => 'bgcolor',
            'product_bgcolor' => '#f4ecdf',
            'product_bgimg' => '',
            'product_page_bgimg' => '',
            'product_page_bgcolor' => '#ffffff',

            // Blog 
			'blog_style'				=> 'style2',
			'post_banner_title'  		=> '',
			'post_content_limit'  		=> '20',
			'blog_content'  			=> 1,
			'blog_date'  				=> 1,
			'blog_author_name'  		=> 0,
			'blog_comment_num'  		=> 0,
			'blog_cats'  				=> 1,
			'blog_view'  				=> 0,
			'blog_length'  				=> 0,
			
			// Post
			'post_style'				=> 'style1',
			'post_featured_image'		=> 1,
			'post_author_name'			=> 1,
			'post_date'					=> 1,
			'post_comment_num'			=> 1,
			'post_cats'					=> 1,
			'post_tags'					=> 1,
			'post_share'				=> 1,
			'post_links'				=> 0,
			'post_author_bio'			=> 0,
			'post_view'					=> 1,
			'post_length'				=> 0,
			'show_related_post'			=> 0,
			'show_related_post_cat'		=> 0,
			'show_related_post_date'	=> 1,
			'show_related_post_number'	=> 5,
			'show_related_post_title_limit'	=> 8,
			'related_post_query'		=> 'cat',
			'related_post_sort'			=> 'recent',
			
			// Post Share
			'post_share_facebook' 		=> 1,
			'post_share_twitter' 		=> 1,
			'post_share_google' 		=> 1,
			'post_share_linkedin' 		=> 1,
			'post_share_pinterest' 		=> 1,
			'post_share_whatsapp' 		=> 0,
			'post_share_stumbleupon' 	=> 0,
			'post_share_tumblr' 		=> 0,
			'post_share_reddit' 		=> 0,
			'post_share_email' 			=> 0,
			'post_share_print' 			=> 0,
            
            // Gallery
            'gallery_archive_style'     => 'style1', 
            'gallery_arexcerpt_limit'  	=> 8,
            'gallery_ar_category'  		=> 1,
            'gallery_ar_excerpt'  		=> 0,
            'gallery_ar_view'  			=> 0,
            'gallery_ar_link'  			=> 0,
            'port_button'  				=> 1,
            'related_port_cat'  		=> 0,
            'show_related_port'  		=> 0,
            'show_related_port_content' => 1,
            'port_related_title'  		=> 'Related Gallery',
            'port_related_title'  		=> 'Related Gallery',
            'related_port_number'  		=> 5,
            'related_port_title_limit'  => 5,
			
			// Team
			'team_archive_style' 		=> 'style1',
			'team_arexcerpt_limit' 		=> 14,
			'team_ar_excerpt' 			=> 1,
			'team_ar_position' 			=> 1,
			'team_ar_social' 			=> 1,
			'team_info' 				=> 1,
			'team_skill' 				=> 1,
			'team_form' 				=> 0,
			'team_form_title' 			=> 'Contact Me',
			'show_related_team' 		=> 1,
			'team_related_title' 		=> 'Related Chef',
			'related_team_social' 		=> 1,
			'related_team_position' 	=> 1,
			'related_team_number' 		=> 5,
			'related_team_title_limit' 	=> 5,
			
			// Event
			'events_style' 				=> 'style1',
			'event_excerpt_limit' 		=> 10,
			'event_ar_address' 			=> 1,
			'event_ar_phone' 			=> 1,
			'event_ar_button' 			=> 1,
			'event_title' 				=> 1,
			'event_text' 				=> 1,
			'event_address' 			=> 1,
			'event_phone' 				=> 1,
			'event_mail' 				=> 1,
			'event_open' 				=> 1,
			'event_button' 				=> 1,
			'show_related_event' 		=> 1,
			'event_related_title' 		=> 'Location Gallery',
			'event_view' 				=> 0,
			'event_link' 				=> 0,
			'related_event_number' 		=> 5,
			'related_event_title_limit' => 5,			
			
            // Error
            'error_title' 				=> 'Error 404',
            'error_bodybg' 				=> '#ffffff',
            'error_text1_color' 		=> '#ffffff',
            'error_text2_color' 		=> '#000000',
			'error_bodybanner' 			=> '',
            'ops_text' 					=> 'OPS!',
            'error_text1' 				=> '404',
            'error_text2' 				=> 'Sorry, The Page Not Found',
            'error_buttontext' 			=> 'BACK TO HOME',
			
			// WooCommerce Shop Page
			'wc_archive_layouts' => 'regular',
			'wc_num_product' => 9,
			'wc_num_product_shop_page' => 3,
			'wc_show_title' => 1,
			'wc_show_price' => 1,
			'wc_show_cart' => 1,
			'wc_show_excerpt' => 1,
			'wc_show_excerpt_limit' => 7,
			'wc_block_layouts' => 'panpiestyle4',
			'wc_variation_select' => 'select-size',
			'wc_attribute_limit' => 1,
			
			// WooCommerce Single Page
			'wc_sku' => 1,
			'wc_cats' => 1,
			'wc_tags' => 1,
			'wc_share' => 0,
			'wc_related' => 1,
			'wc_description' => 1,
			'wc_reviews' => 1,
			'wc_additional_info' => 1,
			'wc_related_title' => 'Related Products',
			'wc_cross_sell' => 1,

            // Typography
            'typo_body' => json_encode(
                array(
                    'font' => 'Roboto',
                    'regularweight' => 'normal',
                )
            ),
            'typo_body_size' => '16px',
            'typo_body_height'=> '30px',

            //Menu Typography
            'typo_menu' => json_encode(
                array(
                    'font' => 'Barlow',
                    'regularweight' => '600',
                )
            ),
            'typo_menu_size' => '16px',
            'typo_menu_height'=> '22px',

            //Sub Menu Typography
            'typo_submenu_size' => '15px',
            'typo_submenu_height'=> '22px',


            // Heading Typography
            'typo_heading' => json_encode(
                array(
                    'font' => 'Barlow',
                    'regularweight' => '700',
                )
            ),
            //H1
            'typo_h1' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '700',
                )
            ),
            'typo_h1_size' => '38px',
            'typo_h1_height' => '40px',

            //H2
            'typo_h2' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '700',
                )
            ),
            'typo_h2_size' => '30px',
            'typo_h2_height'=> '36px',

            //H3
            'typo_h3' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '700',
                )
            ),
            'typo_h3_size' => '24px',
            'typo_h3_height'=> '34px',

            //H4
            'typo_h4' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '700',
                )
            ),
            'typo_h4_size' => '20px',
            'typo_h4_height'=> '32px',

            //H5
            'typo_h5' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '700',
                )
            ),
            'typo_h5_size' => '18px',
            'typo_h5_height'=> '26px',

            //H6
            'typo_h6' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '700',
                )
            ),
            'typo_h6_size' => '16px',
            'typo_h6_height'=> '24px',

            
        );

        return apply_filters( 'rttheme_customizer_defaults', $customizer_defaults );
    }
}