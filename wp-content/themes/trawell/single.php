<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <?php if( trawell_has_cover() ): ?>
        <?php get_template_part( 'template-parts/cover/single-' . trawell_get('cover') ); ?>
    <?php endif; ?>

    <?php get_template_part('template-parts/ads/below-header') ?>

    <div class="trawell-main">

        <?php if ( trawell_has_sidebar( 'left') ): ?>
	        <?php get_sidebar(); ?>
       <?php endif; ?>

       <?php if ( trawell_has_sidebar_mini( 'left')): ?>
            <?php get_template_part( 'template-parts/sidebar/single-mini' ); ?>
       <?php endif; ?>

        <div class="trawell-entry trawell-section">

            <article <?php post_class( 'trawell-post-single trawell-item');?> >

                <?php echo trawell_breadcrumbs(); ?>

                <?php if( trawell_has_entry_media() ): ?>
                    <?php get_template_part('template-parts/content/single-media-'.trawell_get('media') ); ?>
                <?php endif; ?>

                <?php if( trawell_has_entry_header() ): ?>
                    <?php get_template_part('template-parts/content/single-entry-header' ); ?>
                <?php endif; ?>

                <div class="entry-content">
	                <?php if( trawell_get('headline') && has_excerpt() ): ?>
                        <div class="entry-headline h5">
			                <?php the_excerpt(); ?>
                        </div>
	                <?php endif; ?>
                    
                    <?php get_template_part('template-parts/ads/single-top'); ?>

                    <?php the_content(); ?>

                    <?php get_template_part('template-parts/ads/single-bottom'); ?>
                    
                    <?php wp_link_pages( array('before' => '<div class="trawell-paginated">', 'after' => '</div>', 'link_before' => '<span>', 'link_after'  => '</span>') ); ?>
                    
	                <?php if(trawell_get('tags')): ?>
                        <?php if ( has_tag() ): ?>
                            <div class="entry-tags">
                                <?php the_tags(false, ' ', false); ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

            </article>
            
            <?php if(trawell_get('author')): ?>
	            <?php get_template_part('template-parts/content/author'); ?>
            <?php endif; ?>
            
            <?php if(trawell_get('related')): ?>
	            <?php get_template_part('template-parts/content/related'); ?>
            <?php endif; ?>
            
            <?php comments_template(); ?>
        </div>


        <?php if ( trawell_has_sidebar( 'right') ): ?>
            <?php get_sidebar(); ?>
       <?php endif; ?>
        
        <?php if ( trawell_has_sidebar_mini( 'right')): ?>
           <?php get_template_part( 'template-parts/sidebar/single-mini' ); ?>
       <?php endif; ?>

        <?php if ( trawell_has_sidebar( 'none') ): ?>
            <?php get_template_part( 'template-parts/sidebar/none' ); ?>
       <?php endif; ?>

    </div>
<?php endwhile; ?>

<?php get_footer(); ?>