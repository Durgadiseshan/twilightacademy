<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists( 'RT_POST_VIEWS' )){

	class RT_POST_VIEWS{

		/**
		 * __construct
		 *
		 * Class constructor where we will call our filter and action hooks.
		 */
		function __construct(){
			
			add_action( 'manage_posts_custom_column',        array( $this, '_posts_custom_column_views' ), 5, 2 );
			add_action( 'wp_footer',                         array( $this, '_set_post_views' ));
		}

		/**
		 * Count number of views
		 */
		function _set_post_views(){		

			# Increase number of views +1 ----------
			$count     = 0;
			$post_id   = get_the_ID();
			$count_key = 'quiklearn_views';
			$count     = (int) get_post_meta( $post_id, $count_key, true );
			$new_count = $count + 1 ;
				
			update_post_meta( $post_id, $count_key, (int)$new_count );
			
		}

		/**
		 * _posts_custom_column_views
		 *
		 * Dashboared column content
		 */
		function _posts_custom_column_views( $column_name, $id ){
			if( $column_name === 'post_view' ){
				echo quiklearn_views( '', get_the_ID() );
			}
		}
	}

	# Instantiate the class ----------
	new RT_POST_VIEWS();

}
/*----------------------------------------------------------*/
# Display number of views                                   
/*----------------------------------------------------------*/
if( !function_exists( 'quiklearn_views' )){
	function quiklearn_views( $text = '', $post_id = 0 ){
		if( empty( $post_id )){
			$post_id = get_the_ID();
		}

		$views_class = '';
		$formated = 0;
		$count_key = 'quiklearn_views';
		$view_count = get_post_meta( $post_id, $count_key, true );
		if ( !empty( $view_count ) ) {
			$formated = number_format_i18n( $view_count );
			
			if( $view_count > 1000 ){
				$views_class = 'very-high';
			}
			elseif( $view_count > 100 ){
				$views_class = 'high';
			}
			elseif( $view_count > 5 ){
				$views_class = 'rising';
			}
		} else if ( $view_count == '') {
			$view_count = 0;
		} else {
			$view_count = 0;			
		}
		
		if ( $view_count == 1 ) {
			$quiklearn_view_html = esc_html__( 'View' , 'quiklearn-core' );
		} else {
			$quiklearn_view_html = esc_html__( 'Views' , 'quiklearn-core' );
		}
		$quiklearn_views_html = $quiklearn_view_html . '<span class="view-number" >' . ' ' . $view_count . '</span> ';

		return '<span class="meta-views meta-item '. $views_class .'">'. $quiklearn_views_html.'</span> ';
	}
}

?>
