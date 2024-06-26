<?php

if ( class_exists( 'WP_Customize_Control' ) ) {

    /* Header action button */
    if (!function_exists('rttheme_is_post_indicator_enabled')) {
        function rttheme_is_post_indicator_enabled()
        {
            $scroll_indicator_enable = get_theme_mod('scroll_indicator_enable');
            if (empty($scroll_indicator_enable)) {
                return false;
            }
            return true;
        }
    }

    /* Header action button */
    if (!function_exists('rttheme_is_button_enabled')) {
        function rttheme_is_button_enabled()
        {
            $profile_button = get_theme_mod('profile_button');
            if (empty($profile_button)) {
                return false;
            }
            return true;
        }
    }

    /* Header action login */
    if (!function_exists('rttheme_is_header_login_enabled')) {
        function rttheme_is_header_login_enabled()
        {
            $login_button = get_theme_mod('login_button');
            if (empty($login_button)) {
                return false;
            }
            return true;
        }
    }

    /* Header action signup */
    if (!function_exists('rttheme_is_header_signup_enabled')) {
        function rttheme_is_header_signup_enabled()
        {
            $signup_button = get_theme_mod('signup_button');
            if (empty($signup_button)) {
                return false;
            }
            return true;
        }
    }
	
	/* Related post action button */
    if (!function_exists('rttheme_is_related_post_enabled')) {
        function rttheme_is_related_post_enabled()
        {
            $show_related_post = get_theme_mod('show_related_post');
            if (empty($show_related_post)) {
                return false;
            }
            return true;
        }
    }
	
	/* Check is Enabled Preloader */
    if (!function_exists('rttheme_is_preloader_enabled')) {
        function rttheme_is_preloader_enabled()
        {
            $preloader = get_theme_mod('preloader');
            if (empty($preloader)) {
                return false;
            }
            return true;
        }
    }

    /* Topbar check is enabled */
    if (!function_exists('rttheme_is_topbar_enabled')) {
        function rttheme_is_topbar_enabled()
        {
            $top_bar = get_theme_mod('top_bar');
            if (empty($top_bar)) {
                return false;
            }
            return true;
        }
    }

    /* Banner shape check is enabled */
    if (!function_exists('rttheme_is_banner_shape_enabled')) {
        function rttheme_is_banner_shape_enabled()
        {
            $banner_shape = get_theme_mod('banner_shape');
            if (empty($banner_shape)) {
                return false;
            }
            return true;
        }
    }  

    /* Woo related option */
    if (!function_exists('rttheme_is_related_woo_enabled')) {
        function rttheme_is_related_woo_enabled()
        {
            $related_woo_product = get_theme_mod('related_woo_product');
            if (empty($related_woo_product)) {
                return false;
            }
            return true;
        }
    }

	/* = Page Layout
    ==========================================================*/
	/**
     * Check is Enabled Header Button
     */
    if ( ! function_exists( 'rttheme_is_header_banner_enabled' ) ) {
        function rttheme_is_header_banner_enabled() {
            $page_banner = get_theme_mod('page_banner');
            if (empty($page_banner)) {
                return false;
            }
            return true;
        }
    }

	/**
     * Check is selected banner background type is image
     */
    if ( ! function_exists( 'rttheme_banner_bgimg_type_condition' ) ) {
        function rttheme_banner_bgimg_type_condition() {
            $BgType = get_theme_mod('page_bgtype');
            if ( $BgType === 'bgimg' ) {
                return true;
            }
            return false;
        }
    }
    /**
     * Check is selected banner background type is color
     */
    if ( ! function_exists( 'rttheme_banner_bgcolor_type_condition' ) ) {
        function rttheme_banner_bgcolor_type_condition() {
            $checkbox_value = get_theme_mod( 'page_banner', false );
            $select_value   = get_theme_mod( 'page_bgtype', 'bgcolor' );
            if ( !empty( $checkbox_value ) && $select_value == 'bgcolor' ) {
                return true;
            }
            return false;
        }
    }

    /* = Single Page Layout
    ==========================================================*/
    if ( ! function_exists( 'rttheme_is_single_post_banner_enabled' ) ) {
        function rttheme_is_single_post_banner_enabled() {
            $page_banner = get_theme_mod('single_post_banner');
            if (empty($page_banner)) {
                return false;
            }
            return true;
        }
    }

	/**
     * Check is selected banner background type is image
     */
    if ( ! function_exists( 'rttheme_single_banner_bgimg_type_condition' ) ) {
        function rttheme_single_banner_bgimg_type_condition() {
            $BgType = get_theme_mod('single_post_banner_bg_type');
            if ( $BgType === 'bgimg' ) {
                return true;
            }
            return false;
        }
    }
    /**
     * Check is selected banner background type is color
     */
    if ( ! function_exists( 'rttheme_single_banner_bgcolor_type_condition' ) ) {
        function rttheme_single_banner_bgcolor_type_condition() {
            $select_value = get_theme_mod( 'single_post_banner', false );
            $select_bg_value = get_theme_mod( 'single_post_banner_bg_type', 'bgcolor' );
            if ( !empty( $select_value ) && $select_bg_value == 'bgcolor' ) {
                return true;
            }
            return false;
        }
    }

    /* LP Course related option */
    if (!function_exists('rttheme_is_related_course_enabled')) {
        function rttheme_is_related_course_enabled() {
            $course_related = get_theme_mod('course_related');
            if (empty($course_related)) {
                return false;
            }
            return true;
        }
    }

    /* LP Course share option */
    if (!function_exists('rttheme_is_course_share_enabled')) {
        function rttheme_is_course_share_enabled() {
            $course_share = get_theme_mod('course_share');
            if (empty($course_share)) {
                return false;
            }
            return true;
        }
    }

    /* LP Course excerpt option */
    if (!function_exists('rttheme_is_course_excerpt_enabled')) {
        function rttheme_is_course_excerpt_enabled() {
            $course_archive_excerpt = get_theme_mod('course_archive_excerpt');
            if (empty($course_archive_excerpt)) {
                return false;
            }
            return true;
        }
    }

    /* Event excerpt option */
    if (!function_exists('rttheme_is_event_excerpt_enabled')) {
        function rttheme_is_event_excerpt_enabled() {
            $event_ar_excerpt = get_theme_mod('event_ar_excerpt');
            if (empty($event_ar_excerpt)) {
                return false;
            }
            return true;
        }
    }

    /*Footer 1 check is enabled option*/
    if ( ! function_exists( 'rttheme_is_footer1_enabled' ) ) {
        function rttheme_is_footer1_enabled() {
            $footer_style = get_theme_mod( 'footer_style', '1' );
            if ( $footer_style == 1 ) {
                return true;
            }
            return false;
        }
    }
    /*Footer 2 check is enabled option*/
    if ( ! function_exists( 'rttheme_is_footer2_enabled' ) ) {
        function rttheme_is_footer2_enabled() {
            $footer_style = get_theme_mod( 'footer_style', '2' );
            if ( $footer_style == 2 ) {
                return true;
            }
            return false;
        }
    }
    /*Footer 3 check is enabled option*/
    if ( ! function_exists( 'rttheme_is_footer3_enabled' ) ) {
        function rttheme_is_footer3_enabled() {
            $footer_style = get_theme_mod( 'footer_style', '3' );
            if ( $footer_style == 3 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 1 bg color & image check enabled option*/
	if ( ! function_exists( 'rttheme_footer1_bgimg_type_condition' ) ) {
        function rttheme_footer1_bgimg_type_condition() {
            $BgType = get_theme_mod('footer_bgtype');
            $fstyle1 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgimg' && $fstyle1 == 1 ) {
                return true;
            }
            return false;
        }
    }
	if ( ! function_exists( 'rttheme_footer1_bgcolor_type_condition' ) ) {
        function rttheme_footer1_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer_bgtype');
            $fstyle1 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgcolor' && $fstyle1 == 1 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 2 bg color & image check enabled option*/
    if ( ! function_exists( 'rttheme_footer2_bgimg_type_condition' ) ) {
        function rttheme_footer2_bgimg_type_condition() {
            $BgType = get_theme_mod('footer_bgtype2');
            $fstyle2 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgimg2' && $fstyle2 == 2 ) {
                return true;
            }
            return false;
        }
    }
    if ( ! function_exists( 'rttheme_footer2_bgcolor_type_condition' ) ) {
        function rttheme_footer2_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer_bgtype2');
            $fstyle2 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgcolor2' && $fstyle2 == 2 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 3 bg color & image check enabled option*/
    if ( ! function_exists( 'rttheme_footer3_bgimg_type_condition' ) ) {
        function rttheme_footer3_bgimg_type_condition() {
            $BgType = get_theme_mod('footer_bgtype3');
            $fstyle3 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgimg3' && $fstyle3 == 3 ) {
                return true;
            }
            return false;
        }
    }
    if ( ! function_exists( 'rttheme_footer3_bgcolor_type_condition' ) ) {
        function rttheme_footer3_bgcolor_type_condition() {
            $BgType = get_theme_mod('footer_bgtype3');
            $fstyle3 = get_theme_mod('footer_style');
            if ( $BgType === 'fbgcolor3' && $fstyle3 == 3 ) {
                return true;
            }
            return false;
        }
    }

    /*Footer 1, 2 & 4 copyright bg color check is enabled option*/
    if ( ! function_exists( 'rttheme_is_copyright_bg_color_enabled' ) ) {
        function rttheme_is_copyright_bg_color_enabled() {
            $footer_style = get_theme_mod( 'footer_style' );
            if ( $footer_style == 1 || $footer_style == 2 || $footer_style == 3 ) {
                return true;
            }
            return false;
        }
    }

    /*Blog check is enabled option*/
    if ( ! function_exists( 'rttheme_is_blog_style1_enabled' ) ) {
        function rttheme_is_blog_style1_enabled() {
            $blog_style = get_theme_mod( 'blog_style', 'style1' );
            if ( $blog_style == 'style1' ) {
                return true;
            }
            return false;
        }
    }
    if ( ! function_exists( 'rttheme_is_blog_style2_enabled' ) ) {
        function rttheme_is_blog_style2_enabled() {
            $blog_style = get_theme_mod( 'blog_style', 'style2' );
            if ( $blog_style == 'style2' ) {
                return true;
            }
            return false;
        }
    }    

	/**
	 * URL sanitization
	 *
	 * @param  string	Input to be sanitized (either a string containing a single url or multiple, separated by commas)
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'rttheme_url_sanitization' ) ) {
		function rttheme_url_sanitization( $input ) {
			if ( strpos( $input, ',' ) !== false) {
				$input = explode( ',', $input );
			}
			if ( is_array( $input ) ) {
				foreach ($input as $key => $value) {
					$input[$key] = esc_url_raw( $value );
				}
				$input = implode( ',', $input );
			}
			else {
				$input = esc_url_raw( $input );
			}
			return $input;
		}
	}

	/**
	 * Switch sanitization
	 *
	 * @param  string		Switch value
	 * @return integer	Sanitized value
	 */

	if ( ! function_exists( 'rttheme_switch_sanitization' ) ) {
		function rttheme_switch_sanitization( $input ) {
			if ( true === $input ) {
				return 1;
			} else {
				return 0;
			}
		}
	}

	/**
	 * Radio Button and Select sanitization
	 *
	 * @param  string		Radio Button value
	 * @return integer	Sanitized value
	 */
	if ( ! function_exists( 'rttheme_radio_sanitization' ) ) {
		function rttheme_radio_sanitization( $input, $setting ) {
			//get the list of possible radio box or select options
         $choices = $setting->manager->get_control( $setting->id )->choices;

			if ( array_key_exists( $input, $choices ) ) {
				return $input;
			} else {
				return $setting->default;
			}
		}
	}

	/**
	 * Integer sanitization
	 *
	 * @param  string		Input value to check
	 * @return integer	Returned integer value
	 */

	if ( ! function_exists( 'rttheme_sanitize_integer' ) ) {
		function rttheme_sanitize_integer( $input ) {
			return (int) $input;
		}
	}

	/**
	 * Text sanitization
	 *
	 * @param  string	Input to be sanitized (either a string containing a single string or multiple, separated by commas)
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'rttheme_text_sanitization' ) ) {
		function rttheme_text_sanitization( $input ) {
			if ( strpos( $input, ',' ) !== false) {
				$input = explode( ',', $input );
			}
			if( is_array( $input ) ) {
				foreach ( $input as $key => $value ) {
					$input[$key] = sanitize_text_field( $value );
				}
				$input = implode( ',', $input );
			}
			else {
				$input = sanitize_text_field( $input );
			}
			return $input;
		}
	}

    if ( ! function_exists( 'rttheme_textarea_sanitization' ) ) {
        function rttheme_textarea_sanitization( $input ) {
            return $input;
        }
    }

    /**
     * Google Font sanitization
     *
     * @param  string	JSON string to be sanitized
     * @return string	Sanitized input
     */

    if ( ! function_exists( 'rttheme_google_font_sanitization' ) ) {
        function rttheme_google_font_sanitization( $input ) {
            $val =  json_decode( $input, true );
            if( is_array( $val ) ) {
                foreach ( $val as $key => $value ) {
                    $val[$key] = sanitize_text_field( $value );
                }
                $input = json_encode( $val );
            }
            else {
                $input = json_encode( sanitize_text_field( $val ) );
            }
            return $input;
        }
    }

	/**
	 * Array sanitization
	 *
	 * @param  array	Input to be sanitized
	 * @return array	Sanitized input
	 */
	if ( ! function_exists( 'rttheme_array_sanitization' ) ) {
		function rttheme_array_sanitization( $input ) {
			if( is_array( $input ) ) {
				foreach ( $input as $key => $value ) {
					$input[$key] = sanitize_text_field( $value );
				}
			}
			else {
				$input = '';
			}
			return $input;
		}
	}

	/**
	 * Alpha Color (Hex & RGBa) sanitization
	 *
	 * @param  string	Input to be sanitized
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'rttheme_hex_rgba_sanitization' ) ) {
		function rttheme_hex_rgba_sanitization( $input, $setting ) {
			if ( empty( $input ) || is_array( $input ) ) {
				return $setting->default;
			}

			if ( false === strpos( $input, 'rgba' ) ) {
				// If string doesn't start with 'rgba' then santize as hex color
				$input = sanitize_hex_color( $input );
			} else {
				// Sanitize as RGBa color
				$input = str_replace( ' ', '', $input );
				sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
				$input = 'rgba(' . rttheme_in_range( $red, 0, 255 ) . ',' . rttheme_in_range( $green, 0, 255 ) . ',' . rttheme_in_range( $blue, 0, 255 ) . ',' . rttheme_in_range( $alpha, 0, 1 ) . ')';
			}
			return $input;
		}
	}

	/**
	 * Only allow values between a certain minimum & maxmium range
	 *
	 * @param  number	Input to be sanitized
	 * @return number	Sanitized input
	 */
	if ( ! function_exists( 'rttheme_in_range' ) ) {
		function rttheme_in_range( $input, $min, $max ){
			if ( $input < $min ) {
				$input = $min;
			}
			if ( $input > $max ) {
				$input = $max;
			}
		    return $input;
		}
	}

	/**
	 * Date Time sanitization
	 *
	 * @param  string	Date/Time string to be sanitized
	 * @return string	Sanitized input
	 */

	if ( ! function_exists( 'rttheme_date_time_sanitization' ) ) {
		function rttheme_date_time_sanitization( $input, $setting ) {
			$datetimeformat = 'Y-m-d';
			if ( $setting->manager->get_control( $setting->id )->include_time ) {
				$datetimeformat = 'Y-m-d H:i:s';
			}
			$date = DateTime::createFromFormat( $datetimeformat, $input );
			if ( $date === false ) {
				$date = DateTime::createFromFormat( $datetimeformat, $setting->default );
			}
			return $date->format( $datetimeformat );
		}
	}

	/**
	 * Slider sanitization
	 *
	 * @param  string	Slider value to be sanitized
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'rttheme_range_sanitization' ) ) {
		function rttheme_range_sanitization( $input, $setting ) {
			$attrs = $setting->manager->get_control( $setting->id )->input_attrs;

			$min = ( isset( $attrs['min'] ) ? $attrs['min'] : $input );
			$max = ( isset( $attrs['max'] ) ? $attrs['max'] : $input );
			$step = ( isset( $attrs['step'] ) ? $attrs['step'] : 1 );

			$number = floor( $input / $attrs['step'] ) * $attrs['step'];

			return rttheme_in_range( $number, $min, $max );
		}
	}

}
