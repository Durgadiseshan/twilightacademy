<?php
/**
 * Template for displaying content of single course.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Header for page
 */
get_header( 'course' );

/**
 * @since 3.0.0
 */
do_action( 'learn-press/before-main-content' );
do_action( 'learn-press/before-main-content-single-course' );

$course_layout_ops = get_post_meta( get_the_ID() ,'quiklearn_course_style', true );

?>
    <div id="primary" class="content-area <?php echo esc_attr($course_layout_ops); ?>">
		<div class="container">
			<?php
			while ( have_posts() ) {
				the_post();
				learn_press_get_template( 'content-single-course' );
			}

			/**
			 * @since 3.0.0
			 */

			do_action( 'learn-press/after-main-content-single-course' );
			do_action( 'learn-press/after-main-content' );

			/**
			 * LP sidebar
			 */
			do_action( 'learn-press/sidebar' );
			?>
		</div>
    </div>
<?php

/**
 * Footer for page
 */
get_footer( 'course' );