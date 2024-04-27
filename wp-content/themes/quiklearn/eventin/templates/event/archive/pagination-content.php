<?php
defined( 'ABSPATH' ) || die();

?>
<div class="pagination-area">
    <?php do_action( 'etn_before_event_archive_pagination_content' );?>
    <?php
        the_posts_pagination(array(
            'mid_size' => 2,
            'prev_text' => '<i class="icon-quiklearn-angle-left"></i>',
			'next_text' => '<i class="icon-quiklearn-angle-right"></i>',
        ));
    ?>
    <?php do_action( 'etn_after_event_archive_pagination_content' );?>
</div>