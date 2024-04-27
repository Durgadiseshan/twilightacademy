<?php
/**
 * Template for displaying curriculum tab of single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/tabs/curriculum.php.
 *
 * @author  ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.1
 */

defined( 'ABSPATH' ) || exit();
$course_id     = get_the_ID();
$course = learn_press_get_course();
$user   = learn_press_get_current_user();

if ( ! $course || ! $user ) {
	return;
}

$can_view_content_course = $user->can_view_content_course( $course->get_id() );
$curriculum_text = get_post_meta( $course_id, 'quiklearn_lp_curriculum_text', true );	

?>

<div class="course-curriculum" id="learn-press-course-curriculum">
    <?php if( !empty( QuiklearnTheme::$options['curriculum_title'] ) ) { ?><h2 class="tab-sort-title"><?php echo wp_kses( QuiklearnTheme::$options['curriculum_title'] , 'alltext_allow' ); ?></h2><?php } ?>
    <?php if( !empty( $curriculum_text ) ) { ?><p><?php echo esc_html( $curriculum_text ); ?></p><?php } ?>
	<div class="curriculum-scrollable">
		<?php do_action( 'learn-press/before-single-course-curriculum' ); ?>
		<?php
		$curriculum  = $course->get_curriculum();
		$user_course = $user->get_course_data( get_the_ID() );
		$user        = learn_press_get_current_user();
		if ( $curriculum ) :
			?>
			<ul class="curriculum-sections">
				<?php
				foreach ( $curriculum as $section ) {
					$args = [
						'section'                 => $section,
						'can_view_content_course' => $can_view_content_course,
						'user_course'             => $user_course,
						'user'                    => $user,
					];
					learn_press_get_template( 'single-course/loop-section.php', $args );
				}
				?>
			</ul>
		<?php else : ?>
			<?php
			echo wp_kses_post(
				apply_filters(
					'learnpress/course/curriculum/empty',
					esc_html__( 'The curriculum is empty', 'quiklearn' )
				)
			);
			?>
		<?php endif ?>
		<?php do_action( 'learn-press/after-single-course-curriculum' ); ?>
	</div>
</div>
