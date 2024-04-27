<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\quiklearn\Customizer\Settings;
use radiustheme\quiklearn\Customizer\QuiklearnTheme_Customizer;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class QuiklearnTheme_Error_Settings extends QuiklearnTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_error_controls' ) );
	}

    public function register_error_controls( $wp_customize ) {
		
		$wp_customize->add_setting('error_bodybg_color', 
            array(
                'default' => $this->defaults['error_bodybg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_bodybg_color',
            array(
                'label' => esc_html__('Body Background Color', 'quiklearn'),
                'section' => 'error_section', 
            )
        ));
		// Error image
        $wp_customize->add_setting( 'error_image',
            array(
                'default' => $this->defaults['error_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'error_image',
            array(
                'label' => __( 'Error Image', 'quiklearn' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'quiklearn' ),
                'section' => 'error_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'quiklearn' ),
                    'change' => __( 'Change File', 'quiklearn' ),
                    'default' => __( 'Default', 'quiklearn' ),
                    'remove' => __( 'Remove', 'quiklearn' ),
                    'placeholder' => __( 'No file selected', 'quiklearn' ),
                    'frame_title' => __( 'Select File', 'quiklearn' ),
                    'frame_button' => __( 'Choose File', 'quiklearn' ),
                )
            )
        ) );
		
        // Error Text
        $wp_customize->add_setting( 'error_text1',
            array(
                'default' => $this->defaults['error_text1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_text1',
            array(
                'label' => __( 'Error Heading', 'quiklearn' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting( 'error_text2',
            array(
                'default' => $this->defaults['error_text2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field'
            )
        );
        $wp_customize->add_control( 'error_text2',
            array(
                'label' => __( 'Error Text', 'quiklearn' ),
                'section' => 'error_section',
                'type' => 'textarea',
            )
        );
        // Button Text
        $wp_customize->add_setting( 'error_buttontext',
            array(
                'default' => $this->defaults['error_buttontext'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'error_buttontext',
            array(
                'label' => __( 'Button Text', 'quiklearn' ),
                'section' => 'error_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting('error_text1_color', 
            array(
                'default' => $this->defaults['error_text1_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_text1_color',
            array(
                'label' => esc_html__('Error Heading Color', 'quiklearn'),
                'section' => 'error_section', 
            )
        ));
		
		$wp_customize->add_setting('error_text2_color', 
            array(
                'default' => $this->defaults['error_text2_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_text2_color',
            array(
                'label' => esc_html__('Error Text Color', 'quiklearn'),
                'section' => 'error_section', 
            )
        ));

        /*Animation*/
        $wp_customize->add_setting( 'error_animation',
            array(
                'default' => $this->defaults['error_animation'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'error_animation',
            array(
                'label' => __( 'Animation On/Off', 'quiklearn' ),
                'section' => 'error_section',
                'type' => 'select',
                'choices' => array(
                    'wow' => esc_html__( 'Animation On', 'quiklearn' ),
                    'hide' => esc_html__( 'Animation Off', 'quiklearn' ),
                ),
            )
        );

        $wp_customize->add_setting( 'error_animation_effect',
            array(
                'default' => $this->defaults['error_animation_effect'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'error_animation_effect',
            array(
                'label' => __( 'Entrance Animation', 'quiklearn' ),
                'section' => 'error_section',
                'type' => 'select',
                'choices' => array(
                    'none' => esc_html__( 'none', 'quiklearn' ),
                    'bounce' => esc_html__( 'bounce', 'quiklearn' ),
                    'flash' => esc_html__( 'flash', 'quiklearn' ),
                    'pulse' => esc_html__( 'pulse', 'quiklearn' ),
                    'rubberBand' => esc_html__( 'rubberBand', 'quiklearn' ),
                    'shakeX' => esc_html__( 'shakeX', 'quiklearn' ),
                    'shakeY' => esc_html__( 'shakeY', 'quiklearn' ),
                    'headShake' => esc_html__( 'headShake', 'quiklearn' ),
                    'swing' => esc_html__( 'swing', 'quiklearn' ),                 
                    'fadeIn' => esc_html__( 'fadeIn', 'quiklearn' ),
                    'fadeInDown' => esc_html__( 'fadeInDown', 'quiklearn' ),
                    'fadeInLeft' => esc_html__( 'fadeInLeft', 'quiklearn' ),
                    'fadeInRight' => esc_html__( 'fadeInRight', 'quiklearn' ),
                    'fadeInUp' => esc_html__( 'fadeInUp', 'quiklearn' ),                   
                    'bounceIn' => esc_html__( 'bounceIn', 'quiklearn' ),
                    'bounceInDown' => esc_html__( 'bounceInDown', 'quiklearn' ),
                    'bounceInLeft' => esc_html__( 'bounceInLeft', 'quiklearn' ),
                    'bounceInRight' => esc_html__( 'bounceInRight', 'quiklearn' ),
                    'bounceInUp' => esc_html__( 'bounceInUp', 'quiklearn' ),           
                    'slideInDown' => esc_html__( 'slideInDown', 'quiklearn' ),
                    'slideInLeft' => esc_html__( 'slideInLeft', 'quiklearn' ),
                    'slideInRight' => esc_html__( 'slideInRight', 'quiklearn' ),
                    'slideInUp' => esc_html__( 'slideInUp', 'quiklearn' ), 
                ),
            )
        );
		
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new QuiklearnTheme_Error_Settings();
}
