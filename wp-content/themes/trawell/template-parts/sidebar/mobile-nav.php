<span class="trawell-action-close"><span><?php echo __trawell('close') ?></span> <i class="o-exit-1" aria-hidden="true"></i></span>

<div class="widget trawell-responsive-nav">
	
	<ul>
		<?php if ( has_nav_menu( 'trawell_menu_primary_1' ) ) : ?>
	    	<?php wp_nav_menu( array( 'theme_location' => 'trawell_menu_primary_1', 'container'=> '', 'menu_class' => '',  'items_wrap' => '%3$s') ); ?>
		<?php endif; ?>

		<?php if ( has_nav_menu( 'trawell_menu_primary_2' ) ) : ?>
	    	<?php wp_nav_menu( array( 'theme_location' => 'trawell_menu_primary_2', 'container'=> '', 'menu_class' => '',  'items_wrap' => '%3$s') ); ?>
		<?php endif; ?>

        <?php if(trawell_get(array('part' => 'header', 'option' => 'responsive_secondary_nav')) && (has_nav_menu('trawell_menu_secondary_1') || has_nav_menu('trawell_menu_secondary_2'))): ?>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children trawell-more-links"><a href="#"><?php echo __trawell('more')?></a><span class="trawell-accordion-nav"><i class="o-angle-down-1"></i></span>
                <ul class="sub-menu">
                    <?php if(has_nav_menu('trawell_menu_secondary_1')): ?>
                        <?php wp_nav_menu( array(
                            'theme_location' => 'trawell_menu_secondary_1',
                            'container'=> '',
                            'menu_class' => '' ) ); ?>
                    <?php endif; ?>
                    <?php if(has_nav_menu('trawell_menu_secondary_2')): ?>
                        <?php wp_nav_menu( array(
                            'theme_location' => 'trawell_menu_secondary_2',
                            'container'=> '',
                            'menu_class' => '' ) ); ?>
                    <?php endif; ?>
    
                </ul>
            </li>
        <?php endif; ?>
	</ul>
	<?php $header_actions = trawell_get(array('part' => 'header', 'option' => 'responsive_actions')); ?>
	<?php if ( !empty( $header_actions ) ): ?>
		<?php foreach ( $header_actions as $element ): ?>
            <ul class="trawell-responsive-item">
				<?php get_template_part( 'template-parts/header/elements/' . $element ); ?>
            </ul>
		<?php endforeach; ?>
	<?php endif; ?>
</div>