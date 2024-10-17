<?php

/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if (!defined('ABSPATH')) {
	exit;
}

?>
<!-- <form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby" aria-label="<?php esc_attr_e('Shop order', 'woocommerce'); ?>">
		<?php foreach ($catalog_orderby_options as $id => $name) : ?>
			<option value="<?php echo esc_attr($id); ?>" <?php selected($orderby, $id); ?>><?php echo esc_html($name); ?></option>
		<?php endforeach; ?>
	</select>
	<input type="hidden" name="paged" value="1" />
	<?php wc_query_string_form_fields(null, array('orderby', 'submit', 'paged', 'product-page')); ?>
</form> -->

<div class="orderby-block">
	<button class="order-selected">
		<span>Сортировка</span>
		<svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M8.49072 3.79541L5.36572 6.92041L2.24072 3.79541" stroke="#1F1F1F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
			<path d="M8.49072 3.79541L5.36572 6.92041L2.24072 3.79541" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
	</button>
	<ul class="orderby-dropdown" style="display: none;">
		<li class="orderby-item">
			<a class="orderby-item__link <?php echo get_active_sotring(isset($_GET['orderby']), 'menu_order'); ?>" href="?orderby=menu_order">Исходная сортировка</a>
		</li>
		<li class="orderby-item <?php echo get_active_sotring(isset($_GET['orderby']), 'date'); ?>">
			<a class="orderby-item__link" href="?orderby=date">По новизне</a>
		</li>
		<li class="orderby-item <?php echo get_active_sotring(isset($_GET['orderby']), 'price'); ?>">
			<a class="orderby-item__link" href="?orderby=price">Цена: по возрастанию</a>
		</li>
		<li class="orderby-item <?php echo get_active_sotring(isset($_GET['orderby']), 'price-desc'); ?>">
			<a class="orderby-item__link" href="?orderby=price-desc">Цена: по убыванию</a>
		</li>
	</ul>
</div>