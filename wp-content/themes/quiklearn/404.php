
<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

wp_head();

if( !empty( QuiklearnTheme::$options['error_image'] ) ) {
	$error_bg = wp_get_attachment_image( QuiklearnTheme::$options['error_image'], 'full', true );
	$quiklearn_error_img = $error_bg;
}else {
	$quiklearn_error_img = "<img width='600' height='400' src='" . QUIKLEARN_ASSETS_URL . 'img/404.png' . "' alt='" . esc_attr( get_bloginfo('name') ) . "'>";
}

?>
<?php get_header();?>
<div id="primary" class="content-area error-page-area">
	<div class="container">
		<div class="error-page-content">
			<div class="item-img">
				<span class="error-img <?php echo esc_attr( QuiklearnTheme::$options['error_animation'] );?> <?php echo esc_attr( QuiklearnTheme::$options['error_animation_effect'] );?>" data-wow-delay=".5s" data-wow-duration="1s"><?php echo wp_kses( $quiklearn_error_img, 'allow_link' ); ?></span>
			</div>
			<?php if ( !empty( QuiklearnTheme::$options['error_text1']) ) { ?>
			<h2 class="error-title <?php echo esc_attr( QuiklearnTheme::$options['error_animation'] );?> <?php echo esc_attr( QuiklearnTheme::$options['error_animation_effect'] );?>" data-wow-delay=".7s" data-wow-duration="1s"><?php echo wp_kses( QuiklearnTheme::$options['error_text1'] , 'alltext_allow' );?></h2>
			<?php } ?>
			<?php if ( !empty(QuiklearnTheme::$options['error_text2'])) { ?>
			<p class="<?php echo esc_attr( QuiklearnTheme::$options['error_animation'] );?> <?php echo esc_attr( QuiklearnTheme::$options['error_animation_effect'] );?>" data-wow-delay=".9s" data-wow-duration="1s"><?php echo wp_kses( QuiklearnTheme::$options['error_text2'] , 'alltext_allow' );?></p>
			<?php } ?>
			<div class="go-home <?php echo esc_attr( QuiklearnTheme::$options['error_animation'] );?> <?php echo esc_attr( QuiklearnTheme::$options['error_animation_effect'] );?>" data-wow-delay="1.1s" data-wow-duration="1s">
			  <a class="button-style-2 btn-common" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo esc_html( QuiklearnTheme::$options['error_buttontext'] );?><i class="icon-quiklearn-right-arrow"></i></a>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>