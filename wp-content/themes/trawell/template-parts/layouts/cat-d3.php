<div class="col-12 col-md-4">
	
	<?php $trawell_layout = trawell_get_category_layout_options('d3'); ?>
    <article <?php post_class('trawell-item item-overlay trawell-item-gradient cat-item cat-item-'.$category->term_id); ?>>

		<?php if( $featured_image = trawell_get_category_featured_image('trawell-cat-d3', $category->term_id) ): ?>
			<a href="<?php echo get_category_link($category->term_id); ?>" class="entry-image"><?php echo wp_kses_post($featured_image); ?></a>
		<?php endif; ?>
		
		<div class="entry-header element-pos-abs element-pos-bottom">
			<h3 class="entry-title h2 md-h3 sm-h3 no-margin"><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo esc_html( $category->name ); ?></a></h3>
			<?php if($trawell_layout['meta']): ?>
                <div class="entry-meta"><span><?php echo esc_html( $category->count ); ?> <?php echo __trawell('articles'); ?></span></div>
			<?php endif; ?>
		</div>

	</article>

</div>