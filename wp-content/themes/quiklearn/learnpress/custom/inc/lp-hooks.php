<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 3.1
 */

add_filter( 'learn-press/override-templates', function(){ return true; } );
/*-------------------------------------
#. Remove Ads
---------------------------------------*/
remove_action( 'admin_footer', 'learn_press_footer_advertisement', - 10 ); // remove footer advertisements
remove_action( 'admin_init', array( 'LP_Install', 'subsciption_button' ) ); // remove newsletter subscription notice
add_filter( 'learn_press_display_admin_footer_text', '__return_false' ); // remove footer rating text
add_filter( 'lp/template/archive-course/enable_lazyload', '__return_false' ); // remove footer rating text

/*-------------------------------------
#. Course Archive
---------------------------------------*/
remove_action( 'learn-press/before-main-content', 'learn_press_breadcrumb', 10 );
remove_action( 'learn-press/before-main-content', 'learn_press_search_form', 15 );
remove_action( 'learn-press/after-courses-loop-item', 'learn_press_courses_loop_item_begin_meta', 10 );
remove_action( 'learn-press/after-courses-loop-item', 'learn_press_courses_loop_item_price', 20 );
remove_action( 'learn-press/after-courses-loop-item', 'learn_press_courses_loop_item_instructor', 25 );
remove_action( 'learn-press/after-courses-loop-item', 'learn_press_courses_loop_item_end_meta', 30 );
remove_action( 'learn-press/after-courses-loop-item', 'learn_press_course_loop_item_buttons', 35 );
remove_action( 'learn-press/after-courses-loop-item', 'learn_press_course_loop_item_user_progress', 40 );

if (version_compare(LEARNPRESS_VERSION, '4', '>=')) {
    remove_action( 'learn-press/before-main-content', LP()->template( 'general' )->func( 'breadcrumb' ) );
    remove_action( 'learn-press/before-courses-loop', LP()->template( 'course' )->func( 'courses_top_bar' ), 10 );
}
add_action( 'learn-press/before-main-content', 'quiklearn_lp_archive_top_search' );

/*-------------------------------------
#. Course Single
---------------------------------------*/
// When user not enrolled
remove_action( 'learn-press/content-landing-summary', 'learn_press_course_meta_start_wrapper', 5 );
remove_action( 'learn-press/content-landing-summary', 'learn_press_course_students', 10 );
remove_action( 'learn-press/content-landing-summary', 'learn_press_course_meta_end_wrapper', 15 );
remove_action( 'learn-press/content-landing-summary', 'learn_press_course_price', 25 );
remove_action( 'learn-press/content-landing-summary', 'learn_press_course_buttons', 30 );

// When user enrolled
remove_action( 'learn-press/content-learning-summary', 'learn_press_course_meta_start_wrapper', 10 );
remove_action( 'learn-press/content-learning-summary', 'learn_press_course_students', 15 );
remove_action( 'learn-press/content-learning-summary', 'learn_press_course_meta_end_wrapper', 20 );
remove_action( 'learn-press/content-learning-summary', 'learn_press_course_progress', 25 );
remove_action( 'learn-press/content-learning-summary', 'learn_press_course_buttons', 40 );
//top content
if (version_compare(LEARNPRESS_VERSION, '4', '>=')) {
    LP()->template('course')->remove('learn-press/course-content-summary', array('<div class="course-detail-info"> <div class="lp-content-area"> <div class="course-info-left">', 'course-info-left-open'), 10);
    LP()->template('course')->remove_callback('learn-press/course-content-summary', 'single-course/meta-primary', 10);
    LP()->template('course')->remove_callback('learn-press/course-content-summary', 'single-course/title', 10);
    LP()->template('course')->remove_callback('learn-press/course-content-summary', 'single-course/meta-secondary', 10);
    LP()->template('course')->remove('learn-press/course-content-summary', array('</div> </div> </div>', 'course-info-left-close'), 15);
    add_action(
        'learn-press/course-content-summary',
        LP()->template( 'course' )->text( '<div class="course-main-content">', 'course-main-content-open' ),
        36
    );
    add_action(
        'learn-press/course-content-summary',
        LP()->template( 'course' )->text( '<!-- end course-main-content --> </div>', 'course-main-content-close' ),
        71
    );
}

// Overview - Include features information
remove_action('learn-press/course-content-summary', 'single_course_thumbnail', 50);
add_action('learn-press/course-content-summary', 'single_course_cat_rating', 45);
add_action('learn-press/course-content-summary', 'single_course_title', 50);
add_action('learn-press/course-content-summary', 'single_course_excerpt', 50);
add_action( 'learn-press/course-content-summary', 'quiklearn_lp_course_features', 50 );
add_action('learn-press/course-content-summary', 'single_related_course', 75);

/*Extra information*/
remove_action( 'learn-press/course-content-summary', LearnPress::instance()->template( 'course' )->func( 'course_extra_boxes' ), 40 );
add_action('learn-press/course-content-summary', 'single_course_extra_info_title', 64);
add_action( 'learn-press/course-content-summary', LearnPress::instance()->template( 'course' )->func( 'course_extra_boxes' ), 65 );

// Curriculam tab
add_filter( 'learn_press_course_curriculum_empty', 'quiklearn_lp_empty_curriculum_text' ); // Modify empty curriculam text
// Wishlist Modal
add_action( 'wp_footer', 'quiklearn_lp_wishlist_modal' );
// Tabs property change
add_filter( 'learn-press/course-tabs', 'quiklearn_lp_instructor_tab' , 5 ); // Add instructor tab
add_filter( 'learn-press/course-tabs', 'quiklearn_lp_show_overview_tab_always' , 5 ); // Show overview tab even if no contents
add_filter( 'learn-press/course-tabs', 'quiklearn_lp_disable_tabs', 50 ); // Disable Tabs based on theme options

if ( class_exists( 'LP_Addon_Course_Review' ) ) {
	add_filter( 'learn-press/course-tabs', 'quiklearn_lp_modify_reviews_tab' , 6 ); // Modify Reviews Tab
}

/*-------------------------------------
#. Profile
---------------------------------------*/
add_filter( 'learn-press/profile-settings-fields/avatar', 'quiklearn_lp_change_avatar_size' ); // change avatar size to 360x370
add_action( 'learn-press/after-profile-avatar-fields', 'quiklearn_lp_show_avatar_size_text' ); // Display avatar size hint on frontend
remove_action( 'learn-press/user-profile-account', LearnPress::instance()->template( 'profile' )->func( 'avatar' ), 10 );
remove_action( 'learn-press/user-profile-account', LearnPress::instance()->template( 'profile' )->func( 'header' ), 20 );
remove_action( 'learn-press/user-profile-account', LearnPress::instance()->template( 'profile' )->func( 'socials' ), 10 );
/*-------------------------------------
#. Instructor backend
---------------------------------------*/
if ( is_admin() && current_user_can( 'lp_teacher' ) && !current_user_can( 'administrator' ) ) {
	add_action( 'admin_menu', 'quiklearn_lp_instructor_admin_menu' ); // hide all admin menus except Learpress and Profile
	add_action( 'load-index.php', 'quiklearn_lp_instructor_admin_index' ); // set Course Page as default instead of dashboard
}

// Profile social
add_filter( 'learn-press/user-profile-social-icon', 'user_profile_socials', 11, 2 );
function user_profile_socials( $icon, $key ){
    if( 'facebook' === $key ){
        $icon = '<i class="fab fa-facebook-f"></i>';
    }
    if( 'twitter' === $key ){
        $icon = '<i class="fab fa-twitter"></i>';
    }
    if( 'youtube' === $key ){
        $icon = '<i class="fab fa-youtube"></i>';
    }
    if( 'linkedin' === $key ){
        $icon = '<i class="fab fa-linkedin-in"></i>';
    }
    return $icon;
}