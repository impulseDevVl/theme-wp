<?php
// function custom_shortcode_seasonal_products($atts)
// {
//     ob_start();
//     // if($atts)
//     $query_args = array(
//         'post_type'      => 'product',
//         'posts_per_page' => 20,
//         'orderby'        => 'date',
//         'order'          => 'DESC',
//         'tax_query' => array(
//             array(
//                 'taxonomy' => 'product_tag',
//                 'field'    => 'slug',
//                 'terms'    => 'sezonnyj',
//             ),
//         ),
//     );

//     $products = new WP_Query($query_args);
//     if ($products->have_posts()) {
//         woocommerce_product_loop_start();

//         while ($products->have_posts()) {
//             $products->the_post();
//             wc_get_template_part('content', 'product');
//         }

//         woocommerce_product_loop_end();
//     } else {
//         echo 'Нет товаров.';
//     }

//     wp_reset_postdata();

//     return ob_get_clean();
// }
// // add_shortcode('seasonal_products', 'custom_shortcode_seasonal_products');

// function custom_shortcode_new_products($atts)
// {
//     ob_start();

//     $query_args = array(
//         'post_type'      => 'product',
//         'posts_per_page' => 4,
//         'orderby'        => 'date',
//         'order'          => 'DESC',
//         'tax_query'      => array(
//             array(
//                 'taxonomy' => 'product_tag',
//                 'field'    => 'slug',
//                 'terms'    => 'novinka',
//             ),
//         ),
//     );

//     $products = new WP_Query($query_args);

//     if ($products->have_posts()) {
//         woocommerce_product_loop_start();

//         while ($products->have_posts()) {
//             $products->the_post();
//             wc_get_template_part('content', 'product');
//         }

//         woocommerce_product_loop_end();

//         if ($products->found_posts > 4) {
//             echo '<div id="show-more-container" class="center-block">';
//             echo '<button id="load-more" class="btn btn-outline" data-count="' . $products->found_posts . '" data-page="1"><span>Загрузить еще</span>
//                     <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
//                     <path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="#1F1F1F" stroke-linecap="round" stroke-linejoin="round"/>
//                     <path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="black" stroke-opacity="0.2" stroke-linecap="round" stroke-linejoin="round"/>
//                     </svg>
//                 </button>';
//             echo '</div>';

//             // Enqueue JavaScript
//             wp_enqueue_script('show-more-script', get_template_directory_uri() . '/assets/js/show-more-script.js', array('jquery'), '1.0', true);

//             // Localize JavaScript variables
//             wp_localize_script('show-more-script', 'show_more_params', array(
//                 'ajax_url'    => admin_url('admin-ajax.php'),
//                 'nonce'       => wp_create_nonce('load_more_products'),
//                 'posts_per_page' => 4,
//                 'taxonomy'    => 'product_tag',
//                 'term'        => 'novinka',
//             ));
//         }
//     } else {
//         echo 'Нет новых товаров.';
//     }

//     wp_reset_postdata();

//     return ob_get_clean();
// }
// add_shortcode('new_products', 'custom_shortcode_new_products');

// function custom_shortcode_custom_sale_products()
// {
//     ob_start();

//     $query_args = array(
//         'post_type'      => 'product',
//         'posts_per_page' => 30,
//         'meta_query' => array(
//             array(
//                 'key' => '_sale_price',
//                 'value' => '',
//                 'type' => 'numeric',
//                 'compare' => '>',
//             )
//         )
//     );

//     $products = new WP_Query($query_args);
//     if ($products->have_posts()) {
//         woocommerce_product_loop_start();

//         while ($products->have_posts()) {
//             $products->the_post();
//             wc_get_template_part('content', 'product');
//         }

//         woocommerce_product_loop_end();
//     } else {
//         echo 'Нет товаров.';
//     }

//     wp_reset_postdata();

//     return ob_get_clean();
// }
// add_shortcode('custom_sale_products', 'custom_shortcode_custom_sale_products');


function display_products($product_ids)
{
    // Загружаем необходимые функции WooCommerce
    if (!function_exists('woocommerce_product_loop_start')) {
        return;
    }
    if (!function_exists('wc_get_template_part')) {
        return;
    }
    if (!function_exists('woocommerce_product_loop_end')) {
        return;
    }

    // Выводим начало цикла товаров
    woocommerce_product_loop_start();

    $count = 0; // Счетчик товаров
    $show_button = false; // Флаг для отображения кнопки "Показать еще"
    $remaining_ids = array(); // Массив для хранения оставшихся ID товаров

    // Запускаем цикл по каждому идентификатору товара
    foreach ($product_ids as $key => $product_id) {
        // Устанавливаем текущий пост внутри цикла
        $count++;
        if ($count < 5) {
            $GLOBALS['post'] = get_post($product_id);
            setup_postdata($GLOBALS['post']);

            // Выводим шаблон контента товара
            wc_get_template_part('content', 'product');
        }
        if ($count > 4) {
            $show_button = true;
            $remaining_ids[] = $product_id;
        }
    }

    // Завершаем цикл товаров
    woocommerce_product_loop_end();
    wp_reset_postdata();

    // Выводим кнопку "Показать еще", если есть более 4-х товаров
    if ($show_button) {
        // $data_attr = 'data-product-ids="' . implode(',', $remaining_ids) . '"';
        $data_attr = 'data-product-ids="' . implode(',', $remaining_ids) . '"';
        echo '<div id="show-more-container" class="center-block">';
        echo '<button class="load-more btn btn-outline" ' . $data_attr . ' data-count="' . $count . '" data-page="1">
                Загрузить еще
                <span> 
                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="#1F1F1F" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="black" stroke-opacity="0.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </button>';
        echo '</div>';
        // Enqueue JavaScript
        wp_enqueue_script('show-more-script', get_template_directory_uri() . '/assets/js/show-more-script.js', array('jquery'), '0.1.1', true);

        // Localize JavaScript variables
        wp_localize_script('show-more-script', 'show_more_params', array(
            'ajax_url'    => admin_url('admin-ajax.php'),
            'nonce'       => wp_create_nonce('load_more_products'),
            'posts_per_page' => 4,
            'productIds' => $data_attr,

        ));
    }
}

add_action('wp_ajax_load_more_products', 'load_more_products');
add_action('wp_ajax_nopriv_load_more_products', 'load_more_products');

function load_more_products()
{
    $page = $_POST['page'];
    $productIds = $_POST['productIds'];

    $productIds = explode(",", $productIds);

    // Определение количества ID, которые нужно выводить на каждой странице
    $per_page = 4;

    // Определение индекса начального элемента на основе номера страницы
    $start_index = ($page - 1) * $per_page;

    // Получение части массива ID для текущей страницы
    $paged_productIds = array_slice($productIds, $start_index, $per_page);

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $per_page,
        'post__in'       => $paged_productIds
    );

    $product = new WP_Query($args);
    while ($product->have_posts()) {
        $product->the_post();
        wc_get_template_part('content', 'product');
    }

    wp_reset_postdata();

    die(); // Важно завершить выполнение скрипта после отправки ответа
}
function display_more_products($product_ids)
{
    // Загружаем необходимые функции WooCommerce
    if (!function_exists('wc_get_template_part')) {
        return;
    }
    foreach ($product_ids as $key => $product_id) {
        $GLOBALS['post'] = get_post($product_id);
        setup_postdata($GLOBALS['post']);
        wc_get_template_part('content', 'product');
    }

    wp_reset_postdata();
}
// add_action('wp_ajax_load_products', 'load_products');
// add_action('wp_ajax_nopriv_load_products', 'load_products');

// function load_products()
// {
//   $productIds = $_POST['product_ids'];

//   ob_start();
//   foreach ($productIds as $productId) {
//     wc_get_template_part('content', 'product', '', ['product_id' => $productId]);
//   }
//   $output = ob_get_clean();

//   echo $output;
//   wp_die();
// }