<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

use Elementor\Plugin; 
use Rtrs\Models\Review; 

function quiklearn_get_maybe_rtl( $filename ){
	$file = get_template_directory_uri() . '/assets/';
	if ( is_rtl() ) {
		return $file . 'rtl-css/' . $filename;
	}
	else {
		return $file . 'css/' . $filename;
	}
}
add_action( 'wp_enqueue_scripts','quiklearn_enqueue_high_priority_scripts', 1500 );
function quiklearn_enqueue_high_priority_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'rtlcss', QUIKLEARN_ASSETS_URL . 'css/rtl.css', array(), QUIKLEARN_VERSION );
	}
}
//elementor animation dequeue
add_action('elementor/frontend/after_enqueue_scripts', function(){
    wp_deregister_style( 'e-animations' );
    wp_dequeue_style( 'e-animations' );
});

add_action( 'wp_enqueue_scripts', 'quiklearn_register_scripts', 12 );
if ( !function_exists( 'quiklearn_register_scripts' ) ) {
	function quiklearn_register_scripts(){
		wp_deregister_style( 'font-awesome' );
        wp_deregister_style( 'layerslider-font-awesome' );
        wp_deregister_style( 'yith-wcwl-font-awesome' );

		/*CSS*/
		// animate CSS	
		wp_register_style( 'magnific-popup',     quiklearn_get_maybe_rtl('magnific-popup.css'), array(), QUIKLEARN_VERSION );		
		wp_register_style( 'animate',        	 quiklearn_get_maybe_rtl('animate.min.css'), array(), QUIKLEARN_VERSION );

		/*JS*/
		// popper
		wp_register_script( 'popper',    	 	QUIKLEARN_ASSETS_URL . 'js/popper.min.js', array( 'jquery' ), QUIKLEARN_VERSION, true );

		// magnific popup
		wp_register_script( 'magnific-popup',    QUIKLEARN_ASSETS_URL . 'js/jquery.magnific-popup.min.js', array( 'jquery' ), QUIKLEARN_VERSION, true );

		// theia sticky
		wp_register_script( 'theia-sticky',    	 QUIKLEARN_ASSETS_URL . 'js/theia-sticky-sidebar.min.js', array( 'jquery' ), QUIKLEARN_VERSION, true );
		
		// parallax scroll js
		wp_register_script( 'rt-parallax',   	 QUIKLEARN_ASSETS_URL . 'js/rt-parallax.js', array( 'jquery' ), QUIKLEARN_VERSION, true );
		wp_register_script( 'parallax-min',   	 QUIKLEARN_ASSETS_URL . 'js/parallax.min.js', array( 'jquery' ), QUIKLEARN_VERSION, true );
		
		// wow js
		wp_register_script( 'rt-wow',   		 QUIKLEARN_ASSETS_URL . 'js/wow.min.js', array( 'jquery' ), QUIKLEARN_VERSION, true );

		// isotope js
		wp_register_script( 'isotope-pkgd',      QUIKLEARN_ASSETS_URL . 'js/isotope.pkgd.min.js', array( 'jquery' ), QUIKLEARN_VERSION, true );		
		wp_register_script( 'swiper-min',        QUIKLEARN_ASSETS_URL . 'js/swiper.min.js', array( 'jquery' ), QUIKLEARN_VERSION, true );

		// counterup js
		wp_register_script( 'waypoints',        QUIKLEARN_ASSETS_URL . 'js/waypoints.min.js', array( 'jquery' ), QUIKLEARN_VERSION, true );
		wp_register_script( 'counterup',        QUIKLEARN_ASSETS_URL . 'js/jquery.counterup.min.js', array( 'jquery' ), QUIKLEARN_VERSION, true );
		
	}
}

add_action( 'wp_enqueue_scripts', 'quiklearn_enqueue_scripts', 15 );
if ( !function_exists( 'quiklearn_enqueue_scripts' ) ) {
	function quiklearn_enqueue_scripts() {
		$dep = array( 'jquery' );
		/*CSS*/
		// Google fonts
		wp_enqueue_style( 'quiklearn-gfonts', 	QuiklearnTheme_Helper::fonts_url(), array(), QUIKLEARN_VERSION );
		// Bootstrap CSS  //@rtl
		wp_enqueue_style( 'bootstrap', 				quiklearn_get_maybe_rtl('bootstrap.min.css'), array(), QUIKLEARN_VERSION );
		
		// Flaticon CSS
		wp_enqueue_style( 'flaticon-quiklearn',    QUIKLEARN_ASSETS_URL . 'fonts/flaticon-quiklearn/flaticon.css', array(), QUIKLEARN_VERSION );
		
		elementor_scripts();
		//Video popup
		wp_enqueue_style( 'magnific-popup' );
		// font-awesome CSS
		wp_enqueue_style( 'font-awesome',       	QUIKLEARN_ASSETS_URL . 'css/font-awesome.min.css', array(), QUIKLEARN_VERSION );
		// animate CSS
		wp_enqueue_style( 'animate',            	quiklearn_get_maybe_rtl('animate.min.css'), array(), QUIKLEARN_VERSION );
		// main CSS // @rtl
		wp_enqueue_style( 'quiklearn-default',    	quiklearn_get_maybe_rtl('default.css'), array(), QUIKLEARN_VERSION );
		// vc modules css
		wp_enqueue_style( 'quiklearn-elementor',   quiklearn_get_maybe_rtl('elementor.css'), array(), QUIKLEARN_VERSION );
			
		// Style CSS
		wp_enqueue_style( 'quiklearn-style',     	quiklearn_get_maybe_rtl('style.css'), array(), QUIKLEARN_VERSION );
		
		// Template Style
		wp_add_inline_style( 'quiklearn-style',   	quiklearn_template_style() );

		/*JS*/
		wp_enqueue_script( 'popper' );
		// bootstrap js
		wp_enqueue_script( 'bootstrap',         	QUIKLEARN_ASSETS_URL . 'js/bootstrap.min.js', array( 'jquery' ), QUIKLEARN_VERSION, true );
		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		wp_enqueue_script( 'theia-sticky' );
		wp_enqueue_script( 'magnific-popup' );
		wp_enqueue_script( 'rt-wow' );		
		wp_enqueue_script( 'swiper-min' );
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'quiklearn-main',    	QUIKLEARN_ASSETS_URL . 'js/main.js', $dep , QUIKLEARN_VERSION, true );
		
		// localize script
		$quiklearn_localize_data = array(
			'stickyMenu' 	=> QuiklearnTheme::$options['sticky_menu'],
			'siteLogo'   	=> '<a href="' . esc_url( home_url( '/' ) ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">' . '</a>',
			'extraOffset' => QuiklearnTheme::$options['sticky_menu'] ? 70 : 0,
			'extraOffsetMobile' => QuiklearnTheme::$options['sticky_menu'] ? 52 : 0,
			'rtl' => is_rtl()?'rtl':'ltr',
			
			// Ajax
			'ajaxURL' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce( 'quiklearn-nonce' )
		);
		wp_localize_script( 'quiklearn-main', 'quiklearnObj', $quiklearn_localize_data );
	}	
}

function elementor_scripts() {
	
	if ( !did_action( 'elementor/loaded' ) ) {
		return;
	}
	
	if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		// do stuff for preview		
		wp_enqueue_script( 'rt-wow' );
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'waypoints' );
		wp_enqueue_script( 'rt-parallax' );
		wp_enqueue_script( 'parallax-min' );
		wp_enqueue_script( 'isotope-pkgd' );
	} 

	/*review rating*/
	if( class_exists( Review::class )){
		wp_enqueue_style( 'rtrs-app' );
		return true;
	}
	return false;

}

add_action( 'wp_enqueue_scripts', 'quiklearn_high_priority_scripts', 1500 );
if ( !function_exists( 'quiklearn_high_priority_scripts' ) ) {
	function quiklearn_high_priority_scripts() {
		// Dynamic style
		QuiklearnTheme_Helper::dynamic_internal_style();
	}
}

function quiklearn_template_style(){
	
	ob_start();
	?>
	
	.entry-banner {
		<?php if ( QuiklearnTheme::$bgtype == 'bgcolor' ): ?>
			<?php if( !empty( QuiklearnTheme::$bgcolor ) ) { ?>
				background-color: <?php echo QuiklearnTheme::$bgcolor; ?>;
			<?php } ?>
		<?php else: ?>
			background: url(<?php echo esc_url( QuiklearnTheme::$bgimg );?>) no-repeat scroll center center / cover;
		<?php endif; ?>
	}

	.content-area {
		padding-top: <?php echo esc_html( QuiklearnTheme::$padding_top );?>px; 
		padding-bottom: <?php echo esc_html( QuiklearnTheme::$padding_bottom );?>px;
	}

	<?php if( isset( QuiklearnTheme::$pagebgcolor ) || isset( QuiklearnTheme::$pagebgimg ) ) { ?>
	#page .content-area {
		background-image: url( <?php echo QuiklearnTheme::$pagebgimg; ?> );
		<?php if( !empty( QuiklearnTheme::$pagebgcolor ) ) { ?>
		background-color: <?php echo QuiklearnTheme::$pagebgcolor; ?>;
		<?php } ?>
	}
	<?php } ?>	
	
	<?php
	return ob_get_clean();
}

function load_custom_wp_admin_script_gutenberg() {
	wp_enqueue_style( 'quiklearn-gfonts', QuiklearnTheme_Helper::fonts_url(), array(), QUIKLEARN_VERSION );
	// font-awesome CSS
	wp_enqueue_style( 'font-awesome',       QUIKLEARN_ASSETS_URL . 'css/font-awesome.min.css', array(), QUIKLEARN_VERSION );
	// Flaticon CSS
	wp_enqueue_style( 'flaticon-quiklearn',    QUIKLEARN_ASSETS_URL . 'fonts/flaticon-quiklearn/flaticon.css', array(), QUIKLEARN_VERSION );
}
add_action( 'enqueue_block_editor_assets', 'load_custom_wp_admin_script_gutenberg', 1 );


function load_custom_wp_admin_script() {
	wp_enqueue_style( 'quiklearn-admin-style',  QUIKLEARN_ASSETS_URL . 'css/admin-style.css', false, QUIKLEARN_VERSION );
	wp_enqueue_script( 'quiklearn-admin-main',  QUIKLEARN_ASSETS_URL . 'js/admin.main.js', false, QUIKLEARN_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script' );

/*Topbar menu function*/
if ( !function_exists( 'quiklearn_top_menu' ) ) {
	function quiklearn_top_menu() {
	    $menus = wp_get_nav_menus();
	    if(!empty($menus)){
	      	$menu_links = array();
	      	foreach ($menus as $key => $value) {
	        	$menu_links[$value->slug] = $value->name;  
	      	}
	      	return $menu_links;
	    }
	}
}
