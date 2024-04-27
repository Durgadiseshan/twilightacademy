<?php
/**
 * The Template for displaying single event
 *
 * @see         
 * @package     Eventin\Templates
 * @version     2.3.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php while ( have_posts() ) : ?>        
    <?php
    //show woocommerce notice
    if ( class_exists( 'WooCommerce' ) ) {
        wc_print_notices();
    }
    ?>
    <?php do_action( "etn_single_event_template", the_post() ); ?>
<?php endwhile; ?>
