<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = QuiklearnTheme_Helper::nav_menu_args();

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
<div id="sticky-placeholder"></div>
<div class="header-menu header-top" id="header-middlebar">
	<div class="container">
		<div class="menu-full-wrap">
			<div class="site-branding">
				<a class="dark-logo" aria-label="Dark Logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $quiklearn_dark_logo, 'allow_link' ); ?></a>
				<a class="light-logo" aria-label="Light Logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $quiklearn_light_logo, 'allow_link' ); ?></a>
			</div>

			<?php if ( QuiklearnTheme::$options['search_filter'] ) { ?>
				<?php get_template_part( 'template-parts/header/header', 'course-search' );?>
			<?php } ?>

			<?php if ( QuiklearnTheme::$options['phone_icon'] || QuiklearnTheme::$options['login_button'] || QuiklearnTheme::$options['signup_button'] || QuiklearnTheme::$options['profile_button'] ) { ?>
				<div class="header-icon-area">
					<?php if ( QuiklearnTheme::$options['phone_icon'] ) { ?>
						<div class="header-info header-phone">
							<div class="info-icon phone-icon">
								<i class="icon-quiklearn-phone"></i>
							</div>
							<div class="info-text phone-no">
								<span><?php echo wp_kses( QuiklearnTheme::$options['phone_label'] , 'alltext_allow' );?></span><a href="tel:<?php echo esc_attr( QuiklearnTheme::$options['phone'] );?>"><?php echo wp_kses( QuiklearnTheme::$options['phone'] , 'alltext_allow' );?></a>
							</div>
						</div>
					<?php } ?>


					<?php if ( QuiklearnTheme::$options['login_button'] || QuiklearnTheme::$options['signup_button'] || QuiklearnTheme::$options['profile_button'] ) { ?>
						<div class="header-login-wrap">
							<div class="header-login">
								<?php if( ! is_user_logged_in() ) { ?>
									<?php if ( QuiklearnTheme::$options['login_button'] ) { ?>
									<a target="_self" href="<?php echo esc_url( QuiklearnTheme::$options['login_link']  );?>"><?php echo esc_html( QuiklearnTheme::$options['login_text'] );?></a>
									<?php } ?>
									<?php if ( QuiklearnTheme::$options['signup_button'] ) { ?>
									<a class="active" target="_self" href="<?php echo esc_url( QuiklearnTheme::$options['signup_link']  );?>"><?php echo esc_html( QuiklearnTheme::$options['signup_text'] );?></a>
									<?php } ?>
								<?php } else { ?>
									<?php if ( QuiklearnTheme::$options['profile_button'] ) { ?>
										<a target="_self" href="<?php echo esc_url( QuiklearnTheme::$options['profile_button_link']  );?>"><?php echo esc_html( QuiklearnTheme::$options['profile_button_text'] );?></a>
									<?php } ?>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<div class="header-menu header-bottom" id="header-menu">
	<div class="container">
		<div class="menu-full-wrap header-dark">
			<div class="menu-wrap">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>
			<?php if ( QuiklearnTheme::$options['search_icon'] || QuiklearnTheme::$options['wishlist_icon'] || QuiklearnTheme::$options['cart_icon'] && class_exists( 'WC_Widget_Cart' ) || QuiklearnTheme::$options['vertical_menu_icon'] ) { ?>
				<div class="header-icon-area">
					<?php get_template_part( 'template-parts/header/icon', 'area' );?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>