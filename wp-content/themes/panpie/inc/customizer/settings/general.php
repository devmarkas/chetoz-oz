<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\panpie\Customizer\Settings;

use radiustheme\panpie\Customizer\PanpieTheme_Customizer;
use radiustheme\panpie\Customizer\Controls\Customizer_Heading_Control;
use radiustheme\panpie\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\panpie\Customizer\Controls\Customizer_Separator_Control;
use radiustheme\panpie\Customizer\Controls\Customizer_Sortable_Repeater_Control;
use radiustheme\panpie\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class PanpieTheme_General_Settings extends PanpieTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_general_controls' ) );
	}

    public function register_general_controls( $wp_customize ) {
        /**
         * Heading
         */
        $wp_customize->add_setting('logo_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'logo_heading', array(
            'label' => __( 'Site Logo', 'panpie' ),
            'section' => 'general_section',
        )));

        $wp_customize->add_setting( 'logo',
            array(
                'default' => $this->defaults['logo'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo',
            array(
                'label' => __( 'Main Logo', 'panpie' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'panpie' ),
                'section' => 'general_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'panpie' ),
                    'change' => __( 'Change File', 'panpie' ),
                    'default' => __( 'Default', 'panpie' ),
                    'remove' => __( 'Remove', 'panpie' ),
                    'placeholder' => __( 'No file selected', 'panpie' ),
                    'frame_title' => __( 'Select File', 'panpie' ),
                    'frame_button' => __( 'Choose File', 'panpie' ),
                )
            )
        ) );

        $wp_customize->add_setting( 'logo_light',
            array(
                'default' => $this->defaults['logo_light'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo_light',
            array(
                'label' => __( 'Logo Dark', 'panpie' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'panpie' ),
                'section' => 'general_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'panpie' ),
                    'change' => __( 'Change File', 'panpie' ),
                    'default' => __( 'Default', 'panpie' ),
                    'remove' => __( 'Remove', 'panpie' ),
                    'placeholder' => __( 'No file selected', 'panpie' ),
                    'frame_title' => __( 'Select File', 'panpie' ),
                    'frame_button' => __( 'Choose File', 'panpie' ),
                )
            )
        ) );

        /**
         * Heading
         */
        $wp_customize->add_setting('site_switching', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'site_switching', array(
            'label' => __( 'Site Switch Control', 'panpie' ),
            'section' => 'general_section',
        )));
		
		$wp_customize->add_setting( 'container_width',
            array(
                'default' => $this->defaults['container_width'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'container_width',
            array(
                'label' => __( 'Container width( Bootstrap Grid )', 'panpie' ),
                'section' => 'general_section',
                'type' => 'select',
                'choices' => array(
                    '1350' => esc_html__( '1350px', 'panpie' ),
					'1240' => esc_html__( '1240px', 'panpie' ),
					'1200' => esc_html__( '1200px', 'panpie' ),
					'1140' => esc_html__( '1140px', 'panpie' ),
                ),
            )
        );
		
		// Display No Preview Image
        $wp_customize->add_setting( 'display_no_preview_image',
            array(
                'default' => $this->defaults['display_no_preview_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'display_no_preview_image',
            array(
                'label' => __( 'Display No Preview Image on Blog', 'panpie' ),
                'section' => 'general_section',
            )
        ) );
		
		// Display No Preview Image
        $wp_customize->add_setting( 'display_no_prev_img_related_post',
            array(
                'default' => $this->defaults['display_no_prev_img_related_post'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'display_no_prev_img_related_post',
            array(
                'label' => __( 'Display No Preview Image on Related Post', 'panpie' ),
                'section' => 'general_section',
            )
        ) );
		
		// Switch for back to top button
        $wp_customize->add_setting( 'back_to_top',
            array(
                'default' => $this->defaults['back_to_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'back_to_top',
            array(
                'label' => __( 'Back to Top Arrow', 'panpie' ),
                'section' => 'general_section',
            )
        ) );

        // Add our Preloader
        $wp_customize->add_setting('preloader',
			array(
			 'default'           => $this->defaults['preloader'],
			 'transport'         => 'refresh',
			 'sanitize_callback' => 'rttheme_switch_sanitization',
			)
        );
        $wp_customize->add_control(new Customizer_Switch_Control($wp_customize, 'preloader',
            array(
                'label'   => esc_html__('Preloader', 'panpie'),
                'section' => 'general_section',
            )
        ));
        $wp_customize->add_setting('preloader_image',
			array(
			  'default'           => $this->defaults['preloader_image'],
			  'transport'         => 'refresh',
			  'sanitize_callback' => 'absint',
			  'active_callback'   => 'rttheme_is_preloader_enabled',  
			)
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'preloader_image',
			array(
				'label'         => esc_html__('Preloader Image', 'panpie'),
				'description'   => esc_html__('This is the description for the Media Control', 'panpie'),
				'section'       => 'general_section',
				'active_callback'   => 'rttheme_is_preloader_enabled',  
				'mime_type'     => 'image',
				'button_labels' => array(
					'select'       => esc_html__('Select File', 'panpie'),
					'change'       => esc_html__('Change File', 'panpie'),
					'default'      => esc_html__('Default', 'panpie'),
					'remove'       => esc_html__('Remove', 'panpie'),
					'placeholder'  => esc_html__('No file selected', 'panpie'),
					'frame_title'  => esc_html__('Select File', 'panpie'),
					'frame_button' => esc_html__('Choose File', 'panpie'),
				)
			)
        ));
        $wp_customize->add_setting('preloader_bg_color',
			array(
				'default'           => $this->defaults['preloader_bg_color'],
				'transport'         => 'postMessage',
				'sanitize_callback' => 'rttheme_hex_rgba_sanitization',
				'active_callback'   => 'rttheme_is_preloader_enabled',  
			)
        );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'preloader_bg_color',
			array(
				'label'   => esc_html__('Preloader color', 'panpie'),
				'section' => 'general_section',
				'active_callback'   => 'rttheme_is_preloader_enabled',  
			)
		));	
		
        /**
         * Heading
         */
        $wp_customize->add_setting('social_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'social_heading', array(
            'label' => __( 'Contact And Social', 'panpie' ),
            'section' => 'general_section',
        )));
		
		// Contact		
		$wp_customize->add_setting( 'phone',
            array(
                'default' => $this->defaults['phone'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'phone',
            array(
                'label' => __( 'Phone', 'panpie' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'email',
            array(
                'default' => $this->defaults['email'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'email',
            array(
                'label' => __( 'Email', 'panpie' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'openhour',
            array(
                'default' => $this->defaults['openhour'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'openhour',
            array(
                'label' => __( 'Opening Hour', 'panpie' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'address',
            array(
                'default' => $this->defaults['address'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'address',
            array(
                'label' => __( 'Address', 'panpie' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );

        // Social link
        $wp_customize->add_setting( 'social_facebook',
            array(
                'default' => $this->defaults['social_facebook'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_facebook',
            array(
                'label' => __( 'Facebook', 'panpie' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
        $wp_customize->add_setting( 'social_twitter',
            array(
                'default' => $this->defaults['social_twitter'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_twitter',
            array(
                'label' => __( 'Twitter', 'panpie' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
        $wp_customize->add_setting( 'social_gplus',
            array(
                'default' => $this->defaults['social_gplus'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_gplus',
            array(
                'label' => __( 'Google Plus', 'panpie' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
        $wp_customize->add_setting( 'social_linkedin',
            array(
                'default' => $this->defaults['social_linkedin'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_linkedin',
            array(
                'label' => __( 'Linkedin', 'panpie' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
        $wp_customize->add_setting( 'social_behance',
            array(
                'default' => $this->defaults['social_behance'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_behance',
            array(
                'label' => __( 'Behance', 'panpie' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
        $wp_customize->add_setting( 'social_dribbble',
            array(
                'default' => $this->defaults['social_dribbble'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_dribbble',
            array(
                'label' => __( 'Dribbble', 'panpie' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
        $wp_customize->add_setting( 'social_youtube',
            array(
                'default' => $this->defaults['social_youtube'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_youtube',
            array(
                'label' => __( 'Youtube', 'panpie' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
		$wp_customize->add_setting( 'social_pinterest',
            array(
                'default' => $this->defaults['social_pinterest'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_pinterest',
            array(
                'label' => __( 'Pinterest', 'panpie' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
		$wp_customize->add_setting( 'social_instagram',
            array(
                'default' => $this->defaults['social_instagram'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_instagram',
            array(
                'label' => __( 'Instagram', 'panpie' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
		$wp_customize->add_setting( 'social_skype',
            array(
                'default' => $this->defaults['social_skype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_skype',
            array(
                'label' => __( 'Skype', 'panpie' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
		$wp_customize->add_setting( 'social_rss',
            array(
                'default' => $this->defaults['social_rss'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_rss',
            array(
                'label' => __( 'RSS', 'panpie' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
		$wp_customize->add_setting( 'social_snapchat',
            array(
                'default' => $this->defaults['social_snapchat'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_snapchat',
            array(
                'label' => __( 'Snapchat', 'panpie' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required  
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new PanpieTheme_General_Settings();
}
