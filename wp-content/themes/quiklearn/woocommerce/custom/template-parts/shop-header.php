<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
if ( QuiklearnTheme::$layout == 'full-width' ) {
	$quiklearn_layout_class = 'col-sm-12 col-12';
}  else {
	$quiklearn_layout_class = QuiklearnTheme_Helper::has_active_widget();	
}
if( is_active_sidebar( 'shop-sidebar' )) {
	$fixedbar = 'fixed-bar-coloum';
}else {
	$fixedbar = '';
}

?>
<div id="primary" class="section content-area customize-content-selector">
	<div class="container">		
		<div class="row">		
			<?php if ( QuiklearnTheme::$layout == 'left-sidebar' ) {
				if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
					<div class="col-xl-3 <?php echo esc_attr( $fixedbar ); ?>">
						<aside class="sidebar-widget-area">
						<?php if ( is_active_sidebar( 'shop-sidebar' ) ) dynamic_sidebar( 'shop-sidebar' ); ?>
						</aside>
					</div>
				<?php } else {
					get_sidebar();
				}
			} ?>
			
			<div class="<?php echo esc_attr( $quiklearn_layout_class );?>">		
			<main id="main" class="site-main page-content-main">
				<div class="rt-sidebar-sapcer">