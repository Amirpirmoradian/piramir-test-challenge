<?php

namespace Piramir\CustomMetaBox;

use Piramir\Service;

class ExtraInfo implements Service {

	public function register() {
		add_action( 'add_meta_boxes', array( $this, 'meta_box_for_movie' ) );
		add_action( 'save_post', array( $this, 'extra_info_save_meta_boxes_data' ), 10, 2 );
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