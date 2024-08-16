<?php $as_seen_in_options = trawell_get(array('part' => 'sections', 'option' => 'as-seen-in') ); ?>
<?php if ( !empty( $as_seen_in_options['image'] ) ): ?>
    <div class="trawell-section">

        <div class="container">
			
			<?php if ( !empty( $as_seen_in_options['title'] ) ): ?>
                <h4 class="section-title h5"><span><?php echo esc_attr( $as_seen_in_options['title'] ) ?></span></h4>
			<?php endif; ?>

            <img src="<?php echo esc_url( $as_seen_in_options['image']['url'] ); ?>" alt="<?php echo esc_attr(basename ( $as_seen_in_options['image']['url']  )); ?>"/>

        </div>

    </div>
<?php endif; ?>
