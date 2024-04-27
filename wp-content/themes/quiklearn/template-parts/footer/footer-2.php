<?php
$quiklearn_footer_column = QuiklearnTheme::$options['footer_column_2'];
switch ( $quiklearn_footer_column ) {
	case '1':
	$quiklearn_footer_class = 'col-12';
	break;
	case '2':
	$quiklearn_footer_class = 'col-xl-6 col-md-6';
	break;
	case '3':
	$quiklearn_footer_class = 'col-xl-4 col-md-6';
	break;		
	default:
	$quiklearn_footer_class = 'col-xl-3 col-md-6';
	break;
}

// Logo
if( !empty( QuiklearnTheme::$options['footer_logo_light'] ) ) {
	$logo_lights = wp_get_attachment_image( QuiklearnTheme::$options['footer_logo_light'], 'full' );
	$quiklearn_light_logo = $logo_lights;
}else {
	$quiklearn_light_logo = "<img width='162' height='52' src='" . QUIKLEARN_ASSETS_URL . 'img/logo-light.svg' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

$quiklearn_socials = QuiklearnTheme_Helper::socials();

if( !empty( QuiklearnTheme::$options['fbgimg2'] ) ) {
	$f1_bg = wp_get_attachment_image_src( QuiklearnTheme::$options['fbgimg2'], 'full', true );
	$footer_bg_img = $f1_bg[0];
}else {
	$footer_bg_img = QUIKLEARN_ASSETS_URL . 'img/footer_bg.jpg';
}

if ( QuiklearnTheme::$options['footer_bgtype2'] == 'fbgcolor2' ) {
	$quiklearn_bg = QuiklearnTheme::$options['fbgcolor2'];
} else {
	$quiklearn_bg = 'url(' . $footer_bg_img . ') no-repeat center bottom / cover';
}


$bgc = $menu_on = $copyright_on = '';
if ( QuiklearnTheme::$options['footer_bgtype2'] == 'fbgimg2' ) {
	$bgc = 'footer-bg-opacity';
}

$menu_on = ( QuiklearnTheme::$options['copyright_menu'] ) ? "menu-on" : "menu-off";
$copyright_on = ( QuiklearnTheme::$options['copyright_text'] ) ? "copyright-on" : "copyright-off";
$logo_on = ( QuiklearnTheme::$options['logo_display'] ) ? "logo-on" : "logo-off";

if( !empty( QuiklearnTheme::$options['footer_logo2'] ) ) {
	$footer_logo = wp_get_attachment_image( QuiklearnTheme::$options['footer_logo2'], 'full' );
	$quiklearn_footer_logo = $footer_logo;
}else {
	$quiklearn_footer_logo = get_bloginfo( 'name' ); 
}

?>
<div class="footer-top-area <?php echo esc_attr( $bgc ); ?>" style="background:<?php echo esc_html( $quiklearn_bg ); ?>">
	<?php if ( QuiklearnTheme::$footer_area == 1 ) { ?>
	<div class="footer-content-area">
		<div class="container">				
			<div class="row">
				<?php
				for ( $i = 1; $i <= $quiklearn_footer_column; $i++ ) {
					echo '<div class="' . $quiklearn_footer_class . '">';
					dynamic_sidebar( 'footer-style-2-'. $i );
					echo '</div>';
				}
				?>
			</div>
		</div>	
	</div>
	<?php } ?>
	<?php if ( QuiklearnTheme::$copyright_area == 1 ) { ?>
	<div class="footer-copyright-area">
		<div class="container">
			<div class="copyright-area <?php echo esc_attr( $copyright_on ); ?> <?php echo esc_attr( $menu_on ); ?> <?php echo esc_attr( $logo_on ); ?>">
				<?php if ( QuiklearnTheme::$options['logo_display'] ) { ?>
				<div class="footer-logo-wrap">
					<a class="footer-logo" aria-label="Footer Logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $quiklearn_footer_logo, 'allow_link' ); ?></a>
				</div>
				<?php } ?>
				<?php if ( QuiklearnTheme::$options['copyright_menu'] ) { ?>	
				<div class="copyright-menu"><?php dynamic_sidebar('copyright-menu'); ?></div>
				<?php } ?>
				<?php if ( QuiklearnTheme::$options['copyright_text'] ) { ?>
				<div class="copyright"><?php echo wp_kses( QuiklearnTheme::$options['copyright_text'] , 'allow_link' );?></div>
				<?php } ?>
			</div>
		</div>
	</div>	
	<?php } ?>
</div>	

