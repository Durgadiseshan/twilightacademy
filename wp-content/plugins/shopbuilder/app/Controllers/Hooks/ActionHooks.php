<?php
/**
 * Main ActionHooks class.
 *
 * @package RadiusTheme\SB
 */

namespace RadiusTheme\SB\Controllers\Hooks;

use RadiusTheme\SB\Helpers\Fns;
use RadiusTheme\SB\Models\GeneralList;
use RadiusTheme\SB\Helpers\BuilderFns;
use RadiusTheme\SB\Models\TemplateSettings;
use RadiusTheme\SB\Elementor\Render\Render;

defined( 'ABSPATH' ) || exit();

/**
 * Main ActionHooks class.
 */
class ActionHooks {
	/**
	 * Init Hooks.
	 *
	 * @return void
	 */
	public static function init_hooks() {
		add_action( 'wp_head', [ __CLASS__, 'og_metatags_for_sharing' ], 1 );
		add_action( 'woocommerce_share', [ __CLASS__, 'shopbuilder_share' ], 20 );
		add_action( 'rtsb/wcqv/product/summary', [ __CLASS__, 'shopbuilder_share' ], 40 );
		add_action( 'rtsb/shop/product/image', [ __CLASS__, 'render_image' ], 10, 2 );

		add_action(
			'admin_init',
			function () {
				remove_post_type_support( BuilderFns::$post_type_tb, 'revisions' );
			}
		);
		add_action( 'deleted_post', [ __CLASS__, 'deleted_post' ], 10, 2 );
		add_action( 'rtsb/elements/render/before_query', [ __CLASS__, 'modify_wc_query_args' ] );
		add_action( 'rtsb/elements/render/after_query', [ __CLASS__, 'reset_wc_query_args' ] );
	}
	/**
	 * Meta tags for social sharing.
	 *
	 * @return void
	 */
	public static function deleted_post( $post_id, $post ) {
		if ( BuilderFns::$post_type_tb !== $post->post_type ) {
			return;
		}
		$options = BuilderFns::option_name_for_specific_product_set_default( $post_id );

		if ( TemplateSettings::instance()->get_option( $options ) ) {
			TemplateSettings::instance()->delete_option( $options );
		}

		$template_options = BuilderFns::option_name_by_template_id( $post_id );
		if ( TemplateSettings::instance()->get_option( $template_options ) ) {
			TemplateSettings::instance()->delete_option( $template_options );
		}

		$archive_options = BuilderFns::archive_option_name_by_template_id( $post_id );
		if ( TemplateSettings::instance()->get_option( $archive_options ) ) {
			TemplateSettings::instance()->delete_option( $archive_options );
		}

		$category_options = BuilderFns::option_name_for_specific_category_set_default( $post_id );
		if ( TemplateSettings::instance()->get_option( $category_options ) ) {
			TemplateSettings::instance()->delete_option( $category_options );
		}

		$selected_category_options = BuilderFns::archive_option_name_by_template_id( $post_id );
		if ( TemplateSettings::instance()->get_option( $selected_category_options ) ) {
			TemplateSettings::instance()->delete_option( $selected_category_options );
		}

		global $wpdb;
        // Prepare and execute the SQL query.
		$sql = $wpdb->prepare( "DELETE FROM $wpdb->postmeta WHERE meta_key = %s AND meta_value = %d", BuilderFns::$view_template_for_products_meta, $post_id );
		$wpdb->query( $sql );

		// Prepare and execute the SQL query.
		$sql = $wpdb->prepare( "DELETE FROM $wpdb->termmeta WHERE meta_key = %s AND meta_value = %d", BuilderFns::$view_template_for_archive_meta, $post_id );
		$wpdb->query( $sql );

	}
	/**
	 * Meta tags for social sharing.
	 *
	 * @return void
	 */
	public static function shopbuilder_share() {
		$generalList = GeneralList::instance()->get_data();

		if (
			empty( $generalList['social_share']['share_platforms_to_product_page'] ) ||
			'on' !== $generalList['social_share']['share_platforms_to_product_page'] ||
			empty( $generalList['social_share']['share_platforms'] )
		) {
			return;
		}

		$share_platforms = [];

		foreach ( $generalList['social_share']['share_platforms'] as $value ) {
			$share_platforms[ $value ] = [
				'share_items' => $value,
				'share_text'  => ucwords( $value ),
			];
		}

		$settings['share_platforms'] = $share_platforms;
		$settings['layout']          = ! empty( $generalList['social_share']['share_icon_layout'] ) ? $generalList['social_share']['share_icon_layout'] : 1;
		$settings['show_share_icon'] = 1;

		// TODO:: Implement Later ! empty( $generalList['social_share']['share_icon_show_to_product_page'] ) && 'on' === $generalList['social_share']['share_icon_show_to_product_page'];
		Fns::print_html( Render::instance()->social_share_view( 'elementor/general/social-share', $settings ), true );
	}

	/**
	 * Meta tags for social sharing.
	 *
	 * @return void
	 */
	public static function og_metatags_for_sharing() {
		global $post;

		if ( ! isset( $post ) ) {
			return;
		}

		if ( ! is_singular( 'product' ) ) {
			return;
		}

		Fns::print_html( '<meta property="og:url" content="' . get_the_permalink() . '" />', true );
		Fns::print_html( '<meta property="og:type" content="article" />', true );
		Fns::print_html( '<meta property="og:title" content="' . $post->post_title . '" />', true );
		Fns::print_html( '<meta property="og:description" content="' . wp_trim_words( $post->post_content, 150 ) . '" />' );

		$attachment = get_the_post_thumbnail_url();

		if ( ! empty( $attachment ) ) {
			Fns::print_html( '<meta property="og:image" content="' . $attachment . '" />', true );
		}

		Fns::print_html( '<meta property="og:site_name" content="' . get_bloginfo( 'name' ) . '" />', true );
		Fns::print_html( '<meta name="twitter:card" content="summary" />', true );
	}

	/**
	 * Render image.
	 *
	 * @param array $args Image args.
	 * @param array $settings Settings array.
	 *
	 * @return void
	 */
	public static function render_image( $args, $settings ) {
		if ( $args['image_link'] ) {
			$aria_label = esc_attr(
			/* translators: Product Name */
				sprintf( __( 'Image link for Product: %s', 'shopbuilder' ), $args['title'] )
			);
			?>
			<figure>
				<a class="woocommerce-LoopProduct-link rtsb-img-link" href="<?php echo esc_url( $args['p_link'] ); ?>" aria-label="<?php echo esc_attr( $aria_label ); ?>">
					<?php
					Fns::get_product_image( $args['img_html'], $args['hover_img_html'] );
					?>
				</a>
			</figure>
			<?php
		} else {
			echo '<figure class="rtsb-img-link">';
			Fns::get_product_image( $args['img_html'], $args['hover_img_html'] );
			echo '</figure>';
		}
	}

	/**
	 * Modify WooCommerce query arguments for product retrieval.
	 *
	 * @param array $settings The settings array.
	 *
	 * @return void
	 */
	public static function modify_wc_query_args( $settings ) {
		if ( ( isset( $settings['tax_relation'] ) && 'OR' === $settings['tax_relation'] ) ||
			( isset( $settings['relation'] ) && 'OR' === $settings['relation'] ) ) {
			add_filter( 'woocommerce_product_data_store_cpt_get_products_query', [ FilterHooks::class, 'extra_query_args' ], 10, 2 );
		}
	}

	/**
	 * Reset WooCommerce query arguments for product retrieval.
	 *
	 * @param array $settings The settings array.
	 *
	 * @return void
	 */
	public static function reset_wc_query_args( $settings ) {
		if ( ( isset( $settings['tax_relation'] ) && 'OR' === $settings['tax_relation'] ) ||
			( isset( $settings['relation'] ) && 'OR' === $settings['relation'] ) ) {
			remove_filter( 'woocommerce_product_data_store_cpt_get_products_query', [ FilterHooks::class, 'extra_query_args' ] );
		}
	}
}
