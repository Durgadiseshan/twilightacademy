<?php
/**
 * Template for displaying overview tab of single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/tabs/overview.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

/**
 * @var LP_Course $course
 */
$course = learn_press_get_course();
if ( ! $course ) {
	return;
}
?>

<div class="course-description" id="learn-press-course-description">
	<?php if( !empty( QuiklearnTheme::$options['overview_title'] ) ) { ?><h2 class="rt-review-title tab-sort-title"><?php echo wp_kses( QuiklearnTheme::$options['overview_title'] , 'alltext_allow' ); ?></h2><?php } ?>
	<?php
	/**
	 * @deprecated
	 */
	do_action( 'learn_press_begin_single_course_description' );

	/**
	 * @since 3.0.0
	 */
	do_action( 'learn-press/before-single-course-description' );

	learn_press_echo_vuejs_write_on_php( $course->get_content() );

	/**
	 * @since 3.0.0
	 */
	do_action( 'learn-press/after-single-course-description' );

	/**
	 * @deprecated
	 */
	do_action( 'learn_press_end_single_course_description' );
	?>

</div>
