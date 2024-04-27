<?php
/**
 * The Template for displaying single speaker
 *
 * @see         
 * @package     Eventin\Templates
 * @version     2.3.2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div id="primary" class="content-area">
    <div class="container">
        <?php while ( have_posts() ) : ?>            
            <?php        
            //show woocommerce notice
            if ( class_exists( 'WooCommerce' ) ) {
                wc_print_notices();
            }
            /**
             * etn_single_speaker_template_select hook.
             */
            do_action( "etn_single_speaker_template", the_post() ); ?>
        <?php endwhile; ?>
    </div>
</div>