<?php

namespace Piramir\CustomTaxonomy;

use Piramir\Service;

class Tag implements Service {
	private $taxonomy_name = 'Tags';
	private $taxonomy_singular_name = 'Tag';

	public function register() {
		add_action( 'init', array($this, 'add_custom_taxonomies'));
	}

	function add_custom_taxonomies() {
		// Add new "Locations" taxonomy to Posts
		register_taxonomy(strtolower( $this->taxonomy_name ),
			'movie',
			array(
				'hierarchical' => true,
				'labels' => array(
					'name' => _x( $this->taxonomy_name, 'taxonomy general name' ),
					'singular_name' => _x( $this->taxonomy_singular_name, 'taxonomy singular name' ),
					'search_items' =>  __( 'Search '. $this->taxonomy_name ),
					'all_items' => __( 'All ' . $this->taxonomy_name ),
					'parent_item' => __( 'Parent '. $this->taxonomy_singular_name ),
					'parent_item_colon' => __( 'Parent '.$this->taxonomy_singular_name.':' ),
					'edit_item' => __( 'Edit ' . $this->taxonomy_singular_name ),
					'update_item' => __( 'Update ' . $this->taxonomy_singular_name ),
					'add_new_item' => __( 'Add New ' . $this->taxonomy_singular_name ),
					'new_item_name' => __( 'New ' . $this->taxonomy_singular_name . ' Name' ),
					'menu_name' => __( $this->taxonomy_name ),
				),
				'show_in_rest'       => true,
				// Control the slugs used for this taxonomy
				'rewrite' => array(
					'slug' => strtolower( $this->taxonomy_name ),
					'with_front' => false,
					'hierarchical' => true
				),
			));
	}
}