<li class="trawell-actions-button trawell-social-icons">
	<span>
		<i class="o-share-1"></i>
	</span>
<?php if (has_nav_menu('trawell_menu_social')): ?>
    <?php wp_nav_menu(array(
    'theme_location' => 'trawell_menu_social',
    'container'      => 'trawell-menu-social',
    'menu_id'        => 'trawell-menu-social',
    'menu_class'     => 'sub-menu trawell-soc-menu-icons',
    'link_before'    => '<span class="trawell-social-name">',
    'link_after'     => '</span>')); ?>
<?php endif; ?>
</li>