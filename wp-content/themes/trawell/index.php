<?php get_header(); ?>

<?php if( trawell_has_cover() ): ?>
     <?php get_template_part( 'template-parts/cover/archive-' . trawell_get('cover') ); ?>
<?php endif; ?>

<div class="trawell-main">
    
    <?php if ( trawell_has_sidebar( 'left') ): ?>
	    <?php get_sidebar(); ?>
    <?php endif; ?>

    <div class="trawell-sections">
        
        <?php get_template_part('template-parts/ads/archive-top'); ?>

        <div class="trawell-section trawell-layout-<?php echo esc_attr( trawell_get('layout') ); ?>">
            
            <div class="container">
                          
                <?php echo trawell_breadcrumbs(); ?>
                
                <?php if( !trawell_has_cover() || trawell_get('cover') == 'map' ): ?>
                     <?php get_template_part( 'template-parts/content/archive' ); ?>
                <?php endif; ?>
                
                <?php if( have_posts() ) : ?>

                    <div class="row trawell-posts">

                        <?php while( have_posts() ) : the_post(); ?>
                            
                            <?php get_template_part( 'template-parts/layouts/'.trawell_get('loop') ); ?>
                        
                        <?php endwhile; ?>

                    </div>

                    <?php if ( $pagination =  trawell_get('pagination') ): ?>
                        <?php get_template_part( 'template-parts/pagination/'. $pagination ); ?>
                    <?php endif; ?>

                <?php else: ?>
                        <?php get_template_part( 'template-parts/content/empty' ); ?>
                <?php endif; ?>
	
	            <?php get_template_part('template-parts/ads/above-footer') ?>

            </div>

        </div>

        <?php get_template_part('template-parts/ads/archive-bottom'); ?>

    </div>


    <?php if ( trawell_has_sidebar( 'right') ): ?>
	    <?php get_sidebar(); ?>
    <?php endif; ?>

    <?php if ( trawell_has_sidebar( 'none') ): ?>
        <?php get_template_part( 'template-parts/sidebar/none' ); ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>