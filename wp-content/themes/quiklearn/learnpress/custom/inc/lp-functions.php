<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 3.3
 */
/*-------------------------------------
#. Hooked functions
---------------------------------------*/
function single_course_thumbnail() {
	if ( has_post_thumbnail() ): ?>
        <div class="page-thumbnail"><?php the_post_thumbnail( 'quiklearn-size1' ); ?></div>
	<?php endif;
}

function single_course_sidebar_thumbnail() {
	if ( has_post_thumbnail() ): ?>
        <div class="media-preview"><?php the_post_thumbnail( 'quiklearn-size3' ); ?><?php learn_press_get_template( 'loop/course/badge-featured' ); ?></div>
	<?php endif;
}

function single_course_title() { ?>
    <h1 class="course-single-title"><?php the_title(); ?></h1>
<?php }

function single_course_excerpt() { ?>
    <div class="course-single-excerpt"><?php the_excerpt(); ?></div>
<?php }

function single_course_extra_info_title() { 
	$course = LP_Course::get_course( get_the_ID() );
	$requirements = $course->get_extra_info( 'requirements' );
	$key_features = $course->get_extra_info( 'key_features' );
	$target_audiences = $course->get_extra_info( 'target_audiences' );
		if ( ! ($requirements || $key_features || $target_audiences) ) {
			return;
		}
	?>
    <?php if( !empty( QuiklearnTheme::$options['extra_info_title'] ) ) { ?><h2 class="extra-info-title"><?php echo wp_kses( QuiklearnTheme::$options['extra_info_title'] , 'alltext_allow' ); ?></h2><?php } ?>
<?php }

function single_course_cat_rating() { 	
	$course_id     = get_the_ID();
	if ( function_exists( 'learn_press_get_course_rate' ) ) {
		$course_rate_res = learn_press_get_course_rate( $course_id, false );
		$course_rate     = $course_rate_res['rated'];
	}
	?>
    <div class="course-terms">
		<?php if ( has_term( '', 'course_category' ) && QuiklearnTheme::$options['course_cats'] ) { ?>
            <div class="course-cat"><?php echo get_the_term_list( $course_id, 'course_category', '' ); ?></div>
		<?php } ?>
		<?php if ( function_exists( 'learn_press_get_course_rate' ) && ( QuiklearnTheme::$options['course_rating'] ) ) { ?>
			<div class="rt-rating">
				<?php learn_press_get_template( 'rating-stars.php',[ 'rated' => $course_rate ], learn_press_template_path() . '/addons/course-review/', LP_ADDON_COURSE_REVIEW_TMPL ); ?>
			</div>
		<?php } ?>		
    </div>	
<?php }

/*course single header info*/
function quiklearn_lp_course_features() {
	$course        = LP_Global::course();
	$students      = $course->get_users_enrolled();
	$students      = $students ? $students : 0;
	$instructor    = $course->get_instructor_html();

	$quiklearn_enroll_count = $course->get_users_enrolled();
	$quiklearn_enroll_count = $quiklearn_enroll_count ? $quiklearn_enroll_count : 0;
	$quiklearn_enroll_text  = $quiklearn_enroll_count == 1 ? esc_html__( ' Student', 'quiklearn' ) : esc_html__( ' Students', 'quiklearn' );

	?>
    <ul class="course-features">
		<?php if ( QuiklearnTheme::$options['course_meta_ins'] ) { ?>
			<li class="rt-instructor">
				<?php
					$instructor = $course->get_instructor();
					if($instructor){
						$instructorId =  $instructor->get_id();?>
						<a href="<?php echo esc_url( learn_press_user_profile_link( $instructorId ) ); ?>"><?php echo get_avatar( $instructorId , 30 ); ?></a>	
					<?php } ?>
			<?php echo esc_html( '-by ', 'quiklearn' ); ?><a href="<?php echo esc_url( learn_press_user_profile_link( $instructorId ) ); ?>"><?php echo wp_kses_post( $course->get_instructor_name() ); ?></a>
			</li>
		<?php } if ( QuiklearnTheme::$options['course_meta_stu'] ) { ?>
			<li><i class="icon-quiklearn-admin"></i><?php echo absint( $quiklearn_enroll_count ) . esc_html( $quiklearn_enroll_text ) ?></li>
		<?php } if ( QuiklearnTheme::$options['course_meta_update'] && function_exists( 'quiklearn_get_time' ) ) { ?>	
			<li><i class="icon-quiklearn-calendar"></i><?php echo esc_html( 'Last updated ', 'quiklearn' ); ?><?php echo quiklearn_get_time(); ?></li>
		<?php } ?>
    </ul>
	<?php
}

/*course single sidebar info*/
function quiklearn_lp_course_sidebar_features() {
	$course        = LP_Global::course();
	$course_id     = get_the_ID();
	$lecture       = $course->get_items( 'lp_lesson' );
	$lecture       = $lecture ? count( $lecture ) : false;
	$quiz          = $course->get_items( 'lp_quiz' );
	$quiz          = $quiz ? count( $quiz ) : false;
	$duration      = get_post_meta( $course_id, '_lp_duration', true );
	$duration_time = absint( $duration );
	$duration_time = ! empty( $duration_time ) ? $duration_time : false;
	$level = learn_press_get_post_level( $course_id );
	$language      = get_post_meta( $course_id, 'quiklearn_lp_language', true );	

	$quiklearn_lecture       = $course->get_items( 'lp_lesson' );
	$quiklearn_lecture       = ! empty ( $quiklearn_lecture ) ? count( $quiklearn_lecture ) : 0;

	$quiklearn_quiz = $course->get_items( 'lp_quiz' );
	$quiklearn_quiz       = ! empty ( $quiklearn_quiz ) ? count( $quiklearn_quiz ) : 0;

	if ( $duration_time && ! empty( QuiklearnTheme::$options['course_meta_dur'] ) ) {
		$duration_text = str_replace( $duration_time, '', $duration );
		$duration_text = trim( $duration_text );
		switch ( $duration_text ) {
			case 'minute':
				$duration_text = $duration_time > 1 ? esc_html__( 'Minutes', 'quiklearn' ) : esc_html__( 'Minute', 'quiklearn' );
				break;
			case 'hour':
				$duration_text = $duration_time > 1 ? esc_html__( 'Hours', 'quiklearn' ) : esc_html__( 'Hour', 'quiklearn' );
				break;
			case 'day':
				$duration_text = $duration_time > 1 ? esc_html__( 'Days', 'quiklearn' ) : esc_html__( 'Day', 'quiklearn' );
				break;
			case 'week':
				$duration_text = $duration_time > 1 ? esc_html__( 'Weeks', 'quiklearn' ) : esc_html__( 'Week', 'quiklearn' );
				break;
		}
		$duration_html = "$duration_time $duration_text";
	}

	?>
	<h3 class="side-bar-title"><?php echo esc_html( 'This Course Includes:', 'quiklearn' ) ?></h3>
    <ul class="course-sidebar-features">
		<?php if ( ! empty( $level ) && QuiklearnTheme::$options['course_meta_lev'] ) { ?>
			<li><span><i class=" icon-quiklearn-level"></i><?php echo esc_html( 'Course Level', 'quiklearn' ) ?></span><span><?php echo esc_html( $level ); ?></span></li>
		<?php } if ( QuiklearnTheme::$options['course_meta_dur'] ) { ?>
			<li><span><i class=" icon-quiklearn-clock"></i><?php echo esc_html( 'Duration', 'quiklearn' ) ?></span><span><?php echo esc_html( $duration_html ); ?></span></li>
		<?php } if ( QuiklearnTheme::$options['course_meta_lec'] ) { ?>
			<li><span><i class=" icon-quiklearn-note"></i><?php echo esc_html( 'Lessons', 'quiklearn' ) ?></span><span><?php echo absint( $quiklearn_lecture ); ?></span></li>		
		<?php } if ( QuiklearnTheme::$options['course_meta_qz'] ) { ?>
			<li><span><i class=" icon-quiklearn-quiz"></i><?php echo esc_html( 'Quizzes', 'quiklearn' ) ?></span><span><?php echo absint( $quiklearn_quiz ); ?></span></li>
		<?php } if ( has_term( '', 'course_tag') && QuiklearnTheme::$options['course_meta_tags'] ) { ?>
			<li><span><i class="icon-quiklearn-book"></i><?php echo esc_html( 'Tags', 'quiklearn' ) ?></span><span><?php echo get_the_term_list( $course_id, 'course_tag', '',', ' ) ?></span></li>
		<?php } if ( ! empty( $language ) && QuiklearnTheme::$options['course_meta_lan'] ) { ?>
			<li><span><i class=" icon-quiklearn-language"></i><?php echo esc_html( 'Language', 'quiklearn' ) ?></span><span><?php echo esc_html( $language ); ?></span></li>
		<?php } ?>
    </ul>
	<?php
}

function single_related_course() {
	if ( is_singular( 'lp_course' ) && QuiklearnTheme::$options['course_related'] ) {
		learn_press_get_template( 'custom/related-course.php' );
	}
}

function quiklearn_lp_show_overview_tab_always( $tabs ) {
	if ( empty( $tabs['overview'] ) ) {
		$overview = [
			'title'    => esc_html__( 'Overview', 'quiklearn' ),
			'priority' => 10,
			'callback' => 'learn_press_course_overview_tab',
		];
		$tabs     = [ 'overview' => $overview ] + $tabs;
	}
	return $tabs;
}

function quiklearn_lp_instructor_tab( $tabs ) {
	$tabs['instructor'] = [
		'title'    => esc_html__( 'Instructor', 'quiklearn' ),
		'priority' => 40,
		'callback' => 'quiklearn_lp_instructor_tab_contents',
	];

	return $tabs;
}

function quiklearn_lp_empty_curriculum_text( $text ) {
	$text = '<div class="learn-press-message success"><p>' . $text . '</p></div>';

	return $text;
}

function quiklearn_lp_modify_reviews_tab( $tabs ) {
	$tabs['reviews']['priority'] = 50;

	return $tabs;
}

function quiklearn_lp_disable_tabs( $tabs ) {
	if ( isset( $tabs['curriculum'] ) && ! QuiklearnTheme::$options['course_curriculum'] ) {
		unset( $tabs['curriculum'] );
	}
	if ( isset( $tabs['instructor'] ) && ! QuiklearnTheme::$options['course_instructor'] ) {
		unset( $tabs['instructor'] );
	}
	if ( isset( $tabs['reviews'] ) && ! QuiklearnTheme::$options['course_review'] ) {
		unset( $tabs['reviews'] );
	}
	if ( isset( $tabs['faqs'] ) && ! QuiklearnTheme::$options['course_faqs'] ) {
		unset( $tabs['faqs'] );
	}

	return $tabs;
}

function quiklearn_lp_instructor_tab_contents() {
	learn_press_get_template( 'custom/instructor-tab-contents.php' );
}

function quiklearn_lp_instructor_user_avatar_contents() { 
	$user 		= LP_Profile::instance()->get_user();
	$author_id  = $user->get_id();
	$profile 	= LP_Profile::instance();
	$user    	= $profile->get_user();
	if ( ! isset( $user ) ) {
		return;
	}
	
	$designation = get_the_author_meta( 'quiklearn_author_designation', $author_id );
	$phone = get_the_author_meta( 'quiklearn_author_phone', $author_id );
	$socials = $user->get_profile_social( $user->get_id() );

	?>
	<div class="rt-user-profile-avatar">
		<?php echo wp_kses_post( $user->get_profile_picture() ); ?>
		<h2 class="rt-profile-name"><?php echo wp_kses_post( $user->get_display_name() ); ?></h2>		
		<span class="author-designation"><?php echo esc_html( $designation ); ?></span>
		<?php if( !empty( $socials ) ) { ?>
		<ul class="rt-instrucor-social">
			<li class="instruc-social">
				<?php echo implode( "\n", $socials ); ?>
			</li>
		</ul>
		<?php } ?>	
		<?php if( !empty( $phone ) || $user->get_email() ) { ?>
		<div class="author-info">
			<?php if( !empty( $phone ) ) { ?><div class="author-phone"><i class="icon-quiklearn-phone"></i><?php echo esc_html( $phone ); ?></div><?php } ?>
			<?php if( !empty( $user->get_email() ) ) { ?><div class="author-email"><i class="icon-quiklearn-message"></i><?php echo esc_html( $user->get_email() ); ?></div><?php } ?>
		</div>
		<?php } ?>
	</div>	
<?php }

function quiklearn_lp_instructor_user_info_contents() {	
	$user = LP_Profile::instance()->get_user();
	$bio = $user->get_description();
	if ( $bio ) { ?>		
		<div class="rt-profile-user-bio">
			<h3 class="user-bio-title"><?php echo esc_html( 'Short Bio', 'quiklearn' ); ?></h3>
			<?php echo wpautop( $bio ); ?>
		</div>
	<?php }
}

function quiklearn_lp_change_avatar_size( $args ) {
	foreach ( $args as $key => $value ) {
		if ( isset( $value['id'] ) && $value['id'] == 'profile_picture_thumbnail_size' ) {
			$args[ $key ]['default'] = [ 300, 296, 'yes' ];
			$args[ $key ]['desc']    = '';
		}
	}
	return $args;
}

function quiklearn_lp_show_avatar_size_text() {
	$thumb_size = learn_press_get_avatar_thumb_size();
	?>
    <p class="mt20"><em><?php echo sprintf( esc_html__( 'Image size should be %sx%s px', 'quiklearn' ), $thumb_size['width'], $thumb_size['height'] ); ?></em></p>
	<?php
}

function quiklearn_lp_instructor_admin_menu() {
	global $menu;
	$accept = [ 'profile.php', 'learn_press' ];
	foreach ( $menu as $menu_item ) {
		if ( ! empty( $menu_item[0] ) && ! in_array( $menu_item[2], $accept ) ) {
			remove_menu_page( $menu_item[2] );
		}
	}
}

function quiklearn_lp_instructor_admin_index() {
	wp_safe_redirect( admin_url( 'edit.php?post_type=lp_course' ) );
	exit;
}

/*-------------------------------------
#. Archive Course sort functionality
---------------------------------------*/
add_action( 'save_post_lp_course', 'rt_course_save_action_func', 10, 3 );
if(! function_exists('rt_course_save_action_func')){
    function rt_course_save_action_func( $post_id ) {
        if(! function_exists('learn_press_get_course_rate')){
            return $post_id;
        }
        $course_rate_res   = learn_press_get_course_rate( get_the_ID(), false );
        if(isset($course_rate_res['rated'])){
            update_post_meta( $post_id, 'rt_course_review', $course_rate_res['rated'] );
        }
    }
}

//Course pre_get_post 
add_action( 'pre_get_posts', 'rt_course_archive_query' );
function rt_course_archive_query( $query ) {
	if ( !is_admin() && $query->is_main_query() && is_archive('lp_course') ) {

		// add meta query
		$meta_query = $query->get( 'meta_query' );
		if ( ! is_array( $meta_query ) ) {
		    $meta_query = array();
		}

		$course_status = $_GET['course-filter']??'';

		if($course_status == 'feature'){
            $meta_query['relation']= 'OR';
			$meta_query[] = array(
				'key'     => '_lp_featured',
				'value'   => 'yes',
				'compare' => '==',
			);
		}

		if($course_status == 'popular'){
            $query->set( 'orderby', 'meta_value_num' );
            $query->set( 'meta_key', 'rt_course_review' );
            $query->set( 'order', 'DESC' );
		}

		$query->set( 'meta_query', $meta_query );
	}
}

function rt_comment_callback( $comment_ID, $comment_approved, $commentdata ) {
	if( 1 === $comment_approved ){
		$comment_post_id = $commentdata['comment_post_ID'];
        rt_course_save_action_func($comment_post_id);
	}

}
add_action( 'comment_post', 'rt_comment_callback', 10, 3 );
/*-------------------------------------
#. Custom Functions
---------------------------------------*/
//Calculate lesson duration
function quiklearn_lp_lesson_duration( $lesson_id ) {
	$duration     = get_post_meta( $lesson_id, '_lp_duration', true );
	$duration_val = absint( $duration );
	// when disabled
	if ( empty( $duration_val ) ) {
		return false;
	}
	// when week
	if ( strrpos( $duration, 'week' ) ) {
		$weektext = ( $duration > 1 ) ? esc_html__( 'Weeks', 'quiklearn' ) : esc_html__( 'Week', 'quiklearn' );
		return "$duration_val $weektext";
	}
	// when week
	if ( strrpos( $duration, 'day' ) ) {
		$daytext = ( $duration > 1 ) ? esc_html__( 'Days', 'quiklearn' ) : esc_html__( 'Day', 'quiklearn' );
		return "$duration_val $daytext";
	}
	// when hour
	if ( strrpos( $duration, 'hour' ) ) {
		return $duration_val . esc_html__( 'h', 'quiklearn' );
	}
	// when min
	$hour = floor( $duration_val / 60 );
	if ( $hour == 0 ) {
		$hour = '';
	} else {
		$hour = $hour . esc_html__( 'h', 'quiklearn' );
	}
	$minute = $duration_val % 60;
	$minute = $minute . esc_html__( 'm', 'quiklearn' );

	return $hour . $minute;
}

// Generate wishlist icon
function quiklearn_lp_wishlist_icon( $course_id ) {
	$user_id = get_current_user_id();

	if ( ! class_exists( 'LP_Addon_Wishlist' ) || ! $course_id ) {
		return;
	}

	if ( ! $user_id ) {
		echo '<div class="rt-wishlist-icon"><span data-bs-toggle="modal" data-bs-target="#rt-wishlist-modal" class="icon-quiklearn-heart" title="'
		    . esc_attr__( 'Add this course to your wishlist', 'quiklearn' ) . '">'. esc_html__( 'Wishlist', 'quiklearn' ) .'</span>
		</div>';
		return;
	}

	$classes = [ 'course-wishlist' ];
	$state   = learn_press_user_wishlist_has_course( $course_id, $user_id ) ? 'on' : 'off';

	if ( $state == 'on' ) {
		$classes[] = 'on';
	}
	$classes = apply_filters( 'learn_press_course_wishlist_button_classes', $classes, $course_id );
	$title   = ( $state == 'on' ) ? esc_html__( 'Remove this course from your wishlist', 'quiklearn' ) : esc_html__( 'Add this course to your wishlist', 'quiklearn' );

	echo '<div class="rt-wishlist-icon">';
	$wishlist = esc_html__( 'Wishlist', 'quiklearn' );
	printf(
		'<span class="icon-quiklearn-heart learn-press-course-wishlist-button-%2$d %s" data-id="%s" data-nonce="%s" title="%s">%s</span>',
		join( " ", $classes ),
		$course_id,
		wp_create_nonce( 'course-toggle-wishlist' ),
		$title,
		$wishlist
	);
	echo '</div>';
}
function quiklearn_lp_wishlist_modal() {
	if ( ! class_exists( 'LP_Addon_Wishlist' ) ) {
		return;
	}
	locate_template( 'learnpress/custom/wishlist-modal.php', true );
}


// Check if user can access course
function quiklearn_lp_user_can_access_course() {
	$course = LP_Global::course();
	$user   = learn_press_get_current_user();
	return $user->has_purchased_course( $course->get_id() );
}

// Display indexing text on top of course archive
function quiklearn_lp_the_course_indexing_text( $total ) {
	if ( $total == 0 ) {
		$result = esc_html__( 'There are no available courses!', 'quiklearn' );
	} elseif ( $total == 1 ) {
		$result = esc_html__( 'Showing only one result', 'quiklearn' );
	} else {
		$courses_per_page = absint( LP()->settings->get( 'archive_course_limit' ) );
		$paged            = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

		$from = 1 + ( $paged - 1 ) * $courses_per_page;
		$to   = ( $paged * $courses_per_page > $total ) ? $total : $paged * $courses_per_page;

		if ( $from == $to ) {
			$result = sprintf( esc_html__( 'Showing last course of %s results', 'quiklearn' ), $total );
		} else {
			$result = sprintf( esc_html__( 'Showing %s-%s of %s results', 'quiklearn' ), $from, $to, $total );
		}
	}
	echo esc_html( $result );
}

// Course archive top search
function quiklearn_lp_archive_top_search() {
	if ( ! ( is_post_type_archive( 'lp_course' ) || is_tax( 'course_category' ) ) ) {
		return;
	}
	global $wp_query;
	$seleccted = $_GET['course-filter'] ?? 'regular';
	?>
    <div class="rt-course-archive-top">        
		<div class="rt-showing ">                    
			<div class="rt-text"><?php quiklearn_lp_the_course_indexing_text( $wp_query->found_posts ); ?></div>
		</div>			
		<div class="rt-course-status">
			<span class="sort-by-text"><?php esc_html_e( 'Sort-by:', 'quiklearn' );?></span>
			<form id="rt-course-sort-form" class="course-status" method="get" action="<?php echo esc_url( get_post_type_archive_link( 'lp_course' ) ); ?>">
				<input type="hidden" name="ref" value="course">
					<select name='course-filter' id="rt-course-filter-select">
						<option <?php echo esc_attr($seleccted=='regular' ? 'selected' : '') ?> value="regular"><?php esc_html_e( 'Regular', 'quiklearn' ); ?></option>
						<option <?php echo esc_attr($seleccted=='popular' ? 'selected' : '') ?> value="popular"><?php esc_html_e( 'Most Popular', 'quiklearn' ); ?></option>
						<option <?php echo esc_attr($seleccted=='feature' ? 'selected' : '') ?> value="feature"><?php esc_html_e( 'Feature', 'quiklearn' ); ?></option>
					</select>
			</form>
			<div class="rt-icons">
				<a href="#" class="rt-grid"><i class="icon-quiklearn-grid"></i></a>
				<a href="#" class="rt-list" style="font-size: 12px"><i class="icon-quiklearn-list"></i></a>
			</div>
		</div>
    </div>
	<?php
}

// Course price html
function quiklearn_lp_price_html( $course, $pos = 'right' ) {
	$regular_price = $course->get_origin_price_html();
	$final_price   = $course->get_price_html();
	if ( $course->has_sale_price() ) {
		if ( $pos == 'right' ) {
			$price_html = sprintf( '<span class="rt-lp-price"><ins>%1$s</ins><del>%2$s</del></span>', $final_price, $regular_price );
		} else {
			$price_html = sprintf( '<span class="rt-lp-price"><del>%2$s</del><ins>%1$s</ins></span>', $final_price, $regular_price );
		}
	} else {
		$price_html = sprintf( '<span class="rt-lp-price"><ins>%1$s</ins></span>', $final_price );
	}

	return $price_html;
}
