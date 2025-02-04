<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
	exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
	echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
	<div class="woocommerce-checkout-customer__wrapper">
		<?php if ($checkout->get_checkout_fields()) :  ?>

			<?php do_action('woocommerce_checkout_before_customer_details'); ?>
			<div class="woocommerce-checkout-customer__inner mb-5">
				<div class="col2-set" id="customer_details">
					<div class="col-1">
						<?php do_action('woocommerce_checkout_billing'); ?>
					</div>
					<div class="col-2">
						<?php do_action('woocommerce_checkout_shipping'); ?>
					</div>
				</div>
				<div class="woocommerce-checkout-footer">
					<div class="woocommerce-checkout-shipping-payments">
						<!-- <div class="woocommerce-checkout-shipping">
							<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
								<?php do_action('woocommerce_review_order_before_shipping'); ?>
								<?php wc_cart_totals_shipping_html(); ?>
								<?php do_action('woocommerce_review_order_after_shipping'); ?>
							<?php endif; ?>
						</div> -->
						<div class="woocommerce-checkout-payment_methods">
							<h4 class="checkout-subtitle text">3. Выберите способ оплаты</h4>
							<?php do_action('woocommerce_checkout_after_customer_details'); ?>
						</div>
					</div>
					<?php do_action('woocommerce_review_order_before_submit'); ?>
					<!-- <?php $order_button_text = 'Оформить заказ'; echo apply_filters('woocommerce_order_button_html', '<button type="submit" class="btn btn-primary alt' . esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : '') . '" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr($order_button_text) . '" data-value="' . esc_attr($order_button_text) . '">' . esc_html($order_button_text) . '</button>'); // @codingStandardsIgnoreLine ?> -->
					<?php do_action('woocommerce_review_order_after_submit'); ?>
					<!-- </div> -->
					<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

					<!-- <h3 class="title mb-4" id="order_review_heading"><?php esc_html_e('Your order', 'woocommerce'); ?></h3> -->

					<?php do_action('woocommerce_checkout_before_order_review'); ?>

					<div id="order_review" class="woocommerce-checkout-review-order">
						<?php do_action('woocommerce_checkout_order_review'); ?>
					</div>

					<?php do_action('woocommerce_checkout_after_order_review'); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>