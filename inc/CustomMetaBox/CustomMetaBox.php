<?php

namespace Piramir\CustomMetaBox;

interface CustomMetaBox {
	public function register_meta_box( $post );

	public function meta_box_callback( $post );

	public function meta_box_save( $post_id );
}