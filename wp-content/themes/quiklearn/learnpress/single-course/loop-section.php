<?php
/**
 * Template for displaying loop course of section.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/loop-section.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.2
 */

defined( 'ABSPATH' ) || exit();

/**
 * @var LP_Course_Section $section
 */
if ( ! isset( $section ) || ! isset( $can_view_content_course )
	|| ! isset( $user_course ) || ! isset( $user ) ) {
	return;
}

$course = learn_press_get_course();

if ( ! apply_filters( 'learn-press/section-visible', true, $section, $course ) ) {
	return;
}

$user        = learn_press_get_current_user();
$user_course = $user->get_course_data( get_the_ID() );


/**
 * List items of section
 *
 * @var LP_Course_Item[]
 */
$items = $section->get_items();

$complete_course = $user_course->get_completed_items( '', true, $section->get_id() );
if ( ! empty($complete_course) && is_array($complete_course) ) {
	$complete_course = $complete_course[0];
} else {
	$complete_course = 0;
}

$total_course = $section->count_items();
if ( is_rtl() ) {
	$rdtheme_steps = "$total_course/$complete_course";
} else {
	$rdtheme_steps = "$complete_course/$total_course";
}
?>

<li <?php $section->main_class(); ?>
        id="section-<?php echo esc_attr( $section->get_slug() ); ?>"
        data-id="<?php echo esc_attr( $section->get_slug() ); ?>"
        data-section-id="<?php echo esc_attr( $section->get_id() ); ?>">
	<?php do_action( 'learn-press/before-section-summary', $section, $course->get_id() ); ?>

    <h3 class="section-header">
        <span class="title"><?php echo esc_html( $section->get_title() ); ?></span>
        <span class="meta">
            <span class="step"><?php echo esc_html( $rdtheme_steps ); ?></span>
            <span class="collapse"></span>
        </span>
    </h3>

	<?php if ( $description = $section->get_description() ): ?>
        <p class="section-description"><?php echo wp_kses_post( $description ); ?></p>
	<?php endif; ?>

	<?php do_action( 'learn-press/before-section-content', $section, $course->get_id() ); ?>

	<?php if ( ! $items ) : ?>
		<?php learn_press_display_message( __( 'No items in this section', 'quiklearn' ) ); ?>
	<?php else : ?>
        <ul class="section-content">
			<?php foreach ( $items as $item ): ?>
				<?php
				$item_type = $item->get_item_type();
				if ( empty( $count[ $item_type ] ) ) {
					$count[ $item_type ] = 1;
				} else {
					$count[ $item_type ] ++;
				}
				$order = $section->get_position() . '.' . $count[ $item_type ];
				if ( $item_type == 'lp_quiz' ) {
					$order_text = esc_html__( ' Quiz', 'quiklearn' );
					$icon       = 'icon-quiklearn-quiz';
				} else {
					$order_text = esc_html__( ' Lecture', 'quiklearn' );
					$icon       = 'icon-quiklearn-note';
				}

				$order_html = "<span>$order_text </span>$order";
				if ( is_rtl() ) {
					$order_html = "$order";
				}

				$duration = quiklearn_lp_lesson_duration( $item->get_id() );
				if ( $duration ) {
					$item_right_html = '<i class="icon-quiklearn-clock"></i><span>' . $duration . '</span>';
					$item_class      = '';
				} else {
					$item_right_html = '';
					$item_class      = 'no-counting';
				}
	
				$item_class = implode( ' ', $item->get_class_v2( $course->get_id(), $item->get_id(), $can_view_content_course ) );		

				?>
                <li class="<?php echo esc_attr($item_class); ?>">
					<?php
					if ( $item->is_visible() ):
						/**
						 * @since 3.0.0
						 */
						if ( $user->can_view_item( $item->get_id() ) ) {
							$start_tag = '<a class="section-item-link" href="' . $item->get_permalink() . '">';
							$end_tag   = '</a>';
						} else {
							$start_tag = '<div class="section-item-link">';
							$end_tag   = '</div>';
						}
						do_action( 'learn-press/begin-section-loop-item', $item );
						?>
						<?php echo wp_kses_post( $start_tag ); ?>

                        <div class="rt-left">
                            <span class="rt-left-icon"><i class="<?php echo esc_attr( $icon ); ?>"></i></span>
                            <span class="rt-left-index"><?php echo wp_kses_post( $order_html ); ?></span>
                        </div>
                        <div class="rt-center">
                            <span class="course-item-title"><?php echo wp_kses_post( $item->get_title( 'display' ) ); ?></span>                            
                        </div>
                        <div class="rt-right">
							<?php echo wp_kses_post( $item_right_html ); ?>
							<?php if ( $item->is_preview() ): ?>
									<?php $course_id = $section->get_course_id(); ?>
									<?php if ( get_post_meta( $course_id, '_lp_required_enroll', true ) == 'yes' ): ?>
                                        <span><?php esc_html_e( 'Preview', 'quiklearn' ); ?></span>
									<?php endif; ?>
								<?php else: ?>
                                    <i class="icon-quiklearn-lock"></i>
								<?php endif; ?>
						</div>

						<?php echo wp_kses_post( $end_tag ); ?>

						<?php
						/**
						 * @since 3.0.0
						 */
						do_action( 'learn-press/end-section-loop-item', $item );
					endif;
					?>

                </li>

			<?php endforeach; ?>
        </ul>
	<?php endif; ?>

	<?php do_action( 'learn-press/after-section-summary', $section, $course->get_id() ); ?>
</li>
