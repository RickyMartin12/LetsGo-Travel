<ul class="trawell-actions margin-padding-reset">
<?php $header_actions = trawell_get(array('part' => 'header', 'option' => 'actions')); ?>
<?php if ( !empty( $header_actions ) ): ?>
    <?php foreach ( $header_actions as $element ): ?>
        <?php get_template_part( 'template-parts/header/elements/' . $element ); ?>
    <?php endforeach; ?>
<?php endif; ?>
	<li class="trawell-actions-button trawell-hamburger-action">
	    <span class="trawell-hamburger">
	    	<span><?php echo __trawell('menu') ?></span>
	        <i class="o-menu-1"></i>
	    </span>
	</li>
</ul>