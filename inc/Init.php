<?php

/**
 * @package PiramirChallengeTest
 */

namespace Piramir;


final class Init {

	public static function get_services(): array {
		return [
			Base\Enqueue::class,
			Base\Language::class,
			CustomPostType\Movie::class,
			CustomTaxonomy\Genre::class,
			CustomTaxonomy\Tag::class,
			Template\SingleMovie::class,
			Shortcode\MovieList::class,
			Widget\MoviesCount::class,
		];
	}

	public static function register_services(): void {
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );

			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}

		}
	}

	private static function instantiate( $class ) {
		return new $class();
	}

}