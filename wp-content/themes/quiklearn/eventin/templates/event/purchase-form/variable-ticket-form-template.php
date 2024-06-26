<?php

do_action( 'etn_before_add_to_cart_form', $single_event_id );

$sells_engine="";
if ( class_exists('Wpeventin_Pro') ) {
	$sells_engine = \Etn_Pro\Core\Modules\Sells_Engine\Sells_Engine::instance()->check_sells_engine();
}
if(class_exists('WooCommerce') && 'woocommerce' === $sells_engine) {
	$price_decimal      =  esc_attr( wc_get_price_decimals() );
	$thousand_separator =  esc_attr( wc_get_price_thousand_separator() );
	$price_decimal_separator = esc_attr( wc_get_price_decimal_separator() );
} else {
	$price_decimal      =  '2';
	$thousand_separator =  ',';
	$price_decimal_separator =  '.';
}

?>

    <form 
		method="post"
		class="etn-event-form-parent etn-ticket-variation"
		data-etn_uid="<?php echo esc_html( $unique_id ); ?>"
		data-decimal-number-points="<?php echo esc_attr( $price_decimal ); ?>"
		data-thousand-separator="<?php echo esc_attr( $thousand_separator ); ?>"
		data-decimal-separator="<?php echo esc_attr( $price_decimal_separator ); ?>"
		>
        <input name="event_name"
			type="hidden"
			value="<?php echo esc_html( $event_title ); ?>"/>
        <input name="specific_lang"
			type="hidden"
			value="<?php echo isset( $_GET['lang'] ) ? esc_html( $_GET['lang'] ) : ''; ?>"/>
		<?php
		apply_filters( 'etn_pro/stripe/stripe_field', null );
		if ( ! class_exists( 'Wpeventin_Pro' ) ) {
			?>
            <input type="hidden" name="sells_engine" value="woocommerce"/>
			<?php
		}

		if ( $attendee_reg_enable ) {
			?>
			<?php wp_nonce_field( 'ticket_purchase_next_step_two', 'ticket_purchase_next_step_two' ); ?>
            <input name="ticket_purchase_next_step" type="hidden" value="two"/>
            <input name="event_id" type="hidden" value="<?php echo intval( $single_event_id ); ?>"/>
			<?php
		} else {
			?>
            <input name="add-to-cart" type="hidden" value="<?php echo intval( $single_event_id ); ?>"/>
			<?php
		}
		?>

        <!-- Ticket Markup Starts Here -->
		<?php
		$ticket_variation        = get_post_meta( $single_event_id, "etn_ticket_variations", true );
		$etn_ticket_availability = get_post_meta( $single_event_id, "etn_ticket_availability", true );

		if ( is_array( $ticket_variation ) && count( $ticket_variation ) > 0 ) {
			$cart_ticket = [];
			if ( class_exists( 'Woocommerce' ) && ! is_admin() ) {
				global $woocommerce;
				$items = $woocommerce->cart = new WC_Cart();
				foreach ( $items as $item ) {
					if ( ! empty( $item['etn_ticket_variations'] ) ) {
						$variations = $item['etn_ticket_variations'];
						if ( isset( $variations[0]['etn_ticket_slug'] ) && isset( $variations[0]['etn_ticket_qty'] ) ) {
							$slug = $variations[0]['etn_ticket_slug'];
							$qty  = $variations[0]['etn_ticket_qty'];

							if ( isset( $cart_ticket[ $slug ] ) ) {
								$cart_ticket[ $slug ] += $qty;
							} else {
								$cart_ticket[ $slug ] = $qty;
							}
						}
					}
				}
			}
			$number = ! empty( $i ) ? $i : 0;
			?>
            <div class="variations_<?php echo intval( $number ); ?>">
                <input type="hidden" name="variation_picked_total_qty" value="0" class="variation_picked_total_qty"/>
				<?php foreach ( $ticket_variation as $key => $value ) {
					$total_tickets = absint( $value['etn_avaiilable_tickets'] );
					if ( $total_tickets > 0 ) {
						$etn_min_ticket = ! empty( $value['etn_min_ticket'] ) ? absint( $value['etn_min_ticket'] ) : 0;
						$etn_max_ticket = ! empty( $value['etn_max_ticket'] ) ? absint( $value['etn_max_ticket'] ) : 0;
						$sold_tickets   = absint( $value['etn_sold_tickets'] );

						$etn_cart_limit = 0;
						if ( ! empty( $cart_ticket ) ) {
							$etn_cart_limit = ! empty( $cart_ticket[ $value['etn_ticket_slug'] ] ) ? $cart_ticket[ $value['etn_ticket_slug'] ] : 0;
						}

						$etn_current_stock = absint( $total_tickets - $sold_tickets );
						$stock_outClass    = ( $etn_current_stock === 0 ) ? 'stock_out' : '';
						?>
                        <div class="variation_<?php echo esc_attr( $key ) ?>">
                            <div class="etn-single-ticket-item">
                                <h5 class="ticket-header">
									<?php
									esc_html_e( $value['etn_ticket_name'], 'quiklearn' );
									if ( ! isset( $event_options["etn_hide_seats_from_details"] ) ) {
										if ( $etn_current_stock > 0 ) {
											if ( $etn_ticket_availability || $etn_ticket_availability == 'on' || $etn_ticket_availability == 'yes' ) {
												?>
                                                <span class="seat-remaining-text">(<?php echo esc_html__( ' Seats Available: ', 'quiklearn' ); echo esc_html( $etn_current_stock ); ?> )</span>
											<?php } else { ?>
                                                <span class="seat-remaining-text">(<?php echo esc_html__( ' Unlimited ticket', 'quiklearn' ); ?>)</span>
											<?php } ?>
										<?php } else { ?>
                                            <span class="seat-remaining-text">(<?php echo esc_html__( 'All tickets have been sold out', 'quiklearn' ); ?>)</span>
											<?php
										}
									}
									?>
                                </h5>
                                <div class="etn-ticket-divider"></div>
                                <div class="etn-ticket-price-body <?php echo esc_attr( $stock_outClass ) ?>">
                                    <div class="ticket-price-item etn-ticket-price">                                        
                                        <strong>
											<?php
											$price = number_format( (float) $value['etn_ticket_price'], $price_decimal, $price_decimal_separator, $thousand_separator );
											echo \Etn\Core\Event\Helper::instance()->currency_with_position( $price );
											?>
                                        </strong>
                                    </div>
                                    <!-- Min , Max and stock quantity checking start -->
                                    <div class="ticket-price-item etn-quantity">                                        
                                        <button type="button" class="qt-btn qt-sub" data-multi="-1"
                                                data-key="<?php echo intval( $key ) ?>">-
                                        </button>
                                        <input name="ticket_quantity[]" type="number"
                                               class="etn_ticket_variation ticket_<?php echo intval( $key ); ?>"
                                               value="0" id="ticket-input_<?php echo intval( $key ); ?>"
                                               data-price="<?php echo number_format( (float) $value['etn_ticket_price'], $price_decimal, '.', '' ); ?>"
                                               data-etn_min_ticket="<?php echo absint( $etn_min_ticket ); ?>"
                                               data-etn_max_ticket="<?php echo absint( $etn_max_ticket ); ?>"
                                               data-etn_current_stock="<?php echo absint( $etn_current_stock ); ?>"
                                               data-stock_out='<?php echo esc_attr( "All ticket has has been sold", "quiklearn" ) ?>'
                                               data-cart_ticket_limit='<?php echo esc_attr( "You have already added 5 tickets. You can't purchase more than $etn_max_ticket tickets", "quiklearn" ) ?>'
                                               data-stock_limit='<?php echo esc_attr( "Stock limit $etn_current_stock. You can purchase within $etn_current_stock.", "quiklearn" ) ?>'
                                               data-qty_message='<?php echo esc_attr( "Total Ticket quantity must be greater than or equal ", "quiklearn" ) . $etn_min_ticket . esc_attr( " and less than or equal ", "quiklearn" ) . $etn_max_ticket; ?>'
                                               data-etn_cart_limit="<?php echo absint( $etn_cart_limit ); ?>"
                                               data-etn_cart_limit_message='<?php echo esc_attr( "You have already added $etn_cart_limit, Which is greater than maximum quantity $etn_max_ticket . You can add maximum $etn_max_ticket tickets. ", "quiklearn" ); ?>'/>
                                        <button type="button" class="qt-btn qt-add" data-multi="1"
                                                data-key="<?php echo intval( $key ) ?>">+
                                        </button>
                                    </div>
                                    <!-- Min , Max and stock quantity checking start -->                                    
								<input name="ticket_price[]" type="hidden" value="<?php echo number_format( (float) $value['etn_ticket_price'], $price_decimal, '.','' );?>"/>
								<input name="ticket_name[]" type="hidden" value="<?php esc_html_e( $value['etn_ticket_name'],'quiklearn' );?>"/>
								<input name="ticket_slug[]" type="hidden" value="<?php esc_html_e( $value['etn_ticket_slug'], 'quiklearn' );?>"/>
							</div>
                            <div class="show_message show_message_<?php echo intval( $key ); ?> quantity-error-msg"></div>
                        </div>
                        </div>
						<?php do_action( 'etn_before_add_to_cart_total_price', $single_event_id, $key, $value ); ?>
						<?php
					}
				}
				?>

                <!-- Ticket Markup Ends Here -->
                <div class="etn-variable-total-price">
                    <div id="etn_variable_ticket_form_price" class="etn_variable_ticket_form_price">
                        <div class="etn-total-quantity">
                            <label><?php echo esc_html__( 'Total Quantity', "quiklearn" ); ?></label>
                            <strong class="variation_total_qty">0.00</strong>
                        </div>

                        <div class="etn-ticket-total-price">
                            <label><?php echo esc_html__( 'Total Price', "quiklearn" ); ?></label>
                            <strong>
								<?php
								$price = '<span class="variation_total_price">0</span>';
								echo \Etn\Core\Event\Helper::instance()->currency_with_position( $price );
								?>
                            </strong>
                        </div>
                        <input type="hidden" name="etn_total_price" class="variation_total_price" value="0"/>
                        <input type="hidden" name="etn_total_qty" class="variation_total_qty" value="0"/>
                    </div>
                </div>
            </div>
			<?php
		}
		?>

		<?php do_action( 'etn_before_add_to_cart_button', $single_event_id ); ?>

		<?php

		if ( ! isset( $event_options["etn_purchase_login_required"] ) || ( isset( $event_options["etn_purchase_login_required"] ) && is_user_logged_in() ) ) {
			$multivendor_active = ( class_exists( 'Woocommerce' ) && class_exists( 'WeDevs_Dokan' ) ) ? true : false;
			if ( $multivendor_active ) {
				do_action( 'etn_cart_multivendor_products_modal' );
			}
			?>
            <input name="submit"
                   class="etn-btn etn-primary etn-add-to-cart-block disabled <?php echo esc_attr( absint( $single_event_id ) ); ?>"
                   data-event_id="<?php echo esc_attr( absint( $single_event_id ) ); ?>" data-validation_checked="0"
                   data-multivendor_active="<?php echo esc_attr( ( $multivendor_active ) ? '1' : '0' ); ?>" type="submit"
                   value="<?php $cart_button_text = apply_filters( 'etn_event_cart_button_text', esc_html__( "Buy ticket", "quiklearn" ) );
			       echo esc_html( $cart_button_text ); ?>"/>
			<?php
		} else {
			?>
            <small>
				<?php echo esc_html__( 'Please', 'quiklearn' ); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php echo esc_html__( "Login", "quiklearn" ); ?></a> <?php echo esc_html__( ' to buy ticket!', "quiklearn" ); ?>
            </small>
			<?php
		}
		?>

		<?php do_action( 'etn_after_add_to_cart_button', $single_event_id ); ?>
    </form>

<?php do_action( 'etn_after_add_to_cart_form', $single_event_id ); ?>