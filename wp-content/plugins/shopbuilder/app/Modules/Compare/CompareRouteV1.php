<?php

namespace RadiusTheme\SB\Modules\Compare;

use RadiusTheme\SB\Abstracts\Api;
use WP_Error;
use WP_HTTP_Response;
use WP_REST_Request;
use WP_REST_Response;
use WP_REST_Server;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}


class CompareRouteV1 extends Api {


	public function config() {
	}


	public function init() {
		add_action( 'rest_api_init', function () {
			register_rest_route( $this->getNamespace(), '/compare/add_to_list', [
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => [ $this, 'add_to_list_callback' ],
				'permission_callback' => '__return_true'
			] );
			register_rest_route( $this->getNamespace(), '/compare/remove_from_list', [
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => [ $this, 'remove_from_list_callback' ],
				'permission_callback' => '__return_true'
			] );
		} );
	}

	/**
	 * @param WP_REST_Request $request
	 *
	 * @return WP_Error|WP_HTTP_Response|WP_REST_Response
	 */
	public function add_to_list_callback( $request ) {
		$product_id = $request->get_param( 'product_id' );

		if ( ! $product_id ) {
			return $this->sendError( esc_html__( 'Product id not found.', 'shopbuilder' ) );
		}

		$inserted = CompareFns::instance()->add_product( $product_id );
		if ( is_wp_error( $inserted ) ) {
			return $this->sendError( $inserted->get_error_message() );
		}

		return $this->sendResponse( [
			'item_count' => count( CompareFns::instance()->get_compared_product_ids() ),
			'product_id' => $product_id,
			'list_html'  => CompareFrontEnd::instance()->list_shortcode([])
		] );
	}


	/**
	 * @param WP_REST_Request $request
	 *
	 * @return WP_Error|WP_HTTP_Response|WP_REST_Response
	 */
	public function remove_from_list_callback( $request ) {
		$product_id = $request->get_param( 'product_id' );

		if ( ! $product_id ) {
			return $this->sendError( esc_html__( 'Product id not found.', 'shopbuilder' ) );
		}

		$deleted = CompareFns::instance()->remove_product( $product_id );
		if ( is_wp_error( $deleted ) ) {
			return $this->sendError( $deleted->get_error_message() );
		}

		if ( ! $deleted ) {
			return $this->sendError( esc_html__( 'The product does not delete!', 'shopbuilder' ) );
		}

		return $this->sendResponse( [
			'product_id' => $product_id,
			'item_count' => count( CompareFns::instance()->get_compared_product_ids() ),
			'list_html'  => CompareFrontEnd::instance()->list_shortcode([])
		] );

	}

}