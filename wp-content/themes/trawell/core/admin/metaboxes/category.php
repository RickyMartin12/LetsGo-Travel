<?php

/**
 * Save category meta
 *
 * Callback function to save category meta data
 *
 * @since  1.0
 */

add_action( 'edited_category', 'trawell_save_category_meta_fields', 10, 2 );
add_action( 'create_category', 'trawell_save_category_meta_fields', 10, 2 );

if ( !function_exists( 'trawell_save_category_meta_fields' ) ) :
	function trawell_save_category_meta_fields( $term_id ) {
		
		if ( isset( $_POST['trawell'] ) ) {
			
			$trawell_meta = array();
			
			if ( isset( $_POST['trawell']['color'] ) ) {
				
				if ( $_POST['trawell']['color']['type'] != 'inherit' ) {
					$trawell_meta['color'] = $_POST['trawell']['color'];
				}
				if ( isset( $_POST['trawell']['display_settings'] ) ) {
					$trawell_meta['display_settings'] = $_POST['trawell']['display_settings'];
					
					if ( $_POST['trawell']['display_settings'] == 'custom' ) {
						
						if ( isset( $_POST['trawell']['sidebar_position'] ) ) {
							$trawell_meta['sidebar_position'] = $_POST['trawell']['sidebar_position'];
						}
						
						if ( isset( $_POST['trawell']['sidebar'] ) ) {
							$trawell_meta['sidebar'] = $_POST['trawell']['sidebar'];
						}
						
						if ( isset( $_POST['trawell']['sticky_sidebar'] ) ) {
							$trawell_meta['sticky_sidebar'] = $_POST['trawell']['sticky_sidebar'];
						}
						
						if ( isset( $_POST['trawell']['cover'] ) ) {
							$trawell_meta['cover'] = $_POST['trawell']['cover'];
						}
						
						if ( isset( $_POST['trawell']['map'] ) ) {
							$trawell_meta['map'] = $_POST['trawell']['map'];
						}
						
						if ( isset( $_POST['trawell']['posts_layout'] ) ) {
							$trawell_meta['posts_layout'] = $_POST['trawell']['posts_layout'];
						}
						
						if ( isset( $_POST['trawell']['posts_layout_sid'] ) ) {
							$trawell_meta['posts_layout_sid'] = $_POST['trawell']['posts_layout_sid'];
						}
						
						if ( isset( $_POST['trawell']['ppp'] ) ) {
							$trawell_meta['ppp'] = absint($_POST['trawell']['ppp']);
						}
						
						if ( isset( $_POST['trawell']['pagination'] ) ) {
							$trawell_meta['pagination'] = $_POST['trawell']['pagination'];
						}
					}
					
				}
				trawell_update_cat_colors( $term_id, $_POST['trawell']['color']['value'], $_POST['trawell']['color']['type'] );
			}
			
			if ( isset( $_POST['trawell']['image'] ) ) {
				$trawell_meta['image'] = $_POST['trawell']['image'];
			}
			
			if ( !empty( $trawell_meta ) ) {
				update_term_meta( $term_id, '_trawell_meta', $trawell_meta );
			} else {
				delete_term_meta( $term_id, '_trawell_meta' );
			}
			
		}
		
	}
endif;


/**
 * Add category meta
 *
 * Callback function to load category meta fields on "new category" screen
 *
 * @since  1.0
 */

add_action( 'category_add_form_fields', 'trawell_category_add_meta_fields', 9, 2 );

if ( !function_exists( 'trawell_category_add_meta_fields' ) ) :
	function trawell_category_add_meta_fields() {
		$trawell_meta = trawell_get_category_meta();
		$settings_type = $trawell_meta['display_settings'] ? $trawell_meta['display_settings'] : 'inherit';
		$post_layouts = trawell_get_posts_layouts( array( 'inherit', 'map', ) );
		$post_layouts_sid = trawell_get_posts_layouts( array( 'inherit', 'map', 'b3', 'c4', 'd4', 'e4', ) );
		$cover_layouts = trawell_get_category_layouts();
		$sidebars_lay = trawell_get_sidebar_layouts();
		$sidebars = trawell_get_sidebars_list();
		$pagination = trawell_get_pagination_layouts();
		?>
        <div class="form-field">
            <h4><?php esc_html_e( 'Display settings', 'trawell' ); ?></h4><label for="trawell-display-inherit-settings">
                <input id="trawell-display-inherit-settings" type="radio" class="trawell-settings-type" name="trawell[display_settings]" value="inherit" <?php checked( $settings_type, 'inherit' ); ?>>
				<?php esc_html_e( 'Inherit from theme options', 'trawell' ); ?>
                <br>
            </label><label for="trawell-display-custom-settings">
                <input id="trawell-display-custom-settings" type="radio" class="trawell-settings-type" name="trawell[display_settings]" value="custom" <?php checked( $settings_type, 'custom' ); ?>>
				<?php esc_html_e( 'Customize', 'trawell' ); ?>
            </label>

        </div>
        <div id="trawell-layout-opt" class="trawell-watch-for-changes" data-watch="trawell-settings-type" data-hide-on-value="inherit">
            <div class="form-field">
                <h4><?php esc_html_e( 'Choose category layout', 'trawell' ); ?></h4>
                <ul class="trawell-img-select-wrap">
					<?php foreach ( $cover_layouts as $id => $cover_layout ): ?>
                        <li>
							<?php $selected_class = $id == $trawell_meta['cover'] ? ' selected' : ''; ?>
                            <img src="<?php echo esc_url( $cover_layout['img'] ); ?>" title="<?php echo esc_attr( $cover_layout['title'] ); ?>" class="trawell-cover-layout trawell-img-select<?php echo esc_attr( $selected_class ); ?>">
                            <span><?php echo esc_html($cover_layout['title']); ?></span>
                            <input type="radio" class="trawell-hidden" name="trawell[cover]" value="<?php echo esc_attr( $id ); ?>" <?php checked( $id, $trawell_meta['cover'] ); ?>/>
                        </li>
					<?php endforeach; ?>
                </ul>
            </div>
            <div class="form-field trawell-cover-map-settings">
                <label for="trawell-category-enable-map">
                    <input id="trawell-category-disable-map" type="hidden" class="trawell-category-disable-map" name="trawell[map]" value="0">
                    <input id="trawell-category-enable-map" type="checkbox" class="trawell-category-enable-map" name="trawell[map]" value="1" <?php checked( $trawell_meta['map'], 1 ); ?>>
	                <?php esc_html_e( 'Enable map with posts in cover', 'trawell' ); ?>
                </label>
            </div>

            <div class="form-field">
                <h4><?php esc_html_e( 'Sidebar options', 'trawell' ); ?></h4>

                <ul class="trawell-img-select-wrap">
					<?php foreach ( $sidebars_lay as $id => $layout ): ?>
                        <li>
							<?php $selected_class = $id == $trawell_meta['sidebar_position'] ? ' selected' : ''; ?>
                            <img src="<?php echo esc_url( $layout['img'] ); ?>" title="<?php echo esc_attr( $layout['title'] ); ?>" class="trawell-category-sidebar-position trawell-img-select<?php echo esc_attr( $selected_class ); ?>">
                            <span><?php echo esc_html($layout['title']); ?></span>
                            <input type="radio" class="trawell-hidden" name="trawell[sidebar_position]" value="<?php echo esc_attr( $id ); ?>" <?php checked( $id, $trawell_meta['sidebar_position'] ); ?>/>
                        </li>
					<?php endforeach; ?>
                </ul>
            </div>
			<?php if ( !empty( $sidebars ) ): ?>
                <div class="form-field">
                    <p><select name="trawell[sidebar]" class="widefat">
							<?php foreach ( $sidebars as $id => $name ): ?>
                                <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $id, $trawell_meta['sidebar'] ); ?>><?php echo esc_html($name); ?></option>
							<?php endforeach; ?>
                        </select></p>
                    <p class="description"><?php esc_html_e( 'Choose standard sidebar to display', 'trawell' ); ?></p>
                </div>
                <div class="form-field">
                    <p><select name="trawell[sticky_sidebar]" class="widefat">
							<?php foreach ( $sidebars as $id => $name ): ?>
                                <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $id, $trawell_meta['sticky_sidebar'] ); ?>><?php echo esc_html($name); ?></option>
							<?php endforeach; ?>
                        </select></p>
                    <p class="description"><?php esc_html_e( 'Choose sticky sidebar to display', 'trawell' ); ?></p>
                </div>
			<?php endif; ?>

            <div class="form-field trawell-category-posts-display-settings <?php echo ( $trawell_meta['sidebar_position'] != 'none' ) ? 'trawell-hidden-i' : ''; ?>">
                <h4><?php esc_html_e( 'Choose a post layout', 'trawell' ); ?></h4>
                <ul class="trawell-img-select-wrap">
					<?php foreach ( $post_layouts as $id => $post_layout ): ?>
                        <li>
							<?php $selected_class = $id == $trawell_meta['posts_layout'] ? ' selected' : ''; ?>
                            <img src="<?php echo esc_url( $post_layout['img'] ); ?>" title="<?php echo esc_attr( $post_layout['title'] ); ?>" class="trawell-img-select<?php echo esc_attr( $selected_class ); ?>">
                            <span><?php echo esc_html($post_layout['title']); ?></span>
                            <input type="radio" class="trawell-hidden" name="trawell[posts_layout]" value="<?php echo esc_attr( $id ); ?>" <?php checked( $id, $trawell_meta['posts_layout'] ); ?>/>
                        </li>
					<?php endforeach; ?>
                </ul>
            </div>

            <div class="form-field trawell-category-posts-display-settings-sid  <?php echo ( $trawell_meta['sidebar_position'] == 'none' ) ? 'trawell-hidden-i' : ''; ?>">
                <h4><?php esc_html_e( 'Choose a post layout', 'trawell' ); ?></h4>
                <ul class="trawell-img-select-wrap">
					<?php foreach ( $post_layouts_sid as $id => $post_layout ): ?>
                        <li>
							<?php $selected_class = $id == $trawell_meta['posts_layout_sid'] ? ' selected' : ''; ?>
                            <img src="<?php echo esc_url( $post_layout['img'] ); ?>" title="<?php echo esc_attr( $post_layout['title'] ); ?>" class="trawell-img-select<?php echo esc_attr( $selected_class ); ?>">
                            <span><?php echo esc_html($post_layout['title']); ?></span>
                            <input type="radio" class="trawell-hidden" name="trawell[posts_layout_sid]" value="<?php echo esc_attr( $id ); ?>" <?php checked( $id, $trawell_meta['posts_layout_sid'] ); ?>/>
                        </li>
					<?php endforeach; ?>
                </ul>
            </div>

            <div class="form-field trawell-layout-opt">
                <label><?php esc_html_e( 'Number of posts per page', 'trawell' ); ?></label>
                <input name="trawell[ppp]" type="number" class="trawell-small-text" value="<?php echo esc_attr( $trawell_meta['ppp'] ); ?>"/>
            </div>

            <div id="trawell-pagination-metaboxes" class="form-field trawell-layout-opt">
                <label><?php esc_html_e( 'Pagination', 'trawell' ); ?></label>
                <ul class="trawell-img-select-wrap">
					<?php foreach ( $pagination as $id => $layout ): ?>
                        <li>
							<?php $selected_class = $id == $trawell_meta['pagination'] ? ' selected' : ''; ?>
                            <img src="<?php echo esc_url( $layout['img'] ); ?>" title="<?php echo esc_attr( $layout['title'] ); ?>" class="trawell-img-select<?php echo esc_attr( $selected_class ); ?>">
                            <br/><span><?php echo esc_attr( $layout['title'] ); ?></span>
                            <input type="radio" class="trawell-hidden trawell-count-me" name="trawell[pagination]" value="<?php echo esc_attr( $id ); ?>" <?php checked( $id, $trawell_meta['pagination'] ); ?>/>
                        </li>
					<?php endforeach; ?>
                </ul>
            </div>
        </div>


        <div class="form-field">
            <label><?php esc_html_e( 'Color', 'trawell' ); ?></label>
            <label><input type="radio" name="trawell[color][type]" value="inherit" class="color-type" <?php checked( $trawell_meta['color']['type'], 'inherit' ); ?>> <?php esc_html_e( 'Inherit from accent color', 'trawell' ); ?>
            </label>
            <label><input type="radio" name="trawell[color][type]" value="custom" class="color-type" <?php checked( $trawell_meta['color']['type'], 'custom' ); ?>> <?php esc_html_e( 'Set custom color', 'trawell' ); ?>
            </label>
            <div id="trawell-color-wrap">
                <p>
                    <input name="trawell[color][value]" type="text" class="trawell-colorpicker" value="<?php echo esc_attr( $trawell_meta['color']['value'] ); ?>" data-default-color="<?php echo esc_attr( $trawell_meta['color']['value'] ); ?>"/>
                </p>
				
				<?php $recent_colors = get_option( 'trawell_recent_cat_colors' ); ?>
				<?php if ( !empty( $recent_colors ) ) : ?>
                    <p class="description"><?php esc_html_e( 'Recently used', 'trawell' ); ?>:<br/>
						<?php foreach ( $recent_colors as $color ) : ?>
                            <a href="javascript:void(0);" style="background: <?php echo esc_attr( $color ); ?>;" class="trawell-rec-color" data-color="<?php echo esc_attr( $color ); ?>"></a>
						<?php endforeach; ?>
                    </p>
				<?php endif; ?>
            </div>
            <br/>
        </div>

        <div class="form-field">
            <label><?php esc_html_e( 'Image', 'trawell' ); ?></label>
			<?php $display = $trawell_meta['image'] ? 'initial' : 'none'; ?>
            <p>
                <img id="trawell-image-preview" src="<?php echo esc_url( $trawell_meta['image'] ); ?>" style="width: 300px;  border: 2px solid #ebebeb; display:<?php echo esc_attr( $display ); ?>;">
            </p>

            <p>
                <input type="hidden" name="trawell[image]" id="trawell-image-url" value="<?php echo esc_attr( $trawell_meta['image'] ); ?>"/>
                <input type="button" id="trawell-image-upload" class="button-secondary" value="<?php _e( 'Upload', 'trawell' ); ?>"/>
                <input type="button" id="trawell-image-clear" class="button-secondary" value="<?php _e( 'Clear', 'trawell' ); ?>" style="display:<?php echo esc_attr( $display ); ?>"/>
            </p>

            <p class="description"><?php _e( 'Upload an image for this category', 'trawell' ); ?></p>
        </div>
		
		<?php
	}
endif;


/**
 * Edit category meta
 *
 * Callback function to load category meta fields on edit screen
 *
 * @since  1.0
 */

add_action( 'category_edit_form_fields', 'trawell_category_edit_meta_fields', 9, 2 );

if ( !function_exists( 'trawell_category_edit_meta_fields' ) ) :
	function trawell_category_edit_meta_fields( $term ) {
		$trawell_meta = trawell_get_category_meta( $term->term_id );
		$settings_type = $trawell_meta['display_settings'] ? $trawell_meta['display_settings'] : 'inherit';
		$post_layouts = trawell_get_posts_layouts( array( 'inherit', 'map', ) );
		$post_layouts_sid = trawell_get_posts_layouts( array( 'inherit', 'map', 'b3', 'c4', 'd4', 'e4', ) );
		$cover_layouts = trawell_get_category_layouts();
		$sidebars_lay = trawell_get_sidebar_layouts();
		$sidebars = trawell_get_sidebars_list();
		$pagination = trawell_get_pagination_layouts();
		
		?>

        <tr class="form-field">
            <th scope="row" valign="top">
                <label><?php esc_html_e( 'Display settings', 'trawell' ); ?></label>
            </th>
            <td>
                <label for="trawell-display-inherit-settings">
                    <input id="trawell-display-inherit-settings" type="radio" class="trawell-category-settings-type" name="trawell[display_settings]" value="inherit" <?php checked( $settings_type, 'inherit' ); ?>>
					<?php esc_html_e( 'Inherit from theme options', 'trawell' ); ?>
                    <br>
                </label>
                <label for="trawell-display-custom-settings">
                    <input id="trawell-display-custom-settings" type="radio" class="trawell-category-settings-type" name="trawell[display_settings]" value="custom" <?php checked( $settings_type, 'custom' ); ?>>
					<?php esc_html_e( 'Customize', 'trawell' ); ?>
                </label>
            </td>
        </tr>

        <tr class="form-field trawell-layout-opt form-field trawell-watch-for-changes" data-watch="trawell-settings-type" data-hide-on-value="inherit">
            <th scope="row" valign="top">
                <label><?php esc_html_e( 'Choose a layout', 'trawell' ); ?></label>
            </th>
            <td>
                <ul class="trawell-img-select-wrap">
					<?php foreach ( $cover_layouts as $id => $cover_layout ): ?>
                        <li>
							<?php $selected_class = $id == $trawell_meta['cover'] ? ' selected' : ''; ?>
                            <img src="<?php echo esc_url( $cover_layout['img'] ); ?>" title="<?php echo esc_attr( $cover_layout['title'] ); ?>" class="trawell-cover-layout trawell-img-select<?php echo esc_attr( $selected_class ); ?>">
                            <span><?php echo esc_html($cover_layout['title']); ?></span>
                            <input type="radio" class="trawell-hidden" name="trawell[cover]" value="<?php echo esc_attr( $id ); ?>" <?php checked( $id, $trawell_meta['cover'] ); ?>/> </label>
                        </li>
					<?php endforeach; ?>
                </ul>

            </td>
        </tr>

        <tr class="form-field trawell-layout-opt  trawell-cover-map-settings form-field trawell-watch-for-changes" data-watch="trawell-settings-type" data-hide-on-value="inherit">
            <th scope="row" valign="top">
                <label><?php esc_html_e( 'Enable map with posts in cover', 'trawell' ); ?></label>
            </th>
            <td>
                <label for="trawell-category-enable-map">
                    <input id="trawell-category-disable-map" type="hidden" class="trawell-category-disable-map" name="trawell[map]" value="0" >
                    <input id="trawell-category-enable-map" type="checkbox" class="trawell-category-enable-map" name="trawell[map]" value="1" <?php checked( $trawell_meta['map'], 1 ); ?>>
                    <br>
                </label>
            </td>
        </tr>

        <tr class="form-field trawell-layout-opt form-field trawell-watch-for-changes" data-watch="trawell-settings-type" data-hide-on-value="inherit">
            <th scope="row" valign="top">
                <label><?php esc_html_e( 'Sidebar options', 'trawell' ); ?></label>
            </th>
            <td>
                <ul class="trawell-img-select-wrap">
					<?php foreach ( $sidebars_lay as $id => $layout ): ?>
                        <li>
							<?php $selected_class = $id == $trawell_meta['sidebar_position'] ? ' selected' : ''; ?>
                            <img src="<?php echo esc_url( $layout['img'] ); ?>" title="<?php echo esc_attr( $layout['title'] ); ?>" class="trawell-category-sidebar-position trawell-img-select<?php echo esc_attr( $selected_class ); ?>">
                            <span><?php echo esc_html($layout['title']); ?></span>
                            <input type="radio" class="trawell-hidden" name="trawell[sidebar_position]" value="<?php echo esc_attr( $id ); ?>" <?php checked( $id, $trawell_meta['sidebar_position'] ); ?>/> </label>
                        </li>
					<?php endforeach; ?>
                </ul>
            </td>
        <tr>
		
		
		<?php if ( !empty( $sidebars ) ): ?>

            <tr class="form-field trawell-layout-opt form-field trawell-watch-for-changes" data-watch="trawell-settings-type" data-hide-on-value="inherit">
                <th scope="row" valign="top">
                    <label><?php esc_html_e( 'Choose standard sidebar to display', 'trawell' ); ?></label>
                </th>
                <td>
                    <select name="trawell[sidebar]" class="widefat">
						<?php foreach ( $sidebars as $id => $name ): ?>
                            <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $id, $trawell_meta['sidebar'] ); ?>><?php echo esc_html($name); ?></option>
						<?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr class="form-field trawell-layout-opt form-field <?php echo ( $settings_type === 'inherit' ) ? 'trawell-hidden-i' : ''; ?>">
                <th scope="row" valign="top">
                    <label><?php esc_html_e( 'Choose sticky sidebar to display', 'trawell' ); ?></label>
                </th>
                <td>
                    <select name="trawell[sticky_sidebar]" class="widefat">
						<?php foreach ( $sidebars as $id => $name ): ?>
                            <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $id, $trawell_meta['sticky_sidebar'] ); ?>><?php echo esc_html($name); ?></option>
						<?php endforeach; ?>
                    </select>
                </td>
            </tr>
		
		<?php endif; ?>

        <tr class="form-field trawell-layout-opt trawell-category-posts-display-settings form-field trawell-watch-for-changes" data-watch="trawell-settings-type" data-hide-on-value="inherit">
            <th scope="row" valign="top">
                <label><?php esc_html_e( 'Choose a post layout', 'trawell' ); ?></label>
            </th>
            <td>
                <ul class="trawell-img-select-wrap">
					<?php foreach ( $post_layouts as $id => $post_layout ): ?>
                        <li>
							<?php $selected_class = $id == $trawell_meta['posts_layout'] ? ' selected' : ''; ?>
                            <img src="<?php echo esc_url( $post_layout['img'] ); ?>" title="<?php echo esc_attr( $post_layout['title'] ); ?>" class="trawell-img-select<?php echo esc_attr( $selected_class ); ?>">
                            <span><?php echo esc_html($post_layout['title']); ?></span>
                            <input type="radio" class="trawell-hidden" name="trawell[posts_layout]" value="<?php echo esc_attr( $id ); ?>" <?php checked( $id, $trawell_meta['posts_layout'] ); ?>/> </label>
                        </li>
					<?php endforeach; ?>
                </ul>

            </td>
        </tr>

        <tr class="form-field trawell-layout-opt trawell-category-posts-display-settings-sid form-field trawell-watch-for-changes" data-watch="trawell-settings-type" data-hide-on-value="inherit">
            <th scope="row" valign="top">
                <label><?php esc_html_e( 'Choose a post layout', 'trawell' ); ?></label>
            </th>
            <td>
                <ul class="trawell-img-select-wrap">
					<?php foreach ( $post_layouts_sid as $id => $post_layout ): ?>
                        <li>
							<?php $selected_class = $id == $trawell_meta['posts_layout_sid'] ? ' selected' : ''; ?>
                            <img src="<?php echo esc_url( $post_layout['img'] ); ?>" title="<?php echo esc_attr( $post_layout['title'] ); ?>" class="trawell-img-select<?php echo esc_attr( $selected_class ); ?>">
                            <span><?php echo esc_html($post_layout['title']); ?></span>
                            <input type="radio" class="trawell-hidden" name="trawell[posts_layout_sid]" value="<?php echo esc_attr( $id ); ?>" <?php checked( $id, $trawell_meta['posts_layout_sid'] ); ?>/> </label>
                        </li>
					<?php endforeach; ?>
                </ul>

            </td>
        </tr>

        <tr class="form-field trawell-layout-opt trawell-watch-for-changes" data-watch="trawell-settings-type" data-hide-on-value="inherit">
            <th scope="row" valign="top">
                <label><?php esc_html_e( 'Number of posts per page', 'trawell' ); ?></label></th>
            <td>
                <input name="trawell[ppp]" type="number" class="trawell-small-text" value="<?php echo esc_attr( $trawell_meta['ppp'] ); ?>"/>
            </td>
        </tr>

        <tr class="form-field trawell-layout-opt trawell-watch-for-changes" data-watch="trawell-settings-type" data-hide-on-value="inherit">
            <th scope="row" valign="top"><label><?php esc_html_e( 'Pagination', 'trawell' ); ?></label></th>
            <td>
                <ul class="trawell-img-select-wrap">
					<?php foreach ( $pagination as $id => $layout ): ?>
                        <li>
							<?php $selected_class = $id == $trawell_meta['pagination'] ? ' selected' : ''; ?>
                            <img src="<?php echo esc_url( $layout['img'] ); ?>" title="<?php echo esc_attr( $layout['title'] ); ?>" class="trawell-img-select<?php echo esc_attr( $selected_class ); ?>">
                            <br/><span><?php echo esc_attr( $layout['title'] ); ?></span>
                            <input type="radio" class="trawell-hidden trawell-count-me" name="trawell[pagination]" value="<?php echo esc_attr( $id ); ?>" <?php checked( $id, $trawell_meta['pagination'] ); ?>/>
                        </li>
					<?php endforeach; ?>
                </ul>
            </td>
        </tr>

        <tr class="form-field">
            <th scope="row" valign="top"><label><?php esc_html_e( 'Color', 'trawell' ); ?></label></th>
            <td>
                <label><input type="radio" name="trawell[color][type]" value="inherit" class="color-type" <?php checked( $trawell_meta['color']['type'], 'inherit' ); ?>> <?php esc_html_e( 'Inherit from accent color', 'trawell' ); ?>
                </label><br/>
                <label><input type="radio" name="trawell[color][type]" value="custom" class="color-type" <?php checked( $trawell_meta['color']['type'], 'custom' ); ?>> <?php esc_html_e( 'Set custom color', 'trawell' ); ?>
                </label>
                <div id="trawell-color-wrap">
                    <p>
                        <input name="trawell[color][value]" type="text" class="trawell-colorpicker" value="<?php echo esc_attr( $trawell_meta['color']['value'] ); ?>" data-default-color="<?php echo esc_attr( $trawell_meta['color']['value'] ); ?>"/>
                    </p>
					
					<?php $recent_colors = get_option( 'trawell_recent_cat_colors' ); ?>
					<?php if ( !empty( $recent_colors ) ) : ?>
                        <p class="description"><?php esc_html_e( 'Recently used', 'trawell' ); ?>:<br/>
							<?php foreach ( $recent_colors as $color ) : ?>
                                <a href="javascript:void(0);" style="background: <?php echo esc_attr( $color ); ?>;" class="trawell-rec-color" data-color="<?php echo esc_attr( $color ); ?>"></a>
							<?php endforeach; ?>
                        </p>
					<?php endif; ?>
                </div>
            </td>
        </tr>

        <tr class="form-field">
            <th scope="row" valign="top">
                <label><?php _e( 'Image', 'trawell' ); ?></label>
            </th>
            <td>
				<?php $display = $trawell_meta['image'] ? 'initial' : 'none'; ?>
                <p>
                    <img id="trawell-image-preview" src="<?php echo esc_url( $trawell_meta['image'] ); ?>" style="width: 300px;  border: 2px solid #ebebeb; display:<?php echo esc_attr( $display ); ?>;">
                </p>

                <p>
                    <input type="hidden" name="trawell[image]" id="trawell-image-url" value="<?php echo esc_url( $trawell_meta['image'] ); ?>"/>
                    <input type="button" id="trawell-image-upload" class="button-secondary" value="<?php _e( 'Upload', 'trawell' ); ?>"/>
                    <input type="button" id="trawell-image-clear" class="button-secondary" value="<?php _e( 'Clear', 'trawell' ); ?>" style="display:<?php echo esc_attr( $display ); ?>"/>
                </p>

                <p class="description"><?php _e( 'Upload an image for this category', 'trawell' ); ?></p>
            </td>
        </tr>
		<?php
	}
endif;


/**
 * Delete category meta
 *
 * Delete our custom category meta from database on category deletion
 *
 * @return  void
 * @since  1.0
 */

add_action( 'delete_category', 'trawell_delete_category_meta' );

if ( !function_exists( 'trawell_delete_category_meta' ) ):
	function trawell_delete_category_meta( $term_id ) {
		
		//Check for category colors deletion
		$colors = get_option( 'trawell_cat_colors' );
		
		if ( !empty( $colors ) && array_key_exists( $term_id, $colors ) ) {
			unset( $colors[ $term_id ] );
			update_option( 'trawell_cat_colors', $colors );
		}
	}
endif;


/**
 * Update category colors
 *
 * Function checks for category color and updates two fields
 * in options table. One for list of category colors and second
 * for recently picked colors.
 *
 * @param   int $cat_id
 * @param   string $color Hexadecimal color value
 * @param   string $type inherit|custom
 * @return  void
 * @since  1.0
 */
if ( !function_exists( 'trawell_update_cat_colors' ) ):
	function trawell_update_cat_colors( $cat_id, $color, $type ) {
		
		/* Update category color */
		
		$colors = get_option( 'trawell_cat_colors' );
		
		if ( empty( $colors ) ) {
			$colors = array();
		}
		
		if ( array_key_exists( $cat_id, $colors ) ) {
			
			if ( $type == 'inherit' ) {
				unset( $colors[ $cat_id ] );
			} elseif ( $colors[ $cat_id ] != $color ) {
				$colors[ $cat_id ] = $color;
			}
			
		} else {
			
			if ( $type != 'inherit' ) {
				$colors[ $cat_id ] = $color;
			}
		}
		
		update_option( 'trawell_cat_colors', $colors );
		
		
		/* Store recent category colors */
		if ( $type != 'inherit' ) {
			
			$num_col = 10;
			$current = get_option( 'trawell_recent_cat_colors' );
			if ( empty( $current ) ) {
				$current = array();
			}
			$update = false;
			
			if ( !in_array( $color, $current ) ) {
				$current[] = $color;
				if ( count( $current ) > $num_col ) {
					$current = array_slice( $current, ( count( $current ) - $num_col ), ( count( $current ) - 1 ) );
				}
				$update = true;
			}
			
			if ( $update ) {
				update_option( 'trawell_recent_cat_colors', $current );
			}
			
		}
		
	}
endif;

?>