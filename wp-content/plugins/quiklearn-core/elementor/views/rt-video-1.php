<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Quiklearn_Core;
use Elementor\Group_Control_Image_Size;

// image
$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'video_image' );

?>
<div class="rt-video-layout rt-video-<?php echo esc_attr( $data['style'] ) ?>">
	<div class="rt-video <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
		<div class="rt-img">
		<?php echo wp_kses_post( $getimg );?>
		<div class="rt-icon">			
			<a class="rt-play <?php echo esc_attr( $data['video_layout'] );?> rt-video-popup" aria-label="Video Popup" href="<?php echo esc_url( $data['videourl']['url'] );?>"><i class="icon-quiklearn-play-icon"></i></a>
		</div>
		</div>		
	</div>
</div>