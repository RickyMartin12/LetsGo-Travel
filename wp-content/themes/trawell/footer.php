<?php if(trawell_get('footer_show')): ?>
    
    <?php if( trawell_get( array('part'=>'footer', 'option' => 'prefooter') ) ): ?>
        <?php get_template_part('template-parts/footer/pre'); ?>
    <?php endif; ?>
    
    <?php if( trawell_get( array('part'=>'footer', 'option' => 'widgets') ) ): ?>
        <?php get_template_part('template-parts/footer/widgets'); ?>
    <?php endif; ?>
	
	<?php if( trawell_get( 'gallery_loaded') ): ?>
		<?php get_template_part('template-parts/footer/gallery-placeholder'); ?>
	<?php endif; ?>

<?php endif; ?>

<div class="trawell-body-overlay"></div>


<?php wp_footer(); ?>
	
	</body>
</html>