<?php $numbers_options = trawell_get(array('part' => 'sections', 'option' => 'numbers') ) ?>
<?php if(!empty($numbers_options)): ?>
    <div class="trawell-section">
    
        <div class="container">
	
	        <?php if(!empty($numbers_options['title'])): ?>
                <h3 class="section-title h5"><span><?php echo esc_attr($numbers_options['title']); ?></span></h3>
	        <?php endif; ?>
            
            <ul class="trawell-numbers">
                <?php foreach ($numbers_options as $key => $numbers_option) :?>
                    <?php if(!empty($numbers_option['counter_' . $key . '_title']) && !empty($numbers_option['counter_' . $key . '_number'])): ?>
                        <li><span class="display-2"><?php echo esc_attr($numbers_option['counter_' . $key . '_number']); ?></span><span class="trawell-numbers-meta"><?php echo esc_attr($numbers_option['counter_' . $key . '_title']); ?></span></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
    
        </div>
        
    </div>
<?php endif; ?>