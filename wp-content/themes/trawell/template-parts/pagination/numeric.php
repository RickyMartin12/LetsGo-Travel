<?php if( $pagination = get_the_posts_pagination( array( 'mid_size' => 2, 'prev_text' => __trawell( 'previous_posts' ), 'next_text' => __trawell( 'next_posts' ) ) ) ) : ?>
	<div class="trawell-pagination alignnone">
		<?php echo wp_kses_post( $pagination ); ?>
	</div>
<?php endif; ?>
