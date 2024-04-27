<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$terms = get_terms( array('taxonomy' => 'course_category' ) );
$category_dropdown = array(  0 => __( 'All', 'quiklearn-core' ) );
$selectedCat = null;
if( class_exists( 'LearnPress' ) ) {
    foreach ( $terms as $category ) {
        $category_dropdown[$category->slug] = $category->name;
    }
}
if(!empty($_GET['course_category']) && !empty($category_dropdown[$_GET['course_category']])){
    $selectedCat = [
        'key'=> $_GET['course_category'],
        'label'=> $category_dropdown[$_GET['course_category']]
    ];
}
?>
<div class="rt-course-search flex-grow-1 rt-course-search-<?php echo esc_attr( $data['style'] ); ?> <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
    <form class="form-inline" role="search" method="get" action="<?php echo esc_url( get_post_type_archive_link( 'lp_course' ) ); ?>">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon rt-dropdown">
                    <button class="rt-btn cat-toggle" type="button" id="dropdownCourseButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="rt-cat"><?php echo esc_html( $selectedCat ? $selectedCat['label'] :  'All Categories', 'quiklearn-core' ); ?></span>
                        <i class="down-arrow icon-quiklearn-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu rt-drop-menu" aria-labelledby="dropdownCourseButton1">
                        <?php foreach ( $category_dropdown as $key => $value ): ?>
                            <li><a href="#" data-cat="<?php echo esc_attr( $key );?>"><?php echo esc_html( $value );?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="input-group-addon rt-input-wrap flex-grow-1">
                    <input type="hidden" name="course_category" value="<?php echo esc_attr( $selectedCat ? $selectedCat['key'] : '' ) ?>">
                    <input type="hidden" name="ref" value="course">
                    <input type="text" value="<?php echo !empty($_GET['c_search']) ? esc_attr($_GET['c_search']) : '' ?>" class="form-control rt-search-text" placeholder="<?php esc_attr_e( 'Find Your Courses . . .', 'quiklearn-core' );?>" name="c_search">
                </div>
                <div class="input-group-addon input-group-append"><button type="submit" class="search-btn"><i class="icon-quiklearn-search"></i><?php esc_html_e( 'Search', 'quiklearn-core' );?></button></div>
            </div>
        </div>
    </form>
</div>