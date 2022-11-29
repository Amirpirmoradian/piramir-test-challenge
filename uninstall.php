<?php
if ( ! function_exists( 'add_action' ) ) {
	die();
}

//TODO remove all custom posts and taxonomies and any change to database

//
//global $wpdb;
//
$wpdb->query( 'DELETE FROM ' . $wpdb->prefix . 'posts WHERE' );