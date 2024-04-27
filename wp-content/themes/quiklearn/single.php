<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( QuiklearnTheme::$layout == 'full-width' ) {
	$quiklearn_layout_class = 'col-sm-12 col-12';
}
else{
	$quiklearn_layout_class = QuiklearnTheme_Helper::has_active_widget();
}
$quiklearn_has_entry_meta  = ( QuiklearnTheme::$options['post_date'] || QuiklearnTheme::$options['post_author_name'] || QuiklearnTheme::$options['post_comment_num'] || ( QuiklearnTheme::$options['post_length'] && function_exists( 'quiklearn_reading_time' ) ) || QuiklearnTheme::$options['post_published'] && function_exists( 'quiklearn_get_time' ) || ( QuiklearnTheme::$options['post_view'] && function_exists( 'quiklearn_views' ) ) ) ? true : false;

$quiklearn_comments_number = number_format_i18n( get_comments_number() );
$quiklearn_comments_html = $quiklearn_comments_number == 1 ? esc_html__( 'Comment' , 'quiklearn' ) : esc_html__( 'Comments' , 'quiklearn' );
$quiklearn_comments_html = '<span class="comment-number">'. $quiklearn_comments_number .'</span> '. $quiklearn_comments_html;
$quiklearn_author_bio = get_the_author_meta( 'description' );

$quiklearn_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$quiklearn_time_html       = apply_filters( 'quiklearn_single_time', $quiklearn_time_html );
$youtube_link = get_post_meta( get_the_ID(), 'quiklearn_youtube_link', true );

if ( empty(has_post_thumbnail() ) ) {
	$img_class ='no-image';
}else {
	$img_class ='show-image';
}

?>
<?php get_header(); ?>

<div id="primary" class="content-area">
	<input type="hidden" id="quiklearn-cat-ids" value="<?php echo implode(',', wp_get_post_categories( get_the_ID(), array( 'fields' => 'ids' ) ) ); ?>">
	<?php if ( QuiklearnTheme::$options['post_style'] == 'style1' ) { ?>
		<div id="contentHolder">
			<div class="container">
				<div class="row">				
					<?php if ( QuiklearnTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
						<div class="<?php echo esc_attr( $quiklearn_layout_class );?>">
							<main id="main" class="site-main"> 
								<div class="rt-sidebar-sapcer">
								<?php while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'template-parts/content-single', get_post_format() );?>						
								<?php endwhile; ?> 
								</div> 
							</main>
						</div>
					<?php if ( QuiklearnTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
				</div>
			</div>
		</div>
	<?php } else if ( QuiklearnTheme::$options['post_style'] == 'style2' ) { ?>
	<div id="contentHolder">
		<div class="container">
			<div class="row">
				<?php if ( QuiklearnTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
					<div class="<?php echo esc_attr( $quiklearn_layout_class );?>">
						<main id="main" class="site-main">
							<div class="rt-sidebar-sapcer">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/content-single-2', get_post_format() );?>						
							<?php endwhile; ?>
							</div>
						</main>					
					</div>
				<?php if ( QuiklearnTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<?php get_footer(); ?>