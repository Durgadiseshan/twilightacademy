<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Quiklearn_Core;

use QuiklearnTheme;
use QuiklearnTheme_Helper;
use \RT_Postmeta;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'RT_Postmeta' ) ) {
	return;
}

$Postmeta = RT_Postmeta::getInstance();

$prefix = QUIKLEARN_CORE_CPT_PREFIX;

/*-------------------------------------
#. Layout Settings
---------------------------------------*/
$nav_menus = wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$nav_menus = array( 'default' => __( 'Default', 'quiklearn-core' ) ) + $nav_menus;
$sidebars  = array( 'default' => __( 'Default', 'quiklearn-core' ) ) + QuiklearnTheme_Helper::custom_sidebar_fields();

$Postmeta->add_meta_box( "{$prefix}_page_settings", __( 'Layout Settings', 'quiklearn-core' ), array( 'page', 'post', 'lp_course' ), '', '', 'high', array(
	'fields' => array(
	
		"{$prefix}_layout_settings" => array(
			'label'   => __( 'Layouts', 'quiklearn-core' ),
			'type'    => 'group',
			'value'  => array(	
			
				"{$prefix}_layout" => array(
					'label'   => __( 'Layout', 'quiklearn-core' ),
					'type'    => 'select',
					'options' => array(
						'default'       => __( 'Default', 'quiklearn-core' ),
						'full-width'    => __( 'Full Width', 'quiklearn-core' ),
						'left-sidebar'  => __( 'Left Sidebar', 'quiklearn-core' ),
						'right-sidebar' => __( 'Right Sidebar', 'quiklearn-core' ),
					),
					'default'  => 'default',
				),		
				'quiklearn_sidebar' => array(
					'label'    => __( 'Custom Sidebar', 'quiklearn-core' ),
					'type'     => 'select',
					'options'  => $sidebars,
					'default'  => 'default',
				),
				"{$prefix}_page_menu" => array(
					'label'    => __( 'Main Menu', 'quiklearn-core' ),
					'type'     => 'select',
					'options'  => $nav_menus,
					'default'  => 'default',
				),
				"{$prefix}_top_bar" => array(
					'label' 	  => __( 'Top Bar', 'quiklearn-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'quiklearn-core' ),
						'on'      => __( 'Enabled', 'quiklearn-core' ),
						'off'     => __( 'Disabled', 'quiklearn-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_bar_style" => array(
					'label' 	=> __( 'Top Bar Layout', 'quiklearn-core' ),
					'type'  	=> 'select',
					'options'	=> array(
						'default' => __( 'Default', 'quiklearn-core' ),
						'1'       => __( 'Layout 1', 'quiklearn-core' ),
						'2'       => __( 'Layout 2', 'quiklearn-core' ),
						'3'       => __( 'Layout 3', 'quiklearn-core' ),
						'4'       => __( 'Layout 4', 'quiklearn-core' ),
					),
					'default'   => 'default',
				),
				"{$prefix}_header_opt" => array(
					'label' 	  => __( 'Header On/Off', 'quiklearn-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'quiklearn-core' ),
						'on'      => __( 'Enabled', 'quiklearn-core' ),
						'off'     => __( 'Disabled', 'quiklearn-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_tr_header" => array(
					'label'    	  => __( 'Transparent Header', 'quiklearn-core' ),
					'type'     	  => 'select',
					'options'  	  => array(
						'default' => __( 'Default', 'quiklearn-core' ),
						'on'      => __( 'Enabled', 'quiklearn-core' ),
						'off'     => __( 'Disabled', 'quiklearn-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_header" => array(
					'label'   => __( 'Header Layout', 'quiklearn-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'quiklearn-core' ),
						'1'       => __( 'Layout 1', 'quiklearn-core' ),
						'2'       => __( 'Layout 2', 'quiklearn-core' ),
						'3'       => __( 'Layout 3', 'quiklearn-core' ),
						'4'       => __( 'Layout 4', 'quiklearn-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer" => array(
					'label'   => __( 'Footer Layout', 'quiklearn-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'quiklearn-core' ),
						'1'       => __( 'Layout 1', 'quiklearn-core' ),
						'2'       => __( 'Layout 2', 'quiklearn-core' ),
						'3'       => __( 'Layout 3', 'quiklearn-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer_area" => array(
					'label' 	  => __( 'Footer Area', 'quiklearn-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'quiklearn-core' ),
						'on'      => __( 'Enabled', 'quiklearn-core' ),
						'off'     => __( 'Disabled', 'quiklearn-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_copyright_area" => array(
					'label' 	  => __( 'Copyright Area', 'quiklearn-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'quiklearn-core' ),
						'on'      => __( 'Enabled', 'quiklearn-core' ),
						'off'     => __( 'Disabled', 'quiklearn-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_padding" => array(
					'label'   => __( 'Content Padding Top', 'quiklearn-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'quiklearn-core' ),
						'0px'     => __( '0px', 'quiklearn-core' ),
						'10px'    => __( '10px', 'quiklearn-core' ),
						'20px'    => __( '20px', 'quiklearn-core' ),
						'30px'    => __( '30px', 'quiklearn-core' ),
						'40px'    => __( '40px', 'quiklearn-core' ),
						'50px'    => __( '50px', 'quiklearn-core' ),
						'60px'    => __( '60px', 'quiklearn-core' ),
						'70px'    => __( '70px', 'quiklearn-core' ),
						'80px'    => __( '80px', 'quiklearn-core' ),
						'90px'    => __( '90px', 'quiklearn-core' ),
						'100px'   => __( '100px', 'quiklearn-core' ),
						'110px'   => __( '110px', 'quiklearn-core' ),
						'120px'   => __( '120px', 'quiklearn-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_bottom_padding" => array(
					'label'   => __( 'Content Padding Bottom', 'quiklearn-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'quiklearn-core' ),
						'0px'     => __( '0px', 'quiklearn-core' ),
						'10px'    => __( '10px', 'quiklearn-core' ),
						'20px'    => __( '20px', 'quiklearn-core' ),
						'30px'    => __( '30px', 'quiklearn-core' ),
						'40px'    => __( '40px', 'quiklearn-core' ),
						'50px'    => __( '50px', 'quiklearn-core' ),
						'60px'    => __( '60px', 'quiklearn-core' ),
						'70px'    => __( '70px', 'quiklearn-core' ),
						'80px'    => __( '80px', 'quiklearn-core' ),
						'90px'    => __( '90px', 'quiklearn-core' ),
						'100px'   => __( '100px', 'quiklearn-core' ),
						'110px'   => __( '110px', 'quiklearn-core' ),
						'120px'   => __( '120px', 'quiklearn-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner" => array(
					'label'   => __( 'Banner', 'quiklearn-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'quiklearn-core' ),
						'on'	  => __( 'Enable', 'quiklearn-core' ),
						'off'	  => __( 'Disable', 'quiklearn-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_breadcrumb" => array(
					'label'   => __( 'Breadcrumb', 'quiklearn-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'quiklearn-core' ),
						'on'      => __( 'Enable', 'quiklearn-core' ),
						'off'	  => __( 'Disable', 'quiklearn-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner_type" => array(
					'label'   => __( 'Banner Background Type', 'quiklearn-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'quiklearn-core' ),
						'bgimg'   => __( 'Background Image', 'quiklearn-core' ),
						'bgcolor' => __( 'Background Color', 'quiklearn-core' ),
					),
					'default' => 'default',
				),
				"{$prefix}_banner_bgimg" => array(
					'label' => __( 'Banner Background Image', 'quiklearn-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'quiklearn-core' ),
				),
				"{$prefix}_banner_bgcolor" => array(
					'label' => __( 'Banner Background Color', 'quiklearn-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'quiklearn-core' ),
				),		
				"{$prefix}_page_bgimg" => array(
					'label' => __( 'Page/Post Background Image', 'quiklearn-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'quiklearn-core' ),
				),
				"{$prefix}_page_bgcolor" => array(
					'label' => __( 'Page/Post Background Color', 'quiklearn-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'quiklearn-core' ),
				),
			)
		)
	),
) );

/*-------------------------------------
#. Single Post Gallery
---------------------------------------*/
$Postmeta->add_meta_box( 'quiklearn_post_info', __( 'Post Info', 'quiklearn-core' ), array( 'post' ), '', '', 'high', array(
	'fields' => array(
		"quiklearn_youtube_link" => array(
			'label'   => __( 'Youtube Link', 'quiklearn-core' ),
			'type'    => 'text',
			'default'  => '',
			'desc'  => __( 'Only work for the video post format', 'quiklearn-core' ),
		),
		'quiklearn_post_gallery' => array(
			'label' => __( 'Post Gallery', 'quiklearn-core' ),
			'type'  => 'gallery',
			'desc'  => __( 'Only work for the gallery post format', 'quiklearn-core' ),
		),
	),
) );

/*-------------------------------------
#. LearnPress
---------------------------------------*/
$Postmeta->add_meta_box( 'quiklearn_lp_course', __( 'LP Course', 'quiklearn-core' ), array( 'lp_course' ), '', '', 'high', array(
	'fields' => array(
		'quiklearn_lp_language' => array(
			'label' => __( 'Language', 'quiklearn-core' ),
			'type'    => 'text',
			'default'  => '',
		),
		'quiklearn_lp_money_back' => array(
			'label' => __( 'Money Back Label', 'quiklearn-core' ),
			'type'    => 'text',
			'default'  => '',
		),
		'quiklearn_lp_curriculum_text' => array(
			'label' => __( 'Curriculum Text', 'quiklearn-core' ),
			'type'    => 'textarea',
			'default'  => '',
		),
		'quiklearn_lp_instructors_text' => array(
			'label' => __( 'Instructors Text', 'quiklearn-core' ),
			'type'    => 'textarea',
			'default'  => '',
		),
	)
) );
$Postmeta->add_meta_box( 'quiklearn_lp_course_style', __( 'LP Course style', 'quiklearn-core' ), array( 'lp_course' ), '', '', 'high', array(
	'fields' => array(
		"quiklearn_course_style" => array(
			'label'   => __( 'Course Style', 'quiklearn-core' ),
			'type'    => 'select',
			'options' => array(
				'default'  => __( 'Default', 'quiklearn-core' ),
				'course-detail-1'  => __( 'Style 1', 'quiklearn-core' ),
				'course-detail-2'  => __( 'Style 2', 'quiklearn-core' ),
			),
			'default'  => 'default',
		),
	),
) );