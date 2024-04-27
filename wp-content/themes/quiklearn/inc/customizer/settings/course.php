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

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class QuiklearnTheme_Course_Settings extends QuiklearnTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_course_controls' ) );
	}

    public function register_course_controls( $wp_customize ) {
		// Course Style
        $wp_customize->add_setting( 'course_style',
            array(
                'default' => $this->defaults['course_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );
		$wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'course_style',
            array(
                'label' => __( 'Course Layout', 'quiklearn' ),
                'description' => esc_html__( 'Course layout variation you can select and use.', 'quiklearn' ),
                'section' => 'rttheme_course_settings',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 1', 'quiklearn' )
                    ),
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 2', 'quiklearn' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 3', 'quiklearn' )
                    ),
                    '4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 4', 'quiklearn' )
                    ),
                )
            )
        ) );

        // Category view
        $wp_customize->add_setting( 'course_archive_cat',
            array(
                'default' => $this->defaults['course_archive_cat'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_archive_cat',
            array(
                'label' => __( 'Category', 'quiklearn' ),
                'section' => 'rttheme_course_settings',
            )
        ) );

        // Student view
        $wp_customize->add_setting( 'course_archive_student',
            array(
                'default' => $this->defaults['course_archive_student'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_archive_student',
            array(
                'label' => __( 'Student', 'quiklearn' ),
                'section' => 'rttheme_course_settings',
            )
        ) );
			
        // Lesson view
        $wp_customize->add_setting( 'course_archive_lesson',
            array(
                'default' => $this->defaults['course_archive_lesson'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_archive_lesson',
            array(
                'label' => __( 'Lesson', 'quiklearn' ),
                'section' => 'rttheme_course_settings',
            )
        ) );

        // Lavel view
        $wp_customize->add_setting( 'course_archive_level',
            array(
                'default' => $this->defaults['course_archive_level'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_archive_level',
            array(
                'label' => __( 'Level', 'quiklearn' ),
                'section' => 'rttheme_course_settings',
            )
        ) );
				
		// Duration view
        $wp_customize->add_setting( 'course_archive_duration',
            array(
                'default' => $this->defaults['course_archive_duration'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_archive_duration',
            array(
                'label' => __( 'Duration', 'quiklearn' ),
                'section' => 'rttheme_course_settings',
            )
        ) );

        // Wishlist view
        $wp_customize->add_setting( 'course_archive_wishlist',
            array(
                'default' => $this->defaults['course_archive_wishlist'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_archive_wishlist',
            array(
                'label' => __( 'Wishlist', 'quiklearn' ),
                'section' => 'rttheme_course_settings',
            )
        ) );

         // Instructor view
        $wp_customize->add_setting( 'course_archive_instructor',
            array(
                'default' => $this->defaults['course_archive_instructor'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_archive_instructor',
            array(
                'label' => __( 'Instructor', 'quiklearn' ),
                'section' => 'rttheme_course_settings',
            )
        ) );

        // Review view
        $wp_customize->add_setting( 'course_archive_review',
            array(
                'default' => $this->defaults['course_archive_review'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_archive_review',
            array(
                'label' => __( 'Rating', 'quiklearn' ),
                'section' => 'rttheme_course_settings',
            )
        ) );

        // Price view
        $wp_customize->add_setting( 'course_archive_price',
            array(
                'default' => $this->defaults['course_archive_price'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_archive_price',
            array(
                'label' => __( 'Price', 'quiklearn' ),
                'section' => 'rttheme_course_settings',
            )
        ) );
        
        // Price view
        $wp_customize->add_setting( 'course_archive_feature',
            array(
                'default' => $this->defaults['course_archive_feature'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_archive_feature',
            array(
                'label' => __( 'Feature', 'quiklearn' ),
                'section' => 'rttheme_course_settings',
            )
        ) );

        // Excerpt view
        $wp_customize->add_setting( 'course_archive_excerpt',
            array(
                'default' => $this->defaults['course_archive_excerpt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_archive_excerpt',
            array(
                'label' => __( 'List Layout Excerpt', 'quiklearn' ),
                'section' => 'rttheme_course_settings',
            )
        ) );

        $wp_customize->add_setting( 'course_excerpt_limit',        
            array(
                'default' => $this->defaults['course_excerpt_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'course_excerpt_limit',
            array(
                'label' => __( 'Excerpt Limit', 'quiklearn' ),
                'section' => 'rttheme_course_settings',
                'type' => 'number',
                'active_callback' => 'rttheme_is_course_excerpt_enabled',
            )
        ) ;       

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new QuiklearnTheme_Course_Settings();
}
