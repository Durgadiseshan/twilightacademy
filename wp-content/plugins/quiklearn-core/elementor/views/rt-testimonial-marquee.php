<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Quiklearn_Core;
extract($data);

use Elementor\Icons_Manager;

if ( ! isset( $data['icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
    $data['icon'] = 'fa fa-quote-right';
    $data['icon_align'] = $this->get_settings( 'icon_align' );
}
$is_new = empty( $data['icon'] ) && Icons_Manager::is_migration_allowed();
$has_icon = ( ! $is_new || ! empty( $testimonial['selected_icon']['value'] ) );

?>

<div class="rt-marquee-slider marquee-slider-1">
	<div class="rt-marquee <?php echo esc_attr( $data['marquee_direction'] );?>">
		<div class="rt-marquee-item">
            <div class="rt-testimonial-default testimonial-multi-layout-1 testimonial-<?php echo esc_attr( $data['layout'] );?>">
                <?php
                    foreach ( $data['testimonials'] as $testimonial ) { ?>
                    <div class="rt-item">				
                        <div class="item-content" <?php if( $testimonial['item_color'] ) { ?> style="background-color: <?php echo esc_attr( $testimonial['item_color'] ); ?>" <?php } ?>>
                            <?php if ( !empty( $testimonial['image']['id'] ) && $data['author_display'] == 'yes' ) { ?>
                            <div class="item-author">
                                <?php echo wp_get_attachment_image($testimonial['image']['id'],'full');?>
                            </div>
                            <?php } ?>
                            <div class="item-info">
                                <?php if( $data['rating_display'] == 'yes' ) { ?>
                                <ul class="item-rating">
                                <?php for ( $i=0; $i <=4 ; $i++ ) {
                                    if ( $i < $testimonial['rating'] ) {
                                        $full = 'active';
                                    } else {
                                        $full = 'deactive';
                                    }
                                    echo '<li class="has-rating"><i class="fa-regular fa-star '.$full.'"></i></li>';
                                } ?>
                                </ul>
                                <?php } ?>
                                <div class="tcontent"><?php echo wp_kses_post( $testimonial['content'] );?></div>
                                <h3 class="item-title"><?php echo wp_kses_post( $testimonial['title'] );?></h3>
                                <?php if( $data['designation_display'] == 'yes' ) { ?><div class="item-designation"><?php echo wp_kses_post( $testimonial['designation'] );?></div><?php } ?>
                            </div>
                            <?php if( $data['quote_display'] == 'yes' ) { ?>
                            <span class="tquote"><?php Icons_Manager::render_icon( $testimonial['selected_icon'] ); ?></span>
                            <?php } ?>					
                        </div>
                    </div>
                <?php } ?>
            </div>
		</div>
        
		<div class="rt-marquee-item">        
            <div class="rt-testimonial-default testimonial-multi-layout-1 testimonial-<?php echo esc_attr( $data['layout'] );?>">
                <?php
                    foreach ( $data['testimonials'] as $testimonial ) { ?>
                    <div class="rt-item">				
                        <div class="item-content" <?php if( $testimonial['item_color'] ) { ?> style="background-color: <?php echo esc_attr( $testimonial['item_color'] ); ?>" <?php } ?>>
                            <?php if ( !empty( $testimonial['image']['id'] ) && $data['author_display'] == 'yes' ) { ?>
                            <div class="item-author">
                                <?php echo wp_get_attachment_image($testimonial['image']['id'],'full');?>
                            </div>
                            <?php } ?>
                            <div class="item-info">
                                <?php if( $data['rating_display'] == 'yes' ) { ?>
                                <ul class="item-rating">
                                <?php for ( $i=0; $i <=4 ; $i++ ) {
                                    if ( $i < $testimonial['rating'] ) {
                                        $full = 'active';
                                    } else {
                                        $full = 'deactive';
                                    }
                                    echo '<li class="has-rating"><i class="fa-regular fa-star '.$full.'"></i></li>';
                                } ?>
                                </ul>
                                <?php } ?>
                                <div class="tcontent"><?php echo wp_kses_post( $testimonial['content'] );?></div>
                                <h3 class="item-title"><?php echo wp_kses_post( $testimonial['title'] );?></h3>
                                <?php if( $data['designation_display'] == 'yes' ) { ?><div class="item-designation"><?php echo wp_kses_post( $testimonial['designation'] );?></div><?php } ?>
                            </div>
                            <?php if( $data['quote_display'] == 'yes' ) { ?>
                            <span class="tquote"><?php Icons_Manager::render_icon( $testimonial['selected_icon'] ); ?></span>
                            <?php } ?>					
                        </div>
                    </div>
                <?php } ?>
            </div>
		</div>
	</div>
</div>