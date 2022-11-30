<?php

namespace Piramir\Template;

use Piramir\Service;

class SingleMovie implements Service, Template {

	public function register() {
		add_filter( 'single_template', array( $this, 'set_custom_template' ) );

	}

	function set_custom_template( $template ) {
		global $post;

		if ( 'movie' === $post->post_type ) {
			$template = piramir_get_template_part( 'movies/single' );
		}

		return $template;
	}
}