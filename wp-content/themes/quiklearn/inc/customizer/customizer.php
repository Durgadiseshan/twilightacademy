<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.1
 */
namespace radiustheme\quiklearn\Customizer;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class QuiklearnTheme_Customizer {
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

        // Add General Panel
        $wp_customize->add_panel( 'rttheme_general_panel',
            array(
                'title' => __( 'General', 'quiklearn' ),
                'description' => esc_html__( 'Adjust the overall layout for your site.', 'quiklearn' ),
                'priority' => 1,
            )
        );

        // Add Header Panel
        $wp_customize->add_panel( 'rttheme_header_panel',
            array(
                'title' => __( 'Header', 'quiklearn' ),
                'description' => esc_html__( 'Adjust the overall layout for your site.', 'quiklearn' ),
                'priority' => 2,
            )
        );        

        // Add Color Section
        $wp_customize->add_panel( 'rttheme_color_panel',
            array(
                'title' => __( 'Color', 'quiklearn' ),
                'description' => esc_html__( 'Adjust the overall layout for your site.', 'quiklearn' ),
                'priority' => 4,
            )
        );

	    // Add Layput Panel
		$wp_customize->add_panel( 'rttheme_layouts_defaults',
		 	array(
				'title' => __( 'Layout Settings', 'quiklearn' ),
				'description' => esc_html__( 'Adjust the overall layout for your site.', 'quiklearn' ),
				'priority' => 9,
			)
		);

        // Add General Panel
        $wp_customize->add_panel( 'rttheme_blog_settings',
            array(
                'title' => __( 'Blog Settings', 'quiklearn' ),
                'description' => esc_html__( 'Adjust the overall layout for your site.', 'quiklearn' ),
                'priority' => 10,
            )
        );
		
		// Add General Panel
        $wp_customize->add_panel( 'rttheme_cpt_settings',
            array(
                'title' => __( 'Custom Posts', 'quiklearn' ),
                'description' => esc_html__( 'All custom posts settings here.', 'quiklearn' ),
                'priority' => 12,
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

		// Add Logo Section
        $wp_customize->add_section( 'logo_section',
            array(
                'title' => __( 'Theme Logo', 'quiklearn' ),
                'priority' => 1,
                'panel' => 'rttheme_general_panel',
            )
        );  
        // Add Information Section
        $wp_customize->add_section( 'control_section',
            array(
                'title' => __( 'Theme Control', 'quiklearn' ),
                'priority' => 2,
                'panel' => 'rttheme_general_panel',
            )
        ); 
        // Add General Section
        $wp_customize->add_section( 'general_section',
            array(
                'title' => __( 'Theme General', 'quiklearn' ),
                'priority' => 3,
                'panel' => 'rttheme_general_panel',
            )
        ); 
        // Add Social Section
        $wp_customize->add_section( 'social_section',
            array(
                'title' => __( 'Theme Social', 'quiklearn' ),
                'priority' => 4,
                'panel' => 'rttheme_general_panel',
            )
        );  

        // Add Header Top Section
        $wp_customize->add_section( 'header_top_section',
            array(
                'title' => __( 'Header Top', 'quiklearn' ),
                'priority' => 1,
                'panel' => 'rttheme_header_panel',
            )
        );
        // Add Header Main Section
        $wp_customize->add_section( 'header_section',
            array(
                'title' => __( 'Header Main', 'quiklearn' ),
                'priority' => 2,
                'panel' => 'rttheme_header_panel',
            )
        );
        // Add Header Mobile Section
        $wp_customize->add_section( 'header_mobile_section',
            array(
                'title' => __( 'Header Mobile', 'quiklearn' ),
                'priority' => 3,
                'panel' => 'rttheme_header_panel',
            )
        );        

        // Add Footer Section
        $wp_customize->add_section( 'footer_section',
            array(
                'title' => __( 'Footer', 'quiklearn' ),
                'priority' => 3,
            )
        );

        // Add Color Main Section
        $wp_customize->add_section( 'color_main_section',
            array(
                'title' => __( 'Color Main', 'quiklearn' ),
                'priority' => 1,
                'panel' => 'rttheme_color_panel',
            )
        );

        // Add Color Menu Section
        $wp_customize->add_section( 'color_menu_section',
            array(
                'title' => __( 'Color Menu', 'quiklearn' ),
                'priority' => 2,
                'panel' => 'rttheme_color_panel',
            )
        );

        // Add Color Main Section
        $wp_customize->add_section( 'color_dark_section',
            array(
                'title' => __( 'Color Dark', 'quiklearn' ),
                'priority' => 3,
                'panel' => 'rttheme_color_panel',
            )
        );

        // Add News Ticker Section
        $wp_customize->add_section( 'reading_progress_bar_section',
            array(
                'title' => __( 'Progress Bar', 'quiklearn' ),
                'priority' => 6,
            )
        );        
		
		// Add Footer Section
        $wp_customize->add_section( 'banner_section',
            array(
                'title' => __( 'Banner', 'quiklearn' ),
                'priority' => 7,
            )
        );
		
		// Add Pages Layout Section	
        $wp_customize->add_section( 'page_layout_section',
            array(
                'title' => __( 'Pages Layout', 'quiklearn' ),
                'priority' => 2,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
        // Add Blog Archive Layout Section
        $wp_customize->add_section( 'blog_layout_section',
            array(
                'title' => __( 'Blog Archive Layout', 'quiklearn' ),
                'priority' => 3,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Blog Single Layout Section
        $wp_customize->add_section( 'post_single_layout_section',
            array(
                'title' => __( 'Post Single Layout', 'quiklearn' ),
                'priority' => 4,
                'panel' => 'rttheme_layouts_defaults',
            )
        );

        // Add Event Layout Section
        $wp_customize->add_section( 'event_layout_section',
            array(
                'title' => __( 'Event Archive Layout', 'quiklearn' ),
                'priority' => 7,
                'panel' => 'rttheme_layouts_defaults',
            )
        );

        // Add Event Single Layout Section
        $wp_customize->add_section( 'event_single_layout_section',
            array(
                'title' => __( 'Event Single Layout', 'quiklearn' ),
                'priority' => 8,
                'panel' => 'rttheme_layouts_defaults',
            )
        );

        // Add Course Archive Layout Section
        $wp_customize->add_section( 'course_layout_section',
            array(
                'title' => __( 'Course Archive Layout', 'quiklearn' ),
                'priority' => 12,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
        
        // Add Course Single Layout Section
        $wp_customize->add_section( 'course_single_layout_section',
            array(
                'title' => __( 'Course Single Layout', 'quiklearn' ),
                'priority' => 13,
                'panel' => 'rttheme_layouts_defaults',
            )
        );  
        
        // Add Shop Archive Layout Section
        $wp_customize->add_section( 'wc_shop_layout_section',
            array(
                'title' => __( 'Shop Archive Layout', 'quiklearn' ),
                'priority' => 14,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
        
        // Add Shop Single Layout Section
        $wp_customize->add_section( 'wc_product_layout_section',
            array(
                'title' => __( 'Product Single Layout', 'quiklearn' ),
                'priority' => 15,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Search Layout Section
        $wp_customize->add_section( 'search_layout_section',
            array(
                'title' => __( 'Search Layout', 'quiklearn' ),
                'priority' => 16,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		
		// Add Error Layout Section
        $wp_customize->add_section( 'error_layout_section',
            array(
                'title' => __( 'Error Layout', 'quiklearn' ),
                'priority' => 17,
                'panel' => 'rttheme_layouts_defaults',
            )
        );
		     
		
        // Add Blog Settings Section -------------------------
        $wp_customize->add_section( 'blog_post_settings_section',
            array(
                'title' => __( 'Blog Settings', 'quiklearn' ),
                'priority' => 10,
                'panel' => 'rttheme_blog_settings',
            )
        );
        // Add Single Blog Settings Section
        $wp_customize->add_section( 'single_post_secttings_section',
            array(
                'title' => __( 'Post Settings', 'quiklearn' ),
                'priority' => 12,
                'panel' => 'rttheme_blog_settings',
            )
        );
		// Add Single Share Settings Section
        $wp_customize->add_section( 'single_post_share_section',
            array(
                'title' => __( 'Post Share', 'quiklearn' ),
                'priority' => 13,
                'panel' => 'rttheme_blog_settings',
            )
        );
		
        // Add Event Section
        $wp_customize->add_section( 'rttheme_event_settings',
            array(
                'title' => __( 'Event Setting', 'quiklearn' ),
                'priority' => 2,
                'panel' => 'rttheme_cpt_settings',
            )
        );
        // Add Course Section
        $wp_customize->add_section( 'rttheme_course_settings',
            array(
                'title' => __( 'Course Archive Setting', 'quiklearn' ),
                'priority' => 3,
                'panel' => 'rttheme_cpt_settings',
            )
        );
        // Add Course Single Section
        $wp_customize->add_section( 'rttheme_course_single_settings',
            array(
                'title' => __( 'Course Single General', 'quiklearn' ),
                'priority' => 4,
                'panel' => 'rttheme_cpt_settings',
            )
        );
        // Add Course Single Option Section
        $wp_customize->add_section( 'rttheme_course_single_option_settings',
            array(
                'title' => __( 'Course Single Option', 'quiklearn' ),
                'priority' => 5,
                'panel' => 'rttheme_cpt_settings',
            )
        );
        // Add Course Single Share Option Section
        $wp_customize->add_section( 'rttheme_course_single_share_option_settings',
            array(
                'title' => __( 'Course Single Share Option', 'quiklearn' ),
                'priority' => 6,
                'panel' => 'rttheme_cpt_settings',
            )
        );

        // Add Error Page Section
        $wp_customize->add_section( 'error_section',
            array(
                'title' => __( 'Error Page', 'quiklearn' ),
                'priority' => 16,
            )
        );

        // Add our wooCommerce shop Section
        $wp_customize->add_section('shop_layout_section',
            array(
               'title'    => esc_html__('Shop Archive Layout', 'quiklearn'),
               'priority' => 1,
               'panel'    => 'woocommerce',
            )
        );
        
        // Add our wooCommerce product Section
        $wp_customize->add_section('product_layout_section',
            array(
               'title'    => esc_html__('Shop Single Layout', 'quiklearn'),
               'priority' => 2,
               'panel'    => 'woocommerce',
            )
        );

	}

}
