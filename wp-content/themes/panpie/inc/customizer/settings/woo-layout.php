<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\panpie\Customizer\Settings;

use radiustheme\panpie\Customizer\PanpieTheme_Customizer;
use radiustheme\panpie\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\panpie\Customizer\Controls\Customizer_Separator_Control;
use radiustheme\panpie\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class PanpieTheme_WooCommerce_Layout_Settings extends PanpieTheme_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_shop_archive_layout_controls' ) );
	}

    public function register_shop_archive_layout_controls( $wp_customize ) {

        $wp_customize->add_setting( 'shop_layout',
            array(
                'default' => $this->defaults['shop_layout'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'shop_layout',
            array(
                'label' => __( 'Layout', 'panpie' ),
                'description' => esc_html__( 'Select the default template layout for Pages', 'panpie' ),
                'section' => 'wc_shop_layout_section',
                'choices' => array(
                    'left-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-left.png',
                        'name' => __( 'Left Sidebar', 'panpie' )
                    ),
                    'full-width' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-full.png',
                        'name' => __( 'Full Width', 'panpie' )
                    ),
                    'right-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-right.png',
                        'name' => __( 'Right Sidebar', 'panpie' )
                    )
                )
            )
        ) );

        /* Separator */
        $wp_customize->add_setting('separator_page', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_page', array(
            'settings' => 'separator_page',
            'section' => 'wc_shop_layout_section',
        )));
		
		// Content padding top
        $wp_customize->add_setting( 'shop_padding_top',
            array(
                'default' => $this->defaults['shop_padding_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'shop_padding_top',
            array(
                'label' => __( 'Content Padding Top', 'panpie' ),
                'section' => 'wc_shop_layout_section',
                'type' => 'number',
            )
        );
        // Content padding bottom
        $wp_customize->add_setting( 'shop_padding_bottom',
            array(
                'default' => $this->defaults['shop_padding_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'shop_padding_bottom',
            array(
                'label' => __( 'Content Padding Bottom', 'panpie' ),
                'section' => 'wc_shop_layout_section',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'shop_banner',
            array(
                'default' => $this->defaults['shop_banner'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'shop_banner',
            array(
                'label' => __( 'Banner', 'panpie' ),
                'section' => 'wc_shop_layout_section',
            )
        ) );
		
		$wp_customize->add_setting( 'shop_breadcrumb',
            array(
                'default' => $this->defaults['shop_breadcrumb'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'shop_breadcrumb',
            array(
                'label' => __( 'Breadcrumb', 'panpie' ),
                'section' => 'wc_shop_layout_section',
            )
        ) );
		
        // Banner BG Type 
        $wp_customize->add_setting( 'shop_bgtype',
            array(
                'default' => $this->defaults['shop_bgtype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'shop_bgtype',
            array(
                'label' => __( 'Banner Background Type', 'panpie' ),
                'section' => 'wc_shop_layout_section',
                'description' => esc_html__( 'This is banner background type.', 'panpie' ),
                'type' => 'select',
                'choices' => array(
                    'bgimg' => esc_html__( 'BG Image', 'panpie' ),
                    'bgcolor' => esc_html__( 'BG Color', 'panpie' ),
                ),
            )
        );

        $wp_customize->add_setting( 'shop_bgimg',
            array(
                'default' => $this->defaults['shop_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'shop_bgimg',
            array(
                'label' => __( 'Banner Background Image', 'panpie' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'panpie' ),
                'section' => 'wc_shop_layout_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'panpie' ),
                    'change' => __( 'Change File', 'panpie' ),
                    'default' => __( 'Default', 'panpie' ),
                    'remove' => __( 'Remove', 'panpie' ),
                    'placeholder' => __( 'No file selected', 'panpie' ),
                    'frame_title' => __( 'Select File', 'panpie' ),
                    'frame_button' => __( 'Choose File', 'panpie' ),
                ),
            )
        ) );

        // Banner background color
        $wp_customize->add_setting('shop_bgcolor', 
            array(
                'default' => $this->defaults['shop_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shop_bgcolor',
            array(
                'label' => esc_html__('Banner Background Color', 'panpie'),
                'settings' => 'shop_bgcolor', 
                'priority' => 10, 
                'section' => 'wc_shop_layout_section', 
            )
        ));
		
		// Page background image
		$wp_customize->add_setting( 'shop_page_bgimg',
            array(
                'default' => $this->defaults['shop_page_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'shop_page_bgimg',
            array(
                'label' => __( 'Page / Post Background Image', 'panpie' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'panpie' ),
                'section' => 'wc_shop_layout_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'panpie' ),
                    'change' => __( 'Change File', 'panpie' ),
                    'default' => __( 'Default', 'panpie' ),
                    'remove' => __( 'Remove', 'panpie' ),
                    'placeholder' => __( 'No file selected', 'panpie' ),
                    'frame_title' => __( 'Select File', 'panpie' ),
                    'frame_button' => __( 'Choose File', 'panpie' ),
                ),
            )
        ) );
		
		$wp_customize->add_setting('shop_page_bgcolor', 
            array(
                'default' => $this->defaults['shop_page_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shop_page_bgcolor',
            array(
                'label' => esc_html__('Page / Post Background Color', 'panpie'),
                'settings' => 'shop_page_bgcolor', 
                'section' => 'wc_shop_layout_section', 
            )
        ));
        

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new PanpieTheme_WooCommerce_Layout_Settings();
}
