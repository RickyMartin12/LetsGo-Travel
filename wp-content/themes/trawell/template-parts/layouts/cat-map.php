<div class="col-12">
	<?php if(trawell_is_maps_active()): ?>
	    <?php echo mks_map_render( trawell_get_categories_map_settings(), trawell_parse_maps_categories($categories) ); ?>
	<?php else: ?>
        <p><?php echo wp_kses_post( sprintf( __( 'Please install <a href="%s">Meks Easy Maps plugin </a>.', 'trawell' ), '#' ) ); ?></p>
	<?php endif; ?>
</div>