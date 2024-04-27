<?php

namespace RadiusTheme\SB\Modules\QuickView;

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

use RadiusTheme\SB\Modules\Compare\CompareInstaller;
use RadiusTheme\SB\Traits\SingletonTrait;

final class QuickView {

	/**
	 * @var array
	 */
	public $settings = [];

	use SingletonTrait;

	function __construct() {
		QuickViewFrontEnd::instance();

		do_action( 'rtsb/module/quick_view/loaded' );
	}
}
