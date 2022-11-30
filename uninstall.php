<?php
if ( ! function_exists( 'add_action' ) ) {
	die();
}

//remove all custom posts and taxonomies and any change to database

global $wpdb;
$wpdb->query( "DELETE a,b,c
    FROM " . $wpdb->prefix . "posts a
    LEFT JOIN " . $wpdb->prefix . "term_relationships b
        ON (a.ID = b.object_id)
    LEFT JOIN " . $wpdb->prefix . "postmeta c
        ON (a.ID = c.post_id)
    WHERE a.post_type = 'movie';" );

/** Delete All the Taxonomies */
foreach ( array( 'genre', 'movie_tag' ) as $taxonomy ) {
	// Prepare & excecute SQL
	$terms = $wpdb->get_results( $wpdb->prepare( "SELECT t.*, tt.* FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy IN ('%s') ORDER BY t.name ASC", $taxonomy ) );

	// Delete Terms
	if ( $terms ) {
		foreach ( $terms as $term ) {
			$wpdb->delete( $wpdb->term_taxonomy, array( 'term_taxonomy_id' => $term->term_taxonomy_id ) );
			$wpdb->delete( $wpdb->terms, array( 'term_id' => $term->term_id ) );
			delete_option( 'prefix_' . $taxonomy->slug . '_option_name' );
		}
	}

	// Delete Taxonomy
	$wpdb->delete( $wpdb->term_taxonomy, array( 'taxonomy' => $taxonomy ), array( '%s' ) );
}