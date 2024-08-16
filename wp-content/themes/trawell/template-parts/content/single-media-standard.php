<?php if( trawell_get('fimg') && $trawell_featured_image = trawell_get_featured_image( trawell_get('image-size'), true ) ): ?>
    <div class="entry-image">
        <?php echo wp_kses_post( $trawell_featured_image ); ?>
	
	    <?php if( trawell_get( 'fimg_cap' ) && $caption = get_post( get_post_thumbnail_id())->post_excerpt) : ?>
            <figure class="wp-caption-text"><?php echo wp_kses_post( $caption );  ?></figure>
	    <?php endif; ?>
    </div>
<?php endif; ?>