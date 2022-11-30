<?php
/**
 * @package PiramirChallengeTest
 */

namespace Piramir\CustomPostType;

use Piramir\Service;

class Movie implements Service, CustomPostType {

	public function register(): void {
		add_action( 'init', array( $this, 'create_post_type' ) );
	}

	public function create_post_type(): void {

		register_post_type(
			'movie',
			array(
				'labels'       => array(
					'name'               => _x( 'Movies', 'post type general name', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN ),
					'singular_name'      => _x( 'Movie', 'post type singular name', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN ),
					'menu_name'          => _x( 'Movies', 'admin menu', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN ),
					'name_admin_bar'     => _x( 'Movies', 'add new on admin bar', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN ),
					'add_new'            => __( 'Add New', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN ),
					'add_new_item'       => __( 'Add New Movie', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN ),
					'new_item'           => __( 'New Movie', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN ),
					'edit_item'          => __( 'Edit Movie', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN ),
					'view_item'          => __( 'View Movie', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN ),
					'all_items'          => __( 'All Movies', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN ),
					'search_items'       => __( 'Search Movies', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN ),
					'parent_item_colon'  => __( 'Parent :', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN ),
					'not_found'          => __( 'No movie found.', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN ),
					'not_found_in_trash' => __( 'No movie found in Trash.', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN )
				),
				'show_in_rest' => true,
				'public'       => true,
				'hierarchical' => false,
				'rewrite'      => array( 'slug' => 'movie' ),
				'supports'     => array( 'title', 'editor', 'thumbnail' )
			)
		);

	}
}