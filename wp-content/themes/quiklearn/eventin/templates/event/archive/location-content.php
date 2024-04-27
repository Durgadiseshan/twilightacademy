<?php
defined( 'ABSPATH' ) || die();

$etn_event_location = get_post_meta( get_the_ID(), 'etn_event_location', true );
$ticket_variation   = get_post_meta( $single_event_id, "etn_ticket_variations", true );
?>

<div class="location-price-wrap">
    <?php if( QuiklearnTheme::$options['event_ar_location'] ) { ?>
    <div class="rt-event-location">
        <i class="icon-quiklearn-location"></i><?php echo esc_html( $etn_event_location ); ?>
    </div>
    <?php } ?>
    <?php if( QuiklearnTheme::$options['event_ar_price'] && class_exists( 'WooCommerce' ) ) { ?>
    <div class="rt-ticket-price">
        <?php if( !empty( $ticket_variation ) ) {
            $price  = wp_list_pluck($ticket_variation, 'etn_ticket_price' );
            $min = min($price);
            $max = max($price);
            ?> 
            <span class="sprice">
            <?php
            if( $min ) {
                echo \Etn\Core\Event\Helper::instance()->currency_with_position( $min );
            } if( $min != $max ) {
                echo ' - ';
                echo \Etn\Core\Event\Helper::instance()->currency_with_position( $max );
            } ?>
            </span>
        <?php } else { ?>
            <?php echo esc_html__( "Free", "quiklearn" ); ?>
        <?php } ?>
    </div>
    <?php } ?>
</div>