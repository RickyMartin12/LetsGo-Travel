<?php if ( trawell_is_woocommerce_active() ): ?>
    <?php $elements = trawell_woocommerce_cart_elements(); ?>
    <li class="trawell-actions-button trawell-cart-icon">
        <a class="trawell-custom-cart" href="<?php echo esc_url($elements['cart_url']); ?>">
            <i class="o-cart-1"></i>
            <?php if( $elements['products_count'] > 0 ) : ?>
                <span class="trawell-cart-count pulse"><?php echo absint($elements['products_count']); ?></span>
            <?php endif; ?>
            <span class="trawell-cart-text"><?php echo __trawell('cart'); ?></span>
        </a>
    </li>
<?php endif; ?>
