<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$quiklearn_theme_data = wp_get_theme();
$action  = 'quiklearn_theme_init';
do_action( $action );

define( 'QUIKLEARN_VERSION', ( WP_DEBUG ) ? time() : $quiklearn_theme_data->get( 'Version' ) );
define( 'QUIKLEARN_AUTHOR_URI', $quiklearn_theme_data->get( 'AuthorURI' ) );
define( 'QUIKLEARN_NAME', 'quiklearn' );

// DIR
define( 'QUIKLEARN_BASE_DIR',    get_template_directory(). '/' );
define( 'QUIKLEARN_INC_DIR',     QUIKLEARN_BASE_DIR . 'inc/' );
define( 'QUIKLEARN_ASSETS_DIR',  QUIKLEARN_BASE_DIR . 'assets/' );
define( 'QUIKLEARN_WOO_DIR',     QUIKLEARN_BASE_DIR . 'woocommerce/' );

// URL
define( 'QUIKLEARN_BASE_URL',    get_template_directory_uri(). '/' );
define( 'QUIKLEARN_ASSETS_URL',  QUIKLEARN_BASE_URL . 'assets/' );

// icon trait Plugin Activation
require_once QUIKLEARN_INC_DIR . 'icon-trait.php';
// Includes
require_once QUIKLEARN_INC_DIR . 'helper-functions.php';
require_once QUIKLEARN_INC_DIR . 'quiklearn.php';
require_once QUIKLEARN_INC_DIR . 'general.php';
require_once QUIKLEARN_INC_DIR . 'ajax-tab.php'; 
require_once QUIKLEARN_INC_DIR . 'ajax-loadmore.php'; 
require_once QUIKLEARN_INC_DIR . 'scripts.php';
require_once QUIKLEARN_INC_DIR . 'template-vars.php';
require_once QUIKLEARN_INC_DIR . 'includes.php';

if( is_admin() ) {
	// TGM Plugin Activation
	require_once QUIKLEARN_BASE_DIR . 'lib/class-tgm-plugin-activation.php';
	require_once QUIKLEARN_INC_DIR . 'tgm-config.php';
} else {
	// Includes Modules
	require_once QUIKLEARN_INC_DIR . 'modules/rt-post-related.php';
	require_once QUIKLEARN_INC_DIR . 'modules/rt-breadcrumbs.php';
}

// Learnpress
if ( QuiklearnTheme_Helper::lp_is_v3() ) {
	QuiklearnTheme_Helper::requires( 'lp-functions.php', 'learnpress/custom/inc' );
	QuiklearnTheme_Helper::requires( 'lp-hooks.php', 'learnpress/custom/inc' );
}

add_editor_style( 'style-editor.css' );

// Update Breadcrumb Separator
add_action('bcn_after_fill', 'quiklearn_hseparator_breadcrumb_trail', 1);
function quiklearn_hseparator_breadcrumb_trail($object){
	$object->opt['hseparator'] = '<span class="dvdr"></span>';
	return $object;
}

/*post order*/
add_action('admin_init', 'rt_add_page_attributes');
function rt_add_page_attributes(){
	add_post_type_support( 'post', 'page-attributes' );
}