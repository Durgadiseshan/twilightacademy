<?php
/**
 * @wordpress-plugin
 * Plugin Name:                ShopBuilder - Elementor WooCommerce Builder Addons
 * Plugin URI:                 https://shopbuilderwp.com/
 * Description:                WooCommerce Page Builder for Elementor
 * Version:                    2.1.5
 * Author:                     RadiusTheme
 * Author URI:                 https://radiustheme.com
 * Text Domain:                shopbuilder
 * Domain Path:                /languages
 * WC requires at least:       3.2
 * WC tested up to:            8.5.2
 * Elementor tested up to:     3.19.1
 * Elementor Pro tested up to: 3.19.1
 *
 * @package RadiusTheme\SB
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Define Constants.
 */
define( 'RTSB_VERSION', '2.1.5' );
define( 'RTSB_FILE', __FILE__ );
define( 'RTSB_PATH', plugin_dir_path(__FILE__ ) );
define( 'RTSB_ACTIVE_FILE_NAME', plugin_basename( __FILE__ ) );

/**
 * App Init.
 */
require_once 'app/ShopBuilder.php';


