<?php

namespace Piramir\Shortcode;

use Piramir\Service;
use WP_Query;

class MovieList implements Service {

	public function register() {
		add_shortcode('movies_list', array($this, 'short_code_callback'));
	}

	// The shortcode function
	function short_code_callback() {
		global $wp_query;
		$args = array(
			'post_type' => 'movie',
			'post_status' => 'publish',
			'posts_per_page' => 8,
			'orderby' => 'id',
	        'order' => 'DESC',
	    );

		$wp_query = new WP_Query( $args );
		ob_start();
		piramir_get_template_part('movies/list');
		return ob_get_clean();
	}
}