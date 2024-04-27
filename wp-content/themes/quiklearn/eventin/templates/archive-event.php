<?php
defined( 'ABSPATH' ) || exit;
use Etn\Utils\Helper as helper;

// Layout class
if ( QuiklearnTheme::$layout == 'full-width' ) {
	$quiklearn_layout_class = 'col-sm-12 col-12';
}
else{
	$quiklearn_layout_class = QuiklearnTheme_Helper::has_active_widget();
}
$post_classes = "";
if (  QuiklearnTheme::$layout == 'right-sidebar' || QuiklearnTheme::$layout == 'left-sidebar' ){
	$post_classes = 'col-sm-6 col-lg-4';
} else {
	$post_classes = 'col-sm-6 col-xl-3 col-lg-4';
}
?>

<?php do_action( 'etn_before_event_archive_container' ); ?>
<div id="primary" class="content-area">
    <div class="container">
        <div class="row">
            <?php if ( QuiklearnTheme::$layout == 'left-sidebar' ) {
                get_sidebar('quiklearn_event');
			} ?>
            <div class="<?php echo esc_attr( $quiklearn_layout_class ); ?>">
				<main id="main" class="site-main">                    
                    <div class="rt-event-archive-wrap" data-json='<?php echo json_encode([
                            "error_content" => [
                                "title" => esc_html__('Nothing found!', 'quiklearn'),
                                "exerpt" => esc_html__('It looks like nothing was found here. Maybe try a search?','quiklearn')
                            ]
                        ]); ?>'>
                            <div class="row g-4">
                                <?php do_action( 'etn_before_event_archive_item' ); ?>
                                <?php
                                if (have_posts()) {
                                    while ( have_posts() ) { the_post(); ?>
                                        <div class="<?php echo esc_attr( $post_classes );?>">
                                            <div class="rt-event-item">
                                                <?php do_action( 'etn_before_event_archive_content', get_the_ID(  ) ); ?>
                                                <!-- content start-->
                                                <div class="rt-event-content">
                                                <?php do_action( 'etn_after_event_archive_content', get_the_ID(  ) ); ?>
                                                    <h3 class="rt-title rt-event-title">
                                                        <a href="<?php echo esc_url(get_the_permalink()) ?>">
                                                            <?php echo esc_html(get_the_title()); ?>
                                                        </a>
                                                    </h3>                                                    
                                                    <?php do_action( 'etn_after_event_archive_title', get_the_ID(  ) ); ?>
                                                    <?php do_action( 'etn_before_event_archive_title', get_the_ID(  ) ); ?>
                                                </div>
                                                <!-- content end-->                                                
                                            </div>
                                            <!-- etn event item end-->
                                        </div>
                                    <?php
                                    }
                                } else { ?>
                                    <p><?php echo esc_html__('No Event found!', 'quiklearn'); ?></p>
                                <?php } ?>
                                <?php do_action( 'etn_after_event_archive_item' ); ?>
                            </div>
                            <?php do_action('etn_event_archive_pagination');?>
                    </div>
                </main>
            </div>
            <?php if ( QuiklearnTheme::$layout == 'right-sidebar' ) {	
                get_sidebar('quiklearn_event');
            } ?>
        </div>
    </div>
</div>

<?php do_action( 'etn_after_event_archive_container' ); ?>