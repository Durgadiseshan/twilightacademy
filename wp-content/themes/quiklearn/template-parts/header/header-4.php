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
<div class="header-menu" id="header-menu">
	<div class="container-custom">
		<div class="menu-full-wrap">
			<div class="site-branding">
				<a class="dark-logo" aria-label="Dark Logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $quiklearn_dark_logo, 'allow_link' ); ?></a>
				<a class="light-logo" aria-label="Light Logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $quiklearn_light_logo, 'allow_link' ); ?></a>
			</div>
			<div class="menu-wrap">
				<div id="site-navigation" class="main-navigation">
					<?php if ( has_nav_menu( 'primary' ) ) { 
		             	wp_nav_menu( $nav_menu_args );
		            } else {
		              	if ( is_user_logged_in() ) {
		                	echo '<ul id="menu" class="nav fallbackcd-menu-item"><li><a class="fallbackcd" href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Add a menu', 'quiklearn' ) . '</a></li></ul>';
		              	}
		            } ?>
				</div>
			</div>
			
			<?php if ( QuiklearnTheme::$options['search_icon'] || QuiklearnTheme::$options['wishlist_icon'] || QuiklearnTheme::$options['cart_icon'] && class_exists( 'WC_Widget_Cart' ) || QuiklearnTheme::$options['vertical_menu_icon'] ) { ?>
				<div class="header-icon-area">
					<?php get_template_part( 'template-parts/header/icon', 'area' );?>
					<?php if ( QuiklearnTheme::$options['login_button'] || QuiklearnTheme::$options['signup_button'] || QuiklearnTheme::$options['profile_button']) { ?>
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