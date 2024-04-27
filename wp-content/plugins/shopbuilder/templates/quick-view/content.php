<?php
/**
 * Quick view content template
 *
 * @author  RadiusTheme
 * @package ShopBuilder QuickView
 * @version 1.0.0
 */


/**
 * Template variables:
 *
 * @var $product_id                int Current product id
 * @var $button_text               string Button text
 * @var $icon_html                 string Icon for Add to Wishlist button
 * @var $classes                   string Classed for Add to Wishlist button
 * @var $left_text                 string Html allowed
 * @var $right_text                string Html allowed
 */

/**
 * Quick view content.
 *
 * @author  YITH
 * @package YITH WooCommerce Quick View
 * @version 1.0.0
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

while ( have_posts() ) :
	the_post();
	?>
	<div class="quick-view-product-wrapper">
		<div id="product-<?php the_ID(); ?>" <?php post_class( 'product' ); ?>>
			<?php ob_start(); ?>
			<?php do_action( 'rtsb/wcqv/product/image' ); ?>
			<div class="summary entry-summary">
				<div class="summary-content">
					<?php do_action( 'rtsb/wcqv/product/summary' ); ?>
				</div>
			</div>
			<?php $content = ob_get_clean(); ?>
			<?php echo apply_filters( 'rtsb/wcqv/product/content', $content ); ?>
		</div>
	</div>
	<?php
endwhile; // end of the loop.
