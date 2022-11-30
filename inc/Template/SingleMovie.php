<?php

namespace Piramir\Template;

use Piramir\Service;

class SingleMovie implements Service {

	public function register() {
		add_filter( 'single_template', array( $this, 'get_custom_post_type_template' ) );

	}

	function get_custom_post_type_template( $single_template ) {
		global $post;

		if ( 'movie' === $post->post_type ) {
			$single_template = piramir_get_template_part( 'movies/single' );
		}

		return $single_template;
	}
}