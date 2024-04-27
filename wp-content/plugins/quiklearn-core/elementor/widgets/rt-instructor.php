<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Quiklearn_Core;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined('ABSPATH' ) ) exit;

class RT_Instructor extends Custom_Widget_Base {

    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'RT Instructor', 'quiklearn-core' );
        $this->rt_base  = 'rt-instructor';        
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

    public function rt_fields() {

        $users_dropdown = array();

        $fields = array(
            array(
                'mode'  => 'section_start',
                'id'    => 'section_general',
                'label' => __( 'General', 'quiklearn-core' )
            ),
            array(
                'id'    => 'style',
                'label' => esc_html__( 'Style', 'quiklearn-core' ),
                'type'  =>  Controls_Manager::SELECT,
                'options'   => array(
                    '1'   => esc_html__( 'Style 1', 'quiklearn-core' ),
                    '2'   => esc_html__( 'Style 2', 'quiklearn-core'),
                    '3'   => esc_html__( 'Style 3', 'quiklearn-core'),
                ),
                'default'   => '1',
            ),
			array(
                'id'        => 'item_no',
                'label'     => esc_html__( 'Items Per Page', 'quiklearn-core' ),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 8,
                'description' => esc_html__( 'Write -1 to show all', 'quiklearn-core' ),
            ),
            /*Post Order*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'ordering',
				'label'   => esc_html__( 'Ordering', 'quiklearn-core' ),
				'options' => array(
					'DESC'	=> esc_html__( 'Desecending', 'quiklearn-core' ),
					'ASC'	=> esc_html__( 'Ascending', 'quiklearn-core' ),
				),
				'default' => 'DESC',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'orderby',
				'label'   => esc_html__( 'Sorting', 'quiklearn-core' ),				
				'options' => array(
					'rand' 			=> esc_html__( 'Random', 'quiklearn-core' ),
                    'date'          => esc_html__( 'Date', 'quiklearn-core' ),
					'title' 		=> esc_html__( 'By Name', 'quiklearn-core' ),
					'ID' 		    => esc_html__( 'By ID', 'quiklearn-core' ),
				),
				'default' => 'date',
			), 
            array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number_of_offset',
				'label'   => __( 'Offset ( No of Posts )', 'quiklearn-core' ),
				'default' => '0',
				'separator' => 'before',
			),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'pagination',
                'label'       => esc_html__( 'Pagination Display', 'quiklearn-core' ),
                'label_on'    => esc_html__( 'On', 'quiklearn-core' ),
                'label_off'   => esc_html__( 'Off', 'quiklearn-core' ),
                'default'     => 'no',
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
			),
            array(
                'mode'  => 'section_end'
            ),

            // Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'quiklearn-core' ),
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
				'label'   => esc_html__( 'Phones: < 768px', 'quiklearn-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xs',
				'label'   => esc_html__( 'Small Phones: < 480px', 'quiklearn-core' ),
				'options' => $this->rt_translate['cols'],
				'default' => '12',
			),
			array(
				'mode' => 'section_end',
			),            

            // Style Tab
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_option_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'Option', 'quiklearn-core' ),
            ),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_social',
				'label'       => esc_html__( 'Social Display', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'Show', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Hide', 'quiklearn-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_designation',
				'label'       => esc_html__( 'Designation Display', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'Show', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Hide', 'quiklearn-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_course',
				'label'       => esc_html__( 'Course Display', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'Show', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Hide', 'quiklearn-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_student',
				'label'       => esc_html__( 'Student Display', 'quiklearn-core' ),
				'label_on'    => esc_html__( 'Show', 'quiklearn-core' ),
				'label_off'   => esc_html__( 'Hide', 'quiklearn-core' ),
				'default'     => 'yes',
			),
            array(
                'mode' => 'section_end',
            ),
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_box_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'Box Style', 'quiklearn-core' ),
            ),            
	        array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box_bg_color',
				'label'   => esc_html__( 'Background Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-instructor-default .rt-instructor-item' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .rt-instructor-1 .rt-instructor-item .rt-content' => 'background-color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box_radius',
	            'label'   => __( 'Radius', 'quiklearn-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-instructor-default .rt-instructor-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',               
	            ),
	            'separator' => 'before',
	        ),
            array(
                'mode' => 'section_end',
            ),

            array(
                'mode'    => 'section_start',
                'id'      => 'sec_general_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'General', 'quiklearn-core' ),
            ),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-instructor-default .rt-title',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'designation_typo',
				'label'   => esc_html__( 'Designation Typo', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-instructor-default .rt-designation',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-instructor-default .rt-title a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'designation_color',
				'label'   => esc_html__( 'Designation Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-instructor-default .rt-designation' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_color',
				'label'   => esc_html__( 'Meta Color', 'quiklearn-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .rt-instructor-default .meta-list li' => 'color: {{VALUE}}',
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
        );

        return $fields;

    }

    protected function render() {
        $data = $this->get_settings();
        $template = 'rt-instructor-1';
		$template = 'rt-instructor-'.$data['style'];
        return $this->rt_template( $template, $data );
    }

}
