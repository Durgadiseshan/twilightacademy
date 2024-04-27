<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\quiklearn\Customizer\Settings;
use radiustheme\quiklearn\Customizer\QuiklearnTheme_Customizer;
use radiustheme\quiklearn\Customizer\Controls\Customizer_Switch_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class QuiklearnTheme_Course_Single_Settings extends QuiklearnTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_course_single_controls' ) );
	}

    public function register_course_single_controls( $wp_customize ) {

        $wp_customize->add_setting( 'overview_title',
            array(
                'default' => $this->defaults['overview_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'overview_title',
            array(
                'label' => __( 'Overview Title', 'quiklearn' ),
                'section' => 'rttheme_course_single_settings',
                'type' => 'text',
            )
        );

        $wp_customize->add_setting( 'curriculum_title',
            array(
                'default' => $this->defaults['curriculum_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'curriculum_title',
            array(
                'label' => __( 'Curriculum Title', 'quiklearn' ),
                'section' => 'rttheme_course_single_settings',
                'type' => 'text',
            )
        );

        $wp_customize->add_setting( 'instructors_title',
            array(
                'default' => $this->defaults['instructors_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'instructors_title',
            array(
                'label' => __( 'Instructors Title', 'quiklearn' ),
                'section' => 'rttheme_course_single_settings',
                'type' => 'text',
            )
        );

        $wp_customize->add_setting( 'extra_info_title',
            array(
                'default' => $this->defaults['extra_info_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'extra_info_title',
            array(
                'label' => __( 'Extra Information', 'quiklearn' ),
                'section' => 'rttheme_course_single_settings',
                'type' => 'text',
            )
        );

        /*Related product*/
        $wp_customize->add_setting( 'course_related',
            array(
                'default' => $this->defaults['course_related'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_related',
            array(
                'label' => __( 'Related Product', 'quiklearn' ),
                'section' => 'rttheme_course_single_settings',
            )
        ));

        $wp_customize->add_setting( 'course_related_sub_title',
            array(
                'default' => $this->defaults['course_related_sub_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'course_related_sub_title',
            array(
                'label' => __( 'Related Sub Title', 'quiklearn' ),
                'section' => 'rttheme_course_single_settings',
                'type' => 'text',
                'active_callback'   => 'rttheme_is_related_course_enabled', 
            )
        );

        $wp_customize->add_setting( 'course_related_title',
            array(
                'default' => $this->defaults['course_related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'course_related_title',
            array(
                'label' => __( 'Related Title', 'quiklearn' ),
                'section' => 'rttheme_course_single_settings',
                'type' => 'text',
                'active_callback'   => 'rttheme_is_related_course_enabled', 
            )
        );

        /*Course option*/
        $wp_customize->add_setting( 'course_meta_ins',
            array(
                'default' => $this->defaults['course_meta_ins'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_meta_ins',
            array(
                'label' => __( 'Instructor', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );

        $wp_customize->add_setting( 'course_meta_lec',
            array(
                'default' => $this->defaults['course_meta_lec'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_meta_lec',
            array(
                'label' => __( 'Lecture', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );

        $wp_customize->add_setting( 'course_meta_qz',
            array(
                'default' => $this->defaults['course_meta_qz'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_meta_qz',
            array(
                'label' => __( 'Quizzes', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );

        $wp_customize->add_setting( 'course_meta_stu',
            array(
                'default' => $this->defaults['course_meta_stu'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_meta_stu',
            array(
                'label' => __( 'Students', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );

        $wp_customize->add_setting( 'course_meta_dur',
            array(
                'default' => $this->defaults['course_meta_dur'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_meta_dur',
            array(
                'label' => __( 'Duration', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );

        $wp_customize->add_setting( 'course_meta_lev',
            array(
                'default' => $this->defaults['course_meta_lev'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_meta_lev',
            array(
                'label' => __( 'Level', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );

        $wp_customize->add_setting( 'course_meta_update',
            array(
                'default' => $this->defaults['course_meta_update'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_meta_update',
            array(
                'label' => __( 'Update', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );

        // Curriculum
        $wp_customize->add_setting( 'course_curriculum',
            array(
                'default' => $this->defaults['course_curriculum'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_curriculum',
            array(
                'label' => __( 'Tab Curriculum', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );

        // Instructor
        $wp_customize->add_setting( 'course_instructor',
            array(
                'default' => $this->defaults['course_instructor'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_instructor',
            array(
                'label' => __( 'Tab Instructor', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );

        // Review
        $wp_customize->add_setting( 'course_review',
            array(
                'default' => $this->defaults['course_review'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_review',
            array(
                'label' => __( 'Tab Review', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );

        // Faqs
        $wp_customize->add_setting( 'course_faqs',
            array(
                'default' => $this->defaults['course_faqs'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_faqs',
            array(
                'label' => __( 'Tab Faqs', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );

        // Category
        $wp_customize->add_setting( 'course_cats',
            array(
                'default' => $this->defaults['course_cats'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_cats',
            array(
                'label' => __( 'Category', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );
        
        // Tags
        $wp_customize->add_setting( 'course_meta_tags',
            array(
                'default' => $this->defaults['course_meta_tags'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_meta_tags',
            array(
                'label' => __( 'Tags', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );

        // Language
        $wp_customize->add_setting( 'course_meta_lan',
            array(
                'default' => $this->defaults['course_meta_lan'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_meta_lan',
            array(
                'label' => __( 'Language', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );

        // Price
        $wp_customize->add_setting( 'course_price',
            array(
                'default' => $this->defaults['course_price'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_price',
            array(
                'label' => __( 'Price', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );

        // Rating
        $wp_customize->add_setting( 'course_rating',
            array(
                'default' => $this->defaults['course_rating'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_rating',
            array(
                'label' => __( 'Rating', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );

        // Progress
        $wp_customize->add_setting( 'course_progress',
            array(
                'default' => $this->defaults['course_progress'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_progress',
            array(
                'label' => __( 'Progress', 'quiklearn' ),
                'section' => 'rttheme_course_single_option_settings',
            )
        ) );

        //Wishlist and Social share

        // Wishlist
        $wp_customize->add_setting( 'course_wishlist',
            array(
                'default' => $this->defaults['course_wishlist'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_wishlist',
            array(
                'label' => __( 'Wishlist', 'quiklearn' ),
                'section' => 'rttheme_course_single_share_option_settings',
            )
        ) );

        // Share
        $wp_customize->add_setting( 'course_share',
            array(
                'default' => $this->defaults['course_share'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_share',
            array(
                'label' => __( 'Course Share', 'quiklearn' ),
                'section' => 'rttheme_course_single_share_option_settings',
            )
        ) );

        // Facebook
        $wp_customize->add_setting( 'course_share_facebook',
            array(
                'default' => $this->defaults['course_share_facebook'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_share_facebook',
            array(
                'label' => __( 'Facebook', 'quiklearn' ),
                'section' => 'rttheme_course_single_share_option_settings',
                'active_callback'   => 'rttheme_is_course_share_enabled',
            )
        ) );

        // Twitter
        $wp_customize->add_setting( 'course_share_twitter',
            array(
                'default' => $this->defaults['course_share_twitter'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_share_twitter',
            array(
                'label' => __( 'Twitter', 'quiklearn' ),
                'section' => 'rttheme_course_single_share_option_settings',
                'active_callback'   => 'rttheme_is_course_share_enabled',
            )
        ) );

        // Youtube
        $wp_customize->add_setting( 'course_share_youtube',
            array(
                'default' => $this->defaults['course_share_youtube'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_share_youtube',
            array(
                'label' => __( 'Youtube', 'quiklearn' ),
                'section' => 'rttheme_course_single_share_option_settings',
                'active_callback'   => 'rttheme_is_course_share_enabled',
            )
        ) );

        // Linkedin
        $wp_customize->add_setting( 'course_share_linkedin',
            array(
                'default' => $this->defaults['course_share_linkedin'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_share_linkedin',
            array(
                'label' => __( 'Linkedin', 'quiklearn' ),
                'section' => 'rttheme_course_single_share_option_settings',
                'active_callback'   => 'rttheme_is_course_share_enabled',
            )
        ) );

        // Pinterest
        $wp_customize->add_setting( 'course_share_pinterest',
            array(
                'default' => $this->defaults['course_share_pinterest'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_share_pinterest',
            array(
                'label' => __( 'Pinterest', 'quiklearn' ),
                'section' => 'rttheme_course_single_share_option_settings',
                'active_callback'   => 'rttheme_is_course_share_enabled',
            )
        ) );

        // Whatsapp
        $wp_customize->add_setting( 'course_share_whatsapp',
            array(
                'default' => $this->defaults['course_share_whatsapp'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_share_whatsapp',
            array(
                'label' => __( 'Whatsapp', 'quiklearn' ),
                'section' => 'rttheme_course_single_share_option_settings',
                'active_callback'   => 'rttheme_is_course_share_enabled',
            )
        ) );

        // Email
        $wp_customize->add_setting( 'course_share_email',
            array(
                'default' => $this->defaults['course_share_email'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'course_share_email',
            array(
                'label' => __( 'Email', 'quiklearn' ),
                'section' => 'rttheme_course_single_share_option_settings',
                'active_callback'   => 'rttheme_is_course_share_enabled',
            )
        ) );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new QuiklearnTheme_Course_Single_Settings();
} 