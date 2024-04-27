<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Quiklearn_Core;
use Elementor\Icons_Manager;
extract($data);

if ( ! isset( $data['icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
    $data['icon'] = 'fa fa-quote-right';
    $data['icon_align'] = $this->get_settings( 'icon_align' );
}
$is_new = empty( $data['icon'] ) && Icons_Manager::is_migration_allowed();
$has_icon = ( ! $is_new || ! empty( $testimonial['selected_icon']['value'] ) );

?>

<div class="rt-testimonial-default testimonial-multi-layout-2 testimonial-slider-<?php echo esc_attr( $data['layout'] );?> <?php echo esc_attr( $data['nav_position'] ) ?>">
	<div class="rt-swiper-slider rt-swiper-nav" data-xld ="<?php echo esc_attr( $data['swiper_data'] );?>">
		<div class="swiper-wrapper">
			<?php $m = $data['delay']; $n = $data['duration']; 
				foreach ( $data['testimonials'] as $testimonial ) { ?>
				<div class="swiper-slide">
                    <div class="rt-item <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $m );?>s" data-wow-duration="<?php echo esc_attr( $n );?>s">				
                        <div class="item-content" <?php if( $testimonial['item_color'] ) { ?> style="background-color: <?php echo esc_attr( $testimonial['item_color'] ); ?>" <?php } ?>>                            
                            <div class="tcontent"><?php echo wp_kses_post( $testimonial['content'] );?></div>
                            <div class="author-content">
                                <?php if ( !empty( $testimonial['image']['id'] ) && $data['author_display'] == 'yes' ) { ?>
                                <div class="item-img">
                                    <?php echo wp_get_attachment_image($testimonial['image']['id'],'full');?>
                                </div>
                                <?php } ?>	
                                <div class="author-info">
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
                                    <h3 class="item-title"><?php echo wp_kses_post( $testimonial['title'] );?></h3>
                                    <?php if( $data['designation_display'] == 'yes' ) { ?><div class="item-designation"><?php echo wp_kses_post( $testimonial['designation'] );?></div><?php } ?>
                                </div>
                            </div>
                            <?php if( $data['quote_display'] == 'yes' ) { ?>
                            <span class="tquote"><?php Icons_Manager::render_icon( $testimonial['selected_icon'] ); ?></span>
                            <?php } ?>
                        </div>
                    </div>
				</div>
			<?php $m = $m + 0.2; $n = $n + 0.1; } ?>
		</div>
		<?php if ( $data['display_arrow'] == 'yes' ) { ?>
		<div class="swiper-navigation">
            <div class="swiper-button-prev"><i class="icon-quiklearn-left-arrow"></i></div>
		    <div class="swiper-button-next"><i class="icon-quiklearn-right-arrow"></i></div>
        </div>
    	<?php } ?>
    	<?php if ( $data['display_bullet'] == 'yes' ) { ?>
		<div class="swiper-pagination"></div>
		<?php } ?>
	</div>
</div>