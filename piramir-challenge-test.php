<?php
//Define Dirpath for hooks
define( 'DIR_PATH', plugin_dir_path( __FILE__ ) );

/**
	* Plugin Name:       Piramir Challenge test for Realtyna
	* Plugin URI:        https://realtyna.com/plugins/challenge-test/
	* Description:       This is my first project for Realtyna, Hope they find out that it should not be last
	* Version:           1.0
	* Requires at least: 5.2
	* Requires PHP:      7.2
	* Author:            Amir Pirmordian
	* Author URI:        https://piramir.ir/
	* License:           GPL v2 or later
	* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
	* Text Domain:       piramir-challenge-test
	* Domain Path:       /languages
*/


if ( ! class_exists( 'PiramirChallengeTest' ) ) {
	class PiramirChallengeTest {
		public function __construct() {
			$this->setup_actions();
		}
		public function setup_actions(): void {
			//Main plugin hooks
			register_activation_hook( DIR_PATH, array( 'PiramirChallengeTest', 'activate' ) );
			register_deactivation_hook( DIR_PATH, array( 'PiramirChallengeTest', 'deactivate' ) );
		}

		/**
		 * Activate callback
		 */
		public static function activate(): void {
			//Activation code in here
		}

		/**
		 * Deactivate callback
		 */
		public static function deactivate(): void {
			//Deactivation code in here
		}

	}


	// instantiate the plugin class
	$piramirChallengeTest = new PiramirChallengeTest();
}