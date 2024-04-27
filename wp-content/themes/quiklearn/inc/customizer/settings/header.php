<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\quiklearn\Customizer\Settings;
use radiustheme\quiklearn\Customizer\QuiklearnTheme_Customizer;
use radiustheme\quiklearn\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\quiklearn\Customizer\Controls\Customizer_Heading_Control;
use radiustheme\quiklearn\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class QuiklearnTheme_Header_Settings extends QuiklearnTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_header_controls' ) );
	}

    public function register_header_controls( $wp_customize ) {
		
		// Top Bar Style
		$wp_customize->add_setting( 'top_bar',
            array(
                'default' => $this->defaults['top_bar'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'top_bar',
            array(
                'label' => __( 'Top Bar On/Off', 'quiklearn' ),
                'section' => 'header_top_section',
            )
        ) );
		
        $wp_customize->add_setting( 'top_bar_style',
            array(
                'default' => $this->defaults['top_bar_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',

            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'top_bar_style',
            array(
                'label' => __( 'Top Bar Layout', 'quiklearn' ),
                'description' => esc_html__( 'You can override this settings only Mobile', 'quiklearn' ),
                'section' => 'header_top_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-1.jpg',
                        'name' => __( 'Layout 1', 'quiklearn' )
                    ), 
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-2.jpg',
                        'name' => __( 'Layout 2', 'quiklearn' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-3.jpg',
                        'name' => __( 'Layout 3', 'quiklearn' )
                    ),
                    '4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-4.jpg',
                        'name' => __( 'Layout 4', 'quiklearn' )
                    ),
                ),
                'active_callback'   => 'rttheme_is_topbar_enabled',
            )
        ) );       

		// Topbar one option
		$wp_customize->add_setting('top_bar_bgcolor', 
            array(
                'default' => $this->defaults['top_bar_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_bgcolor',
            array(
                'label' => esc_html__('Top Bar Background Color', 'quiklearn'),
                'section' => 'header_top_section', 
				'active_callback'   => 'rttheme_is_topbar_enabled', 	
            )
        ));
		
		$wp_customize->add_setting('top_bar_color', 
            array(
                'default' => $this->defaults['top_bar_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_bar_color',
            array(
                'label' => esc_html__('Top Bar Text Color', 'quiklearn'),
                'section' => 'header_top_section', 
				'active_callback'   => 'rttheme_is_topbar_enabled', 	
            )
        ));
        
        $wp_customize->add_setting('top_link_color', 
            array(
                'default' => $this->defaults['top_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_link_color',
            array(
                'label' => esc_html__('Top Bar Link Color', 'quiklearn'),
                'section' => 'header_top_section', 
                'active_callback'   => 'rttheme_is_topbar_enabled',    
            )
        ));
		
		$wp_customize->add_setting('top_hover_color', 
            array(
                'default' => $this->defaults['top_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_hover_color',
            array(
                'label' => esc_html__('Top Bar Hover Color', 'quiklearn'),
                'section' => 'header_top_section', 
				'active_callback'   => 'rttheme_is_topbar_enabled', 	
            )
        ));

        /**
         * Heading for Header Variation
         */
        $wp_customize->add_setting('header_variation_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'header_variation_heading', array(
            'label' => __( 'Header Variation', 'quiklearn' ),
            'section' => 'header_section',
        )));
        
        $wp_customize->add_setting( 'header_opt',
            array(
                'default' => $this->defaults['header_opt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'header_opt',
            array(
                'label' => __( 'Header On/Off', 'quiklearn' ),
                'section' => 'header_section',
            )
        ) );
		
		$wp_customize->add_setting( 'sticky_menu',
            array(
                'default' => $this->defaults['sticky_menu'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'sticky_menu',
            array(
                'label' => __( 'Sticky Header', 'quiklearn' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'tr_header',
            array(
                'default' => $this->defaults['tr_header'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'tr_header',
            array(
                'label' => __( 'Transparent Header', 'quiklearn' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting('header_bg_color', 
            array(
                'default' => $this->defaults['header_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color',
            array(
                'label' => esc_html__('Header Background Color', 'quiklearn'),
                'section' => 'header_section', 
            )
        ));

        // Header Style
        $wp_customize->add_setting( 'header_style',
            array(
                'default' => $this->defaults['header_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'header_style',
            array(
                'label' => __( 'Header Layout', 'quiklearn' ),
                'description' => esc_html__( 'You can override this settings only Mobile', 'quiklearn' ),
                'section' => 'header_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-1.jpg',
                        'name' => __( 'Layout 1', 'quiklearn' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-2.jpg',
                        'name' => __( 'Layout 2', 'quiklearn' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-3.jpg',
                        'name' => __( 'Layout 3', 'quiklearn' )
                    ),
                    '4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-4.jpg',
                        'name' => __( 'Layout 4', 'quiklearn' )
                    ),
                )
            )
        ) );

        //Header Action
		$wp_customize->add_setting( 'search_icon',
            array(
                'default' => $this->defaults['search_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'search_icon',
            array(
                'label' => __( 'Search Icon', 'quiklearn' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'search_filter',
            array(
                'default' => $this->defaults['search_filter'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'search_filter',
            array(
                'label' => __( 'Search Filter', 'quiklearn' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'all_category',
            array(
                'default' => $this->defaults['all_category'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'all_category',
            array(
                'label' => __( 'All Category', 'quiklearn' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'cart_icon',
            array(
                'default' => $this->defaults['cart_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'cart_icon',
            array(
                'label' => __( 'Woo Cart Icon', 'quiklearn' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'wishlist_icon',
            array(
                'default' => $this->defaults['wishlist_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wishlist_icon',
            array(
                'label' => __( 'Woo Wishlist Icon', 'quiklearn' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'vertical_menu_icon',
            array(
                'default' => $this->defaults['vertical_menu_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'vertical_menu_icon',
            array(
                'label' => __( 'Vertical Menu Icon', 'quiklearn' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'address_icon',
            array(
                'default' => $this->defaults['address_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'address_icon',
            array(
                'label' => __( 'Address', 'quiklearn' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'phone_icon',
            array(
                'default' => $this->defaults['phone_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'phone_icon',
            array(
                'label' => __( 'Phone', 'quiklearn' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'email_icon',
            array(
                'default' => $this->defaults['email_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'email_icon',
            array(
                'label' => __( 'Email', 'quiklearn' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'opening_icon',
            array(
                'default' => $this->defaults['opening_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'opening_icon',
            array(
                'label' => __( 'Opening', 'quiklearn' ),
                'section' => 'header_section',
            )
        ) );

        /*header button*/
        $wp_customize->add_setting( 'profile_button',
            array(
                'default' => $this->defaults['profile_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'profile_button',
            array(
                'label' => __( 'Profile Button', 'quiklearn' ),
                'section' => 'header_section',
            )
        ) );
        
        $wp_customize->add_setting( 'profile_button_text',
            array(
                'default' => $this->defaults['profile_button_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'profile_button_text',
            array(
                'label' => __( 'Button Text', 'quiklearn' ),
                'section' => 'header_section',
                'type' => 'text',
                'active_callback'   => 'rttheme_is_button_enabled',
            )
        );
        
        $wp_customize->add_setting( 'profile_button_link',
            array(
                'default' => $this->defaults['profile_button_link'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'profile_button_link',
            array(
                'label' => __( 'Button Link', 'quiklearn' ),
                'section' => 'header_section',
                'type' => 'url',
                'active_callback'   => 'rttheme_is_button_enabled',
            )
        );

        /*Header Login*/
        $wp_customize->add_setting( 'login_button',
            array(
                'default' => $this->defaults['login_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'login_button',
            array(
                'label' => __( 'Header Login', 'quiklearn' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'login_text',
            array(
                'default' => $this->defaults['login_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'login_text',
            array(
                'label' => __( 'Login Text', 'quiklearn' ),
                'section' => 'header_section',
                'type' => 'text',
                'active_callback'   => 'rttheme_is_header_login_enabled',
            )
        );
        
        $wp_customize->add_setting( 'login_link',
            array(
                'default' => $this->defaults['login_link'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'login_link',
            array(
                'label' => __( 'Login Link', 'quiklearn' ),
                'section' => 'header_section',
                'type' => 'url',
                'active_callback'   => 'rttheme_is_header_login_enabled',
            )
        );
        /*Header Sign up*/
        $wp_customize->add_setting( 'signup_button',
            array(
                'default' => $this->defaults['signup_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'signup_button',
            array(
                'label' => __( 'Header Sign Up', 'quiklearn' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting( 'signup_text',
            array(
                'default' => $this->defaults['signup_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'signup_text',
            array(
                'label' => __( 'Sign Up Text', 'quiklearn' ),
                'section' => 'header_section',
                'type' => 'text',
                'active_callback'   => 'rttheme_is_header_signup_enabled',
            )
        );
        
        $wp_customize->add_setting( 'signup_link',
            array(
                'default' => $this->defaults['signup_link'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'signup_link',
            array(
                'label' => __( 'Sign Up Link', 'quiklearn' ),
                'section' => 'header_section',
                'type' => 'url',
                'active_callback'   => 'rttheme_is_header_signup_enabled',
            )
        );

        /**
         * Heading for Header Variation
         */
        $wp_customize->add_setting('header_mobile_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'header_mobile_heading', array(
            'label' => __( 'Mobile Header Option', 'quiklearn' ),
            'section' => 'header_mobile_section',
        )));

        $wp_customize->add_setting( 'mobile_topbar',
            array(
                'default' => $this->defaults['mobile_topbar'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_topbar',
            array(
                'label' => __( 'Mobile Topbar', 'quiklearn' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_date',
            array(
                'default' => $this->defaults['mobile_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_date',
            array(
                'label' => __( 'Mobile Date', 'quiklearn' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_address',
            array(
                'default' => $this->defaults['mobile_address'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_address',
            array(
                'label' => __( 'Mobile Address', 'quiklearn' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_opening',
            array(
                'default' => $this->defaults['mobile_opening'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_opening',
            array(
                'label' => __( 'Mobile Opening', 'quiklearn' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_phone',
            array(
                'default' => $this->defaults['mobile_phone'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_phone',
            array(
                'label' => __( 'Mobile Phone', 'quiklearn' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_email',
            array(
                'default' => $this->defaults['mobile_email'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_email',
            array(
                'label' => __( 'Mobile Email', 'quiklearn' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_social',
            array(
                'default' => $this->defaults['mobile_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_social',
            array(
                'label' => __( 'Mobile Social', 'quiklearn' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_search',
            array(
                'default' => $this->defaults['mobile_search'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_search',
            array(
                'label' => __( 'Mobile Search', 'quiklearn' ),
                'section' => 'header_mobile_section',
            )
        ) );
       
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new QuiklearnTheme_Header_Settings();
}
