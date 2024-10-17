<?php

/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if ($related_products) : ?>

	<section class="related products section br-20">

		<?php
		$heading = apply_filters('woocommerce_product_related_products_heading', __('С этим покупают', 'woocommerce'));

		if ($heading) :
		?>
			<h2 class="title mb-3"><?php echo esc_html($heading); ?></h2>
		<?php endif; ?>

		<!-- <?php woocommerce_product_loop_start(); ?> -->
		<ul class="related-products products columns-1">
			<?php foreach ($related_products as $related_product) : ?>

				<?php
				$post_object = get_post($related_product->get_id());

				setup_postdata($GLOBALS['post'] = &$post_object); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

				wc_get_template_part('content', 'product');
				?>

			<?php endforeach; ?>
		</ul>
		<div class="center-block show-more-btn-wrapper" style="display: none;">
			<button class="btn btn-outline show-more-btn">Показать еще
				<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="#1F1F1F" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</button>
		</div>
		<!-- <?php woocommerce_product_loop_end(); ?> -->

	</section>
<?php
endif;

wp_reset_postdata();
