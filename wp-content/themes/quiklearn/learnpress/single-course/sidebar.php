<?php
/**
 * Template for displaying course sidebar.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hide sidebar if there is no content
 */
if ( ! is_active_sidebar( 'course-sidebar' ) && ! LP()->template( 'course' )->has_sidebar() ) {
	return;
}
if ( QuiklearnTheme::$layout == 'full-width' ) {
	return;
}

if( is_active_sidebar( 'sidebar' )) {
	$fixedbar = 'fixed-bar-coloum';
}else {
	$fixedbar = '';
}
$quiklearn_id = get_the_ID();
?>

<aside class="course-sidebar <?php echo esc_attr( $fixedbar ); ?>">
	<?php if ( ( QuiklearnTheme::$options['course_wishlist'] ) || ( ( QuiklearnTheme::$options['course_share'] ) && ( function_exists( 'quiklearn_course_share' ) ) ) ) { ?>
	<div class="rt-course-action-list">
		<?php if ( QuiklearnTheme::$options['course_wishlist'] ) { ?>
			<?php quiklearn_lp_wishlist_icon( $quiklearn_id ); ?>
		<?php } if ( ( QuiklearnTheme::$options['course_share'] ) && ( function_exists( 'quiklearn_course_share' ) ) ) { ?>
			<div class="rt-course-share"><span class="meta-title"><i class="icon-quiklearn-share"></i><?php esc_html_e( 'Share This Course', 'quiklearn' );?><?php quiklearn_course_share(); ?></span></div>
		<?php } ?>
	</div>
	<?php } ?>
    <div class="sidebar-widget-area">
		<?php
		if ( QuiklearnTheme::$sidebar !== 'sidebar' && is_active_sidebar( QuiklearnTheme::$sidebar ) ) {
            echo "<div class='custom-single-course-sidebar'>";
			    dynamic_sidebar( QuiklearnTheme::$sidebar );
            echo "<div>";

		} else {
			learn_press_get_template( 'custom/content-course-sidebar.php' );
			if ( is_active_sidebar( 'course-sidebar' ) ) { ?>
				<div class="course-sidebar-secondary">
					<?php dynamic_sidebar( 'course-sidebar' ); ?>
				</div>
			<?php }
        }
		?>
    </div>
</aside>
