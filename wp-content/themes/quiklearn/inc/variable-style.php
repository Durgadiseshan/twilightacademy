<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

/*-------------------------------------
INDEX
=======================================
#. Container
#. Typography
#. Top Bar
#. Header
#. Banner
#. Post Progress Bar
#. Footer
#. Error 404
#. Buttons
#. Archive Contents
#. Single Content
#. Sidebar Widget
#. Pagination
#. Fluent form
#. Miscellaneous
#. woocommerce
-------------------------------------*/

$primary_color     		= QuiklearnTheme::$options['primary_color']; // #ff2500
$primary_rgb       		= QuiklearnTheme_Helper::hex2rgb( $primary_color ); // 255, 37, 0
$secondary_color   		= QuiklearnTheme::$options['secondary_color']; // #d60c0c
$secondary_rgb     		= QuiklearnTheme_Helper::hex2rgb( $secondary_color ); // 214, 12, 12
$body_color   			= QuiklearnTheme::$options['body_color']; // #334f7b
$body_bg_color   		= QuiklearnTheme::$options['body_bg_color']; // #ffffff

$container_width	   = QuiklearnTheme::$options['container_width']; // Grid Container width
$logo_width	   		   = QuiklearnTheme::$options['logo_width']; // Grid Container width
$mobile_logo_width	   = QuiklearnTheme::$options['mobile_logo_width']; // Grid Container width

$menu_color            = QuiklearnTheme::$options['menu_color'];
$menu_color_tr         = QuiklearnTheme::$options['menu_color_tr'];
$menu_hover_color      = QuiklearnTheme::$options['menu_hover_color'];
$submenu_color         = QuiklearnTheme::$options['submenu_color'];
$submenu_bgcolor       = QuiklearnTheme::$options['submenu_bgcolor'];
$submenu_hover_color   = QuiklearnTheme::$options['submenu_hover_color'];

$error_bodybg_color = QuiklearnTheme::$options['error_bodybg_color'];

$quiklearn_typo_body     = QuiklearnTheme::$options['typo_body'];
$quiklearn_typo_h1       = QuiklearnTheme::$options['typo_h1'];
$quiklearn_typo_h2       = QuiklearnTheme::$options['typo_h2'];
$quiklearn_typo_h3       = QuiklearnTheme::$options['typo_h3'];
$quiklearn_typo_h4       = QuiklearnTheme::$options['typo_h4'];
$quiklearn_typo_h5       = QuiklearnTheme::$options['typo_h5'];
$quiklearn_typo_h6       = QuiklearnTheme::$options['typo_h6'];

?>

<?php
/*-------------------------------------
#. Container
---------------------------------------*/
?>
:root {	
	<?php if ( !empty( $primary_color ) ) { ?>
		--quiklearn-primary-color: <?php echo esc_html( $primary_color ); ?>;
	<?php } ?>
	<?php if ( !empty( $primary_rgb ) ) { ?>
		--quiklearn-primary-color-rgb: <?php echo esc_html( $primary_rgb ); ?>;
	<?php } ?>
	<?php if ( !empty( $secondary_color ) ) { ?>
		--quiklearn-secondary-color: <?php echo esc_html( $secondary_color ); ?>;
	<?php } ?>
	<?php if ( !empty( $secondary_rgb ) ) { ?>
		--quiklearn-secondary-color-rgb: <?php echo esc_html( $secondary_rgb ); ?>;
	<?php } ?>
	<?php if ( !empty( $body_color ) ) { ?>
		--quiklearn-body-color: <?php echo esc_html( $body_color ); ?>;
	<?php } ?>
	<?php if ( !empty( $body_bg_color ) ) { ?>
		--quiklearn-body-bg-color: <?php echo esc_html( $body_bg_color ); ?>;
	<?php } ?>
}

<?php

/* = Body Typo Area
=======================================================*/
$typo_body = json_decode( QuiklearnTheme::$options['typo_body'], true );
if ($typo_body['font'] == 'Inherit') {
	$typo_body['font'] = 'Outfit';
} else {
	$typo_body['font'] = $typo_body['font'];
}

/* = Menu Typo Area
=======================================================*/
$typo_menu = json_decode( QuiklearnTheme::$options['typo_menu'], true );
if ($typo_menu['font'] == 'Inherit') {
	$typo_menu['font'] = 'Outfit';
} else {
	$typo_menu['font'] = $typo_menu['font'];
}

$typo_sub_menu = json_decode( QuiklearnTheme::$options['typo_sub_menu'], true );
if ($typo_sub_menu['font'] == 'Inherit') {
	$typo_sub_menu['font'] = 'Outfit';
} else {
	$typo_sub_menu['font'] = $typo_sub_menu['font'];
}

/* = Heading Typo Area
=======================================================*/
$typo_heading = json_decode( QuiklearnTheme::$options['typo_heading'], true );
if ($typo_heading['font'] == 'Inherit') {
	$typo_heading['font'] = 'Outfit';
} else {
	$typo_heading['font'] = $typo_heading['font'];
}
$typo_h1 = json_decode( QuiklearnTheme::$options['typo_h1'], true );
if ($typo_h1['font'] == 'Inherit') {
	$typo_h1['font'] = 'Outfit';
} else {
	$typo_h1['font'] = $typo_h1['font'];
}
$typo_h2 = json_decode( QuiklearnTheme::$options['typo_h2'], true );
if ($typo_h2['font'] == 'Inherit') {
	$typo_h2['font'] = 'Outfit';
} else {
	$typo_h2['font'] = $typo_h2['font'];
}
$typo_h3 = json_decode( QuiklearnTheme::$options['typo_h3'], true );
if ($typo_h3['font'] == 'Inherit') {
	$typo_h3['font'] = 'Outfit';
} else {
	$typo_h3['font'] = $typo_h3['font'];
}
$typo_h4 = json_decode( QuiklearnTheme::$options['typo_h4'], true );
if ($typo_h4['font'] == 'Inherit') {
	$typo_h4['font'] = 'Outfit';
} else {
	$typo_h4['font'] = $typo_h4['font'];
}
$typo_h5 = json_decode( QuiklearnTheme::$options['typo_h5'], true );
if ($typo_h5['font'] == 'Inherit') {
	$typo_h5['font'] = 'Outfit';
} else {
	$typo_h5['font'] = $typo_h5['font'];
}
$typo_h6 = json_decode( QuiklearnTheme::$options['typo_h6'], true );
if ($typo_h6['font'] == 'Inherit') {
	$typo_h6['font'] = 'Outfit';
} else {
	$typo_h6['font'] = $typo_h6['font'];
}

?>
<?php
/*-------------------------------------
#. Container
---------------------------------------*/
?>
@media ( min-width:1400px ) {
	.container {
		max-width: <?php echo esc_html( $container_width ); ?>px !important;
	}
}
#preloader {
	background-color: <?php echo esc_html( QuiklearnTheme::$options['preloader_bg_color'] ); ?>;
}
<?php if ( $error_bodybg_color ) { ?>
	#page .error-page-area {		 
		background-color: <?php echo esc_html( $error_bodybg_color );?>;
	}
<?php } ?>

<?php if ( $logo_width ) { ?>
	.site-header .site-branding a img {
		max-width: <?php echo esc_html( $logo_width ); ?>px;
	}
<?php } ?>
<?php if ( $mobile_logo_width ) { ?>
	.mean-container .mean-bar .mobile-logo img {
		max-width: <?php echo esc_html( $mobile_logo_width ); ?>px;
	}
<?php } ?>
<?php
/*-------------------------------------
#. Typography
---------------------------------------*/
?>

body {
	font-family: '<?php echo esc_html( $typo_body['font'] ); ?>', sans-serif !important;
	font-size: <?php echo esc_html( QuiklearnTheme::$options['typo_body_size'] ) ?>;
	line-height: <?php echo esc_html( QuiklearnTheme::$options['typo_body_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_body['regularweight'] ) ?>;
	font-style: normal;
}
h1,h2,h3,h4,h5,h6 {
	font-family: '<?php echo esc_html( $typo_heading['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_heading['regularweight'] ); ?>;
}

<?php if (!empty($typo_h1['font'])){ ?>
h1 {
	font-family: '<?php echo esc_html( $typo_h1['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h1['regularweight'] ); ?>;
}
<?php } ?>
h1 {
	font-size: <?php echo esc_html( QuiklearnTheme::$options['typo_h1_size'] ); ?>;
	line-height: <?php echo esc_html(  QuiklearnTheme::$options['typo_h1_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h2['font'])) { ?>
h2 {
	font-family: '<?php echo esc_html( $typo_h2['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h2['regularweight'] ); ?>;
}
<?php } ?>
h2 {
	font-size: <?php echo esc_html( QuiklearnTheme::$options['typo_h2_size'] ); ?>;
	line-height: <?php echo esc_html( QuiklearnTheme::$options['typo_h2_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h3['font'])) { ?>
h3 {
	font-family: '<?php echo esc_html( $typo_h3['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h3['regularweight'] ); ?>;
}
<?php } ?>
h3 {
	font-size: <?php echo esc_html( QuiklearnTheme::$options['typo_h3_size'] ); ?>;
	line-height: <?php echo esc_html(  QuiklearnTheme::$options['typo_h3_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h4['font'])) { ?>
h4 {
	font-family: '<?php echo esc_html( $typo_h4['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h4['regularweight'] ); ?>;
}
<?php } ?>
h4 {
	font-size: <?php echo esc_html( QuiklearnTheme::$options['typo_h4_size'] ); ?>;
	line-height: <?php echo esc_html(  QuiklearnTheme::$options['typo_h4_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h5['font'])) { ?>
h5 {
	font-family: '<?php echo esc_html( $typo_h5['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h5['regularweight'] ); ?>;
}
<?php } ?>
h5 {
	font-size: <?php echo esc_html( QuiklearnTheme::$options['typo_h5_size'] ); ?>;
	line-height: <?php echo esc_html(  QuiklearnTheme::$options['typo_h5_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h6['font'])) { ?>
h6 {
	font-family: '<?php echo esc_html( $typo_h6['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_h6['regularweight'] ); ?>;
}
<?php } ?>
h6 {
	font-size: <?php echo esc_html( QuiklearnTheme::$options['typo_h6_size'] ); ?>;
	line-height: <?php echo esc_html(  QuiklearnTheme::$options['typo_h6_height'] ); ?>;
	font-style: normal;
}

<?php
/*-------------------------------------
#. Top Bar
---------------------------------------*/
$top_bar_bgcolor = QuiklearnTheme::$options['top_bar_bgcolor'];
$top_bar_color = QuiklearnTheme::$options['top_bar_color'];
$top_link_color = QuiklearnTheme::$options['top_link_color'];
$top_hover_color = QuiklearnTheme::$options['top_hover_color'];
?>
<?php if ( $top_bar_bgcolor ) { ?>
	.header-top-bar {
		background-color: <?php echo esc_html( $top_bar_bgcolor ); ?> !important;
	}
<?php } ?>
<?php if ( $top_bar_color ) { ?>
	.header-top-bar {
		color: <?php echo esc_html( $top_bar_color ); ?>;
	}
<?php } ?>
<?php if ( $top_link_color ) { ?>
	.header-top-bar a,
	.header-top-bar ul li a {
		color: <?php echo esc_html( $top_link_color ); ?>;
	}
<?php } ?>
<?php if ( $top_hover_color ) { ?>
	.header-top-bar a:hover,
	.header-top-bar ul li a:hover {
		color: <?php echo esc_html( $top_hover_color ); ?>;
	}
<?php } ?>

<?php
/*-------------------------------------
#. Header
---------------------------------------*/
?>
<?php // Main Menu ?>
.site-header .main-navigation nav ul li a,
.additional-menu-area .sidenav ul li a,
.rt-slide-nav .offscreen-navigation ul li > a {
	font-family: '<?php echo esc_html( $typo_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( QuiklearnTheme::$options['typo_menu_size'] ) ?>;
	line-height: <?php echo esc_html( QuiklearnTheme::$options['typo_menu_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_menu['regularweight'] ) ?>;
	font-style: normal;
}
.site-header .main-navigation ul li ul li a,
.additional-menu-area .sidenav ul li ul li a {
	font-family: '<?php echo esc_html( $typo_sub_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( QuiklearnTheme::$options['typo_submenu_size'] ) ?>;
	line-height: <?php echo esc_html( QuiklearnTheme::$options['typo_submenu_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_sub_menu['regularweight'] ) ?>;
	font-style: normal;
}
.rt-slide-nav .offscreen-navigation ul .sub-menu li > a {
	font-family: '<?php echo esc_html( $typo_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( QuiklearnTheme::$options['typo_submenu_size'] ) ?>;
	line-height: <?php echo esc_html( QuiklearnTheme::$options['typo_submenu_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_sub_menu['regularweight'] ) ?>;
	font-style: normal;
}
<?php if ( QuiklearnTheme::$options['header_bg_color'] ) { ?>
	.header-area,
	.header-style-3 .menu-full-wrap {
		background-color: <?php echo esc_html( QuiklearnTheme::$options['header_bg_color'] ); ?> !important;
	}
<?php } ?>

<?php if ( $menu_color ) { ?>
	.site-header .main-navigation nav ul li a,
	.header-style-3 .site-header .main-navigation nav > ul > li > a,
	.rt-slide-nav .offscreen-navigation ul li a {
		color: <?php echo esc_html( $menu_color ); ?>;
	}
<?php } ?>

<?php if ( $menu_hover_color ) { ?>
	.menu-product-category ul.menu li a:hover,
	.site-header .main-navigation nav ul li a.active,
	.site-header .main-navigation ul.menu > li > a:hover,
	.site-header .main-navigation ul.menu li.current-menu-item > a,
	.site-header .main-navigation ul.menu > li.current > a,
	.site-header .main-navigation ul.menu li.current-menu-ancestor > a,	
	.additional-menu-area .sidenav ul li a:hover,
	.rt-slide-nav .offscreen-navigation li.current-menu-item > a, 
	.rt-slide-nav .offscreen-navigation li.current-menu-parent > a,
	.rt-slide-nav .offscreen-navigation ul li > span.open:after,
	.tr-header .site-header .main-navigation > nav > ul > li > a:hover,
	.tr-header.header-style-2 .site-header .main-navigation > nav > ul > li > a:hover,
	.tr-header.header-style-3 .site-header .main-navigation nav > ul > li > a:hover,
	.tr-header.header-style-5 .site-header .main-navigation > nav > ul > li > a:hover {
		color: <?php echo esc_html( $menu_hover_color ); ?>;
	}
	.rt-slide-nav .offscreen-navigation ul li a:hover,
	.rt-slide-nav .offscreen-navigation ul li > a:hover:before,
	.site-header .main-navigation nav > ul > li > a::before {
		color: <?php echo esc_html( $menu_hover_color ); ?>;
	}
<?php } ?>

<?php if ( $submenu_color ) { ?>
	.site-header .main-navigation ul li ul li a,
	.site-header .main-navigation ul li ul.sub-menu li.menu-item-has-children:before {
		color: <?php echo esc_html( $submenu_color ); ?>;
	}
<?php } ?>

<?php if ( $submenu_hover_color ) { ?>
	.site-header .main-navigation ul.menu li ul.sub-menu li a:hover,
	.site-header .main-navigation ul li ul.sub-menu li.menu-item-has-children:hover:before {
		color: <?php echo esc_html( $submenu_hover_color ); ?>;
	}
	.site-header .main-navigation ul li ul.sub-menu li:hover > a:before {
		color: <?php echo esc_html( $submenu_hover_color ); ?>;
	}
<?php } ?>

<?php if ( $submenu_bgcolor ) { ?>
	.site-header .main-navigation ul li ul,
	.site-header .main-navigation ul li.mega-menu > ul.sub-menu {
		background-color: <?php echo esc_html( $submenu_bgcolor ); ?>;
	}
<?php } ?>

<?php if ( $menu_color_tr ) { ?>
	.tr-header .site-header .main-navigation > nav > ul > li > a,
	.tr-header .site-header .main-navigation ul.menu li.current-menu-ancestor > a,
	.tr-header .site-header .main-navigation nav ul li.menu-item-has-children a:after {
		color: <?php echo esc_html( $menu_color_tr ); ?>;
	}
<?php } ?>

<?php
/*-------------------------------------
#. Banner
---------------------------------------*/
$breadcrumb_link_color = QuiklearnTheme::$options['breadcrumb_link_color'];
$breadcrumb_link_hover_color = QuiklearnTheme::$options['breadcrumb_link_hover_color'];
$breadcrumb_seperator_color = QuiklearnTheme::$options['breadcrumb_seperator_color'];
$breadcrumb_active_color = QuiklearnTheme::$options['breadcrumb_active_color'];
?>

<?php if ( $breadcrumb_link_color ) { ?>
	.breadcrumb-area .entry-breadcrumb span a,
	.opacity-on .breadcrumb-area .entry-breadcrumb span a {
		color: <?php echo esc_html( $breadcrumb_link_color ); ?>;
	}
<?php } ?>

<?php if ( $breadcrumb_link_hover_color ) { ?>
	.breadcrumb-area .entry-breadcrumb span a:hover,
	.opacity-on .breadcrumb-area .entry-breadcrumb span a:hover {
		color: <?php echo esc_html( $breadcrumb_link_hover_color ); ?>;
	}
<?php } ?>

<?php if ( $breadcrumb_seperator_color ) { ?>
	.entry-banner .entry-breadcrumb .delimiter,
	.entry-banner .entry-breadcrumb .dvdr,
	.entry-banner.opacity-on .entry-breadcrumb .dvdr {
		background-color: <?php echo esc_html( $breadcrumb_seperator_color ); ?>;
	}
<?php } ?>

<?php if ( $breadcrumb_active_color ) { ?>
	.breadcrumb-area .entry-breadcrumb .current-item,
	.entry-banner .entry-banner-content {
		color: <?php echo esc_html( $breadcrumb_active_color ); ?>;
	}
<?php } ?>

.entry-banner.opacity-on:after {
    background-color: rgba(0, 0, 0, <?php echo esc_html( QuiklearnTheme::$options['banner_bg_opacity'] ); ?>);
}
.entry-banner .entry-banner-content {
	padding-top: <?php  echo esc_html( QuiklearnTheme::$options['banner_top_padding'] ); ?>px;
	padding-bottom: <?php  echo esc_html( QuiklearnTheme::$options['banner_bottom_padding'] ); ?>px;
}

<?php
/*-------------------------------------
#. Post Progress Bar
---------------------------------------*/
$scroll_indicator_bgcolor = QuiklearnTheme::$options['scroll_indicator_bgcolor'];
$scroll_indicator_bgcolor2 = QuiklearnTheme::$options['scroll_indicator_bgcolor2'];
$scroll_indicator_height = QuiklearnTheme::$options['scroll_indicator_height'];
?>

<?php if ( $scroll_indicator_bgcolor && $scroll_indicator_bgcolor2 ) { ?>
	.single .quiklearn-progress-bar {
		background: linear-gradient(90deg, <?php echo esc_html( $scroll_indicator_bgcolor ); ?> 0%, <?php echo esc_html( $scroll_indicator_bgcolor2 ); ?> 100%);
	}
<?php } ?>
<?php if ( $scroll_indicator_height ) { ?>
	.single .quiklearn-progress-bar {
		height: <?php echo esc_html( $scroll_indicator_height ); ?>px;
	}
<?php } ?>

<?php
/*-------------------------------------
#. Footer
---------------------------------------*/
$footer_title_color = QuiklearnTheme::$options['footer_title_color'];
$footer_color = QuiklearnTheme::$options['footer_color'];
$footer_link_color = QuiklearnTheme::$options['footer_link_color'];
$footer_link_hover_color = QuiklearnTheme::$options['footer_link_hover_color'];
$copyright_text_color = QuiklearnTheme::$options['copyright_text_color'];
$copyright_link_color = QuiklearnTheme::$options['copyright_link_color'];
$copyright_hover_color = QuiklearnTheme::$options['copyright_hover_color'];
$copyright_bg_color = QuiklearnTheme::$options['copyright_bg_color'];
?>

<?php if ( QuiklearnTheme::$options['footer_title_color'] ) { ?>
	.footer-area .widgettitle,
	.footer-style-3 .footer-area .widgettitle,
	.footer-content-area .footer-google-app h4 {
		color: <?php echo esc_html( $footer_title_color ); ?>;
	}
<?php } ?>

<?php if ( QuiklearnTheme::$options['footer_color'] ) { ?>
	.footer-content-area,
	.footer-style-3 .footer-content-area,
	.footer-content-area .rt-about-widget .social-label,
	.footer-style-3 .footer-content-area .rt-about-widget .social-label {
		color: <?php echo esc_html( $footer_color ); ?>;
	}
<?php } ?>

<?php if ( QuiklearnTheme::$options['footer_link_color'] ) { ?>
	.footer-content-area a, 
	.footer-content-area .widget ul li a,
	.footer-style-3 .footer-content-area a, 
	.footer-style-3 .footer-content-area .widget ul li a {
		color: <?php echo esc_html( $footer_link_color ); ?>;
	}
<?php } ?>

<?php if ( QuiklearnTheme::$options['footer_link_hover_color'] ) { ?>
	.footer-area .widget ul li a:hover,
	.footer-content-area a:hover, 
	.footer-content-area .widget ul li a:hover,
	.footer-style-3 .footer-content-area a:hover, 
	.footer-style-3 .footer-content-area .widget ul li a:hover {
		color: <?php echo esc_html( $footer_link_hover_color ); ?>;
	}
<?php } ?>

<?php if ( QuiklearnTheme::$options['copyright_text_color'] ) { ?>
	.footer-copyright-area .copyright-area,
	.footer-style-3 .footer-copyright-area .copyright-area {
		color: <?php echo esc_html( $copyright_text_color ); ?>;
	}
<?php } ?>

<?php if ( QuiklearnTheme::$options['copyright_link_color'] ) { ?>
	.footer-copyright-area .copyright-area a,
	.footer-style-3 .footer-copyright-area .copyright-area a {
		color: <?php echo esc_html( $copyright_link_color ); ?>;
	}
<?php } ?>

<?php if ( QuiklearnTheme::$options['copyright_hover_color'] ) { ?>
	.footer-copyright-area .copyright-area a:hover,
	.footer-style-3 .copyright-area a:hover,
	.footer-style-3 .footer-copyright-area .copyright-area a:hover,
	.footer-copyright-area .copyright-area .copyright-menu ul li a:hover {
		color: <?php echo esc_html( $copyright_hover_color ); ?>;
	}
<?php } ?>

<?php if ( QuiklearnTheme::$options['copyright_bg_color'] ) { ?>
	.footer-area .footer-copyright-area {
		background-color: <?php echo esc_html( $copyright_bg_color ); ?>;
	}
<?php } ?>

<?php
/*-------------------------------------
#. Error 404
---------------------------------------*/
$error_text1_color = QuiklearnTheme::$options['error_text1_color'];
$error_text2_color = QuiklearnTheme::$options['error_text2_color'];
?>
<?php if ( $error_text1_color ) { ?>
	.error-page-content .error-title {
		color: <?php echo esc_html( $error_text1_color ); ?>;
	}
<?php } ?>

<?php if ( $error_text2_color ) { ?>
	.error-page-content p {
		color: <?php echo esc_html( $error_text2_color ); ?>;
	}
<?php } ?>