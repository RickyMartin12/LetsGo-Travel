<?php
$slider_options = trawell_get('slider-posts');
$posts_query = $slider_options['query'];
?>
<?php if ($posts_query->have_posts()): ?>
    <div class="trawell-cover trawell-cover-slider">

        <?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
            <div class="trawell-cover-item item-overlay trawell-item-color-overlay trawell-flex align-items-center justify-content-center text-center">

                <a href="<?php the_permalink(); ?>" class="entry-image"><?php echo trawell_get_featured_image('trawell-cover'); ?></a>

                <div class="entry-header element-pos-rel cover-entry">
                    <div class="entry-category justify-content-center md-pill-medium sm-pill-small">
                        <?php if($slider_options['icon']): ?>
                            <?php echo trawell_get_format_icon(); ?>
                        <?php endif; ?>

                        <?php if($slider_options['category']): ?>
	                        <?php echo trawell_get_category(); ?>
                        <?php endif; ?>
                    </div>
                    <?php the_title('<h3 class="entry-title display-1 md-h1 sm-h1 no-margin"><a href="' . get_the_permalink() . '">', '</a></h3>'); ?>
                    <?php if(!empty($slider_options['meta'])): ?>
                        <div class="entry-meta md-entry-meta-small sm-entry-meta-small">
		                    <?php echo trawell_get_meta_data($slider_options['meta']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        <?php endwhile; ?>

    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>