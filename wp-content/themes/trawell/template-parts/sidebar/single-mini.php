<?php $sidebar = trawell_get( array('part' => 'sidebar_mini', 'option' => 'elements')); ?>
<?php if(!empty( $sidebar ) ): ?>
<div class="trawell-sidebar-mini d-none d-md-block">
    <div class="trawell-sidebar-sticky">
        <?php foreach( $sidebar as $element ): ?>
                 <?php get_template_part( 'template-parts/sidebar/'.$element ); ?>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>