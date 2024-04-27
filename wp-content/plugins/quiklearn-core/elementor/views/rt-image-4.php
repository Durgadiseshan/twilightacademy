<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Quiklearn_Core;
use Elementor\Group_Control_Image_Size;
extract($data);

$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'image_size', 'rt_image' );
$shape1 = Group_Control_Image_Size::get_attachment_image_html( $data, 'image_size', 'rt_shape1' );
$shape2 = Group_Control_Image_Size::get_attachment_image_html( $data, 'image_size', 'rt_shape2' );
$shape3 = Group_Control_Image_Size::get_attachment_image_html( $data, 'image_size', 'rt_shape3' );
$shape4 = Group_Control_Image_Size::get_attachment_image_html( $data, 'image_size', 'rt_shape4' );

$mouse_animation = ( $data['mouse_animation'] == 'yes' ) ? 'rt-mouse-parallax' : '';
?>

<div class="rt-image-banner rt-banner-style-<?php echo esc_attr( $data['style'] );?> <?php if( $data['mouse_animation'] == 'yes' ) { ?>rt-image-parallax<?php } ?>">
	<div class="rt-banner-item <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
		<div class="rt-image">
			<?php echo wp_kses_post($getimg);?>
			<ul class="rt-shapes">
				<li class="shape shape1 <?php echo esc_attr( $mouse_animation ); ?>"><div data-depth="4.00"><?php echo wp_kses_post( $shape1 );?></div></li>
				<li class="shape shape2 <?php echo esc_attr( $mouse_animation ); ?>"><div data-depth="4.00"><?php echo wp_kses_post( $shape2 );?></div></li>
				<li class="shape shape3 <?php echo esc_attr( $mouse_animation ); ?>"><div data-depth="4.00"><?php echo wp_kses_post( $shape3 );?></div></li>
				<li class="shape shape4 <?php echo esc_attr( $mouse_animation ); ?>"><div data-depth="4.00"><?php echo wp_kses_post( $shape4 );?></div></li>
			</ul>
		</div>
	</div>
</div>
