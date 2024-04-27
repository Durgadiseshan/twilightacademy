<?php
function quiklearn_post_share() {

	if( get_post_type() != 'page' ) { 

		$counter      = 0;
		$post_title   = htmlspecialchars( urlencode( html_entity_decode( esc_attr( get_the_title() ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		$share_class  = '';
		$button_class = '';
		$text_class   = '';
		
		# Post link ----------
		$post_link = get_permalink();
		
		# Buttons array ----------
		$share_buttons = array(

			'facebook-f' => array(
				'url'  => 'http://www.facebook.com/sharer.php?u='. $post_link,
				'text' => esc_html__( 'Facebook', 'quiklearn-core' ),
			),

			'twitter' => array(
				'url'   => 'https://twitter.com/intent/tweet?text='. $post_title .'&amp;url='. $post_link, 
				'text'  => esc_html__( 'Twitter', 'quiklearn-core' ),
			),

			'youtube' => array(
				'url'   => 'https://www.youtube.com?text='. $post_title .'&amp;url='. $post_link, 
				'text'  => esc_html__( 'Youtube', 'quiklearn-core' ),
			),

			'linkedin-in' => array(
				'url'   => 'http://www.linkedin.com/shareArticle?mini=true&amp;url='. $post_link .'&amp;title='. $post_title,
				'text'  => esc_html__( 'LinkedIn', 'quiklearn-core' ),
			),
			
			'pinterest-p' => array(
				'url'   => 'http://pinterest.com/pin/create/button/?url='. $post_link .'&amp;description='. $post_title,
				'text'  => esc_html__( 'Pinterest', 'quiklearn-core' ),
			),
			
			'whatsapp' => array(
				'url'   => 'https://api.whatsapp.com/send?text='. $post_title . ' – ' . $post_link ,
				'text'  => esc_html__( 'Whatsapp', 'quiklearn-core' ),
			),

			'cloud' => array(
				'url'   => 'https://cloud.google.com/send?text='. $post_title . ' – ' . $post_link ,
				'text'  => esc_html__( 'Cloud', 'quiklearn-core' ),
				'icon'  => 'fas fa-cloud',
			),

			'dribbble' => array(
				'url'   => 'https://dribbble.com?url='. $post_link .'&amp;title='. $post_title,
				'text'  => esc_html__( 'StumbleUpon', 'quiklearn-core' ),
			),

			'tumblr' => array(
				'url'   => 'http://www.tumblr.com/share/link?url='. $post_link .'&amp;name='. $post_title,
				'text'  => esc_html__( 'Tumblr', 'quiklearn-core' ),
			),

			'reddit' => array(
				'url'   => 'http://reddit.com/submit?url='. $post_link .'&amp;title='. $post_title,
				'text'  => esc_html__( 'Reddit', 'quiklearn-core' ),
			),			
			
			'print' => array(
				'url'   => '#',
				'text'  => esc_html__( 'Print', 'quiklearn-core' ),
				'icon'  => 'fas fa-print',
			),

			'email' => array(
				'url'   => 'mailto:?subject='. $post_title .'&amp;body='. $post_link,
				'text'  => esc_html__( 'Share via Email' , 'quiklearn-core' ),
				'icon'  => 'far fa-envelope',
			),
		);
		
		if ( QuiklearnTheme::$options['post_share_facebook'] == 0 ){
		unset($share_buttons['facebook-f']);
		}
		if ( QuiklearnTheme::$options['post_share_twitter'] == 0 ){
		unset($share_buttons['twitter']);
		}
		if ( QuiklearnTheme::$options['post_share_youtube'] == 0 ){
		unset($share_buttons['youtube']);
		}
		if ( QuiklearnTheme::$options['post_share_linkedin'] == 0 ){
		unset($share_buttons['linkedin-in']);
		}
		if ( QuiklearnTheme::$options['post_share_pinterest'] == 0 ){
		unset($share_buttons['pinterest-p']);
		}
		if ( QuiklearnTheme::$options['post_share_whatsapp'] == 0 ){
		unset($share_buttons['whatsapp']);
		}
		if ( QuiklearnTheme::$options['post_share_cloud'] == 0 ){
		unset($share_buttons['cloud']);
		}
		if ( QuiklearnTheme::$options['post_share_dribbble'] == 0){
		unset($share_buttons['dribbble']);
		}
		if ( QuiklearnTheme::$options['post_share_tumblr'] == 0 ){
		unset($share_buttons['tumblr']);
		}
		if ( QuiklearnTheme::$options['post_share_reddit'] == 0 ){
		unset($share_buttons['reddit']);
		}
		if ( QuiklearnTheme::$options['post_share_print'] == 0 ){
		unset($share_buttons['print']);
		}
		if ( QuiklearnTheme::$options['post_share_email'] == 0 ){
		unset($share_buttons['email']);
		}

		$active_share_buttons = array();

		foreach ( $share_buttons as $network => $button ){
			
			$counter ++;
			$icon = empty( $button['icon'] ) ? 'fab fa-'.$network : $button['icon'];

			# Buttons Style 1 ----------
			if( empty( $share_style )){
				$button_class = '';
				$text_class   = 'screen-reader-text';

				if( $counter <= 2 ){
					$button_class = ' large-share-button';
					$text_class   = 'social-text';
				}
			}

			if( !isset( $button['out_desktop'] )){
				$button['url'] = esc_url( $button['url'] );
			}

			if( $network == 'twitter' ) {
				$network   = 'rttwitter';
			}

			$active_share_buttons[] = '<a href="'. $button['url'] .'" rel="external" target="_blank" class="'. $network.'-share-button' . $button_class .'"><span class="'. $icon .'"></span> <span class="'. $text_class .'">'. $button['text'] .'</span></a>';
		}

		if( is_array( $active_share_buttons ) && ! empty( $active_share_buttons ) ){ ?>
			<div class="share-links <?php echo esc_attr( $share_class ) ?>">
				<?php echo implode( '', $active_share_buttons ); ?>
			</div>
		<?php
		}
		
	}
}


/*course share link*/
function quiklearn_course_share() {
	if( get_post_type() != 'page' ) {
		$counter      = 0;
		$post_title   = htmlspecialchars( urlencode( html_entity_decode( esc_attr( get_the_title() ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		$button_class = '';
		$text_class   = '';
		
		# Post link ----------
		$post_link = get_permalink();
		
		# Buttons array ----------
		$share_buttons = array(
			'facebook-f' => array(
				'url'  => 'http://www.facebook.com/sharer.php?u='. $post_link,
				'text' => esc_html__( 'Facebook', 'quiklearn' ),
			),
			'twitter' => array(
				'url'   => 'https://twitter.com/intent/tweet?text='. $post_title .'&amp;url='. $post_link, 
				'text'  => esc_html__( 'Twitter', 'quiklearn' ),
			),
			'youtube' => array(
				'url'   => 'https://www.youtube.com?text='. $post_title .'&amp;url='. $post_link, 
				'text'  => esc_html__( 'Youtube', 'quiklearn' ),
			),
			'linkedin-in' => array(
				'url'   => 'http://www.linkedin.com/shareArticle?mini=true&amp;url='. $post_link .'&amp;title='. $post_title,
				'text'  => esc_html__( 'LinkedIn', 'quiklearn' ),
			),			
			'pinterest-p' => array(
				'url'   => 'http://pinterest.com/pin/create/button/?url='. $post_link .'&amp;title='. $post_title,
				'text'  => esc_html__( 'Pinterest', 'quiklearn' ),
			),			
			'whatsapp' => array(
				'url'   => 'https://api.whatsapp.com/send?text='. $post_title . ' – ' . $post_link ,
				'text'  => esc_html__( 'Whatsapp', 'quiklearn' ),
			),
			'email' => array(
				'url'   => 'mailto:?subject='. $post_title .'&amp;body='. $post_link,
				'text'  => esc_html__( 'Share via Email' , 'quiklearn' ),
				'icon'  => 'far fa-envelope',
			),
		);
		
		if ( QuiklearnTheme::$options['course_share_facebook'] == 0 ){
		unset($share_buttons['facebook-f']);
		}
		if ( QuiklearnTheme::$options['course_share_twitter'] == 0 ){
		unset($share_buttons['twitter']);
		}
		if ( QuiklearnTheme::$options['course_share_youtube'] == 0 ){
		unset($share_buttons['youtube']);
		}
		if ( QuiklearnTheme::$options['course_share_linkedin'] == 0 ){
		unset($share_buttons['linkedin-in']);
		}
		if ( QuiklearnTheme::$options['course_share_pinterest'] == 0 ){
		unset($share_buttons['pinterest-p']);
		}
		if ( QuiklearnTheme::$options['course_share_whatsapp'] == 0 ){
		unset($share_buttons['whatsapp']);
		}
		if ( QuiklearnTheme::$options['course_share_email'] == 0 ){
		unset($share_buttons['email']);
		}

		$active_share_buttons = array();

		foreach ( $share_buttons as $network => $button ){
			
			$counter ++;
			$icon = empty( $button['icon'] ) ? 'fab fa-'.$network : $button['icon'];

			# Buttons Style 1 ----------
			if( empty( $share_style )){
				$button_class = '';
				$text_class   = 'screen-reader-text';

				if( $counter <= 2 ){
					$button_class = ' share-button';
					$text_class   = 'social-text';
				}
			}

			if( !isset( $button['out_desktop'] )){
				$button['url'] = esc_url( $button['url'] );
			}

			if( $network == 'twitter' ) {
				$network   = 'rttwitter';
			}

			$active_share_buttons[] = '<a href="'. $button['url'] .'" rel="external" target="_blank" class="'. $network.'-share-button' . $button_class .'"><span class="'. $icon .'"></span> <span class="'. $text_class .'">'. $button['text'] .'</span></a>';
		}

		if( is_array( $active_share_buttons ) && ! empty( $active_share_buttons ) ){ ?>
			<span class="course-share-links">
				<?php echo implode( '', $active_share_buttons ); ?>
			</span>
		<?php
		}
		
	}
}
