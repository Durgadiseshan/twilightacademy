<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Quiklearn_Core;
use Elementor\Plugin;
use QuiklearnTheme_Helper;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Custom_Widget_Init {

	public function __construct() {
		add_action( 'elementor/widgets/register', array( $this, 'init' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'widget_categoty' ) );
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_style' ) );
		
		/*ajax actions*/
		add_filter( 'elementor/icons_manager/additional_tabs',  [$this, 'additional_tabs'], 10, 1 );
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'after_enqueue_styles_elementor_editor' ), 10, 1 );

		/*Elementor image scroll parallex*/
		add_action( 'elementor/element/section/section_background/before_section_end', array($this,'add_elementor_section_background_controls') );
		add_action( 'elementor/frontend/section/before_render', array($this,'render_elementor_section_parallax_background') );
	}
	
	public function after_enqueue_styles_elementor_editor()	{
		wp_enqueue_style( 'flaticon', \QuiklearnTheme_Helper::get_font_css( 'flaticon' ) );		
	}


	public function editor_style() {
		$img = plugins_url( 'icon.png', __FILE__ );
		wp_add_inline_style( 'elementor-editor', '.elementor-element .icon .rdtheme-el-custom{content: url( '.$img.');width: 28px;}' );
		wp_add_inline_style( 'elementor-editor', '.select2-container--default .select2-selection--single {min-width: 126px !important; min-height: 30px !important;}' );
	}

	public function init() {
		require_once __DIR__ . '/base.php';
		
		// Widgets -- filename=>classname /@dev
		$widgets1 = array(
			'rt-title'				=> 'RT_Title',
			'rt-title-with-text'	=> 'RT_Title_With_Text',
			'rt-hero-banner'		=> 'RT_Hero_Banner',
			'rt-button'				=> 'RT_Button',
			'rt-cta'				=> 'RT_Call_Action',
			'rt-info-box'			=> 'RT_Info_Box',
			'rt-contact-info'		=> 'RT_Contact_Info',
			'rt-social-icons'		=> 'RT_Social_Icons',
			'rt-counter'			=> 'RT_Counter',
			'rt-progress-bar'		=> 'RT_Progress_Bar',
			'rt-pricing-table'		=> 'RT_Pricing_Table',
			'rt-post-grid'			=> 'RT_Post_Grid',
			'rt-post-slider'		=> 'RT_Post_Slider',
			'rt-testimonial'		=> 'RT_Testimonials',
			'rt-logo-slider'		=> 'RT_Logo_Slider',
			'rt-video'				=> 'RT_Video',
			'rt-accordion'			=> 'RT_Accordion',
			'rt-image'				=> 'RT_Image',
			'rt-shape'				=> 'RT_Shape',
		);

		$widgets2 = [];
		if ( class_exists( 'LearnPress' ) ) {
            $widgets2 = array(
                'rt-instructor'   		=> 'RT_Instructor',
                'rt-course-grid'   		=> 'RT_Course_Grid',
                'rt-course-slider'  	=> 'RT_Course_Slider',
                'rt-course-isotope' 	=> 'RT_Course_Isotope',
                'rt-course-category'   	=> 'RT_Course_Category',
                'rt-course-search'   	=> 'RT_Course_Search',
            );
        }


		$widgets = array_merge($widgets1, $widgets2);
		
		foreach ( $widgets as $widget => $class ) {
			$template_name = "/elementor-custom/widgets/{$widget}.php";
			if ( file_exists( STYLESHEETPATH . $template_name ) ) {
				$file = STYLESHEETPATH . $template_name;
			}
			elseif ( file_exists( TEMPLATEPATH . $template_name ) ) {
				$file = TEMPLATEPATH . $template_name;
			}
			else {
				$file = __DIR__ . '/widgets/' . $widget. '.php';
			}

			require_once $file;
			
			$classname = __NAMESPACE__ . '\\' . $class;
			Plugin::instance()->widgets_manager->register( new $classname );
		}
	}

	public function widget_categoty( $class ) {
		$id         = QUIKLEARN_CORE_THEME_PREFIX . '-widgets'; // Category /@dev
		$properties = array(
			'title' => __( 'RadiusTheme Elements', 'quiklearn-core' ),
		);

		Plugin::$instance->elements_manager->add_category( $id, $properties );
	}
	
	public function custom_icon_for_elementor( $controls_registry )
	{
		// Get existing icons
		$icons = $controls_registry->get_control( 'icon' )->get_settings( 'options' );
		// Append new icons		
		$flaticons = QuiklearnTheme_Helper::get_flaticon_icons();
		// Then we set a new list of icons as the options of the icon control
		$new_icons = array_merge($flaticons, $icons);
		$controls_registry->get_control( 'icon' )->set_settings( 'options', $new_icons );
	}

	public function additional_tabs($tabs)
      {
        $json_url = QuiklearnTheme_Helper::get_asset_file('json/flaticon.json');

        $flaticon = [
          'name'          => 'flaticon',
          'label'         => esc_html__( 'Quiklearn Icon', 'quiklearn-core' ),
          'url'           => false,
          'enqueue'       => false,
          'prefix'        => '',
          'displayPrefix' => '',
          'labelIcon'     => 'fab fa-font-awesome-alt',
          'ver'           => '1.0.0',
          'fetchJson'     => $json_url,
        ];
        array_push( $tabs, $flaticon);

        return $tabs;
      }

  function add_elementor_section_background_controls( \Elementor\Element_Section $section ) {

		$section->add_control(
			'rt_section_parallax',
			[
				'label' => __( 'Parallax', 'quiklearn-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => __( 'Off', 'quiklearn-core' ),
				'label_on' => __( 'On', 'quiklearn-core' ),
				'default' => 'no',
				'prefix_class' => 'rt-parallax-bg-',
			]
		);

		$section->add_control(
			'rt_parallax_speed',
			[
				'label' => __( 'Speed', 'quiklearn-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0.1,
				'max' => 5,
				'step' => 0.1,
				'default' => 0.5,
				'condition' => [
					'rt_section_parallax' => 'yes'
				]
			]
		);

		$section->add_control(
			'rt_parallax_transition',
			[
				'label' => __( 'Parallax Transition off?', 'quiklearn-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => __( 'on', 'quiklearn-core' ),
				'label_on' => __( 'Off', 'quiklearn-core' ),
				'default' => 'off',
				'return_value' => 'off',
				'prefix_class' => 'rt-parallax-transition-',
				'condition' => [
					'rt_section_parallax' => 'yes'
				]
			]
		);

	}

	// Render section background parallax
	function render_elementor_section_parallax_background( \Elementor\Element_Base $element ) {

		if('section' === $element->get_name()){
			if ( 'yes' === $element->get_settings_for_display( 'rt_section_parallax' ) ) {
				$rt_background = $element->get_settings_for_display( 'background_image' );
				if( ! isset($rt_background ) ) {
					return;
				}
				$rt_background_URL = $rt_background['url'];
				$data_speed = $element->get_settings_for_display( 'rt_parallax_speed' );

				$element->add_render_attribute( '_wrapper', [
					'data-speed' => $data_speed,
					'data-bg-image' => $rt_background_URL,
				] ) ;
			}
		}
	}

}

new Custom_Widget_Init();