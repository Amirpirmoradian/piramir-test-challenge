<?php
/**
 * @package PiramirChallengeTest
 */

namespace Piramir\CustomPostType;

use Piramir\Service;

class Movie implements Service {

	private $post_type_name = 'Movies';
	private $post_type_singular_name = 'Movie';


	public function register(): void {
		add_action( 'init', array( $this, 'create_post_type' ) );
		add_action( 'add_meta_boxes', array( $this, 'meta_box_for_movie' ) );
		add_action( 'save_post', array( $this, 'extra_info_save_meta_boxes_data' ), 10, 2 );
	}



	public function create_post_type(): void {

		register_post_type(
			strtolower( $this->post_type_singular_name ),
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

	function meta_box_for_movie( $post ) {
		add_meta_box(
			'extra_info',
			__('Extra Info', PIRAMIR_CHALLENGE_TEST_TEXT_DOMAIN),
			array($this, 'extra_info_callback'),
			'movie',
			'normal',
			'high'
		);
	}

	function extra_info_callback( $post ) {
		wp_nonce_field( basename( __FILE__ ), 'extra_info_nonce' );
		echo '<textarea name="extra_info">' . get_post_meta( $post->ID, 'extra_info', true ) . '</textarea>';
	}

	function extra_info_save_meta_boxes_data( $post_id ){
		// check for nonce to top xss
		if ( !isset( $_POST['extra_info_nonce'] ) || !wp_verify_nonce( $_POST['extra_info_nonce'], basename( __FILE__ ) ) ){
			return;
		}

		// check for correct user capabilities - stop internal xss from customers
		if ( ! current_user_can( 'edit_post', $post_id ) ){
			return;
		}

		// update fields
		if ( isset( $_REQUEST['extra_info'] ) ) {
			update_post_meta( $post_id, 'extra_info', sanitize_text_field( $_POST['extra_info'] ) );
		}
	}
}