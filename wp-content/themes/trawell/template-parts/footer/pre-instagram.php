<?php if(class_exists('Meks_Instagram_Widget')): ?>
	<?php $instagram_feed_key = trawell_get_option('prefooter_instagram_username'); ?>
    <?php the_widget(
        'Meks_Instagram_Widget',
        array(
            'title' => '',
            'username_hashtag' => !empty($instagram_feed_key) ? $instagram_feed_key : 'mekshq',
            'photos_number' => 9,
            'columns' => 6,
            'photo_space' => 0,
            'container_size' => 1200,
            'link_text' => __trawell('instagram_follow'),
        ),
        array(
            'before_widget' => '<div id="%1$s" class="widget widget_meks_instagram container">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title h6">',
            'after_title' => '</h4>',
        )
    ) ?>
<?php else: ?>
    <div class="trawell-msg">
        <p><?php echo wp_kses_post( sprintf( __( 'Please install <a href="%s">Meks Instagram Widget plugin </a>.', 'trawell' ), admin_url('themes.php?page=trawell-plugins') ) ); ?></p>
    </div>
<?php endif; ?>