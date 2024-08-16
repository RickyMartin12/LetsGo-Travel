<?php

include_once get_parent_theme_file_path( '/inc/merlin/vendor/autoload.php' );
include_once get_parent_theme_file_path( '/inc/merlin/merlin.php');

/**
 * Merlin WP configuration file.
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

$strings = array(
	'admin-menu'               => esc_html__( 'Trawell Setup Wizard', 'trawell' ),
	'title%s%s%s%s'            => esc_html__( '%s%s Themes &lsaquo; Theme Setup: %s%s', 'trawell' ),
	
	'return-to-dashboard' => esc_html__( 'Return to the dashboard', 'trawell' ),
	
	'btn-skip'                  => esc_html__( 'Skip', 'trawell' ),
	'btn-next'                  => esc_html__( 'Next', 'trawell' ),
	'btn-start'                 => esc_html__( 'Start', 'trawell' ),
	'btn-no'                    => esc_html__( 'Cancel', 'trawell' ),
	'btn-plugins-install'       => esc_html__( 'Install', 'trawell' ),
	'btn-theme-license-install' => esc_html__( 'Activate', 'trawell' ),
	'btn-child-install'         => esc_html__( 'Install', 'trawell' ),
	'btn-content-install'       => esc_html__( 'Install', 'trawell' ),
	'btn-import'                => esc_html__( 'Import', 'trawell' ),
	
	'welcome-header%s'         => esc_html__( 'Welcome to %s', 'trawell' ),
	'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'trawell' ),
	'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'trawell' ),
	'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'trawell' ),
	
	'theme-license-header'         => esc_html__( 'Register theme', 'trawell' ),
	'theme-license-header-success' => esc_html__( 'You\'re good to go!', 'trawell' ),
	'theme-license'                => esc_html__( 'Input the theme license key and activate it, to unlock the theme\'s full potential.', 'trawell' ),
	'theme-license-label'          => esc_html__( 'License key:', 'trawell' ),
	'theme-license-success%s'      => esc_html__( 'The theme is already registered, so you can go to the next step!', 'trawell' ),
	'theme-license-action-link'    => esc_html__( 'Where can I find the license key?', 'trawell' ),
	
	'child-header'         => esc_html__( 'Install Child Theme', 'trawell' ),
	'child-header-success' => esc_html__( 'You\'re good to go!', 'trawell' ),
	'child'                => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'trawell' ),
	'child-success%s'      => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'trawell' ),
	'child-action-link'    => esc_html__( 'Learn about child themes', 'trawell' ),
	'child-json-success%s' => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'trawell' ),
	'child-json-already%s' => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'trawell' ),
	
	'plugins-header'         => esc_html__( 'Install Plugins', 'trawell' ),
	'plugins-header-success' => esc_html__( 'You\'re up to speed!', 'trawell' ),
	'plugins'                => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'trawell' ),
	'plugins-success%s'      => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'trawell' ),
	'plugins-action-link'    => esc_html__( 'Plugins', 'trawell' ),
	
	'import-header'      => esc_html__( 'Import Content', 'trawell' ),
	'import'             => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'trawell' ),
	'import-action-link' => esc_html__( 'Details', 'trawell' ),
	
	'ready-header'      => esc_html__( 'All done. Have fun!', 'trawell' ),
	'ready%s'           => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'trawell' ),
	'ready-action-link' => esc_html__( 'Extras', 'trawell' ),
	'ready-big-button'  => esc_html__( 'View your website', 'trawell' ),
	
	'ready-link-3' => '',
	'ready-link-2' => wp_kses( sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://mekshq.com/documentation/trawell/', esc_html__( 'Theme Documentation', 'trawell' ) ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
);

if(trawell_is_redux_active()){
	$strings['ready-link-1'] = wp_kses( sprintf( '<a href="'.admin_url( 'admin.php?page=trawell_options' ).'" target="_blank">%s</a>', esc_html__( 'Start Customizing', 'trawell' ) ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) );
}

/**
 * Set directory locations, text strings, and other settings for Merlin WP.
 *
 * @since 1.0
 */
$trawell_wizard = new Merlin(
	// Configure Merlin with custom settings.
	$config = array(
		'directory'                => 'inc', 
		'merlin_url'               => 'trawell-importer',
		'dev_mode'                 => false,
		'branding'                 => false
	),
	$strings
	// Text strings.
	
);


/**
 * Prepare files to import
 *
 * @since 1.0
 */
add_filter( 'merlin_import_files', 'trawell_demo_import_files' );

if(!function_exists('trawell_demo_import_files')):
	function trawell_demo_import_files() {
			return array(
				array(
					'import_file_name'         => 'Trawell default',
					'import_preview_image_url' => get_parent_theme_file_uri( '/screenshot.png' ),
					'preview_url'              => 'https://demo.mekshq.com/trawell/',
					'local_import_file'        => get_parent_theme_file_path( '/inc/demo/default/content.xml' ),
					'local_import_widget_file' => get_parent_theme_file_path( '/inc/demo/default/widgets.wie' ),
					'local_import_redux'       => array(
						array(
							'file_path'   => get_parent_theme_file_path( '/inc/demo/default/options.json' ),
							'option_name' => 'trawell_settings',
						),
					),
				),
				array(
					'import_file_name'         => 'Trawell blog',
					'import_preview_image_url' => get_parent_theme_file_uri( '/screenshot.png' ),
					'preview_url'              => 'https://demo.mekshq.com/trawell/v1',
					'local_import_file'        => get_parent_theme_file_path( '/inc/demo/blog/content.xml' ),
					'local_import_widget_file' => get_parent_theme_file_path( '/inc/demo/blog/widgets.wie' ),
					'local_import_redux'       => array(
						array(
							'file_path'   => get_parent_theme_file_path( '/inc/demo/blog/options.json' ),
							'option_name' => 'trawell_settings',
						),
					),
				),
				array(
					'import_file_name'         => 'Trawell guide',
					'import_preview_image_url' => get_parent_theme_file_uri( '/screenshot.png' ),
					'preview_url'              => 'https://demo.mekshq.com/trawell/v2',
					'local_import_file'        => get_parent_theme_file_path( '/inc/demo/guide/content.xml' ),
					'local_import_widget_file' => get_parent_theme_file_path( '/inc/demo/guide/widgets.wie' ),
					'local_import_redux'       => array(
						array(
							'file_path'   => get_parent_theme_file_path( '/inc/demo/guide/options.json' ),
							'option_name' => 'trawell_settings',
						),
					),
				),
				array(
					'import_file_name'         => 'Trawell fashion',
					'import_preview_image_url' => get_parent_theme_file_uri( '/screenshot.png' ),
					'preview_url'              => 'https://demo.mekshq.com/trawell/v3',
					'local_import_file'        => get_parent_theme_file_path( '/inc/demo/fashion/content.xml' ),
					'local_import_widget_file' => get_parent_theme_file_path( '/inc/demo/fashion/widgets.wie' ),
					'local_import_redux'       => array(
						array(
							'file_path'   => get_parent_theme_file_path( '/inc/demo/fashion/options.json' ),
							'option_name' => 'trawell_settings',
						),
					),
				),
			);
	}
endif;

/**
 * Execute custom code after the whole import has finished.
 *
 * @since 1.0
 */
add_action( 'merlin_after_all_import', 'trawell_merlin_after_import_setup' );
if(!function_exists('trawell_merlin_after_import_setup')):
	
	function trawell_merlin_after_import_setup( $selected_import_index ) {
		
		/* Set Menus */
		$menus = array();
		
		$main_menu_1 = get_term_by( 'name', 'Main 1', 'nav_menu' );
		if ( isset( $main_menu_1->term_id ) ) {
			$menus['trawell_menu_primary_1'] = $main_menu_1->term_id;
		}
		
		$main_menu_2 = get_term_by( 'name', 'Main 2', 'nav_menu' );
		if ( isset( $main_menu_2->term_id ) ) {
			$menus['trawell_menu_primary_2'] = $main_menu_2->term_id;
		}
		
		$social_menu = get_term_by( 'name', 'Social', 'nav_menu' );
		if ( isset( $social_menu->term_id ) ) {
			$menus['trawell_menu_social'] = $social_menu->term_id;
		}

		$prefooter_menu = get_term_by( 'name', 'Destinations', 'nav_menu' );
		if ( isset( $prefooter_menu->term_id ) ) {
			$menus['trawell_menu_prefooter'] = $prefooter_menu->term_id;
		}

		$secondary_menu_1 = get_term_by( 'name', 'Top bar', 'nav_menu' );
		if ( isset( $secondary_menu_1->term_id ) ) {
			$menus['trawell_menu_secondary_1'] = $secondary_menu_1->term_id;
		}
		
		if ( !empty( $menus ) ) {
			set_theme_mod( 'nav_menu_locations', $menus );
		}
		
		/* Set Home Page */
		
		$home_page = get_page_by_title( 'Trawell Home' );
		
		if ( isset( $home_page->ID ) ) {
			update_option( 'page_on_front', $home_page->ID );
			update_option( 'show_on_front', 'page' );
		}

		/* Set Blog Page */
		
		
		$blog_page = get_page_by_title( 'Trawell Blog');
		
		if ( isset( $home_page->ID ) ) {
			update_option( 'page_for_posts', $blog_page->ID );
			update_option( 'show_on_front', 'page' );
		}


		/* Apply category colors */

		$categories = get_categories( array('hide_empty' => 0, 'number' => 0) );

		if(!empty($categories)){

			$colors = array();
			
			foreach($categories as $category){
				$color = trawell_get_category_meta($category->term_id, 'color');
				if($color['type'] != 'inherit'){
					$colors[$category->term_id] = $color['value'];
				}
			}

			if(!empty($colors)){
				update_option( 'trawell_cat_colors', $colors );
			}
		}

	}

endif;


/**
 * Unset the child theme generator step in merlin welcome panel
 *
 * @param $steps
 * @return mixed
 * @since 1.0
 */

add_filter('trawell_merlin_steps', 'trawell_remove_child_theme_generator_from_merlin');

if(!function_exists('trawell_remove_child_theme_generator_from_merlin')):
    function trawell_remove_child_theme_generator_from_merlin($steps){
        unset($steps['child']);
        return $steps;
    }
endif;


/**
 * Stop initial redirect after theme is activated
 *
 * @since 1.0
 */

remove_action( 'after_switch_theme', array( $trawell_wizard, 'switch_theme' ) );
remove_action( 'upgrader_post_install', array( $trawell_wizard, 'post_install_check' ), 10, 2 );
?>