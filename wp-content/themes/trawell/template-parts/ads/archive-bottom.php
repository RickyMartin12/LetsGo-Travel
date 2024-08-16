<?php if( $ad = trawell_get_option('ad_archive_bottom') ): ?>
	<div class="trawell-section">
		<div class="container">
			<div class="trawell-ad trawell-ad-archive-bottom"><?php echo do_shortcode( $ad ); ?></div>
		</div>
	</div>
<?php endif; ?>