<?php
/*
Plugin Name: Quiklearn Core
Plugin URI: https://www.radiustheme.com
Description: Quiklearn Core Plugin for Quiklearn Theme
Version: 1.3
Author: RadiusTheme
Author URI: https://www.radiustheme.com
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'QUIKLEARN_CORE' ) ) {
	define( 'QUIKLEARN_CORE',                   ( WP_DEBUG ) ? time() : '1.2' );
	define( 'QUIKLEARN_CORE_THEME_PREFIX',      'quiklearn' );
	define( 'QUIKLEARN_CORE_THEME_PREFIX_VAR',  'quiklearn' );
	define( 'QUIKLEARN_CORE_CPT_PREFIX',        'quiklearn' );
	define( 'QUIKLEARN_CORE_BASE_DIR',      plugin_dir_path( __FILE__ ) );
}

require_once QUIKLEARN_CORE_BASE_DIR . 'demo-users/user-importer.php';

class Quiklearn_Core {

	public $plugin  = 'quiklearn-core';
	public $action  = 'quiklearn_theme_init';

	public function __construct() {
		$prefix = QUIKLEARN_CORE_THEME_PREFIX_VAR;

		add_action( 'plugins_loaded', array( $this, 'demo_importer' ), 15 );
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ), 16 );
		add_action( 'after_setup_theme', array( $this, 'post_meta' ), 15 );
		add_action( 'after_setup_theme', array( $this, 'elementor_widgets' ) );
		add_action( $this->action,       array( $this, 'after_theme_loaded' ) );

		add_action( 'init', array( $this, 'rewrite_flush_check' ) );
		add_action( 'plugins_loaded',       array( $this, 'php_version_check' ));
		add_action( 'personal_options_update', array( $this, 'quiklearn_extra_profile_fields' ));
		add_action( 'edit_user_profile_update', array( $this, 'quiklearn_extra_profile_fields' ));
		add_action( 'show_user_profile', array( $this, 'quiklearn_user_social_profile_fields' ));
		add_action( 'edit_user_profile', array( $this, 'quiklearn_user_social_profile_fields' ));

		/*widget footer gallery filter*/
		add_filter( 'widget_form_callback', array( $this, 'rt_widget_form_extend' ), 10, 2);
		add_filter( 'widget_update_callback', array( $this, 'rt_widget_update'), 10, 2 );
		add_filter( 'dynamic_sidebar_params', array( $this, 'rt_dynamic_sidebar_params'), 0 );

		require_once 'module/rt-post-share.php';
		require_once 'module/rt-post-views.php';
		require_once 'module/rt-post-length.php';

		// Widgets
		require_once 'widget/about-widget.php';
		require_once 'widget/address-widget.php';
		require_once 'widget/social-widget.php';
		require_once 'widget/rt-post-box.php';
		require_once 'widget/rt-post-tab.php';
		require_once 'widget/rt-feature-post.php';
		require_once 'widget/search-widget.php';
		require_once 'widget/rt-product-box.php';
		require_once 'widget/rt-category.php';
		require_once 'widget/rt-download.php';
		require_once 'widget/rt-contact.php';
		require_once 'widget/rt-event-post.php';

		require_once 'widget/widget-settings.php';
		require_once 'lib/optimization/__init__.php';
	}

	/*User extra profile fields*/
	function quiklearn_extra_profile_fields( $user_id ) {
		if ( !current_user_can( 'edit_user', $user_id ) )
			return false;
		update_user_meta( $user_id, 'quiklearn_facebook', esc_url_raw($_POST['facebook']) );
		update_user_meta( $user_id, 'quiklearn_twitter', esc_url_raw($_POST['twitter']) );
		update_user_meta( $user_id, 'quiklearn_linkedin', esc_url_raw($_POST['linkedin']) );
		update_user_meta( $user_id, 'quiklearn_instagram', esc_url_raw($_POST['instagram']) );
		update_user_meta( $user_id, 'quiklearn_pinterest', esc_url_raw($_POST['pinterest']) );
		update_user_meta( $user_id, 'quiklearn_youtube', esc_url_raw($_POST['youtube']) );
		update_user_meta( $user_id, 'quiklearn_author_designation', sanitize_text_field($_POST['quiklearn_author_designation']) );
		update_user_meta( $user_id, 'quiklearn_author_phone', sanitize_text_field($_POST['quiklearn_author_phone']) );
	}

	/*social link to author profile page*/
	function quiklearn_user_social_profile_fields( $user ) { ?>
		<h3><?php esc_html_e( 'User Phone' , 'quiklearn-core' ); ?></h3>
		<table class="form-table">
			<tr>
				<th><label for="quiklearn_author_phone"><?php esc_html_e( 'Author Phone' , 'quiklearn-core' ); ?></label></th>
				<td><input type="text" name="quiklearn_author_phone" id="quiklearn_author_phone" value="<?php echo esc_attr( get_the_author_meta( 'quiklearn_author_phone', $user->ID ) ); ?>" class="regular-text" /><br /><span class="phone"><?php esc_html_e( 'Please enter your Author phone' , 'quiklearn-core' ); ?></span></td>
			</tr>
		</table>
		<h3><?php esc_html_e( 'User Designation' , 'quiklearn-core' ); ?></h3>
		<table class="form-table">
			<tr>
				<th><label for="quiklearn_author_designation"><?php esc_html_e( 'Author Designation' , 'quiklearn-core' ); ?></label></th>
				<td><input type="text" name="quiklearn_author_designation" id="quiklearn_author_designation" value="<?php echo esc_attr( get_the_author_meta( 'quiklearn_author_designation', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Author Designation' , 'quiklearn-core' ); ?></span></td>
			</tr>
		</table>
		<h3><?php esc_html_e( 'Social profile information' , 'quiklearn-core' ); ?></h3>
		<table class="form-table">
			<tr>
				<th><label for="facebook"><?php esc_html_e( 'Facebook' , 'quiklearn-core' ); ?></label></th>
				<td><input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'quiklearn_facebook', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your facebook URL.' , 'quiklearn-core' ); ?></span></td>
			</tr>
			<tr>
				<th><label for="twitter"><?php esc_html_e( 'Twitter' , 'quiklearn-core' ); ?></label></th>
				<td><input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'quiklearn_twitter', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Twitter username.' , 'quiklearn-core' ); ?></span></td>
			</tr>
			<tr>
				<th><label for="linkedin"><?php esc_html_e( 'LinkedIn' , 'quiklearn-core' ); ?></label></th>
				<td><input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'quiklearn_linkedin', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your LinkedIn Profile' , 'quiklearn-core' ); ?></span></td>
			</tr>
			<tr>
				<th><label for="instagram"><?php esc_html_e( 'Instagram' , 'quiklearn-core' ); ?></label></th>
				<td><input type="text" name="instagram" id="instagram" value="<?php echo esc_attr( get_the_author_meta( 'quiklearn_instagram', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Instagram Profile' , 'quiklearn-core' ); ?></span></td>
			</tr>
			<tr>
				<th><label for="pinterest"><?php esc_html_e( 'Pinterest' , 'quiklearn-core' ); ?></label></th>
				<td><input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'quiklearn_pinterest', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Pinterest Profile' , 'quiklearn-core' ); ?></span></td>
			</tr>
			<tr>
				<th><label for="youtube"><?php esc_html_e( 'Youtube' , 'quiklearn-core' ); ?></label></th>
				<td><input type="text" name="youtube" id="youtube" value="<?php echo esc_attr( get_the_author_meta( 'quiklearn_youtube', $user->ID ) ); ?>" class="regular-text" /><br /><span class="description"><?php esc_html_e( 'Please enter your Youtube Profile' , 'quiklearn-core' ); ?></span></td>
			</tr>
		</table>
	<?php }

	/**
	 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
	*/
	public function php_version_check(){
		if ( version_compare(phpversion(), '7.2', '<') ){
			add_action( 'admin_notices', [ $this, 'php_version_message' ] );
		}
		if ( version_compare(phpversion(), '7.2', '>') ){
			require_once QUIKLEARN_CORE_BASE_DIR . 'lib/optimization/__init__.php';
		}
	}

	public function php_version_message(){
		$class = 'notice notice-warning settings-error';
		/* translators: %s: html tags */
		$message = sprintf( __( 'The %1$sQuiklearn Optimization%2$s requires %1$sphp 7.2+%2$s. Please consider updating php version and know more about it <a href="https://wordpress.org/about/requirements/" target="_blank">here</a>.', 'quiklearn-core' ), '<strong>', '</strong>' );
		printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), wp_kses_post( $message ));
	}

	public function demo_importer() {
		require_once 'demo-importer.php';

		if(isset($_GET['user-import']) && $_GET['user-import'] == 1){
			Quiklearn_Core_Demo_User_Import::export_users();
		}
	}
	public function load_textdomain() {
		load_plugin_textdomain( $this->plugin , false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	public function post_meta(){
		if ( !did_action( $this->action ) || ! defined( 'RT_FRAMEWORK_VERSION' ) ) {
			return;
		}
		require_once 'post-meta.php';
	}
	public function elementor_widgets(){
		if ( did_action( $this->action ) && did_action( 'elementor/loaded' ) ) {

			require_once 'elementor/init.php';
		}
	}
	public function after_theme_loaded() {
		require_once QUIKLEARN_CORE_BASE_DIR . 'lib/wp-svg/init.php'; // SVG support
		require_once 'widget/sidebar-generator.php'; // sidebar widget generator
	}

	public function get_base_url(){

		$file = dirname( dirname(__FILE__) );

		// Get correct URL and path to wp-content
		$content_url = untrailingslashit( dirname( dirname( get_stylesheet_directory_uri() ) ) );
		$content_dir = untrailingslashit( WP_CONTENT_DIR );

		// Fix path on Windows
		$file = wp_normalize_path( $file );
		$content_dir = wp_normalize_path( $content_dir );

		$url = str_replace( $content_dir, $content_url, $file );

		return $url;

	}

	public function rewrite_flush_check() {
		$prefix = QUIKLEARN_CORE_THEME_PREFIX_VAR;
		if ( get_option( "{$prefix}_rewrite_flash" ) == true ) {
			flush_rewrite_rules();
			update_option( "{$prefix}_rewrite_flash", false );
		}
	}

	/*widget gallery function*/ 
	public function rt_widget_form_extend( $instance, $widget ) {
		$row = '';
		if ( !isset($instance['classes']) )
			$instance['classes'] = null;   
			$row .= "<p><label>Custom Class:</label>\t<input type='text' name='widget-{$widget->id_base}[{$widget->number}][classes]' id='widget-{$widget->id_base}-{$widget->number}-classes' class='widefat' value='{$instance['classes']}'/>\n";
			$row .= "</p>\n";
			echo $row;
			return $instance;
	}

	public function rt_widget_update( $instance, $new_instance ) {
		$instance['classes'] = isset($new_instance['classes']) ? $new_instance['classes'] : '';
		return $instance;
	}

	// Value add in widget
	public function rt_dynamic_sidebar_params( $params ) {
		global $wp_registered_widgets;
		$widget_id    = $params[0]['widget_id'];
		$widget_obj   = $wp_registered_widgets[$widget_id];
		$widget_opt   = get_option($widget_obj['callback'][0]->option_name);
		$widget_num   = $widget_obj['params'][0]['number'];    
		if ( isset($widget_opt[$widget_num]['classes']) && !empty($widget_opt[$widget_num]['classes']) )
			$params[0]['before_widget'] = preg_replace( '/class="/', "class=\"{$widget_opt[$widget_num]['classes']} ", $params[0]['before_widget'], 1 );
		return $params;
	}

}

new Quiklearn_Core;