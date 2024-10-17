<?php

/**
 * Product Loop End
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-end.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.0.0
 */

if (! defined('ABSPATH')) {
	exit;
}

if (woocommerce_product_subcategories() && is_product_category('hozyajstvennye-materialy')) {
	$queried_object =  get_queried_object();
	$additional_cat = get_field('additional_cat', $queried_object);
	if ($additional_cat) {
		foreach ($additional_cat as $key => $item) {
			// Проверяем, является ли элемент объектом типа WP_Post
			if ($item instanceof WP_Post) {
				// Получаем URL изображения записи
				$thumbnail_url = get_the_post_thumbnail_url($item->ID, 'medium'); // Размер можно заменить на нужный

				// Если изображения нет, используем стандартное изображение
				if (!$thumbnail_url) {
					$thumbnail_url = 'https://baza-stroika.ru/wp-content/uploads/woocommerce-placeholder.png';
				}
?>
				<li class="product-category product first">
					<a aria-label="Посетите категорию товара <?php echo esc_attr($item->post_title); ?>"
						href="<?php echo esc_url(get_permalink($item->ID)); ?>"
						alt="<?php echo esc_attr($item->post_title); ?>" width="300" height="300">
						<img src="<?php echo esc_url($thumbnail_url); ?>"
							alt="<?php echo esc_attr($item->post_title); ?>" width="300" height="300">
						<h2 class="woocommerce-loop-category__title">
							<?php echo esc_html($item->post_title); ?>
						</h2>
					</a>
				</li>
<?php
			}
		}
	}
}
?>
</ul>
<?php
if (woocommerce_product_subcategories()) {
	echo '</div>';
} ?>