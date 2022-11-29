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


//delete all genres
$taxonomy_name = 'genre';
$terms = get_terms( array(
	'taxonomy' => $taxonomy_name,
	'hide_empty' => false
) );
foreach ( $terms as $term ) {
	wp_delete_term($term->term_id, $taxonomy_name);
}

//delete all movie_tags
$taxonomy_name = 'movie_tag';
$terms = get_terms( array(
	'taxonomy' => $taxonomy_name,
	'hide_empty' => false
) );
foreach ( $terms as $term ) {
	wp_delete_term($term->term_id, $taxonomy_name);
}

