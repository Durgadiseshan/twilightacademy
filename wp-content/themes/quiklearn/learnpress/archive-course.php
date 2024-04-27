<?php
/**
 * Template for displaying content of archive courses page.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * @since 4.0.0
 *
 * @see LP_Template_General::template_header()
 */
if ( ! wp_is_block_theme() ) {
	do_action( 'learn-press/template-header' );
}

// Layout class
if ( QuiklearnTheme::$layout == 'full-width' ) {
	$quiklearn_layout_class = 'col-sm-12 col-12';
}
else{
	$quiklearn_layout_class = QuiklearnTheme_Helper::has_active_widget();
}

if( is_active_sidebar( 'archive-courses-sidebar' )) {
	$fixedbar = 'fixed-bar-coloum';
}else {
	$fixedbar = '';
}

?>

<div id="primary" class="content-area">
    <div class="container">
        <div class="row">
			<?php if ( QuiklearnTheme::$layout == 'left-sidebar' ) {
				if ( is_active_sidebar( 'archive-courses-sidebar' ) ) { ?>
					<div class="col-xl-3 <?php echo esc_attr( $fixedbar ); ?>">
						<aside class="sidebar-widget-area">
							<?php
							if ( is_active_sidebar( 'archive-courses-sidebar' ) ) {
								dynamic_sidebar( 'archive-courses-sidebar' );
							}
							?>
						</aside>
					</div>
				<?php } else {
					get_sidebar();
				}
			} ?>

			<div class="<?php echo esc_attr( $quiklearn_layout_class ); ?>">
				<main id="main" class="site-main">
					<?php
					/**
					 * LP Hook
					 */
					do_action( 'learn-press/before-main-content' );
					?>
					<div class="lp-content-area rt-lp-content">
						<header class="learn-press-courses-header">
							<?php do_action( 'lp/template/archive-course/description' ); ?>
						</header>

						<?php
						/**
						 * LP Hook
						 */
						do_action( 'learn-press/before-courses-loop' );
						LearnPress::instance()->template( 'course' )->begin_courses_loop();
						if ( LP_Settings_Courses::is_ajax_load_courses() && ! LP_Settings_Courses::is_no_load_ajax_first_courses() ) {
							echo '<div class="lp-archive-course-skeleton" style="width:100%">';
							echo lp_skeleton_animation_html( 10, 'random', 'height:20px', 'width:100%' );
							echo '</div>';
						} else {
							if ( have_posts() ) {
								while ( have_posts() ) :
									the_post();
									learn_press_get_template_part( 'content', 'course' );
								endwhile;
							} else {
								LearnPress::instance()->template( 'course' )->no_courses_found();
							}

							if ( LP_Settings_Courses::is_ajax_load_courses() ) {
								echo '<div class="lp-archive-course-skeleton no-first-load-ajax" style="width:100%; display: none">';
								echo lp_skeleton_animation_html( 10, 'random', 'height:20px', 'width:100%' );
								echo '</div>';
							}
						}
						LearnPress::instance()->template( 'course' )->end_courses_loop();
						do_action( 'learn-press/after-courses-loop' );

						/**
						 * LP Hook
						 */
						do_action( 'learn-press/after-main-content' );

						/**
						 * LP Hook
						 *
						 * @since 4.0.0
						 */
						do_action( 'learn-press/sidebar' );
						?>
					</div>
				</main>
			</div>
			<?php if ( QuiklearnTheme::$layout == 'right-sidebar' ) {
				if ( is_active_sidebar( 'archive-courses-sidebar' ) ) { ?>
					<div class="col-xl-3 fixed-bar-coloum">
						<aside class="sidebar-widget-area">
							<?php
							if ( is_active_sidebar( 'archive-courses-sidebar' ) ) {
								dynamic_sidebar( 'archive-courses-sidebar' );
							}
							?>
						</aside>
					</div>
				<?php } else {
					get_sidebar();
				}
			} ?>
		</div>
	</div>
</div>
<?php
/**
 * @see   LP_Template_General::template_footer()
 * @since 4.0.0
 *
 */
do_action( 'learn-press/template-footer' );