<?php
$categories_options = trawell_get(array('part' => 'sections', 'option' => 'categories') );
?>
<?php if(!empty($categories_options['query']) ): ?>
    <?php $categories = $categories_options['query'] ?>
    <div class="trawell-section trawell-layout-cat-<?php echo esc_attr($categories_options['layout'])?>">
    
        <div class="container">
            <?php if(!empty($categories_options['title'])): ?>
                <h3 class="section-title h5"><span><?php echo esc_attr($categories_options['title']); ?></span></h3>
            <?php endif; ?>
    
            <div class="row">
                <?php if($categories_options['layout'] == 'map'): ?>
	                <?php include locate_template( 'template-parts/layouts/cat-'.$categories_options['layout'] . '.php' ); ?>
                <?php else: ?>
	                <?php foreach ($categories as $category) :?>
		                <?php include( locate_template('template-parts/layouts/cat-' . $categories_options['loop'] . '.php') ); ?>
	                <?php endforeach; ?>
                <?php endif; ?>
            </div>
    
        </div>
        
    </div>
<?php endif; ?>
