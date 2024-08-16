<aside class="trawell-sidebar">
	
	<?php get_template_part( 'template-parts/sidebar/mobile-nav' ); ?>
	
	<?php $sidebar = trawell_get('sidebar'); ?>

	<?php  if ( isset($sidebar['classic']) ): ?>	
		<?php dynamic_sidebar($sidebar['classic'] ); ?>
	<?php endif; ?>

	
		<?php  if ( isset($sidebar['sticky']) && is_active_sidebar($sidebar['sticky'])): ?>
			<div class="trawell-sidebar-sticky">
				<?php dynamic_sidebar($sidebar['sticky'] ); ?>
			</div>
		<?php endif; ?>
	
</aside>