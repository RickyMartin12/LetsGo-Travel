<?php

/* Load admin scripts and styles */
add_action( 'admin_enqueue_scripts', 'trawell_load_admin_scripts' );


/**
 * Load scripts and styles in admin
 *
 * It just wrapps two other separate functions for loading css and js files in admin
 *
 * @since  1.0
 */

function trawell_load_admin_scripts() {
	trawell_load_admin_css();
	trawell_load_admin_js();
}


/**
 * Load admin css files
 *
 * @since  1.0
 */

function trawell_load_admin_css() {
	
	global $pagenow;

	//Load color picker for categories
	if ( in_array( $pagenow, array('edit-tags.php', 'term.php') ) && isset( $_GET['taxonomy'] ) && $_GET['taxonomy'] == 'category' ) {
		wp_enqueue_style( 'wp-color-picker' );
	}

	//Load small admin style tweaks
	wp_enqueue_style( 'trawell-global', get_parent_theme_file_uri( '/assets/css/admin/global.css' ) , false, TRAWELL_THEME_VERSION, 'screen, print' );
}


/**
 * Load admin js files
 *
 * @since  1.0
 */

function trawell_load_admin_js() {

	global $pagenow, $typenow;

	//Load global js
	 wp_enqueue_script( 'trawell-global', get_parent_theme_file_uri( '/assets/js/admin/global.js' ) , array( 'jquery' ), TRAWELL_THEME_VERSION );

	//Load category scripts
	if (in_array( $pagenow, array('edit-tags.php', 'term.php') ) && isset( $_GET['taxonomy'] ) && $_GET['taxonomy'] == 'category' ) {
		wp_enqueue_media();
		wp_enqueue_script( 'trawell-category', get_parent_theme_file_uri('/assets/js/admin/metaboxes-category.js'), array( 'jquery', 'wp-color-picker' ), TRAWELL_THEME_VERSION );
	}

	if( $pagenow == 'widgets.php' ){
		wp_enqueue_script( 'trawell-widgets', get_parent_theme_file_uri('/assets/js/admin/widgets.js'), array( 'jquery', 'jquery-ui-sortable'), TRAWELL_THEME_VERSION );
	}


}

/**
 * Load editor styles
 * 
 * @since  1.0
 */

function trawell_load_editor_styles() {	

	add_editor_style( array(
            get_parent_theme_file_uri( '/assets/css/editor-style.css'),
            trawell_generate_fonts_link(),
            add_query_arg( 'action', 'trawell_dynamic_editor_styles', admin_url( 'admin-ajax.php' ) ),
        )
	);
}

add_action( 'wp_ajax_trawell_dynamic_editor_styles', 'trawell_dynamic_editor_styles' );

function trawell_dynamic_editor_styles() {
	header("Content-type: text/css");
	echo trawell_generate_dynamic_css();
    wp_die();
}

?>