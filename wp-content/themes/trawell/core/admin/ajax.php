<?php

/**
 * Hide update notification and update theme version
 *
 * @since  1.0
 */

add_action( 'wp_ajax_trawell_update_version', 'trawell_update_version' );

if ( !function_exists( 'trawell_update_version' ) ):
	function trawell_update_version() {
		update_option( 'trawell_theme_version', TRAWELL_THEME_VERSION );
		wp_die();
	}
endif;


/**
 * Hide welcome notification
 *
 * @since  1.0
 */

add_action( 'wp_ajax_trawell_hide_welcome', 'trawell_hide_welcome' );

if ( !function_exists( 'trawell_hide_welcome' ) ):
	function trawell_hide_welcome() {
		update_option( 'trawell_welcome_box_displayed', true );
		wp_die();
	}
endif;


?>