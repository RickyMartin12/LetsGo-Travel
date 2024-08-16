<?php

/**
 * Register widgets
 *
 * Callback function which includes widget classes and initialize theme specific widgets
 *
 * @since  1.0
 */

add_action( 'widgets_init', 'trawell_register_widgets' );

if ( !function_exists( 'trawell_register_widgets' ) ) :
	function trawell_register_widgets() {
		
		include_once get_parent_theme_file_path( '/core/widgets/posts.php');
		include_once get_parent_theme_file_path( '/core/widgets/categories.php');
		
		register_widget( 'Trawell_Posts_Widget' );
		register_widget( 'Trawell_Category_Widget' );

	}
endif;


?>