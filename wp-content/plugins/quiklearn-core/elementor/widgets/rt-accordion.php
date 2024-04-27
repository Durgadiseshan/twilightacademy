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

class RT_Accordion extends Custom_Widget_Base{
    public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Accordion', 'quiklearn-core' );
		$this->rt_base = 'rt-accordion';
		parent::__construct( $data, $args );
	}
    public function rt_fields(){
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'title', array(
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Title', 'quiklearn-core' ),
				'default' => esc_html__( 'List Title' , 'quiklearn-core' ),
				'label_block' => true,
            )
		);
        $repeater->add_control(
			'accodion_text', array(
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label' => esc_html__( 'Content', 'quiklearn-core' ),
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pretium accumsan risus orci in tellus velit rhoncus turpis. Massa varius venenatis felis in non non fusce.' , 'quiklearn-core' ),
				'show_label' => false,
            )
		);
		$repeater->add_control(
			'ac_selected_icon', 
			array(
				'label' => esc_html__( 'Icon', 'quiklearn-core' ),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
				'fa4compatibility' => 'icon',
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
            )			
		);
		$repeater->add_control(
			'ac_selected_active_icon', 
			array(
				'label' => esc_html__( 'Active Icon', 'elementor' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon_active',
				'recommended' => [
					'fa-solid' => [
						'chevron-up',
						'angle-up',
						'angle-double-up',
						'caret-up',
						'caret-square-up',
					],
					'fa-regular' => [
						'caret-square-up',
					],
				],
				'skin' => 'inline',
				'label_block' => false,
            )			
		);		

        $fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'quiklearn-core' ),
			),
            array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Accordion Style', 'finbuzz-core' ),
				'options' => array(
					'style-1' => esc_html__( 'Style 1' , 'finbuzz-core' ),
					'style-2' => esc_html__( 'Style 2', 'finbuzz-core' ),
					'style-3' => esc_html__( 'Style 3', 'finbuzz-core' ),
				),
				'default' => 'style-1',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'accordion_repeat',
				'label'   => esc_html__( 'Address', 'quiklearn-core' ),
				'title_field' => '{{{ title }}}',
				'fields' => $repeater->get_controls(),
				'default' => array(
					['title' => 'Do you offer discounts for students?', ],
					['title' => 'Do you offer special pricing for big teams?', ],
					['title' => 'What is the past experience of your teachers?', ],
				),
			),
			/*icon*/
			array(	
				'id'      => 'selected_icon',
				'label' => esc_html__( 'Icon', 'quiklearn-core' ),
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
				'id'      => 'selected_active_icon',
				'label' => esc_html__( 'Active Icon', 'elementor' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon_active',
				'default' => [
					'value' => 'fas fa-minus',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'chevron-up',
						'angle-up',
						'angle-double-up',
						'caret-up',
						'caret-square-up',
					],
					'fa-regular' => [
						'caret-square-up',
					],
				],
				'skin' => 'inline',
				'label_block' => false,
				'condition' => [
					'selected_icon[value]!' => '',
				],
			),
			array(
				'mode' => 'section_end',
			),
			// Accordion
			array(
				'id'      => 'accordion_style',
				'mode'    => 'section_start',
				'label'   => esc_html__( 'Accordion', 'quiklearn-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,				
			),			
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_bg_color',
				'label'   => esc_html__( 'Title Background Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-accordion-style-1 .rt-accordion-header .rt-accordion-button' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style-1' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_bg_active_color',
				'label'   => esc_html__( 'Title Background Active Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-accordion-style-1 .rt-accordion-header .rt-accordion-button:not(.collapsed)' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style-1' ) ),
			),
			array(
				'id'      => 'border_width',
				'label' => esc_html__( 'Border Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .rt-accordion .rt-accordion-header .rt-accordion-button' => 'border-width: {{SIZE}}{{UNIT}};',
				],
				'condition'   => array( 'style' => array( 'style-2' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'border_color',
				'label'   => esc_html__( 'Border Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-accordion .accordion-body' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .rt-accordion .rt-accordion-header .rt-accordion-button' => 'border-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style-2' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			// Title
			array(
				'id'      => 'title_style',
				'mode'    => 'section_start',
				'label'   => esc_html__( 'Title', 'quiklearn-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'name'     => 'title_typo',
				'mode'     => 'group',
				'type'     => Group_Control_Typography::get_type(),
				'label'    => __( 'Typography', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-accordion .rt-accordion-header',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-accordion .rt-accordion-header .rt-accordion-button' => 'color: {{VALUE}}',
				),
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_active_color',
				'label'   => esc_html__( 'Active Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-accordion .rt-accordion-header .rt-accordion-button:not(.collapsed)' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_padding',
	            'label'   => __( 'Padding', 'quiklearn-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-accordion .rt-accordion-header .rt-accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),            
			array(
				'mode' => 'section_end',
			),
			// Description
			array(
				'id'      => 'desc_style',
				'mode'    => 'section_start',
				'label'   => esc_html__( 'Description', 'quiklearn-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'name'     => 'desc_typo',
				'mode'     => 'group',
				'type'     => Group_Control_Typography::get_type(),
				'label'    => __( 'Typography', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-accordion .accordion-body',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'desc_color',
				'label'   => esc_html__( 'Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-accordion .accordion-body' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'content_padding',
	            'label'   => __( 'Padding', 'quiklearn-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-accordion .accordion-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
				'mode' => 'section_end',
			),
			// Icon
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Icon', 'quiklearn-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
            array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Size', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-accordion .rt-accordion-icon' => 'font-size: {{VALUE}}px',
				),
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
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-accordion-button.collapsed .rt-accordion-icon-closed' => 'color: {{VALUE}}',
				),
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_active_color',
				'label'   => esc_html__( 'Active  Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-accordion-button .rt-accordion-icon-opened' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .rt-accordion .rt-title-left' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .rt-accordion .rt-title-right' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end',
			),

		);
		return $fields;
    }
    protected function render() {
		$data = $this->get_settings();

		$template = 'rt-accordion';

		return $this->rt_template( $template, $data );
	}

}