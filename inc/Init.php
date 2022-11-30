<?php

/**
 * @package PiramirChallengeTest
 */

namespace Piramir;



final class Init {

	/**
	 * Get a list of all services we need to register in our plugin
	 * @return string[]
	 */
	public static function get_services(): array {
		return [
			Base\Enqueue::class,
			Base\Language::class,
			CustomPostType\Movie::class,
			CustomTaxonomy\Genre::class,
			CustomTaxonomy\Tag::class,
			CustomMetaBox\ExtraInfo::class,
			Template\SingleMovie::class,
			Shortcode\MovieList::class,
			Widget\MoviesCount::class,
		];
	}

	/**
	 * get an instance of all services and try to call register method on them if exists
	 *
	 * @return void
	 */
	public static function register_services(): void {
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );

			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}

		}
	}

	/**
	 * create a new instance of given class
	 *
	 * @param $class
	 *
	 * @return mixed
	 */
	private static function instantiate( $class ): mixed {
		return new $class();
	}

}