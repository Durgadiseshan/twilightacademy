<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$quiklearn_socials = QuiklearnTheme_Helper::socials();

// Logo
if( !empty( QuiklearnTheme::$options['logo'] ) ) {
	$logo_dark = wp_get_attachment_image( QuiklearnTheme::$options['logo'], 'full' );
	$quiklearn_dark_logo = $logo_dark;
}else {
	$quiklearn_dark_logo = get_bloginfo( 'name' ); 
}

if( !empty( QuiklearnTheme::$options['logo_light'] ) ) {
	$logo_lights = wp_get_attachment_image( QuiklearnTheme::$options['logo_light'], 'full' );
	$quiklearn_light_logo = $logo_lights;
}else {
	$quiklearn_light_logo = get_bloginfo( 'name' );
}

?>

<div class="additional-menu-area header-offcanvus">
	<div class="sidenav sidecanvas">
		<div class="canvas-content">
			<a href="#" class="closebtn" aria-label="Close btn"><i class="fas fa-times"></i></a>
			<div class="additional-logo">
				<a class="dark-logo" aria-label="Dark Logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $quiklearn_dark_logo, 'allow_link' ); ?></a>
				<a class="light-logo" aria-label="Light Logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $quiklearn_light_logo, 'allow_link' ); ?></a>
			</div>

			<div class="sidenav-address">
				<?php if ( !empty ( QuiklearnTheme::$options['sidetext_label'] ) ) { ?>
				<label><?php echo wp_kses( QuiklearnTheme::$options['sidetext_label'] , 'alltext_allow' );?></label>
				<?php } ?>
				<?php if ( !empty ( QuiklearnTheme::$options['sidetext'] ) ) { ?>
				<p><?php echo wp_kses( QuiklearnTheme::$options['sidetext'] , 'alltext_allow' );?></p>
				<?php } ?>
				<?php if( is_active_sidebar('offcanvas') ) { dynamic_sidebar('offcanvas'); } ?>

				<?php if ( !empty ( QuiklearnTheme::$options['address_label'] ) ) { ?>
				<label><?php echo wp_kses( QuiklearnTheme::$options['address_label'] , 'alltext_allow' );?></label>
				<?php } ?>
				<?php if ( QuiklearnTheme::$options['address'] ) { ?>
				<span><i class="icon-quiklearn-location"></i><?php echo wp_kses( QuiklearnTheme::$options['address'] , 'alltext_allow' );?></span>
				<?php } ?>
				<?php if ( QuiklearnTheme::$options['email'] ) { ?>
				<span><i class="icon-quiklearn-message"></i><a href="mailto:<?php echo esc_attr( QuiklearnTheme::$options['email'] );?>"><?php echo esc_html( QuiklearnTheme::$options['email'] );?></a></span>
				<?php } ?>			
				<?php if ( QuiklearnTheme::$options['phone'] ) { ?>
				<span><i class="icon-quiklearn-phone"></i><a href="tel:<?php echo esc_attr( QuiklearnTheme::$options['phone'] );?>"><?php echo esc_html( QuiklearnTheme::$options['phone'] );?></a></span>
				<?php } ?>

			<?php if ( !empty ( $quiklearn_socials ) ) { ?>
				<?php if ( !empty ( QuiklearnTheme::$options['social_label'] ) ) { ?>
				<label class="social-title"><?php echo wp_kses( QuiklearnTheme::$options['social_label'] , 'alltext_allow' );?></label>
			<?php } } ?>
				<?php if ( $quiklearn_socials ) { ?>
					<div class="sidenav-social">
						<?php foreach ( $quiklearn_socials as $quiklearn_social ): ?>
							<span><a target="_blank" aria-label="Social Link" href="<?php echo esc_url( $quiklearn_social['url'] );?>"><i class="fab <?php echo esc_attr( $quiklearn_social['icon'] );?>"></i></a></span>
						<?php endforeach; ?>
					</div>						
				<?php } ?>
			</div>
		</div>
	</div>
    <button type="button" aria-label="button" class="side-menu-open side-menu-trigger">
        <span class="menu-btn-icon">
          <span class="line line1"></span>
          <span class="line line2"></span>
          <span class="line line3"></span>
        </span>
      </button>
</div>