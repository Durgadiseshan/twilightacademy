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

$attr = '';
if ( !empty( $data['buttonurl']['url'] ) ) {
	$attr  = 'href="' . $data['buttonurl']['url'] . '"';
	$attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
	$title = '<a ' . $attr . '>' . $data['title'] . '</a>';
}
else {
	$title = $data['title'];
}

//image
if ( $attr ) {
  $getimg = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'icon_image' ).'</a>';
}
else {
	$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'icon_image' );
}

?>
<div class="rt-info-box rt-info-<?php echo esc_attr( $data['style'] );?> <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
	<div class="rt-info-item media-<?php echo esc_attr( $data['icontype'] );?>">
		<?php if ( !empty( $data['icon_display'] == 'yes' ) ) { ?>
		<div class="rt-media">
			<?php if ( !empty( $data['icontype']== 'image' ) ) { ?>
				<span class="rt-img"><?php echo wp_kses_post( $getimg );?></span>
			<?php } else { ?>
				<span class="rt-icon"><?php Icons_Manager::render_icon( $data['icon_class'] ); ?></span>
				<span class="rt-shape-icon"><?php Icons_Manager::render_icon( $data['bg_shape_icon'] ); ?></span>
			<?php } ?>	
		</div>
		<?php } ?>
		<div class="rt-content">
			<?php if ( !empty( $data['title'] ) ) { ?>
			<<?php echo esc_attr( $data['heading_size'] ); ?> class="rt-title"><?php echo wp_kses_post( $title );?></<?php echo esc_attr( $data['heading_size'] ); ?>>
			<?php } if ( !empty( $data['content'] ) ) { ?>
			<div class="rt-text"><?php echo wp_kses_post( $data['content'] );?></div>
			<?php } ?>
			<?php if ( $data['button_display']  == 'yes' ) { ?>
				<div class="rt-button"><a <?php echo $attr; ?> class="button-<?php echo esc_attr( $data['button_style'] ); ?> btn-common" ><?php echo wp_kses_post( $data['buttontext'] );?><i class="icon-quiklearn-right-arrow"></i></a></div>
			<?php } ?>
		</div>
	</div>
</div>