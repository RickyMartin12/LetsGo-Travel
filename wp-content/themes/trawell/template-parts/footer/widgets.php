<?php
$columns = explode( "-", trawell_get_option('footer_layout') );
?>
<footer class="trawell-footer">
    <div class="footer-widgets container">
        <div class="row">
            <?php $i = 1; ?>
            <?php foreach ($columns as $column) :?>
	            <?php if(is_active_sidebar('trawell_footer_sidebar_'.$i)): ?>
                    <div class="col-12 <?php echo esc_attr('col-lg-'.$column . ' col-md-'. 12/count($columns) ); ?>">
			            <?php dynamic_sidebar('trawell_footer_sidebar_'.$i);?>
                    </div>
	            <?php endif; ?>
                <?php $i++; ?>
            <?php endforeach; ?>
        </div>
    </div>
</footer>