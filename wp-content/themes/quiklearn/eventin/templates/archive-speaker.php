<?php
defined( 'ABSPATH' ) || exit;
?>

<?php do_action( 'etn_before_speaker_archive_container' ); ?>

<div id="primary" class="content-area">
    <div class="container">
        <div class="row g-4">
            <?php do_action( 'etn_before_speaker_archive_item' ); ?>
            <?php
            if ( have_posts() ) {
                while ( have_posts() ) { the_post(); ?>
                    <div class="col-sm-6 col-xl-3 col-lg-4">
                        <div class="etn-speaker-item">
                            <?php do_action( 'etn_before_speaker_archive_content', get_the_ID(  ) ); ?>
                            <div class="etn-speaker-content">                                
                                <?php do_action( "etn_before_speaker_title" ); ?>
                                <h3 class="etn-title etn-speaker-title">
                                    <a href="<?php echo esc_url(get_the_permalink( get_the_ID( ) )); ?>"> 
                                        <?php echo esc_html(get_the_title( get_the_ID( ) )); ?>
                                    </a> 
                                </h3>
                                <?php do_action( "etn_after_speaker_title" ); ?>
                                <p>
                                    <?php 
                                    $etn_speaker_designation = get_post_meta( get_the_ID( ) , 'etn_speaker_designation', true);
                                    echo wp_kses_post( $etn_speaker_designation); 
                                    ?>
                                </p>
                            </div>
                            <?php do_action( 'etn_after_speaker_archive_content', get_the_ID(  ) ); ?>
                        </div>
                    </div>
                <?php } 
            }
            ?>

            <?php do_action( 'etn_after_speaker_archive_item' ); ?>
        </div>
    </div>
</div>

<?php do_action( 'etn_after_speaker_archive_container' ); ?>