<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\quiklearn\Customizer\Settings;

use radiustheme\quiklearn\Customizer\QuiklearnTheme_Customizer;
use radiustheme\quiklearn\Customizer\Controls\Customizer_Heading_Control;
use radiustheme\quiklearn\Customizer\Controls\Customizer_Switch_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class QuiklearnTheme_General_Settings extends QuiklearnTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_general_controls' ) );
	}

    public function register_general_controls( $wp_customize ) {
        
        /*Theme Logo Information*/
        $wp_customize->add_setting('logo_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'logo_heading', array(
            'label' => __( 'Site Logo', 'quiklearn' ),
            'section' => 'logo_section',
        )));

        $wp_customize->add_setting( 'logo',
            array(
                'default' => $this->defaults['logo'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo',
            array(
                'label' => __( 'Main Logo', 'quiklearn' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'quiklearn' ),
                'section' => 'logo_section',
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

        $wp_customize->add_setting( 'logo_light',
            array(
                'default' => $this->defaults['logo_light'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo_light',
            array(
                'label' => __( 'Light Logo', 'quiklearn' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'quiklearn' ),
                'section' => 'logo_section',
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

        $wp_customize->add_setting( 'logo_width',
            array(
                'default' => $this->defaults['logo_width'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'logo_width',
            array(
                'label' => __( 'Logo Width', 'quiklearn' ),
                'section' => 'logo_section',
                'description' => esc_html__( 'Default logo size 162x52px ( Input logo size only number widthout px )', 'quiklearn' ),
                'type' => 'number',
            )
        );

        $wp_customize->add_setting( 'mobile_logo_width',
            array(
                'default' => $this->defaults['mobile_logo_width'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'mobile_logo_width',
            array(
                'label' => __( 'Mobile Logo Width', 'quiklearn' ),
                'section' => 'logo_section',
                'description' => esc_html__( 'Default logo size 110x35px ( Input logo size only number widthout px )', 'quiklearn' ),
                'type' => 'number',
            )
        );

        /*Theme Control Information*/
        $wp_customize->add_setting('site_switching', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'site_switching', array(
            'label' => __( 'Theme Control', 'quiklearn' ),
            'section' => 'control_section',
        )));

        $wp_customize->add_setting( 'image_blend',
            array(
                'default' => $this->defaults['image_blend'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'image_blend',
            array(
                'label' => __( 'Image Blend', 'quiklearn' ),
                'section' => 'control_section',
                'type' => 'select',
                'choices' => array(
                    'normal' => esc_html__( 'Normal Mode', 'quiklearn' ),
                    'blend' => esc_html__( 'Blend Mode', 'quiklearn' ),
                ),
            )
        );
		
		$wp_customize->add_setting( 'container_width',
            array(
                'default' => $this->defaults['container_width'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'container_width',
            array(
                'label' => __( 'Container width( Bootstrap Grid )', 'quiklearn' ),
                'section' => 'control_section',
                'type' => 'select',
                'choices' => array(
                    '1414' => esc_html__( '1414px', 'quiklearn' ),
					'1290' => esc_html__( '1290px', 'quiklearn' ),
					'1200' => esc_html__( '1200px', 'quiklearn' ),
					'1140' => esc_html__( '1140px', 'quiklearn' ),
                ),
            )
        );
		
        $wp_customize->add_setting( 'display_no_preview_image',
            array(
                'default' => $this->defaults['display_no_preview_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'display_no_preview_image',
            array(
                'label' => __( 'Display Preview Image on Blog', 'quiklearn' ),
                'section' => 'control_section',
            )
        ) );
		
        $wp_customize->add_setting( 'back_to_top',
            array(
                'default' => $this->defaults['back_to_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'back_to_top',
            array(
                'label' => __( 'Back to Top Arrow', 'quiklearn' ),
                'section' => 'control_section',
            )
        ) );

        $wp_customize->add_setting('preloader',
			array(
			 'default'           => $this->defaults['preloader'],
			 'transport'         => 'refresh',
			 'sanitize_callback' => 'rttheme_switch_sanitization',
			)
        );
        $wp_customize->add_control(new Customizer_Switch_Control($wp_customize, 'preloader',
            array(
                'label'   => esc_html__('Preloader', 'quiklearn'),
                'section' => 'control_section',
            )
        ));

        $wp_customize->add_setting('preloader_image',
			array(
			  'default'           => $this->defaults['preloader_image'],
			  'transport'         => 'refresh',
			  'sanitize_callback' => 'absint',
			)
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'preloader_image',
			array(
				'label'         => esc_html__('Preloader Image', 'quiklearn'),
				'description'   => esc_html__('This is the description for the Media Control', 'quiklearn'),
				'section'       => 'control_section',
				'active_callback'   => 'rttheme_is_preloader_enabled',  
				'mime_type'     => 'image',
				'button_labels' => array(
					'select'       => esc_html__('Select File', 'quiklearn'),
					'change'       => esc_html__('Change File', 'quiklearn'),
					'default'      => esc_html__('Default', 'quiklearn'),
					'remove'       => esc_html__('Remove', 'quiklearn'),
					'placeholder'  => esc_html__('No file selected', 'quiklearn'),
					'frame_title'  => esc_html__('Select File', 'quiklearn'),
					'frame_button' => esc_html__('Choose File', 'quiklearn'),
				)
			)
        ));

        $wp_customize->add_setting('preloader_bg_color',
			array(
				'default'           => $this->defaults['preloader_bg_color'],
				'transport'         => 'postMessage',
				'sanitize_callback' => 'rttheme_hex_rgba_sanitization',
			)
        );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'preloader_bg_color',
			array(
				'label'   => esc_html__('Preloader Background color', 'quiklearn'),
				'section' => 'control_section',
				'active_callback'   => 'rttheme_is_preloader_enabled',  
			)
		));	

        /*Theme general Information*/
        $wp_customize->add_setting('general_info_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'general_info_heading', array(
            'label' => __( 'Theme General', 'quiklearn' ),
            'section' => 'general_section',
        )));

        $wp_customize->add_setting( 'sidetext_label',
            array(
                'default' => $this->defaults['sidetext_label'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'sidetext_label',
            array(
                'label' => __( 'Offcanvus Label', 'quiklearn' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );
        
        $wp_customize->add_setting( 'sidetext',
            array(
                'default' => $this->defaults['sidetext'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'sidetext',
            array(
                'label' => __( 'Offcanvus Text', 'quiklearn' ),
                'section' => 'general_section',
                'type' => 'textarea',
            )
        );

        $wp_customize->add_setting( 'address_label',
            array(
                'default' => $this->defaults['address_label'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'address_label',
            array(
                'label' => __( 'Address Label', 'quiklearn' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );

        $wp_customize->add_setting( 'address',
            array(
                'default' => $this->defaults['address'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'address',
            array(
                'label' => __( 'Address Text', 'quiklearn' ),
                'section' => 'general_section',
                'type' => 'textarea',
            )
        );

        $wp_customize->add_setting( 'email_label',
            array(
                'default' => $this->defaults['email_label'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'email_label',
            array(
                'label' => __( 'Email Label', 'quiklearn' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );  

        $wp_customize->add_setting( 'email',
            array(
                'default' => $this->defaults['email'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'email',
            array(
                'label' => __( 'Email', 'quiklearn' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );

        $wp_customize->add_setting( 'phone_label',
            array(
                'default' => $this->defaults['phone_label'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'phone_label',
            array(
                'label' => __( 'Phone Label', 'quiklearn' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );  

        $wp_customize->add_setting( 'phone',
            array(
                'default' => $this->defaults['phone'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'phone',
            array(
                'label' => __( 'Phone No', 'quiklearn' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );
		
        $wp_customize->add_setting( 'opening_label',
            array(
                'default' => $this->defaults['opening_label'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'opening_label',
            array(
                'label' => __( 'Opening Label', 'quiklearn' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );	

		$wp_customize->add_setting( 'opening',
            array(
                'default' => $this->defaults['opening'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'opening',
            array(
                'label' => __( 'Opening Text', 'quiklearn' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );
        
        /*Theme Social*/
        $wp_customize->add_setting('social_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'social_heading', array(
            'label' => __( 'Theme Social', 'quiklearn' ),
            'section' => 'social_section',
        )));

		$wp_customize->add_setting( 'social_label',
            array(
                'default' => $this->defaults['social_label'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'social_label',
            array(
                'label' => __( 'Social Label', 'quiklearn' ),
                'section' => 'social_section',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting( 'social_facebook',
            array(
                'default' => $this->defaults['social_facebook'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_facebook',
            array(
                'label' => __( 'Facebook', 'quiklearn' ),
                'section' => 'social_section',
                'type' => 'url',
            )
        );
		
        $wp_customize->add_setting( 'social_twitter',
            array(
                'default' => $this->defaults['social_twitter'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_twitter',
            array(
                'label' => __( 'Twitter', 'quiklearn' ),
                'section' => 'social_section',
                'type' => 'url',
            )
        );
				
        $wp_customize->add_setting( 'social_linkedin',
            array(
                'default' => $this->defaults['social_linkedin'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_linkedin',
            array(
                'label' => __( 'Linkedin', 'quiklearn' ),
                'section' => 'social_section',
                'type' => 'url',
            )
        );
		
        $wp_customize->add_setting( 'social_behance',
            array(
                'default' => $this->defaults['social_behance'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_behance',
            array(
                'label' => __( 'Behance', 'quiklearn' ),
                'section' => 'social_section',
                'type' => 'url',
            )
        );
		
        $wp_customize->add_setting( 'social_dribbble',
            array(
                'default' => $this->defaults['social_dribbble'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_dribbble',
            array(
                'label' => __( 'Dribbble', 'quiklearn' ),
                'section' => 'social_section',
                'type' => 'url',
            )
        );
		
        $wp_customize->add_setting( 'social_youtube',
            array(
                'default' => $this->defaults['social_youtube'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_youtube',
            array(
                'label' => __( 'Youtube', 'quiklearn' ),
                'section' => 'social_section',
                'type' => 'url',
            )
        );
		
		$wp_customize->add_setting( 'social_pinterest',
            array(
                'default' => $this->defaults['social_pinterest'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_pinterest',
            array(
                'label' => __( 'Pinterest', 'quiklearn' ),
                'section' => 'social_section',
                'type' => 'url',
            )
        );
		
		$wp_customize->add_setting( 'social_instagram',
            array(
                'default' => $this->defaults['social_instagram'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_instagram',
            array(
                'label' => __( 'Instagram', 'quiklearn' ),
                'section' => 'social_section',
                'type' => 'url',
            )
        );
		
		$wp_customize->add_setting( 'social_skype',
            array(
                'default' => $this->defaults['social_skype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_skype',
            array(
                'label' => __( 'Skype', 'quiklearn' ),
                'section' => 'social_section',
                'type' => 'url',
            )
        );
		
		$wp_customize->add_setting( 'social_rss',
            array(
                'default' => $this->defaults['social_rss'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_rss',
            array(
                'label' => __( 'RSS', 'quiklearn' ),
                'section' => 'social_section',
                'type' => 'url',
            )
        );
		
		$wp_customize->add_setting( 'social_snapchat',
            array(
                'default' => $this->defaults['social_snapchat'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_snapchat',
            array(
                'label' => __( 'Snapchat', 'quiklearn' ),
                'section' => 'social_section',
                'type' => 'url',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required  
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new QuiklearnTheme_General_Settings();
}
