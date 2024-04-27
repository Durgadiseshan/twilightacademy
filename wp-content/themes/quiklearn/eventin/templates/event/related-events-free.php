<?php

use \Etn\Utils\Helper;

defined( 'ABSPATH' ) || exit;
$thumb_size = 'quiklearn-size3';
$excerpt_limit = QuiklearnTheme::$options['event_content_limit'];
if ( is_array( $data ) && ! empty( $data ) && QuiklearnTheme::$options['single_event_related'] == 1 ) {
	?>
    <div class="rt-event-related-post">
        <h3 class="related-post-title">
			<?php
			$related_events_title = apply_filters( 'etn_event_related_event_title', $title );
			echo Helper::render( $related_events_title );
			?>
        </h3>
        <div class="row g-4">
			<?php
			foreach ( $data as $value ) {
				$category = Helper::cate_with_link( $value->ID, 'etn_category' );
				$category = ! empty( $category ) ? $category : "";
				$start_date             = get_post_meta( $value->ID, 'etn_start_date', true );
				$start_date             = Helper::etn_date( $start_date );
				$related_event_location = get_post_meta( $value->ID, 'etn_event_location', true );
				$event_location_type    = get_post_meta( $value->ID, 'etn_event_location_type', true );
				$event_terms            = ! empty( get_the_terms( $value->ID, 'etn_location' ) ) ? get_the_terms( $value->ID, 'etn_location' ) : [];
                $ticket_variation   = get_post_meta( $value->ID, "etn_ticket_variations", true );
				?>
                <div class="col-md-4 col-12">
                    <div class="rt-event-item">
						<?php
						if ( get_the_post_thumbnail_url( $value->ID ) ) { ?>
                            <div class="rt-event-thumb">
                                <a href="<?php echo esc_url( get_the_permalink( $value->ID ) ); ?>" aria-label="<?php echo get_the_title(); ?>"><?php echo get_the_post_thumbnail( $value->ID, $thumb_size ); ?></a>
                                <?php if( QuiklearnTheme::$options['event_ar_cat'] ) { ?>
                                <div class="rt-event-cat">
									<?php echo Helper::kses( $category ); ?>
                                </div>
                                <?php } ?>
                            </div>
						<?php } ?>
                        <div class="rt-event-content">  
                            <?php if( QuiklearnTheme::$options['event_ar_date'] ) { ?>                          
                            <div class="rt-event-footer">
                                <div class="rt-event-date">
                                    <i class="icon-quiklearn-calendar"></i>
									<?php echo esc_html( $start_date ); ?>
                                </div>
                            </div>
                            <?php } ?>
                            <h3 class="rt-title rt-event-title">
                                <a href="<?php echo esc_url( get_the_permalink( $value->ID ) ); ?>">
									<?php echo esc_html( get_the_title( $value->ID ) ); ?>
                                </a>
                            </h3>
                            <?php if( QuiklearnTheme::$options['event_ar_excerpt'] ) { ?>
                            <p><?php echo esc_html( Helper::trim_words( $value->post_excerpt, $excerpt_limit, '' ) ); ?></p>
                            <?php } ?>
                            <div class="location-price-wrap">
                                <?php if ( ! empty( $related_event_location ) && QuiklearnTheme::$options['event_ar_location'] ) { ?>
                                    <div class="rt-event-location">
                                        <i class="icon-quiklearn-location"></i>
                                        <?php echo esc_html( $related_event_location ); ?>
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
                        </div>
                    </div>
                </div>
			<?php } ?>
        </div>
    </div>
	<?php
}
