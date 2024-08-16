<div class="col-12 col-md-6">
	
    <?php $trawell_layout = trawell_get_category_layout_options('c2'); ?>
	<article <?php post_class('trawell-item item-overlay trawell-item-color-overlay text-center cat-item cat-item-'.$category->term_id); ?>>

		<?php if( $featured_image = trawell_get_category_featured_image('trawell-cat-c2', $category->term_id) ): ?>
			<a href="<?php echo get_category_link($category->term_id); ?>" class="entry-image"><?php echo wp_kses_post($featured_image); ?></a>
		<?php endif; ?>
		
		<div class="entry-header element-pos-center">
			<h3 class="entry-title h1 md-h1 sm-h1 no-margin"><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo esc_html( $category->name ); ?></a></h3>
            <?php if($trawell_layout['meta']): ?>
                <div class="entry-meta"><span><?php echo esc_html( $category->count ); ?> <?php echo __trawell('articles'); ?></span></div>
            <?php endif; ?>
		</div>

	</article>

</div>