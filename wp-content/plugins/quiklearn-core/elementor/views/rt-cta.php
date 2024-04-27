<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Quiklearn_Core;
use Elementor\Group_Control_Image_Size;

$attr = '';
if ( !empty( $data['buttonurl']['url'] ) ) {
    $attr  = 'href="' . $data['buttonurl']['url'] . '"';
    $attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
    $attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
}

// image
$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'cta_image' );
$shape = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'shape' );
$container = ( $data['container'] == 'yes' ) ? 'container-fluid' : 'container';
?>
<div class="rt-call-action">
	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="rt-action-item">		
			<?php if( !empty( $getimg ) ) { ?>
				<div class="rt-action-img">
					<?php echo wp_kses_post($getimg);?>
					<span class="shape"><?php echo wp_kses_post($shape);?></span>
				</div>
			<?php } ?>
			<h2 class="rt-title"><?php echo wp_kses_post( $data['title'] ) ?></h2>			
			<?php if( !empty( $data['buttontext'] ) ) { ?>
			<a class="button-link button-<?php echo esc_attr( $data['button_style'] ); ?> btn-common" <?php echo $attr; ?>><?php echo esc_html( $data['buttontext'] );?><i class="icon-quiklearn-right-arrow"></i></a><?php } ?>
		</div>
	</div>
</div>