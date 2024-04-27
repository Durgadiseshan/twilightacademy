<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Quiklearn_Core;

use QuiklearnTheme;
use QuiklearnTheme_Helper;
use \WP_Query;  

/**
 * 
 */
class AjaxTab {
	
	function __construct()
	{
    	/*quiklearn addon tab*/
		add_action( 'wp_ajax_rt_ajax_tab', [$this, 'rt_ajax_tab_ajax'] );
		add_action( 'wp_ajax_nopriv_rt_ajax_tab', [$this, 'rt_ajax_tab_ajax'] );
	
		
	}

	
}

new AjaxTab();