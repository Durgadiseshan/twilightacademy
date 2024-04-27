<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Quiklearn_Core;
use \WP_Query;

$args = array(
    'post_type'             => 'lp_course',
    'posts_per_page'        => $data['itemlimit']['size'],
    'ignore_sticky_posts'   => 1,
    'order' 			    => $data['ordering'],
	'orderby' 			    => $data['orderby'],
);

if ( !empty( $data['cat'] ) ) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'course_category',
            'field' => 'term_id',
            'terms' => $data['cat'],
        )
    );
}
$query = new WP_Query( $args );
$style = isset( $data['style'] ) ? $data['style'] : '1';
?>

<div class="rt-course-default rt-course-<?php echo esc_attr( $style ); ?> <?php echo esc_attr( $data['nav_position'] ) ?>">
    <div class="rt-swiper-slider rt-swiper-nav" data-xld ="<?php echo esc_attr( $data['swiper_data'] );?>">
        <?php if ( $query->have_posts() ) : ?>
        <div class="swiper-wrapper">
            <?php while ( $query->have_posts() ) : $query->the_post();?>
                <div class="swiper-slide">
                    <?php
                        if ( $style != 1 ) {
                            learn_press_get_template( "custom/course-box-{$style}.php" );
                        } else {
                            learn_press_get_template( 'custom/course-box.php' );
                        }
                    ?>
                </div>
            <?php endwhile;?>
        </div>
        <?php endif;?>
        <?php if ( $data['display_arrow'] == 'yes' ) { ?>
		<div class="swiper-navigation">
            <div class="swiper-button-prev"><i class="icon-quiklearn-left-arrow"></i></div>
		    <div class="swiper-button-next"><i class="icon-quiklearn-right-arrow"></i></div>
        </div>
    	<?php } ?>
    	<?php if ( $data['display_buttet'] == 'yes' ) { ?>
		<div class="swiper-pagination"></div>
		<?php } ?>

    </div>
    <?php wp_reset_query();?>
</div>
