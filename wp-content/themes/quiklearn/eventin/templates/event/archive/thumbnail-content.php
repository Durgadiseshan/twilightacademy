<?php
defined('ABSPATH') || die();
use Etn\Utils\Helper as helper;
$thumb_size = 'quiklearn-size3';

$etn_cat_terms = wp_get_post_terms( get_the_id(), 'etn_category' );
if ( $etn_cat_terms ) {
    $output = array();
    if ( is_array( $etn_cat_terms ) ) {
        foreach ( $etn_cat_terms as $term ) {
            $term_link = get_term_link( $term->slug, 'etn_category' );
            $output[]  = '<a  href="' . $term_link . '">' . $term->name . '</a>';
        }
    }
}

if (has_post_thumbnail()) { ?>
    <!-- thumbnail -->
    <div class="rt-event-thumb">    
        <?php do_action( 'etn_before_event_archive_thumbnail' ); ?>
        <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
            <?php the_post_thumbnail( $thumb_size ); ?>
        </a>
        <?php do_action( 'etn_after_event_archive_thumbnail' ); ?>
        <?php if( QuiklearnTheme::$options['event_ar_cat'] ) { ?>
        <?php echo '<div class="rt-event-cat">' . Helper::kses( join( ' ', $output ) ) . '</div>'; ?>
        <?php } ?>
    </div>
<?php }