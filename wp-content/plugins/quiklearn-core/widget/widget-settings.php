<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'widgets_init', 'quiklearn_widgets_init' );
function quiklearn_widgets_init() {
	// Register Custom Widgets
	register_widget( 'QuiklearnTheme_About_Widget' );
	register_widget( 'QuiklearnTheme_Address_Widget' );
	register_widget( 'QuiklearnTheme_Social_Widget' );
	register_widget( 'QuiklearnTheme_Post_Box' );
	register_widget( 'QuiklearnTheme_Post_Tab' );
	register_widget( 'QuiklearnTheme_Feature_Post' );
	register_widget( 'QuiklearnTheme_Product_Box' );
	register_widget( 'QuiklearnTheme_Category_Widget' );
	register_widget( 'QuiklearnTheme_Download_Widget' );
	register_widget( 'QuiklearnTheme_Contact_Widget' );
	register_widget( 'QuiklearnTheme_Event_Box' );
}