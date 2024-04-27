<?php
/**
 * BuilderFns class
 *
 * The  builder.
 *
 * @package  RadiusTheme\SB
 * @since    1.0.0
 */

namespace RadiusTheme\SB\Helpers;

// Do not allow directly accessing this file.
use RadiusTheme\SB\Models\TemplateSettings;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * BuilderFns class
 */
class BuilderFns {
	/**
	 * Local Cache.
	 *
	 * @var array
	 */
	private static $cache = [];

	/**
	 * Template builder post type
	 *
	 * @var string
	 */
	public static $post_type_tb = 'rtsb_builder';
	/**
	 * Template builder
	 *
	 * @var string
	 */
	public static $template_meta = 'rtsb_tb_template';
	/**
	 * Template builder
	 *
	 * @var string
	 */
	public static $product_template_meta = 'rtsb_selected_product_template';
	/**
	 * Template builder
	 *
	 * @var string
	 */
	public static $view_template_for_products_meta = 'rtsb_template_for_selected_products';
	/**
	 * Template builder
	 *
	 * @var string
	 */
	public static $view_template_for_archive_meta = 'rtsb_template_for_selected_category';

	/**
	 * Page builder id.
	 *
	 * @return int
	 */
	public static function builder_page_id_by_type( $type ) {
		global $post;

		if ( ! array_key_exists( $type, self::builder_page_types() ) ) {
			return 0;
		}

		$options = self::option_name( $type );
		$post_id = TemplateSettings::instance()->get_option( $options );

		if ( empty( $post ) ) {
			return $post_id;
		}

		$cache_key = 'rtsb_builder_page_id_by_type_' . $type;
		if ( isset( self::$cache[ $cache_key ] ) ) {
			return self::$cache[ $cache_key ];
		}

		switch ( $type ) {
			case 'product':
				if ( 'product' === $post->post_type ) {
					$builder_id  = get_post_meta( get_the_ID(), self::$view_template_for_products_meta, true );
					$set_default = self::get_specific_product_as_default( $builder_id );

					if ( 'publish' === $post->post_status ) {
						$post_id = $builder_id && $set_default ? $builder_id : $post_id;
					}
				}
				break;
			case 'archive':
				$queried_object = get_queried_object();

				if ( ! empty( $queried_object->taxonomy ) && 'product_cat' === $queried_object->taxonomy ) {
					$builder_id  = get_term_meta( $queried_object->term_id, self::$view_template_for_archive_meta, true );
					$set_default = self::get_specific_category_as_default( $builder_id );

					if ( 'publish' === $post->post_status ) {
						$post_id = $builder_id && $set_default ? $builder_id : $post_id;
					}
				}
				break;

			default:

		}
		if ( 'publish' === $post->post_status && self::builder_type( $post_id ) === $type ) {
			self::$cache[ $cache_key ] = $post_id;
			return $post_id;
		}

		return $post_id;
	}

	/**
	 * Page builder id.
	 *
	 * @return init
	 */
	public static function builder_page_id_by_page() {
		$type = apply_filters( 'rtsb/builder/set/current/page/type', '' );
		if ( ! $type ) {
			return;
		}

		return self::builder_page_id_by_type( $type );
	}

	/**
	 * Page builder Page for.
	 *
	 * @return array
	 */
	public static function builder_page_types() {
		$page_types = [
			'shop'     => esc_html__( 'Shop', 'shopbuilder' ),
			'archive'  => esc_html__( 'Category Archive', 'shopbuilder' ),
			'product'  => esc_html__( 'Product Page', 'shopbuilder' ),
			'cart'     => esc_html__( 'Cart', 'shopbuilder' ),
			'checkout' => esc_html__( 'Checkout', 'shopbuilder' ),
		];

		return apply_filters( 'rtsb/builder/register/page/types', $page_types );
	}

	/**
	 * Option name.
	 *
	 * @param string $type Builder type.
	 *
	 * @return string
	 */
	public static function option_name( $type ) {
		$type = str_replace( [ '-', ' ' ], '_', $type );

		return self::$template_meta . '_default_' . $type;
	}

	/**
	 * @param $post_id
	 *
	 * @return string|void
	 */
	public static function option_name_for_specific_product_set_default( $post_id ) {
		if ( ! $post_id ) {
			return;
		}

		return 'rtsb_template_specific_product_set_default_' . $post_id;
	}

	/**
	 * @param $post_id
	 *
	 * @return false|mixed|void|null
	 */
	public static function get_specific_product_as_default( $post_id ) {
		if ( ! $post_id ) {
			return;
		}
		$options = self::option_name_for_specific_product_set_default( $post_id );

		return TemplateSettings::instance()->get_option( $options ); // get_option( $options );
	}

	/**
	 * @param $post_id
	 *
	 * @return string|void
	 */
	public static function option_name_for_specific_category_set_default( $post_id ) {
		if ( ! $post_id ) {
			return;
		}

		return 'rtsb_template_specific_category_set_default_' . $post_id;
	}

	/**
	 * @param $post_id
	 *
	 * @return false|mixed|void|null
	 */
	public static function get_specific_category_as_default( $post_id ) {
		if ( ! $post_id ) {
			return;
		}
		$options = self::option_name_for_specific_category_set_default( $post_id );

		return TemplateSettings::instance()->get_option( $options ); // get_option( $options );
	}

	/**
	 * @param $template_id
	 *
	 * @return string
	 */
	public static function option_name_by_template_id( $template_id ) {
		$_suff = null;
		if ( $template_id ) {
			$_suff = '_' . $template_id;
		}

		return self::$view_template_for_products_meta . $_suff;
	}

	/**
	 * @param $template_id
	 *
	 * @return string
	 */
	public static function archive_option_name_by_template_id( $template_id ) {
		$_suff = null;
		if ( $template_id ) {
			$_suff = '_' . $template_id;
		}

		return self::$view_template_for_archive_meta . $_suff;
	}

	/**
	 * Template builder
	 *
	 * @var string
	 */
	public static function template_type_meta_key() {
		return self::$template_meta . '_type';
	}

	/**
	 * Get builder type.
	 *
	 * @param [type] $post_id Post id.
	 *
	 * @return string
	 */
	public static function builder_type( $post_id ) {
		if( ! $post_id ){
			 return ;
		}

		$cache_key = 'rtsb_template_type_' . $post_id;
		if ( isset( self::$cache[ $cache_key ] ) ) {
			return self::$cache[ $cache_key ];
		}

		$type = get_post_meta( $post_id, self::template_type_meta_key(), true );

		// Cache the results in a static variable for the next call.
		self::$cache[ $cache_key ] = $type;

		return $type;
	}

	/**
	 * Template builder
	 *
	 * @var boolean
	 */
	public static function is_builder_preview() {
		return is_singular( self::$post_type_tb );
	}

	/**
	 * Template builder
	 *
	 * @var boolean
	 */
	public static function is_archive() {
		return self::is_page_builder( 'archive', is_product_taxonomy() );
	}

	/**
	 * Template builder
	 *
	 * @var boolean
	 */
	public static function is_shop() {
		return self::is_page_builder( 'shop', is_shop() );
	}

	/**
	 * Template builder
	 *
	 * @var boolean
	 */
	public static function is_cart() {
		return self::is_page_builder( 'cart', is_cart() );
	}

	/**
	 * Template builder
	 *
	 * @var boolean
	 */
	public static function is_checkout() {
		return self::is_page_builder( 'checkout', is_checkout() && ! is_wc_endpoint_url() && ! is_order_received_page() );
	}

	/**
	 * Single Page builder Detection
	 *
	 * @return boolean
	 */
	public static function is_product() {
		return self::is_page_builder( 'product', is_product() );
	}

	/**
	 * Builder page detector.
	 *
	 * @param string  $type builder Page type.
	 * @param boolean $is_page page status.
	 *
	 * @return boolean
	 */
	public static function is_page_builder( $type, $is_page, $is_require_auth = false ) {
		if ( self::builder_type( get_the_ID() ) === $type ) {
			return true;
		}

		if( $is_require_auth && ! is_user_logged_in() ){
			$type   = 'myaccount-auth';
		}

		$builder_id   = self::builder_page_id_by_type( $type );
		if( ! $builder_id ){
			return false;
		}

		$builder_type = self::builder_type( $builder_id );
		if ( $type === $builder_type && $is_page ) {
			return true;
		}

		return false;
	}

	/**
	 * Get builder content function
	 *
	 * @param [type]  $template_id builder Template id.
	 * @param boolean $with_css with css.
	 *
	 * @return mixed
	 */
	public static function get_builder_content( $template_id, $with_css = false ) {
		// Generate a unique key for this specific request
		$cache_key = 'builder_content_' . $template_id . '_' . ( $with_css ? 'with_css' : 'without_css' );

		// Attempt to retrieve content from the cache
		$cached_content = wp_cache_get( $cache_key, 'get_builder_content' );

		if ( false === $cached_content ) {
			// Content not found in cache, fetch and cache it
			$content = \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $template_id, $with_css );

			// Cache the content for 5 minutes (300 seconds)
			wp_cache_set( $cache_key, $content, 'get_builder_content', 300 );

			return $content;
		}

		// Return the cached content
		return $cached_content;
	}


}
