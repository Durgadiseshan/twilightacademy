<?php

defined( 'ABSPATH' ) || die();

$excerpt_limit = QuiklearnTheme::$options['event_content_limit'];

?>
<?php if( QuiklearnTheme::$options['event_ar_excerpt'] ) { ?>
<p><?php echo apply_filters('etn_event_archive_content', wp_trim_words( get_the_excerpt(), $excerpt_limit, '' )); ?></p>
<?php } ?>