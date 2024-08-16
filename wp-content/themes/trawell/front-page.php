<?php get_header(); ?>

    <?php if(trawell_has_cover()): ?>
        <?php get_template_part('template-parts/cover/home-' . trawell_get('cover') ); ?>
    <?php endif; ?>

    <div class="trawell-main">

        <?php if ( trawell_has_sidebar( 'left') ): ?>
	        <?php get_sidebar(); ?>
       <?php endif; ?>

        <div class="trawell-sections trawell-front-page">
         
	        <?php get_template_part('template-parts/ads/archive-top'); ?>
            
            <?php $sections = trawell_get('sections'); ?>
            <?php if(!empty($sections)): ?>
	            <?php foreach ( $sections as $type => $section): ?>
		            <?php get_template_part('template-parts/content/home-' . $type  ); ?>
	            <?php endforeach; ?>
            <?php endif; ?>

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