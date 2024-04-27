<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$course_category = get_terms( 'course_category', 'orderby=count&hide_empty=0' );
if( class_exists( 'LearnPress' ) ) {
	$count_cat       = count( $course_category );
}
if ( empty( $course_category ) && ! is_array( $course_category ) && ! $count_cat ) {
	return;
}

?>
<?php if ( QuiklearnTheme::$options['all_category'] ) { ?>
<div class="course-category">
	<button type="button" id="course-button" class="course-button"><i class="icon-quiklearn-share"></i><?php echo esc_html__('All Categories', 'quiklearn'); ?><i class="down-arrow icon-quiklearn-angle-up"></i></button>
	<div class="cat-course-close">
		<ul class="rt-course-item">
			<?php foreach ( $course_category as $term ) :
				$term_link = get_term_link( $term );
				?>
				<li>
					<a href="<?php echo esc_url( $term_link ) ?>"><?php echo esc_html( $term->name ) ?></a>
				</li>
			<?php endforeach; ?>
	    </ul>
	    <?php wp_reset_postdata(); ?>
	</div>  
</div>
<?php } ?>