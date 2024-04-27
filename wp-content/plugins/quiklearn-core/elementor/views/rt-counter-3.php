<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Niftric_Core;
extract($data);

?>
<div class="rt-counter-box rt-counter-<?php echo esc_attr( $data['style'] );?>">
	<div class="rt-item <?php echo esc_attr( $data['animation'] ); ?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
		<div class="rt-content">			
			<div class="rt-counter">
				<h3 class="counter-number"><span class="counter" data-num="<?php echo esc_attr( $data['number'] );?>" data-rtspeed="<?php echo esc_attr( $data['speed'] );?>" data-rtsteps="<?php echo esc_attr( $data['steps'] );?>"><?php echo esc_html( $data['number'] );?></span><?php if( $data['after_text'] ) { ?><span class="counter-unit"><?php echo esc_html( $data['after_text'] );?></span><?php } ?></h3>
			</div>	
			<h4 class="rt-title"><?php echo esc_html( $data['title'] );?></h4>		
		</div>
	</div>
</div>
