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
use radiustheme\panpie\Customizer\Controls\Customizer_Separator_Control;
use radiustheme\panpie\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class PanpieTheme_Gallery_Post_Settings extends PanpieTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_gallery_post_controls' ) );
	}

    /**
     * Gallery Post Controls
     */
    public function register_gallery_post_controls( $wp_customize ) {
		
		$wp_customize->add_setting( 'gallery_archive_style',
            array(
                'default' => $this->defaults['gallery_archive_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'gallery_archive_style',
            array(
                'label' => __( 'Gallery Archive Layout', 'panpie' ),
                'description' => esc_html__( 'Select the gallery layout for gallery page', 'panpie' ),
                'section' => 'rttheme_gallery_settings',
                'choices' => array(
                    'style1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/post-style-1.png',
                        'name' => __( 'Layout 1', 'panpie' )
                    ),
                    'style2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/post-style-3.png',
                        'name' => __( 'Layout 2', 'panpie' )
                    ),
                )
            )
        ) );

        // Gallery option
        $wp_customize->add_setting( 'gallery_arexcerpt_limit',
            array(
                'default' => $this->defaults['gallery_arexcerpt_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'gallery_arexcerpt_limit',
            array(
                'label' => __( 'Gallery Content Limit', 'panpie' ),
                'section' => 'rttheme_gallery_settings',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'gallery_ar_category',
            array(
                'default' => $this->defaults['gallery_ar_category'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'gallery_ar_category',
            array(
                'label' => __( 'Show Category', 'panpie' ),
                'section' => 'rttheme_gallery_settings',
            )
        ));
		
		$wp_customize->add_setting( 'gallery_ar_excerpt',
            array(
                'default' => $this->defaults['gallery_ar_excerpt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'gallery_ar_excerpt',
            array(
                'label' => __( 'Show Excerpt', 'panpie' ),
                'section' => 'rttheme_gallery_settings',
            )
        ));
		
		$wp_customize->add_setting( 'gallery_ar_view',
            array(
                'default' => $this->defaults['gallery_ar_view'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'gallery_ar_view',
            array(
                'label' => __( 'Show View', 'panpie' ),
                'section' => 'rttheme_gallery_settings',
            )
        ));
		
		$wp_customize->add_setting( 'gallery_ar_link',
            array(
                'default' => $this->defaults['gallery_ar_link'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'gallery_ar_link',
            array(
                'label' => __( 'Show Link', 'panpie' ),
                'section' => 'rttheme_gallery_settings',
            )
        ));
		
		// Single Gallery Post
		$wp_customize->add_setting('galler_single_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'galler_single_heading', array(
            'label' => __( 'Single Gallery Settings', 'panpie' ),
            'section' => 'rttheme_gallery_settings',
        )));
		
		$wp_customize->add_setting( 'port_button',
            array(
                'default' => $this->defaults['port_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'port_button',
            array(
                'label' => __( 'Show Link', 'panpie' ),
                'section' => 'rttheme_gallery_settings',
            )
        ));
		
		// Related Gallery Post
		$wp_customize->add_setting('galler_related_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'galler_related_heading', array(
            'label' => __( 'Related Gallery Settings', 'panpie' ),
            'section' => 'rttheme_gallery_settings',
        )));
		
		$wp_customize->add_setting( 'show_related_port',
            array(
                'default' => $this->defaults['show_related_port'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_related_port',
            array(
                'label' => __( 'Show Related Gallery', 'panpie' ),
                'section' => 'rttheme_gallery_settings',
            )
        ));
		
		$wp_customize->add_setting( 'show_related_port_content',
            array(
                'default' => $this->defaults['show_related_port_content'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_related_port_content',
            array(
                'label' => __( 'Show Related Content', 'panpie' ),
                'section' => 'rttheme_gallery_settings',
				'active_callback'   => 'rttheme_is_related_gallery_enabled',
            )
        ));
		
		$wp_customize->add_setting( 'related_port_cat',
            array(
                'default' => $this->defaults['related_port_cat'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'related_port_cat',
            array(
                'label' => __( 'Related Gallery Category', 'panpie' ),
                'section' => 'rttheme_gallery_settings',
				'active_callback'   => 'rttheme_is_related_gallery_enabled',
            )
        ));
		
		$wp_customize->add_setting( 'port_related_title',
            array(
                'default' => $this->defaults['port_related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'port_related_title',
            array(
                'label' => __( 'Related Title', 'panpie' ),
                'section' => 'rttheme_gallery_settings',
                'type' => 'text',
				'active_callback'   => 'rttheme_is_related_gallery_enabled',
            )
        );
		
		$wp_customize->add_setting( 'related_port_number',
            array(
                'default' => $this->defaults['related_port_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_port_number',
            array(
                'label' => __( 'Related Gallery Post', 'panpie' ),
                'section' => 'rttheme_gallery_settings',
                'type' => 'number',
				'active_callback'   => 'rttheme_is_related_gallery_enabled',
            )
        );
		
		$wp_customize->add_setting( 'related_port_title_limit',
            array(
                'default' => $this->defaults['related_port_title_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_port_title_limit',
            array(
                'label' => __( 'Related Title Limit', 'panpie' ),
                'section' => 'rttheme_gallery_settings',
                'type' => 'number',
				'active_callback'   => 'rttheme_is_related_gallery_enabled',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new PanpieTheme_Gallery_Post_Settings();
}
