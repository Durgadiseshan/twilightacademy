<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'quiklearn-size1';

$quiklearn_has_entry_meta  = ( QuiklearnTheme::$options['blog_author_name'] || QuiklearnTheme::$options['blog_date'] || QuiklearnTheme::$options['blog_comment_num'] || QuiklearnTheme::$options['blog_length'] && function_exists( 'quiklearn_reading_time' ) || QuiklearnTheme::$options['blog_view'] && function_exists( 'quiklearn_views' ) ) ? true : false;

$quiklearn_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$quiklearn_time_html       = apply_filters( 'quiklearn_single_time', $quiklearn_time_html );

$quiklearn_comments_number = number_format_i18n( get_comments_number() );
$quiklearn_comments_html = $quiklearn_comments_number == 1 ? esc_html__( 'Comment' , 'quiklearn' ) : esc_html__( 'Comments' , 'quiklearn' );
$quiklearn_comments_html = '<span class="comment-number">'. $quiklearn_comments_number .'</span> ' . $quiklearn_comments_html;

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( QuiklearnTheme::$options['post_content_limit1'], $content );
$content = wp_trim_words( get_the_excerpt(), QuiklearnTheme::$options['post_content_limit1'], '.' );

$youtube_link = get_post_meta( get_the_ID(), 'quiklearn_youtube_link', true );

$wow = QuiklearnTheme::$options['blog_animation'];
$effect = QuiklearnTheme::$options['blog_animation_effect'];

$img_class = empty(has_post_thumbnail() ) ? 'no-image' : 'show-image';
$preview = QuiklearnTheme::$options['display_no_preview_image'] == '1' ? 'show-preview' : 'no-preview';

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( "blog-layout-1 " . $wow . ' ' . $effect ); ?> data-wow-duration="1.5s">
	<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
		<div class="blog-img-holder">
			<div class="blog-img">
				<?php
				$swiper_data=array(
					'slidesPerView' 	=>1,
					'centeredSlides'	=>false,
					'loop'				=>true,
					'spaceBetween'		=>20,
					'slideToClickedSlide' =>true,
					'slidesPerGroup' => 1,
					'autoplay'				=>array(
						'delay'  => 1,
					),
					'speed'      =>500,
					'breakpoints' =>array(
						'0'    =>array('slidesPerView' =>1),
						'576'    =>array('slidesPerView' =>1),
						'768'    =>array('slidesPerView' =>1),
						'992'    =>array('slidesPerView' =>1),
						'1200'    =>array('slidesPerView' =>1),				
						'1600'    =>array('slidesPerView' =>1)				
					),
					'auto'   =>false
				);

				$swiper_data = json_encode( $swiper_data );
				$quiklearn_post_gallerys_raw = get_post_meta( get_the_ID(), 'quiklearn_post_gallery', true );
				$quiklearn_post_gallerys = explode( "," , $quiklearn_post_gallerys_raw );
					if ( !empty( $quiklearn_post_gallerys_raw ) && 'gallery' == get_post_format( $id ) ) { ?>
						<div class="rt-swiper-slider blog-post-slider rt-swiper-nav" data-xld = '<?php echo esc_attr( $swiper_data ); ?>'>
							<div class="swiper-wrapper">
								<?php foreach( $quiklearn_post_gallerys as $quiklearn_posts_gallery ) { ?>
								<div class="swiper-slide">
									<?php echo wp_get_attachment_image( $quiklearn_posts_gallery, $thumb_size, "", array( "class" => "img-responsive" ) );
									?>
								</div>
								<?php } ?>
							</div>
							<div class="swiper-navigation">
					            <div class="swiper-button-prev"><i class="icon-quiklearn-left-arrow"></i></div>
					            <div class="swiper-button-next"><i class="icon-quiklearn-right-arrow"></i></div>
					        </div>
						</div>
					<?php } else { ?>
					<?php if ( QuiklearnTheme::$options['blog_video'] && ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) && ( !empty( has_post_thumbnail() ) ) ) { ?>
							<div class="rt-video"><a class="rt-play play-btn-white rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
						<?php } ?>
						<a href="<?php the_permalink(); ?>" class="img-opacity-hover"><?php if ( has_post_thumbnail() ) { ?>
							<?php the_post_thumbnail( $thumb_size, ['class' => 'img-responsive'] ); ?>
							<?php } else {
								if ( QuiklearnTheme::$options['display_no_preview_image'] == '1' ) {
									if ( !empty( QuiklearnTheme::$options['no_preview_image']['id'] ) ) {
										$thumbnail = wp_get_attachment_image( QuiklearnTheme::$options['no_preview_image']['id'], $thumb_size );						
									}
									elseif ( empty( QuiklearnTheme::$options['no_preview_image']['id'] ) ) {
										$thumbnail = '<img class="wp-post-image" src="'.QUIKLEARN_ASSETS_URL.'img/noimage_1296X690.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
									}
									echo wp_kses( $thumbnail , 'alltext_allow' );
								}
							}
						?>
						</a>
				<?php } ?>
			</div>				
		</div>
		<div class="entry-content">
			<?php if ( QuiklearnTheme::$options['blog_video'] && ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) && ( empty( has_post_thumbnail() ) ) ) { ?>
				<div class="rt-video"><a class="rt-play play-btn-white rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
			<?php } ?>
			<?php if ( QuiklearnTheme::$options['blog_cats'] ) { ?>
				<div class="entry-category"><?php echo the_category( ', ' );?></div>
			<?php } ?>
			<h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<?php if ( $quiklearn_has_entry_meta ) { ?>
			<ul class="entry-meta">							
				<?php if ( QuiklearnTheme::$options['blog_date'] ) { ?>	
				<li class="post-date"><i class="icon-quiklearn-calendar"></i><?php echo get_the_date(); ?></li>	
				<?php } if ( QuiklearnTheme::$options['blog_author_name'] ) { ?>
				<li class="post-author"><i class="icon-quiklearn-admin"></i><?php esc_html_e( 'by ', 'quiklearn' );?><?php the_author_posts_link(); ?></li>				
				<?php } if ( QuiklearnTheme::$options['blog_comment_num'] ) { ?>
				<li class="post-comment"><i class="fa-regular fa-message"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $quiklearn_comments_html , 'alltext_allow' );?></a></li>
				<?php } if ( QuiklearnTheme::$options['blog_length'] && function_exists( 'quiklearn_reading_time' ) ) { ?>
				<li class="post-reading-time meta-item"><i class="icon-quiklearn-clock"></i><?php echo quiklearn_reading_time(); ?></li>
				<?php } if ( QuiklearnTheme::$options['blog_view'] && function_exists( 'quiklearn_views' ) ) { ?>
				<li><i class="fa-regular fa-eye"></i><span class="post-views meta-item "><?php echo quiklearn_views(); ?></span></li>
				<?php } ?>
			</ul>
			<?php } ?>			
			<?php if ( QuiklearnTheme::$options['blog_content'] ) { ?>
			<div class="entry-text"><p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p></div>
			<?php } ?>	
			<?php if ( QuiklearnTheme::$options['blog_read_more'] ) { ?>
			<div class="post-read-more"><a class="button-style-3 btn-common" href="<?php the_permalink();?>"><?php esc_html_e( 'Continue Reading', 'quiklearn' );?><i class="icon-quiklearn-right-arrow"></i></a>
          	</div>	
          	<?php } ?>
		</div>
	</div>
</div>