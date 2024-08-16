<?php
/**
 * Template Name: Authors
 */
?>
<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php if( trawell_has_cover() ): ?>
        <?php get_template_part( 'template-parts/cover/page-' . trawell_get('cover') ); ?>
    <?php endif; ?>

    <div class="trawell-main">

        <?php if ( trawell_has_sidebar( 'left') ): ?>
	        <?php get_sidebar(); ?>
       <?php endif; ?>

        <div class="trawell-entry trawell-section">
	        
            <article <?php post_class( 'trawell-post-single');?>>

                <?php if ( trawell_has_entry_content() ): ?>    
                    <div class="archive-heading trawell-entry">
                <?php endif; ?>

                    <?php if(!trawell_has_cover()): ?>
                        <?php the_title('<h1 class="archive-title h1">', '</h1>') ?>
                    <?php endif; ?>

                <?php if ( trawell_has_entry_content() ): ?>    
                        <?php the_content(); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content trawell-page-authors">
                    <?php get_template_part( 'template-parts/content/page-authors' ); ?>
                </div>

            </article>
         
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