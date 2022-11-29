<?php

namespace Piramir\Base;

use Piramir\Service;

class Enqueue implements Service {

	public function register() {
		add_action( 'wp_enqueue_scripts', array($this, 'enqueue_styles') );
	}


	public function enqueue_styles(){
		wp_enqueue_style( 'piramir-main-css',  PIRAMIR_CHALLENGE_TEST_PLUGIN_URL . "/assets/css/piramir-main.css");
	}
}