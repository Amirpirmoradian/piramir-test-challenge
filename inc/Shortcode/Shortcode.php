<?php

namespace Piramir\Shortcode;

interface Shortcode {

	public function short_code_callback($attributes);
}