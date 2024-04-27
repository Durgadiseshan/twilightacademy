<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Quiklearn_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Css_Filter;
use Elementor\Utils;
if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Testimonials extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){

		$this->rt_name = esc_html__( 'RT Testimonials', 'quiklearn-core' );
		$this->rt_base = 'rt-testimonials';
		$this->rt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '1 Col', 'quiklearn-core' ),
				'6'  => esc_html__( '2 Col', 'quiklearn-core' ),
				'4'  => esc_html__( '3 Col', 'quiklearn-core' ),
				'3'  => esc_html__( '4 Col', 'quiklearn-core' ),
				'2'  => esc_html__( '6 Col', 'quiklearn-core' ),
			),
		);
		parent::__construct( $data, $args );
	}

	public function rt_fields(){

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
            'image',[
                'type' => Controls_Manager::MEDIA,
				'label'   => esc_html__( 'Author', 'quiklearn-core' ),
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'description' => esc_html__( 'Image size should be 90x90px', 'quiklearn-core' ),
            ]
        );

		$repeater->add_control(
            'title',[
                'type' => Controls_Manager::TEXT,
                'label'   => esc_html__( 'Title', 'quiklearn-core' ),
            ]
        );

		$repeater->add_control(
            'designation',[
                'type' => Controls_Manager::TEXT,
                'label'   => esc_html__( 'Designation', 'quiklearn-core' ),
            ]
        );

		$repeater->add_control(
            'content',[
                'type' => Controls_Manager::WYSIWYG,
                'label'   => esc_html__( 'Testimonials Content', 'quiklearn-core' ),
            ]
        );

        $repeater->add_control(
            'selected_icon',[
                'label' => esc_html__( 'Icon', 'quiklearn-core' ),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-quote-right',
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
            ]
        );

		$repeater->add_control(
			'item_color', [
				'type' => Controls_Manager::COLOR,
				'label'   => esc_html__( 'Item Bg Color', 'techkit-core' ),
				'default'  => '',
				'label_block' => true,
			]
		);

		$repeater->add_control(
            'rating',[
                'type' => Controls_Manager::SELECT2,
                'label'   => esc_html__( 'Rating', 'quiklearn-core' ),
				'options' => array(
					'1' => esc_html__( 'Rating 1', 'quiklearn-core' ),
					'2' => esc_html__( 'Rating 2', 'quiklearn-core' ),
					'3' => esc_html__( 'Rating 3', 'quiklearn-core' ),
					'4' => esc_html__( 'Rating 4', 'quiklearn-core' ),
					'5' => esc_html__( 'Rating 5', 'quiklearn-core' ),
				),
            ]
        );

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'quiklearn-core' ),

			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'layout',
				'label'   => esc_html__( 'Layout', 'quiklearn-core' ),
				'options' => array(
					'layout1' => esc_html__( 'Grid Layout 1', 'quiklearn-core' ),
					'layout2' => esc_html__( 'Grid Layout 2', 'quiklearn-core' ),
					'layout3' => esc_html__( 'Slider Layout 1', 'quiklearn-core' ),
					'layout4' => esc_html__( 'Slider Layout 2', 'quiklearn-core' ),
					'layout5' => esc_html__( 'Slider Layout 3', 'quiklearn-core' ),
					'layout6' => esc_html__( 'Slider Layout 4', 'quiklearn-core' ),
				),
				'default' => 'layout1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'marquee_direction',
				'label'   => esc_html__( 'Marquee', 'quiklearn-core' ),
				'options' => array(
					'marquee_left' => esc_html__( 'Left Direction' , 'quiklearn-core' ),
					'marquee_right' => esc_html__( 'Right Direction', 'quiklearn-core' ),
				),
				'default' => 'marquee_left',
				'condition'   => array( 'layout' => array( 'layout6' ) ),
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
					'{{WRAPPER}} .rt-testimonial-default .item-content' => 'text-align: {{VALUE}};',
				),
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'testimonials',
				'label'   => esc_html__( 'Add as many testimonials as you want', 'quiklearn-core' ),
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array('title' => 'Mr. K Jackerty', 'designation' => 'CEO, Marketing', 'content' => '“When an unknown printer took alley ffer area typey and scrambled to make a type specimen book hass“', 'rating' => 5 ),
					array('title' => 'Esther Howard', 'designation' => 'CEO, Marketing', 'content' => '“When an unknown printer took alley ffer area typey and scrambled to make a type specimen book hass“', 'rating' => 5 ),
					array('title' => 'Richard Whalen', 'designation' => 'CEO, Marketing', 'content' => '“When an unknown printer took alley ffer area typey and scrambled to make a type specimen book hass“', 'rating' => 5 ),
					array('title' => 'Neel Eonathon', 'designation' => 'CEO, Marketing', 'content' => '“When an unknown printer took alley ffer area typey and scrambled to make a type specimen book hass“', 'rating' => 5 ),
				),
			),        
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'item_gutter',
				'label'   => esc_html__( 'Item Gutter', 'quiklearn-core' ),
				'options' => array(
					'g-0' => esc_html__( 'Gutters 0', 'quiklearn-core' ),
					'g-1' => esc_html__( 'Gutters 1', 'quiklearn-core' ),
					'g-2' => esc_html__( 'Gutters 2', 'quiklearn-core' ),
					'g-3' => esc_html__( 'Gutters 3', 'quiklearn-core' ),
					'g-4' => esc_html__( 'Gutters 4', 'quiklearn-core' ),
					'g-5' => esc_html__( 'Gutters 5', 'quiklearn-core' ),
				),
				'default' => 'g-4',
				'condition'   => array( 'layout' => array( 'layout1', 'layout2' ) ),
			),
			array(
				'mode' => 'section_end',
			),

			// Option
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Option', 'quiklearn-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'rating_display',
				'label'       => esc_html__( 'Rating Display', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'On', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Off', 'quiklearn-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Rating. Default: Off', 'quiklearn-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'designation_display',
				'label'       => esc_html__( 'Designation Display', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'On', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Off', 'quiklearn-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Show or Hide designation. Default: Off', 'quiklearn-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'author_display',
				'label'       => esc_html__( 'Author Display', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'On', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Off', 'quiklearn-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Rating. Default: Off', 'quiklearn-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'quote_display',
				'label'       => esc_html__( 'Quote Display', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'On', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Off', 'quiklearn-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Rating. Default: On', 'quiklearn-core' ),
				'condition'   => array( 'layout!' => array( 'layout5') ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_bag',
				'label'   => esc_html__( 'Background Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-testimonial-default .item-content' => 'background-color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_padding',
	            'label'   => __( 'Box Padding', 'quiklearn-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-testimonial-default .item-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_radius',
	            'label'   => __( 'Box Radius', 'quiklearn-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-testimonial-default .item-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'Image Blend', 'quiklearn-core' ),	
				'name' => 'blend', 
				'selector' => '{{WRAPPER}} .rt-testimonial-default .rt-thumnail-area .item-img img',
			),
			array(
				'mode' => 'section_end',
			),
			// Title style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_title_style',
	            'label'   => esc_html__( 'Title Style', 'quiklearn-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-testimonial-default .item-content .item-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-testimonial-default .item-content .item-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'title_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Title Space', 'quiklearn-core' ),
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
					'{{WRAPPER}} .rt-testimonial-default .item-content .item-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Sub Title style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'designation_style',
	            'label'   => esc_html__( 'Designation Style', 'quiklearn-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'designation_typo',
				'label'   => esc_html__( 'Designation Typo', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-testimonial-default .item-content .item-designation',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'designation_color',
				'label'   => esc_html__( 'Designation Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-testimonial-default .item-content .item-designation' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'designation_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Designation Space', 'quiklearn-core' ),
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
					'{{WRAPPER}} .rt-testimonial-default .item-content .item-designation' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Content style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_content_style',
	            'label'   => esc_html__( 'Content Style', 'quiklearn-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),	
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'content_typo',
				'label'   => esc_html__( 'Content Typo', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-testimonial-default .item-content .tcontent',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'content_color',
				'label'   => esc_html__( 'Content Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-testimonial-default .item-content .tcontent' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'content_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Content Space', 'quiklearn-core' ),
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
					'{{WRAPPER}} .rt-testimonial-default .item-content .tcontent' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Quote style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_quote_style',
	            'label'   => esc_html__( 'Quote Style', 'quiklearn-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'layout!' => array( 'layout5') ),
	        ),	
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'quote_typo',
				'label'   => esc_html__( 'Quote Typo', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-testimonial-default .item-content .tquote',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'quote_color',
				'label'   => esc_html__( 'Quote Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-testimonial-default .item-content .tquote' => 'color: {{VALUE}}',
					'{{WRAPPER}} .testimonial-slider-layout4 .tquote' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'quote_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Quote Space', 'quiklearn-core' ),
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
					'{{WRAPPER}} .rt-testimonial-default .item-content .tquote' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
				'condition'   => array( 'layout!' => array( 'layout5') ),
	        ),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation',
				'label'   => esc_html__( 'Animation', 'quiklearn-core' ),
				'options' => array(
					'wow'        => esc_html__( 'On', 'quiklearn-core' ),
					'hide'        => esc_html__( 'Off', 'quiklearn-core' ),
				),
				'default' => 'wow',
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
			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'quiklearn-core' ),
				'condition'   => array( 'layout' => array( 'layout1', 'layout2' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xl',
				'label'   => esc_html__( 'Desktops: > 1199px', 'quiklearn-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '3',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 991px', 'quiklearn-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Tablets: > 767px', 'quiklearn-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Phones: > 576px', 'quiklearn-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col',
				'label'   => esc_html__( 'Phones: < 576px', 'quiklearn-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'mode' => 'section_end',
			),

			// Responsive Slider Columns
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider_perview',
				'label'       => esc_html__( 'Per View Options', 'quiklearn-core' ),
				'condition'   => array( 'layout' => array( 'layout3', 'layout4' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'desktop',
				'label'   => esc_html__( 'Desktops: > 1600px', 'quiklearn-core' ),
				'default' => '4',
				'options' => array(
					'1' => esc_html__( '1', 'quiklearn-core' ),
					'2' => esc_html__( '2', 'quiklearn-core' ),
					'3' => esc_html__( '3',  'quiklearn-core' ),
					'4' => esc_html__( '4',  'quiklearn-core' ),
					'5' => esc_html__( '5',  'quiklearn-core' ),
					'6' => esc_html__( '6',  'quiklearn-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'md_desktop',
				'label'   => esc_html__( 'Desktops: > 1200px', 'quiklearn-core' ),
				'default' => '3',
				'options' => array(
					'1' => esc_html__( '1', 'quiklearn-core' ),
					'2' => esc_html__( '2', 'quiklearn-core' ),
					'3' => esc_html__( '3',  'quiklearn-core' ),
					'4' => esc_html__( '4',  'quiklearn-core' ),
					'5' => esc_html__( '5',  'quiklearn-core' ),
					'6' => esc_html__( '6',  'quiklearn-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'sm_desktop',
				'label'   => esc_html__( 'Desktops: > 992px', 'quiklearn-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'quiklearn-core' ),
					'2' => esc_html__( '2', 'quiklearn-core' ),
					'3' => esc_html__( '3',  'quiklearn-core' ),
					'4' => esc_html__( '4',  'quiklearn-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'tablet',
				'label'   => esc_html__( 'Tablets: > 768px', 'quiklearn-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'quiklearn-core' ),
					'2' => esc_html__( '2', 'quiklearn-core' ),
					'3' => esc_html__( '3',  'quiklearn-core' ),
					'4' => esc_html__( '4',  'quiklearn-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'mobile',
				'label'   => esc_html__( 'Phones: > 576px', 'quiklearn-core' ),
				'default' => '1',
				'options' => array(
					'1' => esc_html__( '1', 'quiklearn-core' ),
					'2' => esc_html__( '2', 'quiklearn-core' ),
					'3' => esc_html__( '3',  'quiklearn-core' ),
					'4' => esc_html__( '4',  'quiklearn-core' ),
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'quiklearn-core' ),
				'condition'   => array( 'layout' => array( 'layout3', 'layout4', 'layout5' ) ),
			),			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_autoplay',
				'label'       => esc_html__( 'Autoplay', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'On', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Off', 'quiklearn-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'quiklearn-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'slides_per_group',
				'label'   => esc_html__( 'Slides Per Group', 'quiklearn-core' ),
				'default' => array(
					'size' => 1,
				),
				'description' => esc_html__( 'slides Per Group. Default: 1', 'quiklearn-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'centered_slides',
				'label'       => esc_html__( 'Centered Slides', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'On', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Off', 'quiklearn-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Centered Slides. Default: Off', 'quiklearn-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'slides_space',
				'label'   => esc_html__( 'Slides Space', 'quiklearn-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => 24,
				),
				'description' => esc_html__( 'Slides Space. Default: 24', 'quiklearn-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_delay',
				'label'   => esc_html__( 'Autoplay Slide Delay', 'quiklearn-core' ),
				'default' => 5000,
				'description' => esc_html__( 'Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'quiklearn-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_speed',
				'label'   => esc_html__( 'Autoplay Slide Speed', 'quiklearn-core' ),
				'default' => 1000,
				'description' => esc_html__( 'Set any value for example .8 seconds to play it in every 2 seconds. Default: .8 Seconds', 'quiklearn-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_loop',
				'label'       => esc_html__( 'Loop', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'On', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Off', 'quiklearn-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Loop to first item. Default: On', 'quiklearn-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slide_height',
				'mode' 			=> 'responsive',
				'label'   => esc_html__( 'Slides Height', 'quiklearn-core' ),
				'description' => esc_html__( 'Slides height default: 130', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .quiklearn-vertical-slider .vertical-thumb-slider' => 'max-height: {{VALUE}}px',
				),
				'condition'   => array( 'layout' => array( 'layout5' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			// Nav Option
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_nav_option',
				'label'   => esc_html__( 'Nav Option', 'quiklearn-core' ),
				'condition'   => array( 'layout' => array( 'layout3', 'layout4', 'layout5' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_arrow',
				'label'       => esc_html__( 'Navigation Arrow', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'On', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Off', 'quiklearn-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Navigation Arrow. Default: On', 'quiklearn-core' ),
				'condition'   => array( 'layout!' => array( 'layout5') ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'nav_position',
				'label'   => esc_html__( 'Nav Position', 'quiklearn-core' ),				
				'options' => array(
					'default' 		=> esc_html__( 'Default', 'quiklearn-core' ),
					'top-right' 	=> esc_html__( 'Top Right', 'quiklearn-core' ),
				),
				'default' => 'default',
				'condition'   => array( 'display_arrow' => array( 'yes' ), 'layout!' => array( 'layout5') ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'nav_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Nav Space', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'px' => array(
						'min' => -200,
						'max' => 200,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .top-right .rt-swiper-slider .swiper-navigation' => 'top: {{SIZE}}{{UNIT}};',
				),
				'condition'   => array( 'display_arrow' => array( 'yes' ), 'nav_position' => array( 'top-right' ), 'layout!' => array( 'layout5') ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'prev_arrow',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Prev Arrow', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'px' => array(
						'min' => -200,
						'max' => 200,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-slider .swiper-navigation .swiper-button-prev' => 'left: {{SIZE}}{{UNIT}};',
				),
				'condition'   => array( 'display_arrow' => array( 'yes' ),'layout!' => array( 'layout5') ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'next_arrow',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Next Arrow', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'px' => array(
						'min' => -200,
						'max' => 200,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-slider .swiper-navigation .swiper-button-next' => 'right: {{SIZE}}{{UNIT}};',
				),
				'condition'   => array( 'display_arrow' => array( 'yes' ),'layout!' => array( 'layout5') ),
			),
	        array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'nav_color',
				'label'   => esc_html__( 'Nav Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-navigation > div' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'display_arrow' => array( 'yes' ),'layout!' => array( 'layout5') ),
			),
	        array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'nav_hover_color',
				'label'   => esc_html__( 'Nav Hover Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-navigation > div:hover' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'display_arrow' => array( 'yes' ),'layout!' => array( 'layout5') ),
			),
	        array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'nav_bg_color',
				'label'   => esc_html__( 'Nav Background Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-navigation > div' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'display_arrow' => array( 'yes' ),'layout!' => array( 'layout5') ),
			),
	        array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'nav_bg_hover_color',
				'label'   => esc_html__( 'Nav Background Hover Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-navigation > div:hover' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'display_arrow' => array( 'yes' ),'layout!' => array( 'layout5') ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'nav_width',
				'label'   => esc_html__( 'Nav Width', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-navigation > div' => 'width: {{SIZE}}px;',
				),
				'condition'   => array( 'display_arrow' => array( 'yes' ),'layout!' => array( 'layout5') ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'nav_height',
				'label'   => esc_html__( 'Nav Height', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-navigation > div' => 'width: {{SIZE}}px;',
				),
				'condition'   => array( 'display_arrow' => array( 'yes' ),'layout!' => array( 'layout5') ),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'nav_radius',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Nav Radius', 'quiklearn-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-swiper-nav .swiper-navigation > div' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'after',
				'condition'   => array( 'display_arrow' => array( 'yes' ),'layout!' => array( 'layout5') ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_bullet',
				'label'       => esc_html__( 'Pagination', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'On', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Off', 'quiklearn-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Pagination Dot. Default: On', 'quiklearn-core' ),
			),
	        array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'pag_bg_color',
				'label'   => esc_html__( 'Pagination BG Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-pagination .swiper-pagination-bullet' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'display_bullet' => array( 'yes' ) ),
			),
	        array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'pag_bg_active_color',
				'label'   => esc_html__( 'Pagination BG Active Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-pagination .swiper-pagination-bullet-active' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'display_bullet' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'pagination_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Pagination Space', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 500,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .rt-swiper-nav .swiper-pagination-bullets' => 'margin-top: {{SIZE}}{{UNIT}};',
				),
				'condition'   => array( 'display_bullet' => array( 'yes' ) ),
			),
			array(
				'mode' => 'section_end',
			),
        
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		if($data['slider_autoplay']=='yes'){
			$data['slider_autoplay']=true;
		}
		else{
			$data['slider_autoplay']=false;
		}

		$swiper_data = array(
			'slidesPerView' 	=>2,
			'loop'				=>$data['slider_loop']=='yes' ? true:false,
			'spaceBetween'		=>$data['slides_space']['size'],
			'slidesPerGroup'	=>$data['slides_per_group']['size'],
			'centeredSlides'	=>$data['centered_slides']=='yes' ? true:false ,
			'slideToClickedSlide' =>true,
			'autoplay'				=>array(
				'delay'  => $data['slider_autoplay_delay'],
			),
			'speed'      =>$data['slider_autoplay_speed'],
			'breakpoints' =>array(
				'0'    =>array('slidesPerView' =>1),
				'576'    =>array('slidesPerView' =>$data['mobile']),
				'768'    =>array('slidesPerView' =>$data['tablet']),
				'992'    =>array('slidesPerView' =>$data['sm_desktop']),
				'1200'    =>array('slidesPerView' =>$data['md_desktop']),				
				'1600'    =>array('slidesPerView' =>$data['desktop'])
			),
			'auto'   =>$data['slider_autoplay']
		);
		
		switch ( $data['layout'] ) {
			case 'layout6':
			$template = 'rt-testimonial-marquee';
			break;
			case 'layout5':
			$data['swiper_data'] = json_encode( $swiper_data ); 
			$template = 'rt-testimonial-slider-3';
			break;
			case 'layout4':
			$data['swiper_data'] = json_encode( $swiper_data ); 
			$template = 'rt-testimonial-slider-2';
			break;
			case 'layout3':
			$data['swiper_data'] = json_encode( $swiper_data ); 
			$template = 'rt-testimonial-slider-1';
			break;
			case 'layout2':
			$template = 'rt-testimonial-grid-2';
			break;
			default:
			$template = 'rt-testimonial-grid-1';
			break;
		}
		
		return $this->rt_template( $template, $data );
	}

}