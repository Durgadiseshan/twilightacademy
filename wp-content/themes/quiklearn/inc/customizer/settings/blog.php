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
class QuiklearnTheme_Blog_Post_Settings extends QuiklearnTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_blog_post_controls' ) );
	}

    /**
     * Blog Post Controls
     */
    public function register_blog_post_controls( $wp_customize ) {

        // Blog Post Style
        $wp_customize->add_setting( 'blog_style',
            array(
                'default' => $this->defaults['blog_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization'
            )
        );

        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'blog_style',
            array(
                'label' => __( 'Blog/Archive Layout', 'quiklearn' ),
                'description' => esc_html__( 'Blog Post layout variation you can selecr and use.', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
                'choices' => array(
                    'style1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog3.png',
                        'name' => __( 'Layout 1', 'quiklearn' )
                    ),
                    'style2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 2', 'quiklearn' )
                    ),
                )
            )
        ) );

        /*Loadmore*/
        $wp_customize->add_setting( 'blog_loadmore',
            array(
                'default' => $this->defaults['blog_loadmore'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'blog_loadmore',
            array(
                'label' => __( 'Blog Pagination', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
                'type' => 'select',
                'choices' => array(
                    'pagination' => esc_html__( 'Pagination', 'quiklearn' ),
                    'loadmore' => esc_html__( 'Load More', 'quiklearn' ),
                ),
                'active_callback' => 'rttheme_is_blog_style1_enabled',
            )
        );

        $wp_customize->add_setting( 'load_more_limit',
            array(
                'default' => $this->defaults['load_more_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'load_more_limit',
            array(
                'label' => __( 'Load More Limit', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
                'type' => 'number',
                'active_callback' => 'rttheme_is_blog_style1_enabled',
            )
        );

		$wp_customize->add_setting( 'post_content_limit1',
            array(
                'default' => $this->defaults['post_content_limit1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'post_content_limit1',
            array(
                'label' => __( 'Blog Content Limit', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
                'type' => 'number',
                'active_callback' => 'rttheme_is_blog_style1_enabled',
            )
        );

        $wp_customize->add_setting( 'post_content_limit2',
            array(
                'default' => $this->defaults['post_content_limit2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'post_content_limit2',
            array(
                'label' => __( 'Blog Content Limit', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
                'type' => 'number',
                'active_callback' => 'rttheme_is_blog_style2_enabled',
            )
        );
		
		$wp_customize->add_setting( 'blog_content',
            array(
                'default' => $this->defaults['blog_content'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_content',
            array(
                'label' => __( 'Show Content', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
                'active_callback' => 'rttheme_is_blog_style1_enabled',
            )
        ) );

        $wp_customize->add_setting( 'blog_content2',
            array(
                'default' => $this->defaults['blog_content2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_content2',
            array(
                'label' => __( 'Show Content', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
                'active_callback' => 'rttheme_is_blog_style2_enabled',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_date',
            array(
                'default' => $this->defaults['blog_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_date',
            array(
                'label' => __( 'Show Date', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_author_name',
            array(
                'default' => $this->defaults['blog_author_name'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_author_name',
            array(
                'label' => __( 'Show Author', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_comment_num',
            array(
                'default' => $this->defaults['blog_comment_num'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_comment_num',
            array(
                'label' => __( 'Show Comment', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_cats',
            array(
                'default' => $this->defaults['blog_cats'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_cats',
            array(
                'label' => __( 'Show Category', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_view',
            array(
                'default' => $this->defaults['blog_view'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_view',
            array(
                'label' => __( 'Show Views', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_length',
            array(
                'default' => $this->defaults['blog_length'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_length',
            array(
                'label' => __( 'Show Reading Length', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
            )
        ) );

        $wp_customize->add_setting( 'blog_video',
            array(
                'default' => $this->defaults['blog_video'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_video',
            array(
                'label' => __( 'Show Video', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
            )
        ) );

        $wp_customize->add_setting( 'blog_read_more',
            array(
                'default' => $this->defaults['blog_read_more'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_read_more',
            array(
                'label' => __( 'Show Read More', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
            )
        ) );

        /*Animation*/
        $wp_customize->add_setting( 'blog_animation',
            array(
                'default' => $this->defaults['blog_animation'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'blog_animation',
            array(
                'label' => __( 'Animation On/Off', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
                'type' => 'select',
                'choices' => array(
                    'wow' => esc_html__( 'Animation On', 'quiklearn' ),
                    'hide' => esc_html__( 'Animation Off', 'quiklearn' ),
                ),
            )
        );

        $wp_customize->add_setting( 'blog_animation_effect',
            array(
                'default' => $this->defaults['blog_animation_effect'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'blog_animation_effect',
            array(
                'label' => __( 'Entrance Animation', 'quiklearn' ),
                'section' => 'blog_post_settings_section',
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
	new QuiklearnTheme_Blog_Post_Settings();
}
