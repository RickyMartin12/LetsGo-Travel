<div class="entry-media">
    <?php $map = trawell_get('map'); ?>
    <?php if(!empty($map['settings']) && !empty($map['items'])): ?>
        <?php echo mks_map_render( $map['settings'], $map['items'] ); ?>
    <?php endif; ?>
</div>
