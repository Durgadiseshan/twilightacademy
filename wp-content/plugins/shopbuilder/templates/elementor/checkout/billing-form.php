<?php
/**
 * Template variables:
 *
 * @var $controllers  array Widgets/Addons Settings
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}
?>
<div class="rtsb-form-billing">
	<?php
		wc_get_template(
			'checkout/form-billing.php',
			[
				'checkout' => WC()->checkout(),
			]
		);
		?>
</div>

