<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php if( trawell_has_cover() ): ?>
        <?php get_template_part( 'template-parts/cover/page-' . trawell_get('cover') ); ?>
    <?php endif; ?>

    <div class="trawell-main">

        <?php if ( trawell_has_sidebar( 'left') ): ?>
	        <?php get_sidebar(); ?>
       <?php endif; ?>

        <div class="trawell-entry trawell-section trawell-section-page">
	
            <article <?php post_class( 'trawell-post-single');?>>
    
                <?php if(!trawell_has_cover()): ?>
                    
                    <?php if( trawell_get('fimg') && $trawell_featured_image = trawell_get_featured_image( 'trawell-content-wide', true ) ): ?>
                        <div class="entry-image">
                            <?php echo wp_kses_post( $trawell_featured_image ); ?>
	
	                        <?php if( trawell_get( 'fimg_cap' ) && $caption = get_post( get_post_thumbnail_id())->post_excerpt) : ?>
                                <figure class="wp-caption-text"><?php echo wp_kses_post( $caption );  ?></figure>
	                        <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-header">
                        <?php the_title('<h1 class="entry-title h1 md-h1 sm-h1">', '</h1>') ?>
                    </div>

                <?php endif; ?>
                
                <div class="entry-content">
                    <?php get_template_part('template-parts/ads/single-top'); ?>

                    <?php the_content(); ?>

                    <?php get_template_part('template-parts/ads/single-bottom'); ?>
                     
                    <?php wp_link_pages( array('before' => '<div class="trawell-paginated">', 'after' => '</div>', 'link_before' => '<span>', 'link_after'  => '</span>') ); ?>
                    
                </div>

            </article>

            <?php comments_template(); ?>
         
        </div>

       <?php if ( trawell_has_sidebar( 'right') ): ?>
	       <?php get_sidebar(); ?>
       <?php endif; ?>

        <?php if ( trawell_has_sidebar( 'none') ): ?>
            <?php get_template_part( 'template-parts/sidebar/none' ); ?>
       <?php endif; ?>

    </div>
<?php endwhile; ?>
<?php get_footer(); ?>