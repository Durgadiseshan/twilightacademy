<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

?>

<?php	
	if ( QuiklearnTheme::$options['search_icon'] ) {
		get_template_part( 'template-parts/header/icon', 'search' );
	}
	if ( QuiklearnTheme::$options['wishlist_icon'] ){
		get_template_part( 'template-parts/header/icon', 'wishlist' );
	}
	if ( QuiklearnTheme::$options['cart_icon'] && class_exists( 'WC_Widget_Cart' ) ){
		get_template_part( 'template-parts/header/icon', 'cart' );
	}
	if ( QuiklearnTheme::$options['vertical_menu_icon'] ){
		get_template_part( 'template-parts/header/icon', 'offcanvas' );
	}
?>