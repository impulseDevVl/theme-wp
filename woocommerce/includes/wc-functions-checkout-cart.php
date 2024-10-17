<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

add_action('woocommerce_before_cart', 'chechkout_cart_inner_open', 10);
function chechkout_cart_inner_open()
{
    echo '<div class="checkout-cart__inner">';
}
add_action('woocommerce_after_cart', 'chechkout_cart_inner_close', 5);
function chechkout_cart_inner_close()
{
    echo '</div>';
}

// убираем доставку из корзины
// add_filter( 'woocommerce_cart_needs_shipping', 'filter_cart_needs_shipping' );
// function filter_cart_needs_shipping( $needs_shipping ) {
//     if ( is_cart() ) {
//         $needs_shipping = false;
//     }
//     return $needs_shipping;
// }


