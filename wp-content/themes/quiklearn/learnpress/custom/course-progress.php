<?php
/**
 * @author  RadiusTheme
 * @since   3.1.1
 * @version 3.3
 */

$course = LP_Global::course();
$course_id   = get_the_ID();
$money_back = get_post_meta( $course_id, 'quiklearn_lp_money_back', true );
?>

<?php single_course_sidebar_thumbnail(); ?>
<?php if ( QuiklearnTheme::$options['course_price'] ): ?>
	<div class="widget course-meta-wid course_enroll_wid single-sidebar padding-bottom1">		
		<div class="rt-pricing">
			<span class="course-price-label"><?php esc_html_e( 'Course Fee', 'quiklearn' ); ?></span>
			<?php echo quiklearn_lp_price_html( $course ); ?>
		</div>

		<?php if( !empty( $money_back ) ) { ?><p class="pricing-subtext"><?php echo wp_kses( $money_back , 'alltext_allow' ); ?></p><?php } ?>

        <?php LP()->template( 'course' )->course_buttons(); ?>
	</div>	
<?php endif; ?>

<?php echo quiklearn_lp_course_sidebar_features(); ?>

<?php if ( quiklearn_lp_user_can_access_course() && QuiklearnTheme::$options['course_progress'] ): ?>
	<div class="widget course-meta-wid course_progress_wid single-sidebar padding-bottom1">
		<h3 class="side-bar-title"><?php esc_html_e( 'Your Progress', 'quiklearn' );?></h3>
        <?php LP()->template( 'course' )->user_progress(); ?>
	</div>
<?php endif; ?>