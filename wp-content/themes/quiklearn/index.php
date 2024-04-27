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
$quiklearn_is_post_archive = is_home() || ( is_archive() && get_post_type() == 'post' ) ? true : false;

if ( is_post_type_archive( "etn" ) || is_tax( "etn_category" ) ) {
	get_template_part( 'template-parts/archive', 'event' );
return;
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php
			if ( QuiklearnTheme::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
			<div class="<?php echo esc_attr( $quiklearn_layout_class );?>">
				<main id="main" class="site-main">
					<div class="rt-sidebar-sapcer">
					<?php
					if ( have_posts() ) { ?>
						<?php
						if ( $quiklearn_is_post_archive && QuiklearnTheme::$options['blog_style'] == 'style1' ) {
							echo '<div class="loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $quiklearn_is_post_archive && QuiklearnTheme::$options['blog_style'] == 'style2' ) {
							echo '<div class="row g-4 rt-masonry-grid">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-2', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( class_exists( 'Quiklearn_Core' ) ) {
							if ( is_tax( 'quiklearn_portfolio_category' ) ) {
								echo '<div class="row rt-masonry-grid">';
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content-1', get_post_format() );
								endwhile;
								echo '</div>';
							}							
						}
						else {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
						}
						?>

						<?php if( QuiklearnTheme::$options['blog_loadmore'] == 'loadmore' && QuiklearnTheme::$options['blog_style'] == 'style1' ) { ?> 
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore" class="loadMore"><?php esc_html_e( 'Load More', 'quiklearn' ) ?></a>
						    </div> 
						<?php } else { ?>
							<?php QuiklearnTheme_Helper::pagination(); ?>
						<?php } ?>  

					<?php } else {?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php } ?>
					</div>					
				</main>
			</div>
			<?php
			if( QuiklearnTheme::$layout == 'right-sidebar' ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>