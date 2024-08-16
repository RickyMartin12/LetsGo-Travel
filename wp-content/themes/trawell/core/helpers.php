<?php

/**
 * Debug (log) function
 *
 * Outputs any content into log file in theme root directory
 *
 * @param mixed   $mixed Content to output
 * @since  1.0
 */

if ( !function_exists( 'trawell_log' ) ):
	function trawell_log( $mixed ) {

		if ( is_array( $mixed ) ) {
		$mixed = print_r( $mixed, 1 );
	} else if ( is_object( $mixed ) ) {
			ob_start();
			var_dump( $mixed );
			$mixed = ob_get_clean();
	}

	$handle = fopen( get_parent_theme_file_path('log'), 'a' );
	fwrite( $handle, $mixed . PHP_EOL );
	fclose( $handle );
	}
endif;


/**
 * Get default option by passing option id or don't pass anything to function and get all options
 *
 * @param null    $option
 * @return array|mixed|null
 * @param since   1.0
 */
if ( !function_exists( 'trawell_get_default_option' ) ):
	function trawell_get_default_option( $option = null ) {

		$defaults = array(
			/**
			 * Header
			 */
			//  Main Area
			'header_layout' => 2,
			'header_site_desc' => 0,
			'header_actions' => array(
				'search-drop' => 0,
				'social-drop' => 0,
				'menu-social' => 0
			),
			'header_height' => 90,
			'color_header_main_bg' => '#ffffff',
			'color_header_main_txt' => '#333333',
			'color_header_main_acc' => '#08b7ce',
			'header_orientation' => 'container-full',
			'header_indent' => true,
			'cover_height' => 730,
			// Branding
			'header_indent_logo_alt' => true,
			'logo_alt' => array( 'url' => esc_url( get_parent_theme_file_uri('/assets/img/trawell_logo_white.png' ) ) ),
			'logo_retina_alt' => array( 'url' => esc_url( get_parent_theme_file_uri('/assets/img/trawell_logo_white@2x.png' ) ) ),
			'logo_mini_alt' => array( 'url' => esc_url( get_parent_theme_file_uri('/assets/img/trawell_logo_white_mini.png' ) ) ),
			'logo_mini_retina_alt' => array( 'url' => esc_url( get_parent_theme_file_uri('/assets/img/trawell_logo_white_mini@2x.png' ) ) ),
			'logo' => array( 'url' => esc_url( get_parent_theme_file_uri('/assets/img/trawell_logo.png' ) ) ),
			'logo_retina' => array( 'url' => esc_url( get_parent_theme_file_uri('/assets/img/trawell_logo@2x.png' ) ) ),
			'logo_mini' => array( 'url' => esc_url( get_parent_theme_file_uri('/assets/img/trawell_logo_mini.png' ) ) ),
			'logo_mini_retina' => array( 'url' => esc_url( get_parent_theme_file_uri('/assets/img/trawell_logo_mini@2x.png' ) ) ),
			'logo_custom_url' => '',

			// Top bar
			'header_top' => false,
			'header_top_height' => 40,
			'color_header_top_bg' => '#f9f9f9',
			'color_header_top_txt' => '#4A4A4A',
			'color_header_top_acc' => '#098DA3',
			'header_top_l' => 'menu-secondary-1',
			'header_top_c' => '0',
			'header_top_r' => 'menu-social',

			// Sticky
			'header_sticky' => true,
			'header_sticky_offset' => 500,
			'header_sticky_up' => false,
			'header_sticky_logo' => 'mini',
			
			// Responsive
            'header_responsive_secondary_nav' => false,
            'header_responsive_actions' => array(),

			// Content
			'color_bg' => '#ffffff',
			'color_content_h' => '#333333',
			'color_content_txt' => '#333333',
			'color_content_acc' => '#098DA3',
			'color_content_meta' => '#4a4a4a',
			'image_style' => 'default',
			'pill_style' => 'default',
			'map_style' => 1,
			'map_style_custom' => '',

			// Sidebar
			'color_sidebar_bg' => '#f5f5f5',
			'color_widget_bg' => '#ffffff',
			'color_widget_h' => '#333333',
			'color_widget_txt' => '#333333',
			'color_widget_acc' => '#098DA3',
			'color_highlight_bg' => '#098DA3',
			'color_highlight_txt' => '#ffffff',
			'color_highlight_acc' => '#76d0e2',

			// Footer
			'prefooter' => 'instagram',
			'prefooter_instagram_username' => 'unsplash',
			'color_footer_bg' => '#098DA3',
			'color_footer_txt' => '#ffffff',
			'color_footer_acc' => '#76d0e2',
			'footer_widgets' => true,
			'footer_layout' => "4-2-2-4",

			// Home Page
			'home_cover' => true,
			'home_sections' => array(
				'as-seen-in'     => 1,
				'about'          => 0,
				'posts'          => 1,
				'numbers'        => 1,
				'categories'     => 1,
				'custom-content' => 0,
			),
			'home_sidebar_position' => 'none',
			'home_sidebar_standard' => 'trawell_default_sidebar',
			'home_sidebar_sticky' => 'trawell_default_sticky_sidebar',
			
			// Cover
			'home_cover_type' => 'static',
			'home_cover_static' => 'image',
			'home_cover_image' => array( 'url' => esc_url( get_parent_theme_file_uri('/assets/img/trawell_default.jpg') ) ),
			'home_cover_video' => '',
			'tr_home_cover_title' => 'Where will you go next?',
			'tr_home_cover_text' => 'Welcome to Trawell, a WordPress theme carefully crafted for travelers and adventurers. Pack your bags, hit the road and don\'t forget to write down all of your amazing stories!',
			'tr_home_cover_button_1_text' => '',
			'home_cover_button_1_url' => '',
			'tr_home_cover_button_2_text' => '',
			'home_cover_button_2_url' => '',
			'home_cover_static_custom_content_show' => false,
			'home_cover_static_custom_content' => '',
			'home_cover_slider_auto_rotate' => false,
			'home_cover_slider_autoplay_time' => 5,
			'home_cover_query_type' => 'posts',
			'home_cover_posts_query_type' => 'custom',
			'home_cover_posts_manual' => array(),
			'home_cover_posts_number' => 3,
			'home_cover_posts_order' => 'date',
			'home_cover_posts_sort' => 'desc',
			'home_cover_posts_in_category' => array(),
			'home_cover_posts_tagged' => '',
			'home_cover_posts_time_diff' => '0',
			'home_cover_slider_unique_posts' => false,
			'home_cover_categories' => array(),
			
			// As seen in
			'tr_home_as_seen_in_title' => '',
			'home_as_seen_in_image' => array( 'url' => esc_url( get_parent_theme_file_uri('/assets/img/asseen.jpg' ) ) ),
			
			// About
			'tr_home_about_title' => '',
			'home_about_image' => array( 'url' => esc_url( get_parent_theme_file_uri('/assets/img/trawell_default.jpg') ) ),
			'tr_home_about_text' => '',
			'tr_home_about_button_1_text' => '',
			'home_about_button_1_url' => '',
			'tr_home_about_button_2_text' => '',
			'home_about_button_2_url' => '',

			// Posts
			'tr_home_posts_title' => '',
			'home_posts_query_type' => 'custom',
			'home_posts_manual' => array(),
			'home_posts_layout' => 'map',
			'home_posts_layout_sid' => 'map',
			'home_posts_number' => 30,
			'home_posts_order' => 'date',
			'home_posts_sort' => 'desc',
			'home_posts_in_category' => array(),
			'home_posts_tagged' => array(),
			'home_posts_format' => '0',
			'home_posts_time_diff' => '0',
			'home_posts_cta_type' => '0',
			'home_posts_pag' => 'load-more',
			// Categories
			'tr_home_categories_title' => '',
			'home_categories_layout' => 'd3',
			'home_categories' => array(),
			
			// Counters
			'tr_home_counters_title' => '',
			'tr_home_counter_1_title' => 'Continents visited',
			'home_counter_1_number' => '6',
			'tr_home_counter_2_title' => 'Countries visited',
			'home_counter_2_number' => '54',
			'tr_home_counter_3_title' => 'Miles traveled',
			'home_counter_3_number' => '26k',
			'tr_home_counter_4_title' => 'Days traveling',
			'home_counter_4_number' => '678',
			'tr_home_counter_5_title' => 'Stories written',
			'home_counter_5_number' => '216',
			
			// Custom Content
            'tr_home_custom_content_title' => '',
            'tr_home_custom_content' => '',
			
			/**
			 * Post layouts
			 */
			// Layout A1
			'layout_a1_cat' => true,
			'layout_a1_meta' => array( 'author', 'date', 'comments' ),
			'layout_a1_icon' => true,
			'layout_a1_content' => 'excerpt',
			'layout_a1_excerpt_limit' => '370',
			'layout_a1_img_size_ratio' => '16_9',
			'layout_a1_img_size_custom' => '',

			// Layout A2
			'layout_a2_cat' => true,
			'layout_a2_meta' => array( 'date', 'comments' ),
			'layout_a2_icon' => true,
			'layout_a2_excerpt' => true,
			'layout_a2_excerpt_limit' => '290',
			'layout_a2_img_size_ratio' => '16_9',
			'layout_a2_img_size_custom' => '',

			// Layout A3
			'layout_a3_cat' => true,
			'layout_a3_meta' => array( 'date' ),
			'layout_a3_icon' => true,
			'layout_a3_excerpt' => true,
			'layout_a3_excerpt_limit' => '200',
			'layout_a3_img_size_ratio' => '16_9',
			'layout_a3_img_size_custom' => '',

			// Layout A4
			'layout_a4_cat' => true,
			'layout_a4_meta' => array( 'date' ),
			'layout_a4_icon' => true,
			'layout_a4_excerpt' => false,
			'layout_a4_excerpt_limit' => '290',
			'layout_a4_img_size_ratio' => '16_9',
			'layout_a4_img_size_custom' => '',

			// Layout B1
			'layout_b1_cat' => true,
			'layout_b1_excerpt' => true,
			'layout_b1_meta' => array( 'date', 'comments' ),
			'layout_b1_icon' => true,
			'layout_b1_excerpt_limit' => '200',
			'layout_b1_img_size_ratio' => '16_9',
			'layout_b1_img_size_custom' => '',

			// Layout B2
			'layout_b2_cat' => true,
			'layout_b2_meta' => array( 'date' ),
			'layout_b2_icon' => true,
			'layout_b2_img_size_ratio' => '3_2',
			'layout_b2_img_size_custom' => '',

			// Layout B3
			'layout_b3_cat' => true,
			'layout_b3_meta' => array( 'date' ),
			'layout_b3_icon' => true,
			'layout_b3_img_size_ratio' => '4_3',
			'layout_b3_img_size_custom' => '',

			// Layout C1
			'layout_c1_cat' => true,
			'layout_c1_meta' => array( 'date', 'comments' ),
			'layout_c1_icon' => true,
			'layout_c1_img_size_ratio' => '16_9',
			'layout_c1_img_size_custom' => '',

			// Layout C2
			'layout_c2_cat' => true,
			'layout_c2_meta' => array( 'date' ),
			'layout_c2_icon' => true,
			'layout_c2_img_size_ratio' => '3_2',
			'layout_c2_img_size_custom' => '',

			// Layout C3
			'layout_c3_cat' => true,
			'layout_c3_meta' => array( 'date' ),
			'layout_c3_icon' => true,
			'layout_c3_img_size_ratio' => '4_3',
			'layout_c3_img_size_custom' => '',

			// Layout C4
			'layout_c4_cat' => true,
			'layout_c4_meta' => array( 'date' ),
			'layout_c4_icon' => true,
			'layout_c4_img_size_ratio' => '1_1',
			'layout_c4_img_size_custom' => '',

			// Layout D1
			'layout_d1_cat' => true,
			'layout_d1_meta' => array( 'author', 'date', 'comments' ),
			'layout_d1_icon' => true,
			'layout_d1_excerpt' => true,
			'layout_d1_excerpt_limit' => '340',
			'layout_d1_img_size_ratio' => '16_9',
			'layout_d1_img_size_custom' => '',

			// Layout D2
			'layout_d2_cat' => true,
			'layout_d2_meta' => array( 'date' ),
			'layout_d2_icon' => true,
			'layout_d2_img_size_ratio' => '3_2',
			'layout_d2_img_size_custom' => '',

			// Layout D3
			'layout_d3_cat' => true,
			'layout_d3_meta' => array( 'date' ),
			'layout_d3_icon' => true,
			'layout_d3_excerpt' => true,
			'layout_d3_excerpt_limit' => '290',
			'layout_d3_img_size_ratio' => '4_3',
			'layout_d3_img_size_custom' => '',

			// Layout D4
			'layout_d4_cat' => true,
			'layout_d4_meta' => array( 'date' ),
			'layout_d4_icon' => true,
			'layout_d4_excerpt' => true,
			'layout_d4_excerpt_limit' => '290',
			'layout_d4_img_size_ratio' => '1_1',
			'layout_d4_img_size_custom' => '',

			// Layout E2
			'layout_e2_cat' => true,
			'layout_e2_meta' => array( 'date', 'comments' ),
			'layout_e2_icon' => true,
			'layout_e2_excerpt' => true,
			'layout_e2_excerpt_limit' => '290',

			// Layout E3
			'layout_e3_cat' => true,
			'layout_e3_meta' => array( 'date' ),
			'layout_e3_icon' => true,
			'layout_e3_excerpt' => true,
			'layout_e3_excerpt_limit' => '200',

			// Layout E4
			'layout_e4_cat' => true,
			'layout_e4_meta' => array( 'comments' ),
			'layout_e4_icon' => true,
			'layout_e4_excerpt' => false,
			'layout_e4_excerpt_limit' => '290',
			
			// Layout Map
			'layout_map_cat' => true,
			'layout_map_meta' => array( 'date'),
			'layout_map_icon' => false,
			'layout_map_excerpt' => true,
			'layout_map_excerpt_limit' => 50,

			/**
			 * Category Layouts
			 */
			// Category Layout C2
			'layout_cat_c2_meta' => true,
			'layout_cat_c2_img_size_ratio' => '3_2',
			'layout_cat_c2_img_size_custom' => '',

			// Category Layout C3
			'layout_cat_c3_meta' => true,
			'layout_cat_c3_img_size_ratio' => '4_3',
			'layout_cat_c3_img_size_custom' => '',

			// Category Layout C4
			'layout_cat_c4_meta' => true,
			'layout_cat_c4_img_size_ratio' => '1_1',
			'layout_cat_c4_img_size_custom' => '',

			// Category Layout D2
			'layout_cat_d2_meta' => true,
			'layout_cat_d2_img_size_ratio' => '21_9',
			'layout_cat_d2_img_size_custom' => '',

			// Category Layout D3
			'layout_cat_d3_meta' => true,
			'layout_cat_d3_img_size_ratio' => '3_4',
			'layout_cat_d3_img_size_custom' => '',

			// Category Layout D3
			'layout_cat_d4_meta' => true,
			'layout_cat_d4_img_size_ratio' => '3_4',
			'layout_cat_d4_img_size_custom' => '',

			// Category Layout Map
			'layout_cat_map_meta' => false,
			'layout_cat_map_excerpt' => true,
			'layout_cat_map_excerpt_limit' => 50,


			// Single Post
			'single_layout' => 'cover',
			'single_map' => false,
			'single_sidebar_position' => 'right',
			'single_sidebar_standard' => 'trawell_default_sidebar',
			'single_sidebar_sticky' => 'trawell_default_sticky_sidebar',
			// Display
			'single_category' => true,
			'single_meta' => array( 'comments', 'date', 'rtime' ),
			'single_icon' => false,
			'single_sidebar_mini_show' => true,
			'single_sidebar_mini_meta' => array( 'author', 'share', 'prev-next' ),
			'single_fimg' => true,
			'single_fimg_cap' => false,
			'single_headline' => true,
			'single_tags' => true,
			'single_author' => false,
			// Related
			'single_related' => true,
			'single_related_using' => 'default',
			'related_limit' => 3,
			'related_type' => 'cat',
			'related_order' => 'date',
			'related_time' => '0',

			// Page
			'page_layout' => 'cover',
			'page_sidebar_position' => 'right',
			'page_sidebar_standard' => 'trawell_default_sidebar',
			'page_sidebar_sticky' => 'trawell_default_sticky_sidebar',
			'page_fimg' => true,
			'page_fimg_cap' => false,

			// Category
			'category_layout' => 'cover',
			'category_map' => true,
			'category_posts_layout' => 'a1',
			'category_posts_layout_sid' => 'a1',
			'category_ppp' => 'inherit',
			'category_ppp_num' =>  get_option( 'posts_per_page' ),
			'category_pag' => 'numeric',
			'category_sidebar_position' => 'right',
			'category_sidebar_standard' => 'trawell_default_sidebar',
			'category_sidebar_sticky' => 'trawell_default_sticky_sidebar',

			// Archive
			'archive_layout' => 'classic',
			'archive_posts_layout' => 'a1',
			'archive_posts_layout_sid' => 'a1',
			'archive_ppp' => 'inherit',
			'archive_ppp_num' =>  get_option( 'posts_per_page' ),
			'archive_pag' => 'numeric',
			'archive_sidebar_position' => 'right',
			'archive_sidebar_standard' => 'trawell_default_sidebar',
			'archive_sidebar_sticky' => 'trawell_default_sticky_sidebar',

			// Typography
			'main_font' => array(
				'google'      => true,
				'font-weight'  => '400',
				'font-family' => 'Open Sans',
				'subsets' => 'latin-ext'
			),
			'h_font' => array(
				'google'      => true,
				'font-weight' => '700',
				'font-family' => 'Quicksand',
				'subsets'     => 'latin-ext',
			),
			'nav_font' => array(
				'font-weight' => '700',
				'font-family' => 'Quicksand',
				'subsets'     => 'latin-ext',
			),
			'font_size_p' => '16',
			'font_size_nav' => '13',
			'font_size_section_title' => '16',
			'font_size_widget_title' => '16',
			'font_size_cover' => '56',
			'font_size_h1' => '42',
			'font_size_h2' => '32',
			'font_size_h3' => '26',
			'font_size_h4' => '24',
			'font_size_h5' => '20',
			'font_size_h6' => '17',
			'font_size_small' => '14',
			'uppercase' => array(
				'.trawell-header .site-title a' => 0,
				'.site-description' => 0,
				'.trawell-header a' => 1,
				'.trawell-top-bar' => 0,
				'.widget-title' => 1,
				'.section-title' => 1,
				'.entry-title, .archive-title' => 0
			),

			// Misc.
			'cover_animate' => false,
			'default_fimg' => array( 'url' => esc_url( get_parent_theme_file_uri('/assets/img/trawell_default.jpg') ) ),
			'404_fimg' => '',
			'social_share' => array(
				'facebook' => 1,
				'twitter' => 1,
				'reddit' => 1,
				'pinterest' => 1,
				'email' => 1,
				'gplus' => 0,
				'linkedin' => 0,
				'stumbleupon' => 0,
				'vk' => 0,
				'whatsapp' => 0
			),
			'rtl_mode' => false,
			'rtl_lang_skip' => '',
			'more_string' => '...',
			'words_read_per_minute' => 200,
			'editor_style' => true,
			'on_single_img_popup' => false,
			'widget_style' => 'default',
			
			// Ads
			'ad_single_top' => '',
			'ad_single_bottom' => '',
			'ad_archive_top' => '',
			'ad_archive_bottom' => '',

			// Woocommerce
			'woocommerce_sidebar_position' => 'right',
			'woocommerce_sidebar_standard' => 'trawell_default_sidebar',
			'woocommerce_sidebar_sticky' => 'trawell_default_sticky_sidebar',
			'woocommerce_cart_force' => true,


			// Translation Options
			'enable_translate' => '1',

			// Performance
			'minify_css' => true,
			'minify_js' => true,
			'disable_img_sizes' => array(),

			// Additional code
			'additional_css' => '',
			'additional_js' => '',

			// Updater Options
			'theme_update_username' => '',
			'theme_update_apikey' => '',
		);

		$defaults = apply_filters( 'trawell_modify_default_options', $defaults );

		if ( isset( $defaults[$option] ) ) {
			return $defaults[$option];
		}

		return false;
	}
endif;


/**
 * Get option value from theme options
 *
 * A wrapper function for WordPress native get_option()
 * which gets an option from specific option key (set in theme options panel)
 *
 * @param string  $option Name of the option
 * @param string  $format How to parse the option based on its type
 * @return mixed Specific option value or "false" (if option is not found)
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_option' ) ):
	function trawell_get_option( $option, $format = false ) {

		global $trawell_settings;

		if ( empty( $trawell_settings ) ) {
			$trawell_settings = get_option( 'trawell_settings' );
		}

		if ( !isset( $trawell_settings[$option] ) ) {
			$trawell_settings[$option] = trawell_get_default_option( $option );
		}

		if ( empty( $format ) ) {
			return $trawell_settings[$option];
		}

		switch ( $format ) {

		case 'image' :
			$value = is_array( $trawell_settings[$option] ) && isset( $trawell_settings[$option]['url'] ) ? $trawell_settings[$option]['url'] : '';
			break;
		case 'multi':
			$value = is_array( $trawell_settings[$option] ) && !empty( $trawell_settings[$option] ) ? array_keys( array_filter( $trawell_settings[$option] ) ) : array();
			break;
		default:
			$value = false;
			break;
		}

		return $value;

	}
endif;


/**
 * Check if RTL mode is enabled
 *
 * @return bool
 * @since  1.0
 */

if ( !function_exists( 'trawell_is_rtl' ) ):
	function trawell_is_rtl() {

		if ( trawell_get_option( 'rtl_mode' ) ) {
			$rtl = true;
			//Check if current language is excluded from RTL
			$rtl_lang_skip = explode( ",", trawell_get_option( 'rtl_lang_skip' ) );
			if ( !empty( $rtl_lang_skip ) ) {
				$locale = get_locale();
				if ( in_array( $locale, $rtl_lang_skip ) ) {
					$rtl = false;
				}
			}
		} else {
			$rtl = false;
		}

		return $rtl;
	}
endif;


/**
 * Generate dynamic css
 *
 * Function parses theme options and generates css code dynamically
 *
 * @return string Generated css code
 * @since  1.0
 */

if ( !function_exists( 'trawell_generate_dynamic_css' ) ):
	function trawell_generate_dynamic_css() {
		ob_start();
		get_template_part( 'assets/css/dynamic-css' );
		$output = ob_get_contents();
		ob_end_clean();
		return trawell_compress_css_code( $output );
	}
endif;


/**
 * Get JS settings
 *
 * Function creates list of settings from thme options to pass
 * them to global JS variable so we can use it in JS files
 *
 * @return array List of JS settings
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_js_settings' ) ):
	function trawell_get_js_settings() {
		$js_settings = array();

		$js_settings['rtl_mode'] = trawell_is_rtl() ? true : false;
		$js_settings['header_sticky_offset'] = absint( trawell_get_option( 'header_sticky_offset' ) );
		$js_settings['header_sticky_up'] = trawell_get_option( 'header_sticky_up' ) ? true : false;
		$js_settings['home_slider_autoplay'] = trawell_get_option( 'home_cover_slider_autoplay' ) ? true : false;
		$js_settings['home_slider_autoplay_time'] = absint(trawell_get_option( 'home_cover_slider_autoplay_time' ));

		$js_settings = apply_filters( 'trawell_modify_js_settings', $js_settings );

		return $js_settings;
	}
endif;


/**
 * Get all translation options
 *
 * @return array Returns list of all translation strings available in theme options panel
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_translate_options' ) ):
	function trawell_get_translate_options() {
		global $trawell_translate;
		get_template_part( 'core/translate' );
		$translate = apply_filters( 'trawell_modify_translate_options', $trawell_translate );
		return $translate;
	}
endif;


/**
 * Generate fonts link
 *
 * Function creates font link from fonts selected in theme options
 *
 * @return string
 * @since  1.0
 */

if ( !function_exists( 'trawell_generate_fonts_link' ) ):
	function trawell_generate_fonts_link() {

		$fonts = array();
		$fonts[] = trawell_get_option( 'main_font' );
		$fonts[] = trawell_get_option( 'h_font' );
		$fonts[] = trawell_get_option( 'nav_font' );
		$unique = array(); //do not add same font links
		$native = trawell_get_native_fonts();
		$protocol = is_ssl() ? 'https://' : 'http://';
		$link = array();

		foreach ( $fonts as $font ) {
			if ( !in_array( $font['font-family'], $native ) ) {
				$temp = array();
				if ( isset( $font['font-style'] ) ) {
					$temp['font-style'] = $font['font-style'];
				}
				if ( isset( $font['subsets'] ) ) {
					$temp['subsets'] = $font['subsets'];
				}
				if ( isset( $font['font-weight'] ) ) {
					$temp['font-weight'] = $font['font-weight'];
				}
				$unique[$font['font-family']][] = $temp;
			}
		}

		$subsets = array( 'latin' ); //latin as default

		foreach ( $unique as $family => $items ) {

			$link[$family] = $family;

			$weight = array( '400' );

			foreach ( $items as $item ) {

				//Check weight and style
				if ( isset( $item['font-weight'] ) && !empty( $item['font-weight'] ) ) {
					$temp = $item['font-weight'];
					if ( isset( $item['font-style'] ) && empty( $item['font-style'] ) ) {
						$temp .= $item['font-style'];
					}

					if ( !in_array( $temp, $weight ) ) {
						$weight[] = $temp;
					}
				}

				//Check subsets
				if ( isset( $item['subsets'] ) && !empty( $item['subsets'] ) ) {
					if ( !in_array( $item['subsets'], $subsets ) ) {
						$subsets[] = $item['subsets'];
					}
				}
			}

			$link[$family] .= ':' . implode( ",", $weight );
			//$link[$family] .= '&subset='.implode( ",", $subsets );
		}

		if ( !empty( $link ) ) {

			$query_args = array(
				'family' => urlencode( implode( '|', $link ) ),
				'subset' => urlencode( implode( ',', $subsets ) )
			);


			$fonts_url = add_query_arg( $query_args, $protocol . 'fonts.googleapis.com/css' );

			return esc_url_raw( $fonts_url );
		}

		return '';

	}
endif;


/**
 * Get native fonts
 *
 *
 * @return array List of native fonts
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_native_fonts' ) ):
	function trawell_get_native_fonts() {

		$fonts = array(
			"Arial, Helvetica, sans-serif",
			"'Arial Black', Gadget, sans-serif",
			"'Bookman Old Style', serif",
			"'Comic Sans MS', cursive",
			"Courier, monospace",
			"Garamond, serif",
			"Georgia, serif",
			"Impact, Charcoal, sans-serif",
			"'Lucida Console', Monaco, monospace",
			"'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
			"'MS Sans Serif', Geneva, sans-serif",
			"'MS Serif', 'New York', sans-serif",
			"'Palatino Linotype', 'Book Antiqua', Palatino, serif",
			"Tahoma,Geneva, sans-serif",
			"'Times New Roman', Times,serif",
			"'Trebuchet MS', Helvetica, sans-serif",
			"Verdana, Geneva, sans-serif"
		);

		return $fonts;
	}
endif;


/**
 * Get font option
 *
 * @return string Font-family
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_font_option' ) ):
	function trawell_get_font_option( $option = false ) {

		$font = trawell_get_option( $option );
		$native_fonts = trawell_get_native_fonts();
		if ( !in_array( $font['font-family'], $native_fonts ) ) {
			$font['font-family'] = "'" . $font['font-family'] . "'";
		}

		return $font;
	}
endif;


/**
 * Get background
 *
 * @return string background CSS
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_bg_option' ) ):
	function trawell_get_bg_option( $option = false ) {

		$style = trawell_get_option( $option );
		$css = '';

		if ( !empty( $style ) && is_array( $style ) ) {
			foreach ( $style as $key => $value ) {
				if ( !empty( $value ) && $key != "media" ) {
					if ( $key == "background-image" ) {
						$css .= $key . ":url('" . $value . "');";
					} else {
						$css .= $key . ":" . $value . ";";
					}
				}
			}
		}

		return $css;
	}
endif;


/**
 * Get list of image sizes
 *
 * @return array
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_image_sizes' ) ):
	function trawell_get_image_sizes() {

		$sizes = array(
			'trawell-cover' => array( 'title' => esc_html__( 'Cover', 'trawell' ), 'w' => 1920, 'h' => 1920, 'crop' => false ),
			'trawell-content' => array( 'title' => esc_html__( 'Content regular', 'trawell' ), 'w' => 600, 'h' => 99999, 'crop' => false ),
			'trawell-content-wide' => array( 'title' => esc_html__( 'Content wider', 'trawell' ), 'w' => 800, 'h' => 99999, 'crop' => false ),
			'trawell-a1' => array( 'title' => esc_html__( 'A1', 'trawell' ), 'w' => 1200, 'ratio' => trawell_get_post_layout_image_ratio( 'a1' ), 'crop' => true ),
			'trawell-a1-sid' => array( 'title' => esc_html__( 'A1 with sidebar', 'trawell' ), 'w' => 800, 'ratio' => trawell_get_post_layout_image_ratio( 'a1' ), 'crop' => true ),
			'trawell-a2' => array( 'title' => esc_html__( 'A2', 'trawell' ), 'w' => 585, 'ratio' => trawell_get_post_layout_image_ratio( 'a2' ), 'crop' => true ),
			'trawell-a2-sid' => array( 'title' => esc_html__( 'A2 with sidebar', 'trawell' ), 'w' => 385, 'ratio' => trawell_get_post_layout_image_ratio( 'a2' ), 'crop' => true ),
			'trawell-a3' => array( 'title' => esc_html__( 'A3', 'trawell' ), 'w' => 380, 'ratio' => trawell_get_post_layout_image_ratio( 'a3' ), 'crop' => true ),
			'trawell-a3-sid' => array( 'title' => esc_html__( 'A3 with sidebar', 'trawell' ), 'w' => 247, 'ratio' => trawell_get_post_layout_image_ratio( 'a3' ), 'crop' => true ),
			'trawell-a4' => array( 'title' => esc_html__( 'A4', 'trawell' ), 'w' => 278, 'ratio' => trawell_get_post_layout_image_ratio( 'a4' ), 'crop' => true ),
			'trawell-a4-sid' => array( 'title' => esc_html__( 'A4 with sidebar', 'trawell' ), 'w' => 178, 'ratio' => trawell_get_post_layout_image_ratio( 'a4' ), 'crop' => true ),
			'trawell-b1' => array( 'title' => esc_html__( 'B1', 'trawell' ), 'w' => 585, 'ratio' => trawell_get_post_layout_image_ratio( 'b1' ), 'crop' => true ),
			'trawell-b1-sid' => array( 'title' => esc_html__( 'B1 with sidebar', 'trawell' ), 'w' => 385, 'ratio' => trawell_get_post_layout_image_ratio( 'b1' ), 'crop' => true ),
			'trawell-b2' => array( 'title' => esc_html__( 'B2', 'trawell' ), 'w' => 227, 'ratio' => trawell_get_post_layout_image_ratio( 'b2' ), 'crop' => true ),
			'trawell-b2-sid' => array( 'title' => esc_html__( 'B2 with sidebar', 'trawell' ), 'w' => 143, 'ratio' => trawell_get_post_layout_image_ratio( 'b2' ), 'crop' => true ),
			'trawell-b3' => array( 'title' => esc_html__( 'B3', 'trawell' ), 'w' => 141, 'ratio' => trawell_get_post_layout_image_ratio( 'b3' ), 'crop' => true ),
			'trawell-c1' => array( 'title' => esc_html__( 'C1', 'trawell' ), 'w' => 1200, 'ratio' => trawell_get_post_layout_image_ratio( 'c1' ), 'crop' => true ),
			'trawell-c1-sid' => array( 'title' => esc_html__( 'C1 with sidebar', 'trawell' ), 'w' => 800, 'ratio' => trawell_get_post_layout_image_ratio( 'c1' ), 'crop' => true ),
			'trawell-c2' => array( 'title' => esc_html__( 'C2', 'trawell' ), 'w' => 585, 'ratio' => trawell_get_post_layout_image_ratio( 'c2' ), 'crop' => true ),
			'trawell-c2-sid' => array( 'title' => esc_html__( 'C2 with sidebar', 'trawell' ), 'w' => 385, 'ratio' => trawell_get_post_layout_image_ratio( 'c2' ), 'crop' => true ),
			'trawell-c3' => array( 'title' => esc_html__( 'C3', 'trawell' ), 'w' => 380, 'ratio' => trawell_get_post_layout_image_ratio( 'c3' ), 'crop' => true ),
			'trawell-c3-sid' => array( 'title' => esc_html__( 'C3 with sidebar', 'trawell' ), 'w' => 247, 'ratio' => trawell_get_post_layout_image_ratio( 'c3' ), 'crop' => true ),
			'trawell-c4' => array( 'title' => esc_html__( 'C4', 'trawell' ), 'w' => 278, 'ratio' => trawell_get_post_layout_image_ratio( 'c4' ), 'crop' => true ),
			'trawell-d1' => array( 'title' => esc_html__( 'D1', 'trawell' ), 'w' => 1200, 'ratio' => trawell_get_post_layout_image_ratio( 'd1' ), 'crop' => true ),
			'trawell-d1-sid' => array( 'title' => esc_html__( 'D1 with sidebar', 'trawell' ), 'w' => 800, 'ratio' => trawell_get_post_layout_image_ratio( 'd1' ), 'crop' => true ),
			'trawell-d2' => array( 'title' => esc_html__( 'D2', 'trawell' ), 'w' => 585, 'ratio' => trawell_get_post_layout_image_ratio( 'd2' ), 'crop' => true ),
			'trawell-d2-sid' => array( 'title' => esc_html__( 'D2 with sidebar', 'trawell' ), 'w' => 385, 'ratio' => trawell_get_post_layout_image_ratio( 'd2' ), 'crop' => true ),
			'trawell-d3' => array( 'title' => esc_html__( 'D3', 'trawell' ), 'w' => 380, 'ratio' => trawell_get_post_layout_image_ratio( 'd3' ), 'crop' => true ),
			'trawell-d3-sid' => array( 'title' => esc_html__( 'D3 with sidebar', 'trawell' ), 'w' => 247, 'ratio' => trawell_get_post_layout_image_ratio( 'd3' ), 'crop' => true ),
			'trawell-d4' => array( 'title' => esc_html__( 'D4', 'trawell' ), 'w' => 278, 'ratio' => trawell_get_post_layout_image_ratio( 'd4' ), 'crop' => true ),
			'trawell-cat-c2' => array( 'title' => esc_html__( 'Cat C2', 'trawell' ), 'w' => 585, 'ratio' => trawell_get_category_layout_image_ratio( 'c2' ), 'crop' => true ),
			'trawell-cat-c2-sid' => array( 'title' => esc_html__( 'Cat C2 with sidebar', 'trawell' ), 'w' => 385, 'ratio' => trawell_get_category_layout_image_ratio( 'c2' ), 'crop' => true ),
			'trawell-cat-c3' => array( 'title' => esc_html__( 'Cat C3', 'trawell' ), 'w' => 380, 'ratio' => trawell_get_category_layout_image_ratio( 'c3' ), 'crop' => true ),
			'trawell-cat-c3-sid' => array( 'title' => esc_html__( 'Cat C3 with sidebar', 'trawell' ), 'w' => 247, 'ratio' => trawell_get_category_layout_image_ratio( 'c3' ), 'crop' => true ),
			'trawell-cat-c4' => array( 'title' => esc_html__( 'Cat C4', 'trawell' ), 'w' => 278, 'ratio' => trawell_get_category_layout_image_ratio( 'c4' ), 'crop' => true ),
			'trawell-cat-c4-sid' => array( 'title' => esc_html__( 'Cat C4 with sidebar', 'trawell' ), 'w' => 247, 'ratio' => trawell_get_category_layout_image_ratio( 'c4' ), 'crop' => true ),
			'trawell-cat-d2' => array( 'title' => esc_html__( 'Cat D2', 'trawell' ), 'w' => 585, 'ratio' => trawell_get_category_layout_image_ratio( 'd2' ), 'crop' => true ),
			'trawell-cat-d2-sid' => array( 'title' => esc_html__( 'Cat D2 with sidebar', 'trawell' ), 'w' => 385, 'ratio' => trawell_get_category_layout_image_ratio( 'd2' ), 'crop' => true ),
			'trawell-cat-d3' => array( 'title' => esc_html__( 'Cat D3', 'trawell' ), 'w' => 380, 'ratio' => trawell_get_category_layout_image_ratio( 'd3' ), 'crop' => true ),
			'trawell-cat-d3-sid' => array( 'title' => esc_html__( 'Cat D3 with sidebar', 'trawell' ), 'w' => 247, 'ratio' => trawell_get_category_layout_image_ratio( 'd3' ), 'crop' => true ),
			'trawell-cat-d4' => array( 'title' => esc_html__( 'Cat D4', 'trawell' ), 'w' => 278, 'ratio' => trawell_get_category_layout_image_ratio( 'd4' ), 'crop' => true ),
			'trawell-cat-d4-sid' => array( 'title' => esc_html__( 'Cat D4', 'trawell' ), 'w' => 247, 'ratio' => trawell_get_category_layout_image_ratio( 'd4' ), 'crop' => true ),
		);

		$disable_img_sizes = trawell_get_option( 'disable_img_sizes' );

		if ( !empty( $disable_img_sizes ) ) {
			$disable_img_sizes = array_keys( array_filter( $disable_img_sizes ) );
		}

		if ( !empty( $disable_img_sizes ) ) {
			foreach ( $disable_img_sizes as $size_id ) {
				unset( $sizes['trawell-' . $size_id] );
			}
		}


		foreach ( $sizes as $key => $size ) {

			if ( !isset( $size['ratio'] ) ) {
				continue;
			}

			$size['h'] =  trawell_calculate_image_height( $size['w'], $size['ratio'] );
			unset( $size['ratio'] );
			$sizes[$key] = $size;
		}

		$sizes = apply_filters( 'trawell_modify_image_sizes', $sizes );

		return $sizes;
	}
endif;


/**
 * Gets an image ratio setting for a specific post layout
 *
 * @param string  $layout ID
 * @return string
 */
if ( !function_exists( 'trawell_get_post_layout_image_ratio' ) ):
	function trawell_get_post_layout_image_ratio( $layout ) {
		$ratio = trawell_get_option( 'layout_' . $layout . '_img_size_ratio' );
		$custom_ratio = trawell_get_option( 'layout_' . $layout . '_img_size_custom' );

		if ( $ratio === "custom" && !empty( $custom_ratio ) ) {
			$ratio = str_replace( ":", "_", $custom_ratio );
		}

		$ratio = apply_filters( 'trawell_modify_post_layout_' . $layout . '_image_ratio', $ratio );

		return $ratio;
	}
endif;


/**
 * Gets an image ratio setting for a specific category layout
 *
 * @param string  $layout ID
 * @return string
 */
if ( !function_exists( 'trawell_get_category_layout_image_ratio' ) ):
	function trawell_get_category_layout_image_ratio( $layout ) {
		$ratio = trawell_get_option( 'layout_cat_' . $layout . '_img_size_ratio' );
		$custom_ratio = trawell_get_option( 'layout_cat_' . $layout . '_img_size_custom' );

		if ( $ratio === "custom" && !empty( $custom_ratio ) ) {
			$ratio = str_replace( ":", "_", $custom_ratio );
		}

		$ratio = apply_filters( 'trawell_modify_category_layout_' . $layout . '_image_ratio', $ratio );

		return $ratio;
	}
endif;


/**
 * Parse image height
 *
 * Calculate an image size based on a given ratio and width
 *
 * @param int     $width
 * @param string  $ration in 'w_h' format
 * @return int $height
 * @since  1.0
 */

if ( !function_exists( 'trawell_calculate_image_height' ) ):
	function trawell_calculate_image_height( $width = 1200, $ratio = '16_9' ) {

		list( $rw, $rh ) = explode( '_', $ratio );

		$height = ceil( $width * absint( $rh ) / absint( $rw ) );

		return $height;
	}
endif;

/**
 * Get image ID from URL
 *
 * It gets image/attachment ID based on URL
 *
 * @param string  $image_url URL of image/attachment
 * @return int|bool Attachment ID or "false" if not found
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_image_id_by_url' ) ):
	function trawell_get_image_id_by_url( $image_url ) {
		global $wpdb;

		$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ) );

		if ( isset( $attachment[0] ) ) {
			return $attachment[0];
		}

		return false;
	}
endif;


/**
 * Calculate reading time by content length
 *
 * @param string  $text Content to calculate
 * @return int Number of minutes
 * @since  1.0
 */

if ( !function_exists( 'trawell_read_time' ) ):
	function trawell_read_time( $text ) {

		$words = count( preg_split( "/[\n\r\t ]+/", wp_strip_all_tags( $text ) ) );
		$number_words_per_minute = trawell_get_option( 'words_read_per_minute' );
		$number_words_per_minute = !empty( $number_words_per_minute ) ? absint( $number_words_per_minute ) : 200;

		if ( !empty( $words ) ) {
			$time_in_minutes = ceil( $words / $number_words_per_minute );
			return $time_in_minutes;
		}

		return false;
	}
endif;


/**
 * Trim chars of a string
 *
 * @param string  $string Content to trim
 * @param int     $limit  Number of characters to limit
 * @param string  $more   Chars to append after trimed string
 * @return string Trimmed part of the string
 * @since  1.0
 */

if ( !function_exists( 'trawell_trim_chars' ) ):
	function trawell_trim_chars( $string, $limit, $more = '...' ) {

		if ( !empty( $limit ) ) {

			$text = trim( preg_replace( "/[\n\r\t ]+/", ' ', $string ), ' ' );
			preg_match_all( '/./u', $text, $chars );
			$chars = $chars[0];
			$count = count( $chars );

			if ( $count > $limit ) {

				$chars = array_slice( $chars, 0, $limit );

				for ( $i = ( $limit - 1 ); $i >= 0; $i-- ) {
					if ( in_array( $chars[$i], array( '.', ' ', '-', '?', '!' ) ) ) {
						break;
					}
				}

				$chars = array_slice( $chars, 0, $i );
				$string = implode( '', $chars );
				$string = rtrim( $string, ".,-?!" );
				$string .= $more;
			}

		}

		return $string;
	}
endif;


/**
 * Parse args ( merge arrays )
 *
 * Similar to wp_parse_args() but extended to also merge multidimensional arrays
 *
 * @param array   $a - set of values to merge
 * @param array   $b - set of default values
 * @return array Merged set of elements
 * @since  1.0
 */

if ( !function_exists( 'trawell_parse_args' ) ):
	function trawell_parse_args( &$a, $b ) {
		$a = (array)$a;
		$b = (array)$b;
		$r = $b;
		foreach ( $a as $k => &$v ) {
			if ( is_array( $v ) && isset( $r[$k] ) ) {
				$r[$k] = trawell_parse_args( $v, $r[$k] );
			} else {
				$r[$k] = $v;
			}
		}
		return $r;
	}
endif;


/**
 * Compare two values
 *
 * Fucntion compares two values and sanitazes 0
 *
 * @param mixed   $a
 * @param mixed   $b
 * @return bool Returns true if equal
 * @since  1.0
 */

if ( !function_exists( 'trawell_compare' ) ):
	function trawell_compare( $a, $b ) {
		return (string)$a === (string)$b;
	}
endif;


/**
 * Compress CSS Code
 *
 * @param string  $code Uncompressed css code
 * @return string Compressed css code
 * @since  1.0
 */

if ( !function_exists( 'trawell_compress_css_code' ) ) :
	function trawell_compress_css_code( $code ) {

		// Remove Comments
		$code = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $code );

		// Remove tabs, spaces, newlines, etc.
		$code = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $code );

		return $code;
	}
endif;



/**
 * Trim text characters with UTF-8
 * for adding to html attributes it's not breaking the code and
 * you are able to have all the kind of characters (Japanese, Cyrillic, German, French, etc.)
 *
 * @param unknown $text
 * @since  1.3
 */
if ( !function_exists( 'trawell_esc_text' ) ):
	function trawell_esc_text( $text ) {
		return rawurlencode( html_entity_decode( wp_kses($text, null), ENT_COMPAT, 'UTF-8' ) );
	}
endif;



/**
 * Get archive content
 *
 * Function gets title, meta and description for current archive template
 *
 * @return array Args
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_archive_content' ) ):
	function trawell_get_archive_content() {


		if ( is_home() && is_front_page() ) {
			return false;
		}

		$defaults = array(
			'title' => '',
			'meta' => '',
			'desc' => '',
		);

		$args = array();

		if ( is_category() ) {

			$args['title'] = __trawell( 'category' ) . single_cat_title( '', false );
			$args['desc'] = category_description();
			$cat_object = get_queried_object();
			$args['meta'] = $cat_object->count;

		} else if ( is_tag() ) {

				$args['title'] = __trawell( 'tag' ) . single_tag_title( '', false );
				$args['desc'] = tag_description();

			} else if ( is_author() ) {

				$args['title'] = __trawell( 'author' ) . get_the_author();
				$args['desc'] = get_the_author_meta( 'description' );

			} else if ( is_tax() ) {

				$args['title'] = __trawell( 'archive' ) . single_term_title( '', false );

			} else if ( is_search() ) {

				$args['title'] = __trawell( 'search_results_for' ) . get_search_query();
				$args['desc'] = get_search_form( false );

			} else if ( is_day() ) {

				$args['title'] = __trawell( 'archive' ) . get_the_date();

			} else if ( is_month() ) {

				$args['title'] = __trawell( 'archive' ) . get_the_date( 'F Y' );

			} else if ( is_year() ) {

				$args['title'] = __trawell( 'archive' ) . get_the_date( 'Y' );

			} else if ( is_home() && !is_front_page() && $posts_page = get_option( 'page_for_posts' ) ) {

				$args['title'] = get_the_title( $posts_page );

			} else if ( is_archive() ) {

				$args['title'] = __trawell( 'archive' );
			}

		return apply_filters( 'trawell_modify_archive_content', wp_parse_args( $args, $defaults ) );
	}
endif;



/**
 * Get sidebar or no sidebar layouts
 *
 * @param array   $options - Array with template options
 * @return string
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_correct_layout' ) ):
	function trawell_get_correct_layout( $options ) {
		return !empty( $options['sidebar'] ) ? $options['layout'].'-sid.php' : $options['layout'].'.php';
	}
endif;


/**
 * Get list of social options
 *
 * Used for user social profiles
 *
 * @return array
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_social' ) ) :
	function trawell_get_social() {
		$social = array(
			'behance' => 'Behance',
			'delicious' => 'Delicious',
			'deviantart' => 'DeviantArt',
			'digg' => 'Digg',
			'dribbble' => 'Dribbble',
			'facebook' => 'Facebook',
			'flickr' => 'Flickr',
			'github' => 'Github',
			'google' => 'GooglePlus',
			'instagram' => 'Instagram',
			'linkedin' => 'LinkedIN',
			'pinterest' => 'Pinterest',
			'reddit' => 'ReddIT',
			'rss' => 'Rss',
			'skype' => 'Skype',
			'snapchat' => 'Snapchat',
			'slack' => 'Slack',
			'stumbleupon' => 'StumbleUpon',
			'soundcloud' => 'SoundCloud',
			'spotify' => 'Spotify',
			'tumblr' => 'Tumblr',
			'twitter' => 'Twitter',
			'vimeo-square' => 'Vimeo',
			'vk' => 'vKontakte',
			'vine' => 'Vine',
			'weibo' => 'Weibo',
			'wordpress' => 'WordPress',
			'xing' => 'Xing' ,
			'yahoo' => 'Yahoo',
			'youtube' => 'Youtube'
		);

		return $social;
	}
endif;


/**
 * Generate related posts query
 *
 * Depending on post ID generate related posts using theme options
 *
 * @param int     $post_id
 * @return object WP_Query
 * @since  1.0
 */
if ( !function_exists( 'trawell_generate_default_related_query' ) ):
	function trawell_generate_default_related_query( $post_id ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$args['post_type'] = 'post';

		//Exclude current post from query
		$args['post__not_in'] = array( $post_id );

		$num_posts = absint( trawell_get_option( 'related_limit' ) );

		if ( $num_posts > 100 ) {
			$num_posts = 100;
		}

		$args['posts_per_page'] = $num_posts;

		$args['orderby'] = 'DESC'; //trawell_get_option( 'related_order' );

		if ( $args['orderby'] == 'title' ) {
			$args['order'] = 'ASC';
		}

		if ( $time_diff = trawell_get_option( 'related_time' ) ) {
			$args['date_query'] = array( 'after' => date( 'Y-m-d', trawell_calculate_time_diff( $time_diff ) ) );
		}

		$type = trawell_get_option( 'related_type' );

		if ( $type ) {

			switch ( $type ) {

			case 'cat':
				$cats = get_the_category( $post_id );
				$cat_args = array();
				if ( !empty( $cats ) ) {
					foreach ( $cats as $k => $cat ) {
						$cat_args[] = $cat->term_id;
					}
				}
				$args['category__in'] = $cat_args;
				break;

			case 'tag':
				$tags = get_the_tags( $post_id );
				$tag_args = array();
				if ( !empty( $tags ) ) {
					foreach ( $tags as $tag ) {
						$tag_args[] = $tag->term_id;
					}
				}
				$args['tag__in'] = $tag_args;
				break;

			case 'cat_and_tag':
				$cats = get_the_category( $post_id );
				$cat_args = array();
				if ( !empty( $cats ) ) {
					foreach ( $cats as $k => $cat ) {
						$cat_args[] = $cat->term_id;
					}
				}
				$tags = get_the_tags( $post_id );
				$tag_args = array();
				if ( !empty( $tags ) ) {
					foreach ( $tags as $tag ) {
						$tag_args[] = $tag->term_id;
					}
				}
				$args['tax_query'] = array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'category',
						'field'    => 'id',
						'terms'    => $cat_args,
					),
					array(
						'taxonomy' => 'post_tag',
						'field'    => 'id',
						'terms'    => $tag_args,
					)
				);
				break;

			case 'cat_or_tag':
				$cats = get_the_category( $post_id );
				$cat_args = array();
				if ( !empty( $cats ) ) {
					foreach ( $cats as $k => $cat ) {
						$cat_args[] = $cat->term_id;
					}
				}
				$tags = get_the_tags( $post_id );
				$tag_args = array();
				if ( !empty( $tags ) ) {
					foreach ( $tags as $tag ) {
						$tag_args[] = $tag->term_id;
					}
				}
				$args['tax_query'] = array(
					'relation' => 'OR',
					array(
						'taxonomy' => 'category',
						'field'    => 'id',
						'terms'    => $cat_args,
					),
					array(
						'taxonomy' => 'post_tag',
						'field'    => 'id',
						'terms'    => $tag_args,
					)
				);
				break;

			case 'author':
				global $post;
				$author_id = isset( $post->post_author ) ? $post->post_author : 0;
				$args['author'] = $author_id;
				break;

			case 'default':
				break;
			}
		}

		$related_query = new WP_Query( $args );

		return $related_query;
	}
endif;

/**
 * Generate home posts query by prefix
 *
 * For now prefix can be "home_cover_posts" or "home_posts"
 * This is made because they have same options.
 *
 * @param $prefix "home_cover_posts" or "home_posts"
 * @param $append_query used for altering query args
 * @return object WP_Query $args
 * @since  1.0
 */
if(!function_exists('trawell_get_frontpage_posts_query_args')):
    function trawell_get_frontpage_posts_query_args( $prefix, $is_map = false ){
	
	    $args['ignore_sticky_posts'] = 1;
	
	    $manual = trawell_get_option($prefix . '_manual');
	    
	    if ( trawell_get_option($prefix . '_query_type') == 'manual' && !empty( $manual) ) {
		
		    $args['orderby'] =  'post__in';
		    $args['post__in'] =  $manual;
		    $args['posts_per_page'] = absint( count( $manual ) );
		
	    } else {
		
		    $args['post_type'] = 'post';
		    $args['posts_per_page'] = absint( trawell_get_option($prefix . '_number') ) ;
		
		    $categories = trawell_get_option($prefix . '_in_category');
		    if ( !empty( $categories  ) ) {
			    $args['category__in'] = trawell_get_option($prefix . '_in_category');
		    }
		
		    $tags = trawell_get_option($prefix . '_tagged');
		    if ( !empty( $tags ) ) {
			    $args['tag__in'] = trawell_get_option($prefix . '_tagged');
		    }
		
		    $args['orderby'] = trawell_get_option($prefix . '_order');
		    $args['order'] = trawell_get_option($prefix . '_sort');
		
		    if($args['orderby'] == 'title'){
			    $args['order'] = 'ASC';
		    }
		
		    if ( $time_diff = trawell_get_option($prefix . '_time_diff') ) {
			    $args['date_query'] = array( 'after' => date( 'Y-m-d', trawell_calculate_time_diff( $time_diff ) ) );
		    }

		    global $paged;
		    $paged = is_front_page() ? get_query_var( 'page' ) : get_query_var( 'paged') ;
			$args['paged'] = $paged;
		
		    if($is_map){
			    $args['posts_per_page'] = -1;
		    }
	    }
	    
	    if(!empty($append_query)){
		    $args = array_merge($args, $append_query);
	    }
	
	    $args = apply_filters( 'trawell_modify_'.$prefix.'_query', $args );

	    return $args;
    }
endif;

/**
 * Fetches data for map JS from WP_Query
 *
 * @param $posts WP_Query
 * @return array posts ready for map
 * @since  1.0
 */
if(!function_exists('trawell_parse_map_posts')):
    function trawell_parse_map_posts($posts){
		$map_posts = array();
		
		if(!trawell_is_maps_active()){
			return $map_posts;
		}

		 if ($posts->have_posts()){
			 while ($posts->have_posts()) { $posts->the_post();
			 
				 $post_meta = mks_map_get_post_meta();
				 $item = array(
					 'id'         => get_the_ID(),
					 'link'       => get_permalink(),
					 'title'      => get_the_title(),
					 'excerpt'    => mks_map_get_excerpt( trawell_get_option( 'layout_map_excerpt_limit' ), get_the_excerpt(), get_the_content() ),
					 'address'    => $post_meta['address'],
					 'latitude'   => $post_meta['latitude'],
					 'longitude'  => $post_meta['longitude'],
					 'meta'       => trawell_get_meta_data( trawell_get_option( 'layout_map_meta', 'multi' ) ),
					 'categories' => trawell_get_category(),
					 'format'     => trawell_get_format_icon(),
					 'pinColor'   => trawell_get_post_color(),
				 );

				 if(has_post_thumbnail()){
					 $item['thumbnail'] = trawell_get_featured_image('trawell-a3');
				 }
				
				 $map_posts[] = mks_map_parse_item($item);
			 }
		 }
		 
		 $map_posts = apply_filters('trawell_modify_maps_posts', $map_posts);
		 
		 return $map_posts;
    }
endif;


/**
 * Fetches data for map JS from Categories array
 *
 * @param $categories array
 * @return array categories ready for map
 * @since  1.0
 */
if(!function_exists('trawell_parse_maps_categories')):
    function trawell_parse_maps_categories($categories){
	    $map_categories = array();
	    
	    if(!trawell_is_maps_active() || empty($categories)){
		    return $map_categories;
	    }
	
	    foreach ( $categories as $category ) {
	    	$category_meta = mks_map_get_category_meta($category->term_id);
		
	    	if(empty($category_meta['address'])){
	    	   continue;
	    	}
		    $trawell_meta = trawell_get_category_meta($category->term_id);
		
		    $item = array(
			    'id'        => $category->term_id,
			    'link'      => get_category_link($category->term_id),
			    'title'     => __trawell( 'category' ) . $category->name,
			    'excerpt'   => wpautop(trawell_trim_chars($category->description, trawell_get_option('layout_cat_map_excerpt_limit'))),
			    'address'   => $category_meta['address'],
			    'latitude'  => $category_meta['latitude'],
			    'longitude' => $category_meta['longitude'],
			    'meta'      => '<span class="meta-item">' . $category->count  . ' ' . __trawell('articles') . '</span>',
			    'pinColor'  => (!empty($trawell_meta['color']['value'])) ? $trawell_meta['color']['value'] : esc_attr( trawell_get_option( 'color_content_acc' ))
			    );
		    
		    $featured_image = trawell_get_category_featured_image('trawell-a3', $category->term_id, true );
			
		    if( $featured_image ){
				$item['thumbnail'] = $featured_image;
			}
			
		    $map_categories[] = mks_map_parse_item($item);
		}
		
	    $map_categories = apply_filters('trawell_modify_maps_categories', $map_categories);
	
	    return $map_categories;
    }
endif;

/**
 * Get post color by category, basically if category has color post will use that color
 *
 * @param id int id of the post
 * @return  int post color
 * @since  1.0
 */
if(!function_exists('trawell_get_post_color')):
    function trawell_get_post_color($id = null){
        if(empty($id)){
	        $id = get_the_ID();
        }
        
	
	    $colors = get_option( 'trawell_cat_colors' );
        
        if(empty($colors)){
            return trawell_get_option('color_content_acc');
        }
        
        if(is_category()){
	        $categories[] = get_category(get_queried_object_id());
        }else{
	        $categories = get_the_category($id);
        }
	
	
        if(!empty($categories)){
            $first_category = $categories[0];
	
            if(array_key_exists($first_category->term_id, $colors)){
	            return $colors[$first_category->term_id];
            }
        }
        
        return trawell_get_option('color_content_acc');
    }
endif;

/**
 * Calculate time difference
 *
 * @param string  $timestring String to calculate difference from
 * @return  int Time difference in miliseconds
 * @since  1.0
 */
if ( !function_exists( 'trawell_calculate_time_diff' ) ) :
	function trawell_calculate_time_diff( $timestring ) {

		$now = current_time( 'timestamp' );

		switch ( $timestring ) {
		case '-1 day' : $time = $now - DAY_IN_SECONDS; break;
		case '-3 days' : $time = $now - ( 3 * DAY_IN_SECONDS ); break;
		case '-1 week' : $time = $now - WEEK_IN_SECONDS; break;
		case '-1 month' : $time = $now - ( YEAR_IN_SECONDS / 12 ); break;
		case '-3 months' : $time = $now - ( 3 * YEAR_IN_SECONDS / 12 ); break;
		case '-6 months' : $time = $now - ( 6 * YEAR_IN_SECONDS / 12 ); break;
		case '-1 year' : $time = $now - ( YEAR_IN_SECONDS ); break;
		default : $time = $now;
		}

		return $time;
	}
endif;


/**
 * Get post format
 *
 * Checks format of current post and possibly modify it based on specific options
 *
 * @param unknown $restriction_check bool Wheter to check for post restriction (if restricted we threat it as standard)
 * @return string Format value
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_post_format' ) ):
	function trawell_get_post_format() {

		if ( trawell_is_restricted_post() ) {
			return 'standard';
		}

		$format = get_post_format();

		if ( empty( $format ) ) {
			$format = 'standard';
		}

		$supported_formats = get_theme_support( 'post-formats' );

		if ( !empty( $supported_formats ) && is_array( $supported_formats[0] ) && !in_array( $format, $supported_formats[0] ) ) {
			$format = 'standard';
		}


		return $format;
	}
endif;

/**
 * Get page meta data
 *
 * @param string  $field specific option array key
 * @return mixed meta data value or set of values
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_page_meta' ) ):
	function trawell_get_page_meta( $post_id = false, $field = false ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$defaults = array(
			'display_settings' => 'inherit',
			'cover'            => trawell_get_option( 'page_layout' ),
			'sidebar_position' => trawell_get_option( 'page_sidebar_position' ),
			'sidebar'          => trawell_get_option( 'page_sidebar_standard' ),
			'sticky_sidebar'   => trawell_get_option( 'page_sidebar_sticky' ),
			'blank'            => array(
				'page_title' => 1,
				'header'     => 1,
				'footer'     => 1,
			),
		);

		$meta = get_post_meta( $post_id, '_trawell_meta', true );
		$meta = trawell_parse_args( $meta, $defaults );


		if ( $field ) {
			if ( isset( $meta[$field] ) ) {
				return $meta[$field];
			} else {
				return false;
			}
		}

		return $meta;
	}
endif;

/**
 * Get post meta data
 *
 * @param string  $field specific option array key
 * @return mixed meta data value or set of values
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_post_meta' ) ):
	function trawell_get_post_meta( $post_id = false, $field = false ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$defaults = array(
			'display_settings' => 'inherit',
			'cover'            => trawell_get_option( 'single_layout' ),
			'map_active'       => trawell_get_option( 'single_map' ),
			'sidebar_position' => trawell_get_option( 'single_sidebar_position' ),
			'sidebar'          => trawell_get_option( 'single_sidebar_standard' ),
			'sticky_sidebar'   => trawell_get_option( 'single_sidebar_sticky' ),
			'map'              => array(),
		);

		$meta = get_post_meta( $post_id, '_trawell_meta', true );
		
		if ( trawell_is_maps_active() ) {
			$map_meta = mks_map_get_post_meta( $post_id );
			if ( !empty( $map_meta ) ) {
				$meta['map'] = $map_meta;
			}
		}
		$meta = trawell_parse_args( $meta, $defaults );


		if ( $field ) {
			if ( isset( $meta[$field] ) ) {
				return $meta[$field];
			} else {
				return false;
			}
		}

		return $meta;
	}
endif;

/**
 * Get category meta data
 *
 * @param string  $field specific option array key
 * @return mixed meta data value or set of values
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_category_meta' ) ):
	function trawell_get_category_meta( $cat_id = false, $field = false ) {

		$defaults = array(
			'color'            => array(
				'type'  => 'inherit',
				'value' => trawell_get_option( 'color_content_acc' ),
			),
			'image'            => '',
			'display_settings' => 'inherit',
			'cover'            => trawell_get_option( 'category_layout' ),
			'map'              => trawell_get_option( 'category_map' ),
			'posts_layout'     => trawell_get_option( 'category_posts_layout' ),
			'posts_layout_sid' => trawell_get_option( 'category_posts_layout_sid' ),
			'sidebar_position' => trawell_get_option( 'category_sidebar_position' ),
			'sidebar'          => trawell_get_option( 'category_sidebar_standard' ),
			'sticky_sidebar'   => trawell_get_option( 'category_sidebar_sticky' ),
			'ppp'              => trawell_get_option( 'category_ppp_num' ),
			'pagination'       => trawell_get_option( 'category_pag' ),
		);

		if ( $cat_id ) {
			$meta = get_term_meta( $cat_id, '_trawell_meta', true );
			$meta = trawell_parse_args( $meta, $defaults );
		} else {
			$meta = $defaults;
		}

		if ( $field ) {
			if ( isset( $meta[$field] ) ) {
				return $meta[$field];
			} else {
				return false;
			}
		}

		return $meta;
	}
endif;

/**
 * It merges theme settings for map post layout with plugins default map settings
 *
 * @return array map settings
 * @since 1.0
 */
if(!function_exists('trawell_get_map_posts_settings')):
	function trawell_get_map_posts_settings(){
		
		$map_settings = mks_map_get_settings();
		$map_settings['display'] = array(
			'meta'     => trawell_get_option( 'layout_map_meta' ),
			'category' => trawell_get_option( 'layout_map_cat' ),
			'format'   => trawell_get_option( 'layout_map_icon' ),
			'excerpt'  => trawell_get_option( 'layout_map_excerpt' ),
		);
		$map_settings['styles'] = trawell_get_map_style();
		$map_settings['pinColor'] = trawell_get_option('color_content_acc');
		$map_settings['clusterColor'] = trawell_get_option('color_content_acc');
		
		$map_settings = apply_filters('trawell_modify_posts_map_settings', $map_settings);

		return $map_settings;
	}
endif;

/**
 * It merges theme settings for map category layout with plugins default map settings
 *
 * @return array map settings
 * @since 1.0
 */
if(!function_exists('trawell_get_categories_map_settings')):
	function trawell_get_categories_map_settings(){
		
		$map_settings = mks_map_get_settings();
		$map_settings['display'] = array(
			'meta' => trawell_get_option('layout_cat_map_meta'),
			'category' => false,
			'format' => false,
			'excerpt' => trawell_get_option('layout_cat_map_excerpt'),
		);
		$map_settings['styles'] = trawell_get_map_style();
		$map_settings['pinColor'] = trawell_get_option('color_content_acc');
		$map_settings['clusterColor'] = trawell_get_option('color_content_acc');
		
		$map_settings = apply_filters('trawell_modify_categories_map_settings', $map_settings);
		
		return $map_settings;
	}
endif;

/**
 * General settings for map on category page
 *
 * @return array|mixed|void
 */
if ( !function_exists( 'trawell_get_map_category_settings' ) ):
	function trawell_get_map_category_settings() {
		
		$meta = trawell_get_category_meta(get_queried_object_id());
		$map_settings = mks_map_get_settings();
		$map_settings['display'] = array(
			'meta'     => trawell_get_option( 'layout_map_meta' ),
			'category' => trawell_get_option( 'layout_map_cat' ),
			'format'   => trawell_get_option( 'layout_map_icon' ),
			'excerpt'  => trawell_get_option( 'layout_map_excerpt' ),
		);
		$map_settings['styles'] = trawell_get_map_style();
		$map_settings['pinColor'] = !(empty($meta['color']['value'])) ? $meta['color']['value'] : trawell_get_option('color_content_acc');
		$map_settings['clusterColor'] = !(empty($meta['color']['value'])) ? $meta['color']['value'] : trawell_get_option('color_content_acc');
		return $map_settings;
		
	}
endif;

/**
 * General settings for map on single page
 *
 * @return array|mixed|void
 * @since 1.0
 */
if ( !function_exists( 'trawell_get_map_single_settings' ) ):
	function trawell_get_map_single_settings() {
		
		$settings = mks_map_get_settings();
		$settings['infoBox'] = 0;
		$settings['display'] = array(
			'meta'     => false,
			'category' => false,
			'format'   => false,
			'excerpt'  => false
		);
		$settings['styles'] = trawell_get_map_style();
		$settings['pinColor'] = trawell_get_post_color();
		$settings['clusterColor'] = trawell_get_post_color();
		$settings = apply_filters('trawell_modify_map_single_settings', $settings);
		
		return $settings;
	}
endif;

/**
 * Get map style by ID
 *
 * @param int $style_id
 * @return mixed
 * @since 1.0
 */
if(!function_exists('trawell_get_map_style')):
    function trawell_get_map_style( ){
    
		$styles = array(
			1 => '[{"featureType":"all","elementType":"all","stylers":[{"saturation":"32"},{"lightness":"-3"},{"visibility":"on"},{"weight":"1.18"}]},{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"hue":"#ffaf00"},{"gamma":"2.04"},{"saturation":"-100"},{"lightness":"51"}]},{"featureType":"administrative.country","elementType":"labels","stylers":[{"visibility":"on"},{"saturation":"0"}]},{"featureType":"administrative.country","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"saturation":"-70"},{"lightness":"14"},{"visibility":"simplified"}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"saturation":"100"},{"lightness":"-14"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"},{"lightness":"12"}]}]',
			2 => '[{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#46bcec"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]',
			3 => '[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#193341"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2c5a71"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#29768a"},{"lightness":-37}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#3e606f"},{"weight":2},{"gamma":0.84}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"weight":0.6},{"color":"#1a3541"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#2c5a71"}]}]',
			4 => '[{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"stylers":[{"hue":"#00aaff"},{"saturation":-100},{"gamma":2.15},{"lightness":12}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"lightness":24}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":57}]}]',
			5 => '[{"featureType":"water","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#aee2e0"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#abce83"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#769E72"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#7B8758"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"color":"#EBF4A4"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#8dab68"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#5B5B3F"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ABCE83"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#A4C67D"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#9BBF72"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#EBF4A4"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#87ae79"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#7f2200"},{"visibility":"off"}]},{"featureType":"administrative","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"visibility":"on"},{"weight":4.1}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#495421"}]},{"featureType":"administrative.neighborhood","elementType":"labels","stylers":[{"visibility":"off"}]}]',
		);
		
		$styles = apply_filters('trawell_modify_map_styles', $styles);
	
	    $style_setting = trawell_get_option( 'map_style' );
	    
		if($style_setting == 'custom'){
			return trawell_get_option( 'map_style_custom' );
		}
		
		return $styles[$style_setting];
    }
endif;
/**
 * Check if post is currently restricted
 *
 * @return bool
 * @since  1.4
 */

if ( !function_exists( 'trawell_is_restricted_post' ) ):
	function trawell_is_restricted_post() {

		//Check if password protected
		if ( post_password_required() ) {
			return true;
		}

		return false;
	}
endif;



/**
 * Check if WooCommerce is active
 *
 * @return bool
 * @since  1.0
 */

if ( !function_exists( 'trawell_is_woocommerce_active' ) ):
	function trawell_is_woocommerce_active() {

		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			return true;
		}

		return false;
	}
endif;

/**
 * Woocommerce  Cart Elements
 *
 * @return bool
 * @since  1.6
 */
if ( !function_exists( 'trawell_woocommerce_cart_elements' ) ):
	function trawell_woocommerce_cart_elements() {
		if ( !trawell_is_woocommerce_active() ) { return; }
		$elements = array();
		$elements['cart_url'] = wc_get_cart_url();
		$elements['products_count'] = WC()->cart->get_cart_contents_count();
		return $elements;
	}
endif;

/**
 * Check if Meks Easy Maps plugin is active
 *
 * @return bool
 * @since  1.0
 */

if ( !function_exists( 'trawell_is_maps_active' ) ):
	function trawell_is_maps_active() {

		if ( in_array( 'meks-easy-maps/meks-easy-maps.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			return true;
		}

		return false;
	}
endif;

/**
 *
 *
 * @param string  $layout
 * @return array|mixed|void
 */
if ( !function_exists( 'trawell_get_layout_options' ) ):
	function trawell_get_layout_options( $layout = 'a1' ) {
		$defaults = array(

		);

		// $options = get_option('');

		$options = trawell_parse_args( $options, $defaults );

		$options = apply_filters( 'trawell_modify_layout_options_' . $layout, $options );

		return $options;
	}
endif;

/**
 * Check if we are on WooCommerce page
 *
 * @return bool
 * @since  1.0
 */

if ( !function_exists( 'trawell_is_woocommerce_page' ) ):
	function trawell_is_woocommerce_page() {

		return trawell_is_woocommerce_active() && ( is_woocommerce() || is_shop() || is_cart() || is_checkout() );
	}
endif;


if(!function_exists('trawell_hex_to_hsl')):
    function trawell_hex_to_hsla($hex, $lightness = false, $opacity = 1, $raw = false){
		$rgb = trawell_hex_to_rgba($hex, false, false, true);

		$hsl = trawell_rgb_to_hsl($rgb, $lightness);
		if($raw){
			return $hsl;
		}
		
	    if ($opacity !== false) {
		    if (abs($opacity) > 1) {
			    $opacity = 1.0;
		    }
		    return 'hsla( ' . $hsl[0] . ', ' . $hsl[1] . '%, ' . $hsl[2] . '%, ' . $opacity . ')';
	    } else {
		    return 'hsl(' . $hsl[0] . ', ' . $hsl[1] . '%, ' . $hsl[2] . '%)';
	    }
	}
endif;
/**
 * Hex to rgba
 *
 * Convert hexadecimal color to rgba
 *
 * @param string $color Hexadecimal color value
 * @param float $opacity Opacity value
 * @return string RGBA color value
 * @since  1.0
 */

if (!function_exists('trawell_hex_to_rgba')):
	function trawell_hex_to_rgba($color, $opacity = false, $raw = false, $array = false)
	{
		$default = 'rgb(0,0,0)';
		
		//Return default if no color provided
		if (empty($color))
			return $default;
		
		//Sanitize $color if "#" is provided
		if ($color[0] == '#') {
			$color = substr($color, 1);
		}
		
		//Check if color has 6 or 3 characters and get values
		if (strlen($color) == 6) {
			$hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
		} elseif (strlen($color) == 3) {
			$hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
		} else {
			return $default;
		}
		
		//Convert hexadec to rgb
		$rgb = array_map('hexdec', $hex);
		
		if($array){
			return $rgb;
		}
		
		if ($raw){
			return $rgb;
		}
		
		//Check if opacity is set(rgba or rgb)
		if ($opacity !== false) {
			if (abs($opacity) > 1) {
				$opacity = 1.0;
			}
			$output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
		} else {
			$output = 'rgb(' . implode(",", $rgb) . ')';
		}
		
		//Return rgb(a) color string
		return $output;
	}
endif;

/**
 * It converts rgb to hex color mode.
 *
 * @param $rgb array
 * @return string
 * @since  1.0
 */
if (!function_exists('trawell_rgb_to_hex')):
	function trawell_rgb_to_hex(array $rgb)
	{
		return sprintf("#%02x%02x%02x", $rgb[0], $rgb[1], $rgb[2]);
	}
endif;

/**
 * Convert RGB to HSL color code
 *
 * @param $rgb
 * @return array HSL color
 * @since  1.0
 */
if(!function_exists('trawell_rgb_to_hsl')):
	function trawell_rgb_to_hsl($rgb, $lightness = false)
	{
		list($r, $g, $b) = $rgb;

		$r /= 255;
		$g /= 255;
		$b /= 255;
		$max = max( $r, $g, $b );
		$min = min( $r, $g, $b );
		$h = 0;
		$l = ( $max + $min ) / 2;
		$d = $max - $min;
		if( $d == 0 ){
			$h = $s = 0; // achromatic
		} else {
			$s = $d / ( 1 - abs( 2 * $l - 1 ) ) * 100;
			switch( $max ){
				case $r:
					$h = 60 * fmod( ( ( $g - $b ) / $d ), 6 );
					if ($b > $g) {
						$h += 360;
					}
					break;
				case $g:
					$h = 60 * ( ( $b - $r ) / $d + 2 );
					break;
				case $b:
					$h = 60 * ( ( $r - $g ) / $d + 4 );
					break;
			}
		}

		$l *= 100;

		if($lightness){

			$percentage = (absint($lightness) / 100) * $l;

			if($lightness < 0){
				$l = $l - $percentage;
			}else{
				$l = $l + $percentage;
			}
			$l = ($l > 100) ? 100 : $l;
			$l = ($l < 0) ? 0 : $l;
		}
		
		return array( round( $h, 2 ), round( $s, 2 ), round( $l, 2 ) );
	}
endif;

/**
 * Convert HSL to RGB color code
 *
 * @param $hsl
 * @return array RGB color
 * @since  1.1
 */
if(!function_exists('trawell_hsl_to_rgb')):
	function trawell_hsl_to_rgb($hsl)
	{
		list($h, $s, $l) = $hsl;
		
		$c = (1 - abs(2 * $l - 1)) * $s;
		$x = $c * (1 - abs(fmod(($h / 60), 2) - 1));
		$m = $l - ($c / 2);
		
		if ($h < 60) {
			$r = $c;
			$g = $x;
			$b = 0;
		} else if ($h < 120) {
			$r = $x;
			$g = $c;
			$b = 0;
		} else if ($h < 180) {
			$r = 0;
			$g = $c;
			$b = $x;
		} else if ($h < 240) {
			$r = 0;
			$g = $x;
			$b = $c;
		} else if ($h < 300) {
			$r = $x;
			$g = 0;
			$b = $c;
		} else {
			$r = $c;
			$g = 0;
			$b = $x;
		}
		
		$r = ($r + $m) * 255;
		$g = ($g + $m) * 255;
		$b = ($b + $m) * 255;
		return array(floor($r), floor($g), floor($b));
	}
endif;

/**
 * Check if Yet Another Related Posts Plugin (YARPP) is active
 *
 * @return bool
 * @since  1.0
 */
if (!function_exists( 'trawell_is_yarpp_active' )):
	function trawell_is_yarpp_active () {
		if (in_array( 'yet-another-related-posts-plugin/yarpp.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
			return true;
		}
		
		return false;
	}
endif;

/**
 * Check if Contextual Related Posts is active
 *
 * @return bool
 * @since  1.0
 */
if (!function_exists( 'trawell_is_crp_active' )):
	function trawell_is_crp_active () {
		if (in_array( 'contextual-related-posts/contextual-related-posts.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
			return true;
		}
		
		return false;
	}
endif;

/**
 * Check if WordPress Related Posts is active
 *
 * @return bool
 * @since  1.0
 */
if (!function_exists( 'trawell_is_wrpr_active' )):
	function trawell_is_wrpr_active () {
		if (in_array( 'wordpress-23-related-posts-plugin/wp_related_posts.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
			return true;
		}
		
		return false;
	}
endif;

/**
 * Check if Jetpack is active
 *
 * @return bool
 * @since  1.0
 */
if (!function_exists( 'trawell_is_jetpack_active' )):
	function trawell_is_jetpack_active () {
		if (in_array( 'jetpack/jetpack.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
			return true;
		}
		
		return false;
	}
endif;

/**
 * Check if Yoast SEO is active
 *
 * @return bool
 * @since  1.0
 */
if (!function_exists( 'trawell_is_yoast_active' )):
	function trawell_is_yoast_active () {
		if (in_array( 'wordpress-seo/wp-seo.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
			return true;
		}
		
		return false;
	}
endif;

/**
 * Check if Breadcrumb NavXT is active
 *
 * @return bool
 * @since  1.0
 */
if (!function_exists( 'trawell_is_breadcrumbs_navxt_active' )):
	function trawell_is_breadcrumbs_navxt_active () {
		if (in_array( 'breadcrumb-navxt/breadcrumb-navxt.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
			return true;
		}
		
		return false;
	}
endif;

/**
 * Check if Breadcrumb NavXT is active
 *
 * @return bool
 * @since  1.0
 */
if (!function_exists( 'trawell_is_redux_active' )):
	function trawell_is_redux_active () {
		if (in_array( 'redux-framework/redux-framework.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )) {
			return true;
		}
		
		return false;
	}
endif;

?>
