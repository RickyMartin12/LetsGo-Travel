<div class="col-12">
	
	<?php $trawell_layout = trawell_get_post_layout_options( 'd1' ); ?>
	<article <?php post_class('trawell-item item-overlay trawell-item-gradient'); ?>>

		<?php $trawell_featured_image = trawell_get_featured_image('trawell-d1-sid'); ?>
		<?php if ($trawell_featured_image): ?>		
			<a href="<?php the_permalink(); ?>" class="entry-image"><?php echo wp_kses_post( $trawell_featured_image); ?></a>
		<?php endif; ?>
		
		<div class="entry-header trawell-entry element-pos-abs element-pos-bottom">
			<div class="entry-category pill-medium sm-pill-small">
				<?php if($trawell_layout['icon']): ?>
					<?php echo trawell_get_format_icon() ?>
				<?php endif; ?>
				
				<?php if($trawell_layout['category']): ?>
					<?php echo trawell_get_category() ?>
				<?php endif; ?>
            </div>
			<?php the_title( sprintf( '<h3 class="entry-title h2 sm-h5 m-h1"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			<?php if(!empty($trawell_layout['meta'])): ?>
                <div class="entry-meta entry-meta-small"><?php echo trawell_get_meta_data( $trawell_layout['meta'] ); ?></div>
			<?php endif; ?>
			
			<?php if($trawell_layout['excerpt']): ?>
                <div class="entry-content excerpt-small trawell-sm-d-none">
					<?php echo trawell_get_excerpt($trawell_layout['excerpt_limit']); ?>
                </div>
			<?php endif; ?>
		</div>


	</article>
	
</div>