<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Quiklearn_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;
if ( ! defined( 'ABSPATH' ) ) exit;

class RT_Shape extends Custom_Widget_Base {
	public function __construct( $data = [], $args = null ){
		$this->rt_name = esc_html__( 'RT Shape', 'quiklearn-core' );
		$this->rt_base = 'rt-shape';
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
			/*Shape layout*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Shape Style', 'quiklearn-core' ),
				'options' => array(
					'style1' => esc_html__( 'Shape Style 1' , 'quiklearn-core' ),
					'style2' => esc_html__( 'Shape Style 2', 'quiklearn-core' ),
				),
				'default' => 'style1',
			),
			array(					 
			   'type'    => Controls_Manager::CHOOSE,
			   'options' => array(
			     'icon' => array(
			       'title' => esc_html__( 'Left', 'quiklearn-core' ),
			       'icon' => 'fa fa-smile',
			     ),
			     'image' => array(
			       'title' => esc_html__( 'Center', 'quiklearn-core' ),
			       'icon' => 'fa fa-image',
			     ),		     
			   ),
			   'id'      => 'icontype',
			   'label'   => esc_html__( 'Media Type', 'quiklearn-core' ),
			   'default' => 'icon',
			   'label_block' => false,
			   'toggle' => false,
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'quiklearn-core' ),
				'default' => array(
			      'value' => 'icon-quiklearn-learner',
			      'library' => 'fa-solid',
				),	
			  	'condition'   => array( 'icontype' => array( 'icon' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'icon_image',
				'label'   => esc_html__( 'Image', 'quiklearn-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'quiklearn-core' ),
				'condition'   => array( 'icontype' => array( 'image' ) ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'quiklearn-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
				'condition'   => array( 'icontype' => array( 'image' ) ),
			),			
			array(
				'mode' => 'section_end',
			),			
			// Icon style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_icon',
				'label'   => esc_html__( 'Icon Style', 'quiklearn-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),			
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Size', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-shape-layout .rt-icon' => 'font-size: {{VALUE}}px',
					'{{WRAPPER}} .rt-shape-layout .rt-icon svg' => 'width: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-shape-layout .rt-icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-shape-layout .rt-icon path' => 'fill: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_stroke_color',
				'label'   => esc_html__( 'Icon Stroke Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-shape-layout .rt-icon path' => 'stroke: {{VALUE}}',
				),
			),
			array(
				'mode' => 'section_end',
			),
			/*Image Option*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_image_position',
	            'label'   => esc_html__( 'Image Option', 'quiklearn-core' ),
	        ),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'mouse_animation',
				'label'       => esc_html__( 'Shape Animation', 'quiklearn-core' ),
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
				'default' => 'fadeInDown',
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
		$template = 'rt-shape';
		return $this->rt_template( $template, $data );
	}
}