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

class RT_Button extends Custom_Widget_Base {
	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Button', 'quiklearn-core' );
		$this->rt_base = 'rt-button';
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
				'id'      => 'style',
				'label'   => esc_html__( 'Button Style', 'quiklearn-core' ),
				'options' => array(
					'style-1' => esc_html__( 'Style 1' , 'quiklearn-core' ),
					'style-2' => esc_html__( 'Style 2', 'quiklearn-core' ),
					'style-3' => esc_html__( 'Style 3', 'quiklearn-core' ),
				),
				'default' => 'style-1',
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'	  => 'responsive',
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
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				),
			),
			array(
				'type'    	  => Controls_Manager::TEXT,
				'id'      	  => 'buttontext',
				'label'   	  => esc_html__( 'Button Text', 'quiklearn-core' ),
				'default' 	  => esc_html__( 'Contact Us', 'quiklearn-core' ),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'buttonurl',
				'label'   => esc_html__( 'Button URL', 'quiklearn-core' ),
				'placeholder' => 'https://your-link.com',
			),
			/*icon*/
			array(	
				'id'      => 'selected_icon',
				'label' => esc_html__( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-plus',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'chevron-down',
						'angle-down',
						'angle-double-down',
						'caret-down',
						'caret-square-down',
					],
					'fa-regular' => [
						'caret-square-down',
					],
				],
				'skin' => 'inline',
				'label_block' => false,
			),
			array(
				'mode' => 'section_end',
			),
			// Button style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_button_style',
				'label'   => esc_html__( 'Button Style', 'quiklearn-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button_typo',
				'label'   => esc_html__( 'Button Typo', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-button .button-link',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text_color',
				'label'   => esc_html__( 'Text Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-link' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_text_hover_color',
				'label'   => esc_html__( 'Text Hover Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-link:hover' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bag_color',
				'label'   => esc_html__( 'Background Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-link' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bag_hover_color',
				'label'   => esc_html__( 'Background Hover Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-link::before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .rt-button .button-link::after' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_border_color',
				'label'   => esc_html__( 'Border Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-link' => 'border: 1px solid {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_border_hover_color',
				'label'   => esc_html__( 'Border Hover Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-link:hover' => 'border: 1px solid {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_radius',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Radius', 'quiklearn-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-button .button-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),	
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'button_padding',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Button Padding', 'quiklearn-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-button .button-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end',
			),

			// Icon style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Icon', 'quiklearn-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'id'      => 'icon_align',
				'label' => esc_html__( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Start', 'elementor' ),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__( 'End', 'elementor' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => is_rtl() ? 'right' : 'left',
				'toggle' => false,
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'icon_typo',
				'label'   => esc_html__( 'Icon Typo', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-button .icon',
			),			
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-link .icon' => 'color: {{VALUE}}',
				),
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_active_color',
				'label'   => esc_html__( 'Hover  Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .button-link:hover .icon' => 'color: {{VALUE}}',
				),
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'line_color',
				'label'   => esc_html__( 'Line  Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-button .icon i' => 'border-color: {{VALUE}}',
				),
			),
			array(
				'id'      => 'icon_space',
				'label' => esc_html__( 'Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-button .button-text-left' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rt-button .button-text-right' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
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
		$template = 'rt-button';
		return $this->rt_template( $template, $data );
	}
}