<?php $authors = trawell_get('authors'); ?>
<?php if (!empty($authors)) : ?>
    <?php foreach ( $authors as $author ) : ?>
        <div class="trawell-author clearfix-after">
            <?php echo get_avatar($author->ID, 150); ?>
            <h5 class="h4 author-box-title"><?php echo get_the_author_meta('display_name', $author->ID); ?></h5>
            <span class="entry-meta entry-meta-small opacity-50"><?php echo count_user_posts($author->ID); ?> <?php echo __trawell('articles'); ?></span>
            <div class="excerpt-small">
                <?php echo wpautop(get_the_author_meta('description', $author->ID)); ?>
                <?php echo trawell_get_author_links($author->ID); ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>