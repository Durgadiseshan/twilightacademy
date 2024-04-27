<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if( QuiklearnTheme::$options['image_blend'] == 'normal' ) {
	$blend = 'normal';
}else {
	$blend = 'blend';
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php
		// Preloader	
		if ( QuiklearnTheme::$options['preloader'] ) {	
			if( !empty( QuiklearnTheme::$options['preloader_image'] ) ) {
				$pre_bg = wp_get_attachment_image_src( QuiklearnTheme::$options['preloader_image'], 'full', true );
				$preloader_img = $pre_bg[0];
				echo '<div id="preloader" style="background-image:url(' . esc_url($preloader_img) . ');"></div>';
			}else { ?>				
				<div id="preloader" class="loader">
			      	<div class="cssload-loader">
				        <div class="cssload-inner cssload-one"></div>
				        <div class="cssload-inner cssload-two"></div>
				        <div class="cssload-inner cssload-three"></div>
			      	</div>
			    </div>
			<?php }	            
		}
	?>

	<?php if ( is_singular() && ( QuiklearnTheme::$options['scroll_indicator_enable'] == '1' ) && ( QuiklearnTheme::$options['scroll_indicator_position'] == 'top' ) ){ ?>
	<div class="quiklearn-progress-container">
		<div class="quiklearn-progress-bar" id="quiklearnBar"></div>
	</div>
	<?php } ?>

	<?php 
        if( QuiklearnTheme::$header_style == 1 ){
            $page_class = 'main-homeOne';
        } else {
            $page_class = 'page';
        }
    ?>
	
	<div id="page" class="site <?php echo esc_attr( $page_class ); ?>">		
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'quiklearn' ); ?></a>		
		<header id="masthead" class="site-header">
			<div id="header-<?php echo esc_attr( QuiklearnTheme::$header_style ); ?>" class="header-area">
				<?php if ( QuiklearnTheme::$top_bar == 1 || QuiklearnTheme::$top_bar === "on" ){ ?>			
				<?php get_template_part( 'template-parts/header/header-top', QuiklearnTheme::$top_bar_style ); ?>
				<?php } ?>
				<?php if ( QuiklearnTheme::$header_opt == 1 || QuiklearnTheme::$header_opt === "on" ){ ?>
				<?php get_template_part( 'template-parts/header/header', QuiklearnTheme::$header_style ); ?>
				<?php } ?>			
			</div>
		</header>		
		<?php get_template_part('template-parts/header/mobile', 'menu');?>
		<div id="header-search" class="header-search">
			<div class="header-search-wrap">
            <button type="button" aria-label="close button" class="close"><i class="fa-solid fa-xmark"></i></button>
            <form role="search" method="get" class="header-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="search" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php esc_html_e( 'Type your search........', 'quiklearn' ); ?>">
                <button type="submit" aria-label="submit button" class="search-btn"><i class="icon-quiklearn-search"></i></button>
            </form>
            </div>
        </div>
		<div id="content" class="site-content <?php echo esc_attr($blend); ?>">			
			<?php
				if ( QuiklearnTheme::$has_banner === 1 || QuiklearnTheme::$has_banner === "on" ) { 
					get_template_part('template-parts/content', 'banner');
				}
			?>
			