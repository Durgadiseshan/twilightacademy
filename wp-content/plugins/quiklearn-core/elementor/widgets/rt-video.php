<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Quiklearn_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Css_Filter;
use Elementor\Utils;
if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Video extends Custom_Widget_Base {
	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Video', 'quiklearn-core' );
		$this->rt_base = 'rt-video';
		parent::__construct( $data, $args );
	}
	private function rt_load_scripts(){
		wp_enqueue_script( 'magnific-popup' );
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
				'label'   => esc_html__( 'Video Style', 'quiklearn-core' ),
				'options' => array(
					'1' => esc_html__( 'Video Style 1' , 'quiklearn-core' ),
					'2' => esc_html__( 'Video Style 2', 'quiklearn-core' ),
				),
				'default' => '1',
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
					'{{WRAPPER}} .rt-video-layout' => 'text-align: {{VALUE}};',
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'video_layout',
				'label'   => esc_html__( 'Play Button', 'quiklearn-core' ),				
				'options' => array(
					'play-btn-primary' 		=> esc_html__( 'Play Primary', 'quiklearn-core' ),
					'play-btn-white' 	 	=> esc_html__( 'Play White', 'quiklearn-core' ),
				),
				'default' => 'play-btn-white',
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'videourl',
				'label'   => esc_html__( 'Video URL', 'quiklearn-core' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'video_image',
				'label'   => esc_html__( 'Image', 'quiklearn-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'quiklearn-core' ),
				'condition'   => array( 'style!' => array( '2' ) ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'quiklearn-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',
				'condition'   => array( 'style!' => array( '2' ) ),
			),			
			array(
				'mode' => 'section_end',
			),
			/*Box section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'video_button_style',
	            'label'   => esc_html__( 'Box Style', 'quiklearn-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'style!' => array( '2' ) ),
	        ),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'video_icon_size',
				'label'   => esc_html__( 'Icon Size', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-video-layout .rt-video .rt-icon .rt-play' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'video_icon_color',
				'label'   => esc_html__( 'Icon Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-video-layout .rt-video .rt-icon .rt-play' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bag_color',
				'label'   => esc_html__( 'Image Overlay Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-video-layout .rt-video .rt-img:after' => 'background-color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'border_width',
	            'label'   => __( 'Border Width', 'quiklearn-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-video-1 .rt-video .rt-img img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                  
	            ),
	            'separator' => 'before',
	            'condition'   => array( 'style' => array( '1' ) ),
	        ),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'border_color',
				'label'   => esc_html__( 'Border Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-video-1 .rt-video .rt-img img' => 'background-color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( '1' ) ),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_radius',
	            'label'   => __( 'Box Radius', 'quiklearn-core' ),                 
	            'selectors' => array(                  
	                '{{WRAPPER}} .rt-video-layout .rt-video .rt-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                  
	                '{{WRAPPER}} .rt-video-layout .rt-video .rt-img:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                 
	            ),
	            'separator' => 'before',
	        ),
	        array(
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'Image Blend', 'quiklearn-core' ),	
				'name' => 'blend', 
				'selector' => '{{WRAPPER}} img',		
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'image_height',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Image Height', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 1000,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .rt-video-layout .rt-video .rt-img img' => 'height: {{SIZE}}{{UNIT}};',
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
		$template = 'rt-video-1';
		$template = 'rt-video-'.$data['style'];
		return $this->rt_template( $template, $data );
	}
}