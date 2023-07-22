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
use radiustheme\panpie\Customizer\Controls\Customizer_Heading_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class PanpieTheme_WooCommerce_Shop_Settings extends PanpieTheme_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_shop_page_controls' ) );
	}
	
	/*show the variation list*/
	public function get_wc_attribute() {
		$list_dropdown = [];
		if ( class_exists('WooCommerce') ){
			$lists = wp_list_pluck(wc_get_attribute_taxonomies(), 'attribute_label', 'attribute_name');
			$list_dropdown = array( '0' => esc_html__( 'Select Variation', 'panpie' ) );
			foreach ( $lists as $key=>$value ) {
			$list_dropdown[$key] = $value;
			}
		}
		return $list_dropdown;
	}

    public function register_shop_page_controls( $wp_customize ) {
		
		$wp_customize->add_setting( 'wc_archive_layouts',
            array(
                'default' => $this->defaults['wc_archive_layouts'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'wc_archive_layouts',
            array(
                'label' => __( 'Product Archive Style', 'panpie' ),
                'section' => 'wc_shop_page_settings',
                'description' => esc_html__( 'Select the default template layout for Pages', 'panpie' ),
                'type' => 'select',
                'choices' => array(
                    'panpiestyle' => esc_html__( 'Panpie Special Style', 'panpie' ),
                    'regular' => esc_html__( 'Regular Style', 'panpie' ),
                ),
            )
        );
		
		$wp_customize->add_setting( 'wc_num_product',
            array(
                'default' => $this->defaults['wc_num_product'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'wc_num_product',
            array(
                'label' => __( 'Number of Products Per Page', 'panpie' ),
                'section' => 'wc_shop_page_settings',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'wc_num_product_shop_page',
            array(
                'default' => $this->defaults['wc_num_product_shop_page'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'wc_num_product_shop_page',
            array(
                'label' => __( 'Number of Products on Shop Page', 'panpie' ),
                'section' => 'wc_shop_page_settings',
                'type' => 'number',
            )
        );
		
		// Special Attribute (add)
		
        $wp_customize->add_setting( 'wc_attribute_limit',
            array(
                'default' => $this->defaults['wc_attribute_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'wc_attribute_limit',
            array(
                'label' => __( 'Product Attribute Limit', 'panpie' ),
                'section' => 'wc_shop_page_settings',
                'description' => esc_html__( 'Note: This is not attribute item.', 'panpie' ),
                'type' => 'select',
                'choices' => array(
                    1 => esc_html__( '1', 'panpie' ), 
                    2 => esc_html__( '2', 'panpie' ), 
                    3 => esc_html__( '3', 'panpie' ), 
                    4 => esc_html__( '4', 'panpie' ),  
                    5 => esc_html__( '5', 'panpie' ),  
                ),
            )
        );  
		
		$wp_customize->add_setting( 'wc_show_title',
            array(
                'default' => $this->defaults['wc_show_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_show_title',
            array(
                'label' => __( 'Show/Hide Title', 'panpie' ),
                'section' => 'wc_shop_page_settings',
            )
        ));
		
		$wp_customize->add_setting( 'wc_show_price',
            array(
                'default' => $this->defaults['wc_show_price'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_show_price',
            array(
                'label' => __( 'Show/Hide Price', 'panpie' ),
                'section' => 'wc_shop_page_settings',
            )
        ));
		
		$wp_customize->add_setting( 'wc_show_cart',
            array(
                'default' => $this->defaults['wc_show_cart'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_show_cart',
            array(
                'label' => __( 'Show/Hide Cart', 'panpie' ),
                'section' => 'wc_shop_page_settings',
            )
        ));
		
		$wp_customize->add_setting( 'wc_show_excerpt',
            array(
                'default' => $this->defaults['wc_show_excerpt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_show_excerpt',
            array(
                'label' => __( 'Show/Hide Excerpt', 'panpie' ),
                'section' => 'wc_shop_page_settings',
            )
        ));
		
		$wp_customize->add_setting( 'wc_show_excerpt_limit',
            array(
                'default' => $this->defaults['wc_show_excerpt_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'wc_show_excerpt_limit',
            array(
                'label' => __( 'Number of text on Excerpt', 'panpie' ),
                'section' => 'wc_shop_page_settings',
                'type' => 'number',
            )
        );
		
		// Product Box Style in Shop Page
        $wp_customize->add_setting( 'wc_block_layouts',
            array(
                'default' => $this->defaults['wc_block_layouts'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'wc_block_layouts',
            array(
                'label' => __( 'Product Box Style in Shop Page', 'panpie' ),
                'section' => 'wc_shop_page_settings',
                'description' => esc_html__( 'Select the default template layout for Pages', 'panpie' ),
                'type' => 'select',
                'choices' => array(
                    'panpiestyle' => esc_html__( 'Panpie Special Style 1', 'panpie' ),
                    'panpiestyle2' => esc_html__( 'Panpie Special Style 2', 'panpie' ),
                    'panpiestyle3' => esc_html__( 'Panpie Special Style 3', 'panpie' ),
                    'panpiestyle4' => esc_html__( 'Panpie Special Style 4', 'panpie' ),
                ),
            )
        );
		
		// Single product page layout settings
		$wp_customize->add_setting('wc_product_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'wc_product_heading', array(
            'label' => __( 'Product Single Page', 'panpie' ),
            'section' => 'wc_product_page_settings',
        )));
		
		$wp_customize->add_setting( 'wc_sku',
            array(
                'default' => $this->defaults['wc_sku'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_sku',
            array(
                'label' => __( 'Show/Hide SKU', 'panpie' ),
                'section' => 'wc_product_page_settings',
            )
        ));
		
		$wp_customize->add_setting( 'wc_cats',
            array(
                'default' => $this->defaults['wc_cats'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_cats',
            array(
                'label' => __( 'Show/Hide Categories', 'panpie' ),
                'section' => 'wc_product_page_settings',
            )
        ));
		
		$wp_customize->add_setting( 'wc_tags',
            array(
                'default' => $this->defaults['wc_tags'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_tags',
            array(
                'label' => __( 'Show/Hide Tags', 'panpie' ),
                'section' => 'wc_product_page_settings',
            )
        ));
		
		$wp_customize->add_setting( 'wc_share',
            array(
                'default' => $this->defaults['wc_share'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_share',
            array(
                'label' => __( 'Show/Hide Share', 'panpie' ),
                'section' => 'wc_product_page_settings',
            )
        ));
		
		$wp_customize->add_setting( 'wc_related',
            array(
                'default' => $this->defaults['wc_related'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_related',
            array(
                'label' => __( 'Related Products', 'panpie' ),
                'section' => 'wc_product_page_settings',
            )
        ));
		
		$wp_customize->add_setting( 'wc_description',
            array(
                'default' => $this->defaults['wc_description'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_description',
            array(
                'label' => __( 'Description Tab', 'panpie' ),
                'section' => 'wc_product_page_settings',
            )
        ));
		
		$wp_customize->add_setting( 'wc_reviews',
            array(
                'default' => $this->defaults['wc_reviews'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_reviews',
            array(
                'label' => __( 'Reviews Tab', 'panpie' ),
                'section' => 'wc_product_page_settings',
            )
        ));
		
		$wp_customize->add_setting( 'wc_additional_info',
            array(
                'default' => $this->defaults['wc_additional_info'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_additional_info',
            array(
                'label' => __( 'Additional Information Tab', 'panpie' ),
                'section' => 'wc_product_page_settings',
            )
        ));
		
		$wp_customize->add_setting( 'wc_related_title',
            array(
                'default' => $this->defaults['wc_related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'wc_related_title',
            array(
                'label' => __( 'Related Title', 'panpie' ),
                'section' => 'wc_product_page_settings',
                'type' => 'text',
            )
        );		
		
		$wp_customize->add_setting( 'wc_cross_sell',
            array(
                'default' => $this->defaults['wc_cross_sell'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_cross_sell',
            array(
                'label' => __( 'Cross Sell Products', 'panpie' ),
                'section' => 'wc_product_page_settings',
            )
        ));

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new PanpieTheme_WooCommerce_Shop_Settings();
}
