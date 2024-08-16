<?php
/**
 * Load embedded Redux Framework
 */

if ( ! class_exists( 'ReduxFramework' ) ) {
	return;
}

/**
 * Redux params
 */

$opt_name = 'trawell_settings';

$args = array(
	'opt_name'             => $opt_name,
	'display_name'         => wp_kses_post( sprintf( __( 'Trawell Options%sTheme Documentation%s', 'trawell' ), '<a href="https://mekshq.com/documentation/trawell/" target="_blank">', '</a>' )),
	'display_version'      => trawell_get_update_notification(),
	'menu_type'            => 'menu',
	'allow_sub_menu'       => true,
	'menu_title'           => esc_html__( 'Theme Options', 'trawell' ),
	'page_title'           => esc_html__( 'Trawell Options', 'trawell' ),
	'google_api_key'       => '',
	'google_update_weekly' => false,
	'async_typography'     => true,
	'admin_bar'            => true,
	'admin_bar_icon'       => 'dashicons-admin-generic',
	'admin_bar_priority'   => '100',
	'global_variable'      => '',
	'dev_mode'             => false,
	'update_notice'        => false,
	'customizer'           => false,
	'allow_tracking' => false,
	'ajax_save' => false,
	'page_priority'        => '27.11',
	'page_parent'          => 'themes.php',
	'page_permissions'     => 'manage_options',
	'menu_icon'            => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCAyMjYuOCA2ODAuMyIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMjI2LjggNjgwLjMiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxwYXRoIGZpbGw9IiM5RkE0QTkiIGQ9Ik0xNjYuOCw0MDJsLTMtODUuN2wzNC4yLTI4LjVjNy4xLTUuOSw4LTE2LjQsMi4xLTIzLjRzLTE2LjQtOC0yMy40LTIuMWwtMzQuMiwyOC41bC04My44LTE4LjVjMCwwLTYuMi0xLjctOSwwLjZsLTQuNiwzLjhjLTEuNSwxLTIuMiwyLjgtMS44LDQuNmMwLjMsMS45LDQuOCw0LjIsNi40LDUuMWw1NS44LDM1LjNsLTM4LjYsMzIuMWwtMjkuNi03Yy0xLjgtMC41LTMuNy0wLjEtNS4xLDEuMmwtNy45LDYuNmMtMSwwLjktMy4xLDMsMC45LDUuM2wzNi45LDE5LjRsMTIuNCwzOS45YzEuNyw0LjYsNC4zLDIuNSw1LDEuOWw3LjktNi42YzEuNS0xLjEsMi4zLTIuOSwyLjEtNC44bC0xLjUtMzAuNGwzOC42LTMyLjFsMjQuNCw2MS41YzAuNiwxLjcsMi4zLDYuMywzLjgsNy4yYzEuNywwLjcsMy42LDAuMyw0LjgtMWw0LjktNEMxNjcuNCw0MDguNCwxNjYuOCw0MDIsMTY2LjgsNDAyTDE2Ni44LDQwMnoiLz48L3N2Zz4=',
	'last_tab'             => '',
	'page_icon'            => 'icon-themes',
	'page_slug'            => 'trawell_options',
	'save_defaults'        => true,
	'default_show'         => false,
	'default_mark'         => '',
	'show_import_export'   => true,
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => false,
	'output_tag'           => true,
	'database'             => '',
	'system_info'          => false
);

$GLOBALS['redux_notice_check'] = 1;

/**
 * Initialize Redux
 */

Redux::setArgs( $opt_name , $args );

/**
 * Include redux option fields (settings)
 */

include_once get_parent_theme_file_path( '/core/admin/options-fields.php' );
/**
 * Check if there is available theme update
 *
 * @return string HTML output with update notification and the link to change log
 * @since  1.0
 */
function trawell_get_update_notification() {
	$current = get_site_transient( 'update_themes' );
	$message_html = '';
	if ( isset( $current->response['trawell'] ) ) {
		$message_html = '<span class="update-message">New update available!</span>
            <span class="update-actions">Version '.$current->response['trawell']['new_version'].': <a href="https://mekshq.com/docs/trawell-change-log" target="blank">See what\'s new</a><a href="'.admin_url( 'update-core.php' ).'">Update</a></span>';
	}
	
	return $message_html;
}

/**
 * Append custom css to redux framework admin panel
 *
 * @since  1.0
 */
if ( !function_exists( 'trawell_redux_custom_css' ) ):
	function trawell_redux_custom_css() {
		wp_register_style( 'trawell-redux-custom', get_parent_theme_file_uri( '/assets/css/admin/options.css' ), array( 'redux-admin-css' ), TRAWELL_THEME_VERSION, 'all' );
		wp_enqueue_style( 'trawell-redux-custom' );
	}
endif;

add_action( 'redux/page/trawell_settings/enqueue', 'trawell_redux_custom_css' );

/**
 * Remove redux framework admin page from admin menu
 *
 * @since  1.0
 */

add_action( 'admin_menu', 'trawell_remove_redux_page', 99 );

if ( !function_exists( 'trawell_remove_redux_page' ) ):
	function trawell_remove_redux_page() {
		remove_submenu_page( 'tools.php', 'redux-about' );
		
	}
endif;


/* Prevent redux auto redirect */ 
update_option( 'redux_version_upgraded_from', 100 );


/* More redux cleanup, blah... */

add_action('init', 'trawell_redux_cleanup');

if ( !function_exists( 'trawell_redux_cleanup' ) ):
function trawell_redux_cleanup() {
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }

    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
endif;


/**
 * Add our Sidebar generator custom field to redux
 *
 * @since  1.0
 */

if ( !function_exists( 'trawell_sidgen_field_path' ) ):
	function trawell_sidgen_field_path($field) {
		return get_template_directory() . '/core/admin/options-custom-fields/sidgen/field_sidgen.php';
	}
endif;

add_filter( "redux/trawell_settings/field/class/sidgen", "trawell_sidgen_field_path" );


/**
 * Add our Radio buttons with option to disable them generator for custom field to redux
 *
 * @since  1.0
 */

if ( !function_exists( 'trawell_rwdo_field_path' ) ):
	function trawell_rwdo_field_path($field) {
		return get_template_directory() . '/core/admin/options-custom-fields/rwdo/field_rwdo.php';
	}
endif;

add_filter( "redux/trawell_settings/field/class/rwdo", "trawell_rwdo_field_path" );


/**
 * Add our Radio buttons with option to disable them generator for custom field to redux
 *
 * @since  1.0
 */

if ( !function_exists( 'trawell_section_field_path' ) ):
	function trawell_section_field_path($field) {
		return get_template_directory() . '/core/admin/options-custom-fields/section/section.php';
	}
endif;

add_filter( "redux/trawell_settings/field/class/trawell_section", "trawell_section_field_path" );


?>