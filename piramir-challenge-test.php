<?php

/**
 * @package PiramirChallengeTest
 */

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


if(! function_exists('add_action')){
	die();
}


define('PIRAMIR_CHALLENGE_TEST_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PIRAMIR_CHALLENGE_TEST_PLUGIN_URL', plugin_dir_url(__FILE__));
define('PIRAMIR_CHALLENGE_TEST_PLUGIN_BASE_NAME', plugin_basename(__FILE__));
define('PIRAMIR_CHALLENGE_TEST_TEMPLATES_DIR', plugin_dir_path(__FILE__) . 'templates');

require_once dirname(__FILE__) . '/vendor/autoload.php';

register_activation_hook(__FILE__, 'activate_piramir_plugin');
register_deactivation_hook(__FILE__, 'deactivate_piramir_plugin');


function activate_piramir_plugin(): void {
	flush_rewrite_rules();
}

function deactivate_piramir_plugin(): void {
	flush_rewrite_rules();
}

if( class_exists('Piramir\\Init')){
	\Piramir\init::register_services();
}