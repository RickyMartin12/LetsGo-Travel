<div class="trawell-cover trawell-cover-color trawell-cover-image-text">

	<div class="trawell-cover-item item-overlay trawell-item-color-overlay trawell-flex align-items-center justify-content-center text-center "> 
		
	    <?php if( $featured_image = trawell_get_category_featured_image('trawell-cover', get_queried_object_id() ) ): ?>
			<div class="entry-image"><?php echo wp_kses_post($featured_image); ?></div>
		<?php endif; ?>
	
	   	<?php get_template_part('template-parts/content/archive'); ?>

	</div>

</div>