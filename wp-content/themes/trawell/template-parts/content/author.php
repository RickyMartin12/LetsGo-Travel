<div class="trawell-author clearfix-after">
    <?php echo get_avatar(get_the_author_meta('ID'), 150); ?>
    <span class="entry-meta-small opacity-50"><?php echo __trawell('about_the_author') ?></span>
    <h5 class="h4 author-box-title"><?php echo get_the_author_meta('display_name'); ?></h5>
    <div class="excerpt-small">
       	<?php echo wpautop(get_the_author_meta('description')); ?>
        <?php echo trawell_get_author_links(get_the_author_meta('ID')); ?>
    </div>
</div>