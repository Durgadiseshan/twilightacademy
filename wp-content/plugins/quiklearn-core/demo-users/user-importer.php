<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */


class Quiklearn_Core_Demo_User_Import {

	public $user_migration = array();

	public function __construct() {
		$this->import_users();
		$this->import_usermeta();
		$this->update_authors_in_post_and_postmeta();
		$this->update_userid_from_lp_user_items();
		$this->update_userid_from_comments();
		$this->rename_lp_profile_dir();
	}

	public function import_users() {
		global $wpdb;

		$existing_users = array();
		$existing_users_obj = get_users( array( 'number' => -1, 'fields' => array( 'ID', 'user_login' ) ) );
		foreach ( $existing_users_obj as $existing_user ) {
			$existing_users[$existing_user->user_login] = $existing_user->ID;
		}

		$user_data = file_get_contents( QUIKLEARN_CORE_BASE_DIR . 'demo-users/users.json' );
		$user_data = json_decode( $user_data, true );

		foreach ( $user_data as $user_value ) {
			if ( array_key_exists( $user_value['user_login'], $existing_users ) ) {
				if ( user_can( $existing_users[$user_value['user_login']], 'lp_teacher' ) ) {
					wp_delete_user( $existing_users[$user_value['user_login']] );
				}
				else {
					continue;
				}
			}

			$old_id = $user_value['ID'];
			unset( $user_value['ID'] );
			if ( $wpdb->insert( $wpdb->users, $user_value ) ) {
				$this->user_migration[$old_id] = $wpdb->insert_id;
			}
		}
	}

	public function import_usermeta() {
		global $wpdb;

		$user_meta_data = file_get_contents( QUIKLEARN_CORE_BASE_DIR . 'demo-users/usermeta.json' );
		$user_meta_data = json_decode( $user_meta_data, true );

		foreach ( $user_meta_data as $user_meta_value ) {

			if ( !array_key_exists( $user_meta_value['user_id'], $this->user_migration ) ) {
				continue;
			}

			$user_meta_value['user_id'] = $this->user_migration[$user_meta_value['user_id']];
			$user_meta_value['meta_value'] = maybe_unserialize( $user_meta_value['meta_value'] );

			// replace ac_capabilities
			// convert ac_capabilities to wp_capabilities
			$old_prefix = 'ac_';
			$new_prefix = $wpdb->prefix;
			$user_meta_value['meta_key'] = preg_replace("/{$old_prefix}/", $new_prefix, $user_meta_value['meta_key'], 1 );

			// change profile pic location
			// convert example/{wildcard}/example.jpg to example/{id}/example.jpg
			if ( $user_meta_value['meta_key'] == '_lp_profile_picture' ) {
				$user_meta_value['meta_value'] = preg_replace( '/(\w+)\/(\w+)\/(\w+)/', '${1}/'. $user_meta_value['user_id'] .'/${3}', $user_meta_value['meta_value'] );
			}

			// run update
			update_user_meta( $user_meta_value['user_id'], $user_meta_value['meta_key'], $user_meta_value['meta_value'] );
		}
	}

	public function update_authors_in_post_and_postmeta() {
		$existing_post_authors = array(
			47 => 6,
			61 => 3,
			67 => 5,
			3112 => 9,
			3125 => 10,
			3126 => 8,
			3127 => 7,
			3128 => 6,
			3134 => 7,
			3135 => 6,
			3136 => 9,
			3137 => 6,
			3138 => 4,
			3139 => 10,
		);
		foreach ( $existing_post_authors as $key => $value ) {
			if ( !array_key_exists( $value, $this->user_migration ) ) continue;
			@wp_update_post( array( 'ID' => $key, 'post_author' => $this->user_migration[$value] ) );
			update_post_meta( $key, '_lp_course_author', $this->user_migration[$value] );
		}
	}

	public function update_userid_from_lp_user_items() {
		global $wpdb;

		$existing_userid = array(
			1 => 6,
			2 => 4,
		);

		$table = $wpdb->prefix . 'learnpress_user_items';

		foreach ( $existing_userid as $key => $value ) {
			if ( !array_key_exists( $value, $this->user_migration ) ) continue;
			$wpdb->update( $table, array( 'user_id' => $this->user_migration[$value] ), array( 'user_item_id' => $key ), '%d', '%d' );			
		}
	}

	public function update_userid_from_comments() {
		$existing_userid = array(
			5 => 7,
			6 => 3,
			6 => 9,
			6 => 5,
			6 => 10,
		);

		foreach ( $existing_userid as $key => $value ) {
			if ( !array_key_exists( $value, $this->user_migration ) ) continue;
			wp_update_comment( array( 'comment_ID' => $key, 'user_id' => $this->user_migration[$value] ) );	
		}
	}

	public function rename_lp_profile_dir() {
		$dir_path = $this->lp_profile_dir_path() . DIRECTORY_SEPARATOR;
		$temp_dir_name = array();
		$count = 0;

		// rename dir as temp name
		foreach ( $this->user_migration as $key => $value ) {
			$count++;
			$old_dir = $dir_path . $key;
			if ( !is_dir( $old_dir ) || !wp_is_writable( $old_dir ) ) continue;

			$rand = 'temp' . $count . rand( 1,999 );
			$new_dir = $dir_path . $rand;

			if ( @rename( $old_dir, $new_dir ) ) {
				$temp_dir_name[$rand] = $value;
			}
		}

		// rename dir as original
		foreach ( $temp_dir_name as $key => $value ) {
			$old_dir = $dir_path . $key;
			$new_dir = $dir_path . $value;
			@rename( $old_dir, $new_dir );
		}
	}

	// Without trailing slash, based on function - learn_press_user_profile_picture_upload_dir()
	private function lp_profile_dir_path(){
		$upload_dir = wp_upload_dir();
		$subdir = 'learn-press-profile';
		$subdir = '/' . $subdir;

		$u_subdir = str_replace( '\\', '/', $upload_dir['subdir'] );
		$u_path   = str_replace( '\\', '/', $upload_dir['path'] );

		$upload_dir = str_replace( $u_subdir, $subdir, $u_path );

		if ( is_multisite() && ! ( is_main_network() && is_main_site() && defined( 'MULTISITE' ) ) ) {
			$upload_dir = str_replace( '/sites/' . get_current_blog_id(), '', $upload_dir );
		}

		return $upload_dir;
	}

	public static function export_users() {
		global $wpdb;
		$users_id = array( 3, 4, 5, 6, 7, 8, 9, 10 );
		$users_id_sql = implode( ',', $users_id );

		// user table
		$query = "SELECT * FROM $wpdb->users WHERE ID IN ($users_id_sql)";
		$users = $wpdb->get_results( $query, ARRAY_A );

		// usermeta table
		$query = "SELECT * FROM $wpdb->usermeta WHERE user_id IN ($users_id_sql)";
		$usermetas = $wpdb->get_results( $query, ARRAY_A );

		// json
		$json1 = json_encode($users);
		$json2 = json_encode($usermetas);
		file_put_contents(QUIKLEARN_CORE_BASE_DIR.'demo-users/users.json', $json1);
		file_put_contents(QUIKLEARN_CORE_BASE_DIR.'demo-users/usermeta.json', $json2);
	}
}