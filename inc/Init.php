<?php

/**
 * @package PiramirChallengeTest
 */

namespace Piramir;


use Piramir\CustomTaxonomy\Genre;

final class init {

	public static function get_services(): array {
		return [
			CustomPostType\Movie::class,
			Genre::class
		];
	}

	public static function register_services(): void {
		foreach (self::get_services() as $class){
			$service = self::instantiate($class);

			if( method_exists($service, 'register')){
				$service->register();
			}

		}
	}

	private static function instantiate( $class ) {
		return new $class();
	}

}