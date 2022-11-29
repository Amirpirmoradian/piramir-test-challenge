<?php
/**
 * @package PiramirChallengeTest
 */

namespace Piramir\CustomPostType;

use Piramir\Service;

class Movie implements Service {

	private $post_type_name = 'Books';
	private $post_type_singular_name = 'Book';


	public function register(): void {
		add_action( 'init', array( $this, 'create_post_type' ) );
	}

	public function create_post_type(): void {

		register_post_type(
			strtolower( $this->post_type_name ),
			array(
				'labels' => array(
					'name'               => _x( $this->post_type_name, 'post type general name' ),
					'singular_name'      => _x( $this->post_type_singular_name, 'post type singular name'),
					'menu_name'          => _x( $this->post_type_name, 'admin menu' ),
					'name_admin_bar'     => _x( $this->post_type_singular_name, 'add new on admin bar' ),
					'add_new'            => _x( 'Add New', strtolower( $this->post_type_name ) ),
					'add_new_item'       => __( 'Add New ' . $this->post_type_singular_name ),
					'new_item'           => __( 'New ' . $this->post_type_singular_name ),
					'edit_item'          => __( 'Edit ' . $this->post_type_singular_name ),
					'view_item'          => __( 'View ' . $this->post_type_singular_name ),
					'all_items'          => __( 'All ' . $this->post_type_name ),
					'search_items'       => __( 'Search ' . $this->post_type_name ),
					'parent_item_colon'  => __( 'Parent :' . $this->post_type_name ),
					'not_found'          => __( 'No ' . strtolower( $this->post_type_name ) . ' found.'),
					'not_found_in_trash' => __( 'No ' . strtolower( $this->post_type_name ) . ' found in Trash.' )
				),
				'public'             => true,
				'hierarchical'       => false,
				'rewrite'            => array( 'slug' => $this->post_type_name ),
			)
		);

	}
}