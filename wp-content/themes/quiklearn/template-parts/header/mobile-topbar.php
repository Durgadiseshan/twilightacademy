<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$quiklearn_socials = QuiklearnTheme_Helper::socials();

$quiklearn_mobile_meta  = ( QuiklearnTheme::$options['mobile_date'] || QuiklearnTheme::$options['mobile_address'] || QuiklearnTheme::$options['mobile_opening'] || QuiklearnTheme::$options['mobile_phone'] || QuiklearnTheme::$options['mobile_email'] ||  QuiklearnTheme::$options['mobile_social'] && $quiklearn_socials ) ? true : false;

?>
<?php if ( $quiklearn_mobile_meta ) { ?>
<div class="mobile-top-bar" id="mobile-top-fix">
	<div class="mobile-top">
		<ul class="mobile-address">
			<?php if ( QuiklearnTheme::$options['mobile_date'] ) { ?>
			<li><i class="icon-quiklearn-calendar"></i><?php echo date_i18n( get_option('date_format') ); ?></li>
			<?php } if ( QuiklearnTheme::$options['mobile_address'] ) { ?>
			<li><i class="icon-quiklearn-location"></i><?php echo wp_kses( QuiklearnTheme::$options['address'] , 'alltext_allow' );?></li>
			<?php } if ( QuiklearnTheme::$options['mobile_opening'] ) { ?>
			<li><i class="icon-quiklearn-clock"></i><span class="opening-label"><?php echo wp_kses( QuiklearnTheme::$options['opening_label'] , 'alltext_allow' );?></span> <?php echo wp_kses( QuiklearnTheme::$options['opening'] , 'alltext_allow' );?></li>
			<?php } if ( QuiklearnTheme::$options['mobile_phone'] ) { ?>
			<li><i class="icon-quiklearn-phone"></i><a href="tel:<?php echo esc_attr( QuiklearnTheme::$options['phone'] );?>"><?php echo wp_kses( QuiklearnTheme::$options['phone'] , 'alltext_allow' );?></a></li>
			<?php } if ( QuiklearnTheme::$options['mobile_email'] ) { ?>
			<li><i class="icon-quiklearn-message"></i><a href="mailto:<?php echo esc_attr( QuiklearnTheme::$options['email'] );?>"><?php echo wp_kses( QuiklearnTheme::$options['email'] , 'alltext_allow' );?></a></li>
			<?php } ?>
		</ul>

		<?php if ( QuiklearnTheme::$options['login_button'] || QuiklearnTheme::$options['signup_button'] || QuiklearnTheme::$options['profile_button'] ) { ?>
			<div class="header-icon-area">					
				<div class="header-login">
					<?php if( ! is_user_logged_in() ) { ?>
						<?php if ( QuiklearnTheme::$options['login_button'] ) { ?>
						<a target="_self" href="<?php echo esc_url( QuiklearnTheme::$options['login_link']  );?>"><?php echo esc_html( QuiklearnTheme::$options['login_text'] );?></a>
						<?php } ?>
						<?php if ( QuiklearnTheme::$options['signup_button'] ) { ?>
						<a target="_self" href="<?php echo esc_url( QuiklearnTheme::$options['signup_link']  );?>"><?php echo esc_html( QuiklearnTheme::$options['signup_text'] );?></a>
						<?php } ?>
					<?php } else { ?>
						<?php if ( QuiklearnTheme::$options['profile_button'] ) { ?>
							<a target="_self" href="<?php echo esc_url( QuiklearnTheme::$options['profile_button_link']  );?>"><?php echo esc_html( QuiklearnTheme::$options['profile_button_text'] );?></a>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		<?php } ?>

		<?php if ( QuiklearnTheme::$options['mobile_social'] && $quiklearn_socials ) { ?>
			<ul class="mobile-social">
				<?php foreach ( $quiklearn_socials as $quiklearn_social ): ?>
					<li><a target="_blank" href="<?php echo esc_url( $quiklearn_social['url'] );?>"><i class="fab <?php echo esc_attr( $quiklearn_social['icon'] );?>"></i></a></li>
				<?php endforeach; ?>
			</ul>
		<?php } ?>
	</div>
</div>
<?php } ?>