<?php

namespace RadiusTheme\SB\Controllers\Admin\Ajax;

use RadiusTheme\SB\Helpers\BuilderFns;
use RadiusTheme\SB\Helpers\Fns;
use RadiusTheme\SB\Models\TemplateSettings;
use RadiusTheme\SB\Traits\SingletonTrait;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Default Template Switch.
 */
class DefaultTemplate {
	/**
	 * Singleton Trait.
	 */
	use SingletonTrait;

	/**
	 * Construct function
	 */
	private function __construct() {
		add_action( 'wp_ajax_rtsb_default_template', [ $this, 'response' ] );
	}

	/**
	 * Set Default Template.
	 *
	 * @return void
	 */
	public function response() {
		if ( ! Fns::verify_nonce() ) {
			wp_send_json_error();
		}

		$page_type       = isset( $_POST['template_type'] ) ? sanitize_text_field( wp_unslash( $_POST['template_type'] ) ) : null; // phpcs:ignore WordPress.Security.NonceVerification.Missing
		$default_page_id = isset( $_POST['set_default_page_id'] ) && 'publish' === get_post_status( $_POST['set_default_page_id'] ) ? absint( wp_unslash( $_POST['set_default_page_id'] ) ) : null; // phpcs:ignore WordPress.Security.NonceVerification.Missing
		$page_id         = isset( $_POST['page_id'] ) && 'publish' === get_post_status( $_POST['page_id'] ) ? absint( wp_unslash( $_POST['page_id'] ) ) : null; // phpcs:ignore WordPress.Security.NonceVerification.Missing

		// For Specific Product
		$the_option  = BuilderFns::option_name_by_template_id( $page_id );
		$the_cat_option         = BuilderFns::archive_option_name_by_template_id( $page_id );

		// $product_ids = get_option( $the_option );
		// $the_cats = get_option( $the_cat_option );
		$product_ids = TemplateSettings::instance()->get_option( $the_option );
		$the_cats = TemplateSettings::instance()->get_option( $the_cat_option );
		if ( empty( $product_ids ) && empty( $the_cats ) ) {
			$option_name = BuilderFns::option_name( $page_type );
			//update_option( $option_name, $default_page_id );
			TemplateSettings::instance()->set_option( $option_name, $default_page_id );
		}

		do_action( 'rtsb/set/builder/default/template', $_POST, $page_id );

		$return = [
			'post_id'   => $default_page_id,
			'page_type' => $page_type,
		];
		wp_send_json_success( $return );
		wp_die();
	}

}
