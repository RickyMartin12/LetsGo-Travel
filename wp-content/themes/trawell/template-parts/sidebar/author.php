<div class="widget-mini">
	<?php echo get_avatar(get_the_author_meta('ID'), 150); ?>
	<span class="entry-meta-small opacity-50"><?php echo __trawell('written_by') ?></span>
	<a class="entry-meta-author" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author_meta('display_name'); ?></a>
</div>