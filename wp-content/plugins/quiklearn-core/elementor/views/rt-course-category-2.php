<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Quiklearn_Core;
use Elementor\Group_Control_Image_Size;
use Elementor\Icons_Manager;
extract($data);

if( $data['cat'] == 0 ) {
	return;
}

$course_category = get_term_by( 'term_id', absint( $data['cat'] ), 'course_category' );
$term_link = get_term_link( absint( $data['cat'] ) );
$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'icon_image' );
$course_cat_text  = $course_category->count == 1 ? esc_html__( ' Course', 'quiklearn-core' ) : esc_html__( ' Courses', 'quiklearn-core' );
?>
<div class="rt-course-category rt-course-cat-<?php echo esc_attr( $data['style'] );?>">
	<div class="rt-cat-item <?php echo esc_attr( $data['animation'] ); ?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
		<?php if ( !empty( $data['icon_display'] == 'yes' ) ) { ?>
		<div class="rt-media">
			<?php if ( !empty( $data['icontype'] == 'image' ) ) { ?>
				<span class="rt-img"><?php echo wp_kses_post( $getimg );?></span>
			<?php } else { ?>
				<span class="rt-icon"><?php Icons_Manager::render_icon( $data['icon_class'] ); ?></span>
			<?php } ?>
		</div>
		<?php } ?>
		<div class="rt-course-cat">
			<?php if ( ! empty( $course_category ) ) { ?>
				<h3 class="rt-cat-title"><a href="<?php echo esc_url( $term_link ); ?>"><?php echo esc_html( $course_category->name ); ?></a></h3>
				<?php if ( $data['cat_num_display'] == 'yes' ) { ?>
				<span class="rt-course-count"><?php echo esc_html( $course_category->count ) . esc_html( $course_cat_text ); ?></span>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>
