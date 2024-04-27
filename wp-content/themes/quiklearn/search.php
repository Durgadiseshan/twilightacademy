<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Layout class
if ( QuiklearnTheme::$layout == 'full-width' ) {
	$quiklearn_layout_class = 'col-sm-12 col-12';
} else {
	$quiklearn_layout_class = QuiklearnTheme_Helper::has_active_widget();
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
					<div class="rt-search-post rt-sidebar-sapcer">
						<?php if ( have_posts() ) :?>
								<?php while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content', 'search' );
								?>
								<?php endwhile; ?>
						<?php else:?>
							<?php get_template_part( 'template-parts/content', 'none' );?>
						<?php endif;?>
					</div>
					<?php QuiklearnTheme_Helper::pagination();?>
				</main>					
			</div>
			<?php
			if ( QuiklearnTheme::$layout == 'right-sidebar' ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>