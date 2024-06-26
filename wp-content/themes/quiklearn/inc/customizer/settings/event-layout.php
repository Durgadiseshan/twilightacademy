<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\quiklearn\Customizer\Settings;
use radiustheme\quiklearn\Customizer\QuiklearnTheme_Customizer;
use radiustheme\quiklearn\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\quiklearn\Customizer\Controls\Customizer_Separator_Control;
use radiustheme\quiklearn\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class QuiklearnTheme_Event_Layout_Settings extends QuiklearnTheme_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_event_archive_layout_controls' ) );
	}

    public function register_event_archive_layout_controls( $wp_customize ) {

        $wp_customize->add_setting( 'event_archive_layout',
            array(
                'default' => $this->defaults['event_archive_layout'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'event_archive_layout',
            array(
                'label' => __( 'Sidebar Layout', 'quiklearn' ),
                'description' => esc_html__( 'Select the default template layout for Pages', 'quiklearn' ),
                'section' => 'event_layout_section',
                'choices' => array(
                    'left-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-left.png',
                        'name' => __( 'Left Sidebar', 'quiklearn' )
                    ),
                    'full-width' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-full.png',
                        'name' => __( 'Full Width', 'quiklearn' )
                    ),
                    'right-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-right.png',
                        'name' => __( 'Right Sidebar', 'quiklearn' )
                    )
                )
            )
        ) );

        /**
         * Separator
         */
        $wp_customize->add_setting('separator_page', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_page', array(
            'settings' => 'separator_page',
            'section' => 'event_layout_section',
        )));
		
		// Content padding top
        $wp_customize->add_setting( 'event_archive_padding_top',
            array(
                'default' => $this->defaults['event_archive_padding_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'event_archive_padding_top',
            array(
                'label' => __( 'Content Padding Top', 'quiklearn' ),
                'section' => 'event_layout_section',
                'type' => 'number',
            )
        );
        // Content padding bottom
        $wp_customize->add_setting( 'event_archive_padding_bottom',
            array(
                'default' => $this->defaults['event_archive_padding_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'event_archive_padding_bottom',
            array(
                'label' => __( 'Content Padding Bottom', 'quiklearn' ),
                'section' => 'event_layout_section',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'event_archive_banner',
            array(
                'default' => $this->defaults['event_archive_banner'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_archive_banner',
            array(
                'label' => __( 'Banner', 'quiklearn' ),
                'section' => 'event_layout_section',
            )
        ) );
		
		$wp_customize->add_setting( 'event_archive_breadcrumb',
            array(
                'default' => $this->defaults['event_archive_breadcrumb'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_archive_breadcrumb',
            array(
                'label' => __( 'Breadcrumb', 'quiklearn' ),
                'section' => 'event_layout_section',
            )
        ) );
		
        // Banner BG Type 
        $wp_customize->add_setting( 'event_archive_bgtype',
            array(
                'default' => $this->defaults['event_archive_bgtype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'event_archive_bgtype',
            array(
                'label' => __( 'Banner Background Type', 'quiklearn' ),
                'section' => 'event_layout_section',
                'description' => esc_html__( 'This is banner background type.', 'quiklearn' ),
                'type' => 'select',
                'choices' => array(
                    'bgimg' => esc_html__( 'BG Image', 'quiklearn' ),
                    'bgcolor' => esc_html__( 'BG Color', 'quiklearn' ),
                ),
            )
        );

        $wp_customize->add_setting( 'event_archive_bgimg',
            array(
                'default' => $this->defaults['event_archive_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'event_archive_bgimg',
            array(
                'label' => __( 'Banner Background Image', 'quiklearn' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'quiklearn' ),
                'section' => 'event_layout_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'quiklearn' ),
                    'change' => __( 'Change File', 'quiklearn' ),
                    'default' => __( 'Default', 'quiklearn' ),
                    'remove' => __( 'Remove', 'quiklearn' ),
                    'placeholder' => __( 'No file selected', 'quiklearn' ),
                    'frame_title' => __( 'Select File', 'quiklearn' ),
                    'frame_button' => __( 'Choose File', 'quiklearn' ),
                ),
            )
        ) );

        // Banner background color
        $wp_customize->add_setting('event_archive_bgcolor', 
            array(
                'default' => $this->defaults['event_archive_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'event_archive_bgcolor',
            array(
                'label' => esc_html__('Banner Background Color', 'quiklearn'),
                'settings' => 'event_archive_bgcolor', 
                'priority' => 10, 
                'section' => 'event_layout_section', 
            )
        ));
		
		// Page background image
		$wp_customize->add_setting( 'event_archive_page_bgimg',
            array(
                'default' => $this->defaults['event_archive_page_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'event_archive_page_bgimg',
            array(
                'label' => __( 'Page / Post Background Image', 'quiklearn' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'quiklearn' ),
                'section' => 'event_layout_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'quiklearn' ),
                    'change' => __( 'Change File', 'quiklearn' ),
                    'default' => __( 'Default', 'quiklearn' ),
                    'remove' => __( 'Remove', 'quiklearn' ),
                    'placeholder' => __( 'No file selected', 'quiklearn' ),
                    'frame_title' => __( 'Select File', 'quiklearn' ),
                    'frame_button' => __( 'Choose File', 'quiklearn' ),
                ),
            )
        ) );
		
		$wp_customize->add_setting('event_archive_page_bgcolor', 
            array(
                'default' => $this->defaults['event_archive_page_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'event_archive_page_bgcolor',
            array(
                'label' => esc_html__('Page / Post Background Color', 'quiklearn'),
                'settings' => 'event_archive_page_bgcolor', 
                'section' => 'event_layout_section', 
            )
        ));
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new QuiklearnTheme_event_Layout_Settings();
}
