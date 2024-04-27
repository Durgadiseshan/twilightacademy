<?php

namespace RadiusTheme\SB\Controllers\Admin\Ajax;

use Elementor\Core\Files\Uploads_Manager;
use Elementor\Plugin;
use Elementor\TemplateLibrary\Source_Base;
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
class CreateTemplate extends Source_Base {
	/**
	 * Singleton Trait.
	 */
	use SingletonTrait;

	/**
	 * Construct function
	 */
	private function __construct() {
		add_action( 'wp_ajax_rtsb_builder_create_template', [ $this, 'response' ] );
	}


	public function get_id() {
	}

	public function get_title() {
	}

	public function register_data() {
	}

	public function get_items( $args = [] ) {
	}

	public function get_item( $template_id ) {
	}

	public function get_data( array $args ) {
	}

	public function delete_template( $template_id ) {
	}

	public function save_item( $template_data ) {
	}

	public function update_item( $new_data ) {
	}

	public function export_template( $template_id ) {
	}

	/**
	 * Create template
	 *
	 * @return void
	 */
	public function response() {
		$page_type        = isset( $_POST['page_type'] ) ? sanitize_text_field( wp_unslash( $_POST['page_type'] ) ) : null; //rtsb_tb_template_type - it represent to template type
		$page_id          = isset( $_POST['page_id'] ) ? absint( wp_unslash( $_POST['page_id'] ) ) : null;
		$page_name        = isset( $_POST['page_name'] ) ? sanitize_text_field( wp_unslash( $_POST['page_name'] ) ) : null;
		$hasPro           = isset( $_POST['hasPro'] ) ? sanitize_text_field( wp_unslash( $_POST['hasPro'] ) ) : null;
		$edit_with        = isset( $_POST['template_edit_with'] ) ? sanitize_text_field( wp_unslash( $_POST['template_edit_with'] ) ) : null;
		$default_template = isset( $_POST['default_template'] ) ? sanitize_text_field( wp_unslash( $_POST['default_template'] ) ) : null;
		$import_layout    = isset( $_POST['import_default_layout'] ) ? sanitize_text_field( $_POST['import_default_layout'] ) : null;
		$product_id       = isset( $_POST['preview_product_id'] ) ? absint( $_POST['preview_product_id'] ) : null;

		$url = '#';

		if ( ! Fns::verify_nonce() || ! $page_type ) {
			$return = [
				'success' => false,
				'post_id' => $page_id,
			];
			wp_send_json( $return );

		}

		add_filter( 'pre_option_elementor_unfiltered_files_upload', function () {
			return '1';
		}, 99 );

		Plugin::$instance->files_manager->clear_cache();
		add_filter( 'rtsb_import_status', '__return_true' );

		$status            = $_REQUEST['status'] ?? '';
		$post_args         = [ 'timeout' => 120 ];
		$post_args['body'] = [
			'status'    => $status,
			'layout_id' => $import_layout,
			'has_pro'   => $hasPro
		];
		$layoutRequest     = wp_remote_post( rtsb()->BASE_API, $post_args );

		$layoutJson = [];
		if ( ! is_wp_error( $layoutRequest ) && ! empty( $layoutRequest['body'] ) ) {
			$layoutJson = json_decode( $layoutRequest['body'], true );
		}

		$option_name = BuilderFns::option_name( $page_type );

		$post_data = [
			'ID'         => $page_id,
			'post_title' => $page_name,
			'meta_input' => [
				BuilderFns::template_type_meta_key() => $page_type,
			],
		];
		if ( 'elementor' == $edit_with ) {
			$post_data['meta_input']['_elementor_edit_mode'] = 'builder';
		} elseif ( 'gutenberg' == $edit_with ) {
			$post_data['meta_input']['_elementor_edit_mode'] = '';
		}

		if ( $page_id ) {
			$page_id  = wp_update_post( $post_data );
			$new_page = false;
		} else {
			unset( $post_data['ID'] );
			$post_data['post_type']   = BuilderFns::$post_type_tb;
			$post_data['post_status'] = 'publish';
			$page_id                  = wp_insert_post( $post_data );
			$new_page                 = true;
			if ( 'elementor' == $edit_with ) {
				update_post_meta( $page_id, '_wp_page_template', 'elementor_header_footer' );
				update_post_meta( $page_id, '_elementor_version', ELEMENTOR_VERSION );
			}
		}

		$edit_by = '';
		if ( $page_id ) {
			if ( 'product' == $page_type ) {
				update_post_meta( $page_id, BuilderFns::$product_template_meta, $product_id );
			}
			$edit_by          = Fns::page_edit_with( $page_id );
			$category_archive = array_unique( isset( $_POST['category_archive'] ) && is_array( $_POST['category_archive'] ) ? array_map( 'sanitize_text_field', $_POST['category_archive'] ) : [] );
			$the_products     = array_unique( isset( $_POST['the_products'] ) && is_array( $_POST['the_products'] ) ? array_map( 'absint', $_POST['the_products'] ) : [] );
			if ( ! count( $the_products ) && ! count( $category_archive ) ) {
				if ( 'default_template' === $default_template ) {
					// update_option( $option_name, $page_id );
					TemplateSettings::instance()->set_option( $option_name, $page_id );
				} else {
					// $has_default = get_option( $option_name );
					$has_default = TemplateSettings::instance()->get_option( $option_name );
					if ( ! $has_default ) {
						// update_option( $option_name, '' );
						TemplateSettings::instance()->set_option( $option_name, '' );
					}
				}
			}

			$action = 'edit';
			if ( 'elementor' === $edit_by ) {
				$action = 'elementor';
			}
			$url = add_query_arg(
				[
					'post'   => $page_id,
					'action' => $action,
				],
				admin_url( 'post.php' )
			);

			if ( ! empty( $layoutJson['data'] ) ) {
				$data    = json_decode( $layoutJson['data'], true );
				$content = $this->process_export_import_content( $data, 'on_import' );
				$content = json_encode( $content );
				update_post_meta( $page_id, '_elementor_data', $content );
				update_post_meta( $page_id, '_rtsb_import_id', $import_layout );
			}
		}

		do_action( 'rtsb/after/create/and/edit/builder/template', $_POST, $page_id );

		$return = [
			'success'       => true,
			'post_id'       => $page_id,
			'post_edit_url' => $url,
			'new_page'      => $new_page,

		];
		if ( $edit_by ) {
			$return['edit_btn_text'] = esc_html__( sprintf( 'Edit with %s', $edit_by ), 'shopbuilder' );
		}
		wp_send_json( $return );
		wp_die();
	}
}
