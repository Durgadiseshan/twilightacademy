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

class RT_Course_Grid extends Custom_Widget_Base {
    public function __construct( $data = [], $args = null ) {
        $this->rt_name  = __( 'RT Course Grid', 'quiklearn-core' );
        $this->rt_base  = 'rt-course-grid';
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
                    '4'   => __( 'Style 4', 'quiklearn-core'),
                ),
                'default'   => '1',
            ),
            array(
                'id'        => 'cat',
                'label'     => __( 'Categories', 'quiklearn-core' ),
                'type'      => Controls_Manager::SELECT2,
                'options' => $this->get_taxonomy_drops('course_category'),
                'multiple'    => true,
				'label_block' => true,
                'default'   => '0',
            ),
            array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'itemlimit',
				'label'   => esc_html__( 'Item Limit', 'quiklearn-core' ),
				'range' => array(
	                'px' => array(
	                    'min' => 1,
	                    'max' => 100,
	               	),
		       	),
	            'default' => array(
	                'size' => 4,
	            ),
				'description' => esc_html__( 'Maximum number of Item', 'quiklearn-core' ),
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
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'pagination',
                'label'       => esc_html__( 'Pagination', 'quiklearn-core' ),
                'label_on'    => esc_html__( 'On', 'quiklearn-core' ),
                'label_off'   => esc_html__( 'Off', 'quiklearn-core' ),
                'default'     => 'yes',
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
                'id'      => 'sec_general_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'General', 'quiklearn-core' ),
            ),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Typo', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-course-default .rt-title',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'meta_typo',
				'label'   => esc_html__( 'Meta Typo', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-course-default .rt-course-meta',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'price_typo',
				'label'   => esc_html__( 'Price Typo', 'quiklearn-core' ),
				'selector' => '{{WRAPPER}} .rt-course-default .rt-price',
			),            
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'padding',
	            'label'   => __( 'Padding', 'quiklearn-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-course-default .rt-course-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	            'separator' => 'before',
	        ),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'radius',
	            'label'   => __( 'Radius', 'quiklearn-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .rt-course-default .rt-course-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',                    
	            ),
	        ),
            array(
                'mode' => 'section_end',
            ),

            array(
                'mode'    => 'section_start',
                'id'      => 'sec_style',
                'tab'     => Controls_Manager::TAB_STYLE,
                'label'   => __( 'Color', 'quiklearn-core' ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color',
                'label'   => __( 'Title Color', 'quiklearn-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-course-default .rt-title a' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_hover_color',
                'label'   => __( 'Title Hover Color', 'quiklearn-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-course-default .rt-title a:hover' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'meta_color',
                'label'   => __( 'Meta Color', 'quiklearn-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-course-default .rt-course-meta' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'author_color',
                'label'   => __( 'Author Color', 'quiklearn-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-course-default .rt-author a' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'content_color',
                'label'   => __( 'Content Color', 'quiklearn-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-course-default .rt-description' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'price_color',
                'label'   => __( 'Price Color', 'quiklearn-core' ),
                'selectors' => array(
                    '{{WRAPPER}} .rt-course-default .rt-price' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'mode'  => 'section_end'
            ),
        );

        return $fields;
    }

    protected function render() {
        $data = $this->get_settings();
        $template = 'rt-course-grid';
        return $this->rt_template( $template, $data );
    }

}
