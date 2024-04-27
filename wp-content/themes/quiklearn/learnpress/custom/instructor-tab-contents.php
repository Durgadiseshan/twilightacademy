<?php
/**
 * @author  RadiusTheme
 * @since   2.0
 * @version 2.3
 */

$course_id   = get_the_ID();
$author_id   = get_post_field( 'post_author', $course_id );
$designation = get_the_author_meta( 'quiklearn_author_designation', $author_id );
$author_name = get_the_author_meta( 'display_name', $author_id );
$author_bio  = get_user_meta( $author_id, 'description', true );
$author_link = learn_press_user_profile_link( get_post_field( 'post_author', $course_id ) );

$args2 = array(
	'post_type'           => 'lp_course',
	'post_status'         => 'publish',
	'suppress_filters'    => false,
	'ignore_sticky_posts' => 1,
	'numberposts'      => -1,
	'author'              => $author_id
);

$courses = get_posts( $args2 );
$course_count = sizeof( $courses );                
$course_count_text  = $course_count == 1 ? esc_html__( 'Course', 'quiklearn' ) : esc_html__( 'Courses', 'quiklearn' );

$enroll_count = 0;
foreach ( $courses as $each_course ) {
	$course = learn_press_get_course( $each_course->ID );
	$enroll_count += $course->get_users_enrolled();
}
$enroll_count_text  = $enroll_count == 1 ? esc_html__( 'Student', 'quiklearn' ) : esc_html__( 'Students', 'quiklearn' );
$instructors_text = get_post_meta( $course_id, 'quiklearn_lp_instructors_text', true );
?>
<div class="course-instructor-tab-contents">
	<?php if( !empty( QuiklearnTheme::$options['instructors_title'] ) ) { ?><h2 class="rt-instructor-title tab-sort-title"><?php echo wp_kses( QuiklearnTheme::$options['instructors_title'] , 'alltext_allow' ); ?></h2><?php } ?>
	<?php if( !empty( $instructors_text ) ) { ?><p><?php echo esc_html( $instructors_text ); ?></p><?php } ?>
	<div class="author-instructor">
		<div class="author-avatar">
			<a href="<?php echo esc_url( $author_link );?>"><?php echo get_avatar( $author_id, 170 ); ?></a>
		</div>
		<div class="author-content">
			<div class="author-name"><a href="<?php echo esc_url( $author_link );?>"><?php echo esc_html( $author_name );?></a></div>
			<?php if ( !empty( $designation ) ) : ?>
				<div class="author-designation"><?php echo esc_html( $designation ); ?></div>
			<?php endif; ?>
			<ul class="meta-list">
				<li><i class="icon-quiklearn-note"></i><?php echo sprintf( "%d $course_count_text", $course_count );?></li>
				<li><i class="icon-quiklearn-user"></i><?php echo sprintf( "%d $enroll_count_text", $enroll_count );?></li>
			</ul>
			<?php if ( $author_bio ): ?>
				<div class="author-bio"><?php echo esc_html( $author_bio );?></div>
			<?php endif; ?>
			<?php echo QuiklearnTheme_Helper::user_social($author_id); ?>
		</div>		
	</div>
</div>