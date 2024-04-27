<?php
$quiklearn_footer_column = QuiklearnTheme::$options['footer_column_1'];
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
$quiklearn_socials = QuiklearnTheme_Helper::socials();

if( !empty( QuiklearnTheme::$options['fbgimg'] ) ) {
	$f1_bg = wp_get_attachment_image_src( QuiklearnTheme::$options['fbgimg'], 'full', true );
	$footer_bg_img = $f1_bg[0];
}else {
	$footer_bg_img = QUIKLEARN_ASSETS_URL . 'img/footer_bg.jpg';
}

if ( QuiklearnTheme::$options['footer_bgtype'] == 'fbgcolor' ) {
	$quiklearn_bg = QuiklearnTheme::$options['fbgcolor'];
} else {
	$quiklearn_bg = 'url(' . $footer_bg_img . ') no-repeat center bottom / cover';
}
$bgc = $menu_on = $copyright_on = '';
if ( QuiklearnTheme::$options['footer_bgtype'] == 'fbgimg' ) {
	$bgc = 'footer-bg-opacity';
}

$menu_on = ( QuiklearnTheme::$options['copyright_menu'] ) ? "menu-on" : "menu-off";
$copyright_on = ( QuiklearnTheme::$options['copyright_text'] ) ? "copyright-on" : "copyright-off";
$quiklearn_socials = QuiklearnTheme_Helper::socials();
?>
<div class="footer-top-area <?php echo esc_attr( $bgc ); ?>" style="background:<?php echo esc_html( $quiklearn_bg ); ?>">
	<?php if ( is_active_sidebar( 'footer-style-1-1' ) && QuiklearnTheme::$footer_area == 1 ) { ?>
	<div class="footer-content-area">
		<div class="container">			
			<div class="row">
				<?php
				for ( $i = 1; $i <= $quiklearn_footer_column; $i++ ) {
					echo '<div class="' . $quiklearn_footer_class . '">';
					dynamic_sidebar( 'footer-style-1-'. $i );
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
			<div class="copyright-area <?php echo esc_attr( $copyright_on ); ?> <?php echo esc_attr( $menu_on ); ?>">
				<div class="copyright-menu-wrap">
					<?php if ( QuiklearnTheme::$options['copyright_text'] ) { ?>
					<div class="copyright"><?php echo wp_kses( QuiklearnTheme::$options['copyright_text'] , 'allow_link' );?></div>
					<?php } ?>
				</div>
				<?php if ( QuiklearnTheme::$options['copyright_menu'] ) { ?>
					<div class="copyright-menu"><?php dynamic_sidebar('copyright-menu'); ?></div>
				<?php } ?>
				<?php if ( $quiklearn_socials && QuiklearnTheme::$options['copyright_social']  ) { ?>					
					<ul class="copyright-social">
						<?php foreach ( $quiklearn_socials as $quiklearn_social ): ?>
							<li><a target="_blank" aria-label="Social Link" href="<?php echo esc_url( $quiklearn_social['url'] );?>"><i class="fab <?php echo esc_attr( $quiklearn_social['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
</div>

