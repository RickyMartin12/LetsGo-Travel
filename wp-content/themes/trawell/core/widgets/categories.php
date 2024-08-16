<?php

/**
 * Category widget class
 *
 * @since  1.0
 */

class Trawell_Category_Widget extends WP_Widget {

	var $defaults;

	function __construct() {
		$widget_ops = array( 'classname' => 'trawell_category_widget widget_categories', 'description' => esc_html__( 'Display your category list with this widget', 'trawell' ) );
		$control_ops = array( 'id_base' => 'trawell_category_widget' );
		parent::__construct( 'trawell_category_widget', esc_html__( 'Trawell Categories', 'trawell' ), $widget_ops, $control_ops );

		$this->defaults = array(
			'title' => esc_html__( 'Categories', 'trawell' ),
			'categories' => array(),
			'count' => 1
		);
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo wp_kses_post( $before_widget );

		$title = apply_filters( 'widget_title', $instance['title'] );

		if ( !empty($title) ) {
			echo wp_kses_post($before_title . $title . $after_title);
		}

		?>

		<ul>
		    <?php $cats = get_categories( array( 'include'	=> $instance['categories'])); ?>
		    <?php $cats = $this->sort_option_items( $cats,  $instance['categories']); ?>
		    <?php foreach($cats as $cat): ?>
			    	<li class="cat-item-<?php echo esc_attr($cat->term_id); ?>">
			    		<a href="<?php echo esc_url( get_category_link( $cat ) ); ?>"><span class="label"><?php echo esc_html( $cat->name ); ?></span>
			    			<?php if(!empty($instance['count'])): ?>
			    				<span class="count"><?php echo wp_kses_post( $cat->count ); ?></span>
			    			<?php endif; ?>
			    		</a>
			    	</li>
		    <?php endforeach; ?> 
		</ul>

		<?php
		echo wp_kses_post($after_widget);
	}


	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['categories'] = !empty($new_instance['categories']) ? $new_instance['categories'] : array();
		$instance['count'] = isset($new_instance['count']) ? 1 : 0;
		$instance['type'] = $new_instance['type'];
		
		return $instance;
	}

	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, $this->defaults ); ?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title', 'trawell' ); ?>:</label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" type="text" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
		</p>

		<?php $cats = get_categories( array( 'hide_empty' => false, 'number' => 0 ) ); ?>
		<?php $cats = $this->sort_option_items( $cats,  $instance['categories']); ?>

		<p>
		<label><?php esc_html_e( 'Choose (re-order) categories:', 'trawell' ); ?></label><br/>
		<div class="trawell-widget-content-sortable">
		<?php foreach ( $cats as $cat ) : ?>
		   	<?php $checked = in_array( $cat->term_id, $instance['categories'] ) ? 'checked' : ''; ?>
		   	<label><input type="checkbox" name="<?php echo esc_attr($this->get_field_name( 'categories' )); ?>[]" value="<?php echo esc_attr($cat->term_id); ?>" <?php echo esc_attr($checked); ?> /><?php echo esc_html( $cat->name );?></label>
		<?php endforeach; ?>
		</div>
		<small class="howto"><?php esc_html_e( 'Note: Leave empty to display all categories', 'trawell' ); ?></small>
		</p>

		<p>
			<label><input type="checkbox" name="<?php echo esc_attr($this->get_field_name( 'count' )); ?>" value="1" <?php echo checked($instance['count'], 1, true); ?> /><?php esc_html_e( 'Show post count?', 'trawell' ); ?></label>
		</p>

		<?php
	}

	/**
	 * Sort option items
	 *
	 * Use this function to properly order sortable options
	 *
	 * @param unknown $items    Array of items
	 * @param unknown $selected Array of IDs of currently selected items
	 * @return array ordered items
	 * @since  1.0
	 */

	function sort_option_items( $items, $selected, $field = 'term_id' ) {

		if ( empty( $selected ) ) {
			return $items;
		}

		$new_items = array();
		$temp_items = array();
		$temp_items_ids = array();

		foreach ( $selected as $selected_item_id ) {

			foreach ( $items as $item ) {
				if ( $selected_item_id == $item->$field ) {
					$new_items[] = $item;
				} else {
					if ( !in_array( $item->$field, $selected ) && !in_array( $item->$field, $temp_items_ids ) ) {
						$temp_items[] = $item;
						$temp_items_ids[] = $item->$field;
					}
				}
			}

		}

		$new_items = array_merge( $new_items, $temp_items );

		return $new_items;
	}

}

?>
