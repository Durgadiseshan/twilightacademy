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

$attr = '';
if ( !empty( $data['buttonurl']['url'] ) ) {
    $attr  = 'href="' . $data['buttonurl']['url'] . '"';
    $attr .= !empty( $data['buttonurl']['is_external'] ) ? ' target="_blank"' : '';
    $attr .= !empty( $data['buttonurl']['nofollow'] ) ? ' rel="nofollow"' : '';
}

$attr2 = '';
if ( !empty( $data['buttonurl2']['url'] ) ) {
    $attr2  = 'href="' . $data['buttonurl2']['url'] . '"';
    $attr2 .= !empty( $data['buttonurl2']['is_external'] ) ? ' target="_blank"' : '';
    $attr2 .= !empty( $data['buttonurl2']['nofollow'] ) ? ' rel="nofollow"' : '';
}

?>
<div class="rt-hero-banner">
	<?php if ( !empty( $data['sub_title'] ) ) { ?>		
		<span class="entry-subtitle <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="0.2s" data-wow-duration="1.2s"><?php echo wp_kses_post( $data['sub_title'] );?></span>
	<?php } ?>
	<?php if ( !empty( $data['title'] ) ) { ?>
		<<?php echo esc_attr( $data['heading_size'] ); ?> class="entry-title <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="0.6s" data-wow-duration="1.2s"><?php echo wp_kses_post( $data['title'] );?>
		
		<?php if( $data['display_line'] ) { ?><span class="shape-line"><img src="<?php echo esc_attr($quiklearn_bg); ?>" width="167" height="15" alt=""></span><?php } ?>

		</<?php echo esc_attr( $data['heading_size'] ); ?>>		
	<?php } ?>
	<?php if ( !empty( $data['content'] ) ) { ?>
		<div class="entry-content <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="0.8s" data-wow-duration="1.2s"><?php echo wp_kses_post( $data['content'] );?></div>
	<?php } ?>
	<?php if ( $data['button_display']  == 'yes' ) { ?>
	    <div class="rt-button <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="1s" data-wow-duration="1.2s">
			<a class="button-link button-<?php echo esc_attr( $data['style'] ); ?> btn-common" <?php echo $attr; ?> ><?php echo esc_html( $data['buttontext'] );?><i class="icon-quiklearn-right-arrow"></i></a>
	    </div>
	<?php } ?>
</div>