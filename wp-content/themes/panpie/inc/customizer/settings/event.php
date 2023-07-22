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
class PanpieTheme_Event_Post_Settings extends PanpieTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_event_post_controls' ) );
	}

    /**
     * Gallery Post Controls
     */
    public function register_event_post_controls( $wp_customize ) {
		
		$wp_customize->add_setting( 'events_style',
            array(
                'default' => $this->defaults['events_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'events_style',
            array(
                'label' => __( 'Event Archive Layout', 'panpie' ),
                'description' => esc_html__( 'Select the Event layout for gallery page', 'panpie' ),
                'section' => 'rttheme_event_settings',
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
        $wp_customize->add_setting( 'event_excerpt_limit',
            array(
                'default' => $this->defaults['event_excerpt_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'event_excerpt_limit',
            array(
                'label' => __( 'Event Content Limit', 'panpie' ),
                'section' => 'rttheme_event_settings',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'event_ar_address',
            array(
                'default' => $this->defaults['event_ar_address'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_ar_address',
            array(
                'label' => __( 'Event Adress', 'panpie' ),
                'section' => 'rttheme_event_settings',
            )
        ));
		
		$wp_customize->add_setting( 'event_ar_phone',
            array(
                'default' => $this->defaults['event_ar_phone'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_ar_phone',
            array(
                'label' => __( 'Event Phone', 'panpie' ),
                'section' => 'rttheme_event_settings',
            )
        ));
		
		$wp_customize->add_setting( 'event_ar_button',
            array(
                'default' => $this->defaults['event_ar_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_ar_button',
            array(
                'label' => __( 'Event Button', 'panpie' ),
                'section' => 'rttheme_event_settings',
            )
        ));
		
		// Single Gallery Post
		$wp_customize->add_setting('event_single_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'event_single_heading', array(
            'label' => __( 'Single Event Info', 'panpie' ),
            'section' => 'rttheme_event_settings',
        )));
		
		$wp_customize->add_setting( 'event_title',
            array(
                'default' => $this->defaults['event_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_title',
            array(
                'label' => __( 'Event Title', 'panpie' ),
                'section' => 'rttheme_event_settings',
            )
        ));
		
		$wp_customize->add_setting( 'event_text',
            array(
                'default' => $this->defaults['event_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_text',
            array(
                'label' => __( 'Event Text', 'panpie' ),
                'section' => 'rttheme_event_settings',
            )
        ));
		
		$wp_customize->add_setting( 'event_address',
            array(
                'default' => $this->defaults['event_address'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_address',
            array(
                'label' => __( 'Event Address', 'panpie' ),
                'section' => 'rttheme_event_settings',
            )
        ));
		
		$wp_customize->add_setting( 'event_phone',
            array(
                'default' => $this->defaults['event_phone'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_phone',
            array(
                'label' => __( 'Event Phone', 'panpie' ),
                'section' => 'rttheme_event_settings',
            )
        ));
		
		$wp_customize->add_setting( 'event_mail',
            array(
                'default' => $this->defaults['event_mail'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_mail',
            array(
                'label' => __( 'Event Email', 'panpie' ),
                'section' => 'rttheme_event_settings',
            )
        ));
		
		$wp_customize->add_setting( 'event_open',
            array(
                'default' => $this->defaults['event_open'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_open',
            array(
                'label' => __( 'Open Day', 'panpie' ),
                'section' => 'rttheme_event_settings',
            )
        ));
		
		$wp_customize->add_setting( 'event_button',
            array(
                'default' => $this->defaults['event_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_button',
            array(
                'label' => __( 'Event Button', 'panpie' ),
                'section' => 'rttheme_event_settings',
            )
        ));
		
		// Related Gallery Post
		$wp_customize->add_setting('event_related_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'event_related_heading', array(
            'label' => __( 'Related Event Settings', 'panpie' ),
            'section' => 'rttheme_event_settings',
        )));
		
		$wp_customize->add_setting( 'show_related_event',
            array(
                'default' => $this->defaults['show_related_event'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_related_event',
            array(
                'label' => __( 'Show Related Event', 'panpie' ),
                'section' => 'rttheme_event_settings',
            )
        ));
		
		$wp_customize->add_setting( 'event_related_title',
            array(
                'default' => $this->defaults['event_related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'event_related_title',
            array(
                'label' => __( 'Related Title', 'panpie' ),
                'section' => 'rttheme_event_settings',
                'type' => 'text',
				'active_callback'   => 'rttheme_is_related_event_enabled',
            )
        );
		
		$wp_customize->add_setting( 'event_view',
            array(
                'default' => $this->defaults['event_view'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_view',
            array(
                'label' => __( 'Show View', 'panpie' ),
                'section' => 'rttheme_event_settings',
				'active_callback'   => 'rttheme_is_related_event_enabled',
            )
        ));
		
		$wp_customize->add_setting( 'event_link',
            array(
                'default' => $this->defaults['event_link'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_link',
            array(
                'label' => __( 'Show Link', 'panpie' ),
                'section' => 'rttheme_event_settings',
				'active_callback'   => 'rttheme_is_related_event_enabled',
            )
        ));
		
		$wp_customize->add_setting( 'related_event_number',
            array(
                'default' => $this->defaults['related_event_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_event_number',
            array(
                'label' => __( 'Event Post', 'panpie' ),
                'section' => 'rttheme_event_settings',
                'type' => 'number',
				'active_callback'   => 'rttheme_is_related_event_enabled',
            )
        );
		
		$wp_customize->add_setting( 'related_event_title_limit',
            array(
                'default' => $this->defaults['related_event_title_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_event_title_limit',
            array(
                'label' => __( 'Title Limit', 'panpie' ),
                'section' => 'rttheme_event_settings',
                'type' => 'number',
				'active_callback'   => 'rttheme_is_related_event_enabled',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new PanpieTheme_Event_Post_Settings();
}
