<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
else if ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}

$args = array(
    'post_type'			=> 'lp_instructor',
	'order' 			=> $data['ordering'],
	'orderby' 			=> $data['orderby'],
    'offset' 	 	 	=> $data['number_of_offset'],    
    'role'              => LP_TEACHER_ROLE,
    'number'            => $data['item_no'],
    'paged' 			=> $paged,
);

$args['tax_query'] = array(
    array(
        'taxonomy' => 'instructor_category',
        'field' => 'term_id',
    )
);

$query = new WP_User_Query( $args );
$total = $query->get_total();
$max_num_pages = ceil( $total / $data['item_no'] );

$col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
?>

<div class="rt-instructor-default rt-instructor-<?php echo esc_attr( $data['style'] );?>">
    <div class="row <?php echo esc_attr( $data['item_gutter'] );?>">
        <?php $i = $data['delay']; $j = $data['duration']; 
        if ( ! empty( $query->results ) ) { ?>
            <?php foreach ( $query->results as $instructor ): ?>
                <?php
                $id = $instructor->ID;
                $designation = get_the_author_meta( 'quiklearn_author_designation', $id );
                
                $args2 = array(
                    'post_type'           => 'lp_course',
                    'post_status'         => 'publish',
                    'suppress_filters'    => false,
                    'ignore_sticky_posts' => 1,
                    'numberposts'      => -1,
                    'author'              => $id
                );

                $courses = get_posts( $args2 );
                $course_count = sizeof( $courses );                
                $course_count_text  = $course_count == 1 ? esc_html__( 'Course', 'quiklearn-core' ) : esc_html__( 'Courses', 'quiklearn-core' );

                $enroll_count = 0;
                foreach ( $courses as $each_course ) {
                    $course = learn_press_get_course( $each_course->ID );
                    $enroll_count += $course->get_users_enrolled();
                }
                $enroll_count_text  = $enroll_count == 1 ? esc_html__( 'Student', 'quiklearn-core' ) : esc_html__( 'Students', 'quiklearn-core' );
                
                ?>
                <div class="<?php echo esc_attr( $col_class );?> <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
                    <div class="rt-instructor-item">
                        <div class="rt-img">
                            <a href="<?php echo esc_url( learn_press_user_profile_link( $id ) ); ?>"><?php echo get_avatar( $id , 230 ); ?></a>
                            <?php if ( $data['display_social'] == 'yes' ) { ?>
                                <?php echo QuiklearnTheme_Helper::user_social($id); ?>
                            <?php } ?>
                        </div>
                        <div class="rt-content">
                            <h3 class="rt-title"><a href="<?php echo esc_url( learn_press_user_profile_link( $id ) ); ?>"><?php echo esc_html( $instructor->display_name ); ?></a></h3>
                            <?php if ( !empty( $designation ) && $data['display_designation'] == 'yes' ) { ?>
                                <div class="rt-designation"><?php echo wp_kses_post( $designation ); ?></div>
                            <?php } ?>
                            <?php if ( $data['display_course'] == 'yes' || $data['display_student'] == 'yes' ) { ?>
                                <ul class="meta-list">
                                    <?php if ( $data['display_course'] == 'yes' ) { ?>
                                        <li><i class="icon-quiklearn-note"></i><?php echo sprintf( "%d $course_count_text", $course_count );?></li>
                                    <?php } if ( $data['display_student'] == 'yes' ) { ?>
                                        <li><i class="icon-quiklearn-user"></i><?php echo sprintf( "%d $enroll_count_text", $enroll_count );?></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php $i = $i + 0.2; $j = $j; endforeach; ?>
        <?php } ?>
    </div>
    <?php if ( $data['pagination'] == 'yes' && $max_num_pages > 1 ) { ?>
        <?php QuiklearnTheme_Helper::pagination( $max_num_pages );?>
    <?php } ?>
    <?php wp_reset_query(); ?>
</div>