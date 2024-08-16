<?php

if ( get_option( 'show_on_front' ) != 'page' ) {

	$info = array(
		'id' => 'home_setup_info',
		'type' => 'info',
		'style' => 'critical',
		'title' => esc_html__( 'Important note:', 'trawell' ),
		'subtitle' => wp_kses_post( sprintf( __( 'Your front page is currently set to display <strong>"latest posts"</strong>. In order to use these options, you need to set your front page option as <strong>"static page"</strong> inside <a href="%s" target="_blank">Settings->Reading</a>.', 'trawell' ), admin_url( 'options-reading.php' ) ) ),
	);

} else {

	$info = array();
}

/* Header */
Redux::setSection( $opt_name, array(
		'icon'   => 'el-icon-bookmark',
		'title'  => esc_html__( 'Header', 'trawell' ),
		'fields' => array(),
	) );

Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Main Header', 'trawell' ),
		'desc'       => esc_html__( 'Modify and style your main header area', 'trawell' ),
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'header_layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Header layout', 'trawell' ),
				'subtitle' => esc_html__( 'Choose a layout for your header', 'trawell' ),
				'options'  => trawell_get_header_layouts(),
				'default'  => trawell_get_default_option( 'header_layout' ),

			),

			array(
				'id'       => 'header_orientation',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Header orientation', 'trawell' ),
				'subtitle' => esc_html__( 'Choose whether you want header elements to follow site content or browser width', 'trawell' ),
				'options'  => array(
					'container' => array( 'title' => esc_html__( 'Site content', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/header_content.png' )  ),
					'container-full'    => array( 'title' => esc_html__( 'Browser (screen)', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/header_wide.png' ) ),
				),
				'default'  => trawell_get_default_option( 'header_orientation' ),

			),

			array(
				'id'       => 'header_site_desc',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable site desciprition', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display site description below logo', 'trawell' ),
				'default'  => trawell_get_default_option( 'header_site_desc' ),

			),

			array(
				'id'       => 'header_actions',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Enable special elements in header', 'trawell' ),
				'subtitle' => esc_html__( 'Select (and reorder) special elements that you want to display', 'trawell' ),
				'options'  => trawell_get_header_main_area_actions(),
				'default'  => trawell_get_default_option( 'header_actions' ),
			),

			array(
				'id'       => 'header_height',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Header height', 'trawell'),
				'subtitle' => esc_html__( 'Specify the height for your main header area', 'trawell' ),
				'desc'     => esc_html__( 'Note: Height value is in px.', 'trawell' ),
				'default'  => trawell_get_default_option( 'header_height' ),
				'validate' => 'numeric',
			),

			array(
				'id'          => 'color_header_main_bg',
				'type'        => 'color',
				'title'       => esc_html__( 'Background color', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_header_main_bg' ),
			),


			array(
				'id'          => 'color_header_main_txt',
				'type'        => 'color',
				'title'       => esc_html__( 'Text color', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_header_main_txt' ),
			),

			array(
				'id'          => 'color_header_main_acc',
				'type'        => 'color',
				'title'       => esc_html__( 'Accent color', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_header_main_acc' ),
			),

			

			array(
				'id'       => 'header_indent',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Indent cover into header', 'trawell' ),
				'subtitle' => esc_html__( 'If current page has a cover area, it will be indented into header', 'trawell' ),
				'options'  => array(
					true => array( 'title' => esc_html__( 'On', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/cover_indent_on.png' )  ),
					false   => array( 'title' => esc_html__( 'Off', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/cover_indent_off.png' ) ),
				),
				'default'  => trawell_get_default_option( 'header_indent' ),
			),

			array(
				'id'       => 'header_indent_logo_alt',
				'type'     => 'switch',
				'title'    => esc_html__( 'Use alternate logo for indented cover', 'trawell' ),
				'subtitle' => esc_html__( 'If you check this option, theme will use alternate logo when cover is indented', 'trawell' ),
				'default'  => trawell_get_default_option( 'header_indent_logo_alt' ),
				'required'    => array( 'header_indent', '=', true ),
			),

			array(
				'id'       => 'cover_height',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Cover area height', 'trawell' ),
				'subtitle' => esc_html__( 'Specify the height for your cover area', 'trawell' ),
				'desc'     => esc_html__( 'Note: Height value is in px.', 'trawell' ),
				'validate' => 'numeric',
				'default'  => trawell_get_default_option( 'cover_height' ),
			),

			array(
				'id'       => 'logo',
				'type'     => 'media',
				'url'      => true,
				'title'  => esc_html__( 'Logo', 'trawell' ),
				'subtitle'   => esc_html__( 'This is your default logo image. If it is not uploaded, theme will display the website title instead.', 'trawell' ),
				'default'  => trawell_get_default_option( 'logo' ),
			),

			array(
				'id'       => 'logo_retina',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Retina logo (2x)', 'trawell' ),
				'subtitle' => esc_html__( 'Optionally upload another logo for devices with retina displays. It should be double the size of your standard logo', 'trawell' ),
				'default'  => trawell_get_default_option( 'logo_retina' ),
			),

			array(
				'id'       => 'logo_mini',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Mobile logo', 'trawell' ),
				'subtitle' => esc_html__( 'Optionally upload another logo which may be used as mobile/tablet logo', 'trawell' ),
				'default'  => trawell_get_default_option( 'logo_mini' ),
			),

			array(
				'id'       => 'logo_mini_retina',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Mobile retina logo (2x)', 'trawell' ),
				'subtitle' => esc_html__( 'Upload double sized mobile logo for devices with retina displays', 'trawell' ),
				'default'  => trawell_get_default_option( 'logo_mini_retina' ),
			),


			array(
				'id'       => 'logo_alt',
				'type'     => 'media',
				'url'      => true,
				'title'  => esc_html__( 'Alternate logo', 'trawell' ),
				'subtitle'   => esc_html__( 'Optionally upload the alternate logo image, i.e. to use it on header when cover is indented', 'trawell' ),
				'default'  => trawell_get_default_option( 'logo_alt' )
			),

			array(
				'id'       => 'logo_retina_alt',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Alternate retina logo (2x)', 'trawell' ),
				'subtitle' => esc_html__( 'Optionally upload another logo for devices with retina displays. It should be double the size of your standard logo', 'trawell' ),
				'default'  => trawell_get_default_option( 'logo_retina_alt' )
			),

			array(
				'id'       => 'logo_mini_alt',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Alternate mobile logo', 'trawell' ),
				'subtitle' => esc_html__( 'Optionally upload another logo which may be used as mobile/tablet logo', 'trawell' ),
				'default'  => trawell_get_default_option( 'logo_mini_alt' )
			),

			array(
				'id'       => 'logo_mini_retina_alt',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Alternate mobile retina logo (2x)', 'trawell' ),
				'subtitle' => esc_html__( 'Upload double sized mobile logo for devices with retina displays', 'trawell' ),
				'default'  => trawell_get_default_option( 'logo_mini_retina_alt' )
			),

			array(
				'id'       => 'logo_custom_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Custom logo URL', 'trawell' ),
				'subtitle' => esc_html__( 'Optionally specify custom URL if you want your logo to point out to some other page/website instead of your home page', 'trawell' ),
				'default'  => trawell_get_default_option( 'logo_custom_url' ),
			),

		),
	) );

/* Top Bar */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Top Bar', 'trawell' ),
		'desc'       => esc_html__( 'Modify and style your header top bar', 'trawell' ),
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'header_top',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display top bar', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to enable header top bar', 'trawell' ),
				'default'  => trawell_get_default_option( 'header_top' ),
			),

			array(
				'id'       => 'header_top_height',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Height', 'trawell' ),
				'subtitle' => esc_html__( 'Specify the height for your header top bar', 'trawell' ),
				'desc'     => esc_html__( 'Note: Height value is in px.', 'trawell' ),
				'default'  => trawell_get_default_option( 'header_top_height' ),
				'validate' => 'numeric',
				'required'    => array( 'header_top', '=', true ),
			),

			array(
				'id'          => 'color_header_top_bg',
				'type'        => 'color',
				'title'       => esc_html__( 'Background color', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_header_top_bg' ),
				'required'    => array( 'header_top', '=', true ),
			),

			array(
				'id'          => 'color_header_top_txt',
				'type'        => 'color',
				'title'       => esc_html__( 'Text color', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_header_top_txt' ),
				'required'    => array( 'header_top', '=', true ),
			),

			array(
				'id'          => 'color_header_top_acc',
				'type'        => 'color',
				'title'       => esc_html__( 'Accent color', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_header_top_acc' ),
				'required'    => array( 'header_top', '=', true ),
			),

			array(
				'id'       => 'header_top_l',
				'type'     => 'select',
				'title'    => esc_html__( 'Left slot', 'trawell' ),
				'subtitle' => esc_html__( 'Choose an element to display in left slot of the header top bar', 'trawell' ),
				'options'  => trawell_get_header_top_actions(),
				'default'  => trawell_get_default_option( 'header_top_l' ),
				'required' => array( 'header_top', '=', true ),
			),

			array(
				'id'       => 'header_top_c',
				'type'     => 'select',
				'title'    => esc_html__( 'Center slot', 'trawell' ),
				'subtitle' => esc_html__( 'Choose an element to display in center slot of the header top bar', 'trawell' ),
				'options'  => trawell_get_header_top_actions(),
				'default'  => trawell_get_default_option( 'header_top_c' ),
				'required' => array( 'header_top', '=', true ),
			),

			array(
				'id'       => 'header_top_r',
				'type'     => 'select',
				'title'    => esc_html__( 'Right slot', 'trawell' ),
				'subtitle' => esc_html__( 'Choose an element to display in right slot of the header top bar', 'trawell' ),
				'options'  => trawell_get_header_top_actions(),
				'default'  => trawell_get_default_option( 'header_top_r' ),
				'required' => array( 'header_top', '=', true ),
			),


		) )
);

/* Sticky header area */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Sticky Header', 'trawell' ),
		'desc'       => esc_html__( 'Modify and style your sticky header area', 'trawell' ),
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'header_sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display sticky header', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to enable sticky header', 'trawell' ),
				'default'  => trawell_get_default_option( 'header_sticky' ),
			),

			array(
				'id'       => 'header_sticky_offset',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Sticky header offset', 'trawell' ),
				'subtitle' => esc_html__( 'Specify after how many px of scrolling the sticky header appears', 'trawell' ),
				'default'  => trawell_get_default_option( 'header_sticky_offset' ),
				'validate' => 'numeric',
				'required' => array( 'header_sticky', '=', true ),
			),

			array(
				'id'       => 'header_sticky_up',
				'type'     => 'switch',
				'title'    => esc_html__( 'Smart sticky', 'trawell' ),
				'subtitle' => esc_html__( 'Sticky header appears only if you scroll up', 'trawell' ),
				'default'  => trawell_get_default_option( 'header_sticky_up' ),
				'required' => array( 'header_sticky', '=', true ),
			),

			array(
				'id'      => 'header_sticky_logo',
				'type'    => 'radio',
				'title'   => esc_html__( 'Sticky header logo', 'trawell' ),
				'subtitle' => esc_html__( 'Select which logo to display inside the sticky header', 'trawell'),
				'options' => array(
					'regular' => esc_html__( 'Regular logo', 'trawell' ),
					'mini'      => esc_html__( 'Mini (mobile) logo', 'trawell' )
				),
				'default' => trawell_get_default_option( 'header_sticky_logo' ),
			),
			
		) ) );


/* Responsive header */
Redux::setSection( $opt_name , array(
	'icon'      => '',
	'title'     => esc_html__( 'Responsive', 'trawell' ),
	'desc'     => esc_html__( 'Manage settings for responsive/mobile menu', 'trawell' ),
	'subsection' => true,
	'fields'    => array(
		
		array(
			'id'        => 'header_responsive_secondary_nav',
			'type'      => 'switch',
			'title'     => esc_html__( 'Append secondary navigation', 'trawell' ),
			'subtitle'  => esc_html__( 'If secondary menus are used, it will be applied to the bottom of the main navigation', 'trawell' ),
			'default' => trawell_get_default_option( 'header_responsive_secondary_nav' )
		),
		
		array(
			'id'        => 'header_responsive_actions',
			'type'     => 'sortable',
			'mode'     => 'checkbox',
			'title'    => esc_html__( 'Enable special elements under the responsive menu', 'trawell' ),
			'subtitle' => esc_html__( 'Select (and reorder) special elements that you want to display', 'trawell' ),
			'options'  => trawell_get_header_responsive_actions(),
			'default'   => trawell_get_default_option( 'header_responsive_actions' ),
		),
		
	) ) );

/* Content  */
Redux::setSection( $opt_name, array(
		'icon'   => 'el-icon-screen',
		'title'  => esc_html__( 'Content', 'trawell' ),
		'desc'   => esc_html__( 'Manage your main content styling options', 'trawell' ),
		'fields' => array(

			array(
				'id'          => 'color_bg',
				'type'        => 'color',
				'title'       => esc_html__( 'Background color', 'trawell' ),
				'subtitle'    => esc_html__( 'This color applies to body/content background', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_bg' ),
			),

			array(
				'id'          => 'color_content_h',
				'type'        => 'color',
				'title'       => esc_html__( 'Heading color', 'trawell' ),
				'subtitle'    => esc_html__( 'This color applies to titles and headings ', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_content_h' ),
			),

			array(
				'id'          => 'color_content_txt',
				'type'        => 'color',
				'title'       => esc_html__( 'Text color', 'trawell' ),
				'subtitle'    => esc_html__( 'This color applies to standard text', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_content_txt' ),
			),

			array(
				'id'          => 'color_content_acc',
				'type'        => 'color',
				'title'       => esc_html__( 'Accent color', 'trawell' ),
				'subtitle'    => esc_html__( 'This color applies to links, buttons and other special elements', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_content_acc' ),
			),
			
			array(
				'id'          => 'color_content_meta',
				'type'        => 'color',
				'title'       => esc_html__( 'Meta color', 'trawell' ),
				'subtitle'    => esc_html__( 'This color applies to miscellaneous elements like post meta data (author link, date, etc...)', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_content_meta' ),
			),
			
			array(
				'id'       => 'image_style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Image style', 'trawell' ),
				'subtitle' => esc_html__( 'Choose a style for your images', 'trawell' ),
				'options'  => array(
					'default'              => array(
						'title' => esc_html__( 'Square', 'trawell' ),
						'img'   => get_parent_theme_file_uri( '/assets/img/admin/image_square.png' ),
					),
					'trawell-img-rounded'  => array(
						'title' => esc_html__( 'Rounded corners', 'trawell' ),
						'img'   => get_parent_theme_file_uri( '/assets/img/admin/image_rounded.png' ),
					),
					'trawell-img-diagonal' => array(
						'title' => esc_html__( 'Diagonally rounded', 'trawell' ),
						'img'   => get_parent_theme_file_uri( '/assets/img/admin/image_diagonal.png' ),
					),
				),
				'default'  => trawell_get_default_option( 'image_style' ),
			),

			array(
				'id'       => 'pill_style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Category link style', 'trawell' ),
				'subtitle' => esc_html__( 'Choose a style for category links', 'trawell' ),
				'options'  => array(
					'default'              => array(
						'title' => esc_html__( 'Pill', 'trawell' ),
						'img'   => get_parent_theme_file_uri( '/assets/img/admin/category_pill.png' ),
					),
					'trawell-pill-square'  => array(
						'title' => esc_html__( 'Square', 'trawell' ),
						'img'   => get_parent_theme_file_uri( '/assets/img/admin/category_square.png' ),
					),
					'trawell-pill-rounded' => array(
						'title' => esc_html__( 'Rounded corners', 'trawell' ),
						'img'   => get_parent_theme_file_uri( '/assets/img/admin/category_rounded.png' ),
					),
				),
				'default'  => trawell_get_default_option( 'pill_style' ),
			),
			
			array(
				'id'          => 'map_style',
				'type'        => 'image_select',
				'title'       => esc_html__( 'Map style', 'trawell' ),
				'subtitle'    => esc_html__( 'Choose a style for map', 'trawell' ),
				'description' => esc_html__( 'Note: Maps will only work if Meks Easy Maps plugin is activated', 'trawell' ),
				'options'     => trawell_get_map_style_options(),
				'default'     => trawell_get_default_option( 'map_style' ),
			),
			
			array(
				'id'          => 'map_style_custom',
				'type'        => 'textarea',
				'title'       => esc_html__( 'Custom map style', 'trawell' ),
				'subtitle'    => wp_kses( sprintf( __( 'Paste a custom style form <a href="%s" target="_blank">Snazzy maps</a>.', 'trawell' ), 'https://snazzymaps.com/' ), wp_kses_allowed_html( 'post' ) ),
				'description' => esc_html__( 'Note: Maps will only work if Meks Easy Maps plugin is activated', 'trawell' ),
				'default'     => trawell_get_default_option( 'map_style_custom' ),
				'required' => array( 'map_style', '=', 'custom' ),
			),

		) )
);

/* Sidebars */
Redux::setSection( $opt_name, array(
		'icon'   => ' el-icon-list',
		'title'  => esc_html__( 'Sidebar', 'trawell' ),
		'desc'   => esc_html__( 'Manage the options for your sidebar area', 'trawell' ),
		'fields' => array(

			array(
				'id'    => 'sidebars',
				'title'       => esc_html__( 'Generate additional sidebars', 'trawell' ),
				'subtitle'    => wp_kses( sprintf( __( 'Use this panel to optionally create additional sidebars for your website. Afterwards, you can manage sidebars content in the <a href="%s">Apperance -> Widgets</a> settings.', 'trawell' ), admin_url( 'widgets.php' ) ), wp_kses_allowed_html( 'post' ) ),
				'type'  => 'sidgen',
			),

			array(
				'id'          => 'color_sidebar_bg',
				'type'        => 'color',
				'title'       => esc_html__( 'Sidebar background color', 'trawell' ),
				'subtitle'    => esc_html__( 'Background color for sidebar area', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_sidebar_bg' ),
			),

			array(
				'id'          => 'color_widget_bg',
				'type'        => 'color',
				'title'       => esc_html__( 'Widget background color', 'trawell' ),
				'subtitle'    => esc_html__( 'Background color for widgets', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_widget_bg' ),
			),

			array(
				'id'          => 'color_widget_h',
				'type'        => 'color',
				'title'       => esc_html__( 'Widget title color', 'trawell' ),
				'subtitle'    => esc_html__( 'Background color for sidebar area', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_widget_h' ),
			),

			array(
				'id'          => 'color_widget_txt',
				'type'        => 'color',
				'title'       => esc_html__( 'Widget text color', 'trawell' ),
				'subtitle'    => esc_html__( 'Background color for sidebar area', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_widget_txt' ),
			),

			array(
				'id'          => 'color_widget_acc',
				'type'        => 'color',
				'title'       => esc_html__( 'Widget accent color', 'trawell' ),
				'subtitle'    => esc_html__( 'Background color for sidebar area', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_widget_acc' ),
			),

			array(
				'id'          => 'color_highlight_bg',
				'type'        => 'color',
				'title'       => esc_html__( 'Highlighted widget background color', 'trawell' ),
				'subtitle'    => esc_html__( 'Background color for highlighted widgets', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_highlight_bg' ),
			),

			array(
				'id'          => 'color_highlight_txt',
				'type'        => 'color',
				'title'       => esc_html__( 'Highlighted widget text color', 'trawell' ),
				'subtitle'    => esc_html__( 'Text color for highlighted widgets', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_highlight_txt' ),
			),

			array(
				'id'          => 'color_highlight_acc',
				'type'        => 'color',
				'title'       => esc_html__( 'Highlighted widget accent color', 'trawell' ),
				'subtitle'    => esc_html__( 'Accent color for highlighted widgets', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_highlight_acc' ),
			),

			array(
				'id'       => 'widget_style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Widget style', 'trawell' ),
				'options'  => array(
					'default' => array( 'title' => esc_html__( 'Square', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/widget_square.png' )  ),
					'trawell-widget-rounded'   => array( 'title' => esc_html__( 'Rounded corners', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/widget_rounded.png' ) ),
					'trawell-widget-diagonal'   => array( 'title' => esc_html__( 'Diagonally rounded', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/widget_diagonal.png' ) ),
					'trawell-widget-unwrap'   => array( 'title' => esc_html__( 'Non-boxed', 'trawell' ), 'img' => get_parent_theme_file_uri( '/assets/img/admin/widget_unbox.png' ) ),

				),
				'default'  => trawell_get_default_option( 'widget_style' ),
			),
		)
	) );

/* Footer */
Redux::setSection( $opt_name, array(
		'icon'   => 'el-icon-bookmark-empty',
		'title'  => esc_html__( 'Footer', 'trawell' ),
		'desc'   => esc_html__( 'Manage the options for your footer area', 'trawell' ),
		'fields' => array(

			array(
				'id'      => 'prefooter',
				'type'    => 'radio',
				'title'   => esc_html__( 'Prefooter area displays', 'trawell' ),
				'subtitle' => esc_html__( 'Select what to display inside prefooter area', 'trawell'),
				'options' => array(
					'instagram' => esc_html__( 'Instagram feed', 'trawell' ),
					'menu'      => esc_html__( 'Pre-footer menu', 'trawell' ),
					'none'      => esc_html__( 'Nothing', 'trawell' ),
				),
				'default' => trawell_get_default_option( 'prefooter' ),
			),

			array(
				'id'       => 'prefooter_instagram_username',
				'type'     => 'text',
				'title'    => esc_html__( 'Instagram username or hashtag', 'trawell' ),
				'subtitle' => esc_html__( 'Example 1: @natgeo Example 2: #flowers', 'trawell' ),
				'default'  => trawell_get_default_option( 'prefooter_instagram_username' ),
				'required' => array( 'prefooter', '=', 'instagram' ),
			),

			array(
				'id'       => 'footer_widgets',
				'type'     => 'switch',
				'switch'   => true,
				'title'    => esc_html__( 'Display footer widgets', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display footer widgetized area', 'trawell'),
				'default'  => trawell_get_default_option( 'footer_widgets' ),
			),

			array(
				'id'       => 'footer_layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Footer area layout', 'trawell' ),
				'subtitle' => esc_html__( 'Choose a layout for your footer widgetized area', 'trawell' ),
				'desc'     => wp_kses_post( sprintf( __( 'Note: Each column represents one Footer Sidebar in <a href="%s">Apperance -> Widgets</a> settings.', 'trawell' ), admin_url( 'widgets.php' ) ) ),
				'options'  => trawell_get_footer_layouts(),
				'default'  => trawell_get_default_option( 'footer_layout' ),
				'required' => array(
					array( 'footer_widgets', '!=', false ),
				),
			),

			array(
				'id'          => 'color_footer_bg',
				'type'        => 'color',
				'title'       => esc_html__( 'Background color', 'trawell' ),
				'subtitle'    => esc_html__( 'This is the footer background color', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_footer_bg' ),
			),

			array(
				'id'          => 'color_footer_txt',
				'type'        => 'color',
				'title'       => esc_html__( 'Text color', 'trawell' ),
				'subtitle'    => esc_html__( 'This is the standard text color for footer', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_footer_txt' ),
			),

			array(
				'id'          => 'color_footer_acc',
				'type'        => 'color',
				'title'       => esc_html__( 'Accent color', 'trawell' ),
				'subtitle'    => esc_html__( 'This color will apply to buttons, links, etc...', 'trawell' ),
				'transparent' => false,
				'default'     => trawell_get_default_option( 'color_footer_acc' ),
			),
		),
	)
);

/* Home page settings */
Redux::setSection( $opt_name, array(
		'icon'    => 'el-icon-home',
		'title'   => esc_html__( 'Home page', 'trawell' ),
		'desc'   => esc_html__( 'Manage general layout settings for your home page and select sections that you want to display', 'trawell' ),
		'fields'  => array(

			$info,

			array(
				'id'       => 'home_cover',
				'type'     => 'switch',
				'switch'   => true,
				'title'    => esc_html__( 'Display cover area', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display cover area on home page', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_cover' ),
			),

			array(
				'id'       => 'home_sections',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Home page sections', 'trawell' ),
				'subtitle' => esc_html__( 'Select (and re-order) what sections you want to display', 'trawell' ),
				'options'  => trawell_get_frontpage_sections_options(),
				'default'  => trawell_get_default_option( 'home_sections' ),
			),

			array(
				'id'      => 'home_sidebar_position',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Display sidebar on home page', 'trawell' ),
				'subtitle'    => esc_html__( 'Check if you want to display sidebar on home page', 'trawell' ),
				'options' => trawell_get_sidebar_layouts( false ),
				'default' => trawell_get_default_option( 'home_sidebar_position' ),
			),

			array(
				'id'       => 'home_sidebar_standard',
				'type'     => 'select',
				'title'    => esc_html__( 'Home page standard sidebar', 'trawell' ),
				'subtitle' => esc_html__( 'Choose home page standard sidebar', 'trawell' ),
				'options'  => trawell_get_sidebars_list(),
				'default'  => trawell_get_default_option( 'home_sidebar_standard' ),
				'required' => array( 'home_sidebar_position', '!=', 'none' ),
			),

			array(
				'id'       => 'home_sidebar_sticky',
				'type'     => 'select',
				'title'    => esc_html__( 'Home page sticky sidebar', 'trawell' ),
				'subtitle' => esc_html__( 'Choose home page sticky sidebar', 'trawell' ),
				'options'  => trawell_get_sidebars_list(),
				'default'  => trawell_get_default_option( 'home_sidebar_sticky' ),
				'required' => array( 'home_sidebar_position', '!=', 'none' ),
			),

		) )
);

/* Cover */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Cover', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'home_cover_intro',
				'type'     => 'trawell_section',
				'title'    => esc_html__( 'Cover', 'trawell' ),
				'subtitle' => esc_html__( 'Manage cover area options for home page', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'home_cover_type',
				'type'     => 'radio',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Cover area displays', 'trawell' ),
				'subtitle' => esc_html__( 'Select what type of content to display in cover area', 'trawell' ),
				'options'  => trawell_get_frontpage_cover_options(),
				'default'  => trawell_get_default_option( 'home_cover_type' ),
			),

			array(
				'id'       => 'home_cover_static',
				'type'     => 'radio',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Cover background', 'trawell' ),
				'subtitle' => esc_html__( 'Select what to display as a cover background', 'trawell' ),
				'options'  => trawell_get_frontpage_static_cover_options(),
				'default'  => trawell_get_default_option( 'home_cover_static' ),
				'required' => array( 'home_cover_type', '=', 'static' )
			),

			array(
				'id'       => 'home_cover_image',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Background image', 'trawell' ),
				'subtitle' => esc_html__( 'Upload an image', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_cover_image' ),
				'required' => array(
					array( 'home_cover_type', '=', 'static' ),
					array( 'home_cover_static', '=', 'image' )
				)
			),


			array(
				'id'       => 'home_cover_video',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Background video', 'trawell' ),
				'subtitle' => esc_html__( 'Upload an video', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_cover_video' ),
				'mode'     => false,
				'required' => array(
					array( 'home_cover_type', '=', 'static' ),
					array( 'home_cover_static', '=', 'video' )
				)
			),

			array(
				'id'       => 'tr_home_cover_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Cover title', 'trawell' ),
				'subtitle' => esc_html__( 'Enter your cover title', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_cover_title' ),
				'required' => array(
					array( 'home_cover_type', '=', 'static' ),
					array( 'home_cover_static_custom_content_show', '=', false ),
				)
			),

			array(
				'id'       => 'tr_home_cover_text',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Cover description', 'trawell' ),
				'subtitle' => esc_html__( 'Enter your cover description', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_cover_text' ),
				'args'   => array(
					'textarea_rows'    => 10
				),
				'required' => array(
					array( 'home_cover_type', '=', 'static' ),
					array( 'home_cover_static_custom_content_show', '=', false ),
				)
			),

			array(
				'id'       => 'tr_home_cover_button_1_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Primary button label', 'trawell' ),
				'subtitle' => esc_html__( 'Enter the label for primary button', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_cover_button_1_text' ),
				'required' => array(
					array( 'home_cover_type', '=', 'static' ),
					array( 'home_cover_static_custom_content_show', '=', false ),
				)
			),


			array(
				'id'       => 'home_cover_button_1_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Primary button URL', 'trawell' ),
				'subtitle' => esc_html__( 'Enter the URL for primary button', 'trawell' ),
				'desc'  => esc_html__( 'Note: leave empty if you do not want to display the button', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_cover_button_1_url' ),
				'validate' => 'url',
				'required' => array(
					array( 'home_cover_type', '=', 'static' ),
					array( 'home_cover_static_custom_content_show', '=', false ),
				)
			),

			array(
				'id'       => 'tr_home_cover_button_2_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Secondary button label', 'trawell' ),
				'subtitle' => esc_html__( 'Enter the label for secondary button', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_cover_button_2_text' ),
				'required' => array(
					array( 'home_cover_type', '=', 'static' ),
					array( 'home_cover_static_custom_content_show', '=', false ),
				)
			),


			array(
				'id'       => 'home_cover_button_2_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Secondary button URL', 'trawell' ),
				'subtitle' => esc_html__( 'Enter the URL for secondary button', 'trawell' ),
				'desc'  => esc_html__( 'Note: leave empty if you do not want to display the button', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_cover_button_2_url' ),
				'validate' => 'url',
				'required' => array(
					array( 'home_cover_type', '=', 'static' ),
					array( 'home_cover_static_custom_content_show', '=', false ),
				)
			),

			array(
				'id'       => 'home_cover_static_custom_content_show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable custom content', 'trawell' ),
				'subtitle' => esc_html__( 'Check this option to disable predefined title and description fields and use your custom content instead', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_cover_static_custom_content_show' ),
				'required' => array( 'home_cover_type', '=', 'static' )
			),
			
			array(
				'id'       => 'home_cover_static_custom_content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Custom content', 'trawell' ),
				'subtitle' => esc_html__( 'Enter the custom content that will be displayed in cover area', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_cover_static_custom_content' ),
				'args'     => array(
					'textarea_rows'  => 10,
					'default_editor' => 'html',
				),
				'required' => array(
					array( 'home_cover_type', '=', 'static' ),
					array( 'home_cover_static_custom_content_show', '=', true ),
				),
			),
			
			array(
				'id'       => 'home_cover_slider_autoplay',
				'type'     => 'switch',
				'switch'   => true,
				'title'    => esc_html__( 'Autoplay (rotate)', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to auto rotate items', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_cover_slider_autoplay' ),
				'required' => array(
					array( 'home_cover_type', '=', 'slider' ),
				)
			),
			
			array(
				'id'       => 'home_cover_slider_autoplay_time',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Autoplay time', 'trawell' ),
				'subtitle' => esc_html__( 'Specify autoplay time per slide', 'trawell' ),
				'desc'     => esc_html__( 'Note: Please specify number in seconds', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_cover_slider_autoplay_time' ),
				'validate' => 'numeric',
				'required' => array( 'home_cover_slider_autoplay', '=', true ),
			),
			
			array(
				'id'       => 'home_cover_query_type',
				'type'     => 'radio',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Select from', 'trawell' ),
				'subtitle' => esc_html__( 'Check whether you want to display posts or categories', 'trawell' ),
				'options'  => array(
					'posts' => esc_html__( 'Posts', 'trawell' ),
					'categories' => esc_html__( 'Categories', 'trawell' )
				),
				'default'  => trawell_get_default_option( 'home_cover_query_type' ),
				'required' => array(
					array( 'home_cover_type', '!=', 'none' ),
					array( 'home_cover_type', '!=', 'static' )
				)
			),

			array(
				'id'       => 'home_cover_posts_query_type',
				'type'     => 'radio',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Choose posts', 'trawell' ),
				'options'  => array(
					'manual' => esc_html__( 'Manually', 'trawell' ),
					'custom' => esc_html__( 'By a specific criteria', 'trawell' )
				),
				'default'  => trawell_get_default_option( 'home_cover_posts_query_type' ),
				'required' => array(
					array( 'home_cover_type', '!=', 'none' ),
					array( 'home_cover_type', '!=', 'static' ),
					array( 'home_cover_query_type', '=', 'posts' ),
				)
			),

			array(
				'id'       => 'home_cover_posts_manual',
				'type'     => 'select',
				'title'    => esc_html__( 'Select posts', 'trawell' ),
				'subtitle' => esc_html__( 'Select posts that you want to display', 'trawell' ),
				'multi' => true,
				'sortable' => true,
				'data' => 'posts',
				'args'     => array(
					'posts_per_page' => -1,
				),
				'default'  => trawell_get_default_option( 'home_cover_posts_manual' ),
				'required' => array(
					array( 'home_cover_query_type', '=', 'posts' ),
					array( 'home_cover_posts_query_type', '=', 'manual' ),
				)
			),

			array(
				'id'       => 'home_cover_posts_number',
				'type'     => 'slider',
				'title'    => esc_html__( 'Number of posts to display', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_cover_posts_number' ),
				'min'      => '1',
				'step'     => '1',
				'max'      => '30',
				'required' => array(
					array( 'home_cover_type', '!=', 'map' ),
					array( 'home_cover_query_type', '=', 'posts' ),
					array( 'home_cover_posts_query_type', '=', 'custom' ),
				)
			),


			array(
				'id'       => 'home_cover_posts_order',
				'type'     => 'radio',
				'title'    => esc_html__( 'Order by', 'trawell' ),
				'options'  => trawell_get_post_order_opts(),
				'default'  => trawell_get_default_option( 'home_cover_posts_order' ),
				'required' => array(
					array( 'home_cover_query_type', '=', 'posts' ),
					array( 'home_cover_posts_query_type', '=', 'custom' ),
				)
			),

			array(
				'id'       => 'home_cover_posts_sort',
				'type'     => 'radio',
				'title'    => esc_html__( 'Sort', 'trawell' ),
				'options'  => array(
					'desc' => esc_html__( 'Descending', 'trawell' ),
					'asc' => esc_html__( 'Ascending', 'trawell' ),
				),
				'default'  => trawell_get_default_option( 'home_cover_posts_sort' ),
				'required' => array(
					array( 'home_cover_query_type', '=', 'posts' ),
					array( 'home_cover_posts_query_type', '=', 'custom' ),
				)
			),

			array(
				'id'       => 'home_cover_posts_in_category',
				'type'     => 'select',
				'title'    => esc_html__( 'In category', 'trawell' ),
				'subtitle' => esc_html__( 'Select categories or leave empty to pull posts from all categories', 'trawell' ),
				'multi'    => true,
				'data'     => 'categories',
				'args'     => array(
					'hide_empty' => false,
					'number'     => 0,
				),
				'default'  => trawell_get_default_option( 'home_cover_posts_in_category' ),
				'required' => array(
					array( 'home_cover_query_type', '=', 'posts' ),
					array( 'home_cover_posts_query_type', '=', 'custom' ),
				)
			),


			array(
				'id'       => 'home_cover_posts_tagged',
				'type'     => 'select',
				'title'    => esc_html__( 'Tagged with', 'trawell' ),
				'subtitle' => esc_html__( 'Select tags or leave empty to pull posts from all tags', 'trawell' ),
				'multi' => true,
				'data' => 'tags',
				'args'     => array(
					'hide_empty' => false,
					'number'     => 0,
				),
				'default'  => trawell_get_default_option( 'home_cover_posts_tagged' ),
				'required' => array(
					array( 'home_cover_query_type', '=', 'posts' ),
					array( 'home_cover_posts_query_type', '=', 'custom' ),
				)
			),

			array(
				'id'       => 'home_cover_posts_time_diff',
				'type'     => 'radio',
				'title'    => esc_html__( 'Not older than', 'trawell' ),
				'subtitle' => esc_html__( 'Display posts that are not older than a specific time range', 'trawell' ),
				'options'  => trawell_get_time_diff_opts(),
				'default'  => trawell_get_default_option( 'home_cover_posts_time_diff' ),
				'required' => array(
					array( 'home_cover_query_type', '=', 'posts' ),
					array( 'home_cover_posts_query_type', '=', 'custom' ),
				)
			),
			
			array(
				'id'       => 'home_cover_slider_unique_posts',
				'type'     => 'switch',
				'switch'   => true,
				'title'    => esc_html__( 'Unique posts (do not duplicate)', 'trawell' ),
				'subtitle' => esc_html__( 'If you check this option, selected posts will be excluded from other post sections on home page.', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_cover_slider_unique_posts' ),
				'required' => array(
					array( 'home_cover_query_type', '=', 'posts' ),
					array( 'home_cover_posts_query_type', '=', 'custom' ),
				)
			),

			array(
				'id'       => 'home_cover_categories',
				'type'     => 'select',
				'title'    => esc_html__( 'Select categories', 'trawell' ),
				'subtitle' => esc_html__( 'Select specific categories or leave empty to display all categories', 'trawell' ),
				'multi' => true,
				'sortable' => true,
				'data'     => 'categories',
				'args'     => array(
					'hide_empty' => false,
					'number'     => 0,
				),
				'default'  => trawell_get_default_option( 'home_cover_categories' ),
				'required' => array( 'home_cover_query_type', '=', 'categories' )
			),

		) ) );

/* As seen in */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'As seen in', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'home_as_seen_in',
				'type'     => 'trawell_section',
				'title'    => esc_html__( 'As seen in', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for "as seen in" section', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'tr_home_as_seen_in_title',
				'type'     => 'text',
				'url'      => true,
				'title'    => esc_html__( 'As seen in section title', 'trawell' ),
				'subtitle' => esc_html__( 'Enter the title for "as seen in" section', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_as_seen_in_title' ),
			),

			array(
				'id'       => 'home_as_seen_in_image',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'As seen in image', 'trawell' ),
				'subtitle' => esc_html__( 'Upload an image', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_as_seen_in_image' ),
			),
		)
	) );

/* About */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'About', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'home_about_intro',
				'type'     => 'trawell_section',
				'title'    => esc_html__( 'About', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for About section', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'tr_home_about_title',
				'type'     => 'text',
				'url'      => true,
				'title'    => esc_html__( 'About section title', 'trawell' ),
				'subtitle' => esc_html__( 'Enter the title for About section', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_about_title' ),
			),

			array(
				'id'       => 'home_about_image',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'About section image', 'trawell' ),
				'subtitle' => esc_html__( 'Image on the left side in the about section', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_about_image' ),
			),

			array(
				'id'       => 'tr_home_about_text',
				'type'     => 'editor',
				'url'      => true,
				'title'    => esc_html__( 'About text', 'trawell' ),
				'subtitle' => esc_html__( 'Enter the content for About section', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_about_text' ),
			),
			
			
			array(
				'id'       => 'tr_home_about_button_1_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Primary button label', 'trawell' ),
				'subtitle' => esc_html__( 'Enter the label for primary button', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_about_button_1_text' ),
			),
			
			
			array(
				'id'       => 'home_about_button_1_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Primary button URL', 'trawell' ),
				'subtitle' => esc_html__( 'Enter the URL for primary button', 'trawell' ),
				'desc'  => esc_html__( 'Note: leave empty if you do not want to display the button', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_about_button_1_url' ),
				'validate' => 'url',
			),
			
			array(
				'id'       => 'tr_home_about_button_2_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Secondary button label', 'trawell' ),
				'subtitle' => esc_html__( 'Enter the label for secondary button', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_about_button_2_text' ),
			),
			
			
			array(
				'id'       => 'home_about_button_2_url',
				'type'     => 'text',
				'title'    => esc_html__( 'Secondary button URL', 'trawell' ),
				'subtitle' => esc_html__( 'Enter the URL for secondary button', 'trawell' ),
				'desc'  => esc_html__( 'Note: leave empty if you do not want to display the button', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_about_button_2_url' ),
				'validate' => 'url',
			),
		
		)
	) );

/* Posts */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Posts', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'home_posts',
				'type'     => 'trawell_section',
				'title'    => esc_html__( 'Posts', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for Posts section', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'tr_home_posts_title',
				'type'     => 'text',
				'url'      => true,
				'title'    => esc_html__( 'Posts section title', 'trawell' ),
				'subtitle' => esc_html__( 'Enter the title for Posts section', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_posts_title' ),
			),

			array(
				'id'       => 'home_posts_layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Posts layout', 'trawell' ),
				'subtitle' => esc_html__( 'Choose a layout', 'trawell' ),
				'options'  => trawell_get_posts_layouts(),
				'default'  => trawell_get_default_option( 'home_posts_layout' ),
				'required' => array( 'home_sidebar_position', '=', 'none' ),
			),

			array(
				'id'       => 'home_posts_layout_sid',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Posts layout', 'trawell' ),
				'subtitle' => esc_html__( 'Choose a layout', 'trawell' ),
				'options'  => trawell_get_posts_layouts( array( 'inherit', 'b3', 'c4', 'd4', 'e4' ) ),
				'default'  => trawell_get_default_option( 'home_posts_layout' ),
				'required' => array( 'home_sidebar_position', '!=', 'none' ),
			),

			array(
				'id'       => 'home_posts_query_type',
				'type'     => 'radio',
				'title'    => esc_html__( 'Choose posts', 'trawell' ),
				'options'  => array(
					'manual' => esc_html__( 'Manually', 'trawell' ),
					'custom' => esc_html__( 'By a specific criteria', 'trawell' )
				),
				'default'  => trawell_get_default_option( 'home_posts_query_type' ),
			),

			array(
				'id'       => 'home_posts_manual',
				'type'     => 'select',
				'title'    => esc_html__( 'Select posts', 'trawell' ),
				'subtitle' => esc_html__( 'Select posts that you want to display', 'trawell' ),
				'multi' => true,
				'sortable' => true,
				'data' => 'posts',
				'args'     => array(
					'posts_per_page' => -1,
				),
				'default'  => trawell_get_default_option( 'home_posts_manual' ),
				'required' => array( 'home_posts_query_type', '=', 'manual' ),
			),

			array(
				'id'       => 'home_posts_number',
				'type'     => 'slider',
				'title'    => esc_html__( 'Number of posts to display', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_posts_number' ),
				'min'      => '1',
				'step'     => '1',
				'max'      => '30',
				'required' => array(
					array( 'home_posts_query_type', '=', 'custom' )
				),
			),

			array(
				'id'       => 'home_posts_order',
				'type'     => 'radio',
				'title'    => esc_html__( 'Order by', 'trawell' ),
				'options'  => trawell_get_post_order_opts(),
				'default'  => trawell_get_default_option( 'home_posts_order' ),
				'required' => array( 'home_posts_query_type', '=', 'custom' ),
			),

			array(
				'id'       => 'home_posts_sort',
				'type'     => 'radio',
				'title'    => esc_html__( 'Sort', 'trawell' ),
				'options'  => array(
					'desc' => esc_html__( 'Descending', 'trawell' ),
					'asc' => esc_html__( 'Ascending', 'trawell' ),
				),
				'default'  => trawell_get_default_option( 'home_posts_sort' ),
				'required' => array( 'home_posts_query_type', '=', 'custom' ),
			),

			array(
				'id'       => 'home_posts_in_category',
				'type'     => 'select',
				'title'    => esc_html__( 'In category', 'trawell' ),
				'subtitle' => esc_html__( 'Select categories or leave empty to pull posts from all tags', 'trawell' ),
				'multi' => true,
				'data'     => 'categories',
				'args'     => array(
					'hide_empty' => false,
					'number'     => 0,
				),
				'default'  => trawell_get_default_option( 'home_posts_in_category' ),
				'required' => array( 'home_posts_query_type', '=', 'custom' ),
			),

			array(
				'id'       => 'home_posts_tagged',
				'type'     => 'select',
				'title'    => esc_html__( 'Tagged with', 'trawell' ),
				'subtitle' => esc_html__( 'Select tags or leave empty to pull posts from all tags', 'trawell' ),
				'multi' => true,
				'data' => 'tags',
				'args'     => array(
					'hide_empty' => false,
					'number'     => 0,
				),
				'default'  => trawell_get_default_option( 'home_posts_tagged' ),
				'required' => array( 'home_posts_query_type', '=', 'custom' ),
			),

			array(
				'id'       => 'home_posts_time_diff',
				'type'     => 'radio',
				'title'    => esc_html__( 'Not older than', 'trawell' ),
				'subtitle' => esc_html__( 'Display posts that are not older than a specific time range', 'trawell' ),
				'options'  => trawell_get_time_diff_opts(),
				'default'  => trawell_get_default_option( 'home_posts_time_diff' ),
				'required' => array( 'home_posts_query_type', '=', 'custom' ),
			),

			array(
				'id'       => 'home_posts_cta_type',
				'type'     => 'radio',
				'title'    => esc_html__( 'Action type', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display a specific action below posts list', 'trawell' ),
				'options'  => array(
					'blog'         => esc_html__( 'View all button (to blog/index page)', 'trawell' ),
					'pagination'         => esc_html__( 'Pagination', 'trawell' ),
					'0'           => esc_html__( 'None', 'trawell' ),
				),
				'default'  => trawell_get_default_option( 'home_posts_cta_type' ),
				'required' => array( 'home_posts_query_type', '=', 'custom' ),
			),

			array(
				'id'       => 'home_posts_pag',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Pagination', 'trawell' ),
				'subtitle' => esc_html__( 'Choose a pagination type', 'trawell' ),
				'options'  => trawell_get_pagination_layouts(),
				'default'  => trawell_get_default_option( 'home_posts_pag' ),
				'required' => array( 'home_posts_cta_type', '=', 'pagination' ),
			),

		)
	) );

/* Categories */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Categories', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'home_categories_intro',
				'type'     => 'trawell_section',
				'title'    => esc_html__( 'Categories', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for Categories section', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'tr_home_categories_title',
				'type'     => 'text',
				'url'      => true,
				'title'    => esc_html__( 'Categories section title', 'trawell' ),
				'subtitle' => esc_html__( 'Enter the title for Categories section', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_categories_title' ),
			),

			array(
				'id'       => 'home_categories_layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Categories layout', 'trawell' ),
				'subtitle' => esc_html__( 'Choose a layout', 'trawell' ),
				'options'  => trawell_get_categories_layouts(),
				'default'  => trawell_get_default_option( 'home_categories_layout' ),
			),

			array(
				'id'       => 'home_categories',
				'type'     => 'select',
				'title'    => esc_html__( 'Select categories', 'trawell' ),
				'subtitle' => esc_html__( 'Select specific categories or leave empty to display all categories', 'trawell' ),
				'multi' => true,
				'sortable' => true,
				'data'     => 'categories',
				'args'     => array(
					'hide_empty' => false,
					'number'     => 0,
				),
				'default'  => trawell_get_default_option( 'home_categories' ),
			),

		)
	) );

/* Counters */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Counters', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'home_counters_intro',
				'type'     => 'trawell_section',
				'title'    => esc_html__( 'Counters', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for Counters section', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'tr_home_counters_title',
				'type'     => 'text',
				'url'      => true,
				'title'    => esc_html__( 'Counters section title', 'trawell' ),
				'subtitle' => esc_html__( 'Enter the title for Counters section', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_counters_title' ),
			),

			array(
				'id'       => 'home_counter_1_number',
				'type'     => 'text',
				'title'    => esc_html__( 'Item 1 number', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_counter_1_number' ),
			),

			array(
				'id'       => 'tr_home_counter_1_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Item 1 title', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_counter_1_title' ),
			),

			array(
				'id'       => 'home_counter_2_number',
				'type'     => 'text',
				'title'    => esc_html__( 'Item 2 number', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_counter_2_number' ),
			),

			array(
				'id'       => 'tr_home_counter_2_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Item 2 title', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_counter_2_title' ),
			),

			array(
				'id'       => 'home_counter_3_number',
				'type'     => 'text',
				'title'    => esc_html__( 'Item 3 number', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_counter_3_number' ),
			),

			array(
				'id'       => 'tr_home_counter_3_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Item 3 title', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_counter_3_title' ),
			),

			array(
				'id'       => 'home_counter_4_number',
				'type'     => 'text',
				'title'    => esc_html__( 'Item 4 number', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_counter_4_number' ),
			),

			array(
				'id'       => 'tr_home_counter_4_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Item 4 title', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_counter_4_title' ),
			),

			array(
				'id'       => 'home_counter_5_number',
				'type'     => 'text',
				'title'    => esc_html__( 'Item 5 number', 'trawell' ),
				'default'  => trawell_get_default_option( 'home_counter_5_number' ),
			),

			array(
				'id'       => 'tr_home_counter_5_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Item 5 title', 'trawell' ),
				'default'  => trawell_get_default_option( 'tr_home_counter_5_title' ),
			),

		)
	) );

/* Custom content */
Redux::setSection( $opt_name, array(
	'icon'       => '',
	'title'      => esc_html__( 'Custom content', 'trawell' ),
	'heading'    => false,
	'subsection' => true,
	'fields'     => array(
		
		array(
			'id'       => 'home_custom_content_intro',
			'type'     => 'trawell_section',
			'title'    => esc_html__( 'Custom content', 'trawell' ),
			'subtitle' => esc_html__( 'Manage the options for Custom content section', 'trawell' ),
			'indent'   => false,
		),
		
		array(
			'id'       => 'tr_home_custom_content_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Custom content section title', 'trawell' ),
			'subtitle' => esc_html__( 'Enter the title for Custom content section', 'trawell' ),
			'default'  => trawell_get_default_option( 'tr_home_custom_content_title' )
		),
		
		array(
			'id'       => 'tr_home_custom_content',
			'type'     => 'editor',
			'title'    => esc_html__( 'Content', 'trawell' ),
			'subtitle' => esc_html__( 'Enter the custom content', 'trawell' ),
			'desc'     => esc_html__( 'Note: If you want to paste an HTML, a shortcode or a JavaScript code, use "text" mode in editor', 'trawell' ),
			'default'  => trawell_get_default_option( 'tr_home_custom_content' ),
			'args'     => array(
				'textarea_rows'  => 10,
				'default_editor' => 'html',
			),
		),
	
	)
) );

/* Post Layout settings */
Redux::setSection( $opt_name, array(
		'icon'    => 'el-icon-th-large',
		'title'   => esc_html__( 'Post Layouts', 'trawell' ),
		'heading' => false,
		'fields'  => array() )
);

/* Layout A1 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout A1', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_a1',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_a1.png' ) ) . '"/>' . esc_html__( 'Layout A1', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout A1', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_a1_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a1_cat' ),
			),

			array(
				'id'       => 'layout_a1_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a1_icon' ),
			),

			array(
				'id'       => 'layout_a1_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_a1_meta' ) ),
			),
			
			array(
				'id'       => 'layout_a1_content',
				'type'     => 'radio',
				'title'    => esc_html__( 'Content type', 'trawell' ),
				'options'  => array(
					'excerpt' => esc_html__( 'Excerpt (automatically limit number of characters)', 'trawell' ),
					'content' => esc_html__( 'Full content (optionally split with "<--more-->" tag)', 'trawell' ),
				),
				'subtitle' => esc_html__( 'Choose how to display the content', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a1_content' ),
			),

			array(
				'id'       => 'layout_a1_excerpt_limit',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Excerpt limit', 'trawell' ),
				'subtitle' => esc_html__( 'Specify your excerpt limit', 'trawell' ),
				'desc'     => esc_html__( 'Note: Value represents number of characters', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a1_excerpt_limit' ),
				'validate' => 'numeric',
				'required' => array( 'layout_a1_content', '=', 'excerpt' ),
			),

			array(
				'id'        => 'layout_a1_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout A1', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_a1_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_a1_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout A1 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a1_img_size_custom' ),
				'required'  => array( 'layout_a1_img_size_ratio', '=', 'custom' ),
			),

		) ) );

/* Layout A2 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout A2', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_a2',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_a2.png' ) ) . '"/>' . esc_html__( 'Layout A2', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout A2', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_a2_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a2_cat' ),
			),

			array(
				'id'       => 'layout_a2_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a2_icon' ),
			),

			array(
				'id'       => 'layout_a2_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_a2_meta' ) ),
			),

			array(
				'id'       => 'layout_a2_excerpt',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display excerpt', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post text excerpt', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a2_excerpt' ),
			),

			array(
				'id'       => 'layout_a2_excerpt_limit',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Excerpt limit', 'trawell' ),
				'subtitle' => esc_html__( 'Specify your excerpt limit', 'trawell' ),
				'desc'     => esc_html__( 'Note: Value represents number of characters', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a2_excerpt_limit' ),
				'validate' => 'numeric',
				'required' => array( 'layout_a2_excerpt', '=', true ),
			),

			array(
				'id'        => 'layout_a2_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout A2', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_a2_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_a2_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout A2 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a2_img_size_custom' ),
				'required'  => array( 'layout_a2_img_size_ratio', '=', 'custom' ),
			),

		) ) );


/* Layout A3 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout A3', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_a3',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_a3.png' ) ) . '"/>' . esc_html__( 'Layout A3', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout A3', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_a3_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a3_cat' ),
			),

			array(
				'id'       => 'layout_a3_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a3_icon' ),
			),

			array(
				'id'       => 'layout_a3_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_a3_meta' ) ),
			),

			array(
				'id'       => 'layout_a3_excerpt',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display excerpt', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post text excerpt', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a3_excerpt' ),
			),

			array(
				'id'       => 'layout_a3_excerpt_limit',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Excerpt limit', 'trawell' ),
				'subtitle' => esc_html__( 'Specify your excerpt limit', 'trawell' ),
				'desc'     => esc_html__( 'Note: Value represents number of characters', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a3_excerpt_limit' ),
				'validate' => 'numeric',
				'required' => array( 'layout_a3_excerpt', '=', true ),
			),

			array(
				'id'        => 'layout_a3_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout A3', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_a3_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_a3_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout A3 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a3_img_size_custom' ),
				'required'  => array( 'layout_a3_img_size_ratio', '=', 'custom' ),
			),
		) ) );

/* Layout A4 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout A4', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_a4',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_a4.png' ) ) . '"/>' . esc_html__( 'Layout A4', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout A4', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_a4_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a4_cat' ),
			),

			array(
				'id'       => 'layout_a4_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a4_icon' ),
			),

			array(
				'id'       => 'layout_a4_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_a4_meta' ) ),
			),

			array(
				'id'       => 'layout_a4_excerpt',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display excerpt', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post text excerpt', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a4_excerpt' ),
			),

			array(
				'id'       => 'layout_a4_excerpt_limit',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Excerpt limit', 'trawell' ),
				'subtitle' => esc_html__( 'Specify your excerpt limit', 'trawell' ),
				'desc'     => esc_html__( 'Note: Value represents number of characters', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a4_excerpt_limit' ),
				'validate' => 'numeric',
				'required' => array( 'layout_a4_excerpt', '=', true ),
			),

			array(
				'id'        => 'layout_a4_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout A4', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_a4_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_a4_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout A4 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_a4_img_size_custom' ),
				'required'  => array( 'layout_a4_img_size_ratio', '=', 'custom' ),
			),
		) ) );

/* Layout B1 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout B1', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_b1',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_b1.png' ) ) . '"/>' . esc_html__( 'Layout B1', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout B1', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_b1_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_b1_cat' ),
			),

			array(
				'id'       => 'layout_b1_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_b1_icon' ),
			),

			array(
				'id'       => 'layout_b1_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_b1_meta' ) ),
			),

			array(
				'id'       => 'layout_b1_excerpt',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display excerpt', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post text excerpt', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_b1_excerpt' ),
			),

			array(
				'id'       => 'layout_b1_excerpt_limit',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Excerpt limit', 'trawell' ),
				'subtitle' => esc_html__( 'Specify your excerpt limit', 'trawell' ),
				'desc'     => esc_html__( 'Note: Value represents number of characters', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_b1_excerpt_limit' ),
				'validate' => 'numeric',
				'required' => array( 'layout_b1_excerpt', '=', true ),
			),

			array(
				'id'        => 'layout_b1_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout B1', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_b1_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_b1_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout B1 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_b1_img_size_custom' ),
				'required'  => array( 'layout_b1_img_size_ratio', '=', 'custom' ),
			),
		) ) );

/* Layout B2 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout B2', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_b2',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_b2.png' ) ) . '"/>' . esc_html__( 'Layout B2', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout B2', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_b2_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_b2_cat' ),
			),

			array(
				'id'       => 'layout_b2_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_b2_icon' ),
			),

			array(
				'id'       => 'layout_b2_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_b2_meta' ) ),
			),

			array(
				'id'        => 'layout_b2_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout B2', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_b2_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_b2_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout B2 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_b2_img_size_custom' ),
				'required'  => array( 'layout_b2_img_size_ratio', '=', 'custom' ),
			),
		) ) );

/* Layout B3 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout B3', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_b3',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_b3.png' ) ) . '"/>' . esc_html__( 'Layout B3', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout B3', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_b3_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_b3_cat' ),
			),

			array(
				'id'       => 'layout_b3_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_b3_icon' ),
			),

			array(
				'id'       => 'layout_b3_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_b3_meta' ) ),
			),

			array(
				'id'        => 'layout_b3_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout B3', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_b3_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_b3_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout B2 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_b3_img_size_custom' ),
				'required'  => array( 'layout_b3_img_size_ratio', '=', 'custom' ),
			),
		) ) );

/* Layout C1 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout C1', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_c1_cat',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_c1.png' ) ) . '"/>' . esc_html__( 'Layout C1', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout C1', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_c1_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_c1_cat' ),
			),

			array(
				'id'       => 'layout_c1_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_c1_icon' ),
			),

			array(
				'id'       => 'layout_c1_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_c1_meta' ) ),
			),

			array(
				'id'        => 'layout_c1_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout C1', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_c1_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_c1_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout B2 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_c1_img_size_custom' ),
				'required'  => array( 'layout_c1_img_size_ratio', '=', 'custom' ),
			),
		) ) );


/* Layout C2 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout C2', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_c2_cat',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_c2.png' ) ) . '"/>' . esc_html__( 'Layout C2', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout C2', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_c2_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_c2_cat' ),
			),

			array(
				'id'       => 'layout_c2_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_c2_icon' ),
			),

			array(
				'id'       => 'layout_c2_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_c2_meta' ) ),
			),

			array(
				'id'        => 'layout_c2_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout C2', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_c2_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_c2_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout B2 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_c2_img_size_custom' ),
				'required'  => array( 'layout_c2_img_size_ratio', '=', 'custom' ),
			),
		) ) );


/* Layout C3 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout C3', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_c3_cat',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_c3.png' ) ) . '"/>' . esc_html__( 'Layout C3', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout C3', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_c3_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_c3_cat' ),
			),

			array(
				'id'       => 'layout_c3_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_c3_icon' ),
			),

			array(
				'id'       => 'layout_c3_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_c3_meta' ) ),
			),

			array(
				'id'        => 'layout_c3_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout C3', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_c3_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_c3_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout B2 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_c3_img_size_custom' ),
				'required'  => array( 'layout_c3_img_size_ratio', '=', 'custom' ),
			),
		) ) );

/* Layout C4 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout C4', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_c4_cat',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_c4.png' ) ) . '"/>' . esc_html__( 'Layout C4', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout C4', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_c4_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_c4_cat' ),
			),

			array(
				'id'       => 'layout_c4_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_c4_icon' ),
			),

			array(
				'id'       => 'layout_c4_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_c4_meta' ) ),
			),

			array(
				'id'        => 'layout_c4_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout C4', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_c4_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_c4_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout B2 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_c4_img_size_custom' ),
				'required'  => array( 'layout_c4_img_size_ratio', '=', 'custom' ),
			),
		) ) );


/* Layout D1 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout D1', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_d1_cat',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_d1.png' ) ) . '"/>' . esc_html__( 'Layout D1', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout D1', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_d1_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d1_cat' ),
			),

			array(
				'id'       => 'layout_d1_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d1_icon' ),
			),

			array(
				'id'       => 'layout_d1_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_d1_meta' ) ),
			),

			array(
				'id'       => 'layout_d1_excerpt',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display excerpt', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post text excerpt', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d1_excerpt' ),
			),

			array(
				'id'       => 'layout_d1_excerpt_limit',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Excerpt limit', 'trawell' ),
				'subtitle' => esc_html__( 'Specify your excerpt limit', 'trawell' ),
				'desc'     => esc_html__( 'Note: Value represents number of characters', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d1_excerpt_limit' ),
				'validate' => 'numeric',
				'required' => array( 'layout_d1_excerpt', '=', true ),
			),

			array(
				'id'        => 'layout_d1_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout D1', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_d1_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_d1_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout D1 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d1_img_size_custom' ),
				'required'  => array( 'layout_d1_img_size_ratio', '=', 'custom' ),
			),

		) ) );

/* Layout D2 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout D2', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_d2_cat',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_d2.png' )  ) . '"/>' . esc_html__( 'Layout D2', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout D2', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_d2_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d2_cat' ),
			),

			array(
				'id'       => 'layout_d2_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d2_icon' ),
			),

			array(
				'id'       => 'layout_d2_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_d2_meta' ) ),
			),

			array(
				'id'        => 'layout_d2_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout D2', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_d2_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_d2_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout D2 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d2_img_size_custom' ),
				'required'  => array( 'layout_d2_img_size_ratio', '=', 'custom' ),
			),

		) ) );


/* Layout D3 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout D3', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_d3_cat',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_d3.png' ) ) . '"/>' . esc_html__( 'Layout D3', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout D3', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_d3_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d3_cat' ),
			),

			array(
				'id'       => 'layout_d3_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d3_icon' ),
			),

			array(
				'id'       => 'layout_d3_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_d3_meta' ) ),
			),

			array(
				'id'       => 'layout_d3_excerpt',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display excerpt', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post text excerpt', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d3_excerpt' ),
			),

			array(
				'id'       => 'layout_d3_excerpt_limit',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Excerpt limit', 'trawell' ),
				'subtitle' => esc_html__( 'Specify your excerpt limit', 'trawell' ),
				'desc'     => esc_html__( 'Note: Value represents number of characters', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d3_excerpt_limit' ),
				'validate' => 'numeric',
				'required' => array( 'layout_d3_excerpt', '=', true ),
			),

			array(
				'id'        => 'layout_d3_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout D3', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_d3_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_d3_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout D3 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d3_img_size_custom' ),
				'required'  => array( 'layout_d3_img_size_ratio', '=', 'custom' ),
			),
		) ) );

/* Layout D4 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout D4', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_d4_cat',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_d4.png' ) ) . '"/>' . esc_html__( 'Layout D4', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout D4', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_d4_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d4_cat' ),
			),

			array(
				'id'       => 'layout_d4_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d4_icon' ),
			),

			array(
				'id'       => 'layout_d4_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_d4_meta' ) ),
			),

			array(
				'id'       => 'layout_d4_excerpt',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display excerpt', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post text excerpt', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d4_excerpt' ),
			),

			array(
				'id'       => 'layout_d4_excerpt_limit',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Excerpt limit', 'trawell' ),
				'subtitle' => esc_html__( 'Specify your excerpt limit', 'trawell' ),
				'desc'     => esc_html__( 'Note: Value represents number of characters', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d4_excerpt_limit' ),
				'validate' => 'numeric',
				'required' => array( 'layout_d4_excerpt', '=', true ),
			),

			array(
				'id'        => 'layout_d4_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout D4', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_d4_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_d4_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout D4 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_d4_img_size_custom' ),
				'required'  => array( 'layout_d4_img_size_ratio', '=', 'custom' ),
			),
		) ) );


/* Layout E2 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout E2', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_e2',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_e2.png' ) ) . '"/>' . esc_html__( 'Layout E2', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout E2', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_e2_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_e2_cat' ),
			),

			array(
				'id'       => 'layout_e2_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_e2_icon' ),
			),

			array(
				'id'       => 'layout_e2_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_e2_meta' ) ),
			),

			array(
				'id'       => 'layout_e2_excerpt',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display excerpt', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post text excerpt', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_e2_excerpt' ),
			),

			array(
				'id'       => 'layout_e2_excerpt_limit',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Excerpt limit', 'trawell' ),
				'subtitle' => esc_html__( 'Specify your excerpt limit', 'trawell' ),
				'desc'     => esc_html__( 'Note: Value represents number of characters', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_e2_excerpt_limit' ),
				'validate' => 'numeric',
				'required' => array( 'layout_e2_excerpt', '=', true ),
			),

		) ) );



/* Layout E3 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout E3', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_e3',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_e3.png' ) ) . '"/>' . esc_html__( 'Layout E3', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout E3', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_e3_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_e3_cat' ),
			),

			array(
				'id'       => 'layout_e3_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_e3_icon' ),
			),

			array(
				'id'       => 'layout_e3_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_e3_meta' ) ),
			),

			array(
				'id'       => 'layout_e3_excerpt',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display excerpt', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post text excerpt', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_e3_excerpt' ),
			),

			array(
				'id'       => 'layout_e3_excerpt_limit',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Excerpt limit', 'trawell' ),
				'subtitle' => esc_html__( 'Specify your excerpt limit', 'trawell' ),
				'desc'     => esc_html__( 'Note: Value represents number of characters', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_e3_excerpt_limit' ),
				'validate' => 'numeric',
				'required' => array( 'layout_e3_excerpt', '=', true ),
			),

		) ) );

/* Layout E4 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout E4', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_e4',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_e4.png' ) ) . '"/>' . esc_html__( 'Layout E4', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Layout E4', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_e4_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_e4_cat' ),
			),

			array(
				'id'       => 'layout_e4_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_e4_icon' ),
			),

			array(
				'id'       => 'layout_e4_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_e4_meta' ) ),
			),

			array(
				'id'       => 'layout_e4_excerpt',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display excerpt', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post text excerpt', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_e4_excerpt' ),
			),

			array(
				'id'       => 'layout_e4_excerpt_limit',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Excerpt limit', 'trawell' ),
				'subtitle' => esc_html__( 'Specify your excerpt limit', 'trawell' ),
				'desc'     => esc_html__( 'Note: Value represents number of characters', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_e4_excerpt_limit' ),
				'validate' => 'numeric',
				'required' => array( 'layout_e4_excerpt', '=', true ),
			),

		) ) );

/* Layout map */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout map', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(

			array(
				'id'       => 'section_layout_posts_map',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_map.png' ) ) . '"/>' . esc_html__( 'Layout map', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for posts displayed in Map Layout', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_map_cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_map_cat' ),
			),

			array(
				'id'       => 'layout_map_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_map_icon' ),
			),

			array(
				'id'       => 'layout_map_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'layout_map_meta' ) ),
			),

			array(
				'id'       => 'layout_map_excerpt',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display excerpt', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post text excerpt', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_map_excerpt' ),
			),

			array(
				'id'       => 'layout_map_excerpt_limit',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Excerpt limit', 'trawell' ),
				'subtitle' => esc_html__( 'Specify your excerpt limit', 'trawell' ),
				'desc'     => esc_html__( 'Note: Value represents number of characters', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_map_excerpt_limit' ),
				'validate' => 'numeric',
				'required' => array( 'layout_map_excerpt', '=', true ),
			),

		) ) );


/* Category Layout settings */
Redux::setSection( $opt_name, array(
		'icon'    => 'el-icon-th-large',
		'title'   => esc_html__( 'Category Layouts', 'trawell' ),
		'heading' => false,
		'fields'  => array() )
);

/* Category Layout C2 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout C2', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'section_layout_c2',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_cat_c2.png' ) ) . '"/>' . esc_html__( 'Layout C2', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for categories displayed in Layout C2', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_cat_c2_meta',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display post count', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the number of posts', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_cat_c2_meta' ),
			),

			array(
				'id'        => 'layout_cat_c2_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout C2', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_cat_c2_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_cat_c2_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout C2 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_cat_c2_img_size_custom' ),
				'required'  => array( 'layout_cat_c2_img_size_ratio', '=', 'custom' ),
			),

		) ) );

/* Layout C3 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout C3', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'section_layout_c3',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_cat_c3.png' ) ) . '"/>' . esc_html__( 'Layout C3', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for categories displayed in Layout C3', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_cat_c3_meta',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display post count', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the number of posts', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_cat_c3_meta' ),
			),

			array(
				'id'        => 'layout_cat_c3_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout C3', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_cat_c3_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_cat_c3_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout C3 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_cat_c3_img_size_custom' ),
				'required'  => array( 'layout_cat_c3_img_size_ratio', '=', 'custom' ),
			),

		) ) );

/* Layout C4 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout C4', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'section_layout_c4',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_cat_c4.png' ) ) . '"/>' . esc_html__( 'Layout C4', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for categories displayed in Layout C4', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_cat_c4_meta',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display post count', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the number of posts', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_cat_c4_meta' ),
			),

			array(
				'id'        => 'layout_cat_c4_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout C4', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_cat_c4_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_cat_c4_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout C4 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_cat_c4_img_size_custom' ),
				'required'  => array( 'layout_cat_c4_img_size_ratio', '=', 'custom' ),
			),

		) ) );

/* Layout D2 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout D2', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'section_layout_d2',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_cat_d2.png' ) ) . '"/>' . esc_html__( 'Layout D2', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for categories displayed in Layout D2', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_cat_d2_meta',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display post count', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the number of posts', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_cat_d2_meta' ),
			),

			array(
				'id'        => 'layout_cat_d2_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout D2', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_cat_d2_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_cat_d2_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout D2 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_cat_d2_img_size_custom' ),
				'required'  => array( 'layout_cat_d2_img_size_ratio', '=', 'custom' ),
			),

		) ) );

/* Layout D3 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout D3', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'section_layout_d3',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_cat_d3.png' ) ) . '"/>' . esc_html__( 'Layout D3', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for categories displayed in Layout D3', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_cat_d3_meta',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display post count', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the number of posts', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_cat_d3_meta' ),
			),

			array(
				'id'        => 'layout_cat_d3_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout D3', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_cat_d3_img_size_ratio' ),
			),

			array(
				'id'        => 'layout_cat_d3_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout D3 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_cat_d3_img_size_custom' ),
				'required'  => array( 'layout_cat_d3_img_size_ratio', '=', 'custom' ),
			),
		) ) );

/* Layout D4 */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout D4', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'section_layout_d4',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_cat_d4.png' ) ) . '"/>' . esc_html__( 'Layout D4', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for categories displayed in Layout D4', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_cat_d4_meta',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display post count', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the number of posts', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_cat_d4_meta' ),
			),

			array(
				'id'        => 'layout_cat_d4_img_size_ratio',
				'type'      => 'radio',
				'title'     => esc_html__( 'Image ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Choose an image ratio for Layout D4', 'trawell' ),
				'options'   => trawell_get_image_ratio_opts(),
				'default'  => trawell_get_default_option( 'layout_cat_d4_img_size_ratio' ), // 3_4
			),

			array(
				'id'        => 'layout_cat_d4_img_size_custom',
				'type'      => 'text',
				'class'     => 'small-text',
				'title'     => esc_html__( 'Image custom ratio', 'trawell' ),
				'subtitle'  => esc_html__( 'Specify your custom ratio for Layout D4 images', 'trawell' ),
				'desc'      => esc_html__( 'Note: put 3:4 or 2:1 or any custom ratio you want', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_cat_d4_img_size_custom' ),
				'required'  => array( 'layout_cat_d4_img_size_ratio', '=', 'custom' ),
			),
		) ) );



/* Layout map */
Redux::setSection( $opt_name, array(
		'icon'       => '',
		'title'      => esc_html__( 'Layout map', 'trawell' ),
		'heading'    => false,
		'subsection' => true,
		'fields'     => array(
			array(
				'id'       => 'section_layout_map',
				'type'     => 'trawell_section',
				'title'    => '<img src="' . esc_url( get_parent_theme_file_uri( '/assets/img/admin/layout_cat_map.png' ) ) . '"/>' . esc_html__( 'Layout map', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for categories displayed in Map Layout', 'trawell' ),
				'indent'   => false,
			),

			array(
				'id'       => 'layout_cat_map_meta',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display post count', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the number of posts', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_cat_map_meta' ),
			),
			
			
			array(
				'id'       => 'layout_cat_map_excerpt',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category description', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the category description', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_cat_map_excerpt' ),
			),
			
			array(
				'id'       => 'layout_cat_map_excerpt_limit',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Description limit', 'trawell' ),
				'subtitle' => esc_html__( 'Specify your description limit', 'trawell' ),
				'desc'     => esc_html__( 'Note: Value represents number of characters', 'trawell' ),
				'default'  => trawell_get_default_option( 'layout_cat_map_excerpt_limit' ),
				'validate' => 'numeric',
				'required' => array( 'layout_cat_map_excerpt', '=', true ),
			),

		) ) );


/* Single Post */
Redux::setSection( $opt_name, array(
		'icon'   => 'el-icon-pencil',
		'title'  => esc_html__( 'Single Post', 'trawell' ),
		'desc'   => esc_html__( 'Manage the options for your single posts', 'trawell' ),
		'fields' => array(

			array(
				'id'       => 'single_layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Single post default layout', 'trawell' ),
				'subtitle' => esc_html__( 'Note: You can override this option for each particular post', 'trawell' ),
				'options'  => trawell_get_single_layouts( false ),
				'default'  => trawell_get_default_option( 'single_layout' ),
			),

			array(
				'id'       => 'single_map',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display map instead of the featured image', 'trawell' ),
				'subtitle' => esc_html__( 'If you check this option, the post which has a location will display the map instead of featured image', 'trawell' ),
				'default'  => trawell_get_default_option( 'single_map' ),
			),

			array(
				'id'      => 'single_sidebar_position',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Display sidebar', 'trawell' ),
				'desc'    => esc_html__( 'Note: You can override this option for each particular post', 'trawell' ),
				'options' => trawell_get_sidebar_layouts( false ),
				'default' => trawell_get_default_option( 'single_sidebar_position' ),
			),

			array(
				'id'       => 'single_sidebar_standard',
				'type'     => 'select',
				'title'    => esc_html__( 'Single post standard sidebar', 'trawell' ),
				'subtitle' => esc_html__( 'Choose the single post standard sidebar', 'trawell' ),
				'options'  => trawell_get_sidebars_list(),
				'default'  => trawell_get_default_option( 'single_sidebar_standard' ),
				'required' => array( 'single_sidebar_position', '!=', 'none' ),
			),

			array(
				'id'       => 'single_sidebar_sticky',
				'type'     => 'select',
				'title'    => esc_html__( 'Single post sticky sidebar', 'trawell' ),
				'subtitle' => esc_html__( 'Choose the single post sticky sidebar', 'trawell' ),
				'options'  => trawell_get_sidebars_list(),
				'default'  => trawell_get_default_option( 'single_sidebar_sticky' ),
				'required' => array( 'single_sidebar_position', '!=', 'none' ),
			),

			array(
				'id'       => 'single_category',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display category link', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post category link', 'trawell' ),
				'default'  => trawell_get_default_option( 'single_category' ),
			),

			array(
				'id'       => 'single_icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display format icon', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post format icon for non-standard posts (i.e video, audio, gallery...)', 'trawell' ),
				'default'  => trawell_get_default_option( 'single_icon' ),
			),

			array(
				'id'       => 'single_fimg',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display the featured image', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the featured image', 'trawell' ),
				'default'  => trawell_get_default_option( 'single_fimg' ),
			),

			array(
				'id'       => 'single_fimg_cap',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display the featured image caption', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the featured image caption', 'trawell' ),
				'default'  => trawell_get_default_option( 'single_fimg_cap' ),
				'required' => array( 'single_fimg', '=', true ),
			),
			
			array(
				'id'       => 'single_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Meta data', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the post meta data that you want to display', 'trawell' ),
				'options'  => trawell_get_meta_opts(),
				'default'  => trawell_get_meta_opts( trawell_get_default_option( 'single_meta' ) ),
			),

			array(
				'id'       => 'single_headline',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display headline (excerpt)', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post excerpt at the beginning of the post', 'trawell' ),
				'default'  => trawell_get_default_option( 'single_headline' ),
			),


			array(
				'id'       => 'single_tags',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display tags', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the post tags', 'trawell' ),
				'default'  => trawell_get_default_option( 'single_tags' ),
			),

			array(
				'id'       => 'single_author',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display author area', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the author area', 'trawell' ),
				'default'  => trawell_get_default_option( 'single_author' ),
			),
			
			array(
				'id'       => 'single_sidebar_mini_show',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display mini sidebar ', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the mini sidebar', 'trawell' ),
				'default'  => trawell_get_default_option( 'single_sidebar_mini_show' ),
			),

			array(
				'id'       => 'single_sidebar_mini_meta',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Mini sidebar items', 'trawell' ),
				'subtitle' => esc_html__( 'Check and re-order the items that you want to display inside the mini sidebar', 'trawell' ),
				'options'  => trawell_get_sidebar_mini_meta_opts(),
				'default'  => trawell_get_sidebar_mini_meta_opts( trawell_get_default_option( 'single_sidebar_mini_meta' ) ),
				'required' => array( 'single_sidebar_mini_show', '=', true ),
			),

			array(
				'id'       => 'single_related',
				'type'     => 'trawell_section',
				'indent'   => false,
				'title'    => esc_html__( 'Related posts', 'trawell' ),
				'subtitle' => esc_html__( 'Manage the options for "related posts" section below the post content', 'trawell' ),
			),

			array(
				'id'       => 'single_related',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display "related" posts', 'trawell' ),
				'subtitle' => esc_html__( 'Choose if you want to display related posts', 'trawell' ),
				'default'  => trawell_get_default_option( 'single_related' ),
			),

			array(
				'id'       => 'single_related_using',
				'type'     => 'rwdo',
				'title'    => esc_html__( 'Pull related posts by using', 'trawell' ),
				'subtitle' => esc_html__( 'Choose whether you want to use the built-in related posts algorithm or one of supported plugins', 'trawell' ),
				'options'  => trawell_get_related_posts_plugins(),
				'default'  => trawell_get_default_option( 'single_related_using' ),
			),

			array(
				'id'       => 'related_limit',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Max number of related posts', 'trawell' ),
				'default'  => trawell_get_default_option( 'related_limit' ),
				'validate' => 'numeric',
				'required' => array(
					array( 'single_related', '=', true ),
					array( 'single_related_using', '=', 'default' ),
				),
			),

			array(
				'id'       => 'related_type',
				'type'     => 'radio',
				'title'    => esc_html__( 'Related area chooses from posts', 'trawell' ),
				'options'  => array(
					'cat'         => esc_html__( 'Located in the same category', 'trawell' ),
					'tag'         => esc_html__( 'Tagged with at least one same tag', 'trawell' ),
					'cat_or_tag'  => esc_html__( 'Located in the same category OR tagged with a same tag', 'trawell' ),
					'cat_and_tag' => esc_html__( 'Located in the same category AND tagged with a same tag', 'trawell' ),
					'author'      => esc_html__( 'By the same author', 'trawell' ),
					'0'           => esc_html__( 'All posts', 'trawell' ),
				),
				'default'  => trawell_get_default_option( 'related_type' ),
				'required' => array(
					array( 'single_related', '=', true ),
					array( 'single_related_using', '=', 'default' ),
				),
			),

			array(
				'id'       => 'related_order',
				'type'     => 'radio',
				'title'    => esc_html__( 'Related posts are ordered by', 'trawell' ),
				'options'  => trawell_get_post_order_opts(),
				'default'  => trawell_get_default_option( 'related_order' ),
				'required' => array(
					array( 'single_related', '=', true ),
					array( 'single_related_using', '=', 'default' ),
				),
			),

			array(
				'id'       => 'related_time',
				'type'     => 'radio',
				'title'    => esc_html__( 'Related posts are not older than', 'trawell' ),
				'options'  => trawell_get_time_diff_opts(),
				'default'  => trawell_get_default_option( 'related_time' ),
				'required' => array(
					array( 'single_related', '=', true ),
					array( 'single_related_using', '=', 'default' ),
				) ),
		),
	)
);


/* Page */
Redux::setSection( $opt_name, array(
		'icon'   => 'el-icon-file-edit',
		'title'  => esc_html__( 'Page', 'trawell' ),
		'desc'   => esc_html__( 'Manage the options for your pages', 'trawell' ),
		'fields' => array(

			array(
				'id'       => 'page_layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Page default layout', 'trawell' ),
				'subtitle' => esc_html__( 'Note: You can override this option for each particular page', 'trawell' ),
				'options'  => trawell_get_page_layouts( false ),
				'default'  => trawell_get_default_option( 'page_layout' ),
			),

			array(
				'id'      => 'page_sidebar_position',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Display sidebar', 'trawell' ),
				'desc'    => esc_html__( 'Note: You can override this option for each particular page', 'trawell' ),
				'options' => trawell_get_sidebar_layouts(),
				'default' => trawell_get_default_option( 'page_sidebar_position' ),
			),

			array(
				'id'       => 'page_sidebar_standard',
				'type'     => 'select',
				'title'    => esc_html__( 'Page standard sidebar', 'trawell' ),
				'subtitle' => esc_html__( 'Choose the page standard sidebar', 'trawell' ),
				'options'  => trawell_get_sidebars_list(),
				'default'  => trawell_get_default_option( 'page_sidebar_standard' ),
				'required' => array( 'page_sidebar_position', '!=', 'none' ),
			),

			array(
				'id'       => 'page_sidebar_sticky',
				'type'     => 'select',
				'title'    => esc_html__( 'Page sticky sidebar', 'trawell' ),
				'subtitle' => esc_html__( 'Choose the page sticky sidebar', 'trawell' ),
				'options'  => trawell_get_sidebars_list(),
				'default'  => trawell_get_default_option( 'page_sidebar_sticky' ),
				'required' => array( 'page_sidebar_position', '!=', 'none' ),
			),

			array(
				'id'       => 'page_fimg',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display the featured image', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the featured image', 'trawell' ),
				'default'  => trawell_get_default_option( 'page_fimg' ),
			),

			array(
				'id'       => 'page_fimg_cap',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display the featured image caption', 'trawell' ),
				'subtitle' => esc_html__( 'Check if you want to display the featured image caption', 'trawell' ),
				'default'  => trawell_get_default_option( 'page_fimg_cap' ),
				'required' => array( 'page_fimg', '=', true ),
			),

		) )
);


/* Categories */
Redux::setSection( $opt_name, array(
		'icon'   => 'el-icon-folder',
		'title'  => esc_html__( 'Category Template', 'trawell' ),
		'desc'   => esc_html__( 'Manage the options for your category template', 'trawell' ),
		'fields' => array(

			array(
				'id'       => 'category_layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Category layout', 'trawell' ),
				'subtitle' => esc_html__( 'Note: You can override this option for each particular category', 'trawell' ),
				'options'  => trawell_get_category_layouts( false ),
				'default'  => trawell_get_default_option( 'category_layout' ),
			),

			array(
				'id'       => 'category_map',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable map with the posts in cover', 'trawell' ),
				'subtitle' => esc_html__( 'If you check this option, the map with all the posts that have a location will be displayed in cover area', 'trawell' ),
				'default'  => trawell_get_default_option( 'category_map' ),
				'required' => array( 'category_layout', '=', 'cover' ),
			),

			array(
				'id'      => 'category_sidebar_position',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Display sidebar', 'trawell' ),
				'desc'    => esc_html__( 'Note: You can override this option for each particular category', 'trawell' ),
				'options' => trawell_get_sidebar_layouts(),
				'default' => trawell_get_default_option( 'category_sidebar_position' ),
			),

			array(
				'id'       => 'category_sidebar_standard',
				'type'     => 'select',
				'title'    => esc_html__( 'Category standard sidebar', 'trawell' ),
				'subtitle' => esc_html__( 'Choose the category standard sidebar', 'trawell' ),
				'options'  => trawell_get_sidebars_list(),
				'default'  => trawell_get_default_option( 'category_sidebar_standard' ),
				'required' => array( 'category_sidebar_position', '!=', 'none' ),
			),

			array(
				'id'       => 'category_sidebar_sticky',
				'type'     => 'select',
				'title'    => esc_html__( 'Category sticky sidebar', 'trawell' ),
				'subtitle' => esc_html__( 'Choose the category sticky sidebar', 'trawell' ),
				'options'  => trawell_get_sidebars_list(),
				'default'  => trawell_get_default_option( 'category_sidebar_sticky' ),
				'required' => array( 'category_sidebar_position', '!=', 'none' ),
			),

			array(
				'id'       => 'category_posts_layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Posts layout', 'trawell' ),
				'subtitle' => esc_html__( 'Choose a default posts layout for the category template', 'trawell' ),
				'options'  => trawell_get_posts_layouts( array( 'inherit', 'map' ) ),
				'default'  => trawell_get_default_option( 'category_posts_layout' ),
				'required' => array( 'category_sidebar_position', '=', 'none' ),
			),

			array(
				'id'       => 'category_posts_layout_sid',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Posts layout', 'trawell' ),
				'subtitle' => esc_html__( 'Choose a default posts layout for the category template', 'trawell' ),
				'options'  => trawell_get_posts_layouts( array( 'inherit', 'map', 'b3', 'c4', 'd4', 'e4' ) ),
				'default'  => trawell_get_default_option( 'category_posts_layout' ),
				'required' => array( 'category_sidebar_position', '!=', 'none' ),
			),

			array(
				'id'       => 'category_ppp',
				'type'     => 'radio',
				'title'    => esc_html__( 'Posts per page', 'trawell' ),
				'subtitle' => esc_html__( 'Choose how many posts per page you want to display', 'trawell' ),
				'options'  => array(
					'inherit' => wp_kses( sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', 'trawell' ), admin_url( 'options-reading.php' ) ), wp_kses_allowed_html( 'post' ) ),
					'custom'  => esc_html__( 'Custom number', 'trawell' ),
				),
				'default'  => trawell_get_default_option( 'category_ppp' ),
			),

			array(
				'id'       => 'category_ppp_num',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Number of posts per page', 'trawell' ),
				'default'  => trawell_get_default_option( 'category_ppp_num' ),
				'required' => array( 'category_ppp', '=', 'custom' ),
				'validate' => 'numeric',
			),

			array(
				'id'       => 'category_pag',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Pagination', 'trawell' ),
				'subtitle' => esc_html__( 'Choose a pagination type for the category template', 'trawell' ),
				'desc'     => esc_html__( 'Note: You can override this option for each category separately', 'trawell' ),
				'options'  => trawell_get_pagination_layouts(),
				'default'  => trawell_get_default_option( 'category_pag' ),
			),
		) )
);

/* Archive */
Redux::setSection( $opt_name, array(
		'icon'   => 'el-icon-folder-open',
		'title'  => esc_html__( 'Archive Template', 'trawell' ),
		'desc'   => esc_html__( 'Manage the options for your archive templates (tag archives, search archives, latest posts index, etc...)', 'trawell' ),
		'fields' => array(

			array(
				'id'      => 'archive_sidebar_position',
				'type'    => 'image_select',
				'title'   => esc_html__( 'Display sidebar', 'trawell' ),
				'options' => trawell_get_sidebar_layouts(),
				'default' => trawell_get_default_option( 'archive_sidebar_position' ),
			),

			array(
				'id'       => 'archive_sidebar_standard',
				'type'     => 'select',
				'title'    => esc_html__( 'Archive standard sidebar', 'trawell' ),
				'subtitle' => esc_html__( 'Choose a standard sidebar', 'trawell' ),
				'options'  => trawell_get_sidebars_list(),
				'default'  => trawell_get_default_option( 'archive_sidebar_standard' ),
				'required' => array( 'archive_sidebar_position', '!=', 'none' ),
			),

			array(
				'id'       => 'archive_sidebar_sticky',
				'type'     => 'select',
				'title'    => esc_html__( 'Archive sticky sidebar', 'trawell' ),
				'subtitle' => esc_html__( 'Choose a sticky sidebar', 'trawell' ),
				'options'  => trawell_get_sidebars_list(),
				'default'  => trawell_get_default_option( 'archive_sidebar_sticky' ),
				'required' => array( 'archive_sidebar_position', '!=', 'none' ),
			),

			array(
				'id'       => 'archive_posts_layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Posts layout', 'trawell' ),
				'subtitle' => esc_html__( 'Choose a post layout for your archive templates', 'trawell' ),
				'options'  => trawell_get_posts_layouts( array( 'inherit', 'map' ) ),
				'default'  => trawell_get_default_option( 'archive_posts_layout' ),
				'required' => array( 'archive_sidebar_position', '=', 'none' ),
			),


			array(
				'id'       => 'archive_posts_layout_sid',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Posts layout', 'trawell' ),
				'subtitle' => esc_html__( 'Choose a post layout for your archive templates', 'trawell' ),
				'options'  => trawell_get_posts_layouts( array( 'inherit', 'map', 'b3', 'c4', 'd4', 'e4' ) ),
				'default'  => trawell_get_default_option( 'archive_posts_layout' ),
				'required' => array( 'archive_sidebar_position', '!=', 'none' ),
			),

			array(
				'id'       => 'archive_ppp',
				'type'     => 'radio',
				'title'    => esc_html__( 'Posts per page', 'trawell' ),
				'subtitle' => esc_html__( 'Choose how many posts per page you want to display', 'trawell' ),
				'options'  => array(
					'inherit' => wp_kses( sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', 'trawell' ), admin_url( 'options-reading.php' ) ), wp_kses_allowed_html( 'post' ) ),
					'custom'  => esc_html__( 'Custom number', 'trawell' ),
				),
				'default'  => trawell_get_default_option( 'archive_ppp' ),
			),

			array(
				'id'       => 'archive_ppp_num',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Number of posts per page', 'trawell' ),
				'default'  => trawell_get_default_option( 'archive_ppp_num' ),
				'required' => array( 'archive_ppp', '=', 'custom' ),
				'validate' => 'numeric',
			),

			array(
				'id'       => 'archive_pag',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Pagination', 'trawell' ),
				'subtitle' => esc_html__( 'Choose a pagination type for your archive template', 'trawell' ),
				'options'  => trawell_get_pagination_layouts(),
				'default'  => trawell_get_default_option( 'archive_pag' ),
			),

		) )
);

/* Typography */
Redux::setSection( $opt_name, array(
		'icon'   => 'el-icon-fontsize',
		'title'  => esc_html__( 'Typography', 'trawell' ),
		'desc'   => esc_html__( 'Manage your fonts and typography settings', 'trawell' ),
		'fields' => array(

			array(
				'id'          => 'main_font',
				'type'        => 'typography',
				'title'       => esc_html__( 'Main text font', 'trawell' ),
				'google'      => true,
				'font-backup' => false,
				'font-size'   => false,
				'color'       => false,
				'line-height' => false,
				'text-align'  => false,
				'units'       => 'px',
				'subtitle'    => esc_html__( 'This is your main font, used for standard text', 'trawell' ),
				'default'     => trawell_get_default_option( 'main_font' ),
				'preview'     => array(
					'always_display' => true,
					'font-size'      => '16px',
					'line-height'    => '26px',
					'text'           => 'This is a font used for your main content on the website. Here at Meks, we believe that readability is a very important part of any WordPress theme. This is an example of how a simple paragraph of text will look like on your website.',
				),
			),

			array(
				'id'          => 'h_font',
				'type'        => 'typography',
				'title'       => esc_html__( 'Headings font', 'trawell' ),
				'google'      => true,
				'font-backup' => false,
				'font-size'   => false,
				'color'       => false,
				'line-height' => false,
				'text-align'  => false,
				'units'       => 'px',
				'subtitle'    => esc_html__( 'This is the font used for titles and headings', 'trawell' ),
				'default'     => trawell_get_default_option( 'h_font' ),
				'preview'     => array(
					'always_display' => true,
					'font-size'      => '35px',
					'line-height'    => '50px',
					'text'           => 'There is no good blog without great readability',
				),

			),

			array(
				'id'          => 'nav_font',
				'type'        => 'typography',
				'title'       => esc_html__( 'Navigation font', 'trawell' ),
				'google'      => true,
				'font-backup' => false,
				'font-size'   => false,
				'color'       => false,
				'line-height' => false,
				'text-align'  => false,
				'units'       => 'px',
				'subtitle'    => esc_html__( 'This is the font used for main website navigation', 'trawell' ),
				'default'     => trawell_get_default_option( 'nav_font' ),
				'preview'     => array(
					'always_display' => true,
					'font-size'      => '11px',
					'text'           => 'HOME &nbsp;&nbsp;ABOUT &nbsp;&nbsp;BLOG &nbsp;&nbsp;CONTACT',
				),

			),

			array(
				'id'       => 'finetune',
				'type'     => 'trawell_section',
				'indent'   => false,
				'title'    => esc_html__( 'Fine-tune typography', 'trawell' ),
				'subtitle' => esc_html__( 'Advanced options to adjust font sizes', 'trawell' ),
			),


			array(
				'id'       => 'font_size_p',
				'type'     => 'spinner',
				'title'    => esc_html__( 'Main text font size', 'trawell' ),
				'subtitle' => esc_html__( 'This is your default text font size', 'trawell' ),
				'default'  => trawell_get_default_option( 'font_size_p' ),
				'min'      => '12',
				'step'     => '1',
				'max'      => '22',
			),

			array(
				'id'       => 'font_size_nav',
				'type'     => 'spinner',
				'title'    => esc_html__( 'Navigation font size', 'trawell' ),
				'subtitle' => esc_html__( 'Applies to the main website navigation', 'trawell' ),
				'default'  => trawell_get_default_option( 'font_size_nav' ),
				'min'      => '10',
				'step'     => '1',
				'max'      => '20',
			),

			array(
				'id'       => 'font_size_section_title',
				'type'     => 'spinner',
				'title'    => esc_html__( 'Section title font size', 'trawell' ),
				'subtitle' => esc_html__( 'Applies to section titles', 'trawell' ),
				'default'  => trawell_get_default_option( 'font_size_section_title' ),
				'min'      => '14',
				'step'     => '1',
				'max'      => '30',
			),

			array(
				'id'       => 'font_size_widget_title',
				'type'     => 'spinner',
				'title'    => esc_html__( 'Widget title font size', 'trawell' ),
				'subtitle' => esc_html__( 'Applies to the main heading elements such as page/post titles etc...', 'trawell' ),
				'default'  => trawell_get_default_option( 'font_size_widget_title' ),
				'min'      => '14',
				'step'     => '1',
				'max'      => '22',
			),

			array(
				'id'       => 'font_size_small',
				'type'     => 'spinner',
				'title'    => esc_html__( 'Small text font size ', 'trawell' ),
				'subtitle' => esc_html__( 'Applies to meta items like author link, comments link, date, etc...', 'trawell' ),
				'default'  => trawell_get_default_option( 'font_size_small' ),
				'min'      => '10',
				'step'     => '1',
				'max'      => '18',
			),

			array(
				'id'       => 'font_size_cover',
				'type'     => 'spinner',
				'title'    => esc_html__( 'Cover font size', 'trawell' ),
				'subtitle' => esc_html__( 'Applies to cover titles', 'trawell' ),
				'default'  => trawell_get_default_option( 'font_size_cover' ),
				'min'      => '40',
				'step'     => '1',
				'max'      => '80',
			),

			array(
				'id'       => 'font_size_h1',
				'type'     => 'spinner',
				'title'    => esc_html__( 'H1 font size', 'trawell' ),
				'subtitle' => esc_html__( 'Applies to H1 elements and single post/page titles', 'trawell' ),
				'default'  => trawell_get_default_option( 'font_size_h1' ),
				'min'      => '25',
				'step'     => '1',
				'max'      => '50',
			),

			array(
				'id'       => 'font_size_h2',
				'type'     => 'spinner',
				'title'    => esc_html__( 'H2 font size', 'trawell' ),
				'subtitle' => esc_html__( 'Applies to H2 elements', 'trawell' ),
				'default'  => trawell_get_default_option( 'font_size_h2' ),
				'min'      => '20',
				'step'     => '1',
				'max'      => '40',
			),

			array(
				'id'       => 'font_size_h3',
				'type'     => 'spinner',
				'title'    => esc_html__( 'H3 font size', 'trawell' ),
				'subtitle' => esc_html__( 'Applies to H3 elements', 'trawell' ),
				'default'  => trawell_get_default_option( 'font_size_h3' ),
				'min'      => '16',
				'step'     => '1',
				'max'      => '32',
			),

			array(
				'id'       => 'font_size_h4',
				'type'     => 'spinner',
				'title'    => esc_html__( 'H4 font size', 'trawell' ),
				'subtitle' => esc_html__( 'Applies to H4 elements', 'trawell' ),
				'default'  => trawell_get_default_option( 'font_size_h4' ),
				'min'      => '14',
				'step'     => '1',
				'max'      => '30',
			),

			array(
				'id'       => 'font_size_h5',
				'type'     => 'spinner',
				'title'    => esc_html__( 'H5 font size', 'trawell' ),
				'subtitle' => esc_html__( 'Applies to H5 elements and widget titles', 'trawell' ),
				'default'  => trawell_get_default_option( 'font_size_h5' ),
				'min'      => '14',
				'step'     => '1',
				'max'      => '24',
			),

			array(
				'id'       => 'font_size_h6',
				'type'     => 'spinner',
				'title'    => esc_html__( 'H6 font size', 'trawell' ),
				'subtitle' => esc_html__( 'Applies to H6 elements', 'trawell' ),
				'default'  => trawell_get_default_option( 'font_size_h6' ),
				'min'      => '14',
				'step'     => '1',
				'max'      => '22',
			),

			array(
				'id'       => 'uppercase',
				'type'     => 'checkbox',
				'multi'    => true,
				'title'    => esc_html__( 'Uppercase text', 'trawell' ),
				'subtitle' => esc_html__( 'Select the items that you want to have displayed with all CAPITAL LETTERS', 'trawell' ),
				'options'  => array(
					'.trawell-header .site-title a'                                                       => esc_html__( 'Site title', 'trawell' ),
					'.site-description'                                                 => esc_html__( 'Site description', 'trawell' ),
					'.trawell-header a'                                             => esc_html__( 'Main navigation', 'trawell' ),
					'.trawell-top-bar' =>  esc_html__( 'Top bar navigation', 'trawell' ),
					'.widget-title'                        => esc_html__( 'Widget title', 'trawell' ),
					'.section-title' => esc_html__( 'Sub-section title', 'trawell' ),
					'.entry-title, .archive-title' => esc_html__( 'Post/page/archive titles', 'trawell' ),
				),
				'default'  => trawell_get_default_option( 'uppercase' ),
			),

		) )
);

/* Misc. */
Redux::setSection( $opt_name, array(
		'icon'   => 'el-icon-wrench',
		'title'  => esc_html__( 'Misc.', 'trawell' ),
		'desc'   => esc_html__( 'Manage the miscellaneous options', 'trawell' ),
		'fields' => array(

			array(
				'id'       => 'cover_animate',
				'type'     => 'switch',
				'title'    => esc_html__( 'Animate the cover image', 'trawell' ),
				'subtitle' => esc_html__( 'Enable this option for a slight image animation in cover area', 'trawell' ),
				'default'  => trawell_get_default_option( 'cover_animate' ),
			),

			array(
				'id'       => 'social_share',
				'type'     => 'sortable',
				'mode'     => 'checkbox',
				'title'    => esc_html__( 'Social sharing', 'trawell' ),
				'subtitle' => esc_html__( 'Select social networks that you want to use for sharing posts', 'trawell' ),
				'options'  => array(
					'facebook'    => esc_html__( 'Facebook', 'trawell' ),
					'twitter'     => esc_html__( 'Twitter', 'trawell' ),
					'reddit'      => esc_html__( 'Reddit', 'trawell' ),
					'pinterest'   => esc_html__( 'Pinterest', 'trawell' ),
					'email'       => esc_html__( 'Email', 'trawell' ),
					'gplus'       => esc_html__( 'Google+', 'trawell' ),
					'linkedin'    => esc_html__( 'LinkedIN', 'trawell' ),
					'stumbleupon' => esc_html__( 'StumbleUpon', 'trawell' ),
					'vk'          => esc_html__( 'vKontakte', 'trawell' ),
					'whatsapp'    => esc_html__( 'WhatsApp', 'trawell' ),
				),
				'default'  => trawell_get_default_option( 'social_share' ),
			),

			array(
				'id'       => 'default_fimg',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Default featured image', 'trawell' ),
				'subtitle' => esc_html__( 'Upload your default featured image/placeholder. It will be displayed for the posts that do not have a featured image set.', 'trawell' ),
				'default'  => trawell_get_default_option( 'default_fimg' ),
			),

			array(
				'id'       => '404_fimg',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( '404 cover image', 'trawell' ),
				'subtitle' => esc_html__( 'Upload your image that will be displayed on 404 (page not found) page', 'trawell' ),
				'default'  => trawell_get_default_option( '404_fimg' ),
			),

			array(
				'id'        => 'breadcrumbs',
				'type'      => 'rwdo',
				'title'     => esc_html__( 'Enable breadcrumbs support', 'trawell' ),
				'subtitle'  => esc_html__( 'Select a plugin you are using for breadcrumbs', 'trawell' ),
				'options'   => trawell_get_breadcrumbs_options(),
				'default'   => 'none',
			),

			array(
				'id'       => 'rtl_mode',
				'type'     => 'switch',
				'title'    => esc_html__( 'RTL mode (right to left)', 'trawell' ),
				'subtitle' => esc_html__( 'Enable this option if the website is using right to left writing/reading', 'trawell' ),
				'default'  => trawell_get_default_option( 'rtl_mode' ),
			),

			array(
				'id'       => 'rtl_lang_skip',
				'type'     => 'text',
				'title'    => esc_html__( 'Skip RTL for specific language(s)', 'trawell' ),
				'subtitle' => esc_html__( 'Paste one or more specific WordPress language <a href="http://wpcentral.io/internationalization/" target="_blank">locale codes</a> to exclude it from the RTL mode', 'trawell' ),
				'desc'     => esc_html__( 'i.e. If you are using Arabic and English versions on the same WordPress installation you should put "en_US" in this field and its version will not be displayed as RTL. Note: To exclude multiple languages, separate by comma: en_US, de_DE', 'trawell' ),
				'default'  => trawell_get_default_option( 'rtl_lang_skip' ),
				'required' => array( 'rtl_mode', '=', true ),
			),

			array(
				'id'       => 'more_string',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'More string', 'trawell' ),
				'subtitle' => esc_html__( 'Specify your "more" string to append after the limited post excerpts', 'trawell' ),
				'default'  => trawell_get_default_option( 'more_string' ),
				'validate' => 'no_html',
			),

			array(
				'id'       => 'words_read_per_minute',
				'type'     => 'text',
				'class'    => 'small-text',
				'title'    => esc_html__( 'Words to read per minute', 'trawell' ),
				'subtitle' => esc_html__( 'Use this option to set the number of words your visitors read per minute, in order to fine-tune the calculation of the post reading time meta data', 'trawell' ),
				'validate' => 'numeric',
				'default'  => trawell_get_default_option( 'words_read_per_minute' ),
			),

			array(
				'id' => 'editor_style',
				'type' => 'switch',
				'title' => esc_html__( 'Enable admin editor styling', 'trawell' ),
				'subtitle' => esc_html__( 'If this option is checked, selected fonts and colors from Theme Options will be also used in post/page content editor in admin panel', 'trawell' ),
				'default' => trawell_get_default_option( 'editor_style' )
			),
			
			array(
				'id' => 'on_single_img_popup',
				'type' => 'switch',
				'title' => esc_html__( 'Open content image(s) in pop-up', 'trawell' ),
				'subtitle' => esc_html__( 'Enable this option if you want to open your content image(s) in pop-up', 'trawell' ),
				'desc' => esc_html__( 'Note: Images must be linked to "media file"', 'trawell' ),
				'default' => trawell_get_default_option( 'on_single_img_popup' )
			),
		),
	)
);


/* Ads */
Redux::setSection( $opt_name , array(
		'icon'      => 'el-icon-usd',
		'title'     => esc_html__( 'Ads', 'trawell' ),
		'desc'     => esc_html__( 'Use these options to fill your ad slots. Both image and JavaScript related ads are allowed.', 'trawell' ),
		'fields'    => array(

			array(
				'id' => 'ad_archive_top',
				'type' => 'editor',
				'title' => esc_html__( 'Archive top', 'trawell' ),
				'subtitle' => esc_html__( 'This ad will be displayed above the content of your home page and other archive templates (i.e. categories, tags, etc...)', 'trawell' ),
				'default' => trawell_get_default_option( 'ad_archive_top' ),
				'desc' => esc_html__( 'Note: If you want to paste an HTML or a JavaScript code, use "text" mode in editor', 'trawell' ),
				'args'   => array(
					'textarea_rows'    => 5,
					'default_editor' => 'html'
				)
			),

			array(
				'id' => 'ad_archive_bottom',
				'type' => 'editor',
				'title' => esc_html__( 'Archive bottom', 'trawell' ),
				'subtitle' => esc_html__( 'This ad will be displayed below the content of your home page and other archive templates (i.e. categories, tags, etc...)', 'trawell' ),
				'default' => trawell_get_default_option( 'ad_archive_bottom' ),
				'desc' => esc_html__( 'Note: If you want to paste an HTML or a JavaScript code, use "text" mode in editor', 'trawell' ),
				'args'   => array(
					'textarea_rows'    => 5,
					'default_editor' => 'html'
				)
			),

			array(
				'id' => 'ad_single_top',
				'type' => 'editor',
				'title' => esc_html__( 'Single top', 'trawell' ),
				'subtitle' => esc_html__( 'This ad will be displayed above the content of your single posts and single pages', 'trawell' ),
				'default' => trawell_get_default_option( 'ad_single_top' ),
				'desc' => esc_html__( 'Note: If you want to paste an HTML or a JavaScript code, use "text" mode in editor', 'trawell' ),
				'args'   => array(
					'textarea_rows'    => 5,
					'default_editor' => 'html'
				)
			),

			array(
				'id' => 'ad_single_bottom',
				'type' => 'editor',
				'title' => esc_html__( 'Single bottom', 'trawell' ),
				'subtitle' => esc_html__( 'This ad will be displayed below the content of your single posts and single pages', 'trawell' ),
				'default' => trawell_get_default_option( 'ad_single_bottom' ),
				'desc' => esc_html__( 'Note: If you want to paste an HTML or a JavaScript code, use "text" mode in editor', 'trawell' ),
				'args'   => array(
					'textarea_rows'    => 5,
					'default_editor' => 'html'
				)
			),

		)
	)
);


/* WooCommerce */

if ( trawell_is_woocommerce_active() ) {

	Redux::setSection( $opt_name, array(
			'icon'   => 'el-icon-shopping-cart',
			'title'  => esc_html__( 'WooCommerce', 'trawell' ),
			'desc'   => esc_html__( 'Manage the options for WooCommerce pages', 'trawell' ),
			'fields' => array(
				array(
					'id'       => 'woocommerce_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'WooCommerce sidebar layout', 'trawell' ),
					'subtitle' => esc_html__( 'Choose a sidebar layout for WooCommerce pages', 'trawell' ),
					'options'  => trawell_get_sidebar_layouts(),
					'default'  => trawell_get_default_option( 'woocommerce_sidebar_position' ),
				),

				array(
					'id'       => 'woocommerce_sidebar_standard',
					'type'     => 'select',
					'title'    => esc_html__( 'WooCommerce standard sidebar', 'trawell' ),
					'subtitle' => esc_html__( 'Choose a standard sidebar for WooCommerce pages', 'trawell' ),
					'options'  => trawell_get_sidebars_list(),
					'default'  => trawell_get_default_option( 'woocommerce_sidebar_standard' ),
					'required' => array( 'woocommerce_sidebar_position', '!=', 'none' ),
				),

				array(
					'id'       => 'woocommerce_sidebar_sticky',
					'type'     => 'select',
					'title'    => esc_html__( 'WooCommerce sticky sidebar', 'trawell' ),
					'subtitle' => esc_html__( 'Choose a sticky sidebar for WooCommerce pages', 'trawell' ),
					'options'  => trawell_get_sidebars_list(),
					'default'  => trawell_get_default_option( 'woocommerce_sidebar_sticky' ),
					'required' => array( 'woocommerce_sidebar_position', '!=', 'none' ),
				),

				array(
					'id'       => 'woocommerce_cart_force',
					'type'     => 'switch',
					'title'    => esc_html__( 'Always display Cart icon', 'trawell' ),
					'subtitle' => esc_html__( 'If you check this option, Cart icon will be always visible on WooCommerce pages, even if it is not selected globally in Header options', 'trawell' ),
					'default' => trawell_get_default_option( 'woocommerce_cart_force' ),
				),

			) )
	);
}

Redux::setSection( $opt_name, array(
		'type' => 'divide',
		'id'   => 'trawell-divide',
	) );

/* Translation Options */

$translate_options[] = array(
	'id'      => 'enable_translate',
	'type'    => 'switch',
	'switch'  => true,
	'title'   => esc_html__( 'Enable theme translation?', 'trawell' ),
	'default' => trawell_get_default_option( 'enable_translate' ),
);

$translate_strings = trawell_get_translate_options();

foreach ( $translate_strings as $string_key => $item ) {

	if ( isset( $item['hidden'] ) ) {
		continue;
	}

	$translate_options[] = array(
		'id'       => 'tr_' . $string_key,
		'type'     => 'text',
		'title'    => esc_html( $item['text'] ),
		'subtitle' => isset( $item['desc'] ) ? $item['desc'] : '',
		'default'  => isset( $item['default'] ) ? $item['default'] : '',
	);
}

Redux::setSection( $opt_name, array(
		'icon'   => 'el-icon-globe-alt',
		'title'  => esc_html__( 'Translation', 'trawell' ),
		'desc'   => __( 'Use these settings to quickly translate or change the text in this theme. If you want to remove the text completely instead of modifying it, you can use <strong>"-1"</strong> as a value for a particular field. <br/><br/><strong>Note:</strong> If you are using this theme for a multilingual website, you need to disable these options and use multilanguage plugins (such as WPML) and manual translation with .po and .mo files located inside the "languages" folder.', 'trawell' ),
		'fields' => $translate_options,
	) );

/* Performance */
Redux::setSection( $opt_name, array(
		'icon'   => 'el-icon-dashboard',
		'title'  => esc_html__( 'Performance', 'trawell' ),
		'desc'   => esc_html__( 'Use these options to put your theme to a high speed as well as save your server resources', 'trawell' ),
		'fields' => array(

			array(
				'id'       => 'minify_css',
				'type'     => 'switch',
				'title'    => esc_html__( 'Use minified CSS', 'trawell' ),
				'subtitle' => esc_html__( 'Load all theme css files combined and minified into a single file.', 'trawell' ),
				'default' => trawell_get_default_option( 'minify_css' ),
			),

			array(
				'id'       => 'minify_js',
				'type'     => 'switch',
				'title'    => esc_html__( 'Use minified JS', 'trawell' ),
				'subtitle' => esc_html__( 'Load all theme js files combined and minified into a single file.', 'trawell' ),
				'default' => trawell_get_default_option( 'minify_js' ),
			),

			array(
				'id' => 'disable_img_sizes',
				'type' => 'checkbox',
				'multi' => true,
				'title' => esc_html__( 'Disable additional image sizes', 'trawell' ),
				'subtitle' => esc_html__( 'By default, the theme generates additional size for each of the layouts it offers. You can use this option to avoid creating additional sizes if you are not using a particular layout, in order to save your server space.', 'trawell' ),
				'options' => array(
					'cover' => esc_html__( 'Cover', 'trawell' ),
					'content' => esc_html__( 'Content regular', 'trawell' ),
					'content-wide' => esc_html__( 'Content wide', 'trawell' ),
					'a1' => esc_html__( 'A1', 'trawell' ),
					'a1-sid' => esc_html__( 'A1 with sidebar', 'trawell' ),
					'a2' => esc_html__( 'A2', 'trawell' ),
					'a2-sid' => esc_html__( 'A2 with sidebar', 'trawell' ),
					'a3' => esc_html__( 'A3', 'trawell' ),
					'a3-sid' => esc_html__( 'A3 with sidebar', 'trawell' ),
					'a4' => esc_html__( 'A4', 'trawell' ),
					'a4-sid' => esc_html__( 'A4 with sidebar', 'trawell' ),
					'b1' => esc_html__( 'B1', 'trawell' ),
					'b1-sid' => esc_html__( 'B1 with sidebar', 'trawell' ),
					'b2' => esc_html__( 'B2', 'trawell' ),
					'b2-sid' => esc_html__( 'B2 with sidebar', 'trawell' ),
					'b3' => esc_html__( 'B3', 'trawell' ),
					'c1' => esc_html__( 'C1', 'trawell' ),
					'c1-sid' => esc_html__( 'C1 with sidebar', 'trawell' ),
					'c2' => esc_html__( 'C2', 'trawell' ),
					'c2-sid' => esc_html__( 'C2 with sidebar', 'trawell' ),
					'c3' => esc_html__( 'C3', 'trawell' ),
					'c3-sid' => esc_html__( 'C3 with sidebar', 'trawell' ),
					'c4' => esc_html__( 'C4', 'trawell' ),
					'd1' => esc_html__( 'D1', 'trawell' ),
					'd1-sid' => esc_html__( 'D1 with sidebar', 'trawell' ),
					'd2' => esc_html__( 'D2', 'trawell' ),
					'd2-sid' => esc_html__( 'D2 with sidebar', 'trawell' ),
					'd3' => esc_html__( 'D3', 'trawell' ),
					'd3-sid' => esc_html__( 'D3 with sidebar', 'trawell' ),
					'd4' => esc_html__( 'D4', 'trawell' ),
					'cat-c2' => esc_html__( 'Cat C2', 'trawell' ),
					'cat-c2-sid' => esc_html__( 'Cat C2 with sidebar', 'trawell' ),
					'cat-c3' => esc_html__( 'Cat C3', 'trawell' ),
					'cat-c3-sid' => esc_html__( 'Cat C3 with sidebar', 'trawell' ),
					'cat-c4' => esc_html__( 'Cat C4', 'trawell' ),
					'cat-c4-sid' => esc_html__( 'Cat C4 with sidebar', 'trawell' ),
					'cat-d2' => esc_html__( 'Cat D2', 'trawell' ),
					'cat-d2-sid' => esc_html__( 'Cat D2 with sidebar', 'trawell' ),
					'cat-d3' => esc_html__( 'Cat D3', 'trawell' ),
					'cat-d3-sid' => esc_html__( 'Cat D3 with sidebar', 'trawell' ),
					'cat-d4' => esc_html__( 'Cat D4', 'trawell' ),
					'cat-d4-sid' => esc_html__( 'Cat D4', 'trawell' )
				),

				'default' => trawell_get_default_option( 'disable_img_sizes' )
			),


		) ) );


/* Additional code */

Redux::setSection( $opt_name, array(
		'icon'   => 'el-icon-css',
		'title'  => esc_html__( 'Additional Code', 'trawell' ),
		'desc'   => esc_html__( 'Modify the default styling of the theme by adding a custom CSS or a JavaScript code. Note: These options are for advanced users only, use it with caution.', 'trawell' ),
		'fields' => array(

			array(
				'id'       => 'additional_css',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'Additional CSS', 'trawell' ),
				'subtitle' => esc_html__( 'Use this field to add CSS code and modify the default theme styling', 'trawell' ),
				'mode'     => 'css',
				'theme'    => 'monokai',
				'default' => trawell_get_default_option( 'additional_css' ),
			),

			array(
				'id'       => 'additional_js',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'Additional JavaScript', 'trawell' ),
				'subtitle' => esc_html__( 'Use this field to add JavaScript code', 'trawell' ),
				'desc'     => esc_html__( 'Note: Please use clean execution JavaScript code without "script" tags', 'trawell' ),
				'mode'     => 'javascript',
				'theme'    => 'monokai',
				'default' => trawell_get_default_option( 'additional_js' ),
			),

		) )
);

/* Updater Options */

Redux::setSection( $opt_name, array(
		'icon'   => 'el-icon-time',
		'title'  => esc_html__( 'Updater', 'trawell' ),
		'desc'   => wp_kses_post( sprintf( __( 'Specify your ThemeForest username and API Key to enable the theme update notification. When there is a new version of the theme, it will appear on your <a href="%s">updates screen</a>.', 'trawell' ), admin_url( 'update-core.php' ) )),
		'fields' => array(

			array(
				'id'      => 'theme_update_username',
				'type'    => 'text',
				'title'   => esc_html__( 'Your ThemeForest Username', 'trawell' ),
				'default' => trawell_get_default_option( 'theme_update_username' ),
			),

			array(
				'id'      => 'theme_update_apikey',
				'type'    => 'text',
				'title'   => esc_html__( 'Your ThemeForest API key', 'trawell' ),
				'desc'    => wp_kses_post( sprintf( __( 'Where can I find my %s?', 'trawell' ), '<a href="http://themeforest.net/help/api" target="_blank">API key</a>' )),
				'default' => trawell_get_default_option( 'theme_update_apikey' ),
			),
		) )
);
