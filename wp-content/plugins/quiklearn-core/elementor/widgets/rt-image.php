<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Quiklearn_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Border;
use Elementor\Utils;
if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Image extends Custom_Widget_Base {
	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Image Animation', 'quiklearn-core' );
		$this->rt_base = 'rt-image-animation';
		parent::__construct( $data, $args );
	}
	private function rt_load_scripts(){
		wp_enqueue_script( 'parallax-min' );
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
				'label'   => esc_html__( 'Image Style', 'quiklearn-core' ),
				'options' => array(
					'1' => esc_html__( 'Single Image' , 'quiklearn-core' ),					
					'2' => esc_html__( 'Image With 2 Shape', 'quiklearn-core' ),
					'3' => esc_html__( 'Image With 3 Shape', 'quiklearn-core' ),
					'4' => esc_html__( 'Image With 4 Shape', 'quiklearn-core' ),					
					'5' => esc_html__( 'Image With 5 Shape', 'quiklearn-core' ),
					'6' => esc_html__( 'Image With 1 Shape', 'quiklearn-core' ),
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
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				),
			),
			/*image default*/
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'rt_image',
				'label'   => esc_html__( 'Image', 'quiklearn-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'quiklearn-core' ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'rt_shape1',
				'label'   => esc_html__( 'Shape 1', 'quiklearn-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'quiklearn-core' ),
				'condition'   => array( 'style' => array( '2', '3', '4', '5', '6' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'rt_shape2',
				'label'   => esc_html__( 'Shape 2', 'quiklearn-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'quiklearn-core' ),
				'condition'   => array( 'style' => array( '2', '3', '4', '5' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'rt_shape3',
				'label'   => esc_html__( 'Shape 3', 'quiklearn-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'quiklearn-core' ),
				'condition'   => array( 'style' => array( '3', '4', '5' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'rt_shape4',
				'label'   => esc_html__( 'Shape 4', 'quiklearn-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'quiklearn-core' ),
				'condition'   => array( 'style' => array( '4', '5' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'rt_shape5',
				'label'   => esc_html__( 'Shape 5', 'quiklearn-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'quiklearn-core' ),
				'condition'   => array( 'style' => array( '5' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'rt_shape6',
				'label'   => esc_html__( 'Shape 6', 'quiklearn-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'quiklearn-core' ),
				'condition'   => array( 'style' => array( '5' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'rt_shape7',
				'label'   => esc_html__( 'Shape 7', 'quiklearn-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'quiklearn-core' ),
				'condition'   => array( 'style' => array( '5' ) ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'quiklearn-core' ),	
				'name' => 'image_size', 
				'separator' => 'none',		
			),
			array(
				'mode' => 'section_end',
			),
			/*Image*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_image_style',
	            'label'   => esc_html__( 'Image', 'quiklearn-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'Image Blend', 'quiklearn-core' ),	
				'name' => 'blend', 
				'selector' => '{{WRAPPER}} img',	
			),
			array(
				'type'    => Group_Control_Border::get_type(),
				'name'      => 'border_style',
				'mode'    => 'group',
				'selector' => '{{WRAPPER}} .rt-image-banner .rt-image > img',				
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'border_radius',
				'label'   => esc_html__( 'Border Radius', 'quiklearn-core' ),
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .rt-image-banner .rt-image > img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end',
			),
			/*Shape 01*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_shape1_style',
	            'label'   => esc_html__( 'Shape 01', 'quiklearn-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( '2', '3', '6' ) ),
	        ),				
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'position_left_right',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Position Left/Right', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'px' => array(
						'min' => -1000,
						'max' => 1000,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .rt-image-banner .rt-shapes .shape1' => 'left: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'position_top_bottom',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Position Top/Bottom', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'px' => array(
						'min' => -1000,
						'max' => 1000,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .rt-image-banner .rt-shapes .shape1' => 'top: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'shape1_zindex',
				'label'   => esc_html__( 'Z-index', 'quiklearn-core' ),
				'selectors' => array( 
					'{{WRAPPER}} .rt-image-banner .rt-shapes .shape1' => 'z-index: {{VALUE}};',
				),
			),
			array(
				'mode' => 'section_end',
			),
			/*Shape 02*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_shape2_style',
	            'label'   => esc_html__( 'Shape 02', 'quiklearn-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( '2', '3' ) ),
	        ),				
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'position_left_right2',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Position Left/Right', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'px' => array(
						'min' => -1000,
						'max' => 1000,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .rt-image-banner .rt-shapes .shape2' => 'left: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'position_top_bottom2',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Position Top/Bottom', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'px' => array(
						'min' => -1000,
						'max' => 1000,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .rt-image-banner .rt-shapes .shape2' => 'top: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'shape2_zindex',
				'label'   => esc_html__( 'Z-index', 'quiklearn-core' ),
				'selectors' => array( 
					'{{WRAPPER}} .rt-image-banner .rt-shapes .shape2' => 'z-index: {{VALUE}};',
				),
			),
			array(
				'mode' => 'section_end',
			),
			/*Shape 03*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_shape3_style',
	            'label'   => esc_html__( 'Shape 03', 'quiklearn-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array( 'style' => array( '3' ) ),
	        ),				
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'position_left_right3',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Position Left/Right', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'px' => array(
						'min' => -1000,
						'max' => 1000,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .rt-image-banner .rt-shapes .shape3' => 'left: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'position_top_bottom3',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Position Top/Bottom', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => -100,
						'max' => 100,
					),
					'px' => array(
						'min' => -1000,
						'max' => 1000,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .rt-image-banner .rt-shapes .shape3' => 'top: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'shape3_zindex',
				'label'   => esc_html__( 'Z-index', 'quiklearn-core' ),
				'selectors' => array( 
					'{{WRAPPER}} .rt-image-banner .rt-shapes .shape3' => 'z-index: {{VALUE}};',
				),
			),
			array(
				'mode' => 'section_end',
			),
			/*Animation section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_animation_style',
	            'label'   => esc_html__( 'Animation', 'quiklearn-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'mouse_animation',
				'label'       => esc_html__( 'Mouse Shape Animation', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'Show', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Hide', 'quiklearn-core' ),
				'default'     => 'yes',
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
				'condition'   => array( 'animation' => array( 'wow' ) ),
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
		$template = 'rt-image-1';
		$template = 'rt-image-'.$data['style'];	
		return $this->rt_template( $template, $data );
	}
}