<?php get_header(); ?>

    <div class="trawell-cover trawell-cover-color trawell-cover-image-text">

        <div class="trawell-cover-item item-overlay trawell-item-color-overlay trawell-flex align-items-center justify-content-center text-center ">
			
			<?php $trawell_featured_image = trawell_get('fimg'); ?>
			<?php if( !empty($trawell_featured_image['url']) ): ?>
                <div class="entry-image">
                    <img src="<?php echo esc_attr($trawell_featured_image['url']); ?>" alt="<?php echo esc_attr(basename ( $trawell_featured_image['url']  )); ?>">
                </div>
			<?php endif; ?>


            <div class="entry-header element-pos-rel cover-entry">
                <h1 class="entry-title display-1 md-h1 sm-h1 no-margin"><?php echo esc_html( trawell_get('title') ); ?></h1>
            </div>

        </div>

    </div>

    <div class="trawell-main">

        <div class="trawell-entry trawell-section">

            <article <?php post_class( 'trawell-post-single' ); ?>>

                <div class="entry-content">
                    <p><?php echo esc_html( trawell_get( 'text' ) ); ?></p>
                    <?php get_search_form(); ?>
                </div>

            </article>
            
        </div>

        <?php if ( trawell_has_sidebar( 'none') ): ?>
            <?php get_template_part( 'template-parts/sidebar/none' ); ?>
       <?php endif; ?>

    </div>

<?php get_footer(); ?>