<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( is_404() ) {
	$quiklearn_title = "Error Page";
}
elseif ( is_search() ) {
	$quiklearn_title = esc_html__( 'Search Results for : ', 'quiklearn' ) . get_search_query();
}
elseif ( is_home() ) {
	if ( get_option( 'page_for_posts' ) ) {
		$quiklearn_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$quiklearn_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'quiklearn' ) );
	}
}
elseif (is_post_type_archive('quiklearn_team')) {
	$quiklearn_title  = apply_filters( 'theme_blog_title', esc_html__( 'Our Teams', 'quiklearn' ) );
} elseif (is_post_type_archive('lp_course')) {
	$quiklearn_title  = apply_filters( 'theme_blog_title', esc_html__( 'Our Courses', 'quiklearn' ) );
} elseif (is_post_type_archive('etn')) {
	$quiklearn_title  = apply_filters( 'theme_blog_title', esc_html__( 'Our Events', 'quiklearn' ) );
} elseif (is_post_type_archive('etn-speaker')) {
	$quiklearn_title  = apply_filters( 'theme_blog_title', esc_html__( 'All Speaker', 'quiklearn' ) );
} elseif ( is_archive() ) {
	$quiklearn_title = apply_filters( 'theme_blog_title', esc_html__( 'All Posts', 'quiklearn' ) );
} elseif (is_singular('lp_course')) {
	$quiklearn_title  = apply_filters( 'theme_blog_title', esc_html__( 'Course Details', 'quiklearn' ) );
} elseif (is_singular('etn')) {
	$quiklearn_title  = apply_filters( 'theme_blog_title', esc_html__( 'Event Details', 'quiklearn' ) );
} elseif (is_singular('etn-speaker')) {
	$quiklearn_title  = apply_filters( 'theme_blog_title', esc_html__( 'Speaker Details', 'quiklearn' ) );
} elseif (is_single()) {
	$quiklearn_title  = apply_filters( 'theme_blog_title', esc_html__( 'Blog Details', 'quiklearn' ) );

}  else {
	$quiklearn_title = get_the_title();	                   
}

if ( class_exists( 'WooCommerce' ) ) {
	if (is_shop()) {
		$quiklearn_title = esc_html__( 'Shop Page', 'quiklearn' );
	} elseif(is_product_category()) {
		$category = get_queried_object();
		if ($category) {
			$quiklearn_title = $category->name;
		}		
	} elseif(is_product()) {
		$quiklearn_title = esc_html__( 'Shop Details', 'quiklearn' );
	} else {
		$quiklearn_title = $quiklearn_title;
	}
}

$banner_opacity = '';
if( QuiklearnTheme::$bgtype == 'bgimg' ) {
	$banner_opacity = "opacity-on";
} else {
	$banner_opacity = "opacity-off";
}

if( !empty( QuiklearnTheme::$options['banner_shape1'] ) ) {
	$banner_shape1 = wp_get_attachment_image_src( QuiklearnTheme::$options['banner_shape1'], 'full', true );
	$banner_bg_img1 = $banner_shape1[0];
}else {
	$banner_bg_img1 = QUIKLEARN_ASSETS_URL . 'img/banner-shape.png';
}

?>

<?php if ( QuiklearnTheme::$has_banner == 1 || QuiklearnTheme::$has_banner == 'on' ) { ?>
	<div class="entry-banner <?php echo esc_attr( $banner_opacity ); ?>">
		
		<div class="container">
		<?php if( QuiklearnTheme::$options['banner_shape'] ) { ?>
			<div class="banner-shape wow slideInRight" data-wow-delay="400ms" data-wow-duration="1400ms" style="background-image:url(<?php echo esc_url( $banner_bg_img1 ); ?>);"></div>
		<?php } ?>
			<div class="entry-banner-content">
				<?php if ( QuiklearnTheme::$has_breadcrumb == 1 ) { ?>
					<?php get_template_part( 'template-parts/content', 'breadcrumb' );?>
				<?php } ?>
				<?php if ( is_single() ) { ?>
					<h1 class="entry-title"><?php echo wp_kses( $quiklearn_title , 'alltext_allow' );?></h1>
				<?php } else if ( is_page() ) { ?>
					<h1 class="entry-title"><?php echo wp_kses( $quiklearn_title , 'alltext_allow' );?></h1>
				<?php } else { ?>
					<h1 class="entry-title"><?php echo wp_kses( $quiklearn_title , 'alltext_allow' );?></h1>
				<?php } ?>

			</div>
		</div>
	</div>
<?php } ?>