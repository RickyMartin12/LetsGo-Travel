<?php
$slider_options = trawell_get('slider-categories');
?>
<?php if (!empty($slider_options['query'])): ?>
    <?php $categories = $slider_options['query']; ?>
    <div class="trawell-cover trawell-cover-slider">

        <?php foreach ( $categories as $category ) :?>
            <div class="trawell-cover-item item-overlay trawell-item-color-overlay trawell-flex align-items-center justify-content-center text-center">

                <a href="<?php the_permalink(); ?>" class="entry-image"><?php echo trawell_get_category_featured_image('trawell-cover', $category->term_id); ?></a>

                <div class="entry-header element-pos-rel cover-entry">
                    <h3 class="entry-title display-1 md-h1 sm-h1 no-margin"><a href="<?php echo get_category_link($category->term_id)?>"><?php echo esc_attr($category->name); ?></a></h3>
                    <?php if(!empty($slider_options['meta'])): ?>
                        <div class="entry-meta md-entry-meta-small sm-entry-meta-small">
                            <span class="meta-item"><?php echo esc_attr($category->count) . ' ' . __trawell('articles'); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>