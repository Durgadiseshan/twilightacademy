<?php
/**
 * Template variables:
 *
 * @var $controllers        array settings as array
 * @var $is_builder_mode    bool Editor Mode status
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}
?>
<?php if ( function_exists( 'wc_print_notices' ) ) : ?>
<div class="rtsb-notice">
	<?php wc_print_notices(); ?>
</div>
<?php endif; ?>
