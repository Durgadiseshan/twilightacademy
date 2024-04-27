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
<div class="rt-title-text">
	<?php if ( !empty( $data['sub_title'] ) ) { ?>
		<div class="entry-subtitle <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="0.2s" data-wow-duration="1.2s"><?php echo wp_kses_post( $data['sub_title'] );?><?php if( $data['display_line'] ) { ?><span class="line"></span><?php } ?></div>
	<?php } ?>
	<?php if ( !empty( $data['title'] ) ) { ?>
		<<?php echo esc_attr( $data['heading_size'] ); ?> class="entry-title <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="0.4s" data-wow-duration="1.2s"><?php echo wp_kses_post( $data['title'] );?><?php if( $data['display_line'] ) { ?><span class="shape-line"><img src="<?php echo esc_attr($quiklearn_bg); ?>" width="167" height="15" alt=""></span><?php } ?></<?php echo esc_attr( $data['heading_size'] ); ?>>		
	<?php } ?>	
	<div class="entry-content <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="0.6s" data-wow-duration="1.2s"><?php echo wp_kses_post( $data['content'] );?></div>

	<?php if ( $data['feature_display']  == 'yes' ) { ?>
	<ul class="feature-list <?php if ( $data['feature_list_col']  == 'yes' ) { ?>list-two-col<?php } ?> <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="0.8s" data-wow-duration="1.2s">
	  <?php foreach ($data['list_feature'] as $feature): ?>
		<li>
		  <?php
		  extract($feature);
			$final_icon_class       = "";
			$final_icon_image_url   = '';
			if ( is_string( $list_icon_class['value'] ) && $dynamic_icon_class =  $list_icon_class['value']  ) {
			  $final_icon_class     = $dynamic_icon_class;
			}
			if ( is_array( $list_icon_class['value'] ) ) {
			  $final_icon_image_url = $list_icon_class['value']['url'];
			}
		  ?>
		  <?php if ($data['has_icon'] == 'yes'): ?>
			<?php if ( $final_icon_image_url ): ?>
			  <img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon">
			<?php else: ?>
			  <i style="color: <?php echo esc_attr( $list_icon_color ); ?>"  class="<?php echo esc_attr( $final_icon_class ); ?>"></i><?php endif ?><?php endif ?><?php echo esc_html( $feature['list_text'] ); ?>
		</li>
	  <?php endforeach ?>
	</ul>	
	<?php } ?>
</div>