<li>
    <div class="review-author"><?php echo get_avatar( $review->user_email ); ?></div>
    <div class="review-text">
        <h3 class="user-name"><?php echo esc_html( $review->display_name ); ?></h3>
        <div class="review-meta clearfix">
            <h4 class="review-title"><?php echo esc_html( $review->title ); ?></h4> 
            <?php learn_press_get_template( 'rating-stars.php',[ 'rated' => $course_rate ], learn_press_template_path() . '/addons/course-review/', LP_ADDON_COURSE_REVIEW_TMPL );?>
        </div>
        <div class="review-content"><?php echo wp_kses_post( $review->content ); ?></div>
    </div>
</li>