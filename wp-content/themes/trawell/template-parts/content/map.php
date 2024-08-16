<?php $map = trawell_get('map'); ?>
<?php if(!empty($map['settings']) && !empty($map['items'])): ?>
	<?php echo mks_map_render( $map['settings'], $map['items'] ); ?>
<?php endif; ?>

<?php if(!trawell_is_maps_active()): ?>
	<div class="d-flex align-items-center justify-content-center trawell-msg">
		<h3><?php echo wp_kses_post( sprintf( __( 'Please install <a href="%s">Meks Easy Maps plugin</a>', 'trawell' ), '#' ) ); ?></h3>	
	</div>
<?php else: ?>
	<?php if(empty($map['items'])): ?>
        <div class="d-flex align-items-center justify-content-center trawell-msg">
            <h3><?php echo wp_kses_post( sprintf( __( 'There are no posts with pins, to add one go to posts and select the post location.', 'trawell' ) ) ); ?></h3>
        </div>
	<?php endif; ?>
<?php endif; ?>