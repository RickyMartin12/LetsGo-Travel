<div class="col-12 col-md-6">
	
	<?php $trawell_layout = trawell_get_post_layout_options( 'b2' ); ?>
	<article <?php post_class('trawell-item row'); ?>>

		<div class="col-5">
			<?php $trawell_featured_image = trawell_get_featured_image('trawell-b2-sid'); ?>
			<?php if ($trawell_featured_image): ?>		
				<a href="<?php the_permalink(); ?>" class="entry-image"><?php echo wp_kses_post( $trawell_featured_image); ?></a>
			<?php endif; ?>
		</div>

		<div class="col-7 no-left-padding">	
			<div class="entry-header">
				<div class="entry-category color-text">
					<?php if($trawell_layout['icon']): ?>
						<?php echo trawell_get_format_icon() ?>
					<?php endif; ?>
					
					<?php if($trawell_layout['category']): ?>
						<?php echo trawell_get_category() ?>
					<?php endif; ?>
                </div>
				<?php the_title( sprintf( '<h3 class="entry-title h6 sm-h6 md-h4"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
				<?php if(!empty($trawell_layout['meta'])): ?>
                    <div class="entry-meta"><?php echo trawell_get_meta_data( $trawell_layout['meta'] ); ?></div>
				<?php endif; ?>
			</div>
		</div>

	</article>

</div>