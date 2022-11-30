<?php

namespace Piramir\Shortcode;

use Piramir\Service;
use WP_Query;

class MovieList implements Service, Shortcode {

	public function register() {
		add_shortcode( 'movies_list', array( $this, 'short_code_callback' ) );
	}

	// The shortcode function
	function short_code_callback( $attributes ) {
		global $movies_list;
		$args = [
			'post_type'      => 'movie',
			'post_status'    => 'publish',
			'posts_per_page' => $attributes['posts_per_page'] ?? 10,
			'orderby'        => $attributes['orderby'] ?? 'id',
			'order'          => $attributes['order'] ?? 'DESC',
		];

		$movies_list = new WP_Query( $args );

		ob_start();
		piramir_get_template_part( 'movies/list' );

		return ob_get_clean();
	}
}