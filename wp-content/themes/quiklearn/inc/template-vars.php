<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use Rtcl\Helpers\Functions;

add_action( 'template_redirect', 'quiklearn_template_vars' );
if( !function_exists( 'quiklearn_template_vars' ) ) {
    function quiklearn_template_vars() {
        // Single Pages
        if( is_single() || is_page() ) {
            $post_type = get_post_type();
            $post_id   = get_the_id();
            switch( $post_type ) {
                case 'page':
                $prefix = 'page';
                break;
                default:
                $prefix = 'single_post';
                break;                
                case 'product':
                $prefix = 'product';
                break;
                case 'etn':
                $prefix = 'event';
                break;        
                case 'lp_course':
                $prefix = 'course_single';
                break; 
            }
			
			$layout_settings    = get_post_meta( $post_id, 'quiklearn_layout_settings', true );
            
            QuiklearnTheme::$layout = ( empty( $layout_settings['quiklearn_layout'] ) || $layout_settings['quiklearn_layout']  == 'default' ) ? QuiklearnTheme::$options[$prefix . '_layout'] : $layout_settings['quiklearn_layout'];

            QuiklearnTheme::$sidebar = ( empty( $layout_settings['quiklearn_sidebar'] ) || $layout_settings['quiklearn_sidebar'] == 'default' ) ? QuiklearnTheme::$options[$prefix . '_sidebar'] : $layout_settings['quiklearn_sidebar'];

            QuiklearnTheme::$top_bar = ( empty( $layout_settings['quiklearn_top_bar'] ) || $layout_settings['quiklearn_top_bar'] == 'default' ) ? QuiklearnTheme::$options['top_bar'] : $layout_settings['quiklearn_top_bar'];
            
            QuiklearnTheme::$top_bar_style = ( empty( $layout_settings['quiklearn_top_bar_style'] ) || $layout_settings['quiklearn_top_bar_style'] == 'default' ) ? QuiklearnTheme::$options['top_bar_style'] : $layout_settings['quiklearn_top_bar_style'];
			
			QuiklearnTheme::$header_opt = ( empty( $layout_settings['quiklearn_header_opt'] ) || $layout_settings['quiklearn_header_opt'] == 'default' ) ? QuiklearnTheme::$options['header_opt'] : $layout_settings['quiklearn_header_opt'];

            QuiklearnTheme::$tr_header = ( empty( $layout_settings['quiklearn_tr_header'] ) || $layout_settings['quiklearn_tr_header'] == 'default' ) ? QuiklearnTheme::$options['tr_header'] : $layout_settings['quiklearn_tr_header'];
            
            QuiklearnTheme::$header_style = ( empty( $layout_settings['quiklearn_header'] ) || $layout_settings['quiklearn_header'] == 'default' ) ? QuiklearnTheme::$options['header_style'] : $layout_settings['quiklearn_header'];
			
            QuiklearnTheme::$footer_style = ( empty( $layout_settings['quiklearn_footer'] ) || $layout_settings['quiklearn_footer'] == 'default' ) ? QuiklearnTheme::$options['footer_style'] : $layout_settings['quiklearn_footer'];
			
			QuiklearnTheme::$footer_area = ( empty( $layout_settings['quiklearn_footer_area'] ) || $layout_settings['quiklearn_footer_area'] == 'default' ) ? QuiklearnTheme::$options['footer_area'] : $layout_settings['quiklearn_footer_area'];

            QuiklearnTheme::$copyright_area = ( empty( $layout_settings['quiklearn_copyright_area'] ) || $layout_settings['quiklearn_copyright_area'] == 'default' ) ? QuiklearnTheme::$options['copyright_area'] : $layout_settings['quiklearn_copyright_area'];
			
            $padding_top = ( empty( $layout_settings['quiklearn_top_padding'] ) || $layout_settings['quiklearn_top_padding'] == 'default' ) ? QuiklearnTheme::$options[$prefix . '_padding_top'] : $layout_settings['quiklearn_top_padding'];
			
            QuiklearnTheme::$padding_top = (int) $padding_top;
            
            $padding_bottom = ( empty( $layout_settings['quiklearn_bottom_padding'] ) || $layout_settings['quiklearn_bottom_padding'] == 'default' ) ? QuiklearnTheme::$options[$prefix . '_padding_bottom'] : $layout_settings['quiklearn_bottom_padding'];
			
            QuiklearnTheme::$padding_bottom = (int) $padding_bottom;
			
            QuiklearnTheme::$has_banner = ( empty( $layout_settings['quiklearn_banner'] ) || $layout_settings['quiklearn_banner'] == 'default' ) ? QuiklearnTheme::$options[$prefix . '_banner'] : $layout_settings['quiklearn_banner'];
            
            QuiklearnTheme::$has_breadcrumb = ( empty( $layout_settings['quiklearn_breadcrumb'] ) || $layout_settings['quiklearn_breadcrumb'] == 'default' ) ? QuiklearnTheme::$options[ $prefix . '_breadcrumb'] : $layout_settings['quiklearn_breadcrumb'];
            
            QuiklearnTheme::$bgtype = ( empty( $layout_settings['quiklearn_banner_type'] ) || $layout_settings['quiklearn_banner_type'] == 'default' ) ? QuiklearnTheme::$options[$prefix . '_bgtype'] : $layout_settings['quiklearn_banner_type'];
            
            QuiklearnTheme::$bgcolor = empty( $layout_settings['quiklearn_banner_bgcolor'] ) ? QuiklearnTheme::$options[$prefix . '_bgcolor'] : $layout_settings['quiklearn_banner_bgcolor'];
			
			if( !empty( $layout_settings['quiklearn_banner_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['quiklearn_banner_bgimg'], 'full', true );
                QuiklearnTheme::$bgimg = $attch_url[0];
            } elseif( !empty( QuiklearnTheme::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( QuiklearnTheme::$options[$prefix . '_bgimg'], 'full', true );
                QuiklearnTheme::$bgimg = $attch_url[0];
            } else {
                QuiklearnTheme::$bgimg = QUIKLEARN_ASSETS_URL . 'img/banner.png';
            }
			
            QuiklearnTheme::$pagebgcolor = empty( $layout_settings['quiklearn_page_bgcolor'] ) ? QuiklearnTheme::$options[$prefix . '_page_bgcolor'] : $layout_settings['quiklearn_page_bgcolor'];			
            
            if( !empty( $layout_settings['quiklearn_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['quiklearn_page_bgimg'], 'full', true );
                QuiklearnTheme::$pagebgimg = $attch_url[0];
            } elseif( !empty( QuiklearnTheme::$options[$prefix . '_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( QuiklearnTheme::$options[$prefix . '_page_bgimg'], 'full', true );
                QuiklearnTheme::$pagebgimg = $attch_url[0];
            }
        }
        
        // Blog and Archive
        elseif( is_home() || is_archive() || is_search() || is_404() ) {
            if( is_search() ) {
                $prefix = 'search';
            } else if( is_404() ) {
                $prefix                                = 'error';
                QuiklearnTheme::$options[$prefix . '_layout'] = 'full-width';
            } elseif( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
                $prefix = 'shop';
            } elseif( is_post_type_archive( "etn" ) || is_tax( "etn_category" ) ) {
                $prefix = 'event_archive';            
            } elseif( is_post_type_archive( "lp_course" ) || is_tax( "course_category" ) ) {
                $prefix = 'course'; 
            } else {
                $prefix = 'blog';
            }
            
            QuiklearnTheme::$layout         		= QuiklearnTheme::$options[$prefix . '_layout'];
            QuiklearnTheme::$top_bar        		= QuiklearnTheme::$options['top_bar'];
            QuiklearnTheme::$header_opt      	    = QuiklearnTheme::$options['header_opt'];
            QuiklearnTheme::$tr_header             = QuiklearnTheme::$options['tr_header'];
            QuiklearnTheme::$footer_area     	    = QuiklearnTheme::$options['footer_area'];
            QuiklearnTheme::$copyright_area        = QuiklearnTheme::$options['copyright_area'];
            QuiklearnTheme::$top_bar_style  		= QuiklearnTheme::$options['top_bar_style'];
            QuiklearnTheme::$header_style   		= QuiklearnTheme::$options['header_style'];
            QuiklearnTheme::$footer_style   		= QuiklearnTheme::$options['footer_style'];
            QuiklearnTheme::$padding_top    		= QuiklearnTheme::$options[$prefix . '_padding_top'];
            QuiklearnTheme::$padding_bottom 		= QuiklearnTheme::$options[$prefix . '_padding_bottom'];
            QuiklearnTheme::$has_banner     		= QuiklearnTheme::$options[$prefix . '_banner'];
            QuiklearnTheme::$has_breadcrumb 		= QuiklearnTheme::$options[$prefix . '_breadcrumb'];
            QuiklearnTheme::$bgtype         		= QuiklearnTheme::$options[$prefix . '_bgtype'];
            QuiklearnTheme::$bgcolor        		= QuiklearnTheme::$options[$prefix . '_bgcolor'];
			
            if( !empty( QuiklearnTheme::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( QuiklearnTheme::$options[$prefix . '_bgimg'], 'full', true );
                QuiklearnTheme::$bgimg = $attch_url[0];
            } else {
                QuiklearnTheme::$bgimg = QUIKLEARN_ASSETS_URL . 'img/banner.png';
            }
			
            QuiklearnTheme::$pagebgcolor = QuiklearnTheme::$options[$prefix . '_page_bgcolor'];
            if( !empty( QuiklearnTheme::$options[$prefix . '_page_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( QuiklearnTheme::$options[$prefix . '_page_bgimg'], 'full', true );
                QuiklearnTheme::$pagebgimg = $attch_url[0];
            }			
			
        }
    }
}

// Add body class
add_filter( 'body_class', 'quiklearn_body_classes' );
if( !function_exists( 'quiklearn_body_classes' ) ) {
    function quiklearn_body_classes( $classes ) {
		
		// Header
    	if ( QuiklearnTheme::$options['sticky_menu'] == 1 ) {
			$classes[] = 'sticky-header';
		}

        if ( QuiklearnTheme::$tr_header === 1 || QuiklearnTheme::$tr_header === "on" ){
           $classes[] = 'tr-header';
        }
		
        $classes[] = 'header-style-'. QuiklearnTheme::$header_style;		
        $classes[] = 'footer-style-'. QuiklearnTheme::$footer_style;

        if ( QuiklearnTheme::$top_bar == 1 || QuiklearnTheme::$top_bar == 'on' ){
            $classes[] = 'has-topbar topbar-style-'. QuiklearnTheme::$top_bar_style;
        }

        // LearnPress
		if ( isset( $_COOKIE["lpcourseview"] ) && $_COOKIE["lpcourseview"] == 'list' ) {
			$classes[] = 'rt-course-list-view';
		} else {
			$classes[] = 'rt-course-grid-view';
		}
        
        $classes[] = ( QuiklearnTheme::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';
		
		$classes[] = ( QuiklearnTheme::$layout == 'left-sidebar' ) ? 'left-sidebar' : 'right-sidebar';
        
		if ( is_singular('post') ) {
			$classes[] =  ' post-detail-' . QuiklearnTheme::$options['post_style'];
        }

        return $classes;
    }
}