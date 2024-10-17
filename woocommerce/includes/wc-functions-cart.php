<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('estore_woocommerce_cart_link_fragment')) {
    /**
     * Cart Fragments.
     *
     * Ensure cart contents update when products are added to the cart via AJAX.
     *
     * @param array $fragments Fragments to refresh via AJAX.
     * @return array Fragments to refresh via AJAX.
     */
    add_filter('woocommerce_add_to_cart_fragments', 'estore_woocommerce_cart_link_fragment');
    function estore_woocommerce_cart_link_fragment($fragments)
    {
        ob_start();
        store_woocommerce_cart_link();
        $fragments['a.cart-contents'] = ob_get_clean();

        return $fragments;
    }
}



function store_woocommerce_cart_link()
{
?>
    <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('Посмотреть корзину', 'estore'); ?>">
        <div class="headerBottomCartMobileIcon">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="40" height="40" rx="10" fill="white" />
                <path d="M10.25 10.25C9.83579 10.25 9.5 10.5858 9.5 11C9.5 11.4142 9.83579 11.75 10.25 11.75H11.6357C11.8056 11.75 11.9543 11.8642 11.998 12.0284L14.5558 21.6199C12.9418 22.0385 11.75 23.5051 11.75 25.25C11.75 25.6642 12.0858 26 12.5 26H28.25C28.6642 26 29 25.6642 29 25.25C29 24.8358 28.6642 24.5 28.25 24.5H13.378C13.6869 23.6261 14.5203 23 15.5 23H26.7183C27.0051 23 27.2668 22.8364 27.3925 22.5785C28.5277 20.249 29.5183 17.836 30.3527 15.3513C30.4191 15.1536 30.4002 14.9372 30.3005 14.754C30.2008 14.5708 30.0294 14.4374 29.8273 14.3858C25.0055 13.1544 19.9536 12.5 14.75 12.5C14.3922 12.5 14.0351 12.5031 13.6787 12.5093L13.4474 11.6419C13.2285 10.8211 12.4851 10.25 11.6357 10.25H10.25Z" fill="#FFD300" />
                <path d="M11.75 28.25C11.75 27.4216 12.4216 26.75 13.25 26.75C14.0784 26.75 14.75 27.4216 14.75 28.25C14.75 29.0784 14.0784 29.75 13.25 29.75C12.4216 29.75 11.75 29.0784 11.75 28.25Z" fill="#FFD300" />
                <path d="M24.5 28.25C24.5 27.4216 25.1716 26.75 26 26.75C26.8284 26.75 27.5 27.4216 27.5 28.25C27.5 29.0784 26.8284 29.75 26 29.75C25.1716 29.75 24.5 29.0784 24.5 28.25Z" fill="#FFD300" />
            </svg>
            <div class="headerBottomCartCount">
                <?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?>
            </div>
        </div>
        <div class="headerBottomCartIcon">
            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="icon">
                    <g id="Union">
                        <path d="M2.75 2.25C2.33579 2.25 2 2.58579 2 3C2 3.41421 2.33579 3.75 2.75 3.75H4.13568C4.30558 3.75 4.45425 3.86422 4.49803 4.02838L7.05576 13.6199C5.44178 14.0385 4.25 15.5051 4.25 17.25C4.25 17.6642 4.58579 18 5 18H20.75C21.1642 18 21.5 17.6642 21.5 17.25C21.5 16.8358 21.1642 16.5 20.75 16.5H5.87803C6.18691 15.6261 7.02034 15 8 15H19.2183C19.5051 15 19.7668 14.8364 19.8925 14.5785C21.0277 12.249 22.0183 9.83603 22.8527 7.35126C22.9191 7.15357 22.9002 6.93716 22.8005 6.75399C22.7008 6.57082 22.5294 6.43743 22.3273 6.38583C17.5055 5.15442 12.4536 4.5 7.25 4.5C6.89217 4.5 6.53505 4.5031 6.17868 4.50926L5.94738 3.64188C5.7285 2.82109 4.98515 2.25 4.13568 2.25H2.75Z" fill="#1F1F1F" />
                        <path d="M2.75 2.25C2.33579 2.25 2 2.58579 2 3C2 3.41421 2.33579 3.75 2.75 3.75H4.13568C4.30558 3.75 4.45425 3.86422 4.49803 4.02838L7.05576 13.6199C5.44178 14.0385 4.25 15.5051 4.25 17.25C4.25 17.6642 4.58579 18 5 18H20.75C21.1642 18 21.5 17.6642 21.5 17.25C21.5 16.8358 21.1642 16.5 20.75 16.5H5.87803C6.18691 15.6261 7.02034 15 8 15H19.2183C19.5051 15 19.7668 14.8364 19.8925 14.5785C21.0277 12.249 22.0183 9.83603 22.8527 7.35126C22.9191 7.15357 22.9002 6.93716 22.8005 6.75399C22.7008 6.57082 22.5294 6.43743 22.3273 6.38583C17.5055 5.15442 12.4536 4.5 7.25 4.5C6.89217 4.5 6.53505 4.5031 6.17868 4.50926L5.94738 3.64188C5.7285 2.82109 4.98515 2.25 4.13568 2.25H2.75Z" fill="black" fill-opacity="0.2" />
                        <path d="M4.25 20.25C4.25 19.4216 4.92157 18.75 5.75 18.75C6.57843 18.75 7.25 19.4216 7.25 20.25C7.25 21.0784 6.57843 21.75 5.75 21.75C4.92157 21.75 4.25 21.0784 4.25 20.25Z" fill="#1F1F1F" />
                        <path d="M4.25 20.25C4.25 19.4216 4.92157 18.75 5.75 18.75C6.57843 18.75 7.25 19.4216 7.25 20.25C7.25 21.0784 6.57843 21.75 5.75 21.75C4.92157 21.75 4.25 21.0784 4.25 20.25Z" fill="black" fill-opacity="0.2" />
                        <path d="M17 20.25C17 19.4216 17.6716 18.75 18.5 18.75C19.3284 18.75 20 19.4216 20 20.25C20 21.0784 19.3284 21.75 18.5 21.75C17.6716 21.75 17 21.0784 17 20.25Z" fill="#1F1F1F" />
                        <path d="M17 20.25C17 19.4216 17.6716 18.75 18.5 18.75C19.3284 18.75 20 19.4216 20 20.25C20 21.0784 19.3284 21.75 18.5 21.75C17.6716 21.75 17 21.0784 17 20.25Z" fill="black" fill-opacity="0.2" />
                    </g>
                </g>
            </svg>
        </div>
        <div class="headerBottomCart">
            <div class="headerBottomCartTitle">
                Корзина
            </div>
            <div class="headerBottomCartTotal">
                <?php echo wp_kses_data(number_format(WC()->cart->get_cart_contents_total(), 0, " ", " ")) . ' ' . get_woocommerce_currency_symbol(); ?>
            </div>
        </div>
    </a>
    <?php
}


if (!function_exists('estore_woocommerce_header_cart')) {
    /**
     * Display Header Cart.
     *
     * @return void
     */
    function estore_woocommerce_header_cart()
    {
        if (is_cart()) {
            $class = 'current-menu-item';
        } else {
            $class = '';
        }
    ?>
        <ul id="site-header-cart" class="site-header-cart">
            <li class="<?php echo esc_attr($class); ?>">
                <?php store_woocommerce_cart_link(); ?>
            </li>
            <li>
                <?php
                $instance = array(
                    'title' => '',
                );

                the_widget('WC_Widget_Cart', $instance);
                ?>
            </li>
        </ul>
<?php
    }
}
