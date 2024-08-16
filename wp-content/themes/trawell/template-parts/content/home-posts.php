<?php
$posts_options = trawell_get(array('part' => 'sections', 'option' => 'posts') );
$query = $posts_options['query'];
?>
<?php if(!empty($query) && $query->have_posts()): ?>
        <div class="trawell-section trawell-layout-<?php echo esc_attr($posts_options['layout'])?>">

            <div class="container">
				
				<?php if(!empty($posts_options['title'])): ?>
                    <h3 class="section-title h5"><span><?php echo wp_kses_post($posts_options['title']); ?></span></h3>
				<?php endif; ?>

                <div class="row trawell-posts">
                    
                    <?php if( $posts_options['layout'] == "map"): ?>
                        
                        <?php include locate_template( 'template-parts/layouts/'. $posts_options['layout'] . '.php' ); ?>
                    
                    <?php else: ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <h1>Teste Maps</h1>
                            <?php get_template_part( 'template-parts/layouts/'. $posts_options['loop'] ); ?>
                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>

                <?php if ( $pagination =  trawell_get('pagination') ): ?>
                           
                    <?php
                        global $wp_query;
                        $temp_query = $wp_query;
                        $wp_query = $query;
                        get_template_part( 'template-parts/pagination/'. $pagination );
                        $wp_query = $temp_query;
                    ?>
                <?php endif; ?>

                <?php if ( $cta = trawell_get('cta') ): ?>
                           <?php echo wp_kses_post($cta); ?>
                <?php endif; ?>

            </div>

        </div>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
