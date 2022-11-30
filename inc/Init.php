<?php

/**
 * @package PiramirChallengeTest
 */

namespace Piramir;


use Piramir\Base\Enqueue;
use Piramir\Base\Language;
use Piramir\CustomMetaBox\ExtraInfo;
use Piramir\CustomPostType\Movie;
use Piramir\CustomTaxonomy\Genre;
use Piramir\CustomTaxonomy\Tag;
use Piramir\Shortcode\MovieList;
use Piramir\Template\SingleMovie;
use Piramir\Widget\MoviesCount;

final class Init {

	/**
	 * Get a list of all services we need to register in our plugin
	 * @return string[]
	 */
	public static function get_services(): array {

		$base = [
			Enqueue::class,
			Language::class
		];

		$custom_post_types = [
			Movie::class,
		];

		$custom_taxonomies = [
			Genre::class,
			Tag::class
		];

		$custom_meta_boxes = [
			ExtraInfo::class
		];

		$custom_templates = [
			SingleMovie::class
		];

		$custom_shortcodes = [
			MovieList::class
		];

		$custom_widgets = [
			MoviesCount::class
		];

		return array_merge(
			$base,
			$custom_post_types,
			$custom_taxonomies,
			$custom_meta_boxes,
			$custom_templates,
			$custom_shortcodes,
			$custom_widgets
		);
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