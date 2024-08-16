<?php
/**
 * Template Name: Blank
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <div class="trawell-main">
        
        <div class="trawell-entry trawell-section">
    
            <article <?php post_class( );?>>

                <?php if(trawell_get('page_title')): ?>
                    <div class="entry-header">
                        <?php the_title('<h1 class="entry-title h1 md-h1 sm-h1">', '</h1>') ?>
                    </div>
                <?php endif; ?>
                
                <div class="entry-content">

                    <?php the_content(); ?>
                    
                </div>

            </article>
         
        </div>

    </div>
<?php endwhile; ?>

<?php get_footer(); ?>