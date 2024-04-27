<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
$container = ( QuiklearnTheme::$header_style == 4 ) ? 'container-custom' : 'container';
?>
<div id="tophead" class="header-top-bar">
	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="top-bar-wrap">
			<div class="topbar-left">
				<ul class="top-address">
					<?php if( QuiklearnTheme::$options['address'] ) { ?>
					<li><i class="icon-quiklearn-location"></i><?php echo wp_kses( QuiklearnTheme::$options['address'] , 'alltext_allow' );?></li>
					<?php } if( QuiklearnTheme::$options['phone'] ) { ?>
					<li><i class="icon-quiklearn-phone"></i><span class="label"><?php echo wp_kses( QuiklearnTheme::$options['phone_label'] , 'alltext_allow' );?></span><a href="tel:<?php echo esc_attr( QuiklearnTheme::$options['phone'] );?>"><?php echo wp_kses( QuiklearnTheme::$options['phone'] , 'alltext_allow' );?></a></li>
					<?php } if( QuiklearnTheme::$options['email'] ) { ?>
					<li><i class="icon-quiklearn-message"></i><span class="label"><?php echo wp_kses( QuiklearnTheme::$options['email_label'] , 'alltext_allow' );?></span><a href="mailto:<?php echo esc_attr( QuiklearnTheme::$options['email'] );?>"><?php echo wp_kses( QuiklearnTheme::$options['email'] , 'alltext_allow' );?></a></li>
					<?php } ?>
				</ul>
			</div>
			<?php if( QuiklearnTheme::$options['opening'] ) { ?>
			<div class="tophead-right">							
				<i class="icon-quiklearn-clock"></i><span class="label"><?php echo wp_kses( QuiklearnTheme::$options['opening_label'] , 'alltext_allow' );?></span><?php echo wp_kses( QuiklearnTheme::$options['opening'] , 'alltext_allow' );?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>