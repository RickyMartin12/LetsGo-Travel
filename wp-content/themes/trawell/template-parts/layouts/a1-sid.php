<div class="col-12">
	<?php $trawell_layout = trawell_get_post_layout_options('a1'); ?>
	<article <?php post_class('trawell-item'); ?>>

		<?php $trawell_featured_image = trawell_get_featured_image( 'trawell-a1-sid' ); ?>
		<?php if ($trawell_featured_image): ?>		
			<a href="<?php the_permalink(); ?>" class="entry-image"><?php echo wp_kses_post( $trawell_featured_image); ?></a>
		<?php endif ?>

		<div class="trawell-entry">
			<div class="entry-header">
				<div class="entry-category pill-medium sm-pill-small">
					<?php if($trawell_layout['icon']): ?>
						<?php echo trawell_get_format_icon() ?>
					<?php endif; ?>
					
					<?php if($trawell_layout['category']): ?>
						<?php echo trawell_get_category() ?>
					<?php endif; ?>
                </div>
				<?php the_title( sprintf( '<h3 class="entry-title h2 sm-h2"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
				<?php if(!empty($trawell_layout['meta'])): ?>
				<div class="entry-meta"><?php echo trawell_get_meta_data($trawell_layout['meta']); ?></div>
				<?php endif; ?>
			</div>
			<div class="entry-content sm-excerpt-small">
				<?php if( $trawell_layout['content_type'] == 'content' ) : ?>
					<?php the_content(); ?>
				<?php else: ?>
					<?php echo trawell_get_excerpt( $trawell_layout['excerpt_limit'] ); ?>
				<?php endif; ?>
			</div>
		</div>

	</article>

</div>