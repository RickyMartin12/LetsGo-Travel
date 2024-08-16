<?php

/**
 * After Theme Setup
 *
 * Callback for after_theme_setup hook
 *
 * @since  1.0
 */

add_action( 'after_setup_theme', 'trawell_theme_setup' );

function trawell_theme_setup() {
	
	/* Define content width */
	$GLOBALS['content_width'] = 1194;
	
	/* Localization */
	load_theme_textdomain( 'trawell', get_parent_theme_file_path( '/languages' ) );
	
	/* Add thumbnails support */
	add_theme_support( 'post-thumbnails' );
	
	/* Add post formats support */
	add_theme_support( 'post-formats', array( 'audio', 'gallery', 'video' ) );
	
	/* Add theme support for title tag */
	add_theme_support( 'title-tag' );
	
	/* Add image sizes */
	$image_sizes = trawell_get_image_sizes();
	if ( !empty( $image_sizes ) ) {
		foreach ( $image_sizes as $id => $size ) {
			add_image_size( $id, $size['w'], $size['h'], $size['crop'] );
		}
	}
	
	/* Support for HTML5 */
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	
	/* Automatic Feed Links */
	add_theme_support( 'automatic-feed-links' );
	
	/* Declare WooCommerce support */
	add_theme_support( 'woocommerce' );
	
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	
	/* Load editor styles */
	if ( is_admin() && trawell_get_option('editor_style') ) {
		trawell_load_editor_styles();
	}
}


/**
 * Check all display settings from theme options
 * and store globally so we can access it from any template file
 *
 * @since  1.0
 */

add_action( 'template_redirect', 'trawell_setup' );

if ( ! function_exists( 'trawell_setup' ) ):
	function trawell_setup() {
		
		$defaults = array(
			'header_show' => true,
			'footer_show' => true,
			'sidebar'     => array(
				'position' => 'none',
				'classic'  => '',
				'sticky'   => '',
			),
		);
	
		if ( is_front_page() && get_option('show_on_front') != 'posts' ) {
			$trawell = trawell_get_frontpage_template_options();
		} elseif (trawell_is_woocommerce_page()){
			$trawell = trawell_get_woocommerce_template_options();
		} elseif ( is_404() ) {
			$trawell = trawell_get_404_template_options();
		}  elseif ( is_single() ) {
			$trawell = trawell_get_single_template_options();
		} elseif ( is_page_template('template-authors.php') ) {
			$trawell = trawell_get_authors_page_template_options();
		} elseif ( is_page_template('template-blank.php') ) {
			$trawell = trawell_get_blank_template_options();
		} elseif ( is_page() ) {
			$trawell = trawell_get_page_template_options();
		} elseif ( is_category() ) {
			$trawell = trawell_get_category_template_options();
		} else {
			$trawell = trawell_get_archive_template_options();
		}
		
		$trawell['header'] = trawell_get_header_options();
		$trawell['footer'] = trawell_get_footer_options();
		
		$trawell = trawell_parse_args($trawell, $defaults);

		$trawell = apply_filters( 'trawell_modify_setup', $trawell );
		
		set_query_var( 'trawell', $trawell );

		//print_r( $trawell );
		
		return $trawell;
	}
endif;