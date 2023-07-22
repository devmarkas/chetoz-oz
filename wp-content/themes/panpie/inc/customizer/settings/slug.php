<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\panpie\Customizer\Settings;

use radiustheme\panpie\Customizer\PanpieTheme_Customizer;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class PanpieTheme_Slug_Settings extends PanpieTheme_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_slug_controls' ) );
	}

    public function register_slug_controls( $wp_customize ) {
	
		$wp_customize->add_setting( 'team_slug',
            array(
                'default' => $this->defaults['team_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'team_slug',
            array(
                'label' => __( 'Team Slug', 'panpie' ),
                'section' => 'slug_layout_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'event_slug',
            array(
                'default' => $this->defaults['event_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'event_slug',
            array(
                'label' => __( 'Event Slug', 'panpie' ),
                'section' => 'slug_layout_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'gallery_slug',
            array(
                'default' => $this->defaults['gallery_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'gallery_slug',
            array(
                'label' => __( 'Gallery Slug', 'panpie' ),
                'section' => 'slug_layout_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'testimonial_slug',
            array(
                'default' => $this->defaults['testimonial_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'testimonial_slug',
            array(
                'label' => __( 'Testimonial Slug', 'panpie' ),
                'section' => 'slug_layout_section',
                'type' => 'text',
            )
        );
		
		// Category
		$wp_customize->add_setting( 'team_cat_slug',
            array(
                'default' => $this->defaults['team_cat_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'team_cat_slug',
            array(
                'label' => __( 'Team Category Slug', 'panpie' ),
                'section' => 'slug_layout_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'event_cat_slug',
            array(
                'default' => $this->defaults['event_cat_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'event_cat_slug',
            array(
                'label' => __( 'Event Category Slug', 'panpie' ),
                'section' => 'slug_layout_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'gallery_cat_slug',
            array(
                'default' => $this->defaults['gallery_cat_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'gallery_cat_slug',
            array(
                'label' => __( 'Gallery Category Slug', 'panpie' ),
                'section' => 'slug_layout_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'testim_cat_slug',
            array(
                'default' => $this->defaults['testim_cat_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'testim_cat_slug',
            array(
                'label' => __( 'Testimonial Category Slug', 'panpie' ),
                'section' => 'slug_layout_section',
                'type' => 'text',
            )
        );	
        

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new PanpieTheme_Slug_Settings();
}
