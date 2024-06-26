<?php
/*
Template Name: Fullwidth Template
 */
// Layout class
if ( QuiklearnTheme::$layout == 'full-width' ) {
	$quiklearn_layout_class = 'col-sm-12 col-12';
} else {
	$quiklearn_layout_class = 'col-xl-9';
}
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container-fluid"> 
		<div class="row">
			<?php
			if ( QuiklearnTheme::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
			<div class="<?php echo esc_attr( $quiklearn_layout_class );?>">
				<main id="main" class="site-main">
					<?php while ( have_posts() ) : the_post(); ?>					
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
						<?php
						if ( comments_open() || get_comments_number() ){
							comments_template();
						}
						?>
					<?php endwhile; ?>
				</main>
			</div>
			<?php
			if( QuiklearnTheme::$layout == 'right-sidebar' ){				
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>