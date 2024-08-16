<?php

/* Load frontend scripts and styles */
add_action( 'wp_enqueue_scripts', 'trawell_load_scripts' );

/**
 * Load scripts and styles on frontend
 *
 * It just wraps two other separate functions for loading css and js files
 *
 * @since  1.0
 */

function trawell_load_scripts() {
	trawell_load_css();
	trawell_load_js();
}

/**
 * Load frontend css files
 *
 * @since  1.0
 */

function trawell_load_css() {

	
	//Load fonts
	if ( $fonts_link = trawell_generate_fonts_link() ) {
		wp_enqueue_style( 'trawell-fonts', $fonts_link, false, TRAWELL_THEME_VERSION );
	}

	//Check if is minified option active and load appropriate files
	if ( trawell_get_option( 'minify_css' ) ) {

		wp_enqueue_style( 'trawell-main', get_parent_theme_file_uri( '/assets/css/min.css' ) , false, TRAWELL_THEME_VERSION );

	} else {

		$styles = array(
			'bootstrap-reboot' => 'bootstrap-reboot.css',
			'bootstrap-grid' => 'bootstrap-grid.css',
			'iconfont' => 'trawell-iconfont.css',
			'photoswipe' => 'photoswipe.css',
			'photoswipe-skin' => 'photoswipe-default-skin.css',
			'owl-carousel' => 'owl-carousel.css',
			'main' => 'main.css'
		);

		foreach ( $styles as $id => $style ) {
			wp_enqueue_style( 'trawell-' . $id, get_parent_theme_file_uri( '/assets/css/'. $style ) , false, TRAWELL_THEME_VERSION );
		}
	}

	//Append dynamic css
	wp_add_inline_style( 'trawell-main', trawell_generate_dynamic_css() );
	

    if( trawell_is_woocommerce_active() ){
    	wp_enqueue_style( 'trawell-woocommerce', get_parent_theme_file_uri( '/assets/css/trawell-woocommerce.css' ) , false, TRAWELL_THEME_VERSION );
	}

	//Load RTL css
	if ( trawell_is_rtl() ) {
		wp_enqueue_style( 'trawell-rtl', get_parent_theme_file_uri('/assets/css/rtl.css' ) , array( 'trawell-main' ), TRAWELL_THEME_VERSION );
	}


}


/**
 * Load frontend js files
 *
 * @since  1.0
 */

function trawell_load_js() {

	//Check if is minified option active and load appropriate files
	if ( trawell_get_option( 'minify_js' ) ) {

		wp_enqueue_script( 'trawell-main', get_parent_theme_file_uri('/assets/js/min.js') , array( 'jquery', 'imagesloaded' ), TRAWELL_THEME_VERSION, true );

	} else {

		$scripts = array(
			'photoswipe' => 'photoswipe.js',
			'photoswipe-ui' => 'photoswipe-ui-default.js',
			'owl-carousel' => 'owl-carousel.js',
			'sticky-kit' => 'sticky-kit.js',
			'fitvids' => 'fitvids.js',
			'object-fit' => 'ofi.js',
			'picturefill' => 'picturefill.js',
			'main' => 'main.js'
		);

		foreach ( $scripts as $id => $script ) {
			wp_enqueue_script( 'trawell-'.$id, get_parent_theme_file_uri( '/assets/js/'. $script ), array( 'jquery', 'imagesloaded' ), TRAWELL_THEME_VERSION, true );
		}
	}

	//Load JS settings object
	wp_localize_script( 'trawell-main', 'trawell_js_settings', trawell_get_js_settings() );

	//Add inline JS if user added custom code in theme options
	$additional_js = trim( preg_replace( '/\s+/', ' ', trawell_get_option( 'additional_js' ) ) );

	if ( !empty( $additional_js ) ) {
		wp_add_inline_script( 'trawell-main', $additional_js );
	}

	//Load comment reply js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
?>