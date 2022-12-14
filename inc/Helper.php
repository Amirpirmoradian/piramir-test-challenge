<?php
if ( ! function_exists( 'piramir_get_template_part' ) ) {
	/**
	 * get template part
	 *
	 * @param $slug
	 * @param $name
	 * @param $load
	 *
	 * @return bool|string
	 */
	function piramir_get_template_part( $slug, $name = null, $load = true ): bool|string {
		// Execute code for this part
		do_action( 'get_template_part_' . $slug, $slug, $name );

		// Setup possible parts
		$templates = array();
		if ( isset( $name ) ) {
			$templates[] = $slug . '-' . $name . '.php';
		}
		$templates[] = $slug . '.php';

		// Allow template parts to be filtered
		$templates = apply_filters( 'piramir_get_template_part', $templates, $slug, $name );

		// Return the part that is found
		return piramir_locate_template( $templates, $load, false );
	}
}

if ( ! function_exists( 'piramir_locate_template' ) ) {
	/**
	 *
	 * try to find template in diffrent location
	 * first try theme
	 * second try parent theme
	 * last try plugin folder
	 * @param $template_names
	 * @param $load
	 * @param $require_once
	 *
	 * @return bool|string
	 */
	function piramir_locate_template( $template_names, $load = false, $require_once = true ): bool|string {
		// No file found yet
		$located = false;

		// Try to find a template file
		foreach ( (array) $template_names as $template_name ) {

			// Continue if template is empty
			if ( empty( $template_name ) ) {
				continue;
			}

			// Trim off any slashes from the template name
			$template_name = ltrim( $template_name, '/' );
			// Check child theme first
			if ( file_exists( trailingslashit( get_stylesheet_directory() ) . 'templates/' . $template_name ) ) {
				$located = trailingslashit( get_stylesheet_directory() ) . 'templates/' . $template_name;
				break;

				// Check parent theme next
			} elseif ( file_exists( trailingslashit( get_template_directory() ) . 'templates/' . $template_name ) ) {
				$located = trailingslashit( get_template_directory() ) . 'templates/' . $template_name;
				break;

				// Check plugin compatibility last
			} elseif ( file_exists( trailingslashit( PIRAMIR_CHALLENGE_TEST_TEMPLATES_DIR ) . $template_name ) ) {
				$located = trailingslashit( PIRAMIR_CHALLENGE_TEST_TEMPLATES_DIR ) . $template_name;
				break;
			}
		}

		if ( ( true == $load ) && ! empty( $located ) ) {
			load_template( $located, $require_once );
		}

		return $located;
	}
}
