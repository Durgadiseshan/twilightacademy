<?php
/**
 * Template for displaying course content within the loop.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/content-course.php
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$rdtheme_course_style = QuiklearnTheme::$options['course_style'];
?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="rt-course-default rt-course-<?php echo esc_attr( $rdtheme_course_style ); ?>">
		<?php if ( $rdtheme_course_style != 1 ) {
			learn_press_get_template( "custom/course-box-{$rdtheme_course_style}.php" );
		} else {
			learn_press_get_template( 'custom/course-box.php' );
		}
		?>
	</div>
</li>
