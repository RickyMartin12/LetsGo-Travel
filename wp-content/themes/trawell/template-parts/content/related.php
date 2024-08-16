<?php $related = trawell_generate_default_related_query(get_the_ID()); ?>
<?php if ($related->have_posts()): ?>
    <div class="trawell-section trawell-layout-b2 trawell-related">

        <div class="container">

            <h3 class="section-title h5"><span><?php echo __trawell('related_posts') ?></span></h3>

            <div class="row">
                <?php while ($related->have_posts()) : $related->the_post(); ?>
                    <div class="col-12">
    
                        <article class="trawell-item row">

                            
                                <?php $trawell_featured_image = trawell_get_featured_image('trawell-b1-sid'); ?>
                                
                                <?php if ($trawell_featured_image): ?>   
                                <div class="col-5">   
                                    <a href="<?php the_permalink(); ?>" class="entry-image"><?php echo wp_kses_post( $trawell_featured_image); ?></a>
                                </div>
                                <?php endif; ?>
                            

                            <div class="col-7 no-left-padding">
                                <div class="entry-header">
                                    <div class="entry-category color-text"><?php echo trawell_get_category() ?></div>
                                    <?php the_title('<h3 class="entry-title h4 sm-h6"><a href="' . get_the_permalink() . '">', '</a></h3>') ?>
                                    <div class="entry-meta entry-meta-small">
                                        <?php echo trawell_get_meta_data( array('date')); ?>
                                    </div>
                                </div>
                            </div>

                        </article>

                    </div>
                <?php endwhile; ?>
            </div>

        </div>

    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>