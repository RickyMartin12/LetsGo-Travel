<div class="trawell-top-bar">
	<div class="container d-flex justify-content-between align-items-center">
        <?php $top_bar_actions = trawell_get(array('part' => 'header', 'option' => 'top')) ?>
		<?php if( !empty($top_bar_actions['l'])): ?>
            <div class="trawell-slot-l">
				<?php get_template_part( 'template-parts/header/elements/'. $top_bar_actions['l'] ); ?>
            </div>
		<?php endif; ?>
		
		<?php if( !empty($top_bar_actions['c'])): ?>
            <div class="trawell-slot-c">
				<?php get_template_part( 'template-parts/header/elements/'. $top_bar_actions['c'] ); ?>
            </div>
		<?php endif; ?>
		
		<?php if( !empty($top_bar_actions['r'])): ?>
            <div class="trawell-slot-r">
				<?php get_template_part( 'template-parts/header/elements/'. $top_bar_actions['r'] ); ?>
            </div>
		<?php endif; ?>
	</div>
</div>