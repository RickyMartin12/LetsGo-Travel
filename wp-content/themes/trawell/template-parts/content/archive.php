<?php $content = trawell_get('content'); ?>

<?php if(!empty($content)) : ?>
<div class="archive-heading trawell-entry">
	<?php if (!empty($content['title'])): ?>
    	<h1 class="archive-title h1 md-h1 sm-h1"><?php echo wp_kses_post($content['title']); ?></h1>
	<?php endif; ?>
	<?php if (!empty($content['meta'])): ?>
    	<span class="archive-meta entry-meta md-entry-meta-middle sm-entry-meta-small"><?php echo wp_kses_post($content['meta']); ?> <?php echo __trawell('articles'); ?></span>
	<?php endif; ?>
	<?php if (!empty($content['desc'])): ?>
    	<?php echo wpautop( $content['desc'] ); ?>
	<?php endif; ?>
</div>
<?php endif; ?>