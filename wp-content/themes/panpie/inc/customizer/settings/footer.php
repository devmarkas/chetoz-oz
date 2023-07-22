<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\panpie\Customizer\Settings;

use radiustheme\panpie\Customizer\PanpieTheme_Customizer;
use radiustheme\panpie\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\panpie\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class PanpieTheme_Footer_Settings extends PanpieTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_footer_controls' ) );
	}

    public function register_footer_controls( $wp_customize ) {
		
		// Footer off & on
		$wp_customize->add_setting( 'footer_area',
            array(
                'default' => $this->defaults['footer_area'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer_area',
            array(
                'label' => __( 'Footer On/Off', 'panpie' ),
                'section' => 'footer_section',
            )
        ) );
		
        // Footer Style
        $wp_customize->add_setting( 'footer_style',
            array(
                'default' => $this->defaults['footer_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );

        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'footer_style',
            array(
                'label' => __( 'Footer Layout', 'panpie' ),
                'description' => esc_html__( 'You can set default footer form here.', 'panpie' ),
                'section' => 'footer_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-1.jpg',
                        'name' => __( 'Layout 1', 'panpie' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-2.jpg',
                        'name' => __( 'Layout 2', 'panpie' )
                    ),
					'3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-3.jpg',
                        'name' => __( 'Layout 3', 'panpie' )
                    ),
                )
            )
        ) );
		// Footer column
		$wp_customize->add_setting( 'footer_column_1',
            array(
                'default' => $this->defaults['footer_column_1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        );
        $wp_customize->add_control( 'footer_column_1',
            array(
                'label' => __( 'Number of Columns for Footer', 'panpie' ),
                'section' => 'footer_section',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1 Column', 'panpie' ),
                    '2' => esc_html__( '2 Columns', 'panpie' ),
                    '3' => esc_html__( '3 Columns', 'panpie' ),
                    '4' => esc_html__( '4 Columns', 'panpie' ),
                ),
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        );
		
		// Footer column
		$wp_customize->add_setting( 'footer_column_3',
            array(
                'default' => $this->defaults['footer_column_3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        );
        $wp_customize->add_control( 'footer_column_3',
            array(
                'label' => __( 'Number of Columns for Footer', 'panpie' ),
                'section' => 'footer_section',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1 Column', 'panpie' ),
                    '2' => esc_html__( '2 Columns', 'panpie' ),
                    '3' => esc_html__( '3 Columns', 'panpie' ),
                    '4' => esc_html__( '4 Columns', 'panpie' ),
                ),
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        );
		
		// Footer bgtype
		$wp_customize->add_setting( 'footer_bgtype',
            array(
                'default' => $this->defaults['footer_bgtype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_bgtype',
            array(
                'label' => __( 'Banner Background Type', 'panpie' ),
                'section' => 'footer_section',
                'description' => esc_html__( 'This is banner background type.', 'panpie' ),
                'type' => 'select',
                'choices' => array(
					'fbgcolor' => esc_html__( 'BG Color', 'panpie' ),
                    'fbgimg' => esc_html__( 'BG Image', 'panpie' ),
                ),
            )
        );
		// Footer background color
        $wp_customize->add_setting('fbgcolor', 
            array(
                'default' => $this->defaults['fbgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
                'active_callback' => 'rttheme_footer_bgcolor_type_condition',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fbgcolor',
            array(
                'label' => esc_html__('Footer Background Color', 'panpie'),
                'settings' => 'fbgcolor', 
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_footer_bgcolor_type_condition',
            )
        ));
		// Footer background image
		$wp_customize->add_setting( 'fbgimg',
            array(
                'default' => $this->defaults['fbgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
                'active_callback' => 'rttheme_footer_bgimg_type_condition',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'fbgimg',
            array(
                'label' => __( 'Footer Background Image', 'panpie' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'panpie' ),
                'section' => 'footer_section',
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
                'active_callback' => 'rttheme_footer_bgimg_type_condition',
            )
        ) );
		
		// Footer shape 1
		$wp_customize->add_setting( 'footer_shape',
            array(
                'default' => $this->defaults['footer_shape'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
				'active_callback' => 'rttheme_is_footer1_enabled',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer_shape',
            array(
                'label' => __( 'Footer Shape', 'panpie' ),
                'section' => 'footer_section',
				'active_callback' => 'rttheme_is_footer1_enabled',
            )
        ) );
		
		// Footer shape 3
		$wp_customize->add_setting( 'footer_shape3',
            array(
                'default' => $this->defaults['footer_shape3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
				'active_callback' => 'rttheme_is_footer3_enabled',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer_shape3',
            array(
                'label' => __( 'Footer Shape', 'panpie' ),
                'section' => 'footer_section',
				'active_callback' => 'rttheme_is_footer3_enabled',
            )
        ) );
		
		$wp_customize->add_setting('footer_title_color', 
            array(
                'default' => $this->defaults['footer_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'panpie'),
                'section' => 'footer_section', 
            )
        ));
		
		$wp_customize->add_setting('footer_color', 
            array(
                'default' => $this->defaults['footer_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_color',
            array(
                'label' => esc_html__('Footer Text Color', 'panpie'),
                'section' => 'footer_section', 
            )
        ));
		
		$wp_customize->add_setting('footer_link_color', 
            array(
                'default' => $this->defaults['footer_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'panpie'),
                'section' => 'footer_section', 
            )
        ));
		
		$wp_customize->add_setting('footer_link_hover_color', 
            array(
                'default' => $this->defaults['footer_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_hover_color',
            array(
                'label' => esc_html__('Footer Link Hover Color', 'panpie'),
                'section' => 'footer_section', 
            )
        ));

        /* = Footer 2
        ======================================================*/
        
		$wp_customize->add_setting('footer_logo_light',
			array(
			  'default'           => $this->defaults['footer_logo_light'],
			  'transport'         => 'refresh',
			  'sanitize_callback' => 'absint',
			  'active_callback' => 'rttheme_is_footer2_enabled',
			)
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo_light',
			array(
				'label'         => esc_html__('Footer Logo', 'panpie'),
				'description'   => esc_html__('This is the description for the Media Control', 'panpie'),
				'section'       => 'footer_section',
				'mime_type'     => 'image',
				'button_labels' => array(
					'select'       => esc_html__('Select File', 'panpie'),
					'change'       => esc_html__('Change File', 'panpie'),
					'default'      => esc_html__('Default', 'panpie'),
					'remove'       => esc_html__('Remove', 'panpie'),
					'placeholder'  => esc_html__('No file selected', 'panpie'),
					'frame_title'  => esc_html__('Select File', 'panpie'),
					'frame_button' => esc_html__('Choose File', 'panpie'),
				),
				'active_callback' => 'rttheme_is_footer2_enabled',
			)
        ));
		
		// Copyright Text
        $wp_customize->add_setting( 'copyright_text',
            array(
                'default' => $this->defaults['copyright_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field'
            )
        );
        $wp_customize->add_control( 'copyright_text',
            array(
                'label' => __( 'Copyright Text', 'panpie' ),
                'section' => 'footer_section',
                'type' => 'textarea',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new PanpieTheme_Footer_Settings();
}
