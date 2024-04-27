<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Quiklearn_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Call_Action extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT CTA', 'quiklearn-core' );
		$this->rt_base = 'rt-call-action';
		parent::__construct( $data, $args );
	}	

	public function rt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'quiklearn-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'container',
				'label'   => esc_html__( 'Container', 'quiklearn-core' ),
				'options' => array(
					'no' => esc_html__( 'Container' , 'quiklearn-core' ),
					'yes' => esc_html__( 'container Fluid', 'quiklearn-core' ),
				),
				'default' => 'style-1',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'quiklearn-core' ),
				'default' => esc_html__( 'Affordable Online Courses & Learning Opportunities For You', 'quiklearn-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'cta_image',
				'label'   => esc_html__( 'Image', 'quiklearn-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'quiklearn-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'shape',
				'label'   => esc_html__( 'Shape', 'quiklearn-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended image size 378 X 198', 'quiklearn-core' ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'quiklearn-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'button_style',
				'label'   => esc_html__( 'Button Style', 'quiklearn-core' ),
				'options' => array(
					'style-1' => esc_html__( 'Style 1' , 'quiklearn-core' ),
					'style-2' => esc_html__( 'Style 2', 'quiklearn-core' ),
				),
				'default' => 'style-1',
			),
			array(
				'type'    	  => Controls_Manager::TEXT,
				'id'      	  => 'buttontext',
				'label'   	  => esc_html__( 'Button Text', 'quiklearn-core' ),
				'default' 	  => esc_html__( 'Start Learning Today', 'quiklearn-core' ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'buttonurl',
				'label'   => esc_html__( 'Button URL', 'quiklearn-core' ),
				'placeholder' => 'https://your-link.com',
			),

			array(
				'mode' => 'section_end',
			),
			/* Style */
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_style',
	            'label'   => esc_html__( 'CTA Style', 'quiklearn-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_bg_color',
				'label'   => esc_html__( 'Box BG Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-call-action' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-call-action .rt-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-call-action .rt-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'phone_typo',
				'label'   => esc_html__( 'Phone Typo', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-call-action .rt-phone',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'phone_color',
				'label'   => esc_html__( 'Phone Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-call-action .rt-phone a' => 'color: {{VALUE}}',
				),
			),
	        array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'rt-cta';

		return $this->rt_template( $template, $data );
	}
}