<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), QuiklearnTheme::$options['search_excerpt_length'], '' );

$quiklearn_has_entry_meta  = ( QuiklearnTheme::$options['blog_author_name'] || QuiklearnTheme::$options['blog_date'] || QuiklearnTheme::$options['blog_cats'] ) ? true : false;

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-1' ); ?>>
	<div class="blog-box">		
		<div class="entry-content">
			<h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<?php if ( $quiklearn_has_entry_meta ) { ?>
			<ul class="entry-meta">				
				<?php if ( QuiklearnTheme::$options['blog_date'] ) { ?>	
				<li class="post-date"><i class="icon-quiklearn-calendar"></i><?php echo get_the_date(); ?></li>
				<?php } if ( QuiklearnTheme::$options['blog_author_name'] ) { ?>
				<li class="post-author"><i class="icon-quiklearn-admin"></i><?php esc_html_e( 'by ', 'quiklearn' );?><?php the_author_posts_link(); ?></li>
				<?php } if ( QuiklearnTheme::$options['blog_cats'] && has_category() ) { ?>
				<li class="entry-categories"><i class="icon-quiklearn-coading"></i><?php echo the_category( ', ' );?></li>
				<?php } ?>
			</ul>
			<?php } ?>			
			<?php if ( QuiklearnTheme::$options['blog_content'] ) { ?>
			<div class="entry-text"><p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p></div>
			<?php } ?>
		</div>
	</div>
</div>