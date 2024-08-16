<?php if ( has_nav_menu( 'trawell_menu_prefooter' ) ) : ?>
    <?php wp_nav_menu( array( 'theme_location' => 'trawell_menu_prefooter') ); ?>
<?php else: ?>
	<?php if ( current_user_can( 'manage_options' ) ): ?>
        <nav class="trawell-pre-footer">
            <ul class="menu">
                <li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' )); ?>"><?php esc_html_e( 'Click here to add prefooter navigation', 'trawell' ); ?></a></li>
            </ul>
        </nav>
	<?php endif; ?>
<?php endif; ?>
