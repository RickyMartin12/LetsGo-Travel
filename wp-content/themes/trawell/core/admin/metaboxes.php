<?php

/**
 * Metaboxes setup
 * 
 * @since  1.0
 */

add_action( 'load-post.php', 'trawell_meta_boxes_setup' );
add_action( 'load-post-new.php', 'trawell_meta_boxes_setup' );

if ( !function_exists( 'trawell_meta_boxes_setup' ) ) :
	function trawell_meta_boxes_setup() {
		global $typenow;

		if ( $typenow == 'post' ) {
			add_action( 'add_meta_boxes', 'trawell_load_post_metaboxes' );
			add_action( 'save_post', 'trawell_save_post_metaboxes', 10, 2 );
		}
		if( $typenow == 'page'){

			if(isset($_GET['post']) && in_array($_GET['post'], array( get_option('page_for_posts'), get_option('page_on_front') ) )  && get_option('show_on_front') != 'posts' ){
				return false;
			}

			add_action( 'add_meta_boxes', 'trawell_load_page_metaboxes' );
			add_action( 'save_post', 'trawell_save_page_metaboxes', 10, 2 );
		}
	}
endif;

include_once get_parent_theme_file_path( '/core/admin/metaboxes/page.php' );
include_once get_parent_theme_file_path( '/core/admin/metaboxes/post.php' );
include_once get_parent_theme_file_path( '/core/admin/metaboxes/category.php' );

?>