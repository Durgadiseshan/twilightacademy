<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 3.3
 */
$thumb_size = 'quiklearn-size3';
$quiklearn_id       = get_the_ID();
$quiklearn_course   = LP_Global::course();
$quiklearn_author   = get_post_field( 'post_author', $quiklearn_id );
$categories 		= get_the_term_list( '', 'course_category' );
$level = learn_press_get_post_level( $quiklearn_id );

if ( empty( $quiklearn_course ) ) {
	return;
}

$quiklearn_lecture       = $quiklearn_course->get_items( 'lp_lesson' );
$quiklearn_lecture       = ! empty ( $quiklearn_lecture ) ? count( $quiklearn_lecture ) : 0;
$lecture_text  = $quiklearn_lecture == 1 ? esc_html__( ' l', 'quiklearn' ) : esc_html__( ' ls', 'quiklearn' );

$quiklearn_enroll_count = $quiklearn_course->get_users_enrolled();
$quiklearn_enroll_count = $quiklearn_enroll_count ? $quiklearn_enroll_count : 0;
$quiklearn_enroll_text  = $quiklearn_enroll_count == 1 ? esc_html__( 'St', 'quiklearn' ) : esc_html__( 'Sts', 'quiklearn' );

$duration_html = '';
$duration      = get_post_meta( $quiklearn_id, '_lp_duration', true );
$duration_time = absint( $duration );
$duration_time = ! empty( $duration_time ) ? $duration_time : false;
	if ( $duration_time ) {
		$duration_text = str_replace( $duration_time, '', $duration );
		$duration_text = trim( $duration_text );
		switch ( $duration_text ) {
			case 'minute':
				$duration_text = $duration_time > 1 ? esc_html__( 'ms', 'quiklearn' ) : esc_html__( 'm', 'quiklearn' );
				break;
			case 'hour':
				$duration_text = $duration_time > 1 ? esc_html__( 'hs', 'quiklearn' ) : esc_html__( 'h', 'quiklearn' );
				break;
			case 'day':
				$duration_text = $duration_time > 1 ? esc_html__( 'ds', 'quiklearn' ) : esc_html__( 'd', 'quiklearn' );
				break;
			case 'week':
				$duration_text = $duration_time > 1 ? esc_html__( 'Ws', 'quiklearn' ) : esc_html__( 'W', 'quiklearn' );
				break;
		}
		$duration_html = "$duration_time $duration_text";		
	}

if ( function_exists( 'learn_press_get_course_rate' ) ) {
	$course_rate_res = learn_press_get_course_rate( $quiklearn_id, false );
	$course_rate     = $course_rate_res['rated'];
}
$quiklearn_content   = ! empty( $quiklearn_content ) ? $quiklearn_content : QuiklearnTheme_Helper::course_excerpt( QuiklearnTheme::$options['course_excerpt_limit'] );
?>

<div class="rt-course-box">
	<?php do_action( 'learn_press_before_courses_loop_item' ); ?>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="rt-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( $thumb_size ); ?></a>
			<?php if ( QuiklearnTheme::$options['course_archive_feature'] ) { ?>			
			<?php learn_press_get_template( 'loop/course/badge-featured' ); ?>
			<?php } ?>
		</div>
	<?php } ?>
    <div class="rt-content-wrap">
        <div class="rt-content">
            <div class="rt-course-cat-rating">
                <?php if ( ! empty( $categories ) && QuiklearnTheme::$options['course_archive_cat'] ) { ?>
                    <div class="rt-course-cat"><?php echo wp_kses( $categories, 'alltext_allow' ); ?></div>
                <?php } if ( function_exists( 'learn_press_get_course_rate' ) && QuiklearnTheme::$options['course_archive_review'] ) { ?>
                    <div class="rt-rating">
                    <?php learn_press_get_template( 'rating-stars.php',[ 'rated' => $course_rate ], learn_press_template_path() . '/addons/course-review/', LP_ADDON_COURSE_REVIEW_TMPL );?>
                    </div>
                <?php } ?>
            </div>			
            <h3 class="rt-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
            <?php if ( QuiklearnTheme::$options['course_archive_instructor'] ) { ?>
				<div class="rt-author">
					<?php
					$instructor = $quiklearn_course->get_instructor();
					if($instructor){ ?>
						<a href="<?php echo esc_url( learn_press_user_profile_link( $quiklearn_author ) ); ?>"><?php echo get_avatar( $quiklearn_author , 30 ); ?><?php echo wp_kses_post( $quiklearn_course->get_instructor_name() ); ?></a>
					<?php } ?>
				</div>
			<?php } ?>
            
			<?php if ( QuiklearnTheme::$options['course_archive_excerpt'] && ! empty( $quiklearn_content ) ) { ?>
				<div class="rt-description"><?php echo wp_kses( $quiklearn_content, 'alltext_allow' ); ?></div>
			<?php } ?>
			<div class="rt-footer-meta">
                <ul class="rt-course-meta">
                    <?php if ( QuiklearnTheme::$options['course_archive_duration'] ) { ?>
                    <li><i class="icon-quiklearn-clock"></i><?php echo esc_html( $duration_html ); ?></li>
                    <?php } if ( QuiklearnTheme::$options['course_archive_student'] ) { ?>
                    <li><i class="icon-quiklearn-admin"></i><span><?php echo esc_html( $quiklearn_enroll_count ); ?></span></li>
                    <?php } if ( QuiklearnTheme::$options['course_archive_lesson'] ) { ?>
                    <li><i class="icon-quiklearn-note"></i><?php echo absint( $quiklearn_lecture ) . esc_html( $lecture_text ); ?></li>
                    <?php } if ( QuiklearnTheme::$options['course_archive_level'] ) { ?>
                    <li><i class=" icon-quiklearn-level"></i><?php echo esc_html( $level ); ?></li>
                    <?php } if ( class_exists( 'LP_Addon_Wishlist' ) && QuiklearnTheme::$options['course_archive_wishlist'] ) { ?>
                    <li><?php quiklearn_lp_wishlist_icon( $quiklearn_id ); ?></li>
                    <?php } ?>
                </ul>
				<?php if ( QuiklearnTheme::$options['course_archive_price'] ) { ?>
				<div class="rt-price"><?php echo quiklearn_lp_price_html( $quiklearn_course, 'left' ); ?></div>
				<?php } ?>
            </div>
        </div>            
    </div>
    <div class="clear"></div>
	<?php do_action( 'learn_press_after_courses_loop_item' ); ?>
</div>