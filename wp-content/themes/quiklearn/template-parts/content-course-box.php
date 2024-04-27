<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$rdtheme_thumbnail = !empty( $rdtheme_thumbnail ) ? $rdtheme_thumbnail : 'quiklearn-size3';
?>
<div <?php post_class( 'rt-course-box' ) ; ?>>
	<div class="rtin-thumbnail hvr-bounce-to-right">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( $rdtheme_thumbnail ); ?></a>
	</div>
	<div class="rtin-content-wrap">
		<div class="rtin-content">
			<h3 class="rtin-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
			<?php if ( !empty( $rdtheme_content ) ): ?>
				<div class="rtin-description"><?php echo wp_kses_post( get_the_excerpt() ); ?></div>
			<?php endif; ?>
		</div>
	</div>
	<div class="clear"></div>
</div>