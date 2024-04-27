<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'tgmpa_register', 'quiklearn_register_required_plugins' );
function quiklearn_register_required_plugins() {
	$plugins = array(
		// Bundled
		array(
			'name'         => 'Quiklearn Core',
			'slug'         => 'quiklearn-core',
			'source'       => 'quiklearn-core.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '1.3'
		),
		array(
			'name'         => 'RT Framework',
			'slug'         => 'rt-framework',
			'source'       => 'rt-framework.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '2.4'
		),
		array(
			'name'         => 'RT Demo Importer',
			'slug'         => 'rt-demo-importer',
			'source'       => 'rt-demo-importer.zip',
			'required'     =>  true,
			'external_url' => 'http://radiustheme.com',
			'version'      => '6.0.1'
		),

		// Repository
		array(
			'name'     => 'Breadcrumb NavXT',
			'slug'     => 'breadcrumb-navxt',
			'required' => true,
		),
		array(
			'name'     => 'Elementor Page Builder',
			'slug'     => 'elementor',
			'required' => true,
		),
		array(
			'name'     => 'LearnPress - WordPress LMS Plugin',
			'slug'     => 'learnpress',
			'required' => true,
		),
		array(
			'name'     => 'LearnPress - Course Review',
			'slug'     => 'learnpress-course-review',
			'required' => false,
		),
		array(
			'name'     => 'LearnPress Courses Wishlist',
			'slug'     => 'learnpress-wishlist',
			'required' => false,
		),
		array(
			'name'     => 'Eventin',
			'slug'     => 'wp-event-solution',
			'required' => false,
		),
		array(
			'name'     => 'Video Conferencing with Zoom',
			'slug'     => 'video-conferencing-with-zoom-api',
			'required' => false,
		),
		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false,
		),
		array(
			'name'     => 'ShopBuilder',
			'slug'     => 'shopbuilder',
			'required' => false,
		),
		array(
			'name'     => 'WP Fluent Forms',
			'slug'     => 'fluentform',
			'required' => false,
		),
	);

	$config = array(
		'id'           => 'quiklearn',                 	// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => QUIKLEARN_INC_DIR. '/plugins/', // Default absolute path to bundled plugins.
		'menu'         => 'quiklearn-install-plugins', 	// Menu slug.
		'has_notices'  => true,                    		// Show admin notices or not.
		'dismissable'  => true,                    		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   		// Automatically activate plugins after installation or not.
		'message'      => '',                      		// Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}