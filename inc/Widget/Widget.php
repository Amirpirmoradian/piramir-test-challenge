<?php

namespace Piramir\Widget;

interface Widget {


	public function register_widget();

	public function __construct();

	public function form( $instance );

	public function update( $new_instance, $old_instance );

	public function widget( $args, $instance );


}