<?php

/**
 * body_class callback
 *
 * Checks for specific options and applies additional class to body element
 *
 * @since  1.0
 */

add_filter( 'body_class', 'trawell_body_class' );

if ( !function_exists( 'trawell_body_class' ) ):
	function trawell_body_class( $classes ) {

        if( trawell_get_option('header_orientation') == 'container-full'){
            $classes[] = 'trawell-header-wide';
        }

        if( trawell_get_option('color_header_main_bg') == trawell_get_option('color_bg') ){
            $classes[] = 'trawell-header-shadow';
        }

        if( trawell_is_indented_cover() ){
            $classes[] = 'trawell-header-indent';
        }

		if( trawell_get_option('cover_animate') && in_array(trawell_get('cover'), array('standard', 'static') ) ){
			$classes[] = 'trawell-animation-kenburns';
		}
		
        if( !trawell_is_indented_cover() && is_archive() ){
            $classes[] = 'trawell-breadcrumbs-center';
        }

        if( trawell_get_option('widget_style') != 'default'){
            $classes[] = trawell_get_option('widget_style');
        }

        if( trawell_get_option('image_style') != 'default'){
            $classes[] = trawell_get_option('image_style');
        }

        if( trawell_get_option('pill_style') != 'default'){
            $classes[] = trawell_get_option('pill_style');
        }
		
		if ( ! trawell_get_option( 'single_sidebar_mini_show' ) && is_single() ) {
			$classes[] = 'trawell-sidebar-mini-none';
		}

        if( trawell_get_option('color_bg') == trawell_get_option('color_sidebar_bg')){
            $classes[] = 'trawell-equal-bg-color';
        }

        $classes[] = trawell_get_sidebar_class();

                
		return $classes;
	}
endif;


/* Add media grabber features */

add_action( 'init', 'trawell_add_media_grabber' );

if ( !function_exists( 'trawell_add_media_grabber' ) ):
    function trawell_add_media_grabber() {
        if ( !class_exists( 'Hybrid_Media_Grabber' ) ) {

            include_once get_template_directory() .'/inc/media-grabber/class-hybrid-media-grabber.php';
        }
    }
endif;


/* Add span elements to post count number in category widget */

add_filter( 'wp_list_categories', 'trawell_add_span_cat_count', 10, 2 );

if ( !function_exists( 'trawell_add_span_cat_count' ) ):
    function trawell_add_span_cat_count( $links, $args ) {

        if ( isset( $args['taxonomy'] ) && $args['taxonomy'] != 'category' ) {
            return $links;
        }

        $links = preg_replace( '/(<a[^>]*>)/', '$1<span class="label">', $links );
        $links = str_replace( '</a>', '</span></a>', $links );
        $links = str_replace( '</a> (', '<span class="count">', $links );
        $links = str_replace( ')', '</span></a>', $links );

        return $links;
    }
endif;


/**
 * frontpage_template filter callback
 *
 * Use front-page.php template only if a user selected "static page" 
 * in reading settings. This will ensure that "latest posts" option will always load index.php
 *
 * @since  1.0
 */

add_filter( 'frontpage_template',  'trawell_front_page_template' );

if ( !function_exists( 'trawell_front_page_template' ) ):
function trawell_front_page_template( $template ) {

    $template = is_home() ? '' : $template;

    return $template;
}

endif;


/**
 * Widget display callback
 *
 * Check if highlight option is selected and add trawell highlight class to widget
 *
 * @return void
 * @since  1.0
 */

add_filter( 'dynamic_sidebar_params', 'trawell_modify_widget_display' );

if ( !function_exists( 'trawell_modify_widget_display' ) ) :

    function trawell_modify_widget_display( $params ) {

        if ( strpos( $params[0]['id'], 'trawell_footer_sidebar' ) !== false ) {
            return $params; //do not apply styling for footer widgets
        }

        global $wp_registered_widgets;

        $widget_id              = $params[0]['widget_id'];
        $widget_obj             = $wp_registered_widgets[$widget_id];
        $widget_num             = $widget_obj['params'][0]['number'];
        $widget_opt = get_option( $widget_obj['callback'][0]->option_name );

        if ( isset( $widget_opt[$widget_num]['trawell-highlight'] ) && $widget_opt[$widget_num]['trawell-highlight'] == 1 ) {
            $params[0]['before_widget'] = preg_replace_callback( '/class="/', function($m) { return $m[0] . "trawell-highlight " ; }, $params[0]['before_widget'] );
        }

        if ( isset( $widget_opt[$widget_num]['trawell-no-padding'] ) && $widget_opt[$widget_num]['trawell-no-padding'] == 1 ) {
            $params[0]['before_widget'] = preg_replace_callback( '/class="/', function($m) { return $m[0] . "widget-no-padding " ; }, $params[0]['before_widget'] );
        }

        return $params;

    }

endif;


/**
 * Detect when gallery is executed on page
 * and set a status flag so we know whether to print our popup placeholder later
 *
 * @since  1.0
 */

add_filter( 'post_gallery', 'trawell_gallery_placeholder', 101, 3 );

if ( !function_exists( 'trawell_gallery_placeholder' ) ):
	function trawell_gallery_placeholder( $output = '', $atts, $instance ) {
		
		trawell_set( 'gallery_loaded',  1 ) ;
		
		return $output;
	}
endif;

/**
 * Add class to gallery images to enable pop-up and change image sizes
 *
 * @since  1.0
 */

add_filter( 'shortcode_atts_gallery', 'trawell_gallery_atts', 10, 3 );

if ( !function_exists( 'trawell_gallery_atts' ) ):
    function trawell_gallery_atts( $output, $pairs, $atts ) {

        $atts['link'] = 'file';
        $output['link'] = 'file';

        add_filter( 'wp_get_attachment_link', 'trawell_add_class_attachment_link', 10, 2 );

        if ( !isset( $output['columns'] ) ) {
            $output['columns'] = 1;
        }

        switch ( $output['columns'] ) {
            case '1' : $output['size'] = 'trawell-a1'; break;
            case '2' : $output['size'] = 'trawell-a2'; break;
            case '3' : $output['size'] = 'trawell-a3'; break;
            default: $output['size'] = 'trawell-a4'; break;
        }

        return $output;
        
    }
endif;


if ( !function_exists( 'trawell_add_class_attachment_link' ) ):
    function trawell_add_class_attachment_link( $link, $attachment_id ) {

        $meta = wp_get_attachment_metadata( $attachment_id );

        $width = isset( $meta['width'] ) ? $meta['width'] : 1920;
        $height = isset( $meta['height'] ) ? $meta['height'] : 1280;
        
        $link = str_replace( '<a', '<a data-size="'.esc_attr(json_encode( array('w' => $width, 'h' => $height ) )).'"', $link);
        
        return $link;
    }
endif;


/**
 * Modify WooCommerce wrappers
 *
 * Provide support for WooCommerce pages to match theme HTML markup
 *
 * @return HTML output
 * @since  1.0
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_before_main_content', 'trawell_woocommerce_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'trawell_woocommerce_wrapper_end', 10 );

if ( !function_exists( 'trawell_woocommerce_wrapper_start' ) ):
    function trawell_woocommerce_wrapper_start() {
		
        echo '<div class="trawell-main">';
        
        if(trawell_has_sidebar('left')){
	        remove_action('woocommerce_sidebar','woocommerce_get_sidebar', 10);
        	get_sidebar();
        }
        
        echo '<div class="trawell-entry trawell-section">';
    }
endif;

if ( !function_exists( 'trawell_woocommerce_wrapper_end' ) ):
    function trawell_woocommerce_wrapper_end() {
        echo '</div>';
    }
endif;

add_action( 'woocommerce_sidebar', 'trawell_woocommerce_close_wrap' );

if ( !function_exists( 'trawell_woocommerce_close_wrap' ) ):
    function trawell_woocommerce_close_wrap() {
        if ( trawell_is_woocommerce_page() ) {
            echo '</div>';
        }
    }
endif;


/**
 * pre_get_posts filter callback
 *
 * If a user select custom number of posts per specific archive
 * template, override default post per page value
 *
 * @since  1.0
 */

add_action( 'pre_get_posts', 'trawell_pre_get_posts' );

if ( !function_exists( 'trawell_pre_get_posts' ) ):
	function trawell_pre_get_posts( $query ) {
		
		if ( !is_admin() && $query->is_main_query() && ( $query->is_archive() || $query->is_search() || $query->is_posts_page ) && !$query->is_feed() ) {
			
			$ppp = get_option( 'posts_per_page' );
			
			if($query->is_category()){
				$category_meta = trawell_get_category_meta( get_queried_object_id() );
			
				if($category_meta['display_settings'] == 'custom' || trawell_get_option( 'category_ppp' ) == 'custom'){
					$ppp = $category_meta['ppp'];
				}
				
			}else{
				$ppp = trawell_get_option( 'archive_ppp' ) == 'custom' ? trawell_get_option(  'archive_ppp_num' ) : $ppp;
			}
			
			
			//Get posts per page
			$query->set( 'posts_per_page', absint( $ppp ) );
			
		}
		
	}
endif;

/**
 * Add pin color on single post
 *
 * @param $settings
 * @return mixed
 * @since 1.0
 */
add_filter('mks_map_modify_single_content_filter_settings', 'trawell_modify_single_map_settings');
if(!function_exists('trawell_modify_single_map_settings')):
    function trawell_modify_single_map_settings($settings){
		
		$settings['pinColor'] = trawell_get_post_color();
		$settings['clusterColor'] = trawell_get_post_color();
		$settings['styles'] = trawell_get_map_style();
		$settings['clusterTextColor'] = trawell_get_option('color_bg');
		
		return $settings;
    }
endif;

/**
 * Disable showing map on the end of category description
 *
 * @param $settings
 * @return mixed
 * @since 1.0
 */
add_filter('mks_map_modify_settings', 'trawell_modify_map_settings');
if(!function_exists('trawell_modify_map_settings')):
	function trawell_modify_map_settings($settings){
		
		$settings['clusterTextColor'] = trawell_get_option('color_bg');
		$settings['pinColor'] = trawell_get_post_color();
		$settings['clusterColor'] = trawell_get_post_color();
		
		return $settings;
	}
endif;

/**
 * Disable showing map on the end of category description
 *
 * @since 1.0
 */
remove_filter( 'category_description',  'mks_map_category_content_filter');


/**
 * Add Theme options links to adminbar on frontend
 *
 * @param WP_Admin_Bar $admin_bar
 * @return WP_Admin_Bar
 * @since  1.0
 */

add_action('admin_bar_menu', 'trawell_add_frontend_adminbar_theme_options_links', 100);
if(!function_exists('trawell_add_frontend_adminbar_theme_options_links')):
	function trawell_add_frontend_adminbar_theme_options_links($admin_bar){
		
		if(!trawell_is_redux_active() || is_admin() || !current_user_can('manage_options')){
			return $admin_bar;
		}
		
		$admin_bar->add_menu( array(
			'id'    => 'wp-admin-bar-trawell_options',
			'title' => '<span class="ab-icon dashicons-admin-generic"></span>' . __('Theme Options', 'trawell'),
			'href'  => admin_url('admin.php?page=trawell_options&tab=1'),
			'meta'  => array(
				'title' => __('Theme Options', 'trawell'),
				'target' => '_blank',
			),
		));
		
		return $admin_bar;
	}
endif;



/**
 * Filter Function to add class to the media attachment link
 *
 * @since 1.1
 *
 * @return   $content
 */

add_filter( 'the_content', 'trawell_popup_filter');

if ( !function_exists('trawell_popup_filter') ) :
	function trawell_popup_filter($content) {
	
		if ( ! trawell_get_option( 'on_single_img_popup' ) ) {
			return $content;
		}
		
		preg_match_all("/<a href=\"(?P<href>.*?).(?P<img_type>bmp|gif|jpeg|jpg|png)\">/i", $content, $matches );
		
		if ( empty($matches['href']) ) {
			return $content;
		}
		
		trawell_set( 'gallery_loaded',  1 ) ;
		
		foreach ($matches['href'] as $key => $value) {
			
			$img_url = $value . '.' . $matches['img_type'][$key];
			$img_id = trawell_get_image_id_by_url($img_url);
			
			$img_size = wp_get_attachment_image_src($img_id, 'full');
			$data_size = !empty($img_size) ? array( "w" => $img_size[1], "h" => $img_size[2] ) : array( "w" => 1920, "h" => 1280 );
			
			$url_pattern = '/(\/)/';
			$url_rgx = preg_replace( $url_pattern, "\/", $value );
			
			$pattern = '/<a(.*?)href=\"('.$url_rgx.').(bmp|gif|jpeg|jpg|png)\">/i';
			$replacement = '<a$1class="trawell-popup-img" href=$2.$3  data-size="'.esc_attr(json_encode( $data_size, JSON_FORCE_OBJECT )).'" >';
			$content = preg_replace( $pattern, $replacement, $content );
			
		}
		
		return $content;
	}
endif;


/**
 * Woocommerce Ajaxify Cart
 *
 * @return bool
 * @since  1.2
 */

if ( !function_exists( 'trawell_woocommerce_ajax_fragments' ) ):
	
	if ( trawell_is_woocommerce_active() && version_compare( WC_VERSION, '3.2.6', '<') ) {
		add_filter( 'add_to_cart_fragments', 'trawell_woocommerce_ajax_fragments' );
	} else {
		add_filter( 'woocommerce_add_to_cart_fragments', 'trawell_woocommerce_ajax_fragments' );
	}
	
	function trawell_woocommerce_ajax_fragments( $fragments ) {
		ob_start();
		
		get_template_part('template-parts/header/elements/cart');
		
		$fragments['.trawell-cart-icon'] = ob_get_clean();
		
		return $fragments;
	}
endif;
?>