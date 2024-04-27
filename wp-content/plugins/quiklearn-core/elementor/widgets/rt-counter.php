<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Quiklearn_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Counter extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->rt_name = __( 'RT Counter', 'quiklearn-core' );
		$this->rt_base = 'rt-counter';
		parent::__construct( $data, $args );
	}

	private function rt_load_scripts(){
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'waypoints' );
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
				'id'      => 'style',
				'label'   => esc_html__( 'Counter Layout', 'quiklearn-core' ),
				'options' => array(
					'1' => esc_html__( 'Layout 01' , 'quiklearn-core' ),
					'2' => esc_html__( 'Layout 02' , 'quiklearn-core' ),
					'3' => esc_html__( 'Layout 03' , 'quiklearn-core' ),
					'4' => esc_html__( 'Layout 04' , 'quiklearn-core' ),
				),
				'default' => '1',
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Alignment', 'quiklearn-core' ),
				'options' => array(
					'left' => array(
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					),
					'right' => array(
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					),
				),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter-box' => 'text-align: {{VALUE}};',
				),
			),
			array(
				'type'    => Controls_Manager::SWITCHER,
				'id'      => 'showhide',
				'label'   => esc_html__( 'Icon', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'Show', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Hide', 'quiklearn-core' ),
				'default'     => 'yes',
				'condition'   => array( 'style!' => array( '3' ) ),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'quiklearn-core' ),
				'default' => array(
					'value' => 'fas fa-award',
					'library' => 'fa-solid',
				),
				'condition'   => array( 'showhide' =>'yes', 'style!' => array( '3' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'quiklearn-core' ),
				'default' => esc_html__( 'Experiences', 'quiklearn-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Counter Number', 'quiklearn-core' ),
				'default' => 25,
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'after_text',
				'label'   => esc_html__( 'Counter Unit', 'quiklearn-core' ),
				'default' => esc_html__( '+', 'quiklearn-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'speed',
				'label'   => esc_html__( 'Animation Speed', 'quiklearn-core' ),
				'default' => 5000,
				'description' => esc_html__( 'The total duration of the count animation in milisecond eg. 5000', 'quiklearn-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'steps',
				'label'   => esc_html__( 'Animation Steps', 'quiklearn-core' ),
				'default' => 10,
				'description' => esc_html__( 'Counter steps eg. 10', 'quiklearn-core' ),
			),
			array(
				'type'    => Controls_Manager::SWITCHER,
				'id'      => 'shape_display',
				'label'   => esc_html__( 'BG Shape', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'Show', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Hide', 'quiklearn-core' ),
				'default'     => 'yes',
				'condition'   => array( 'style!' => array( '3', '4' ) ),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'bg_shape_icon',
				'label'   => esc_html__( 'BG Shape Icon', 'quiklearn-core' ),
				'default' => array(
					'value' => 'icon-quiklearn-photography',
					'library' => 'fa-solid',
				),
				'condition'   => array( 'shape_display' =>'yes', 'style!' => array( '3', '4' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			// Box Style
			array(
				'mode'    => 'section_start',
				'id'      => 'bg_style',
				'label'   => esc_html__( 'Box background', 'quiklearn-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( '2' ) ),
			),
			array(
				'type'    => Controls_Manager::SWITCHER,
				'id'      => 'bg_showhide',
				'label'   => esc_html__( 'Box Background Color', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'Show', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Hide', 'quiklearn-core' ),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_bg',
				'label'   => esc_html__( 'Box Background Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter-box .rt-item' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .rt-counter-style1 .item-angle:after' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'bg_showhide' =>'yes' ),
			),	
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_padding',
	            'label'   => __( 'Box Padding', 'quiklearn-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-counter-box .rt-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',                    
	            ),
	        ),
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_radius',
	            'label'   => __( 'Radius', 'quiklearn-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-counter-box .rt-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',                    
	            ),
	        ),
			array(
				'mode' => 'section_end',
			),			
			// Box 3 Style
			array(
				'mode'    => 'section_start',
				'id'      => 'box3_style',
				'label'   => esc_html__( 'Box Style', 'quiklearn-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( '3' ) ),
			),			
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'box_width',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Box Width', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 100,
						'max' => 500,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .rt-counter-3 .rt-item' => 'width: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'box_height',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Box Height', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 100,
						'max' => 500,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .rt-counter-3 .rt-item' => 'height: {{SIZE}}{{UNIT}};',
				),
			),
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box3_radius',
	            'label'   => __( 'Radius', 'quiklearn-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-counter-3 .rt-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',                    
	            ),
	        ),
			array(
				'mode' => 'section_end',
			),
			// Title Style
			array(
				'mode'    => 'section_start',
				'id'      => 'title_style',
				'label'   => esc_html__( 'Title', 'quiklearn-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-counter-box .rt-item .rt-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter-box .rt-item .rt-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Counter Style
			array(
				'mode'    => 'section_start',
				'id'      => 'counter_style',
				'label'   => esc_html__( 'Counter', 'quiklearn-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'counter_typo',
				'label'   => esc_html__( 'Counter Style', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-counter-box .rt-item .counter-number',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'counter_color',
				'label'   => esc_html__( 'Counter Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter-box .rt-item .counter-number' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'counter_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Counter Space', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .rt-counter-box .rt-item .counter-number' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Icon Style
			array(
				'mode'    => 'section_start',
				'id'      => 'icon_style',
				'label'   => esc_html__( 'Icon', 'quiklearn-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style!' => array( '3' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter-box .rt-item .rt-media' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-counter-box .rt-item .rt-media path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .rt-counter-box .rt-item .rt-media ellipse' => 'fill: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_hover_color',
				'label'   => esc_html__( 'Hover Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter-box .rt-item:hover .rt-media' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-counter-box .rt-item:hover .rt-media path' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .rt-counter-box .rt-item:hover .rt-media ellipse' => 'fill: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Font Size', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter-box .rt-item .rt-media' => 'font-size: {{VALUE}}px',
					'{{WRAPPER}} .rt-counter-box .rt-item .rt-media svg' => 'width: {{VALUE}}px',
				),
			),			
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_shape_color',
				'label'   => esc_html__( 'BG Shape Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter-box .shape-icon path' => 'fill: {{VALUE}}',
				),
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_shape_size',
				'label'   => esc_html__( 'BG Shape Size', 'quiklearn-core' ),
				'description' => esc_html__( 'BG Shape Size Default scale(1)', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-counter-box .shape-icon svg' => 'transform: scale({{VALUE}})',
				),
			),

			array(
				'mode' => 'section_end',
			),
			// Animation style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_animation_style',
	            'label'   => esc_html__( 'Animation', 'quiklearn-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation',
				'label'   => esc_html__( 'Animation', 'quiklearn-core' ),
				'options' => array(
					'wow'        => esc_html__( 'On', 'quiklearn-core' ),
					'hide'        => esc_html__( 'Off', 'quiklearn-core' ),
				),
				'default' => 'hide',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_effect',
				'label'   => esc_html__( 'Entrance Animation', 'quiklearn-core' ),
				'options' => array(
                    'none' => esc_html__( 'none', 'quiklearn-core' ),
					'bounce' => esc_html__( 'bounce', 'quiklearn-core' ),
					'flash' => esc_html__( 'flash', 'quiklearn-core' ),
					'pulse' => esc_html__( 'pulse', 'quiklearn-core' ),
					'rubberBand' => esc_html__( 'rubberBand', 'quiklearn-core' ),
					'shakeX' => esc_html__( 'shakeX', 'quiklearn-core' ),
					'shakeY' => esc_html__( 'shakeY', 'quiklearn-core' ),
					'headShake' => esc_html__( 'headShake', 'quiklearn-core' ),
					'swing' => esc_html__( 'swing', 'quiklearn-core' ),					
					'fadeIn' => esc_html__( 'fadeIn', 'quiklearn-core' ),
					'fadeInDown' => esc_html__( 'fadeInDown', 'quiklearn-core' ),
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'quiklearn-core' ),
					'fadeInRight' => esc_html__( 'fadeInRight', 'quiklearn-core' ),
					'fadeInUp' => esc_html__( 'fadeInUp', 'quiklearn-core' ),					
					'bounceIn' => esc_html__( 'bounceIn', 'quiklearn-core' ),
					'bounceInDown' => esc_html__( 'bounceInDown', 'quiklearn-core' ),
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'quiklearn-core' ),
					'bounceInRight' => esc_html__( 'bounceInRight', 'quiklearn-core' ),
					'bounceInUp' => esc_html__( 'bounceInUp', 'quiklearn-core' ),			
					'slideInDown' => esc_html__( 'slideInDown', 'quiklearn-core' ),
					'slideInLeft' => esc_html__( 'slideInLeft', 'quiklearn-core' ),
					'slideInRight' => esc_html__( 'slideInRight', 'quiklearn-core' ),
					'slideInUp' => esc_html__( 'slideInUp', 'quiklearn-core' ), 
                ),
				'default' => 'fadeInUp',
				'condition'   => array('animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'delay',
				'label'   => esc_html__( 'Delay', 'quiklearn-core' ),
				'default' => '0.2',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'duration',
				'label'   => esc_html__( 'Duration', 'quiklearn-core' ),
				'default' => '1.2',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		$this->rt_load_scripts();
		$template = 'rt-counter-1';
		$template = 'rt-counter-'.$data['style'];
		return $this->rt_template( $template, $data );
	}

}