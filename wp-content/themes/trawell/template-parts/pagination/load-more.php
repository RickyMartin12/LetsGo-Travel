<?php if ( $more_link = get_next_posts_link( __trawell('load_more') ) ) : ?>
	<div class="trawell-pagination alignnone">
		<nav class="navigation load-more">
		    <?php echo wp_kses_post( $more_link ); ?>
		    <div class="trawell-loader">
				  <div class="double-bounce1"></div>
				  <div class="double-bounce2"></div>
		    </div>
		</nav>
	</div>
<?php endif; ?>