<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>

<div class="item-icon header-wishlist-icon wishlist-icon">
	<?php if ( shortcode_exists( 'rtsb_wishlist_counter' ) ) {
		echo do_shortcode('[rtsb_wishlist_counter]'); 
	} ?>
</div>