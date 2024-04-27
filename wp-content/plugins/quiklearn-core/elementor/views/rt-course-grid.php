<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Quiklearn_Core;
use QuiklearnTheme_Helper;
use \WP_Query;

if ( get_query_var('paged') ) {
    $paged = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
    $paged = get_query_var('page');
}
else {
    $paged = 1;
}

$args = array(
    'post_type'             => 'lp_course',
    'posts_per_page'        => $data['itemlimit']['size'],
    'ignore_sticky_posts'   => 1,
    'order' 			    => $data['ordering'],
	'orderby' 			    => $data['orderby'],
    'paged' 			    => $paged,
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
global $wp_query;
$wp_query = NULL;
$wp_query = $query;

$style = isset( $data['style'] ) ? $data['style'] : '1';
$col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
?>

<div class="rt-course-default rt-course-<?php echo esc_attr( $style ); ?>">
    <?php if ( have_posts() ) :?>
        <div class="row <?php echo esc_attr( $data['item_gutter'] );?>">
            <?php while ( have_posts() ) : the_post();?>
                <div class="<?php echo esc_attr( $col_class );?>">
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
        <?php if ( $data['pagination'] == 'yes' ): ?>
            <div class="mt40"><?php QuiklearnTheme_Helper::pagination(); ?></div>
        <?php endif; ?>
    <?php endif;?>
    <?php wp_reset_query();?>
</div>
