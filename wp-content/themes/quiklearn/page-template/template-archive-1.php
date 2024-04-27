<?php
/**
 * Template Name: Archive style 1
 * 
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

$args = array(
	'post_type' => "post",
);

if ( get_query_var('paged') ) {
	$args['paged'] = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
	$args['paged'] = get_query_var('page');
}
else {
	$args['paged'] = 1;
}

$query = new WP_Query( $args );

global $wp_query;
$wp_query = NULL;
$wp_query = $query;
 
get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php if ( QuiklearnTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
			<div class="<?php echo esc_attr( $quiklearn_layout_class );?>">
				<main id="main" class="site-main">
					<div class="rt-sidebar-sapcer">
					<?php if ( have_posts() ) :?>
						<?php
							echo '<div class="loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						?>
						<div class="mt50">
						<?php if( QuiklearnTheme::$options['blog_loadmore'] == 'loadmore' ) { ?> 
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore" class="loadMore"><?php esc_html_e( 'Load More', 'quiklearn' ) ?></a>
						    </div> 
						<?php } else { ?>
							<?php QuiklearnTheme_Helper::pagination(); ?>
						<?php } ?> 
						</div>
					<?php else:?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
					</div>
				</main>
			</div>
			<?php if ( QuiklearnTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
		</div>
	</div>
</div>
<?php get_footer(); ?>