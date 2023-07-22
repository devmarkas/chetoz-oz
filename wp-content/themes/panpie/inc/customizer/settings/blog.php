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

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class PanpieTheme_Blog_Post_Settings extends PanpieTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_blog_post_controls' ) );
	}

    /**
     * Blog Post Controls
     */
    public function register_blog_post_controls( $wp_customize ) {

        // Blog Post Style
        $wp_customize->add_setting( 'blog_style',
            array(
                'default' => $this->defaults['blog_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );

        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'blog_style',
            array(
                'label' => __( 'Blog/Archive Layout', 'panpie' ),
                'description' => esc_html__( 'Blog Post layout variation you can selecr and use.', 'panpie' ),
                'section' => 'blog_post_settings_section',
                'choices' => array(
                    'style1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 1', 'panpie' )
                    ),
                    'style2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog3.png',
                        'name' => __( 'Layout 2', 'panpie' )
                    ),
                )
            )
        ) );
		
		
		$wp_customize->add_setting( 'post_content_limit',
            array(
                'default' => $this->defaults['post_content_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'post_content_limit',
            array(
                'label' => __( 'Blog Content Limit', 'panpie' ),
                'section' => 'blog_post_settings_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'post_content_limit',
            array(
                'default' => $this->defaults['post_content_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'post_content_limit',
            array(
                'label' => __( 'Blog Content Limit', 'panpie' ),
                'section' => 'blog_post_settings_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'blog_content',
            array(
                'default' => $this->defaults['blog_content'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_content',
            array(
                'label' => __( 'Show Content', 'panpie' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_date',
            array(
                'default' => $this->defaults['blog_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_date',
            array(
                'label' => __( 'Show Date', 'panpie' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_author_name',
            array(
                'default' => $this->defaults['blog_author_name'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_author_name',
            array(
                'label' => __( 'Show Author', 'panpie' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_comment_num',
            array(
                'default' => $this->defaults['blog_comment_num'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_comment_num',
            array(
                'label' => __( 'Show Comment', 'panpie' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_cats',
            array(
                'default' => $this->defaults['blog_cats'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_cats',
            array(
                'label' => __( 'Show Category', 'panpie' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_view',
            array(
                'default' => $this->defaults['blog_view'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_view',
            array(
                'label' => __( 'Show Views', 'panpie' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_length',
            array(
                'default' => $this->defaults['blog_length'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_length',
            array(
                'label' => __( 'Show Reading Length', 'panpie' ),
                'section' => 'blog_post_settings_section',
            )
        ) );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new PanpieTheme_Blog_Post_Settings();
}
