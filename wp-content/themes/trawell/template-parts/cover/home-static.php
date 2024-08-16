<?php
$static_options = trawell_get('static');
?>
    <div class="trawell-cover  trawell-cover-color trawell-cover-image-text">
        <div class="trawell-cover-item item-overlay trawell-item-color-overlay trawell-flex align-items-center justify-content-center text-center">
            
            <?php if($static_options['type'] == 'image'): ?>
	            <?php if(!empty($static_options['image'])): ?>
                    <div class="entry-image <?php echo esc_attr($static_options['overlayer']); ?>">
                        <?php echo wp_kses_post($static_options['image']); ?>
                    </div>
	            <?php endif; ?>
            <?php endif; ?>
	
	        <?php if($static_options['type'] == 'video'): ?>
		        <?php if(!empty($static_options['video']['url'])): ?>
                    <div class="trawell-cover-video-item">
                        <div class="entry-image <?php echo esc_attr($static_options['overlayer']); ?>" >
                        <video preload="auto" autoplay="" loop="">
                            <source src="<?php echo esc_url($static_options['video']['url']); ?>" type="video/mp4"> <?php _e('Your browser does not support the video tag. I suggest you upgrade your browser.', 'trawell') ?>
                        </video>
                        </div>
                    </div>
		        <?php endif; ?>
	        <?php endif; ?>
	
	        <?php if($static_options['show_custom_content']): ?>
		        <?php if(!empty($static_options['custom_content'])): ?>
                    <div class="trawell-custom-cover-content"><?php echo wpautop(do_shortcode($static_options['custom_content'])); ?></div>
		        <?php endif; ?>
	        <?php else: ?>
                <div class="entry-header element-pos-rel cover-entry">
	
	                <?php if(!empty($static_options['title'])): ?>
                        <h2 class="h1 md-h1 sm-h1"><?php echo esc_attr($static_options['title']); ?></h2>
	                <?php endif; ?>
	                <?php if(!empty($static_options['text'])): ?>
                        <p class="trawell-entry"><?php echo esc_attr($static_options['text']); ?></p>
	                <?php endif; ?>
	                <?php if(!empty($static_options['button_1_text']) && !empty($static_options['button_1_url'])): ?>
                        <a href="<?php echo esc_url($static_options['button_1_url']); ?>" class="trawell-button"><?php echo esc_attr($static_options['button_1_text']); ?></a>
	                <?php endif; ?>
	                <?php if(!empty($static_options['button_2_text']) && !empty($static_options['button_2_url'])): ?>
                        <a href="<?php echo esc_url($static_options['button_2_url']); ?>" class="trawell-button trawell-button-hollow"><?php echo esc_attr($static_options['button_2_text']); ?></a>
	                <?php endif; ?>
                
                </div>
	        <?php endif; ?>

        </div>

    </div>