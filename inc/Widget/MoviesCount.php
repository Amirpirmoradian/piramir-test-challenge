<?php

namespace Piramir\Widget;

use Piramir\Service;

class MoviesCount extends \WP_Widget implements Service {

	public function register() {
		add_action( 'widgets_init', array($this, 'register_widget') );
	}

    public function register_widget(){
	    register_widget( $this );
    }
	// Main constructor
	public function __construct() {
		parent::__construct(
			'piarmir-movie-count-widget',
			__( 'Piramir Movies Count', 'piramir-challenge-test' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}

	// The widget form (for the backend )
	public function form( $instance ) {

		// Set widget defaults
		$defaults = array(
			'title'    => '',
		);

		// Parse current settings with defaults
		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

		<?php // Widget Title ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>


	<?php }


	// Update widget settings
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		return $instance;
	}


	// Display the widget
	public function widget( $args, $instance ) {

		extract( $args );
		$movies_count = wp_count_posts('movie', 'readable');
		// Check the widget options
		$title = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		// WordPress core before_widget hook (always include )
		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
        echo '<p>';
        echo sprintf(__('Movies Count: %s'), $movies_count->publish);
		echo '</p>';
		echo $after_widget;


	}

}