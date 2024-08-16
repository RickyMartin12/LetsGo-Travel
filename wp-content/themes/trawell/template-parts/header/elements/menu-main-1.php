<?php if ( has_nav_menu( 'trawell_menu_primary_1' ) ) : ?>
    <?php wp_nav_menu( array( 'theme_location' => 'trawell_menu_primary_1', 'container'=> 'nav', 'menu_class' => 'menu-main',  ) ); ?>
<?php else: ?>
    <?php if ( current_user_can( 'manage_options' ) ): ?>
    	<nav>
        <ul class="menu-main">
            <li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' )); ?>"><?php esc_html_e( 'Click here to add main navigation', 'trawell' ); ?></a></li>
        </ul>
        </nav>
    <?php endif; ?>
<?php endif; ?>
