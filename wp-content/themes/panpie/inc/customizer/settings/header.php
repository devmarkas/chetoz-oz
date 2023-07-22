<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\panpie\Customizer\Settings;

use radiustheme\panpie\Customizer\PanpieTheme_Customizer;
use radiustheme\panpie\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\panpie\Customizer\Controls\Customizer_Heading_Control;
use radiustheme\panpie\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class PanpieTheme_Header_Settings extends PanpieTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_header_controls' ) );
	}

    public function register_header_controls( $wp_customize ) {
		
		// Top Bar Style
		$wp_customize->add_setting( 'top_bar',
            array(
                'default' => $this->defaults['top_bar'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'top_bar',
            array(
                'label' => __( 'Top Bar On/Off', 'panpie' ),
                'section' => 'header_section',
            )
        ) );
		
        $wp_customize->add_setting( 'top_bar_style',
            array(
                'default' => $this->defaults['top_bar_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'top_bar_style',
            array(
                'label' => __( 'Top Bar Layout', 'panpie' ),
                'description' => esc_html__( 'You can override this settings only Mobile', 'panpie' ),
                'section' => 'header_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-1.jpg',
                        'name' => __( 'Layout 1', 'panpie' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-2.jpg',
                        'name' => __( 'Layout 2', 'panpie' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-3.jpg',
                        'name' => __( 'Layout 3', 'panpie' )
                    ),
                )
            )
        ) );
		// Topbar one option
		$wp_customize->add_setting('top_bar_bgcolor', 
            array(
                'default' => $this->defaults['top_bar_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_bgcolor',
            array(
                'label' => esc_html__('Top Bar Background Color', 'panpie'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        ));
		
		$wp_customize->add_setting('top_bar_color', 
            array(
                'default' => $this->defaults['top_bar_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_color',
            array(
                'label' => esc_html__('Top Bar Text Color', 'panpie'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        ));
		
		$wp_customize->add_setting('top_baricon_color', 
            array(
                'default' => $this->defaults['top_baricon_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_baricon_color',
            array(
                'label' => esc_html__('Top Bar Icon Color', 'panpie'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        ));
		
		$wp_customize->add_setting('top_bar_color_tr', 
            array(
                'default' => $this->defaults['top_bar_color_tr'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_color_tr',
            array(
                'label' => esc_html__('Transparent Top Bar Text Color', 'panpie'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        ));
		
		$wp_customize->add_setting('top_baricon_color_tr', 
            array(
                'default' => $this->defaults['top_baricon_color_tr'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_baricon_color_tr',
            array(
                'label' => esc_html__('Transparent Top Bar Icon Color', 'panpie'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar1_enabled', 	
            )
        ));
		
		// Topbar two option
		$wp_customize->add_setting('top_bar_bgcolor_2', 
            array(
                'default' => $this->defaults['top_bar_bgcolor_2'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_bgcolor_2',
            array(
                'label' => esc_html__('Top Bar Background Color', 'panpie'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        ));
		
		$wp_customize->add_setting('top_bar_color_2', 
            array(
                'default' => $this->defaults['top_bar_color_2'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_color_2',
            array(
                'label' => esc_html__('Top Bar Text Color', 'panpie'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        ));
		
		$wp_customize->add_setting('top_baricon_color_2', 
            array(
                'default' => $this->defaults['top_baricon_color_2'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_baricon_color_2',
            array(
                'label' => esc_html__('Top Bar Icon Color', 'panpie'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        ));
		
		$wp_customize->add_setting('top_bar_color_tr_2', 
            array(
                'default' => $this->defaults['top_bar_color_tr_2'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_color_tr_2',
            array(
                'label' => esc_html__('Transparent Top Bar Text Color', 'panpie'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        ));
		
		$wp_customize->add_setting('top_baricon_color_tr_2', 
            array(
                'default' => $this->defaults['top_baricon_color_tr_2'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_baricon_color_tr_2',
            array(
                'label' => esc_html__('Transparent Top Bar Icon Color', 'panpie'),
                'section' => 'header_section', 
				'active_callback'   => 'rttheme_is_topbar2_enabled', 	
            )
        ));

        /**
         * Heading for Header Variation
         */
        $wp_customize->add_setting('header_variation_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'header_variation_heading', array(
            'label' => __( 'Header Variation', 'panpie' ),
            'section' => 'header_section',
        )));
		
		$wp_customize->add_setting( 'sticky_menu',
            array(
                'default' => $this->defaults['sticky_menu'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'sticky_menu',
            array(
                'label' => __( 'Sticky Header', 'panpie' ),
                'section' => 'header_section',
            )
        ) );
		
		$wp_customize->add_setting( 'tr_header',
            array(
                'default' => $this->defaults['tr_header'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'tr_header',
            array(
                'label' => __( 'Transparent Header', 'panpie' ),
                'section' => 'header_section',
            )
        ) );
		
		$wp_customize->add_setting( 'header_opt',
            array(
                'default' => $this->defaults['header_opt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'header_opt',
            array(
                'label' => __( 'Header On/Off', 'panpie' ),
                'section' => 'header_section',
            )
        ) );
		

        // Header Style
        $wp_customize->add_setting( 'header_style',
            array(
                'default' => $this->defaults['header_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'header_style',
            array(
                'label' => __( 'Header Layout', 'panpie' ),
                'description' => esc_html__( 'You can override this settings only Mobile', 'panpie' ),
                'section' => 'header_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-1.jpg',
                        'name' => __( 'Layout 1', 'panpie' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-2.jpg',
                        'name' => __( 'Layout 2', 'panpie' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-3.jpg',
                        'name' => __( 'Layout 3', 'panpie' )
                    ),
                    '4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-4.jpg',
                        'name' => __( 'Layout 4', 'panpie' )
                    ),                  
                    '5' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-5.jpg',
                        'name' => __( 'Layout 5', 'panpie' )
                    ),
                    '6' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-6.jpg',
                        'name' => __( 'Layout 6', 'panpie' )
                    ),
                    '7' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-7.jpg',
                        'name' => __( 'Layout 7', 'panpie' )
                    ),
					'8' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-8.jpg',
                        'name' => __( 'Layout 8', 'panpie' )
                    ),
                    '9' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-9.jpg',
                        'name' => __( 'Layout 9', 'panpie' )
                    ),
                )
            )
        ) );

        // Header Info
        $wp_customize->add_setting( 'header_location',
            array(
                'default' => $this->defaults['header_location'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'header_location',
            array(
                'label' => __( 'Header "Location" Text', 'panpie' ),
                'section' => 'header_section',
                'type' => 'text',
            )
        );
		
        $wp_customize->add_setting( 'header_hotline_txt',
            array(
                'default' => $this->defaults['header_hotline_txt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'header_hotline_txt',
            array(
                'label' => __( 'Header "Call and Order in" Text', 'panpie' ),
                'section' => 'header_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'header_mailus_txt',
            array(
                'default' => $this->defaults['header_mailus_txt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'header_mailus_txt',
            array(
                'label' => __( 'Header "E-mail Us" Text', 'panpie' ),
                'section' => 'header_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'header_open_txt',
            array(
                'default' => $this->defaults['header_open_txt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'header_open_txt',
            array(
                'label' => __( 'Header "Saturday - Friday" Text', 'panpie' ),
                'section' => 'header_section',
                'type' => 'text',
            )
        );

        //Header Action
		$wp_customize->add_setting( 'search_icon',
            array(
                'default' => $this->defaults['search_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'search_icon',
            array(
                'label' => __( 'Search Icon', 'panpie' ),
                'section' => 'header_section',
            )
        ) );
		
		$wp_customize->add_setting( 'cart_icon',
            array(
                'default' => $this->defaults['cart_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'cart_icon',
            array(
                'label' => __( 'Cart Icon', 'panpie' ),
                'section' => 'header_section',
            )
        ) );
		
		$wp_customize->add_setting( 'vertical_menu_icon',
            array(
                'default' => $this->defaults['vertical_menu_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'vertical_menu_icon',
            array(
                'label' => __( 'Vertical Menu Icon', 'panpie' ),
                'section' => 'header_section',
            )
        ) );
		
		
		$wp_customize->add_setting( 'online_button',
            array(
                'default' => $this->defaults['online_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'online_button',
            array(
                'label' => __( 'Make a Claim Button', 'panpie' ),
                'section' => 'header_section',
            )
        ) );
		/*Online button*/
		$wp_customize->add_setting( 'online_button_text',
            array(
                'default' => $this->defaults['online_button_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
				'active_callback'   => 'rttheme_is_claim_enabled',
            )
        );
        $wp_customize->add_control( 'online_button_text',
            array(
                'label' => __( 'Button Text', 'panpie' ),
                'section' => 'header_section',
                'type' => 'text',
				'active_callback'   => 'rttheme_is_claim_enabled',
            )
        );
		
		$wp_customize->add_setting( 'online_button_link',
            array(
                'default' => $this->defaults['online_button_link'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
				'active_callback'   => 'rttheme_is_claim_enabled',
            )
        );
        $wp_customize->add_control( 'online_button_link',
            array(
                'label' => __( 'Button Link', 'panpie' ),
                'section' => 'header_section',
                'type' => 'url',
				'active_callback'   => 'rttheme_is_claim_enabled',
            )
        );

        /*responsive menu*/
		$wp_customize->add_setting('resmenu_width',
			array(
				'default'           => $this->defaults['resmenu_width'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'rttheme_text_sanitization'
			)
        );
        $wp_customize->add_control('resmenu_width',
			array(
				'label'   => esc_html__('Mobile Menu Width', 'panpie'),
				'section' => 'header_section',
				'type'    => 'text'
			)
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new PanpieTheme_Header_Settings();
}
