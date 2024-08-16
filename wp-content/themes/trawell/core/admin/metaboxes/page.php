<?php
/**
 * Load page metaboxes
 *
 * Callback function for post metaboxes load
 *
 * @since  1.0
 */

if ( !function_exists( 'trawell_load_page_metaboxes' ) ) :
	function trawell_load_page_metaboxes() {
	
		/* Layout metabox */
		add_meta_box(
			'trawell_page_display_layout',
			esc_html__( 'Display Settings', 'trawell' ),
			'trawell_page_display_metabox',
			array('post', 'page'),
			'side',
			'default'
		);
		
		/* Blank template metabox */
		add_meta_box(
			'trawell_blank_page_template',
			esc_html__( 'Display Settings', 'trawell' ),
			'trawell_blank_page_template',
			array('page'),
			'side',
			'default'
		);
	}
endif;


/**
 * Save page meta
 *
 * Callback function to save post meta data
 *
 * @since  1.0
 */

if ( !function_exists( 'trawell_save_page_metaboxes' ) ) :
	function trawell_save_page_metaboxes( $post_id, $post ) {
		
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return;
		
		if ( !isset( $_POST['trawell_post_metabox_nonce'] ) || !wp_verify_nonce( $_POST['trawell_post_metabox_nonce'], 'trawell_post_metabox_save' ) ) {
			return;
		}
		
		if ( ($post->post_type == 'post' || $post->post_type == 'page') && isset( $_POST['trawell'] ) ) {
			$post_type = get_post_type_object( $post->post_type );
			if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
				return $post_id;
			
			$trawell_meta = array();
			
			if( isset( $_POST['trawell']['display_settings'] ) ){
				$trawell_meta['display_settings'] = $_POST['trawell']['display_settings'];
				
				if( $_POST['trawell']['display_settings'] == 'custom' ){
					
					if( isset( $_POST['trawell']['sidebar_position'] ) ){
						$trawell_meta['sidebar_position'] = $_POST['trawell']['sidebar_position'];
					}
					
					if( isset( $_POST['trawell']['sidebar'] ) ){
						$trawell_meta['sidebar'] = $_POST['trawell']['sidebar'];
					}
					
					if( isset( $_POST['trawell']['sticky_sidebar'] ) ){
						$trawell_meta['sticky_sidebar'] = $_POST['trawell']['sticky_sidebar'];
					}
					
					if( isset( $_POST['trawell']['cover'] ) ){
						$trawell_meta['cover'] = $_POST['trawell']['cover'];
					}
					
				}
            }
			
			if( isset( $_POST['trawell']['blank'] ) ){
				foreach ( $_POST['trawell']['blank'] as $blank_meta_key => $blank_meta_value ) {
					$trawell_meta['blank'][$blank_meta_key] = $blank_meta_value;
				}
			}
            
			if(!empty($trawell_meta)){
				update_post_meta( $post_id, '_trawell_meta', $trawell_meta );
			} else {
				delete_post_meta( $post_id, '_trawell_meta');
			}
			
		}
	}
endif;

/**
 * Layout metabox
 *
 * Callback function to create layout metabox
 *
 * @since  1.0
 */

if ( !function_exists( 'trawell_page_display_metabox' ) ) :
	function trawell_page_display_metabox( $object, $box ) {
		
		wp_nonce_field( 'trawell_post_metabox_save', 'trawell_post_metabox_nonce' );
		
		$trawell_meta = trawell_get_page_meta( $object->ID );
        $settings_type = $trawell_meta['display_settings'] ? $trawell_meta['display_settings'] : 'inherit';
		$cover_layouts = trawell_get_single_layouts( );
		$sidebars_lay = trawell_get_sidebar_layouts( );
		$sidebars = trawell_get_sidebars_list( );
		?>
		<label for="trawell-display-inherit-settings">
			<input id="trawell-display-inherit-settings" type="radio" class="trawell-settings-type"  name="trawell[display_settings]" value="inherit" <?php checked($settings_type, 'inherit'); ?>>
			<?php esc_html_e( 'Inherit from theme options', 'trawell' ); ?>
		</label>
        <br>
		<label for="trawell-display-custom-settings">
			<input id="trawell-display-custom-settings" type="radio" class="trawell-settings-type" name="trawell[display_settings]" value="custom" <?php checked($settings_type, 'custom'); ?>>
			<?php esc_html_e( 'Customize', 'trawell' ); ?>
		</label>
        
        <div id="trawell-layout-opt" class="trawell-watch-for-changes" data-watch="trawell-settings-type" data-hide-on-value="inherit">
            <h4><?php esc_html_e( 'Choose a layout', 'trawell' ); ?></h4>
            <ul class="trawell-img-select-wrap">
                <?php foreach ( $cover_layouts as $id => $cover_layout ): ?>
                    <li>
                        <?php $selected_class = $id == $trawell_meta['cover'] ? ' selected': ''; ?>
                        <img src="<?php echo esc_url($cover_layout['img']); ?>" title="<?php echo esc_attr($cover_layout['title']); ?>" class="trawell-post-cover trawell-img-select<?php echo esc_attr($selected_class); ?>">
                        <span><?php echo esc_html($cover_layout['title']); ?></span>
                        <input type="radio" class="trawell-hidden" name="trawell[cover]" value="<?php echo esc_attr($id); ?>" <?php checked( $id, $trawell_meta['cover'] );?>/> </label>
                    </li>
                <?php endforeach; ?>
            </ul>
            
            <h4><?php esc_html_e( 'Sidebar options', 'trawell' ); ?></h4>
            
            <ul class="trawell-img-select-wrap">
                <?php foreach ( $sidebars_lay as $id => $layout ): ?>
                    <li>
                        <?php $selected_class = $id == $trawell_meta['sidebar_position'] ? ' selected': ''; ?>
                        <img src="<?php echo esc_url($layout['img']); ?>" title="<?php echo esc_attr($layout['title']); ?>" class="trawell-img-select<?php echo esc_attr($selected_class); ?>">
                        <span><?php echo esc_html($layout['title']); ?></span>
                        <input type="radio" class="trawell-hidden" name="trawell[sidebar_position]" value="<?php echo esc_attr($id); ?>" <?php checked( $id, $trawell_meta['sidebar_position'] );?>/> </label>
                    </li>
                <?php endforeach; ?>
            </ul>
            
            <?php if ( !empty( $sidebars ) ): ?>
                
                <p><select name="trawell[sidebar]" class="widefat">
                        <?php foreach ( $sidebars as $id => $name ): ?>
                            <option value="<?php echo esc_attr($id); ?>" <?php selected( $id, $trawell_meta['sidebar'] );?>><?php echo esc_html($name); ?></option>
                        <?php endforeach; ?>
                    </select></p>
                <p class="description"><?php esc_html_e( 'Choose standard sidebar to display', 'trawell' ); ?></p>
                
                <p><select name="trawell[sticky_sidebar]" class="widefat">
                        <?php foreach ( $sidebars as $id => $name ): ?>
                            <option value="<?php echo esc_attr($id); ?>" <?php selected( $id, $trawell_meta['sticky_sidebar'] );?>><?php echo esc_html($name); ?></option>
                        <?php endforeach; ?>
                    </select></p>
                <p class="description"><?php esc_html_e( 'Choose sticky sidebar to display', 'trawell' ); ?></p>
            
            <?php endif; ?>
        </div>
		<?php
	}
endif;


/**
 * Blank template settings
 *
 * @since 1.1
 */
if(!function_exists('trawell_blank_page_template')):
	function trawell_blank_page_template( $object ){
		
		$trawell_meta = trawell_get_page_meta( $object->ID );
		
		?>

        <label>
            <input type="hidden" class="trawell-blank-page-title" name="trawell[blank][page_title]" value="0">
            <input type="checkbox" class="trawell-blank-page-title" name="trawell[blank][page_title]" value="1" <?php checked( $trawell_meta['blank']['page_title'], 1 ); ?>>
			<?php esc_html_e( 'Page title', 'trawell' ); ?>
        </label>
        <br>
        <label>
            <input type="hidden" class="trawell-blank-header" name="trawell[blank][header]" value="0">
            <input type="checkbox" class="trawell-blank-header" name="trawell[blank][header]" value="1" <?php checked( $trawell_meta['blank']['header'], 1 ); ?>>
			<?php esc_html_e( 'Header', 'trawell' ); ?>
        </label>
        <br>
        <label>
            <input type="hidden" class="trawell-blank-footer" name="trawell[blank][footer]" value="0">
            <input type="checkbox" class="trawell-blank-footer" name="trawell[blank][footer]" value="1" <?php checked( $trawell_meta['blank']['footer'], 1 ); ?>>
			<?php esc_html_e( 'Footer', 'trawell' ); ?>
        </label>
		<?php
	}
endif;