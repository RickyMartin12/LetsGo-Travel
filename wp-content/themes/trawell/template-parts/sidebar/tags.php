<?php if ( has_tag() ): ?>
	<div class="widget-mini">
		<span class="entry-meta-small opacity-50"><?php echo __trawell('tagged_with') ?></span>
	    <div class="entry-tags">
	        <?php the_tags(false, ' ', false); ?>
	    </div>
	   </div>
	<?php endif; ?>
