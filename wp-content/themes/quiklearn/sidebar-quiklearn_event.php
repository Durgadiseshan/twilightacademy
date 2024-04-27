<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
defined( 'ABSPATH' ) || exit;
use Etn\Utils\Helper as helper;

if ( is_active_sidebar( 'event-sidebar' )) {
	$fixedbar = 'fixed-bar-coloum';
} else {
	$fixedbar = '';
}
?>
<div class="col-xl-3 fixed-bar-coloum">
	<aside class="sidebar-widget-area">
		<?php if( QuiklearnTheme::$options['event_ar_search'] ) { ?>
		<div class="rt-advanced-search-form">
			<h3 class="widgettitle"><?php echo esc_html('Find Event', 'quiklearn'); ?></h3>
            <?php helper::get_event_search_form(); ?>
        </div>
		<?php } ?>
		<?php if ( is_active_sidebar( 'event-sidebar' ) ) dynamic_sidebar( 'event-sidebar' ); ?>
	</aside>
</div>