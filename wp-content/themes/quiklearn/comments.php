<?php
if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area single-blog-bottom">
    <?php
		if ( have_comments() ):
		$quiklearn_comment_count = get_comments_number();
		$quiklearn_comments_text = number_format_i18n( $quiklearn_comment_count ) . ' ';
		if ( $quiklearn_comment_count > 1 && $quiklearn_comment_count != 0 ) {
			$quiklearn_comments_text .= esc_html__( 'Comments', 'quiklearn' );
		} else if ( $quiklearn_comment_count == 0 ) {
			$quiklearn_comments_text .= esc_html__( 'Comment', 'quiklearn' );
		} else {
			$quiklearn_comments_text .= esc_html__( 'Comment', 'quiklearn' );
		}
	?>
		<h3><?php echo esc_html( $quiklearn_comments_text );?></h3>
	<?php
		$quiklearn_avatar = get_option( 'show_avatars' );
	?>
		<ul class="comment-list<?php echo empty( $quiklearn_avatar ) ? ' avatar-disabled' : '';?>">
		<?php
			wp_list_comments(
				array(
					'style'             => 'ul',
					'callback'          => 'QuiklearnTheme_Helper::comments_callback',
					'reply_text'        => esc_html__( 'Reply', 'quiklearn' ),
					'avatar_size'       => 110,
					'format'            => 'html5',
				)
			);
		?>
		</ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav class="pagination-area comment-navigation">
				<ul>
					<li><?php previous_comments_link( esc_html__( 'Older Comments', 'quiklearn' ) ); ?></li>
					<li><?php next_comments_link( esc_html__( 'Newer Comments', 'quiklearn' ) ); ?></li>
				</ul>
			</nav>
		<?php endif; ?>
	<?php endif; ?>	

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'quiklearn' ); ?></p>
	<?php endif;?>
	<div>
	<?php		
		$quiklearn_commenter = wp_get_current_commenter();
		$quiklearn_req = get_option( 'require_name_email' );
		$quiklearn_aria_req = ( $quiklearn_req ? " required" : '' );

		$quiklearn_fields =  array(
			'author' =>
			'<div class="row"><div class="col-sm-6"><div class="form-group comment-form-author"><input type="text" id="author" name="author" value="' . esc_attr( $quiklearn_commenter['comment_author'] ) . '" placeholder="'. esc_attr__( 'Name', 'quiklearn' ).( $quiklearn_req ? ' *' : '' ).'" class="form-control"' . $quiklearn_aria_req . '></div></div>',

			'email' =>
			'<div class="col-sm-6 comment-form-email"><div class="form-group"><input id="email" name="email" type="email" value="' . esc_attr(  $quiklearn_commenter['comment_author_email'] ) . '" class="form-control" placeholder="'. esc_attr__( 'Email', 'quiklearn' ).( $quiklearn_req ? ' *' : '' ).'"' . $quiklearn_aria_req . '></div></div></div>',
		);

		$quiklearn_args = array(
			'title_reply'   => esc_html__( 'Write a Review', 'quiklearn' ),
			'class_submit'  => 'submit btn-send ghost-on-hover-btn',
			'submit_field'  => '<div class="form-group form-submit">%1$s %2$s</div>',
			'comment_field' =>  '<div class="form-group comment-form-comment"><textarea id="comment" name="comment" required placeholder="'.esc_attr__( 'Comment *', 'quiklearn' ).'" class="textarea form-control" rows="10" cols="40"></textarea></div>',
			'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
			'title_reply_after' => '</h3>',
			'fields' => apply_filters( 'comment_form_default_fields', $quiklearn_fields ),
		);

	?>
	<?php comment_form( $quiklearn_args );?>
	</div>
</div>