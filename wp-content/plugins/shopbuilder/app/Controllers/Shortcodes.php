<?php
/**
 * Shortcodes Class.
 *
 * This class contains all the Shortcodes.
 *
 * @package RadiusTheme\SB
 */

namespace RadiusTheme\SB\Controllers;

use RadiusTheme\SB\Traits\SingletonTrait;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

/**
 * Shortcodes Class.
 */
class Shortcodes {
	/**
	 * Singleton Trait
	 */
	use SingletonTrait;

	/**
	 * Class Constructor.
	 */
	private function __construct() {
		add_action( 'init', [ $this, 'register_shortcodes' ] );
	}

	/**
	 * Accumulates all the shortcode classes inside an array
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function register_shortcodes() {
		$shortcodes_list = [];

		return apply_filters( 'rtsb/elements/shortcodes', $shortcodes_list );
	}
}
