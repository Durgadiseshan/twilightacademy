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
$col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";

?>
<div class="rt-course-default rt-isotope-wrapper rt-course-<?php echo esc_attr( $style ); ?>">
    <div class="rt-course-tab rt-isotope-tab">
        <div class="course-cat-tab">
            <?php if ( $data['button_all_display'] == 'yes' ) { ?>
                <a href="#" data-filter="*" class="current"><?php esc_html_e( 'See All', 'quiklearn-core' );?></a>
            <?php } ?>
            <?php
            $terms = get_terms( array( 
                'taxonomy' => 'course_category', 
                'include'  => $data['cat'],
                'orderby' => 'include',
            ) );		
            $count = 1;		
            foreach( $terms as $term ) {
                $active_class = '';
	                if ( $data['button_all_display'] != 'yes' && $count == 1){
	                    $active_class = 'current';
                    }
                ?>
                <a href="#"  data-filter=".tab-<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></a>
            <?php } ?>
        </div>
    </div>
    <?php if ( $query->have_posts() ) :?>
        <div class="row <?php echo esc_attr( $data['item_gutter'] );?> rt-isotope-content rt-masonry-grid">
            <?php while ( $query->have_posts() ) : $query->the_post(); 
                $item_terms = get_the_terms( get_the_ID(), 'course_category' ); 
                $term_links = array(); 
                $terms_of_item = '';
                foreach ( $item_terms as $term ) {
                    $terms_of_item .= 'tab-'.$term->slug . ' ';
                } 
            ?>
                <div class="<?php echo esc_attr( $col_class );?> rt-grid-item <?php echo esc_attr( $terms_of_item ); ?>">
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
    <?php wp_reset_query();?>
</div>
