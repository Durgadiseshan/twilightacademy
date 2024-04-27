<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Quiklearn_Core;
extract($data);
if( $data['rt_image']['url'] ) {
	$quiklearn_bg =  $data['rt_image']['url'];
} else {
	$quiklearn_img_url = QUIKLEARN_ASSETS_URL . 'element/underline.svg';
	$quiklearn_bg = $quiklearn_img_url;
}

?>
<div class="rt-section-title <?php echo esc_attr( $data['style'] ); ?>">
	<div class="title-holder">
		<?php if( !empty ( $data['sub_title'] ) ) { ?>
		<span class="sub-title <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="0.2s" data-wow-duration="1.2s"><?php echo wp_kses_post( $data['sub_title'] ); ?></span>
		<?php } ?>
		<?php if( !empty ( $data['title'] ) ) { ?><<?php echo esc_attr( $data['heading_size'] ); ?> class="entry-title <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="0.4s" data-wow-duration="1.2s"><?php echo wp_kses_post( $data['title'] ); ?><?php if( $data['display_line'] ) { ?><span class="shape-line"><img src="<?php echo esc_attr($quiklearn_bg); ?>" width="167" height="15" alt=""></span><?php } ?></<?php echo esc_attr( $data['heading_size'] ); ?>><?php } ?>
		<?php if ( !empty( $data['content'] ) ) { ?>
		<div class="entry-text <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="0.6s" data-wow-duration="1.2s"><?php echo wp_kses_post( $data['content'] );?></div>
		<?php } ?>
	</div>
</div>