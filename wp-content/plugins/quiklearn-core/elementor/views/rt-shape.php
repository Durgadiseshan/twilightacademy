<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Quiklearn_Core;
use Elementor\Group_Control_Image_Size;
use Elementor\Icons_Manager;

$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'icon_image' );
$mouse_animation = ( $data['mouse_animation'] == 'yes' ) ? 'rt-mouse-parallax' : '';
?>

<div class="rt-shape-layout rt-shape-<?php echo esc_attr( $data['style'] );?> <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
    <?php if( $data['style'] == 'style1' ) { ?>
        <div class="rt-shape-item rt-image-parallax" >
            <div class="<?php echo esc_attr( $mouse_animation ); ?>">
                <div data-depth="4.00">
                    <?php if ( !empty( $data['icontype'] == 'image' ) ) { ?>
                        <span class="rt-img"><?php echo wp_kses_post( $getimg );?></span>
                    <?php } else { ?>
                        <span class="rt-icon"><?php Icons_Manager::render_icon( $data['icon_class'] ); ?></span>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } if( $data['style'] == 'style2' ) { ?>
        <div class="rt-shape-item">
            <span class="rt-image <?php if( $data['mouse_animation'] == 'yes' ) { ?>fa-spin<?php } ?>" style="animation-duration: 10s">
                <?php if ( !empty( $data['icontype'] == 'image' ) ) { ?>
                    <span class="rt-img"><?php echo wp_kses_post( $getimg );?></span>
                <?php } else { ?>
                    <span class="rt-icon"><?php Icons_Manager::render_icon( $data['icon_class'] ); ?></span>
                <?php } ?>
            </span>
        </div>
    <?php } ?>
</div>


