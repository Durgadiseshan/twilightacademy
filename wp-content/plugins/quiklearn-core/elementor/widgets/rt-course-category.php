<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Quiklearn_Core;
use Elementor\Group_Control_Background;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
if ( ! defined('ABSPATH' ) ) exit;

class RT_Course_Category extends Custom_Widget_Base {
    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'RT Course Category', 'quiklearn-core' );
        $this->rt_base  = 'rt-course-cat';
        parent::__construct( $data, $args );
    }
    public function rt_fields() {
        $course_categories = get_terms( 'course_category', 'orderby=count&hide_empty=0' );		
		$course_category_dropdown = array( '0' => esc_html__( 'Select Categories', 'quiklearn-core' ) );
		foreach ( $course_categories as $course_category ) {
			$course_category_dropdown[$course_category->term_id] = $course_category->name;
		}
        $fields = array(
            array(
                'mode'  => 'section_start',
                'id'    => 'section_general',
                'label' => __( 'General', 'quiklearn-core' )
            ),
            array(
                'id'    => 'style',
                'label' => __( 'Style', 'quiklearn-core' ),
                'type'  =>  Controls_Manager::SELECT,
                'options'   => array(
                    '1'   => __( 'Style 1', 'quiklearn-core' ),
                    '2'   => __( 'Style 2', 'quiklearn-core'),
                    '3'   => __( 'Style 3', 'quiklearn-core'),
                ),
                'default'   => '1',
            ),
            array(
				'type'    => Controls_Manager::SELECT2,
				'id'    => 'cat',
				'label'   => __( 'Categories', 'quiklearn-core' ),
				'options' => $course_category_dropdown,
				'multiple'=> false,
				'default' => '0',
			),
            /*Icon Start*/			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'icon_display',
				'label'       => esc_html__( 'Icon Display', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'On', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Off', 'quiklearn-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Icon. Default: On', 'quiklearn-core' ),
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
			   'condition'   => array('icon_display' => array( 'yes' ) ),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'quiklearn-core' ),
				'default' => array(
			      'value' => 'icon-quiklearn-learner',
			      'library' => 'fa-solid',
				),	
			  	'condition'   => array('icon_display' => array( 'yes' ), 'icontype' => array( 'icon' ) ),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'icon_image',
				'label'   => esc_html__( 'Image', 'quiklearn-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'quiklearn-core' ),
				'condition'   => array('icon_display' => array( 'yes' ), 'icontype' => array( 'image' ) ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'quiklearn-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
				'condition'   => array('icon_display' => array( 'yes' ), 'icontype' => array( 'image' ) ),
			),			
			/*Icon end*/
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Alignment', 'revieweb-core' ),
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
					'{{WRAPPER}} .rt-course-category .rt-cat-item' => 'justify-content: {{VALUE}};',
				),
                'condition'   => array( 'style!' => array( '3' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'cat_num_display',
				'label'       => esc_html__( 'Show Count', 'revieweb-core' ),
				'label_on'    => esc_html__( 'Show', 'revieweb-core' ),
				'label_off'   => esc_html__( 'Hide', 'revieweb-core' ),
				'default'     => 'yes',
			),
            array(
                'mode'  => 'section_end'
            ),
            // box option
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_general_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'General', 'quiklearn-core' ),
            ),            
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'box_bg_color',
                'label'   => __( 'Background Color', 'quiklearn-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-course-category .rt-cat-item' => 'background-color: {{VALUE}}',
                ),
            ),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_padding',
	            'label'   => __( 'Padding', 'quiklearn-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-course-category .rt-cat-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_radius',
	            'label'   => __( 'Radius', 'quiklearn-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-course-category .rt-cat-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',                    
	            ),
	        ),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'shape_display',
				'label'       => esc_html__( 'Show Shape', 'revieweb-core' ),
				'label_on'    => esc_html__( 'Show', 'revieweb-core' ),
				'label_off'   => esc_html__( 'Hide', 'revieweb-core' ),
				'default'     => 'yes',
                'condition'   => array( 'style!' => array( '2' ) ),
			),
            array(
                'mode' => 'section_end',
            ),
            /*style*/
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'Style', 'quiklearn-core' ),
            ),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-course-category .rt-cat-title',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'course_typo',
				'label'   => esc_html__( 'Course Typo', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-course-category .rt-course-count',
			),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color',
                'label'   => __( 'Title Color', 'quiklearn-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-course-category .rt-cat-title a' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'course_color',
                'label'   => __( 'Course Color', 'quiklearn-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-course-category .rt-course-count' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'mode'  => 'section_end'
            ),
            /*style*/
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_iocn_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'Icon', 'quiklearn-core' ),
            ),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Size', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-course-category .rt-icon' => 'font-size: {{VALUE}}px',
					'{{WRAPPER}} .rt-course-category .rt-icon svg' => 'width: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_border_color',
				'label'   => esc_html__( 'Border Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-course-category .rt-icon' => 'border: 2px solid {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-course-category .rt-icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .rt-course-category .rt-icon path' => 'fill: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_stroke_color',
				'label'   => esc_html__( 'Stroke Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-course-category .rt-icon path' => 'stroke: {{VALUE}}',
				),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Background::get_type(),
				'name'    => 'icon_bg_color',
				'types'    => [ 'gradient' ],
				'label'   => esc_html__( 'Background', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-course-category .rt-icon',
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'icon_space',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Icon Space', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => 0,
						'max' => 100,
					),
					'px' => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .rt-course-category .rt-cat-item' => 'gap: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'icon_width',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Icon Width', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => 0,
						'max' => 100,
					),
					'px' => array(
						'min' => 0,
						'max' => 200,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .rt-course-category .rt-icon' => 'width: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'icon_height',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Icon height', 'quiklearn-core' ),
				'size_units' => array( '%', 'px' ),
				'range' => array(
					'%' => array(
						'min' => 0,
						'max' => 100,
					),
					'px' => array(
						'min' => 0,
						'max' => 200,
					),
				),
				'selectors' => array( 
					'{{WRAPPER}} .rt-course-category .rt-icon' => 'height: {{SIZE}}{{UNIT}};',
				),
			),
            array(
                'mode'  => 'section_end'
            ),
            // Animation style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_animation_style',
	            'label'   => esc_html__( 'Animation', 'quiklearn-core' ),
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
        $template = 'rt-course-category';
		$template = 'rt-course-category-'.$data['style'];
        return $this->rt_template( $template, $data );
    }

}
