<?php

namespace RadiusTheme\SB\Helpers;

// Do not allow directly accessing this file.
use RadiusTheme\SB\Models\ExtraSettings;
use RadiusTheme\SB\Models\TemplateSettings;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

class Migration {
	private static $first_instilled;

	public static function init() {
		self::$first_instilled = ExtraSettings::instance()->get_option( 'first_instilled_version', false );
		add_action( 'init', [ __CLASS__, 'the_migration' ], 5 );
	}

	/**
	 * @return void
	 */
	public static function the_migration() {

		if ( self::$first_instilled && version_compare( self::$first_instilled, RTSB_VERSION, '==' ) ) {
			return;
		}
		$v_2_0_4 = ExtraSettings::instance()->get_option( 'settings_migration_v_2_0_4', false  );
		if ( ! $v_2_0_4 ) {
			self::settings_migration_plugin_v_2_0_4();
			ExtraSettings::instance()->set_option( 'settings_migration_v_2_0_4' , RTSB_VERSION );
			return;
		}

		/*
		 *  Example Migration
			else if ( ! AdditionalSettings::instance()->get_option( 'template_settings_migration_v_2_0_4' ) ) {
			} else if ( ! AdditionalSettings::instance()->get_option( 'template_settings_migration_v_2_0_5' ) ) {
			}
		*/
		return;
	}
	/**
	 * @return void
	 */
	private static function remove_option_for_missing_builder_v_2_0_4( $name ) {
		$array   = explode( '_', $name );
		$post_id = end( $array );
		if( ! is_numeric( $post_id ) ){
			return;
		}
		if( get_post_status( $post_id ) ){
			return;
		}
		TemplateSettings::instance()->delete_option( $name );
	}
	/**
	 * @return void
	 */
	public static function settings_migration_plugin_v_2_0_4() {
		// Prefixes to search for
		global $wpdb;
		// Prefixes to search for
		$prefixes = [
			'rtsb_tb_template',
			'rtsb_template_specific',
			'rtsb_template_for'
		];

		// Array to store matching options
		// Loop through each prefix
		foreach ($prefixes as $prefix) {
			// Run a direct database query to fetch option names and values
			$query = $wpdb->prepare("SELECT option_name, option_value FROM {$wpdb->options} WHERE option_name LIKE %s", $wpdb->esc_like($prefix) . '%');
			$options_with_prefix = $wpdb->get_results($query, OBJECT);
			if ($options_with_prefix) {
				foreach ($options_with_prefix as $option) {
					$value =  maybe_unserialize($option->option_value);
					if( ! empty( $value ) ){
						 TemplateSettings::instance()->set_option( $option->option_name, $value );
					}
					delete_option( $option->option_name );
					self::remove_option_for_missing_builder_v_2_0_4( $option->option_name );
				}
			}
		}

		// Extra Setings.
		$extra_prefixes = [
			'rtsb_version',
			'rtsb_wishlist_db_version',
			'rtsb_compare_db_version',
			'rtsbpro_version'
		];
		// Array to store matching options
		// Loop through each prefix
		foreach ($extra_prefixes as $prefix) {
			// Run a direct database query to fetch option names and values
			$query = $wpdb->prepare("SELECT option_name, option_value FROM {$wpdb->options} WHERE option_name LIKE %s", $wpdb->esc_like($prefix) . '%');
			$options_with_prefix = $wpdb->get_results($query, OBJECT);
			if ($options_with_prefix) {
				foreach ($options_with_prefix as $option) {
					$value =  maybe_unserialize($option->option_value);
					if( ! empty( $value ) ){
						ExtraSettings::instance()->set_option( $option->option_name , $value );
					}
					delete_option( $option->option_name );
				}
			}
		}


	}

}