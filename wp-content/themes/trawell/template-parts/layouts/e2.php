<div class="col-12 col-md-6">
	
	<?php $trawell_layout = trawell_get_post_layout_options( 'e2' ); ?>
	<article <?php post_class('trawell-item'); ?>>
			
			<div class="entry-header">
				<div class="entry-category pill-medium md-pill-small">
					<?php if($trawell_layout['icon']): ?>
						<?php echo trawell_get_format_icon() ?>
					<?php endif; ?>
					
					<?php if($trawell_layout['category']): ?>
						<?php echo trawell_get_category() ?>
					<?php endif; ?>
                </div>
				<?php the_title( sprintf( '<h3 class="entry-title h2 md-h3 sm-h3 no-margin"><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
				<?php if(!empty($trawell_layout['meta'])): ?>
                    <div class="entry-meta md-entry-meta-small"><?php echo trawell_get_meta_data( $trawell_layout['meta'] ); ?></div>
				<?php endif; ?>
			</div>

            <?php if($trawell_layout['excerpt']): ?>
                <div class="entry-content md-excerpt-small">
                    <?php echo trawell_get_excerpt($trawell_layout['excerpt_limit']); ?>
                </div>
            <?php endif; ?>
	</article>

</div>