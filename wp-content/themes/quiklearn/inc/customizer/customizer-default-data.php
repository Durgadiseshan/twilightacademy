<?php
// Customizer Default Data
if ( ! function_exists( 'rttheme_generate_defaults' ) ) {
    function rttheme_generate_defaults() {
        $customizer_defaults = array(

            // General  
            'logo'               	=> '',
            'logo_light'          	=> '',
            'logo_width'            => '',
            'mobile_logo_width'     => '',
			'image_blend'			=> 'normal',			
			'container_width'		=> '1414',
            'preloader'          	=> 0,
            'preloader_image'    	=> '',
			'preloader_bg_color' 	=> '#ffffff',
            'back_to_top'     		=> 1,
            'display_no_preview_image' => 0,

            'sidetext_label'        => '',
            'sidetext'              => '',
            'address_label'         => '',
            'address'               => '',
            'email_label'           => '',
            'email'                 => '',
            'phone_label'           => '',
            'phone'                 => '',
            'opening_label'         => '',
            'opening'               => '',

            // Contact Socials            
            'social_label'   	=> '',
            'social_facebook'  	=> '',
            'social_twitter'   	=> '',
            'social_linkedin'   => '',
            'social_behance' 	=> '',
            'social_dribbble'  	=> '',
            'social_youtube'    => '',
            'social_pinterest'  => '',
            'social_instagram'  => '',
            'social_skype'      => '',
            'social_rss'       	=> '',
            'social_snapchat'   => '',
			
			// Color
			'primary_color' 			=> '',
			'secondary_color' 			=> '',
			'body_color' 				=> '',			
            'body_bg_color'             => '',          
			'menu_color' 				=> '',
			'menu_hover_color' 			=> '',
			'menu_color_tr' 			=> '',			
			'submenu_color' 			=> '',
			'submenu_hover_color' 		=> '',
			'submenu_bgcolor' 			=> '',

			// reading progress bar
			'scroll_indicator_enable' 	=> 0,
			'scroll_indicator_bgcolor' 	=> '',
            'scroll_indicator_bgcolor2' => '',
			'scroll_indicator_height' 	=> '',
			'scroll_indicator_position' => 'top',

            // header
			'top_bar'  					=> 0,
			'top_bar_style'  			=> 1,
			'top_bar_bgcolor'			=> '',
			'top_bar_color'				=> '',
            'top_link_color'            => '',
			'top_hover_color'			=> '',

			'mobile_topbar'  			=> 0,
			'mobile_date'  				=> 1,
            'mobile_address'            => 1,			
            'mobile_opening'            => 1,         
            'mobile_phone'              => 0,         
            'mobile_email'              => 0,         
			'mobile_social'  			=> 0,
			'mobile_search'  			=> 0,
			
            'header_bg_color'           => '',
			'header_opt'       			=> 1,
			'sticky_menu'       		=> 1,
            'tr_header'                 => 0,
            'header_style'      		=> 1,
            'search_icon'      			=> 0,
            'search_filter'             => 0,
            'all_category'              => 1,
            'vertical_menu_icon' 		=> 0,
            'cart_icon' 				=> 0,
            'wishlist_icon' 			=> 0,
            'address_icon'              => 0,
            'phone_icon'                => 0,
            'email_icon'                => 0,
            'opening_icon'              => 0,
            'profile_button'            => 0,
            'profile_button_text'       => esc_html__('My Profile', 'quiklearn'),
            'profile_button_link'       => '#',

            'login_button'              => 0,
            'login_text'                => esc_html__('Login', 'quiklearn'),
            'login_link'                => '#',

            'signup_button'              => 0,
            'signup_text'                => esc_html__('Sign Up', 'quiklearn'),
            'signup_link'                => '#',

			// Footer
            'footer_style'        		=> 1,
            'copyright_text'      		=> '&copy; ' . date('Y') . ' quiklearn. All Rights Reserved by <a target="_blank" rel="nofollow" href="' . QUIKLEARN_AUTHOR_URI . '">RadiusTheme</a>',
			'footer_column_1'			=> 4,
            'footer_column_2'           => 4,
            'footer_column_3'           => 4,
			'footer_area'				=> 1,
            'copyright_area'            => 1,
            'copyright_menu'            => 1,
            'copyright_social'          => 1,
            'logo_display'              => 1,
			'footer_bgtype' 			=> 'fbgcolor',
            'footer_bgtype2'            => 'fbgcolor2',
            'footer_bgtype3'            => 'fbgcolor3',
			'fbgcolor' 					=> '#110e19',
            'fbgcolor2'                 => '#110e19',
            'fbgcolor3'                 => '#ffffff',
			'fbgimg'					=> '',
            'fbgimg2'                   => '',
            'fbgimg3'                   => '',
			'footer_title_color' 		=> '',
			'footer_color' 				=> '',
			'footer_link_color' 		=> '',
			'footer_link_hover_color' 	=> '',
            'footer_logo_light'         => '',
            'copyright_text_color'      => '',
            'copyright_link_color'      => '',
            'copyright_hover_color'     => '',
            'copyright_bg_color'        => '',
            'footer_logo2'              => '',
			
			// Banner 
			'breadcrumb_link_color' 	=> '',
			'breadcrumb_link_hover_color' => '',
			'breadcrumb_active_color' 	=> '',
			'breadcrumb_seperator_color'=> '',
			'banner_bg_opacity' 		=> 0,
			'banner_top_padding'    	=> 100,
            'banner_bottom_padding' 	=> 100,
            'breadcrumb_active' 		=> 0,
            'banner_shape'              => 0,
            'banner_shape1'             => '',
			
			// Post Type Slug
            'service_slug'              => 'service',
            'service_cat_slug'          => 'service-category',     
			
            // Page Layout Setting 
            'page_layout'        => 'full-width',
            'page_sidebar'        => '',
			'page_padding_top'    => 100,
            'page_padding_bottom' => 100,
            'page_banner' => 1,
            'page_breadcrumb' => 0,
            'page_bgtype' => 'bgcolor',
            'page_bgcolor' => '',
            'page_bgimg' => '',
            'page_page_bgimg' => '',
            'page_page_bgcolor' => '',
			
			//Blog Layout Setting 
            'blog_layout' => 'right-sidebar',
            'blog_sidebar'        => '',
			'blog_padding_top'    => 100,
            'blog_padding_bottom' => 100,
            'blog_banner' => 1,
            'blog_breadcrumb' => 0,			
			'blog_bgtype' => 'bgcolor',
            'blog_bgcolor' => '',
            'blog_bgimg' => '',
            'blog_page_bgimg' => '',
            'blog_page_bgcolor' => '',
			
			//Single Post Layout Setting 
			'single_post_layout' => 'right-sidebar',
            'single_post_sidebar'        => '',
			'single_post_padding_top'    => 100,
            'single_post_padding_bottom' => 100,
            'single_post_banner' => 1,
            'single_post_breadcrumb' => 0,			
			'single_post_bgtype' => 'bgcolor',
            'single_post_bgcolor' => '',
            'single_post_bgimg' => '',
            'single_post_page_bgimg' => '',
            'single_post_page_bgcolor' => '',

            //Event Layout Setting 
            'event_archive_layout' => 'full-width',
            'event_archive_sidebar'        => '',
            'event_archive_padding_top'    => 100,
            'event_archive_padding_bottom' => 100,
            'event_archive_banner' => 1,
            'event_archive_breadcrumb' => 0,         
            'event_archive_bgtype' => 'bgcolor',
            'event_archive_bgcolor' => '',
            'event_archive_bgimg' => '',
            'event_archive_page_bgimg' => '',
            'event_archive_page_bgcolor' => '',
            
            //Event Single Layout Setting 
            'event_layout' => 'full-width',
            'event_sidebar'        => '',
            'event_padding_top'    => 100,
            'event_padding_bottom' => 100,
            'event_banner' => 1,
            'event_breadcrumb' => 0,         
            'event_bgtype' => 'bgcolor',
            'event_bgcolor' => '',
            'event_bgimg' => '',
            'event_page_bgimg' => '',
            'event_page_bgcolor' => '',            
			
			//Search Layout Setting 
			'search_layout' => 'right-sidebar',
			'search_padding_top'    => 100,
            'search_padding_bottom' => 100,
            'search_banner' => 1,
            'search_breadcrumb' => 0,			
			'search_bgtype' => 'bgcolor',
            'search_bgcolor' => '',
            'search_bgimg' => '',
            'search_page_bgimg' => '',
            'search_page_bgcolor' => '',
            'search_excerpt_length' => 40,
			
			//Error Layout Setting 
			'error_padding_top'    => 100,
            'error_padding_bottom' => 100,
            'error_banner' => 1,
            'error_breadcrumb' => 0,			
			'error_bgtype' => 'bgcolor',
            'error_bgcolor' => '',
            'error_bgimg' => '',
            'error_page_bgimg' => '',
            'error_page_bgcolor' => '',
			
			//Course Archive Layout Setting 
			'course_layout'         => 'left-sidebar',
            'course_sidebar'         => '',
			'course_padding_top'    => 100,
            'course_padding_bottom' => 100,
            'course_banner'         => 1,
            'course_breadcrumb'     => 0,			
			'course_bgtype'         => 'bgcolor',
            'course_bgcolor'        => '',
            'course_bgimg'          => '',
            'course_page_bgimg'     => '',
            'course_page_bgcolor'   => '',

            'course_style'              => 1,
            'course_archive_cat'        => 1,
            'course_archive_student'    => 1,
            'course_archive_lesson'     => 1,
            'course_archive_level'      => 0,
            'course_archive_duration'   => 0,
            'course_archive_wishlist'   => 0,
            'course_archive_instructor' => 1,
            'course_archive_excerpt'    => 0,
            'course_excerpt_limit'      => 29,
            'course_archive_review'     => 1,
            'course_archive_price'      => 1, 
            'course_archive_feature'    => 0, 

			//Course Single Layout Setting 
            'course_single_layout'          => 'left-sidebar',
            'course_single_sidebar'         => '',
			'course_single_padding_top'     => 100,
            'course_single_padding_bottom'  => 100,
            'course_single_banner'          => 1,
            'course_single_breadcrumb'      => 0,			
			'course_single_bgtype'          => 'bgcolor',
            'course_single_bgcolor'         => '',
            'course_single_bgimg'           => '',
            'course_single_page_bgimg'      => '',
            'course_single_page_bgcolor'    => '',

            'course_meta_ins'               => 1,
            'course_meta_lec'               => 1,
            'course_meta_qz'                => 1,
            'course_meta_stu'               => 1,
            'course_meta_dur'               => 1,
            'course_meta_lev'               => 1,
            'course_meta_update'            => 1,
            'course_meta_tags'              => 1,
            'course_meta_lan'               => 1,
            'course_curriculum'             => 1,
            'course_instructor'             => 1,
            'course_review'                 => 1,
            'course_faqs'                   => 1,
            'course_cats'                   => 1,
            'course_price'                  => 1,
            'course_rating'                 => 1,
            'course_progress'               => 1,
            'course_related'                => 1,
            'course_related_sub_title'      => esc_html__('10,000+ UNIQUE COURSES', 'quiklearn'),
            'course_related_title'          => esc_html__('You May Also Like More Courses', 'quiklearn'),
            'overview_title'                => esc_html__('Course Description', 'quiklearn'),
            'curriculum_title'              => esc_html__('Course Curriculum', 'quiklearn'),
            'instructors_title'             => esc_html__('Your Instructors', 'quiklearn'),
            'extra_info_title'              => esc_html__('Extra Information', 'quiklearn'),
            'course_wishlist'               => 1,
            'course_share'                  => 1,
            'course_share_facebook'         => 1,
            'course_share_twitter'          => 1,
            'course_share_youtube'          => 0,
            'course_share_linkedin'         => 1,
            'course_share_pinterest'        => 0,
            'course_share_whatsapp'         => 1,
            'course_share_email'            => 0,

            // Blog Archive
			'blog_style'				=> 'style1',
            'blog_loadmore'             => 'pagination',
            'load_more_limit'           => 4,            
			'post_banner_title'  		=> '',
			'post_content_limit1'  		=> '120',
            'post_content_limit2'  		=> '20',
			'blog_content'  			=> 1,
			'blog_content2'  			=> 1,
			'blog_date'  				=> 1,
			'blog_author_name'  		=> 1,
			'blog_comment_num'  		=> 0,
			'blog_cats'  				=> 1,
			'blog_view'  				=> 0,
			'blog_length'  				=> 0,
            'blog_video'                => 0,
            'blog_read_more'            => 1,
			'blog_animation'  			=> 'hide',
			'blog_animation_effect'  	=> 'fadeInUp',
			
			// Post
            'post_style'                => 'style1',
			'post_featured_image'		=> 1,
			'post_author_name'			=> 1,
			'post_date'					=> 1,
			'post_comment_num'			=> 1,
			'post_cats'					=> 1,
			'post_tags'					=> 1,
			'post_share'				=> 1,
			'post_links'				=> 0,
			'post_author_bio'			=> 0,
			'post_view'					=> 0,
			'post_length'				=> 0,
			'post_published'			=> 0,
			'show_related_post'			=> 0,
			'show_related_post_number'	=> 5,
			'related_title'				=> esc_html__('You May Also Like', 'quiklearn'),
			'show_related_post_title_limit'	=> 8,
			'related_post_query'		=> 'cat',
			'related_post_sort'			=> 'recent',
			'post_time_format'			=> 'modern',
			
			// Post Share
			'post_share_facebook' 		=> 1,
			'post_share_twitter' 		=> 1,
			'post_share_youtube' 		=> 1,
			'post_share_linkedin' 		=> 1,
			'post_share_pinterest' 		=> 1,
			'post_share_whatsapp' 		=> 0,
			'post_share_cloud' 			=> 0,
			'post_share_dribbble' 		=> 0,
			'post_share_tumblr' 		=> 0,
			'post_share_reddit' 		=> 0,
			'post_share_email' 			=> 0,
			'post_share_print' 			=> 0,
            
            // Event            
            'event_ar_cat'              => 1,
            'event_ar_date'             => 1,
            'event_ar_location'         => 1,
            'event_ar_price'            => 1,
            'event_ar_search'           => 1,
            'event_ar_excerpt'          => 0,
            'event_content_limit'       => 14,
            'single_event_related'      => 1,

            //Shop Archive Layout Setting 
			'shop_layout' => 'right-sidebar',
            'shop_sidebar'        => '',
			'shop_padding_top'    => 100,
            'shop_padding_bottom' => 100,
            'shop_banner' => 1,
            'shop_breadcrumb' => 0,			
			'shop_bgtype' => 'bgcolor',
            'shop_bgcolor' => '',
            'shop_bgimg' => '',
            'shop_page_bgimg' => '',
            'shop_page_bgcolor' => '',

            'products_cols_width' => 4,
			'products_per_page' => 12,
			'wc_shop_cart_icon' => 1,
			'wc_shop_quickview_icon' => 0,
			'wc_shop_compare_icon' => 1,
            'wc_shop_wishlist_icon' => 1,
            'wc_shop_sale_flash' => 0,
			'wc_shop_rating' => 1,
			
			//Product Single Layout Setting 
			'product_layout' => 'full-width',
            'product_sidebar'        => '',
			'product_padding_top'    => 100,
            'product_padding_bottom' => 100,
            'product_banner' => 1,
            'product_breadcrumb' => 0,			
			'product_bgtype' => 'bgcolor',
            'product_bgcolor' => '',
            'product_bgimg' => '',
            'product_page_bgimg' => '',
            'product_page_bgcolor' => '',

            'wc_product_meta' => 1,
            'wc_product_wishlist_icon' => 1,
            'wc_product_compare_icon' => 1,
			'related_woo_product' => 1,
			'related_product_title' => esc_html__('Related Products', 'quiklearn'),
			
            // Error
            'error_bodybg_color' 		=> '',
            'error_text1_color' 		=> '',
            'error_text2_color' 		=> '',
			'error_image' 				=> '',
            'error_text1' 				=> esc_html__('Oops... Page Not Found!', 'quiklearn'),
            'error_text2' 				=> esc_html__('Sorry! This Page Is Not Available!', 'quiklearn'),
            'error_buttontext' 			=> esc_html__('Go Back To Home Page', 'quiklearn'),
            'error_animation' 			=> 'hide',
            'error_animation_effect' 	=> 'fadeInUp',
            
            // Typography
            'typo_body' => json_encode(
                array(
                    'font' => 'Outfit',
                    'regularweight' => '400',
                )
            ),
            'typo_body_size' => '16px',
            'typo_body_height'=> '28px',

            //Menu Typography
            'typo_menu' => json_encode(
                array(
                    'font' => 'Outfit',
                    'regularweight' => '500',
                )
            ),
            'typo_menu_size' => '16px',
            'typo_menu_height'=> '22px',

            //Sub Menu Typography
            'typo_sub_menu' => json_encode(
                array(
                    'font' => 'Outfit',
                    'regularweight' => '400',
                )
            ),
            'typo_submenu_size' => '15px',
            'typo_submenu_height'=> '22px',


            // Heading Typography
            'typo_heading' => json_encode(
                array(
                    'font' => 'Outfit',
                    'regularweight' => '600',
                )
            ),
            //H1
            'typo_h1' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h1_size' => '44px',
            'typo_h1_height' => '54px',

            //H2
            'typo_h2' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h2_size' => '36px',
            'typo_h2_height'=> '42px',

            //H3
            'typo_h3' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h3_size' => '28px',
            'typo_h3_height'=> '36px',

            //H4
            'typo_h4' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h4_size' => '22px',
            'typo_h4_height'=> '28px',

            //H5
            'typo_h5' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h5_size' => '18px',
            'typo_h5_height'=> '24px',

            //H6
            'typo_h6' => json_encode(
                array(
                    'font' => '',
                    'regularweight' => '600',
                )
            ),
            'typo_h6_size' => '14px',
            'typo_h6_height'=> '18px',

            
        );

        return apply_filters( 'rttheme_customizer_defaults', $customizer_defaults );
    }
}