<?php
/**
 * The template for displaying all single movies
 *
 */

get_header();

/* Start the Loop */
the_post();


piramir_get_template_part('movies/single', 'thumbnail');

piramir_get_template_part('movies/single', 'title');

piramir_get_template_part('movies/single', 'content');

piramir_get_template_part('movies/single', 'genres');

piramir_get_template_part('movies/single', 'movie-tags');

piramir_get_template_part('movies/single', 'extra-info');

get_footer();
