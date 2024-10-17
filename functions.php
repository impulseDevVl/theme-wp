<?php
// правильный способ подключить стили и скрипты
add_action('wp_enqueue_scripts', function () {

	wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet"' . time(), array(), null);
	wp_enqueue_style('style-woo', get_template_directory_uri() . '/woocommerce/assets/css/woocommerce.css?' . time(), array(), null);
	wp_enqueue_style('style-main', get_template_directory_uri() . '/assets/css/style.min.css?' . time(), array(), null);

	wp_deregister_script('jquery');
	wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
	wp_enqueue_script('jquery');

	wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/main.min.js?' . time(), array('jquery'), null);
	  // Локализуем переменные для использования в JS
	  wp_localize_script('main-script', 'ajaxurl', admin_url('admin-ajax.php')); // Передаем строку, а не массивы
});

add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');
add_filter('upload_mimes', 'svg_upload_allow');
add_theme_support('menus');
add_theme_support('woocommerce');

function svg_upload_allow($mimes)
{
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{

	// WP 5.1 +
	if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) {
		$dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
	} else {
		$dosvg = ('.svg' === strtolower(substr($filename, -4)));
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if ($dosvg) {

		// разрешим
		if (current_user_can('manage_options')) {

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}
	}

	return $data;
}
add_filter('wp_prepare_attachment_for_js', 'show_svg_in_media_library');

# Формирует данные для отображения SVG как изображения в медиабиблиотеке.
function show_svg_in_media_library($response)
{

	if ($response['mime'] === 'image/svg+xml') {

		// С выводом названия файла
		$response['image'] = [
			'src' => $response['url'],
		];
	}

	return $response;
}

include("includes/global/theme-functions.php");

// Global ACF Options Page
include("includes/global/options.php");

//woocommerce functions
include 'woocommerce/includes/wc-functions-cart.php';
include 'woocommerce/includes/wc-shortcodes-product.php';
include 'woocommerce/includes/wc-functions-archive-product.php';
include 'woocommerce/includes/wc-functions-content-product.php';
include 'woocommerce/includes/wc-functions-single-product.php';
include 'woocommerce/includes/wc-functions-product-reviews.php';
include 'woocommerce/includes/wc-functions-checkout-cart.php';
include 'woocommerce/includes/wc-functions-checkout.php';
include 'woocommerce/includes/wc-functions-myaccount.php';
include 'woocommerce/includes/wc-functions-additional-cat.php';

// document title 
add_filter('document_title', 'wp_kama_document_title_filter');

/**
 * Function for `document_title` filter-hook.
 * 
 * @param string $title Document title.
 *
 * @return string
 */
function wp_kama_document_title_filter($title)
{
	// filter...
	return $title;
}
// Отключаем любые CSS стили плагинов
function custom_dequeue()
{
	wp_dequeue_style('woocommerce-general');
	// wp_dequeue_style('prettyPhoto');
	// wp_deregister_style('full-screen-search');
	// wp_deregister_style('prettyPhoto');
}
add_action('wp_enqueue_scripts', 'custom_dequeue', 9999);
add_action('wp_head', 'custom_dequeue', 9999);


include 'includes/global/search-function.php';


add_filter('intermediate_image_sizes_advanced', 'true_remove_default_sizes');

function true_remove_default_sizes($sizes)
{
	unset($sizes['medium']); // средний
	unset($sizes['large']); // крупный
	unset($sizes['medium_large']); // с шириной 768
	unset($sizes['1536x1536']);
	unset($sizes['600x474']);
	unset($sizes['600x600']);
	unset($sizes['600x0']);
	unset($sizes['woocommerce_thumbnail']);
	unset($sizes['woocommerce_single']);
	unset($sizes['woocommerce_gallery_thumbnail']);
	unset($sizes['2048x2048']);
	unset($sizes['1536x1536']);
	return $sizes;
}

## отключаем создание миниатюр файлов для указанных размеров
add_filter('intermediate_image_sizes', 'delete_intermediate_image_sizes');

function delete_intermediate_image_sizes($sizes)
{

	// размеры которые нужно удалить
	return array_diff($sizes, [
		'medium_large',
		'woocommerce_gallery_thumbnail',
		'large',
		'1536x1536',
		'2048x2048',
	]);
}
// function my_404_override() {
//     if( !is_user_logged_in() || !current_user_can('manage_options') ) {
//         global $wp_query;
//         $wp_query->set_404();
//         status_header(404);
//         get_template_part(404);
//         exit;
//     }
// }
// add_action('template_redirect', 'my_404_override');

add_filter('woocommerce_save_account_details_required_fields', 'remove_required_fields');

function remove_required_fields( $required_fields ) {
    unset($required_fields['account_last_name']);

    return $required_fields;
}