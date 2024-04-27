<?php
defined('ABSPATH') || exit;
$thumb_size = 'quiklearn-size1';
$single_event_id = get_the_id();

if( ( ETN_DEMO_SITE === false ) || ( ETN_DEMO_SITE == true && ETN_EVENT_TEMPLATE_TWO_ID != get_the_ID(  ) && ETN_EVENT_TEMPLATE_THREE_ID != get_the_ID(  )) ){
?>
<?php do_action("etn_before_single_event_details", $single_event_id); ?>

<div id="primary" class="content-area has-sidebar">
    <div class="container">
        <?php  do_action("etn_before_single_event_container", $single_event_id); ?>
        <!-- Row start -->
        <div class="etn-row">
            <div class="etn-col-lg-9">
                <?php do_action("etn_before_single_event_content_wrap", $single_event_id); ?>
                <div class="etn-event-single-content-wrap">
                    <?php if (has_post_thumbnail() && !post_password_required()) : ?>
                        <div class="etn-single-event-media">
                            <?php the_post_thumbnail( $thumb_size, ['class' => 'img-responsive'] ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="etn-event-entry-header">
                        <?php do_action("etn_before_single_event_content_title", $single_event_id); ?>
                        <h2 class="rt-event-entry-title">
                            <?php echo esc_html( apply_filters('etn_single_event_content_title', get_the_title()) ); ?>
                        </h2>
                        <?php do_action("etn_after_single_event_content_title", $single_event_id); ?>
                    </div>
                    <?php do_action("etn_before_single_event_content_body", $single_event_id); ?>

                    <div class="etn-event-content-body">
                        <?php echo apply_filters( 'etn_single_event_content_body', the_content() ); ?>
                    </div>
                    <?php do_action("etn_after_single_event_content_body", $single_event_id); ?>
                </div>
				<?php do_action("etn_after_single_event_details_rsvp_form", $single_event_id); ?>
                <?php do_action("etn_after_single_event_content_wrap", $single_event_id); ?>
                <?php  do_action("etn_after_single_event_container", $single_event_id); ?>
            </div><!-- col end -->

            <div class="etn-col-lg-3 fixed-bar-coloum">
                <div class="etn-sidebar">                    
                    <?php do_action("etn_before_single_event_meta", $single_event_id); ?> 
                    <!-- event schedule meta end -->
                    <?php do_action("etn_single_event_meta", $single_event_id); ?>
                    <!-- event schedule meta end -->
                    <?php do_action("etn_after_single_event_meta", $single_event_id); ?>                    
                </div>
                <!-- etn sidebar end -->
            </div>
            <!-- col end -->
        </div>
        <!-- Row end -->        
    </div>
</div>
<?php do_action("etn_after_single_event_details", $single_event_id); ?>
<?php } ?>