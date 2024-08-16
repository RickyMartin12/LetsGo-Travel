<?php $custom_content = trawell_get(array('part' => 'sections', 'option' => 'custom-content') ); ?>
<?php if ( !empty( $custom_content['content'] ) ): ?>
<div class="trawell-section trawell-custom-content">

	<div class="container">
		
		<?php if ( !empty( $custom_content['title'] ) ): ?>
            <h3 class="section-title h5"><span><?php echo esc_html( $custom_content['title'] ) ?></span></h3>
		<?php endif; ?>
		<div class="row">
			<div class="col-12">
				<?php echo wpautop(wp_kses_post(do_shortcode($custom_content['content']))); ?>
			</div>
		</div>

	</div>
	
</div>
<?php endif; ?>