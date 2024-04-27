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

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class QuiklearnTheme_Event_Post_Settings extends QuiklearnTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_event_post_controls' ) );
	}

    /**
     * Event Post Controls
     */
    public function register_event_post_controls( $wp_customize ) {

        // Archive Event Post
        $wp_customize->add_setting('event_archive_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'event_archive_heading', array(
            'label' => __( 'Archive Event Option', 'quiklearn' ),
            'section' => 'rttheme_event_settings',
        )));

        $wp_customize->add_setting( 'event_ar_cat',
            array(
                'default' => $this->defaults['event_ar_cat'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_ar_cat',
            array(
                'label' => __( 'Show Category', 'quiklearn' ),
                'section' => 'rttheme_event_settings',
            )
        ));

        $wp_customize->add_setting( 'event_ar_date',
            array(
                'default' => $this->defaults['event_ar_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_ar_date',
            array(
                'label' => __( 'Show Date', 'quiklearn' ),
                'section' => 'rttheme_event_settings',
            )
        ));

        $wp_customize->add_setting( 'event_ar_location',
            array(
                'default' => $this->defaults['event_ar_location'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_ar_location',
            array(
                'label' => __( 'Show Location', 'quiklearn' ),
                'section' => 'rttheme_event_settings',
            )
        ));

        $wp_customize->add_setting( 'event_ar_price',
            array(
                'default' => $this->defaults['event_ar_price'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_ar_price',
            array(
                'label' => __( 'Show Price', 'quiklearn' ),
                'section' => 'rttheme_event_settings',
            )
        ));

        $wp_customize->add_setting( 'event_ar_search',
            array(
                'default' => $this->defaults['event_ar_search'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_ar_search',
            array(
                'label' => __( 'Show Search', 'quiklearn' ),
                'section' => 'rttheme_event_settings',
            )
        ));

        $wp_customize->add_setting( 'event_ar_excerpt',
            array(
                'default' => $this->defaults['event_ar_excerpt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'event_ar_excerpt',
            array(
                'label' => __( 'Show Excerpt', 'quiklearn' ),
                'section' => 'rttheme_event_settings',
            )
        ));

        $wp_customize->add_setting( 'event_content_limit',
            array(
                'default' => $this->defaults['event_content_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'event_content_limit',
            array(
                'label' => __( 'Event Excerpt Limit', 'quiklearn' ),
                'section' => 'rttheme_event_settings',
                'type' => 'number',
                'active_callback' => 'rttheme_is_event_excerpt_enabled',
            )
        );

        // Single Event Post
        $wp_customize->add_setting('event_single_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'event_single_heading', array(
            'label' => __( 'Single Event Option', 'quiklearn' ),
            'section' => 'rttheme_event_settings',
        )));

        $wp_customize->add_setting( 'single_event_related',
            array(
                'default' => $this->defaults['single_event_related'],
                'transport' => 'refresh',
                'sanitize_callback' => 'rttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'single_event_related',
            array(
                'label' => __( 'Show Related Event', 'quiklearn' ),
                'section' => 'rttheme_event_settings',
            )
        ));

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new QuiklearnTheme_Event_Post_Settings();
}
