<?php
// search
// Регистрация AJAX-обработчика для поиска товаров, записей и вакансий
add_action('wp_ajax_custom_search', 'custom_search_callback');
add_action('wp_ajax_nopriv_custom_search', 'custom_search_callback');

function custom_search_callback()
{
	$search_term  = sanitize_text_field($_POST['search_term']);

	// Поиск товаров
	$product_query = new WP_Query(
		array(
			'post_type'      => 'product',
			'post_status'    => 'publish',
			// 's'              => $search_term,
			'posts_per_page' => 5,
			'meta_query'     => array(
				'relation' => 'OR',
				array(
					's' => $search_term,
					'value' => $search_term,
					'compare' => 'LIKE'
				),

				array(
					'key'   => '_sku',
					'value' => $search_term,
					'compare' => 'LIKE',
				)
			),
		)
	);

	// Поиск записей
	$post_query = new WP_Query(
		array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			's'              => $search_term,
			'posts_per_page' => 5, // Отображение всех результатов
		)
	);

	// Поиск вакансий
	$job_query = new WP_Query(
		array(
			'post_type'      => 'job-vacancy',
			'post_status'    => 'publish',
			's'              => $search_term,
			'posts_per_page' => 5, // Отображение всех результатов
		)
	);

	// Конечные HTML-результаты
	$html = '';

	// Результаты поиска записей
	if ($post_query->have_posts()) {
		$html .= '<div class="search-result-item">';
		$html .= '<h6 class="search__title">Найдено в блоге:</h6>';
		while ($post_query->have_posts()) {
			$post_query->the_post();
			$html .= '<div class="search-item">';
			$html .= '<a class="search-item__link" href="' . get_permalink() . '">
			<img class="search-item__img" src="' . get_the_post_thumbnail_url() . '" alt="search ' . get_the_title() . '"/>' . get_the_title() . '</a>';
			$html .= '</div>';
		}
		if ($post_query->found_posts > 5) {
			$remaining_products = $post_query->found_posts - 5;
			$html .= '<div class="search-page-link">';
			$html .= '<a href="' . get_site_url() . '?s=' . $search_term . '&post_type=post">Ещё ' . $remaining_products . ' постов</a>';
			$html .= '</div>';
		}
		$html .= '</div>';
	}

	// Результаты поиска товаров
	if ($product_query->have_posts()) {
		// print_r($product_query);
		$html .= '<div class="search-result-item">';
		$html .= '<h6 class="search__title">Найдено в товарах:</h6>';
		while ($product_query->have_posts()) {
			$product_query->the_post();
			$product_id = get_the_ID(); // ID текущего товара
			$product = wc_get_product($product_id);
			$main_img = wp_get_attachment_url($product->get_image_id());
			if (!$main_img) {
				$main_img = wc_placeholder_img_src();
			}
			$html .= '<div class="search-item">';
			$html .= '<a class="search-item__link" href="' . get_permalink() . '">
			<img class="search-item__img" src="' . $main_img . '" alt="search ' . get_the_title() . '"/>' . get_the_title() . '</a>';
			$html .= '</div>';
		}
		// Проверка на наличие остальных товаров
		if ($product_query->found_posts > 5) {
			$remaining_products = $product_query->found_posts - 5;
			$html .= '<div class="search-page-link">';
			$html .= '<a href="' . get_site_url() . '?s=' . $search_term . '&post_type=product">Ещё ' . $remaining_products . ' товаров</a>';
			$html .= '</div>';
		}
		$html .= '</div>';

		// if ($product_query->found_posts > 5) {
		// 	$remaining_products = $product_query->found_posts - 5;
		// 	$html .= '<div class="search-page-link">';
		// 	$html .= '<a href="' . get_search_link(array('post_type' => 'product', 's' => $search_term)) . '">Еще ' . $remaining_products . ' товаров</a>';
		// 	$html .= '</div>';
		// }

		// $html .= '<div class="search-page-link"><a href="' . get_post_type_archive_link( 'product' ) . '">Перейти к результатам поиска товаров</a></div>';
	}

	// Результаты поиска вакансий
	if ($job_query->have_posts()) {
		$html .= '<div class="search-result-item">';
		$html .= '<h6 class="search__title">Найдено в вакансиях:</h6>';
		while ($job_query->have_posts()) {
			$job_query->the_post();
			$html .= '<div class="search-item">';
			$html .= '<a lass="search-item__link" href="' . get_permalink() . '">' . get_the_title() . '</a>';
			$html .= '</div>';
		}
		if ($job_query->found_posts > 5) {
			$remaining_products = $job_query->found_posts - 5;
			$html .= '<div class="search-page-link">';
			$html .= '<a href="' . get_site_url() . '?s=' . $search_term . '&post_type=job-vacancy">Ещё ' . $remaining_products . ' вакансий</a>';
			$html .= '</div>';
		}
		$html .= '</div>';
	}

	// Вывод результатов
	if ($html != '') {
		echo $html;
	} else {
		echo '<p class="search-not-found">Ничего не найдено</p>';
	}

	wp_die();
}
