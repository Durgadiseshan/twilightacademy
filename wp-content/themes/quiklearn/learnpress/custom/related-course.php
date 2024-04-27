<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.3
 */

// Build query
$course_id = get_the_ID();

$cat_ids = array();
$cats    = get_the_terms( $course_id, 'course_category' );
if ( $cats ) {
	foreach ( $cats as $cat ) {
		$cat_ids[] = $cat->slug;
	}
}

$tag_ids = array();
$tags    = get_the_terms( $course_id, 'course_tag' );
if ( $tags ) {
	foreach ( $tags as $tag ) {
		$tag_ids[] = $tag->slug;
	}
}

if ( !$cat_ids && !$tag_ids ) {
	return;
}

$args = array(
	'post_type'           => 'lp_course',
	'posts_per_page'      => 7,
	'ignore_sticky_posts' => true,
	'post__not_in'        => array( $course_id ),
	'tax_query'           => array( 'relation' => 'OR' ),
);

if ( $cat_ids ) {
	$cat_query = array(
		'taxonomy' => 'course_category',
		'field'    => 'slug',
		'terms'    => $cat_ids
	);
	array_push( $args['tax_query'], $cat_query );
}

if ( $tag_ids ) {
	$tag_query = array(
		'taxonomy' => 'course_tag',
		'field'    => 'slug',
		'terms'    => $tag_ids
	);
	array_push( $args['tax_query'], $tag_query );
}

$rdtheme_query = new WP_Query( $args );

// Courasel data
$swiper_data = array(
	'slidesPerView' 	=>2,
	'centeredSlides'	=>false,
	'loop'				=>true,
	'spaceBetween'		=>24,
	'slideToClickedSlide' =>true,
	'slidesPerGroup' => 1,
	'autoplay'				=>array(
		'delay'  => 1,
	),
	'speed'      =>500,
	'breakpoints' =>array(
		'0'    =>array('slidesPerView' =>1),
		'576'    =>array('slidesPerView' =>2),
		'768'    =>array('slidesPerView' =>2),
		'992'    =>array('slidesPerView' =>3),
		'1200'    =>array('slidesPerView' =>3),				
		'1600'    =>array('slidesPerView' =>3)				
	),
	'auto'   =>false
);

$swiper_data = json_encode( $swiper_data );
$rdtheme_course_style = QuiklearnTheme::$options['course_style'];

?>
<?php if ( $rdtheme_query->have_posts() ) : ?>
	<div class="rt-course-default course-related-slider rt-course-<?php echo esc_attr( $rdtheme_course_style ); ?>">
		<div class="rt-course-related-title">
			<span class="related-sub-title"><?php echo wp_kses( QuiklearnTheme::$options['course_related_sub_title'] , 'alltext_allow' ); ?></span>
			<h3 class="related-title"><?php echo wp_kses( QuiklearnTheme::$options['course_related_title'] , 'alltext_allow' ); ?></h3>	
		</div>
		<div class="rt-swiper-slider rt-swiper-nav" data-xld = '<?php echo esc_attr( $swiper_data ); ?>'>			
			<div class="swiper-wrapper">				
				<?php while ( $rdtheme_query->have_posts() ) : $rdtheme_query->the_post(); ?>
					<div class="swiper-slide">
						<?php if ( QuiklearnTheme::$options['course_style'] != 1 ) {
								learn_press_get_template( "custom/course-box-{$rdtheme_course_style}.php" );
							}
							else {
								learn_press_get_template( 'custom/course-box.php' );
							}
						?>
					</div>
				<?php endwhile;?>				
			</div>
			<div class="swiper-navigation">
				<div class="swiper-button-prev"><i class="icon-quiklearn-left-arrow"></i></div>
				<div class="swiper-button-next"><i class="icon-quiklearn-right-arrow"></i></div>
			</div>
		</div>
	</div>
	<?php wp_reset_query(); ?>
<?php endif; ?>