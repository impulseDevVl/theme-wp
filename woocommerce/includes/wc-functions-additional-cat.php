<?php
// Добавляем обработчик для фронтенда
add_action('wp_ajax_nopriv_load_products', 'load_products'); // Для неавторизованных пользователей
add_action('wp_ajax_load_products', 'load_products'); // Для авторизованных пользователей

function load_products()
{
    // Получаем текущую страницу из AJAX-запроса
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    // Получаем переданный ID категории
    $category_ids = isset($_POST['category_ids']) ? array_map('intval', $_POST['category_ids']) : array();

    // Проверяем, что массив категорий не пуст
    if (empty($category_ids)) {
        wp_send_json_error('Массив категорий пуст.');
        wp_die();
    }

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 8, // Количество товаров на одной странице
        'paged' => $paged, // Текущая страница
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat', // Таксономия для категорий товаров WooCommerce
                'field' => 'term_id', // Используем ID категорий
                'terms' => $category_ids, // ID категорий для фильтрации
                'operator' => 'IN', // Оператор для поиска
            ),
        ),
    );

    $products = new WP_Query($args);
    if ($products->have_posts()) :
        while ($products->have_posts()) : $products->the_post();
            get_loop_product($products);
        endwhile;
    endif;
    wp_reset_postdata();

    wp_die(); // Завершаем запрос, чтобы ничего не выводилось после
}

add_action('wp_ajax_nopriv_load_pagination', 'load_pagination');
add_action('wp_ajax_load_pagination', 'load_pagination');

function load_pagination() {
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $total_pages = isset($_POST['total_pages']) ? intval($_POST['total_pages']) : 1;

    echo paginate_links(array(
        'total' => $total_pages, // Общее количество страниц
        'current' => $paged, // Текущая страница
        'format' => '?paged=%#%', // Формат ссылки
        'prev_text' => __('←'),
        'next_text' => __('→'),
        'type'         => 'list',
        'mid_size'=> 3
    ));

    wp_die();
}


function get_loop_product($product)
{ ?>
    <li class="product type-product post-<?php the_ID(); ?> status-publish">
        <a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
            <?php woocommerce_template_loop_product_thumbnail(); ?>
            <div class="product__content">
                <?php echo get_product_tags(); ?>
                <div class="product__sku"><?php echo $product->get_sku(); ?></div>
                <h2 class="woocommerce-loop-product__title"><?php the_title(); ?></h2>
            </div>
        </a>
        <div class="product-right-col">
            <span class="price">
                <?php echo $product->get_price_html(); ?>
            </span>
            <div class="product-actions-box">
                <div class="product-quantity">
                    <div class="quantity">
                        <label class="screen-reader-text" for="smntcswcb">Quantity</label>
                        <button class="minus button wp-element-button">-</button>
                        <input type="number" id="smntcswcb" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" inputmode="numeric">
                        <button class="plus button wp-element-button">+</button>
                    </div>
                </div>
                <a href="?add-to-cart=<?php the_ID(); ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart btn btn-primary" data-product_id="<?php the_ID(); ?>" data-product_sku="<?php echo $product->get_sku(); ?>" aria-label="Добавить в корзину “<?php the_title(); ?>”" aria-describedby="" rel="nofollow">В корзину</a>
            </div>
        </div>
    </li>
<?php
}
