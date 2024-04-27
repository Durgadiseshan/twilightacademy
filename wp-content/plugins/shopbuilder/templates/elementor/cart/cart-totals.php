<?php
/**
 * Template variables:
 *
 * @var $controllers  array Widgets/Addons Settings
 * @var $is_builder  boolean Is Cart Edit page
 */

defined( 'ABSPATH' ) || exit;

?>

<div class="rtsb-cart-totals">
    <?php woocommerce_cart_totals(); ?>
</div>