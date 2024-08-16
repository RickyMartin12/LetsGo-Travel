<?php


/**
 * Theme update check
 *
 * @return void
 * @since  1.0
 */

add_action( 'admin_init', 'trawell_run_updater' );

if ( !function_exists( 'trawell_run_updater' ) ):
	function trawell_run_updater() {

		$user = trawell_get_option( 'theme_update_username' );
		$apikey = trawell_get_option( 'theme_update_apikey' );
		if ( !empty( $user ) && !empty( $apikey ) ) {
			include_once get_template_directory() .'/inc/updater/class-pixelentity-theme-update.php';
			PixelentityThemeUpdate::init( $user, $apikey );
		}
	}
endif;



/**
 * Change customize link to lead to theme options instead of live customizer 
 *
 * @since  1.0
 */

add_filter( 'wp_prepare_themes_for_js', 'trawell_change_customize_link' );

if ( !function_exists( 'trawell_change_customize_link' ) ):
	function trawell_change_customize_link( $themes ) {
		if ( array_key_exists( 'trawell', $themes ) ) {
			$themes['trawell']['actions']['customize'] = admin_url( 'admin.php?page=trawell_options' );
		}
		return $themes;
	}
endif;

/**
 * Display theme admin notices
 *
 * @since  1.0
 */

add_action( 'admin_init', 'trawell_check_installation' );

if ( !function_exists( 'trawell_check_installation' ) ):
	function trawell_check_installation() {
		add_action( 'admin_notices', 'trawell_welcome_msg', 1 );
		add_action( 'admin_notices', 'trawell_update_msg', 1 );
		add_action( 'admin_notices', 'trawell_required_plugins_msg', 30 );

		//delete_option( 'trawell_welcome_box_displayed');
		//delete_option( 'merlin_trawell_completed' );
	}
endif;


/**
 * Display welcome message and quick tips after theme activation
 *
 * @since  1.0
 */

if ( !function_exists( 'trawell_welcome_msg' ) ):
	function trawell_welcome_msg() {
		
		if ( get_option( 'trawell_welcome_box_displayed' ) ||  get_option( 'merlin_trawell_completed' )) {
			return false;
		}

		update_option( 'trawell_theme_version', TRAWELL_THEME_VERSION );
		include_once get_parent_theme_file_path( '/core/admin/welcome-panel.php' );
	}
endif;


/**
 * Display message when new version of the theme is installed/updated
 *
 * @since  1.0
 */

if ( !function_exists( 'trawell_update_msg' ) ):
	function trawell_update_msg() {

		if ( !get_option( 'trawell_welcome_box_displayed' ) && !get_option( 'merlin_trawell_completed' ) ) {
			return false;
		}

		$prev_version = get_option( 'trawell_theme_version', '0.0.0');

		if ( version_compare( TRAWELL_THEME_VERSION, $prev_version, '>' ) ) {
			include_once get_parent_theme_file_path( '/core/admin/update-panel.php' );
		}

	}
endif;

/**
 * Display message if required plugins are not installed and activated
 *
 * @since  1.0
 */

if ( !function_exists( 'trawell_required_plugins_msg' ) ):
	function trawell_required_plugins_msg() {

		if ( !get_option( 'trawell_welcome_box_displayed' ) && !get_option( 'merlin_trawell_completed' ) ) {
			return false;
		}

		if(!trawell_is_redux_active()){
			$class = 'notice notice-error';
			$message = sprintf( __( 'Important: Redux Framework plugin is required to run your theme options panel. Please visit <a href="%s">recommended plugins page</a> to install it.', 'trawell' ), admin_url( 'admin.php?page=trawell-plugins' ) );
			printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message); 
		}

	}
endif;



/**
 * Add widget form options
 *
 * Add custom options to each widget
 *
 * @return void
 * @since  1.0
 */

add_action( 'in_widget_form', 'trawell_add_widget_form_options', 10, 3 );

if ( !function_exists( 'trawell_add_widget_form_options' ) ) :

	function trawell_add_widget_form_options(  $widget, $return, $instance) {

	if(!isset($instance['trawell-highlight'])){
		$instance['trawell-highlight'] = 0;
	}

	if(!isset($instance['trawell-no-padding'])){
		$instance['trawell-no-padding'] = 0;
	}

	$exclude =  array();

?>
	
	<p class="trawell-opt-highlight">
		<label for="<?php echo esc_attr( $widget->get_field_id( 'trawell-highlight' )); ?>">
			<input type="checkbox" id="<?php echo esc_attr($widget->get_field_id( 'trawell-highlight' )); ?>" name="<?php echo esc_attr($widget->get_field_name( 'trawell-highlight' )); ?>" value="1" <?php checked($instance['trawell-highlight'], 1); ?> />
			<?php esc_html_e( 'Highlight this widget', 'trawell');?>
		</label>
		<small class="howto"><?php  echo wp_kses( sprintf( __( 'Display widget in <a href="%s">highlight styling</a>.', 'trawell' ), admin_url( 'admin.php?page=trawell_options&tab=7' ) ), wp_kses_allowed_html( 'post' ));?></small>
	</p>

		
	<?php if(!in_array( $widget->id_base , $exclude ) ) : ?>	
		
			<p class="trawell-opt-no-padding">
				<label for="<?php echo esc_attr( $widget->get_field_id( 'trawell-no-padding' )); ?>">
					<input type="checkbox" id="<?php echo esc_attr($widget->get_field_id( 'trawell-no-padding' )); ?>" name="<?php echo esc_attr($widget->get_field_name( 'trawell-no-padding' )); ?>" value="1" <?php checked($instance['trawell-no-padding'], 1); ?> />
					<?php esc_html_e( 'Unwrap this widget', 'trawell'); ?>
					<small class="howto"><?php esc_html_e( 'Check this option if you want to remove widget container box', 'trawell');?></small>
				</label>
			</p>

	<?php endif; ?>

<?php
	
	}

endif;


/**
 * Save widget form options
 *
 * Save custom options to each widget
 *
 * @return void
 * @since  1.0
 */

add_filter( 'widget_update_callback', 'trawell_save_widget_form_options', 20, 2 );

if ( !function_exists( 'trawell_save_widget_form_options' ) ) :

	function trawell_save_widget_form_options( $instance, $new_instance ) {
		
		$instance['trawell-highlight'] = isset( $new_instance['trawell-highlight'] ) ? 1 : 0;
		$instance['trawell-no-padding'] = isset( $new_instance['trawell-no-padding'] ) ? 1 : 0;
		return $instance;

	}

endif;

/**
 * Store registered sidebars so we can use them inside theme options
 * before wp_registered_sidebars globa is initialized
 *
 * @since  1.0
 */

add_action( 'admin_init', 'trawell_check_sidebars' );

if ( !function_exists( 'trawell_check_sidebars' ) ):
	function trawell_check_sidebars() {
		global $wp_registered_sidebars;
		if ( !empty( $wp_registered_sidebars ) ) {
			update_option( 'trawell_registered_sidebars', $wp_registered_sidebars );
		}
	}
endif;

/**
 * 
 * Change default arguments of author widget plugin
 *
 * @since  1.0
 */

add_filter( 'mks_author_widget_modify_defaults', 'trawell_author_widget_defaults' );

if ( !function_exists( 'trawell_author_widget_defaults' ) ):
	function trawell_author_widget_defaults( $defaults ) {
		$defaults['avatar_size'] = 100;
		$defaults['display_all_posts'] = 0;
		return $defaults;
	}
endif;


/**
 * Change default arguments of social widget plugin
 *
 * @since  1.0
 */

add_filter( 'mks_social_widget_modify_defaults', 'trawell_social_widget_defaults' );

if ( !function_exists( 'trawell_social_widget_defaults' ) ):
	function trawell_social_widget_defaults( $defaults ) {
		$defaults['size'] = 65;
		return $defaults;
	}
endif;


/**
 * Change default arguments of social widget plugin
 *
 * @since  1.0
 */

add_filter( 'mks_flickr_widget_modify_defaults', 'trawell_flickr_widget_defaults' );

if ( !function_exists( 'trawell_flickr_widget_defaults' ) ):
	function trawell_flickr_widget_defaults( $defaults ) {

		$defaults['count'] = 16;
		$defaults['t_width'] = 82;
		$defaults['t_height'] = 82;
		
		return $defaults;
	}
endif;

/**
 * Change default arguments of instagram widget plugin
 *
 * @since  1.0
 */

add_filter( 'meks_instagram_widget_modify_defaults', 'trawell_instagram_widget_defaults' );

if ( !function_exists( 'trawell_instagram_widget_defaults' ) ):
	function trawell_instagram_widget_defaults( $defaults ) {

		$defaults['photos_number'] = 9;
		$defaults['columns'] = 3;
		$defaults['photo_space'] = 1;
		
		return $defaults;
	}
endif;


/**
 * Add Meks dashboard widget
 *
 * @since  1.0
 */

add_action( 'wp_dashboard_setup', 'trawell_add_dashboard_widgets' );

if ( !function_exists( 'trawell_add_dashboard_widgets' ) ):
	function trawell_add_dashboard_widgets() {
		add_meta_box( 'trawell_dashboard_widget', 'Meks - WordPress Themes & Plugins', 'trawell_dashboard_widget_cb', 'dashboard', 'side', 'high' );
	}
endif;

/**
 * Meks dashboard widget
 *
 * @since  1.0
 */
if ( !function_exists( 'trawell_dashboard_widget_cb' ) ):
	function trawell_dashboard_widget_cb() {
		$hide = false;
		if ( $data = get_transient( 'trawell_mksaw' ) ) {
			if ( $data != 'error' ) {
				echo $data;
			} else {
				$hide = true;
			}
		} else {
			$url = 'https://demo.mekshq.com/mksaw.php';
			$args = array( 'body' => array( 'key' => md5( 'meks' ), 'theme' => 'trawell' ) );
			$response = wp_remote_post( $url, $args );
			if ( !is_wp_error( $response ) ) {
				$json = wp_remote_retrieve_body( $response );
				if ( !empty( $json ) ) {
					$json = json_decode( $json );
					if ( isset( $json->data ) ) {
						echo $json->data;
						set_transient( 'trawell_mksaw', $json->data, 86400 );
					} else {
						set_transient( 'trawell_mksaw', 'error', 86400 );
						$hide = true;
					}
				} else {
					set_transient( 'trawell_mksaw', 'error', 86400 );
					$hide = true;
				}

			} else {
				set_transient( 'trawell_mksaw', 'error', 86400 );
				$hide = true;
			}
		}

		if ( $hide ) {
			echo '<style>#trawell_dashboard_widget {display:none;}</style>'; //hide widget if data is not returned properly
		}

	}
endif;

/**
 * Remove pin color and cluster color settings from Meks Easy Maps plugin settings page
 *
 * @since  1.0
 */
add_filter('mks_map_modify_settings_fields', 'trawell_exclude_styling_fields_from_maps_plugin');
if(!function_exists('trawell_exclude_styling_fields_from_maps_plugin')):
    function trawell_exclude_styling_fields_from_maps_plugin($fields){
        
        unset($fields['pinColor']);
        unset($fields['clusterColor']);
        unset($fields['single_map']);
        unset($fields['category_map']);
        
        return $fields;
    }
endif;
?>