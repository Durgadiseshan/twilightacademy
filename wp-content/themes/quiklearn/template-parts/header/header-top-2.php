<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$quiklearn_socials = QuiklearnTheme_Helper::socials();
$container = ( QuiklearnTheme::$header_style == 4 ) ? 'container-custom' : 'container';
?>
<div id="tophead" class="header-top-bar">
	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="top-bar-wrap">
			<div class="topbar-left">
				<ul class="top-address">
					<?php if( QuiklearnTheme::$options['address'] ) { ?>
					<li><i class="icon-quiklearn-location"></i><?php echo wp_kses( QuiklearnTheme::$options['address'] , 'alltext_allow' );?></li>
					<?php } ?>			
				</ul>
				<?php if ( $quiklearn_socials ) { ?>					
					<ul class="tophead-social">
						<?php foreach ( $quiklearn_socials as $quiklearn_social ): ?>
							<li><a target="_blank" aria-label="Social Link" href="<?php echo esc_url( $quiklearn_social['url'] );?>"><i class="fab <?php echo esc_attr( $quiklearn_social['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>
				<?php } ?>
			</div>
			<?php if( QuiklearnTheme::$options['opening'] ) { ?>
			<div class="tophead-right">							
				<i class="icon-quiklearn-clock"></i><span class="label"><?php echo wp_kses( QuiklearnTheme::$options['opening_label'] , 'alltext_allow' );?></span><?php echo wp_kses( QuiklearnTheme::$options['opening'] , 'alltext_allow' );?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>