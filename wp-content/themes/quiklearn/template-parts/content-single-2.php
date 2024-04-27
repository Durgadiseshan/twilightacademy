<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$quiklearn_has_entry_meta  = ( QuiklearnTheme::$options['post_date'] || QuiklearnTheme::$options['post_author_name'] || QuiklearnTheme::$options['post_cats'] || QuiklearnTheme::$options['post_comment_num'] || ( QuiklearnTheme::$options['post_length'] && function_exists( 'quiklearn_reading_time' ) ) || QuiklearnTheme::$options['post_published'] && function_exists( 'quiklearn_get_time' ) || ( QuiklearnTheme::$options['post_view'] && function_exists( 'quiklearn_views' ) ) ) ? true : false;

$quiklearn_comments_number = number_format_i18n( get_comments_number() );
$quiklearn_comments_html = $quiklearn_comments_number == 1 ? esc_html__( 'Comment' , 'quiklearn' ) : esc_html__( 'Comments' , 'quiklearn' );
$quiklearn_comments_html = '<span class="comment-number">'. $quiklearn_comments_number .'</span> '. $quiklearn_comments_html;
$quiklearn_author_bio = get_the_author_meta( 'description' );

$quiklearn_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$quiklearn_time_html       = apply_filters( 'quiklearn_single_time', $quiklearn_time_html );

$author = $post->post_author;

$news_author_fb = get_user_meta( $author, 'quiklearn_facebook', true );
$news_author_tw = get_user_meta( $author, 'quiklearn_twitter', true );
$news_author_ld = get_user_meta( $author, 'quiklearn_linkedin', true );
$news_author_pr = get_user_meta( $author, 'quiklearn_pinterest', true );
$news_author_ins = get_user_meta( $author, 'quiklearn_instagram', true );
$quiklearn_author_designation = get_user_meta( $author, 'quiklearn_author_designation', true );

$youtube_link = get_post_meta( get_the_ID(), 'quiklearn_youtube_link', true );

$img_class = empty(has_post_thumbnail() ) ? 'no-image' : 'show-image';

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
				<div class="rt-swiper-slider single-post-slider rt-swiper-nav" data-xld = '<?php echo esc_attr( $swiper_data ); ?>'>
					<div class="swiper-wrapper">
						<?php foreach( $quiklearn_post_gallerys as $quiklearn_posts_gallery ) { ?>
						<div class="swiper-slide">
							<?php echo wp_get_attachment_image( $quiklearn_posts_gallery, 'quiklearn-size1', "", array( "class" => "img-responsive" ) );
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
			<?php if ( has_post_thumbnail() && ( QuiklearnTheme::$options['post_featured_image'] == true ) ) { ?>
				<div class="entry-thumbnail-area <?php echo esc_attr($img_class); ?>">
					<?php if ( QuiklearnTheme::$options['post_featured_image'] == true ) { ?>
					<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( 'quiklearn-size1' , ['class' => 'img-responsive'] ); ?><?php } ?><?php } ?>
					<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
						<div class="rt-video"><a class="rt-play play-btn-white rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
					<?php } ?>				
				</div>
			<?php } ?>
		<?php } ?>

	<div class="main-wrap">
		<div class="entry-header">
			<?php if ( QuiklearnTheme::$options['blog_video'] && ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) && ( empty( has_post_thumbnail() ) ) ) { ?>
				<div class="rt-video"><a class="rt-play play-btn-white rt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
			<?php } ?>
			<h1 class="entry-title"><?php the_title();?></h1>
			<?php if ( $quiklearn_has_entry_meta ) { ?>
			<ul class="entry-meta">		
				<?php if ( QuiklearnTheme::$options['post_author_name'] ) { ?>
				<li class="item-author">
				<?php
					if ( QuiklearnTheme::$options['post_author_name'] == '1' ) {
						echo get_avatar( get_the_author_meta( 'ID', $author ), 35, null, get_the_author_meta('display_name', $author) );
						echo esc_html__( '-by ', 'quiklearn' );						
						printf('<a href="%1$s"><span class="vcard author author_name"><span class="fn">%2$s</span></span></a>',
						esc_url( get_author_posts_url( get_the_author_meta('ID', $author) ) ),
						get_the_author_meta('display_name', $author));
					}
				?>
				</li>
				<?php } if ( QuiklearnTheme::$options['post_date'] ) { ?>	
				<li><i class="icon-quiklearn-calendar"></i><?php echo get_the_date(); ?></li>
				<?php } if ( QuiklearnTheme::$options['post_cats'] ) { ?>
				<li><i class="icon-quiklearn-coading"></i><?php echo the_category( ', ' );?></li>
				<?php } if ( QuiklearnTheme::$options['post_comment_num'] ) { ?>
				<li><i class="fa-regular fa-message"></i><?php echo wp_kses( $quiklearn_comments_html , 'alltext_allow' ); ?></li>
				<?php } if ( QuiklearnTheme::$options['post_length'] && function_exists( 'quiklearn_reading_time' ) ) { ?>
				<li class="meta-reading-time meta-item"><i class="icon-quiklearn-clock"></i><?php echo quiklearn_reading_time(); ?></li>
				<?php } if ( QuiklearnTheme::$options['post_view'] && function_exists( 'quiklearn_views' ) ) { ?>
				<li><span class="meta-views meta-item "><i class="fa-regular fa-eye"></i><?php echo quiklearn_views(); ?></span></li>
				<?php } if ( QuiklearnTheme::$options['post_published'] && function_exists( 'quiklearn_get_time' ) ) { ?>	
				<li><i class="fa-regular fa-calendar"></i><?php echo quiklearn_get_time(); ?></li>
				<?php } ?>
			</ul>
			<?php } ?>			
		</div>
		<div class="entry-content rt-single-content"><?php the_content();?>
			<?php wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'quiklearn' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) ); ?>
		</div>
		<?php if ( ( QuiklearnTheme::$options['post_tags'] && has_tag() ) || ( QuiklearnTheme::$options['post_share']  && ( function_exists( 'quiklearn_post_share' ) ) ) ) { ?>
		<div class="entry-footer">
			<div class="entry-footer-meta">
				<?php if ( QuiklearnTheme::$options['post_tags'] && has_tag() ) { ?>
				<div class="meta-tags">
					<h3 class="meta-title"><?php esc_html_e( 'Tags:', 'quiklearn' );?></h3><?php echo get_the_term_list( $post->ID, 'post_tag', '' ); ?>
				</div>	
				<?php } if ( ( QuiklearnTheme::$options['post_share'] ) && ( function_exists( 'quiklearn_post_share' ) ) ) { ?>
				<div class="post-share"><h3 class="meta-title"><?php esc_html_e( 'Share:', 'quiklearn' );?></h3><?php quiklearn_post_share(); ?></div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>
		<!-- author bio -->
		<?php if ( QuiklearnTheme::$options['post_author_bio'] == '1' ) { ?>
			<?php if ( !empty ( $quiklearn_author_bio ) ) { ?>
			<div class="media about-author">
				<div class="author-avatar">
					<?php echo get_avatar( $author, 110 ); ?>
				</div>
				<div class="media-body">
					<div class="about-author-info">
						<h3 class="author-title"><?php the_author_posts_link();?></h3>
						<div class="author-designation"><?php if ( !empty ( $quiklearn_author_designation ) ) {	echo esc_html( $quiklearn_author_designation ); } else {	$user_info = get_userdata( $author ); echo esc_html ( implode( ', ', $user_info->roles ) );	} ?></div>
					</div>
					<?php if ( $quiklearn_author_bio ) { ?>
					<div class="author-bio"><?php echo esc_html( $quiklearn_author_bio );?></div>
					<?php } ?>
					<ul class="author-box-social">
						<?php if ( ! empty( $news_author_fb ) ){ ?><li><a href="<?php echo esc_attr( $news_author_fb ); ?>"><i class="fab fa-facebook-f"></i></a></li><?php } ?>
						<?php if ( ! empty( $news_author_tw ) ){ ?><li><a href="<?php echo esc_attr( $news_author_tw ); ?>"><i class="fab fa-twitter"></i></a></li><?php } ?>
						<?php if ( ! empty( $news_author_ld ) ){ ?><li><a href="<?php echo esc_attr( $news_author_ld ); ?>"><i class="fab fa-linkedin-in"></i></a></li><?php } ?>
						<?php if ( ! empty( $news_author_pr ) ){ ?><li><a href="<?php echo esc_attr( $news_author_pr ); ?>"><i class="fab fa-pinterest-p"></i></a></li><?php } ?>
						<?php if ( ! empty( $news_author_ins ) ){ ?><li><a href="<?php echo esc_url( $news_author_ins ); ?>"><i class="fab fa-instagram"></i></a></li><?php } ?>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<?php } ?>
		<?php } ?>
		<!-- next/prev post -->
		<?php if ( QuiklearnTheme::$options['post_links'] ) { quiklearn_post_links_next_prev(); } ?>
		<!-- related post -->
		<?php if( QuiklearnTheme::$options['show_related_post'] == '1' && is_single() && !empty ( quiklearn_related_post() ) ) { ?>
			<div class="related-post">
				<?php quiklearn_related_post(); ?>
			</div>
		<?php } ?>	
		<?php
		if ( comments_open() || get_comments_number() ){
			comments_template();
		}
		?>	
	</div>
</div>