<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\quiklearn\Customizer\Settings;
use radiustheme\quiklearn\Customizer\QuiklearnTheme_Customizer;
use radiustheme\quiklearn\Customizer\Controls\Customizer_Switch_Control;
use radiustheme\quiklearn\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class QuiklearnTheme_Footer_Settings extends QuiklearnTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_footer_controls' ) );
	}

    public function register_footer_controls( $wp_customize ) {
		
		// Footer off & on
		$wp_customize->add_setting( 'footer_area',
            array(
                'default' => $this->defaults['footer_area'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'footer_area',
            array(
                'label' => __( 'Footer Top', 'quiklearn' ),
                'section' => 'footer_section',
            )
        ) );
        $wp_customize->add_setting( 'copyright_area',
            array(
                'default' => $this->defaults['copyright_area'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'copyright_area',
            array(
                'label' => __( 'Footer Copyright', 'quiklearn' ),
                'section' => 'footer_section',
            )
        ) );
		
        // Footer Style
        $wp_customize->add_setting( 'footer_style',
            array(
                'default' => $this->defaults['footer_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );

        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'footer_style',
            array(
                'label' => __( 'Footer Layout', 'quiklearn' ),
                'description' => esc_html__( 'You can set default footer form here.', 'quiklearn' ),
                'section' => 'footer_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-1.jpg',
                        'name' => __( 'Layout 1', 'quiklearn' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-2.jpg',
                        'name' => __( 'Layout 2', 'quiklearn' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-3.jpg',
                        'name' => __( 'Layout 3', 'quiklearn' )
                    ),
                )
            )
        ) );
		// Footer 1 column
		$wp_customize->add_setting( 'footer_column_1',
            array(
                'default' => $this->defaults['footer_column_1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        );
        $wp_customize->add_control( 'footer_column_1',
            array(
                'label' => __( 'Number of Columns for Footer', 'quiklearn' ),
                'section' => 'footer_section',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1 Column', 'quiklearn' ),
                    '2' => esc_html__( '2 Columns', 'quiklearn' ),
                    '3' => esc_html__( '3 Columns', 'quiklearn' ),
                    '4' => esc_html__( '4 Columns', 'quiklearn' ),
                ),
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        );

        // Footer 2 column
        $wp_customize->add_setting( 'footer_column_2',
            array(
                'default' => $this->defaults['footer_column_2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        );
        $wp_customize->add_control( 'footer_column_2',
            array(
                'label' => __( 'Number of Columns for Footer', 'quiklearn' ),
                'section' => 'footer_section',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1 Column', 'quiklearn' ),
                    '2' => esc_html__( '2 Columns', 'quiklearn' ),
                    '3' => esc_html__( '3 Columns', 'quiklearn' ),
                    '4' => esc_html__( '4 Columns', 'quiklearn' ),
                ),
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        );

        // Footer 3 column
        $wp_customize->add_setting( 'footer_column_3',
            array(
                'default' => $this->defaults['footer_column_3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_column_3',
            array(
                'label' => __( 'Number of Columns for Footer', 'quiklearn' ),
                'section' => 'footer_section',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1 Column', 'quiklearn' ),
                    '2' => esc_html__( '2 Columns', 'quiklearn' ),
                    '3' => esc_html__( '3 Columns', 'quiklearn' ),
                    '4' => esc_html__( '4 Columns', 'quiklearn' ),
                ),
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        );        
		
		// Footer 1 bgtype
		$wp_customize->add_setting( 'footer_bgtype',
            array(
                'default' => $this->defaults['footer_bgtype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_bgtype',
            array(
                'label' => __( 'Background Type', 'quiklearn' ),
                'section' => 'footer_section',
                'description' => esc_html__( 'This is banner background type.', 'quiklearn' ),
                'type' => 'select',
                'choices' => array(
					'fbgcolor' => esc_html__( 'BG Color', 'quiklearn' ),
                    'fbgimg' => esc_html__( 'BG Image', 'quiklearn' ),
                ),
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        );

        // Footer 1 background color
        $wp_customize->add_setting('fbgcolor', 
            array(
                'default' => $this->defaults['fbgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fbgcolor',
            array(
                'label' => esc_html__('Background Color', 'quiklearn'),
                'settings' => 'fbgcolor', 
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_footer1_bgcolor_type_condition',
            )
        ));
        // Footer 1 background image
        $wp_customize->add_setting( 'fbgimg',
            array(
                'default' => $this->defaults['fbgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'fbgimg',
            array(
                'label' => __( 'Background Image', 'quiklearn' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'quiklearn' ),
                'section' => 'footer_section',
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
                'active_callback' => 'rttheme_footer1_bgimg_type_condition',
            )
        ) );

        // Footer 2 bgtype
        $wp_customize->add_setting( 'footer_bgtype2',
            array(
                'default' => $this->defaults['footer_bgtype2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_bgtype2',
            array(
                'label' => __( 'Background Type', 'quiklearn' ),
                'section' => 'footer_section',
                'description' => esc_html__( 'This is banner background type.', 'quiklearn' ),
                'type' => 'select',
                'choices' => array(
                    'fbgcolor2' => esc_html__( 'BG Color', 'quiklearn' ),
                    'fbgimg2' => esc_html__( 'BG Image', 'quiklearn' ),
                ),
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        );		
        // Footer 2 background color
        $wp_customize->add_setting('fbgcolor2', 
            array(
                'default' => $this->defaults['fbgcolor2'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fbgcolor2',
            array(
                'label' => esc_html__('Background Color', 'quiklearn'),
                'settings' => 'fbgcolor2', 
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_footer2_bgcolor_type_condition',
            )
        ));		

        // Footer 2 background image
        $wp_customize->add_setting( 'fbgimg2',
            array(
                'default' => $this->defaults['fbgimg2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'fbgimg2',
            array(
                'label' => __( 'Background Image', 'quiklearn' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'quiklearn' ),
                'section' => 'footer_section',
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
                'active_callback' => 'rttheme_footer2_bgimg_type_condition',
            )
        ) );

        // Footer 3 bgtype
        $wp_customize->add_setting( 'footer_bgtype3',
            array(
                'default' => $this->defaults['footer_bgtype3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer_bgtype3',
            array(
                'label' => __( 'Background Type', 'quiklearn' ),
                'section' => 'footer_section',
                'description' => esc_html__( 'This is banner background type.', 'quiklearn' ),
                'type' => 'select',
                'choices' => array(
                    'fbgcolor3' => esc_html__( 'BG Color', 'quiklearn' ),
                    'fbgimg3' => esc_html__( 'BG Image', 'quiklearn' ),
                ),
                'active_callback' => 'rttheme_is_footer3_enabled',
            )
        );      
        // Footer 2 background color
        $wp_customize->add_setting('fbgcolor3', 
            array(
                'default' => $this->defaults['fbgcolor3'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fbgcolor3',
            array(
                'label' => esc_html__('Background Color', 'quiklearn'),
                'settings' => 'fbgcolor3', 
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_footer3_bgcolor_type_condition',
            )
        ));     

        // Footer 2 background image
        $wp_customize->add_setting( 'fbgimg3',
            array(
                'default' => $this->defaults['fbgimg3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'fbgimg3',
            array(
                'label' => __( 'Background Image', 'quiklearn' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'quiklearn' ),
                'section' => 'footer_section',
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
                'active_callback' => 'rttheme_footer3_bgimg_type_condition',
            )
        ) );

        /*Footer 1, 2 and 3 Color*/ 
		$wp_customize->add_setting('footer_title_color', 
            array(
                'default' => $this->defaults['footer_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'quiklearn'),
                'section' => 'footer_section', 
            )
        ));
		
		$wp_customize->add_setting('footer_color', 
            array(
                'default' => $this->defaults['footer_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_color',
            array(
                'label' => esc_html__('Footer Text Color', 'quiklearn'),
                'section' => 'footer_section', 
            )
        ));
		
		$wp_customize->add_setting('footer_link_color', 
            array(
                'default' => $this->defaults['footer_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'quiklearn'),
                'section' => 'footer_section', 
            )
        ));
		
		$wp_customize->add_setting('footer_link_hover_color', 
            array(
                'default' => $this->defaults['footer_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_hover_color',
            array(
                'label' => esc_html__('Footer Link Hover Color', 'quiklearn'),
                'section' => 'footer_section', 
            )
        ));
        // Footer 2 copyright bg color
        $wp_customize->add_setting('copyright_text_color', 
            array(
                'default' => $this->defaults['copyright_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_text_color',
            array(
                'label' => esc_html__('Copyright Text Color', 'quiklearn'),
                'section' => 'footer_section', 
            )
        ));

        $wp_customize->add_setting('copyright_link_color', 
            array(
                'default' => $this->defaults['copyright_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_link_color',
            array(
                'label' => esc_html__('Copyright Link Color', 'quiklearn'),
                'section' => 'footer_section', 
            )
        )); 

        $wp_customize->add_setting('copyright_hover_color', 
            array(
                'default' => $this->defaults['copyright_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_hover_color',
            array(
                'label' => esc_html__('Copyright Hover Color', 'quiklearn'),
                'section' => 'footer_section', 
            )
        ));

        /* = Footer Copyright
        ======================================================*/
        $wp_customize->add_setting('copyright_bg_color', 
            array(
                'default' => $this->defaults['copyright_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_bg_color',
            array(
                'label' => esc_html__('Copyright Background Color', 'quiklearn'),
                'section' => 'footer_section', 
                'active_callback' => 'rttheme_is_copyright_bg_color_enabled',
            )
        ));
		
		// Copyright Text
        $wp_customize->add_setting( 'copyright_text',
            array(
                'default' => $this->defaults['copyright_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'copyright_text',
            array(
                'label' => __( 'Copyright Text', 'quiklearn' ),
                'section' => 'footer_section',
                'type' => 'textarea',
            )
        );

        $wp_customize->add_setting( 'copyright_menu',
            array(
                'default' => $this->defaults['copyright_menu'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'copyright_menu',
            array(
                'label' => __( 'Copyright Menu Display', 'quiklearn' ),
                'section' => 'footer_section',
            )
        ) );

        $wp_customize->add_setting( 'copyright_social',
            array(
                'default' => $this->defaults['copyright_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'copyright_social',
            array(
                'label' => __( 'Copyright Social Display', 'quiklearn' ),
                'section' => 'footer_section',
                'active_callback' => 'rttheme_is_footer1_enabled',
            )
        ) );

        $wp_customize->add_setting( 'logo_display',
            array(
                'default' => $this->defaults['logo_display'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'logo_display',
            array(
                'label' => __( 'Footer Logo Display', 'quiklearn' ),
                'section' => 'footer_section',
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        ) );
        
        /*footer 2 logo*/
        $wp_customize->add_setting('footer_logo2',
            array(
              'default'           => $this->defaults['footer_logo2'],
              'transport'         => 'refresh',
              'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo2',
            array(
                'label'         => esc_html__('Footer Logo', 'quiklearn'),
                'description'   => esc_html__('This is the description for the Media Control', 'quiklearn'),
                'section'       => 'footer_section',
                'mime_type'     => 'image',
                'button_labels' => array(
                    'select'       => esc_html__('Select File', 'quiklearn'),
                    'change'       => esc_html__('Change File', 'quiklearn'),
                    'default'      => esc_html__('Default', 'quiklearn'),
                    'remove'       => esc_html__('Remove', 'quiklearn'),
                    'placeholder'  => esc_html__('No file selected', 'quiklearn'),
                    'frame_title'  => esc_html__('Select File', 'quiklearn'),
                    'frame_button' => esc_html__('Choose File', 'quiklearn'),
                ),
                'active_callback' => 'rttheme_is_footer2_enabled',
            )
        ));        

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new QuiklearnTheme_Footer_Settings();
}
