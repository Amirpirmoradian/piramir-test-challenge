<?php

namespace Piramir\Base;

use Piramir\Service;

class Language implements Service {

	public function register() {
		add_action( 'plugins_loaded', array($this , 'load_textdomain') );
	}

	function load_textdomain() {
		load_plugin_textdomain( PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN, false, PIRAMIR_CHALLENGE_TEST_PLUGIN_PATH. 'languages' );
	}
}