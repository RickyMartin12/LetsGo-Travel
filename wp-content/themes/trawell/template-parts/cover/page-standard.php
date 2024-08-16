<div class="trawell-cover trawell-cover-color trawell-cover-image-text">

	<div class="trawell-cover-item item-overlay trawell-item-color-overlay trawell-flex align-items-center justify-content-center text-center "> 
    
    <?php if( $trawell_featured_image = trawell_get_featured_image( 'trawell-cover', true) ): ?>
            <div class="entry-image">
                <?php echo wp_kses_post( $trawell_featured_image ); ?>
	
	            <?php if( trawell_get( 'fimg_cap' ) && $caption = get_post( get_post_thumbnail_id())->post_excerpt) : ?>
                    <figure class="wp-caption-text"><?php echo wp_kses_post( $caption );  ?></figure>
	            <?php endif; ?>
            </div>
     <?php endif; ?>


    <div class="entry-header element-pos-rel cover-entry">
        <?php the_title('<h1 class="entry-title display-1 md-h1 sm-h1 no-margin">', '</h1>'); ?>
    </div>

	</div>

</div>