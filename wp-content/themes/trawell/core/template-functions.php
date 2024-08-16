<?php

/**
 * Main get function for front-end display and checking
 *
 * It gets the value from our theme global variable which contains all the settings for the current page/template
 *
 * @param mixed   $args can be a string or an array in this format: array('part' => '', 'option' => '')
 * @return mixed
 * @since  1.0
 */
if ( !function_exists( 'trawell_get' ) ):
    function trawell_get( $args ) {

        $trawell = get_query_var( 'trawell' );

        if ( empty( $trawell ) ) {
            $trawell = trawell_setup();
        }

        if ( is_array( $args ) && isset( $trawell[$args['part']][$args['option']] ) ) {
            return $trawell[$args['part']][$args['option']];
        }

        if ( isset( $trawell[$args] ) ) {
            return $trawell[$args];
        }

        return false;
    }
endif;


/**
 * Function to set a specific option/value to our global front-end settings variable
 *
 * @param string  $option name of the option to set
 * @param mixed   $value  option value
 * @return void
 * @since  1.0
 */

if ( !function_exists( 'trawell_set' ) ):
    function trawell_set( $option, $value ) {

        $trawell = get_query_var( 'trawell', array() );

        if ( !empty( $option ) && !empty( $value ) ) {
            $trawell[$option] = $value;
            set_query_var( 'trawell', $trawell );
        }

    }
endif;


/**
 * Wrapper function for __()
 *
 * It checks if specific text is translated via options panel
 * If option is set, it returns translated text from theme options
 * If option is not set, it returns default translation string (from language file)
 *
 * @param string  $string_key Key name (id) of translation option
 * @return string Returns translated string
 * @since  1.0
 */

if ( !function_exists( '__trawell' ) ):
    function __trawell( $string_key ) {

        $translate = trawell_get_translate_options();
        $translated_string = trawell_get_option( 'tr_' . $string_key );
        
        if( !trawell_get_option( 'enable_translate' ) ){
            return wp_kses_post( $translate[$string_key]['text'] );
        }
        
        if( isset( $translate[$string_key]['hidden'] ) && $translated_string == '') {
            return '';
        }

        if ( $translated_string == '-1' ) {
            return '';
        }

        if(!empty($translated_string)){
           return wp_kses_post(  $translated_string );
        }
        
        return wp_kses_post( $translate[$string_key]['text'] );
    }
endif;

/**
 * Get featured image
 *
 * Function gets featured image depending on the size and post id.
 * If image is not set, it gets the default featured image placehloder from theme options.
 *
 * @param string  $size               Image size ID
 * @param bool    $ignore_default_img Wheter to apply default featured image if post doesn't have featured image
 * @return string Image HTML output
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_featured_image' ) ):
    function trawell_get_featured_image( $size = 'full', $ignore_default_img = false, $post_id = false ) {

        if(empty($post_id)){
            $post_id = get_the_ID();
        } 

        if ( has_post_thumbnail( $post_id ) ) {

            return get_the_post_thumbnail( $post_id, $size );

        } else if ( !$ignore_default_img && ( $placeholder = trawell_get_option( 'default_fimg', 'image' ) ) ) {

                //If there is no featured image, try to get default from theme options

                global $placeholder_img, $placeholder_imgs;

                if ( empty( $placeholder_img ) ) {
                    $img_id = trawell_get_image_id_by_url( $placeholder );
                } else {
                    $img_id = $placeholder_img;
                }

                if ( !empty( $img_id ) ) {
                    if ( !isset( $placeholder_imgs[$size] ) ) {
                        $def_img = wp_get_attachment_image( $img_id, $size );
                    } else {
                        $def_img = $placeholder_imgs[$size];
                    }

                    if ( !empty( $def_img ) ) {
                        $placeholder_imgs[$size] = $def_img;

                        return wp_kses_post( $def_img );
                    }
                }

                return wp_kses_post( '<img src="' . esc_attr( $placeholder ) . '" alt="' . esc_attr( get_the_title( $post_id ) ) . '" />' );
            }

        return false;
    }
endif;



/**
 * Get category featured image
 *
 * Function gets category featured image depending on the size
 *
 * @param string  $size   Image size ID
 * @param int     $cat_id
 * @return string Image HTML output
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_category_featured_image' ) ):
    function trawell_get_category_featured_image( $size = 'full', $cat_id = false, $ignore_placeholder = false ) {


        if ( empty( $cat_id ) ) {
            $cat_id = get_queried_object_id();
        }

        $img_html = '';

        $img_url = trawell_get_category_meta( $cat_id, 'image' );

        if ( !empty( $img_url ) ) {
            $img_id = trawell_get_image_id_by_url( $img_url );
            $img_html = wp_get_attachment_image( $img_id, $size );
            if ( empty( $img_html ) ) {
                $img_html = '<img src="'.esc_url( $img_url ).'"/>';
            }
        }

        if ( empty( $img_html ) && !$ignore_placeholder ) {
            $img_html = '<div class="trawell-category-placeholder cat-'.$cat_id.'"></div>';
        }

        return wp_kses_post( $img_html );
    }
endif;

/**
 * Get header options
 * Return header params based on theme options
 *
 * @since  1.0
 * @return array
 */

if ( !function_exists( 'trawell_get_header_options' ) ):
    function trawell_get_header_options() {
        $defaults = array(
	        'top'     => array(),
	        'layout'  => 1,
	        'actions' => '',
	        'sticky'  => true,
        );

        if ( trawell_get_option( 'header_top' ) ) {
            $options['top'] = array(
                'l' =>  trawell_get_option( 'header_top_l' ),
                'c' =>  trawell_get_option( 'header_top_c' ),
                'r' =>  trawell_get_option( 'header_top_r' ),
            );
        }
        
        $options['layout'] = trawell_get_option( 'header_layout' );
        $options['actions'] = trawell_get_option( 'header_actions', 'multi' );
        
        // Responsive Options
        $options['responsive_secondary_nav'] = trawell_get_option( 'header_responsive_secondary_nav' );
        $options['responsive_actions'] = trawell_get_option( 'header_responsive_actions', 'multi' );
        
        if(  trawell_get_option( 'woocommerce_cart_force') &&  trawell_is_woocommerce_page() && !in_array('cart', $options['actions']) ){
            $options['actions'][] = 'cart';
        }

        $options['sticky'] = trawell_get_option( 'header_sticky' );


        $options = apply_filters( 'trawell_modify_header_options', $options );

        $options = trawell_parse_args( $options, $defaults );

        return $options;
    }
endif;

/**
 * Get footer options
 * Return header params based on theme options
 *
 * @since  1.0
 * @return array
 */

if ( !function_exists( 'trawell_get_footer_options' ) ):
    function trawell_get_footer_options() {
        $options = array();

        $prefooter = trawell_get_option( 'prefooter' );
        $options['prefooter'] = $prefooter !== 'none' ? $prefooter : false;
        $options['widgets'] = trawell_get_option( 'footer_widgets' );
        $options['layout'] = trawell_get_option( 'footer_layout' );

        $options = apply_filters( 'trawell_modify_footer_options', $options );

        return $options;
    }
endif;

/**
 * Get meta data
 *
 * Function outputs meta data HTML
 *
 * @param array   $meta_data
 * @return string HTML output of meta data
 * @since  1.0
 */


if ( !function_exists( 'trawell_get_meta_data' ) ):
    function trawell_get_meta_data( $meta_data = array() ) {

        $output = '';

        if ( empty( $meta_data ) ) {
            return $output;
        }

        foreach ( $meta_data as $mkey ) {


            $meta = '';

            switch ( $mkey ) {

            case 'date':
                $meta = '<span class="updated">' . get_the_date() . '</span>';
                break;

            case 'author':
                $author_id = get_post_field( 'post_author', get_the_ID() );
                $meta = '<span class="vcard author"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID', $author_id ) ) ) . '">' . get_the_author_meta( 'display_name', $author_id ) . '</a></span>';
                break;

            case 'rtime':
                $meta = trawell_read_time( get_post_field( 'post_content', get_the_ID() ) );
                if ( !empty( $meta ) ) {
                    $meta .= ' ' . __trawell( 'min_read' );
                }
                break;

            case 'comments':
                if ( comments_open() || get_comments_number() ) {
                    ob_start();
                    $scroll_class = is_single() && is_main_query() ? 'trawell-scroll-animate' : '';
                    comments_popup_link( __trawell( 'no_comments' ), __trawell( 'one_comment' ), __trawell( 'multiple_comments' ), $scroll_class, '' );
                    $meta = ob_get_contents();
                    ob_end_clean();
                } else {
                    $meta = '';
                }
                break;

            default:
                break;
            }

            if ( !empty( $meta ) ) {
                $output .= '<span class="meta-item meta-' . $mkey . '">' . $meta . '</span>';
            }
        }


        return wp_kses_post( $output );

    }
endif;


/**
 * Get post categories data
 *
 * Function outputs category links with HTML
 *
 * @param int     $post_id
 * @return string HTML output of category links
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_category' ) ):
    function trawell_get_category( $post_id = false ) {

        if ( empty( $post_id ) ) {
            $post_id = get_the_ID();
        }

        $terms = get_the_terms( $post_id, 'category' );

        if ( is_wp_error( $terms ) ) {
            return '';
        }

        if ( empty( $terms ) ) {
            return '';
        }

        $links = array();

        foreach ( $terms as $term ) {
            $link = get_term_link( $term, 'category' );
            if ( !is_wp_error( $link ) ) {
                $links[] = '<a href="' . esc_url( $link ) . '" rel="tag" class="cat-'.esc_attr( $term->term_id ).'">' . $term->name . '</a>';
            }
        }

        if ( !empty( $links ) ) {
            return implode( '', $links );
        }

        return '';

    }
endif;


/**
 * Get post format icon
 *
 * Function outputs post format icon HTML
 *
 * @return string HTML output of post format icons
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_format_icon' ) ):
    function trawell_get_format_icon() {

        $icons = array(
            'video' => 'fa fa-play',
            'audio' => 'fa fa-music',
            'gallery' => 'fa fa-camera'
        );

        $icons = apply_filters( 'trawell_modify_format_icons', $icons );

        $format = trawell_get_post_format();

        if ( !array_key_exists( $format, $icons ) ) {
            return '';
        }

        return '<span><i class="'.esc_attr( $icons[$format] ).'"></i></span>';

    }
endif;



/**
 * Get post excerpt
 *
 * Function outputs post excerpt for specific layout
 *
 * @param int     $limit Number of characters to limit excerpt
 * @return string HTML output of category links
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_excerpt' ) ):
    function trawell_get_excerpt( $limit = 250 ) {

        $manual_excerpt = false;

        if ( has_excerpt() ) {
            $content = get_the_excerpt();
            $manual_excerpt = true;
        } else {
            $text = get_the_content( '' );
            $text = strip_shortcodes( $text );
            $text = apply_filters( 'the_content', $text );
            $content = str_replace( ']]>', ']]&gt;', $text );
        }

        if ( !empty( $content ) ) {
            if ( !empty( $limit ) || !$manual_excerpt ) {
                $more = trawell_get_option( 'more_string' );
                $content = wp_strip_all_tags( $content );
                $content = preg_replace( '/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i', '', $content );
                $content = trawell_trim_chars( $content, $limit, $more );
            }

            return wp_kses_post( wpautop( $content ) );
        }

        return '';

    }
endif;

/**
 * Get social share
 *
 * Checks social share options to generate sharing buttons
 *
 * @return array List of HTML sharing links
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_share' ) ):
    function trawell_get_share( $options, $echo = false ) {

        if ( empty( $options ) ) {
            return false;
        }

        $title = trawell_esc_text( get_the_title() );
        $url = rawurlencode( esc_url( esc_attr( get_the_permalink() ) ) );

        $share = array();
        $share['facebook'] = '<a href="javascript:void(0);" class="trawell-facebook" data-url="http://www.facebook.com/sharer/sharer.php?u=' . $url . '&amp;t=' . $title . '"><i class="fa fa-facebook"></i></a>';
        $share['twitter'] = '<a href="javascript:void(0);" class="trawell-twitter" data-url="http://twitter.com/intent/tweet?url=' . $url . '&amp;text=' . $title . '"><i class="fa fa-twitter"></i></a>';
        $share['gplus'] = '<a href="javascript:void(0);"  class="trawell-gplus" data-url="https://plus.google.com/share?url=' . $url . '"><i class="fa fa-google-plus"></i></a>';
        $pin_img = has_post_thumbnail() ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ) : '';
        $pin_img = isset( $pin_img[0] ) ? $pin_img[0] : '';
        $share['pinterest'] = '<a href="javascript:void(0);"  class="trawell-pinterest" data-url="http://pinterest.com/pin/create/button/?url=' . $url . '&amp;media=' . urlencode( esc_attr( $pin_img ) ) . '&amp;description=' . $title . '"><i class="fa fa-pinterest"></i></a>';
        $share['linkedin'] = '<a href="javascript:void(0);"  class="trawell-linkedin" data-url="http://www.linkedin.com/shareArticle?mini=true&amp;url=' . $url . '&amp;title=' . $title . '"><i class="fa fa-linkedin"></i></a>';
        $share['reddit'] = '<a href="javascript:void(0);"  class="trawell-reddit" data-url="http://www.reddit.com/submit?url=' . $url . '&amp;title=' . $title . '"><i class="fa fa-reddit"></i></a>';
        $share['email'] = '<a href="mailto:?subject=' . $title . '&amp;body=' . $url . '" class="prevent-share-popup trawell-mailto"><i class="o-envelope-1"></i></a>';
        $share['stumbleupon'] = '<a href="javascript:void(0);"  class="trawell-stumbleupon" data-url="http://www.stumbleupon.com/badge?url=' . $url . '&amp;title=' . $title . '"><i class="fa fa-stumbleupon"></i></a>';
        $share['vk'] = '<a href="javascript:void(0);"  class="trawell-vkontakte" data-url="http://vk.com/share.php?url='.$url.'&amp;title='.$title.'"><i class="fa fa-vk"></i></a>';
        $share['whatsapp'] = '<a href="https://api.whatsapp.com/send?text='.$title.' '.$url.'" class="trawell-whatsapp prevent-share-popup"><i class="fa fa-whatsapp"></i></a>';

        $output = array();

        foreach ( $options as $social ) {
            if ( array_key_exists( $social, $share ) ) {
                $output[] = $share[$social];
            }
        }

        $output = apply_filters( 'trawell_modify_share', $output );

        if ( $echo ) {

            foreach ( $output as $item ) {
                echo $item;
            }

        } else {
            return $output;
        }

    }
endif;

/**
 * Get previous/next posts
 *
 * @return array Previous and next post ids and labels
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_prev_next_posts' ) ):
    function trawell_get_prev_next_posts() {

        $prev = array();
        $next = array();

        if ( is_single() ) {

            $prev_post = get_adjacent_post( true, '', false, 'category' );
            $next_post = get_adjacent_post( true, '', true, 'category' );

            if ( !empty( $prev_post ) ) {
                $prev['id'] = $prev_post;
                $prev['label'] = __trawell( 'previous_post' );
            }

            if ( !empty( $next_post ) ) {
                $next['id'] = $next_post;
                $next['label'] = __trawell( 'next_post' );
            }

        }

        if ( empty( $prev ) && empty( $next ) ) {
            return array();
        }

        return array( 'prev' => $prev, 'next' => $next );

    }
endif;




/**
 * Get branding
 *
 * Returns HTML of logo or website title based on theme options
 *
 * @param string  $element ID of an element to check
 * @return string HTML
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_branding' ) ):
    function trawell_get_branding() {

        global $trawell_logo_used; //if logo is already displayed, we are on sticky header

        //Get all logos
        $logo = trawell_get_option('logo', 'image');
        $logo_retina = trawell_get_option('logo_retina', 'image');
        $logo_mini = trawell_get_option('logo_mini', 'image');
        $logo_mini_retina = trawell_get_option('logo_mini_retina', 'image');
        $logo_alt = trawell_get_option('logo_alt', 'image');
        $logo_retina_alt = trawell_get_option('logo_retina_alt', 'image');
        $logo_mini_alt = trawell_get_option('logo_mini_alt', 'image');
        $logo_mini_retina_alt = trawell_get_option('logo_mini_retina_alt', 'image');

        //Check what logo to use 
        if ( !$trawell_logo_used && trawell_is_indented_cover() && trawell_get_option( 'header_indent_logo_alt' ) ) {
            $logo = $logo_alt;
            $logo_mini = $logo_mini_alt;
            $logo_retina = $logo_retina_alt;
            $logo_mini_retina = $logo_mini_retina_alt;

        } else {

            if ( $trawell_logo_used && trawell_get_option( 'header_sticky_logo' ) == 'mini' ) {
                $logo =  $logo_mini;
                $logo_retina =  $logo_mini_retina;
            }
        }

        if(empty($logo_mini)){
            $logo_mini = $logo;
        }


        if(empty($logo)){

            $brand =  get_bloginfo( 'name' );
            $empty_logo_class = 'logo-img-none';

        } else {
             $brand = '<picture class="trawell-logo">';
             $brand .= '<source media="(min-width: 1024px)" srcset="'.esc_attr($logo);

             if(!empty($logo_retina)){
                 $brand .= ', '.esc_attr($logo_retina).' 2x';
             }

             $brand .= '">';
             $brand .= '<source srcset="'.esc_attr($logo_mini);

             if(!empty($logo_mini_retina)){
                 $brand .= ', '.esc_attr($logo_mini_retina).' 2x';
             }

             $brand .= '">';
             $brand .= '<img src="'.esc_attr($logo).'" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
             $brand .= '</picture>';

             $empty_logo_class = '';
        }

        $element = is_front_page() && empty( $trawell_logo_used ) ? 'h1' : 'span';
        $url = trawell_get_option( 'logo_custom_url' ) ? trawell_get_option( 'logo_custom_url' ) : home_url( '/' );
        $site_desc = empty( $trawell_logo_used ) && trawell_get_option( 'header_site_desc' ) ? '<span class="site-description">' . get_bloginfo( 'description' ) . '</span>' : '';
        $output = '<' . esc_attr( $element ) . ' class="site-title h1 '.esc_attr($empty_logo_class).'"><a href="' . esc_url( $url ) . '" rel="home">' . $brand . '</a></' . esc_attr( $element ) . '>' . $site_desc;

        $trawell_logo_used = true;

        return apply_filters( 'trawell_modify_branding', $output );

    }
endif;

/**
 * Get category options
 * Return category params based on theme options
 *
 * @since  1.0
 * @return array
 */

if ( !function_exists( 'trawell_get_category_template_options' ) ):
    function trawell_get_category_template_options() {

        $args = array();
        $meta = trawell_get_category_meta( get_queried_object_id() );

        $args['cover'] = trawell_get_archive_cover( trawell_get_option( 'category_layout' ) );

        $args['content'] = trawell_get_archive_content();

        $args['pagination'] = ( !empty( $meta['pagination'] ) ) ? $meta['pagination'] : trawell_get_option( 'category_pag' );

        $args['sidebar'] = array(
            'position' => ( !empty( $meta['sidebar_position'] ) ) ? $meta['sidebar_position'] : trawell_get_option( 'category_sidebar_position' ),
            'classic' => ( !empty( $meta['sidebar'] ) ) ? $meta['sidebar'] : trawell_get_option( 'category_sidebar_standard' ),
            'sticky' => ( !empty( $meta['sticky_sidebar'] ) ) ? $meta['sticky_sidebar'] : trawell_get_option( 'category_sidebar_sticky' ) );

        $args['layout'] = trawell_get_category_posts_layout_setting( $args['sidebar']['position'] );

        $args['map'] = '';

        if ( trawell_is_maps_active() ) {
            $map_query_args = mks_map_get_query( array( 'cat' => get_queried_object_id(), 'posts_per_page' => -1 ) );
            $map_query = new WP_Query( $map_query_args );
            $args['map'] = array( 'items' => trawell_parse_map_posts( $map_query ), 'settings' => trawell_get_map_category_settings() );
        }

        $args['loop'] = $args['layout'];

        if ( $args['sidebar']['position'] != 'none' ) {
            $args['loop'] .= '-sid';
        }

        return apply_filters( 'trawell_modify_category_template_options', $args );

    }
endif;

/**
 * Get category archive posts layout
 *
 * @param unknown $sidebar_position
 * @return string layout name
 * @since 1.0
 */
if ( !function_exists( 'trawell_get_category_posts_layout_setting' ) ):
    function trawell_get_category_posts_layout_setting( $sidebar_position ) {

        $meta = trawell_get_category_meta( get_queried_object_id() );

        if ( $sidebar_position == 'none' ) {
            if ( !empty( $meta['posts_layout'] ) ) {
                return $meta['posts_layout'];
            }

            return trawell_get_option( 'category_posts_layout' );
        }

        if ( !empty( $meta['posts_layout_sid'] ) ) {
            return $meta['posts_layout_sid'];
        }

        return trawell_get_option( 'category_posts_layout_sid' );
    }
endif;

/**
 * Get archives options
 * Return archives params based on theme options
 *
 * @since  1.0
 * @return array
 */

if ( !function_exists( 'trawell_get_archive_template_options' ) ):
    function trawell_get_archive_template_options() {

        $args = array();

        $args['cover'] = trawell_get_archive_cover( trawell_get_option( 'archive_layout' ) );

        $args['content'] = trawell_get_archive_content();

        $args['pagination'] = trawell_get_option( 'archive_pag' );

        $args['sidebar'] = array( 'position' => trawell_get_option( 'archive_sidebar_position' ), 'classic' => trawell_get_option( 'archive_sidebar_standard' ), 'sticky' => trawell_get_option( 'archive_sidebar_sticky' ) );

        $args['layout'] = ( $args['sidebar']['position'] == 'none' ) ? trawell_get_option( 'archive_posts_layout' ) : trawell_get_option( 'archive_posts_layout_sid' );

        $args['loop'] = $args['layout'];

        if ( $args['sidebar']['position'] != 'none' ) {
            $args['loop'] .= '-sid';
        }

        if ( is_home() && get_option('page_for_posts') && get_queried_object_id() == get_option('page_for_posts') && trawell_get_featured_image('full', true,  get_option('page_for_posts') ) ) {
            $args['cover'] = 'blog';
        }

        $args = apply_filters( 'trawell_modify_archive_template_options', $args );

        return $args;
    }
endif;

/**
 * Get archives cover type
 *
 * @return string cover type
 * @since  1.0
 */
if ( !function_exists( 'trawell_get_archive_cover' ) ):
    function trawell_get_archive_cover( $layout ) {

        $meta = trawell_get_category_meta( get_queried_object_id() );

        if ( is_category() && !empty( $meta['cover'] ) && $meta['cover'] != $layout ) {
            if ( $meta['cover'] == 'classic' ) {
                return 'none';
            }
            return $meta['cover'];
        }

        if ( $layout == 'classic' ) {
            return 'none';
        }

        if ( is_category() && trawell_is_maps_active() && $layout == 'cover' && $meta['map'] ) {
            return 'map';
        }

        return 'standard';
    }
endif;

/**
 * Get single post options
 * Return single post params based on theme options
 *
 * @since  1.0
 * @return array
 */

if ( !function_exists( 'trawell_get_single_template_options' ) ):
    function trawell_get_single_template_options() {
        $args = array();

        $format = trawell_get_post_format();

        $args['format'] = $format;

        $args['cover'] = trawell_get_single_cover( $format );

        $args['map'] = trawell_is_maps_active() ? array( 'items' => mks_map_get_single_post(), 'settings' => trawell_get_map_single_settings() ) : '';

	    $meta = trawell_get_post_meta();
     
	    $args['media'] = !empty($args['map']) && !empty($meta['map_active']) && in_array($format, array('standard')) ? 'map' : $format;
	
	    if($args['media'] == "map" || $args['cover'] == "map"){
		    remove_filter('the_content', 'mks_map_content_filter');
	    }

        $args['sidebar'] = array(
            'position' => ( !empty( $meta['sidebar_position'] ) ) ? $meta['sidebar_position'] : trawell_get_option( 'single_sidebar_position' ),
            'classic' => ( !empty( $meta['sidebar'] ) ) ? $meta['sidebar'] : trawell_get_option( 'single_sidebar_standard' ),
            'sticky' => ( !empty( $meta['sticky_sidebar'] ) ) ? $meta['sticky_sidebar'] : trawell_get_option( 'single_sidebar_sticky' ) );

	    if(trawell_get_option('single_sidebar_mini_show')){
		    $sidebar_mini_position = $args['sidebar']['position'] == 'left' ? 'right' : 'left';
		    $args['sidebar_mini'] = array( 'position' =>  $sidebar_mini_position, 'elements' => trawell_get_option( 'single_sidebar_mini_meta', 'multi' ) );
		    $args['image_size'] = 'trawell-content';
	    }else{
		    $args['sidebar_mini'] = array( 'position' =>  'none' );
		    $args['image_size'] = 'trawell-content-wide';
	    }
        
        $args['share'] = trawell_get_option( 'social_share', 'multi' );

        $args['category'] = trawell_get_option( 'single_category' );

        $args['meta'] = trawell_get_option( 'single_meta', 'multi' );

        $args['icon'] = trawell_get_option( 'single_icon' );

        $args['headline'] = trawell_get_option( 'single_headline' );

        $args['fimg'] = trawell_get_option( 'single_fimg' );

        $args['fimg_cap'] = trawell_get_option( 'single_fimg_cap' );

        $args['tags'] = trawell_get_option( 'single_tags' );

        $args['author'] = trawell_get_option( 'single_author' );

        $args['related'] = trawell_get_option( 'single_related' );

        return apply_filters( 'trawell_modify_single_template_options', $args );
    }
endif;

/**
 * Get cover layout depending on post format, eg. if post has video format add show iframe in cover
 *
 * @param unknown $format post format
 * @return string cover name
 * @since  1.0
 */
if ( !function_exists( 'trawell_get_single_cover' ) ):
    function trawell_get_single_cover( $format = 'standard' ) {

        if ( is_page() ) {
            $meta = trawell_get_page_meta();
        }else {
            $meta = trawell_get_post_meta( get_the_ID() );
        }

        if ( $meta['cover'] == 'classic' ) {
            return 'none';
        }

        if ( $format == 'video' ) {
            return 'video';
        }

        if ( $format == 'gallery' ) {
            return 'gallery';
        }
        

        if ( isset( $meta['map']['enabled'] ) && $meta['map']['enabled'] && $meta['map_active'] ) {
            return 'map';
        }

        return 'standard';
    }
endif;

/**
 * Get page template options
 * Return page template params based on theme options
 *
 * @since  1.0
 * @return array
 */

if ( !function_exists( 'trawell_get_page_template_options' ) ):
    function trawell_get_page_template_options() {
        $args = array();

        $meta = trawell_get_page_meta();

        if(get_page_template_slug() == 'template-blank.php'){
	        $args['sidebar'] = array(
		        'position' => '',
		        'classic' => '',
		        'sticky' => '',
	        );
	        $args['cover'] = 'none';
	
	        $args['fimg'] = false;
	
	        $args['fimg_cap'] = false;
        
        }else{
	        $args['cover'] = trawell_get_single_cover( trawell_get_option( 'page_layout' ) );
	
	        $args['fimg'] = trawell_get_option( 'page_fimg' );
	
	        $args['fimg_cap'] = trawell_get_option( 'page_fimg_cap' );
	
	        $args['sidebar'] = array(
		        'position' => ( !empty( $meta['sidebar_position'] ) ) ? $meta['sidebar_position'] : trawell_get_option( 'page_sidebar_position' ),
		        'classic' => ( !empty( $meta['sidebar'] ) ) ? $meta['sidebar'] : trawell_get_option( 'page_sidebar_standard' ),
		        'sticky' => ( !empty( $meta['sticky_sidebar'] ) ) ? $meta['sticky_sidebar'] : trawell_get_option( 'page_sidebar_sticky' )
	        );
        }

        return apply_filters( 'trawell_modify_page_template_options', $args );
    }
endif;

/**
 * Get blank page template options
 * Return blank page template params based on metadata options
 *
 * @since  1.1
 * @return array
 */
if(!function_exists('trawell_get_blank_template_options')):
    function trawell_get_blank_template_options(){
	
	    $args = array();
	
	    $meta = trawell_get_page_meta();
	
	    $args['page_title'] = $meta['blank']['page_title'];
	    $args['header_show'] = $meta['blank']['header'];
	    $args['footer_show'] = $meta['blank']['footer'];
	    
	    return apply_filters('trawell_modify_blank_template_opstions', $args);
    }
endif;
/**
 * Get authors page template options
 * Return authors page template params based on theme options
 *
 * @since  1.0
 * @return array
 */

if ( !function_exists( 'trawell_get_authors_page_template_options' ) ):
    function trawell_get_authors_page_template_options() {
        $args = array();

        $meta = trawell_get_page_meta();
        $args['cover'] = trawell_get_single_cover();
        $args['fimg'] = trawell_get_option( 'page_fimg' );
        $args['fimg_cap'] = trawell_get_option( 'page_fimg_cap' );

        $args['sidebar'] = array(
            'position' => ( !empty( $meta['sidebar_position'] ) ) ? $meta['sidebar_position'] : trawell_get_option( 'page_sidebar_position' ),
            'classic' => ( !empty( $meta['sidebar'] ) ) ? $meta['sidebar'] : trawell_get_option( 'page_sidebar_standard' ),
            'sticky' => ( !empty( $meta['sticky_sidebar'] ) ) ? $meta['sticky_sidebar'] : trawell_get_option( 'page_sidebar_sticky' )
        );

        $authors_query_args = array(
            'fields'    => array( 'ID' ),
            'orderby'     => 'post_count',
            'order'   => 'DESC',
            'role__not_in' => array(),
            'exclude'   => '',
            'has_published_posts' => array( 'post' )
        );

        $authors_query = new WP_User_Query( $authors_query_args );
        $args['authors'] = $authors_query->get_results();


        return apply_filters( 'trawell_modify_authors_page_template_options', $args );
    }
endif;



/**
 * Get front page layout including sections that will be shown on front page
 *
 * @return string
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_frontpage_template_options' ) ):
    function trawell_get_frontpage_template_options() {
        
        global $paged;

        $args = array();

        $cover_type = trawell_get_frontpage_cover();
        $args['cover'] = $cover_type;

        if ( $args['cover'] != 'none' ) {
            $args[$cover_type] = trawell_get_frontpage_cover_settings( $cover_type );
        }

        $args['sidebar'] = array(
            'position' => trawell_get_option( 'home_sidebar_position' ),
            'classic' => trawell_get_option( 'home_sidebar_standard' ),
            'sticky' => trawell_get_option( 'home_sidebar_sticky' )
        );

        $args['sections'] = trawell_get_frontpage_sections( trawell_get_option( 'home_sections', 'multi' ), $args['sidebar']['position'] );

        $cta_type = trawell_get_option( 'home_posts_cta_type' );

        if ( $cta_type == 'pagination' ) {
            $args['pagination'] = trawell_get_option( 'home_posts_pag' );
        } elseif ( $cta_type == 'blog' ) {
            $args['cta'] = get_option( 'page_for_posts' ) ? '<div class="text-center"><a class="trawell-button" href="'.get_permalink( get_option( 'page_for_posts' ) ).'">'.__trawell( 'view_blog' ).'</a></div>' : wp_kses_post( sprintf( __( 'Please set the "Posts Page" in <a href="%s">Settings->Reading</a>', 'trawell' ), admin_url( 'options-reading.php' ) ) );
        }


        $paged = is_front_page() ? get_query_var( 'page' ) : get_query_var( 'paged' );


        if ( $paged > 1 ) {
            $args['cover'] = 'none';
            foreach ( $args['sections'] as $section_id => $section ) {
                if ( $section_id == 'posts' ) {
                    continue;
                }
                unset( $args['sections'][$section_id] );
            }
        }

        return apply_filters( 'trawell_modify_frontpage_template_options', $args );
    }
endif;

/**
 * Get front page cover type
 *
 * @return string
 * @since  1.0
 */
if ( !function_exists( 'trawell_get_frontpage_cover' ) ):
    function trawell_get_frontpage_cover() {
        if ( !trawell_get_option( 'home_cover' ) ) {
            return 'none';
        }

        $cover_type = trawell_get_option( 'home_cover_type' );

        if ( $cover_type == 'slider' ) {
            $slider_query_type = trawell_get_option( 'home_cover_query_type' );
            if ( !empty( $slider_query_type ) ) {
                return 'slider-' . $slider_query_type;
            }
        }

        $cover_type = apply_filters( 'trawell_modify_frontpage_cover', $cover_type );

        return $cover_type;
    }
endif;


/**
 * Get front page sections with all the settings
 *
 * @return array
 * @since  1.0
 */
if ( !function_exists( 'trawell_get_frontpage_sections' ) ):
    function trawell_get_frontpage_sections( $sections, $sidebar_position ) {
        if ( empty( $sections ) ) {
            return false;
        }

        $frontpage_sections = array();

        foreach ( $sections as $section ) {

            switch ( $section ) {
            case 'as-seen-in':
                $frontpage_sections['as-seen-in'] = array(
                    'title' => __trawell( 'home_as_seen_in_title' ),
                    'image' => trawell_get_option( 'home_as_seen_in_image' ),
                );
                break;

            case 'about':
                $frontpage_sections['about'] = array(
                    'title' => __trawell( 'home_about_title' ),
                    'image' => '',
                    'text' => __trawell( 'home_about_text' ),
                    'button_1_text' => __trawell( 'home_about_button_1_text' ),
                    'button_1_url' => trawell_get_option( 'home_about_button_1_url' ),
                    'button_2_text' => __trawell( 'home_about_button_2_text' ),
                    'button_2_url' => trawell_get_option( 'home_about_button_2_url' ),
                );
	
	            $img_url = trawell_get_option( 'home_about_image', 'image' );
	
	            if ( !empty( $img_url ) ) {
		            $img_id = trawell_get_image_id_by_url( $img_url );
		            $img_html = wp_get_attachment_image( $img_id, 'trawell-content' );
		            if ( empty( $img_html ) ) {
			            $img_html = '<img src="'.esc_url( $img_url ).'"/>';
		            }
		            $frontpage_sections['about']['image'] = $img_html;
	            }
                break;

            case 'posts':
                $frontpage_sections['posts'] = array(
                    'title' => __trawell( 'home_posts_title' ),
                    'layout' => ( $sidebar_position === 'none' ) ? trawell_get_option( 'home_posts_layout' ) : trawell_get_option( 'home_posts_layout_sid' ),
                );

                if ( trawell_is_maps_active() && $frontpage_sections['posts']['layout'] == "map" ) {
                    $posts_query_args = mks_map_get_query( trawell_get_frontpage_posts_query_args( 'home_posts', true ) );
                }else {
                    $posts_query_args = trawell_get_frontpage_posts_query_args( 'home_posts' );
                    
	                global $slider_unique_posts;
	
	                if(!empty($slider_unique_posts)){
		                $posts_query_args['post__not_in'] = $slider_unique_posts;
	                }
                }
                
                
                $frontpage_sections['posts']['query'] = new WP_Query( $posts_query_args );

                $frontpage_sections['posts']['loop'] = $frontpage_sections['posts']['layout'];

                if ( $sidebar_position != 'none' ) {
                    $frontpage_sections['posts']['loop'] .= '-sid';
                }
                break;

            case 'categories':
                $frontpage_sections['categories'] = array(
                    'title' => __trawell( 'home_categories_title' ),
                    'layout' => trawell_get_option( 'home_categories_layout' ),
                );

                $specific_categories = trawell_get_option( 'home_categories' );

                if ( !empty( $specific_categories ) ) {
                    $args = array( 'include' => $specific_categories );
                } else {
                    $args = array(
                        'hide_empty' => true,
                        'number'     => 0,
                    );
                }

                if ( trawell_is_maps_active() && $frontpage_sections['categories']['layout'] == 'map' ) {
                    $args = mks_map_get_query( $args );
                }

                $frontpage_sections['categories']['query'] = get_categories( $args );

                $frontpage_sections['categories']['loop'] = $frontpage_sections['categories']['layout'];

                if ( $sidebar_position != 'none' ) {
                    $frontpage_sections['categories']['loop'] .= '-sid';
                }
                break;

            case 'numbers':
                $frontpage_sections['numbers'] = array(
                    'title' => __trawell( 'home_counters_title' ),
                    1       => array(
                        'counter_1_title'  => __trawell( 'home_counter_1_title' ),
                        'counter_1_number' => trawell_get_option( 'home_counter_1_number' ),
                    ),
                    2       => array(
                        'counter_2_title'  => __trawell( 'home_counter_2_title' ),
                        'counter_2_number' => trawell_get_option( 'home_counter_2_number' ),
                    ),
                    3       => array(
                        'counter_3_title'  => __trawell( 'home_counter_3_title' ),
                        'counter_3_number' => trawell_get_option( 'home_counter_3_number' ),
                    ),
                    4       => array(
                        'counter_4_title'  => __trawell( 'home_counter_4_title' ),
                        'counter_4_number' => trawell_get_option( 'home_counter_4_number' ),
                    ),
                    5       => array(
                        'counter_5_title'  => __trawell( 'home_counter_5_title' ),
                        'counter_5_number' => trawell_get_option( 'home_counter_5_number' ),
                    ),
                );
                break;
            case 'custom-content':
                $frontpage_sections['custom-content'] = array(
                    'title' => __trawell( 'home_custom_content_title' ),
                    'content'  => __trawell( 'home_custom_content' ),
                );
                break;
            }

        }

        $frontpage_sections = apply_filters( 'trawell_modify_frontpage_sections_settings', $frontpage_sections );

        return $frontpage_sections;
    }
endif;

/**
 * Get front page cover settings depending on type of cover
 *
 * @return string
 * @since  1.0
 */
if ( !function_exists( 'trawell_get_frontpage_cover_settings' ) ):
    function trawell_get_frontpage_cover_settings( $cover_type ) {
        $cover_settings =  array();

        global $slider_unique_posts;
        
        switch ( $cover_type ) {

        case 'static':
            $cover_settings =  array(
                'type' => trawell_get_option( 'home_cover_static' ),
                'title' => __trawell( 'home_cover_title' ),
                'text' => __trawell( 'home_cover_text' ),
                'button_1_text' => __trawell( 'home_cover_button_1_text' ),
                'button_1_url' => trawell_get_option( 'home_cover_button_1_url' ),
                'button_2_text' => __trawell( 'home_cover_button_2_text' ),
                'button_2_url' => trawell_get_option( 'home_cover_button_2_url' ),
                'overlayer' => '',
                'show_custom_content' => trawell_get_option( 'home_cover_static_custom_content_show' ),
                'custom_content' => trawell_get_option( 'home_cover_static_custom_content' ),
            );

            if ( $cover_settings['type'] == "image" ) {
	
	            $cover_settings['image'] = '';
	            
	            $img_url = trawell_get_option( 'home_cover_image', 'image' );
	
	            if ( !empty( $img_url ) ) {
		            $img_id = trawell_get_image_id_by_url( $img_url );
		            $img_html = wp_get_attachment_image( $img_id, 'trawell-cover' );
		            if ( empty( $img_html ) ) {
			            $img_html = '<img src="'.esc_url( $img_url ).'"/>';
		            }
		            $cover_settings['image'] = $img_html;
	            }
            }

            if ( $cover_settings['type'] == "video" ) {
                $cover_settings['video'] = trawell_get_option( 'home_cover_video' );
            }

            if ( empty( $cover_settings['title'] ) && empty( $cover_settings['text'] ) &&
                ( empty( $cover_settings['button_1_text'] ) || empty( $cover_settings['button_1_url'] ) ) &&
                ( empty( $cover_settings['button_2_text'] ) || empty( $cover_settings['button_2_url'] ) ) ) {
                $cover_settings['overlayer'] = 'no-overlay';
            }
            break;

        case 'slider-posts':
            $cover_settings['query'] = new WP_Query( trawell_get_frontpage_posts_query_args( 'home_cover_posts' ) );
            $cover_settings['category'] = trawell_get_option( 'single_category' );
            $cover_settings['meta'] = trawell_get_option( 'single_meta', 'multi' );
            $cover_settings['icon'] = trawell_get_option( 'single_icon' );
            $cover_settings['headline'] = trawell_get_option( 'single_headline' );
	
	        if ( trawell_get_option( 'home_cover_slider_unique_posts' ) && !is_wp_error( $cover_settings['query'] ) && !empty( $cover_settings['query'] ) ) {
		        foreach ( $cover_settings['query']->posts as $p ) {
			        $slider_unique_posts[] = $p->ID;
		        }
	        }
            break;

        case 'slider-categories':
            $cover_settings['query'] = trawell_get_frontpage_cover_categories( false );
            $cover_settings['meta'] = trawell_get_option( 'layout_cat_map_meta' );
            break;

        case 'map':
            if ( !trawell_is_maps_active() ) {
                break;
            }
            $map_type = trawell_get_option( 'home_cover_query_type' );

            if ( $map_type == "categories" ) {
                $categories_query = trawell_get_frontpage_cover_categories( true );
                $cover_settings = array( 'items' => trawell_parse_maps_categories( $categories_query ), 'settings' => trawell_get_map_category_settings() );
            }else {
                $map_posts_query_args = mks_map_get_query( trawell_get_frontpage_posts_query_args( 'home_cover_posts', true ) );
                $map_posts_query = new WP_Query( $map_posts_query_args );
                $cover_settings = array( 'items' => trawell_parse_map_posts( $map_posts_query ), 'settings' => trawell_get_map_posts_settings() );
            }
            break;
        }

        $cover_settings = apply_filters( 'trawell_modify_home_cover_options', $cover_settings );

        return $cover_settings;
    }
endif;

/**
 * Gets categories for cover map
 *
 * @return array of categories formatted for maps JS
 * @since  1.0
 */
if ( !function_exists( 'trawell_get_frontpage_cover_categories' ) ):
    function trawell_get_frontpage_cover_categories( $is_map = false ) {
        $category_args = array(
            'number'     => 0,
        );

        $category_ids = trawell_get_option( 'home_cover_categories' );

        if ( !empty( $category_ids ) ) {
            $category_args['hide_empty'] = false;
            $category_args['include'] = $category_ids;
        }else {
            $category_args['hide_empty'] = true;
        }

        if ( $is_map ) {
            $category_args = mks_map_get_query( $category_args );
        }

        $categories = get_categories( $category_args );

        $categories = apply_filters( 'trawell_modify_frontpage_cover_map_categories', $categories );

        if ( empty( $categories ) ) {
            return array();
        }

        return $categories;
    }
endif;

/**
 * Get page template options
 * Return page template params based on theme options
 *
 * @since  1.0
 * @return array
 */

if ( !function_exists( 'trawell_get_404_template_options' ) ):
    function trawell_get_404_template_options() {
        $args = array();

        $args['fimg'] = trawell_get_option( '404_fimg' );

        $args['title'] = __trawell( '404_title' );

        $args['text'] = __trawell( '404_text' );

        $args['sidebar'] = array(
            'position' => 'none',
            'classic' => '',
            'sticky' => ''
        );

        return apply_filters( 'trawell_modify_page_template_options', $args );
    }
endif;

/**
 * Get post layout options
 * Return post layout params based on theme options
 *
 * @return string
 * @since  1.0
 */
if ( !function_exists( 'trawell_get_post_layout_options' ) ):
    function trawell_get_post_layout_options( $layout ) {
        $args = array();

        $args['category'] = trawell_get_option( 'layout_' . $layout . '_cat' );
        $args['meta'] = trawell_get_option( 'layout_' . $layout . '_meta', 'multi' );
        $args['icon'] = trawell_get_option( 'layout_' . $layout . '_icon' );
	
	    $args['content_type'] = 'excerpt';

        if($layout == 'a1'){
	        $args['content_type'] = trawell_get_option( 'layout_' . $layout . '_content');
        }
        
        if($args['excerpt'] = trawell_get_option( 'layout_' . $layout . '_excerpt' ) || $args['content_type'] == 'excerpt' ){
            $args['excerpt_limit'] = trawell_get_option( 'layout_' . $layout . '_excerpt_limit' );
        }
	
	    
        $args = apply_filters( 'trawell_modify_' . $layout . '_post_layout_options', $args );

        return $args;
    }
endif;

/**
 * Get category layout options
 * Return category layout params based on theme options
 *
 * @return string
 * @since  1.0
 */
if ( !function_exists( 'trawell_get_category_layout_options' ) ):
    function trawell_get_category_layout_options( $layout ) {
        $args = array();

        $args['meta'] = (boolean) trawell_get_option( 'layout_cat_' . $layout . '_meta' );

        $args = apply_filters( 'trawell_modify_' . $layout . '_category_layout_options', $args );

        return $args;
    }
endif;


/**
 * Get woocommerce template options
 * Return woocommerce template params based on theme options
 *
 * @since  1.0
 * @return array
 */

if ( !function_exists( 'trawell_get_woocommerce_template_options' ) ):
    function trawell_get_woocommerce_template_options() {
        $args = array();

        $args['sidebar'] = array( 'position' => trawell_get_option( 'woocommerce_sidebar_position' ), 'classic' => trawell_get_option( 'woocommerce_sidebar_standard' ), 'sticky' => trawell_get_option( 'woocommerce_sidebar_sticky' ) );

        return apply_filters( 'trawell_modify_woocommerce_template_options', $args );
    }
endif;


/**
 * Get author social links
 *
 * @param int     $author_id ID of an author/user
 * @return string HTML output of social links
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_author_links' ) ):
    function trawell_get_author_links( $author_id ) {

        $output = '';

        if ( is_singular() ) {
            $output .= '<a href="' . esc_url( get_author_posts_url( $author_id, get_the_author_meta( 'user_nicename', $author_id ) ) ) . '" class="trawell-button trawell-button-medium trawell-button-hollow">' . __trawell( 'view_all' ) . '</a>';
        }


        if ( $url = get_the_author_meta( 'url', $author_id ) ) {
            $output .= '<a href="' . esc_url( $url ) . '" target="_blank" class="trawell-button trawell-button-medium trawell-button-hollow trawell-button-square-medium"><i class="o-url-1"></i></a>';
        }

        $social = trawell_get_social();

        if ( !empty( $social ) ) {
            foreach ( $social as $id => $name ) {
                if ( $social_url = get_the_author_meta( $id, $author_id ) ) {

                    if ( $id == 'twitter' ) {
                        $social_url = ( strpos( $social_url, 'http' ) === false ) ? 'https://twitter.com/' . $social_url : $social_url;
                    }

                    $output .= '<a href="' . esc_url( $social_url ) . '" target="_blank" class="trawell-button trawell-button-medium trawell-button-hollow trawell-button-square-medium"><i class="fa fa-' . $id . '"></i></a>';
                }
            }
        }

        return wp_kses_post( $output );
    }
endif;

/**
 * Check if is cover area enabled enabled
 *
 * @param string  $cover specific id/key of a layout
 * @return bool
 * @since  1.0
 */

if ( !function_exists( 'trawell_has_cover' ) ):
    function trawell_has_cover( $cover = false ) {

        if ( empty( $cover ) ) {
            $cover = trawell_get( 'cover' );
        }

        if ( empty( $cover ) || $cover == 'none' ) {
            return false;
        }

        return true;
    }
endif;


/**
 * Check if cover area is indented
 *
 * @return bool
 * @since  1.0
 */

if ( !function_exists( 'trawell_is_indented_cover' ) ):
    function trawell_is_indented_cover() {
        return trawell_get_option( 'header_indent' ) && trawell_has_cover() && !in_array( trawell_get( 'cover' ), array( 'map', 'video', 'gallery' ) );
    }
endif;


/**
 * Check if is sidebar enabled
 *
 * @param string  $position_to_check sidebar position to check
 * @return bool
 * @since  1.0
 */

if ( !function_exists( 'trawell_has_sidebar' ) ):
    function trawell_has_sidebar( $position_to_check = 'right' ) {

        $sidebar = trawell_get( 'sidebar' );

        if ( empty( $sidebar ) ) {
            return false;
        }

        if ( $sidebar['position'] != $position_to_check ) {
            return false;
        }

        return true;
    }
endif;


/**
 * Check if is sidebar enabled
 *
 * @param string  $position_to_check sidebar position to check
 * @return bool
 * @since  1.0
 */

if ( !function_exists( 'trawell_has_sidebar_mini' ) ):
    function trawell_has_sidebar_mini( $position_to_check = 'right' ) {

        $sidebar = trawell_get( 'sidebar_mini' );

        if ( empty( $sidebar ) ) {
            return false;
        }

        if ( $sidebar['position'] !== $position_to_check ) {
            return false;
        }

        return true;
    }
endif;


/**
 * Checks if a single post should display media (image, video, gallery) inside content
 * (if it is not already displayed inside cover area)
 *
 * @return bool
 * @since  1.0
 */

if ( !function_exists( 'trawell_has_entry_media' ) ):
    function trawell_has_entry_media() {

        $format = trawell_get( 'format' );

        if ( trawell_has_cover() && in_array( $format, array( 'video', 'gallery', 'standard' ) ) ) {
            return false;
        }

        return true;
    }
endif;


/**
 * Checks if a single post should display the title inside content
 * (if it is not already displayed inside cover area)
 *
 * @return bool
 * @since  1.0
 */

if ( !function_exists( 'trawell_has_entry_header' ) ):
    function trawell_has_entry_header() {

        $cover = trawell_get( 'cover' );
        $format = trawell_get( 'format' );

        if ( trawell_has_cover() && $cover != 'map' && in_array( $format, array( 'standard', 'audio' ) ) ) {
            return false;
        }

        return true;
    }
endif;


/**
 * Check if we have content or cover to render wrapper div
 *
 * @return bool
 * @since  1.0
 */

if ( !function_exists( 'trawell_has_entry_content' ) ):
    function trawell_has_entry_content() {
        $content = get_the_content();
        return !empty( $content ) || !trawell_has_cover();
    }
endif;


/**
 * Get sidebar class if sidebar is enabled
 *
 * @param array   $sidebar - Array with sidebar information
 * @return string
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_sidebar_class' ) ):
    function trawell_get_sidebar_class() {

        $sidebar = trawell_get( 'sidebar' );

        if ( empty( $sidebar ) ) {
            return '';
        }

        $class = $sidebar['position'] != 'none' ? 'trawell-has-sidebar trawell-sidebar-' . $sidebar['position'] : 'trawell-sidebar-'.$sidebar['position'];

        return $class;

    }
endif;



/**
 * Breadcrumbs
 *
 * Function provides support for several breadcrumb plugins
 * and gets its content to display on frontend
 *
 * @return string HTML output
 * @since  1.0
 */

if ( !function_exists( 'trawell_breadcrumbs' ) ):
    function trawell_breadcrumbs( ) {

        $has_breadcrumbs = trawell_get_option( 'breadcrumbs' );
        if ( $has_breadcrumbs == 'none' ) {
            return '';
        }

        $breadcrumbs = '';

        if ( $has_breadcrumbs == 'yoast' && function_exists( 'yoast_breadcrumb' ) ) {
            $breadcrumbs = yoast_breadcrumb( '<div id="trawell-breadcrumbs" class="trawell-breadcrumbs">', '</div>', false );
        }

        if ( $has_breadcrumbs == 'bcn' && function_exists( 'bcn_display' ) ) {
            $breadcrumbs = '<div id="trawell-breadcrumbs" class="trawell-breadcrumbs">'.bcn_display( true ).'</div>';
        }

        return $breadcrumbs;
    }
endif;



?>
