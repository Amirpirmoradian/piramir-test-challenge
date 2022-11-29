<?php

namespace Piramir\CustomTaxonomy;

use Piramir\Service;

class Genre implements Service {

	public function register() {
		add_action( 'init', array( $this, 'add_custom_taxonomies' ) );
	}

	function add_custom_taxonomies() {
		// Add new "Genre" taxonomy to Movies
		register_taxonomy( 'genre',
			'movie',
			array(
				'hierarchical' => true,
				'labels'       => array(
					'name'              => _x( 'Genres', 'taxonomy general name' ),
					'singular_name'     => _x( 'Genre', 'taxonomy singular name' ),
					'search_items'      => __( 'Search Genres' ),
					'all_items'         => __( 'All Genres' ),
					'parent_item'       => __( 'Parent Genre' ),
					'parent_item_colon' => __( 'Parent Genre' . ':' ),
					'edit_item'         => __( 'Edit Genre' ),
					'update_item'       => __( 'Update Genre' ),
					'add_new_item'      => __( 'Add New Genre' ),
					'new_item_name'     => __( 'New Genre' ),
					'menu_name'         => __( 'Genres' ),
				),
				'show_in_rest' => true,
				// Control the slugs used for this taxonomy
				'rewrite'      => array(
					'slug'         => 'genres',
					'with_front'   => false,
					'hierarchical' => true
				),
			) );
	}
}