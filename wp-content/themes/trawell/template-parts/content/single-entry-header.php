<div class="entry-header">
        <div class="entry-category pill-medium sm-pill-small">
	        <?php if(trawell_get('icon')): ?>
	            <?php echo trawell_get_format_icon(); ?>
	        <?php endif; ?>
	
	        <?php if(trawell_get('category')): ?>
                <?php echo trawell_get_category() ?>
	        <?php endif; ?>
        </div>
    <?php the_title('<h1 class="entry-title h1 md-h1 sm-h1">', '</h1>'); ?>
	
	<?php if($meta = trawell_get('meta')): ?>
        <div class="entry-meta sm-entry-meta-small">
            <?php echo trawell_get_meta_data( trawell_get('meta')); ?>
        </div>
	<?php endif; ?>
</div>