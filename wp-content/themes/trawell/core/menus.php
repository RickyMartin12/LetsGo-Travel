<?php

/**
 * Register menus
 *
 * Callback function theme menus registration and init
 *
 * @since  1.0
 */

add_action( 'init', 'trawell_register_menus' );

if ( !function_exists( 'trawell_register_menus' ) ) :
	function trawell_register_menus() {
		register_nav_menu( 'trawell_menu_primary_1', esc_html__( 'Primary Menu 1' , 'trawell' ) );
		register_nav_menu( 'trawell_menu_primary_2', esc_html__( 'Primary Menu 2' , 'trawell' ) );
		register_nav_menu( 'trawell_menu_secondary_1', esc_html__( 'Secondary Menu 1' , 'trawell' ) );
		register_nav_menu( 'trawell_menu_secondary_2', esc_html__( 'Secondary Menu 2' , 'trawell' ) );
		register_nav_menu( 'trawell_menu_social', esc_html__( 'Social Menu' , 'trawell' ) );
		register_nav_menu( 'trawell_menu_prefooter', esc_html__( 'Prefooter Menu' , 'trawell' ) );
	}
endif;



/**
 * wp_setup_nav_menu_item callback
 *
 * Get our meta data from nav menu
 *
 * @since  1.0
 */

add_filter( 'wp_setup_nav_menu_item', 'trawell_get_menu_meta' );

if ( !function_exists( 'trawell_get_menu_meta' ) ):
	function trawell_get_menu_meta( $menu_item ) {

		$defaults = array(
			'category_posts' => 0,
			'mega' => 0
		);

		$meta = get_post_meta( $menu_item->ID, '_trawell_meta', true );
		$meta = wp_parse_args( $meta, $defaults );
		$menu_item->trawell_meta = $meta;

		return $menu_item;
	}
endif;


/**
 * wp_update_nav_menu_item callback
 *
 * Store values from custom fields in nav menu
 *
 * @since  1.0
 */

add_action( 'wp_update_nav_menu_item', 'trawell_update_menu_meta', 10, 3 );


if ( !function_exists( 'trawell_update_menu_meta' ) ):
	function trawell_update_menu_meta( $menu_id, $menu_item_db_id, $args ) {

		$meta = array();

		if ( isset( $_REQUEST['menu-item-trawell-category-posts'][$menu_item_db_id] ) ) {
			$meta['category_posts'] = 1;
		}

		if ( isset( $_REQUEST['menu-item-trawell-mega'][$menu_item_db_id] ) ) {
			$meta['mega'] = 1;
		}

		if ( !empty( $meta ) ) {
			update_post_meta( $menu_item_db_id, '_trawell_meta', $meta );
		} else {
			delete_post_meta( $menu_item_db_id, '_trawell_meta' );
		}


	}
endif;




/**
 * wp_edit_nav_menu_walker callback
 *
 * Add custom fields to nav menu form
 *
 * @since  1.0
 */

add_filter( 'wp_edit_nav_menu_walker', 'trawell_edit_menu_walker', 10, 2 );

if ( !function_exists( 'trawell_edit_menu_walker' ) ):
	function trawell_edit_menu_walker( $walker, $menu_id ) {

		class trawell_Walker_Nav_Menu_Edit extends Walker_Nav_Menu_Edit {

			public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

				parent::start_el( $default_output, $item, $depth, $args, $id );

				$inject_html = '';

				if ( $item->object == 'category' ) {
					$inject_html .= '<p class="description">
		                <label for="menu-item-trawell-category-posts['.$item->db_id.']">
		        		<input type="checkbox" id="menu-item-trawell-category-posts['.$item->db_id.']" class="widefat" name="menu-item-trawell-category-posts['.$item->db_id.']" value="1" '.checked( $item->trawell_meta['category_posts'], 1, false ). ' />
		                '.esc_html__( 'Automatically display category posts in submenu', 'trawell' ).'</label>
		            </p>';
				}

				if( !$item->menu_item_parent ){

					$inject_html .= '<p class="description">
			                <label for="menu-item-trawell-mega['.$item->db_id.']">
			        		<input type="checkbox" id="menu-item-trawell-mega['.$item->db_id.']" class="widefat" name="menu-item-trawell-mega['.$item->db_id.']" value="1" '.checked( $item->trawell_meta['mega'], 1, false ). ' />
			                '.esc_html__( 'Display submenu items as "mega menu"', 'trawell' ).'</label>
			            </p>';
		        }

				ob_start();
				do_action( 'wp_nav_menu_item_custom_fields', $item->ID, $item, $depth, $args );
				$inject_html .= ob_get_clean();

				$new_output = preg_replace( '/(?=<div.*submitbox)/', $inject_html, $default_output );

				$output .= $new_output;


			}

		}

		return 'trawell_Walker_Nav_Menu_Edit';
	}
endif;



/**
 * nav_menu_css_class callback
 *
 * Used to add/modify CSS classes in nav menu
 *
 * @since  1.0
 */

add_filter( 'nav_menu_css_class', 'trawell_modify_nav_menu_classes', 10, 2 );

if ( !function_exists( 'trawell_modify_nav_menu_classes' ) ):
	function trawell_modify_nav_menu_classes( $classes, $item ) {

		if ( $item->object == 'category' && isset( $item->trawell_meta['category_posts'] ) && $item->trawell_meta['category_posts'] ) {
			$classes[] = 'menu-item-has-children trawell-category-menu';
		}

		if(isset( $item->trawell_meta['mega'] ) && $item->trawell_meta['mega'] ){
			$classes[] = 'trawell-mega-menu';
		}

		return $classes;

	}
endif;


/**
 * Display category posts in nav menu
 *
 * @since  1.0
 */

if ( !function_exists( 'trawell_get_nav_menu_category_posts' ) ) :

	function trawell_get_nav_menu_category_posts( $cat_id ) {


		$args = array(
			'post_type'    => 'post',
			'cat'      => $cat_id,
			'posts_per_page' => 4
		);


		$output = '<li class="trawell-menu-posts">';

		ob_start();

		$args['ignore_sticky_posts'] = 1;

		$menu_posts = new WP_Query( $args );

		if ( $menu_posts->have_posts() ) :

			while ( $menu_posts->have_posts() ) : $menu_posts->the_post(); ?>

				<article <?php post_class(); ?>>

		            <?php if ( $fimg = trawell_get_featured_image( 'thumbnail' ) ) : ?>
		                <div class="entry-image">
		                <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
		                   	<?php echo wp_kses_post($fimg); ?>
		                </a>
		                </div>
		            <?php endif; ?>

		            <div class="entry-header">
		                <?php the_title( sprintf( '<a href="%s">', esc_url( get_permalink() ) ), '</a>' ); ?>
		            </div>

				</article>

			<?php endwhile;

		endif;

		wp_reset_postdata();

		$output .= ob_get_clean();

		$output .= '</li>';

		return $output;

	}

endif;


/**
 * walker_nav_menu_start_el callback
 *
 * Used to display specific data in nav menu on website front-end
 *
 * @since  1.0
 */

add_filter( 'walker_nav_menu_start_el', 'trawell_walker_nav_menu_start_el', 10, 4 );

function trawell_walker_nav_menu_start_el( $item_output, $item, $depth, $args ) {

	if ( isset( $item->trawell_meta['category_posts'] ) && $item->trawell_meta['category_posts'] ) {

		$item_output .= '<ul class="sub-menu">';
		$item_output .= trawell_get_nav_menu_category_posts( $item->object_id );
		$item_output .= '</ul>';

	}

	return $item_output;
}
?>
