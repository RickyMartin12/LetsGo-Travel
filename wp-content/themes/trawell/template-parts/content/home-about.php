<?php $about_me = trawell_get(array('part' => 'sections', 'option' => 'about') ); ?>
<?php if ( !empty( $about_me['text'] ) ): ?>
<div class="trawell-section trawell-about">

	<div class="container">
		<?php if ( !empty( $about_me['title'] ) ): ?>
            <h3 class="section-title h5"><span><?php echo esc_attr( $about_me['title'] ) ?></span></h3>
		<?php endif; ?>
		<div class="row">
            <div class="col-12 col-lg-6 text-center">
                <?php if(!empty($about_me['image'])): ?>
                    <?php echo wp_kses_post($about_me['image']); ?>
                <?php endif; ?>
            </div>
			<div class="col-12 col-lg-6">
				<?php echo wpautop(wp_kses_post($about_me['text'])); ?>
				
				<?php if(!empty($about_me['button_1_text']) && !empty($about_me['button_1_url'])): ?>
                    <a href="<?php echo esc_url($about_me['button_1_url']); ?>" class="trawell-button"><?php echo esc_attr($about_me['button_1_text']); ?></a>
				<?php endif; ?>
				<?php if(!empty($about_me['button_2_text']) && !empty($about_me['button_2_url'])): ?>
                    <a href="<?php echo esc_url($about_me['button_2_url']); ?>" class="trawell-button trawell-button-hollow"><?php echo esc_attr($about_me['button_2_text']); ?></a>
				<?php endif; ?>
			</div>
		</div>

	</div>
	
</div>
<?php endif; ?>