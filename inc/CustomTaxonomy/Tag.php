<?php

namespace Piramir\CustomTaxonomy;

use Piramir\Service;

class Tag implements Service {
	private $taxonomy_name = 'Tags';
	private $taxonomy_singular_name = 'Tag';

	public function register() {
		add_action( 'init', array( $this, 'add_custom_taxonomies' ) );
	}

	function add_custom_taxonomies() {
		// Add new "tag" taxonomy to Movies
		register_taxonomy( 'tag',
			'movie',
			array(
				'hierarchical' => true,
				'labels'       => array(
					'name'              => _x( 'Tags', 'taxonomy general name' ),
					'singular_name'     => _x( 'Tag', 'taxonomy singular name' ),
					'search_items'      => __( 'Search Tags' ),
					'all_items'         => __( 'All Tags' ),
					'parent_item'       => __( 'Parent Tag' ),
					'parent_item_colon' => __( 'Parent Tag' . ':' ),
					'edit_item'         => __( 'Edit Tag' ),
					'update_item'       => __( 'Update Tag' ),
					'add_new_item'      => __( 'Add New Tag' ),
					'new_item_name'     => __( 'New Tag' . ' Name' ),
					'menu_name'         => __( 'Tag' ),
				),
				'show_in_rest' => true,
				// Control the slugs used for this taxonomy
				'rewrite'      => array(
					'slug'         => 'tag',
					'with_front'   => false,
					'hierarchical' => true
				),
			) );
	}
}