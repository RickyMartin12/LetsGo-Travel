<?php

/**
 * Get the list of header layouts
 *
 * @param  bool $inherit Wheter to display "inherit" option
 * @param  bool $none Wheter to display "none" option
 * @return array List of available options
 * @since  1.0
 */

if (!function_exists( 'trawell_get_header_layouts' )):
	function trawell_get_header_layouts () {
		
		$layouts = array();
		
		$layouts['1'] = array( 'title' => esc_html__( 'Layout 1', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/header_layout_1.png' ) );
		$layouts['2'] = array( 'title' => esc_html__( 'Layout 2', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/header_layout_2.png' ) );
		$layouts['3'] = array( 'title' => esc_html__( 'Layout 3', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/header_layout_3.png' ) );
		$layouts['4'] = array( 'title' => esc_html__( 'Layout 4', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/header_layout_4.png' ) );
		
		$layouts = apply_filters( 'trawell_modify_header_layouts', $layouts ); 
		
		return $layouts;
		
	}
endif;


/**
 * Get meta options
 *
 * @param   array $default Enable defaults i.e. array('date', 'comments')
 * @return array List of available options
 * @since  1.0
 */

if (!function_exists( 'trawell_get_meta_opts' )):
	function trawell_get_meta_opts ( $default = array() ) {
		
		$options = array();
		$options['date'] = esc_html__( 'Date', 'trawell' );
		$options['author'] = esc_html__( 'Author', 'trawell' );
		$options['rtime'] = esc_html__( 'Reading time', 'trawell' );
		$options['comments'] = esc_html__( 'Comments', 'trawell' );
		
		if (!empty( $default )) {
			foreach ($options as $key => $option) {
				if (in_array( $key, $default )) {
					$options[ $key ] = 1;
				} else {
					$options[ $key ] = 0;
				}
			}
		}
		
		$options = apply_filters( 'trawell_modify_meta_opts', $options );
		
		return $options;
	}
endif;

/**
 * Get header actions options
 *
 * @return array List of available options
 * @since  1.0
 */
if (!function_exists( 'trawell_get_header_main_area_actions' )):
	function trawell_get_header_main_area_actions () {
		$actions = array(
			'search-drop' => esc_html__( 'Search button', 'trawell' ),
			'social-drop' => esc_html__( 'Social menu button', 'trawell' ),
			'menu-social' => esc_html__( 'Social menu icons list', 'trawell' ),
		);
		
		if (trawell_is_woocommerce_active()) {
			$actions['cart'] = esc_html__( 'Woocommerce cart icon', 'trawell' );
		}
		
		$actions = apply_filters( 'trawell_modify_header_main_area_actions', $actions );
		
		return $actions;
	}
endif;


/**
 * Get header top elements options
 *
 * @return array List of available options
 * @since  1.0
 */
if (!function_exists( 'trawell_get_header_top_actions' )):
	function trawell_get_header_top_actions () {
		$actions = array(
			'menu-secondary-1' => esc_html__( 'Secondary menu 1', 'trawell' ),
			'menu-secondary-2' => esc_html__( 'Secondary menu 2', 'trawell' ),
			'search-form'    => esc_html__( 'Search form', 'trawell' ),
			'menu-social'    => esc_html__( 'Social menu icons list', 'trawell' ),
			'date'           => esc_html__( 'Date', 'trawell' ),
			'0'              => esc_html__( 'None', 'trawell' ),
		);
		
		$actions = apply_filters( 'trawell_modify_header_top_actions', $actions );
		
		return $actions;
	}
endif;


/**
 * Get header responsive elements options
 *
 * @return array List of available options
 * @since  1.1
 */
if (!function_exists( 'trawell_get_header_responsive_actions' )):
	function trawell_get_header_responsive_actions () {
		$actions = array(
			'search-form'    => esc_html__( 'Search form', 'trawell' ),
			'menu-social'    => esc_html__( 'Social menu icons list', 'trawell' ),
		);
		
		if(trawell_is_woocommerce_active()){
			$actions['cart'] = esc_html__( 'Cart', 'trawell' );
		}
		
		$actions = apply_filters( 'trawell_modify_header_top_actions', $actions );
		
		return $actions;
	}
endif;

/**
 * Get post layouts options
 *
 * @param bool $ihnerit Whether you want to include "inherit" option in the list
 * @return array List of available options
 * @since  1.0
 */
if (!function_exists( 'trawell_get_posts_layouts' )):
	function trawell_get_posts_layouts ( $ignore = array('inherit') ) {
		
		$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/inherit.png') );
		$layouts['a1'] = array( 'title' => esc_html__( 'Layout A1', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_a1.png' ) );
		$layouts['a2'] = array( 'title' => esc_html__( 'Layout A2', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_a2.png' ) );
		$layouts['a3'] = array( 'title' => esc_html__( 'Layout A3', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_a3.png' ) );
		$layouts['a4'] = array( 'title' => esc_html__( 'Layout A4', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_a4.png' ) );
		$layouts['b1'] = array( 'title' => esc_html__( 'Layout B1', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_b1.png' ) );
		$layouts['b2'] = array( 'title' => esc_html__( 'Layout B2', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_b2.png' ) );
		$layouts['b3'] = array( 'title' => esc_html__( 'Layout B3', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_b3.png' ) );
		$layouts['c1'] = array( 'title' => esc_html__( 'Layout C1', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_c1.png' ) );
		$layouts['c2'] = array( 'title' => esc_html__( 'Layout C2', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_c2.png' ) );
		$layouts['c3'] = array( 'title' => esc_html__( 'Layout C3', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_c3.png' ) );
		$layouts['c4'] = array( 'title' => esc_html__( 'Layout C4', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_c4.png' ) );
		$layouts['d1'] = array( 'title' => esc_html__( 'Layout D1', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_d1.png' ) );
		$layouts['d2'] = array( 'title' => esc_html__( 'Layout D2', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_d2.png' ) );
		$layouts['d3'] = array( 'title' => esc_html__( 'Layout D3', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_d3.png' ) );
		$layouts['d4'] = array( 'title' => esc_html__( 'Layout D4', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_d4.png' ) );
		$layouts['e2'] = array( 'title' => esc_html__( 'Layout E2', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_e2.png' ) );
		$layouts['e3'] = array( 'title' => esc_html__( 'Layout E3', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_e3.png' ) );
		$layouts['e4'] = array( 'title' => esc_html__( 'Layout E4', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_e4.png' ) );
		$layouts['map'] = array( 'title' => esc_html__( 'Map', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/layout_map.png' ) );

		if(!empty($ignore)){
			$layouts = array_diff_key($layouts, array_flip($ignore));
		}
		
		$layouts = apply_filters( 'trawell_modify_posts_layouts', $layouts ); 
		
		return $layouts;
	}
endif;

/**
 * Get categories layouts options
 *
 * @param bool $ihnerit Whether you want to include "inherit" option in the list
 * @return array List of available options
 * @since  1.0
 */
if (!function_exists( 'trawell_get_categories_layouts' )):
	function trawell_get_categories_layouts ( $ignore = array('inherit') ) {
		
		$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/inherit.png') );
		$layouts['c2'] = array( 'title' => esc_html__( 'Layout C2', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/layout_cat_c2.png') );
		$layouts['c3'] = array( 'title' => esc_html__( 'Layout C3', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/layout_cat_c3.png') );
		$layouts['c4'] = array( 'title' => esc_html__( 'Layout C4', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/layout_cat_c4.png') );
		$layouts['d2'] = array( 'title' => esc_html__( 'Layout D2', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/layout_cat_d2.png') );
		$layouts['d3'] = array( 'title' => esc_html__( 'Layout D3', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/layout_cat_d3.png') );
		$layouts['d4'] = array( 'title' => esc_html__( 'Layout D4', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/layout_cat_d4.png') );
		$layouts['map'] = array( 'title' => esc_html__( 'Layout Map', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/layout_cat_map.png') );
		
		if(!empty($ignore)){
			$layouts = array_diff_key($layouts, array_flip($ignore));
		}
		
		$layouts = apply_filters( 'trawell_modify_categories_layouts', $layouts );
		
		return $layouts;
	}
endif;


/**
 * Get the list of available pagination types
 *
 * @param bool $ihnerit Whether you want to include "inherit" option in the list
 * @param bool $none Whether you want to add "none" option ( to set layout to "off")
 * @return array List of available options
 * @since  1.0
 */

if (!function_exists( 'trawell_get_pagination_layouts' )):
	function trawell_get_pagination_layouts ( $inherit = false, $none = false ) {
		
		$layouts = array();
		
		if ($inherit) {
			$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/inherit.png') );
		}
		
		if ($none) {
			$layouts['none'] = array( 'title' => esc_html__( 'None', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/none.png') );
		}
		
		$layouts['numeric'] = array( 'title' => esc_html__( 'Numeric pagination links', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/pag_numeric.png') );
		$layouts['prev-next'] = array( 'title' => esc_html__( 'Prev/Next page links', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/pag_prev_next.png') );
		$layouts['load-more'] = array( 'title' => esc_html__( 'Load more button', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/pag_load_more.png')  );
		$layouts['infinite-scroll'] = array( 'title' => esc_html__( 'Infinite scroll', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/pag_infinite.png') );
		
		$layouts = apply_filters( 'trawell_modify_pagination_layouts', $layouts ); 
		
		return $layouts;
	}
endif;


/**
 * Get footer layouts options
 *
 * @return array List of available options
 * @since  1.0
 */

if (!function_exists( 'trawell_get_footer_layouts' )):
	function trawell_get_footer_layouts () {
		$layouts = array(
			'12'      => array( 'title' => esc_html__( '12'     , 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/footer_col_12.png') ),
			'6-6'     => array( 'title' => esc_html__( '6-6'    , 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/footer_col_6_6.png') ),
			'4-4-4'   => array( 'title' => esc_html__( '4-4-4'  , 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/footer_col_4_4_4.png') ),
			'3-3-3-3' => array( 'title' => esc_html__( '3-3-3-3', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/footer_col_3_3_3_3.png') ),
			'6-3-3'   => array( 'title' => esc_html__( '6-3-3'  , 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/footer_col_6_3_3.png') ),
			'3-3-6'   => array( 'title' => esc_html__( '3-3-6'  , 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/footer_col_3_3_6.png') ),
			'3-6-3'   => array( 'title' => esc_html__( '3-6-3'  , 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/footer_col_3_6_3.png') ),
			'3-4-5'   => array( 'title' => esc_html__( '3-4-5'  , 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/footer_col_3_4_5.png') ),
			'5-4-3'   => array( 'title' => esc_html__( '5-4-3'  , 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/footer_col_5_4_3.png') ),
			'3-5-4'   => array( 'title' => esc_html__( '3-5-4'  , 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/footer_col_3_5_4.png') ),
			'4-5-3'   => array( 'title' => esc_html__( '4-5-3'  , 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/footer_col_4_5_3.png') ),
			'4-2-2-4' => array( 'title' => esc_html__( '4-2-2-4', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/footer_col_4_2_2_4.png') ),
		);
		
		$layouts = apply_filters( 'trawell_modify_footer_layouts', $layouts ); 
		
		return $layouts;
	}
endif;


/**
 * Get image ratio options
 *
 * @param   bool $original Wheter to include "original (not cropped)" ratio option
 * @return array List of available options
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_image_ratio_opts' ) ):
	function trawell_get_image_ratio_opts( $original = false ) {
		
		$options = array();
		
		if ( $original ) {
			$options['original'] = esc_html__( 'Original (ratio as uploaded - do not crop)', 'trawell' );
		}
		
		$options['21_9'] = esc_html__( '21:9', 'trawell' );
		$options['16_9'] = esc_html__( '16:9', 'trawell' );
		$options['3_2'] = esc_html__( '3:2', 'trawell' );
		$options['4_3'] = esc_html__( '4:3', 'trawell' );
		$options['1_1'] = esc_html__( '1:1 (square)', 'trawell' );
		$options['3_4'] = esc_html__( '3:4', 'trawell' );
		$options['custom'] = esc_html__( 'Your custom ratio', 'trawell' );
		
		$options = apply_filters('trawell_modify_ratio_opts', $options ); 
		return $options;
	}
endif;

/**
 * Get the list of available single post layouts
 *
 * @param bool $ihnerit Whether you want to add "inherit" option
 * @return array List of available options
 * @since  1.0
 */

if (!function_exists( 'trawell_get_single_layouts' )):
	function trawell_get_single_layouts ( $inherit = false ) {
		
		$layouts = array();
		
		if ($inherit) {
			$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/inherit.png') );
		}
		
		$layouts['classic'] = array( 'title' => esc_html__( 'Classic', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/single_classic.png') );
		$layouts['cover'] = array( 'title' => esc_html__( 'Cover', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/single_cover.png') );
		
		$actions = apply_filters( 'trawell_modify_single_layouts', $layouts ); 
		
		return $actions;
	}
endif;


/**
 * Get the list of available page layouts
 *
 * @param bool $ihnerit Whether you want to add "inherit" option
 * @return array List of available options
 * @since  1.0
 */

if (!function_exists( 'trawell_get_page_layouts' )):
	function trawell_get_page_layouts ( $inherit = false ) {
		
		if ($inherit) {
			$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/inherit.png') );
		}
		
		$layouts['classic'] = array( 'title' => esc_html__( 'Classic', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/page_classic.png') );
		$layouts['cover'] = array( 'title' => esc_html__( 'Cover', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/page_cover.png') );
		
		$layouts = apply_filters( 'trawell_modify_page_layouts', $layouts );
		
		return $layouts;
		
	}
endif;


/**
 * Get the list of available category layouts
 *
 * @param bool $ihnerit Whether you want to add "inherit" option
 * @return array List of available options
 * @since  1.0
 */

if (!function_exists( 'trawell_get_category_layouts' )):
	function trawell_get_category_layouts ( $inherit = false ) {
		
		if ($inherit) {
			$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/inherit.png') );
		}
		
		$layouts['classic'] = array( 'title' => esc_html__( 'Classic', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/cat_classic.png')  );
		$layouts['cover'] = array( 'title' => esc_html__( 'Cover', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/cat_cover.png') );
		
		$layouts = apply_filters( 'trawell_modify_category_layouts', $layouts );
		
		return $layouts;
		
	}
endif;


/**
 * Get the list of available sidebar layouts
 *
 * You may have left sidebar, right sidebar or no sidebar
 *
 * @param bool $ihnerit Whether you want to include "inherit" option in the list
 * @return array List of available sidebar layouts
 * @since  1.0
 */

if (!function_exists( 'trawell_get_sidebar_layouts' )):
	function trawell_get_sidebar_layouts ( $inherit = false ) {
		
		$layouts = array();
		
		if ($inherit) {
			$layouts['inherit'] = array( 'title' => esc_html__( 'Inherit', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/inherit.png') );
		}
		
		$layouts['none'] = array( 'title' => esc_html__( 'None', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/content_sid_none.png') );
		$layouts['left'] = array( 'title' => esc_html__( 'Left sidebar', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/content_sid_left.png') );
		$layouts['right'] = array( 'title' => esc_html__( 'Right sidebar', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/content_sid_right.png') );
		
		$layouts = apply_filters( 'trawell_modify_sidebar_layouts', $layouts ); 
		
		return $layouts;
	}
endif;


/**
 * Get the list of registered sidebars
 *
 * @param bool $ihnerit Whether you want to include "inherit" option in the list
 * @return array Returns list of available sidebars
 * @since  1.0
 */

if (!function_exists( 'trawell_get_sidebars_list' )):
	function trawell_get_sidebars_list ( $inherit = false ) {
		
		$sidebars = array();
		
		if ($inherit) {
			$sidebars['inherit'] = esc_html__( 'Inherit', 'trawell' );
		}
		
		$sidebars['none'] = esc_html__( 'None', 'trawell' );
		
		global $wp_registered_sidebars;
		
		if (!empty( $wp_registered_sidebars )) {
			
			foreach ($wp_registered_sidebars as $sidebar) {
				$sidebars[ $sidebar['id'] ] = $sidebar['name'];
			}
			
		}
		//Get sidebars from wp_options if global var is not loaded yet
		$fallback_sidebars = get_option( 'trawell_registered_sidebars' );
		if (!empty( $fallback_sidebars )) {
			foreach ($fallback_sidebars as $sidebar) {
				if (!array_key_exists( $sidebar['id'], $sidebars )) {
					$sidebars[ $sidebar['id'] ] = $sidebar['name'];
				}
			}
		}
		
		//Check for theme additional sidebars
		$custom_sidebars = trawell_get_option( 'sidebars' );
		
		if ($custom_sidebars) {
			foreach ($custom_sidebars as $k => $title) {
				if (is_numeric( $k ) && !array_key_exists( 'trawell_sidebar_' . $k, $sidebars )) {
					$sidebars[ 'trawell_sidebar_' . $k ] = $title;
				}
			}
		}
		
		//Do not display footer sidebars for selection
		unset( $sidebars['trawell_footer_sidebar_1'] );
		unset( $sidebars['trawell_footer_sidebar_2'] );
		unset( $sidebars['trawell_footer_sidebar_3'] );
		unset( $sidebars['trawell_footer_sidebar_4'] );
		
		$sidebars = apply_filters( 'trawell_modify_sidebars_list', $sidebars ); 
		
		return $sidebars;
	}
endif;


/**
 * Get sidebar mini meta options
 *
 * @param   array $default Enable defaults i.e. array('date', 'comments')
 * @return array List of available options
 * @since  1.0
 */

if (!function_exists( 'trawell_get_sidebar_mini_meta_opts' )):
	function trawell_get_sidebar_mini_meta_opts ( $default = array() ) {
		
		$options = array();
		
		$options['author'] = esc_html__( 'Author', 'trawell' );
		$options['share'] = esc_html__( 'Share', 'trawell' );
		$options['tags'] = esc_html__( 'Tags', 'trawell' );
		$options['prev-next'] = esc_html__( 'Previous and next post links', 'trawell' );
		
		if (!empty( $default )) {
			foreach ($options as $key => $option) {
				if (in_array( $key, $default )) {
					$options[ $key ] = 1;
				} else {
					$options[ $key ] = 0;
				}
			}
		}
		$options = apply_filters( 'trawell_modify_sidebar_mini_meta_opts', $options ); 
		
		return $options;
	}
endif;

/**
 * Get the list of available options for post ordering
 *
 * @return array List of available options
 * @since  1.0
 */

if (!function_exists( 'trawell_get_post_order_opts' )) :
	function trawell_get_post_order_opts () {
		
		$options = array(
			'date'          => esc_html__( 'Date', 'trawell' ),
			'comment_count' => esc_html__( 'Number of comments', 'trawell' ),
			'title'         => esc_html__( 'Title (alphabetically)', 'trawell' ),
			'rand'          => esc_html__( 'Random', 'trawell' ),
		);
		
		$options = apply_filters( 'trawell_modify_post_order_opts', $options ); 
		
		return $options;
	}
endif;


/**
 * Get the list of available sections forfrontpage sections
 *
 * @return array List of available options
 * @since  1.0
 */
if(!function_exists('trawell_get_frontpage_sections_options')):
    function trawell_get_frontpage_sections_options(){
	
	    $options = array(
		    'as-seen-in'     => esc_html__( 'As seen in', 'trawell' ),
		    'about'          => esc_html__( 'About', 'trawell' ),
		    'posts'          => esc_html__( 'Posts', 'trawell' ),
		    'categories'     => esc_html__( 'Categories', 'trawell' ),
		    'numbers'        => esc_html__( 'Counters', 'trawell' ),
		    'custom-content' => esc_html__( 'Custom content', 'trawell' ),
	    );
	
	    $options = apply_filters( 'trawell_modify_frontpage_sections_options', $options );
	
	    return $options;
    }
endif;


/**
 * Get the list of available options frontpage cover
 *
 * @return array List of available options
 * @since  1.0
 */
if(!function_exists('trawell_get_frontpage_cover_options')):
    function trawell_get_frontpage_cover_options(){
	
	    $options = array(
		    'static'      => esc_html__( 'Static content', 'trawell' ),
		    'slider'      => esc_html__( 'Slider', 'trawell' ),
		    'map' => esc_html__( 'Map', 'trawell' ),
	    );
	
	    $options = apply_filters( 'trawell_modify_frontpage_cover_options', $options ); 
	
	    return $options;
    }
endif;

/**
 * Get the list of available options for front page static cover
 *
 * @return array List of available options
 * @since  1.0
 */
if(!function_exists('trawell_get_frontpage_static_cover_options')):
    function trawell_get_frontpage_static_cover_options(){
	
	    $options = array(
		    'image'      => esc_html__( 'Image', 'trawell' ),
		    'video'      => esc_html__( 'Video', 'trawell' ),
		    'none' => esc_html__( 'None (color only)', 'trawell' ),
	    );
	
	    $options = apply_filters( 'trawell_modify_frontpage_static_cover_options', $options ); 
	
	    return $options;
    }
endif;


/**
 * Get the list of available options to filter posts by format
 *
 * @return array List of available post formats
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_post_format_opts' ) ) :
	function trawell_get_post_format_opts() {
		
		$options = array();
		$options['standard'] = esc_html__( 'Standard', 'trawell' );
		
		$formats = get_theme_support('post-formats');
		if(!empty($formats) && is_array($formats[0])){
			foreach($formats[0] as $format){
				$options[$format] = ucfirst($format);
			}
		}
		
		$options['0'] = esc_html__( 'All', 'trawell' );
		
		$options = apply_filters('trawell_modify_post_format_opts', $options ); 
		return $options;
	}
endif;

/**
 * Get the list of time limit options
 *
 * @return array List of available options
 * @since  1.0
 */

if (!function_exists( 'trawell_get_time_diff_opts' )) :
	function trawell_get_time_diff_opts () {
		
		$options = array(
			'-1 day'    => esc_html__( '1 Day', 'trawell' ),
			'-3 days'   => esc_html__( '3 Days', 'trawell' ),
			'-1 week'   => esc_html__( '1 Week', 'trawell' ),
			'-1 month'  => esc_html__( '1 Month', 'trawell' ),
			'-3 months' => esc_html__( '3 Months', 'trawell' ),
			'-6 months' => esc_html__( '6 Months', 'trawell' ),
			'-1 year'   => esc_html__( '1 Year', 'trawell' ),
			'0'         => esc_html__( 'All time', 'trawell' ),
		);
		
		return $options;
	}
endif;


/**
 * Get related plugins
 *
 * Check if Yet Another Related Posts Plugin (YARPP) or Contextual Related Posts or WordPress Related Posts or Jetpack by WordPress.com is active
 *
 * @return bool
 * @since  1.0
 */
if (!function_exists( 'trawell_get_related_posts_plugins' )):
	function trawell_get_related_posts_plugins () {
		$related_plugins['default'] = esc_html__( 'Built-in (Trawell) related posts', 'trawell' );
		$related_plugins[ ( trawell_is_yarpp_active() ) ? 'yarpp' : 'yarpp-disabled' ] = esc_html__( 'Yet Another Related Posts Plugin (YARPP)', 'trawell' );
		$related_plugins[ ( trawell_is_crp_active() ) ? 'crp' : 'crp-disabled' ] = esc_html__( 'Contextual Related Posts', 'trawell' );
		$related_plugins[ ( trawell_is_wrpr_active() ) ? 'wrpr' : 'wrpr-disabled' ] = esc_html__( 'WordPress Related Posts', 'trawell' );
		$related_plugins[ ( trawell_is_jetpack_active() ) ? 'jetpack' : 'jetpack-disabled' ] = esc_html__( 'Jetpack by WordPress.com', 'trawell' );
		
		return $related_plugins;
	}
endif;

/**
 * Get breadcrumbs by options
 *
 * Check breadcrumbs support depending on witch plugins are active
 *
 * @return bool
 * @since  1.0
 */
if (!function_exists( 'trawell_get_breadcrumbs_options' )):
	function trawell_get_breadcrumbs_options () {
		
		$options['none'] = esc_html__( 'None', 'trawell' );
		$options[ ( trawell_is_yoast_active() ) ? 'yoast' : 'yarpp-disabled' ] = esc_html__( 'Yoast SEO (or Yoast Breadcrumbs)', 'trawell' );
		$options[ ( trawell_is_breadcrumbs_navxt_active() ) ? 'bcn' : 'bcn-disabled' ] = esc_html__( 'Breadcrumb NavXT', 'trawell' );
		
		$options = apply_filters('trawell_modify_breadcrumbs_options', $options);
		
		return $options;
	}
endif;

/**
 * These are map styles for theme options
 *
 * @return mixed|void
 * @since  1.0
 */
if(!function_exists('trawell_get_map_styles')):
    function trawell_get_map_style_options(){
	
	    $styles[1] = array( 'title' => esc_html__( 'Default', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/map_1.png')  );
	    $styles[2] = array( 'title' => esc_html__( 'Light blue', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/map_2.png') );
	    $styles[3] = array( 'title' => esc_html__( 'Dark blue', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/map_3.png') );
	    $styles[4] = array( 'title' => esc_html__( 'Light gray', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/map_4.png') );
	    $styles[5] = array( 'title' => esc_html__( 'Green', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/map_5.png') );
	    $styles['custom'] = array( 'title' => esc_html__( 'Custom', 'trawell' ), 'img' => get_parent_theme_file_uri('/assets/img/admin/map_custom.png') );
	
	    $styles = apply_filters('trawell_modify_map_styles', $styles);
	    
	    return $styles;
	}
endif;