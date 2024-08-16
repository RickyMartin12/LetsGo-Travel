<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
    <?php if(trawell_get( 'header_show' )): ?>
    
        <?php if( trawell_get(array('part' => 'header', 'option' => 'top') ) ): ?>
            <?php get_template_part('template-parts/header/top-bar'); ?>
        <?php endif; ?>
    
        <header id="trawell-header" class="trawell-header">
            <div class="container d-flex justify-content-between align-items-center">
                <?php get_template_part('template-parts/header/layout-' . trawell_get( array('part' => 'header', 'option' => 'layout'))); ?>
            </div>
        </header>
    
        <?php if(trawell_get(array('part' => 'header', 'option' => 'sticky'))): ?>
            <?php get_template_part('template-parts/header/sticky'); ?>
        <?php endif; ?>

    <?php endif; ?>