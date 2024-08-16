<?php

/**
 * Register sidebars
 *
 * Callback function for theme sidebars registration and init
 * 
 * @since  1.0
 */

add_action( 'widgets_init', 'trawell_register_sidebars' );

if ( !function_exists( 'trawell_register_sidebars' ) ) :
	function trawell_register_sidebars() {
				
		/* Default Sidebar */
		register_sidebar(
			array(
				'id' => 'trawell_default_sidebar',
				'name' => esc_html__( 'Default Sidebar', 'trawell' ),
				'description' => esc_html__( 'This is default sidebar', 'trawell' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget-title h6">',
				'after_title' => '</h4>'
			)
		);

        /* Default Sidebar */
        register_sidebar(
            array(
                'id' => 'trawell_default_sticky_sidebar',
                'name' => esc_html__( 'Default Sticky Sidebar', 'trawell' ),
                'description' => esc_html__( 'This is default sticky sidebar', 'trawell' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title h6">',
                'after_title' => '</h4>'
            )
        );

        /* Footer Sidebar Area 1*/
        register_sidebar(
            array(
                'id' => 'trawell_footer_sidebar_1',
                'name' => esc_html__( 'Footer Column 1', 'trawell' ),
                'description' => esc_html__( 'This is footer area column 1.', 'trawell' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget-title h6">',
                'after_title' => '</h5>'
            )
        );

        /* Footer Sidebar Area 2*/
        register_sidebar(
            array(
                'id' => 'trawell_footer_sidebar_2',
                'name' => esc_html__( 'Footer Column 2', 'trawell' ),
                'description' => esc_html__( 'This footer area column 2.', 'trawell' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget-title h6">',
                'after_title' => '</h5>'
            )
        );


        /* Footer Sidebar Area 3*/
        register_sidebar(
            array(
                'id' => 'trawell_footer_sidebar_3',
                'name' => esc_html__( 'Footer Column 3', 'trawell' ),
                'description' => esc_html__( 'This footer area column 3.', 'trawell' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget-title h6">',
                'after_title' => '</h5>'
            )
        );

        /* Footer Sidebar Area 4 */
        register_sidebar(
            array(
                'id' => 'trawell_footer_sidebar_4',
                'name' => esc_html__( 'Footer Column 4', 'trawell' ),
                'description' => esc_html__( 'This is footer area column 4.', 'trawell' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget-title h6">',
                'after_title' => '</h5>'
            )
        );
        
		/* Add sidebars from theme options */
		$custom_sidebars = trawell_get_option( 'sidebars' );
		
		if (!empty( $custom_sidebars ) ){
			foreach ( $custom_sidebars as $key => $title) {
				
				if ( is_numeric($key) ) {
					register_sidebar(
						array(
							'id' => 'trawell_sidebar_'.$key,
							'name' => $title,
							'description' => '',
							'before_widget' => '<div id="%1$s" class="widget %2$s">',
							'after_widget' => '</div>',
							'before_title' => '<h4 class="widget-title h6">',
							'after_title' => '</h4>'
						)
					);
				}
			}
		}
	}

endif;




?>