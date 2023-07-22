<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */
namespace radiustheme\panpie\Customizer;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class PanpieTheme_Customizer {
	// Get our default values
	protected $defaults;
    protected static $instance = null;

	public function __construct() {
		// Register Panels
		add_action( 'customize_register', array( $this, 'add_customizer_panels' ) );
		// Register sections
		add_action( 'customize_register', array( $this, 'add_customizer_sections' ) );
	}

    public static function instance() {
        if (null == self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function populated_default_data() {
        $this->defaults = rttheme_generate_defaults();
    }

	/**
	 * Customizer Panels
	 */
	public function add_customizer_panels( $wp_customize ) {

	    // Add Layput Panel
		$wp_customize->add_panel( 'rttheme_layouts_defaults',
		 	array(
				'title' => __( 'Layout Settings', 'panpie' ),
				'description' => esc_html__( 'Adjust the overall layout for your site.', 'panpie' ),
				'priority' => 5,
			)
		);

        // Add General Panel
        $wp_customize->add_panel( 'rttheme_blog_settings',
            array(
                'title' => __( 'Blog Settings', 'panpie' ),
                'description' => esc_html__( 'Adjust the overall layout for your site.', 'panpie' ),
                'priority' => 6,
            )
        );
		
		// Add General Panel
        $wp_customize->add_panel( 'rttheme_cpt_settings',
            array(
                'title' => __( 'Custom Posts', 'panpie' ),
                'description' => esc_html__( 'All custom posts settings here.', 'panpie' ),
                'priority' => 7,
            )
        );
		
	}

    /**
    * Customizer sections
    */
	public function add_customizer_sections( $wp_customize ) {

		// Rename the default Colors section
		$wp_customize->get_section( 'colors' )->title = 'Background';

		// Move the default Colors section to our new Colors Panel
		$wp_customize->get_section( 'colors' )->panel = 'colors_panel';

		// Change the Priority of the default Colors section so it's at the top of our Panel
		$wp_customize->get_section( 'colors' )->priority = 10;

		// Add General Section
		$wp_customize->add_section( 'general_section',
			array(
				'title' => __( 'General', 'panpie' ),
				'priority' => 1,
			)
		);
		
		// Add Color Section
		$wp_customize->add_section( 'color_section',
			array(
				'title' => __( 'Color', 'panpie' ),
				'priority' => 2,
			)
		);

		// Add Header Main Section
		$wp_customize->add_section( 'header_section',
			array(
				'title' => __( 'Header', 'panpie' ),
				'priority' => 3,
			)
		);

        // Add Footer Section
        $wp_customize->add_section( 'footer_section',
            array(
                'title' => __( 'Footer', 'panpie' ),
                'priority' => 4,
            )
        );
		
		// Add Footer Section
        $wp_customize->add_section( 'banner_section',
            array(
                'title' => __( 'Banner', 'panpie' ),
                'priority' => 5,
            )
        );
		
        // Add Pages Slug Section		
		$wp_customize->add_section( 'slug_layout_section',
            array(
                'title' => __( 'Post Type Slug', 'panpie' ),
                'priority' => 1,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		// Add Pages Layout Section	
        $wp_customize->add_section( 'page_layout_section',
            array(
                'title' => __( 'Pages Layout', 'panpie' ),
                'priority' => 2,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
        // Add Blog Archive Layout Section
        $wp_customize->add_section( 'blog_layout_section',
            array(
                'title' => __( 'Blog Archive Layout', 'panpie' ),
                'priority' => 3,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Blog Single Layout Section
        $wp_customize->add_section( 'post_single_layout_section',
            array(
                'title' => __( 'Post Single Layout', 'panpie' ),
                'priority' => 4,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Event Archive Layout Section
        $wp_customize->add_section( 'event_layout_section',
            array(
                'title' => __( 'Event Archive Layout', 'panpie' ),
                'priority' => 5,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Event Single Layout Section
        $wp_customize->add_section( 'event_single_layout_section',
            array(
                'title' => __( 'Event Single Layout', 'panpie' ),
                'priority' => 6,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Gallery Archive Layout Section
        $wp_customize->add_section( 'gallery_layout_section',
            array(
                'title' => __( 'Gallery Archive Layout', 'panpie' ),
                'priority' => 7,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Gallery Single Layout Section
        $wp_customize->add_section( 'gallery_single_layout_section',
            array(
                'title' => __( 'Gallery Single Layout', 'panpie' ),
                'priority' => 8,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Team Archive Layout Section
        $wp_customize->add_section( 'team_layout_section',
            array(
                'title' => __( 'Team Archive Layout', 'panpie' ),
                'priority' => 9,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Team Single Layout Section
        $wp_customize->add_section( 'team_single_layout_section',
            array(
                'title' => __( 'Team Single Layout', 'panpie' ),
                'priority' => 10,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Search Layout Section
        $wp_customize->add_section( 'search_layout_section',
            array(
                'title' => __( 'Search Layout', 'panpie' ),
                'priority' => 11,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Error Layout Section
        $wp_customize->add_section( 'error_layout_section',
            array(
                'title' => __( 'Error Layout', 'panpie' ),
                'priority' => 12,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Shop Archive Layout Section
        $wp_customize->add_section( 'wc_shop_layout_section',
            array(
                'title' => __( 'Shop Archive Layout', 'panpie' ),
                'priority' => 13,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Shop Single Layout Section
        $wp_customize->add_section( 'wc_product_layout_section',
            array(
                'title' => __( 'Product Single Layout', 'panpie' ),
                'priority' => 14,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
        // Add Blog Settings Section -------------------------
        $wp_customize->add_section( 'blog_post_settings_section',
            array(
                'title' => __( 'Blog Settings', 'panpie' ),
                'priority' => 7,
                'panel' => 'rttheme_blog_settings',
            )
        );
        // Add Single Blog Settings Section
        $wp_customize->add_section( 'single_post_secttings_section',
            array(
                'title' => __( 'Post Settings', 'panpie' ),
                'priority' => 8,
                'panel' => 'rttheme_blog_settings',
            )
        );
		// Add Single Share Settings Section
        $wp_customize->add_section( 'single_post_share_section',
            array(
                'title' => __( 'Post Share', 'panpie' ),
                'priority' => 9,
                'panel' => 'rttheme_blog_settings',
            )
        );
		
		// Add Gallery Section
        $wp_customize->add_section( 'rttheme_gallery_settings',
            array(
                'title' => __( 'Gallery Setting', 'panpie' ),
                'priority' => 10,
				'panel' => 'rttheme_cpt_settings',
            )
        );
		
		// Add Team Section
        $wp_customize->add_section( 'rttheme_team_settings',
            array(
                'title' => __( 'Team Setting', 'panpie' ),
                'priority' => 11,
				'panel' => 'rttheme_cpt_settings',
            )
        );
		// Add Event Section
        $wp_customize->add_section( 'rttheme_event_settings',
            array(
                'title' => __( 'Event Setting', 'panpie' ),
                'priority' => 12,
				'panel' => 'rttheme_cpt_settings',
            )
        ); 
        
        // Add Error Page Section
        $wp_customize->add_section( 'error_section',
            array(
                'title' => __( 'Error Page', 'panpie' ),
                'priority' => 13,
            )
        );
		
		// Add Woocommerce Page Section
        $wp_customize->add_section( 'wc_shop_page_settings',
            array(
                'title' => __( 'Product Shop Page', 'panpie' ),
                'priority' => 1,
				'panel' => 'woocommerce',
            )
        );
		
		// Add Woocommerce product single Section
        $wp_customize->add_section( 'wc_product_page_settings',
            array(
                'title' => __( 'Product Single Page', 'panpie' ),
                'priority' => 2,
				'panel' => 'woocommerce',
            )
        );

	}

}
