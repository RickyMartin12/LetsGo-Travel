<?php $items = trawell_get_prev_next_posts(); ?>

<?php if( !empty($items) ) : ?>

<nav class="prev-next-nav">
		
		<?php if(!empty($items['prev'])) : ?>
			<div class="trawell-prev-link">
				<span class="entry-meta-small opacity-50"><?php echo wp_kses_post( $items['prev']['label']); ?></span>
				<a href="<?php echo esc_url( get_permalink( $items['prev']['id'] ) );?>" rel="prev">
					<span class="trawell-prev-next-link"><?php echo get_the_title( $items['prev']['id'] ); ?></span>
				</a>		
			</div>
		<?php endif; ?>

		<?php if(!empty($items['next'])) : ?>

			<div class="trawell-next-link">
				<span class="entry-meta-small opacity-50"><?php echo wp_kses_post( $items['next']['label']); ?></span>
				<a href="<?php echo esc_url( get_permalink( $items['next']['id'] ) );?>" rel="next">
					<span class="trawell-prev-next-link"><?php echo get_the_title( $items['next']['id'] );?></span>
				</a>		
			</div>
		<?php endif; ?>

</nav>

<?php endif; ?>