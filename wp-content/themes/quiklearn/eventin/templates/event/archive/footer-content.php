<?php

defined( 'ABSPATH' ) || die();

$etn_start_date   = get_post_meta( get_the_ID(), 'etn_start_date', true );

?>
<?php if( QuiklearnTheme::$options['event_ar_date'] ) { ?>
<div class="rt-event-footer">
	<?php do_action( 'etn_before_event_archive_footer_content' );?>
		<div class="rt-event-date">
			<i class="icon-quiklearn-calendar"></i><?php echo esc_html( \Etn\Utils\Helper::etn_date( $etn_start_date ) ); ?>
		</div>
	<?php do_action( 'etn_after_event_archive_footer_content' );?>
</div>
<?php } ?>