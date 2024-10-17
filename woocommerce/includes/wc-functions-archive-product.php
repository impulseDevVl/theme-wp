<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
// добавление контейнера на страницу катага и товаров
add_action('woocommerce_before_main_content', 'added_container_archive_products_start', 5);
function added_container_archive_products_start()
{
    echo '<div class="container">';
}
add_action('woocommerce_after_main_content', 'added_container_archive_products_end', 20);
function added_container_archive_products_end()
{
    echo '</div>';
}

// remove sidebar 
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
// remove breadcrumb
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
// remove products result count
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

// added breadcrumb
add_action('woocommerce_before_main_content', 'added_navxt_breadcrumb', 20);
function added_navxt_breadcrumb()
{
    echo '<nav class="woocommerce-breadcrumb">';
    echo bcn_display();
    echo '</nav>';
}

// добавление обертки для фильтра и товаров
add_action('woocommerce_before_shop_loop', 'added_product_wrapper_start', 20);
function added_product_wrapper_start()
{
    if (!woocommerce_product_subcategories()) {
        echo '<div class="products-wrapper section">';
        echo '<div class="products-filter br-20">';
        // echo get_wc_category();
        //render_categories_navigation();
        echo do_shortcode('[fe_widget]');
        echo '</div>';
    }
}
add_action('woocommerce_after_shop_loop', 'added_product_wrapper_end', 20);
function added_product_wrapper_end()
{
    $queried_object = get_queried_object();
    $seo_text = get_field('seo_text', $queried_object);
    $faq_title = get_field('faq_title', $queried_object);
    $faq_items = get_field('faq_items', $queried_object);

    if (!woocommerce_product_subcategories()) {
        echo '</div>';
    }
    if ($seo_text) {
        catalogDescription($seo_text);
    }
    if ($faq_title && $faq_items) {
        faqBlock($faq_title, $faq_items);
    }
}
// Добавление обертки для сортировки и chips 
add_action('woocommerce_before_shop_loop', 'added_product_inner_start', 25); //added_product_inner_start
function added_product_inner_start()
{

    echo '<div class="products__inner">';
}
add_action('woocommerce_after_shop_loop', 'added_product_inner_end', 15);
function added_product_inner_end()
{
    echo '</div>';
}

// добавление обертки для товаров и сортировки
add_action('woocommerce_before_shop_loop', 'added_products_top_inner_start', 26);
function added_products_top_inner_start()
{
    if (!woocommerce_product_subcategories()) {
        echo '<div class="products-top__inner">';
        echo do_shortcode('[fe_open_button]'); // вывод кнопки фильтра для мобильки 
    }
}
add_action('woocommerce_before_shop_loop', 'added_products_top_inner_close', 31);
function added_products_top_inner_close()
{
    if (!woocommerce_product_subcategories()) {
        echo do_shortcode('[fe_chips mobile="yes" ]'); // вывод chips
        echo '</div>';
    }
}

// Increment Quantity Buttons for WooCommerce (изменение input на button)
add_filter('use_html_buttons', '__return_true');


// Скрыть варианты сортировки

add_filter('woocommerce_default_catalog_orderby_options', 'truemisha_remove_orderby_options');
add_filter('woocommerce_catalog_orderby', 'truemisha_remove_orderby_options');

function truemisha_remove_orderby_options($sortby)
{

    unset($sortby['popularity']); // по популярности
    unset($sortby['rating']); // по рейтингу

    return $sortby;
}

function get_active_sotring($get, $sort)
{
    if ($get == $sort) {
        $active_class = 'active';
        return $active_class;
    }
    return;
}


add_action('woocommerce_after_shop_loop', 'added_seo_block_in_category', 25);
function added_seo_block_in_category()
{
    if (!is_shop()) {
        $category = get_queried_object();
        $cat_title = get_field('cat_title', $category);
        $thumbnail_image_url = get_field('cat_img',  $category);
        $cat_text = get_field('cat_text',  $category);
        if ($cat_title && $cat_text) { ?>
            <section class="seoblock section">
                <h3 class="seoblock__title title mb-3"><?php echo $cat_title; ?></h3>
                <div class="seoblock__inner">
                    <div class="seoblock__text text">
                        <?php echo $cat_text; ?>
                    </div>
                    <?php if ($thumbnail_image_url) { ?>
                        <div class="seoblock__img">
                            <img src="<?php echo $thumbnail_image_url; ?>" alt="<?php echo $cat_title; ?>">
                        </div>
                    <?php } ?>
                </div>
            </section>
    <?php }
    }
}


add_action('woocommerce_after_shop_loop', 'woocommerce_ajax_pagination', 9);
function woocommerce_ajax_pagination()
{

    if (!woocommerce_product_subcategories()) {
        echo '<div id="load-more-products" class="lmp_load_more_button br_lmp_button_settings">
        <a class="lmp_button btn btn-outline" href="">Показать еще</a></div>';
    }
}



////// test

function get_categories_product($categories_list = '', $parent_id = 0)
{

    $get_categories_product = get_terms('product_cat', [
        'orderby' => 'name', // Поле для сортировки
        'order' => 'ASC', // Направление сортировки
        'hide_empty' => 1, // Скрывать пустые. 1 - да, 0 - нет.
        'hierarchical' => 1,
        'parent' => $parent_id
    ]);

    if (count($get_categories_product) > 0) {
        $categories_list .= ($parent_id == 0
            ? '<ul class="main_categories_list">'
            : '<ul class="sub_categories_list sub_categories_list_' . $parent_id . '">');
        foreach ($get_categories_product as $categories_item) {
            $categories_list .= '
				<li>
					<a href="' . esc_url(get_term_link((int)$categories_item->term_id)) . '">' . esc_html($categories_item->name) . '</a>

					' . get_categories_product('', $categories_item->term_id) . '

				</li>
			';
        }
        $categories_list .= '</ul>';
    }
    return $categories_list;
}

function my_custom_mobile_width()
{
    return 999;
}
add_filter('wpc_mobile_width', 'my_custom_mobile_width');


// add_action('pre_get_posts', 'truemisha_show_out_of_stock_only');

// function truemisha_show_out_of_stock_only($query)
// {
//     if (!is_admin() && $query->is_main_query() && (is_shop() || is_product_category() || is_product_tag())) {
//         $query->set(
//             'meta_query',
//             array(
//                 array(
//                     'key'     => '_stock_status',
//                     'value'   => 'outofstock',
//                     'compare' => 'IN',
//                 ),
//             )
//         );
//     }
// }


// add_action('woocommerce_before_shop_loop', 'added_subcategories', 15);
// function added_subcategories()
// {

//     if (is_product_category() && !empty(get_terms('product_cat', ['parent' => get_queried_object()->term_id])) && get_queried_object()->parent != 0 && get_queried_object()->count != 0 && get_queried_object()->count != 1) {
//         echo getSubcategory();
//     }
// }

// function getSubcategory()
// {
//     $category = get_queried_object();
//     $product_cats = get_terms([
//         'taxonomy' => 'product_cat',
//         'parent'   => $category->term_id
//     ]);
//     if ($product_cats) {
//         $html = '<ul class="products-category products-subcategory">';
//         foreach ($product_cats as $key => $item) {
//             $category_thumbnail_id = get_term_meta($item->term_id, 'thumbnail_id', true);
//             $category_thumbnail = wp_get_attachment_url($category_thumbnail_id);
//             if (!$category_thumbnail) {
//                 $category_thumbnail = wc_placeholder_img_src();
//             }
//             if ($item->count != 0) {
//                 $html .= '<li class="product-category product" data-url="' . get_category_link($item->term_id) . '">
//                     <a aria-label="Посетите категорию товара ' . $item->name . '" href="' . get_category_link($item->term_id) . '">
//                         <img src="' . $category_thumbnail . '" alt="' . $item->name . '" width="300" height="300">		
//                         <h2 class="woocommerce-loop-category__title">
//                         ' . $item->name . ' <mark class="count">(' . $item->count . ')</mark>
//                         </h2>
//                     </a>
//                 </li>';
//             }
//         }
//         $html .=  '</ul>';
//     }
//     return $html;
// }

// remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );

function mynew_product_subcategories($args = array())
{

    $display_type = get_term_meta(get_queried_object_id(), 'display_type', true);

    // if (!is_shop() || is_product_category() || get_queried_object()->parent != 0 || get_queried_object()->count != 0 || get_queried_object()->count != 1) {
    if (is_shop() || get_queried_object()->parent != 0 && $display_type != 'subcategories') {
        $parentid = get_queried_object_id();
        $args = array(
            'parent' => $parentid,
            'exclude'       => array(15, 424),
            'hide_empty'    => true,
        );
        $terms = get_terms('product_cat', $args);
        if ($terms) {
            echo '<ul class="products-category products-subcategory">';
            foreach ($terms as $term) {
                if ($term->count != 0) {
                    echo '<li class="product-category product" data-url="' . get_category_link($term->term_id) . '">';
                    echo '<a href="' .  esc_url(get_term_link($term)) . '" class="' . $term->slug . '">';
                    woocommerce_subcategory_thumbnail($term);
                    echo '<h2 class="woocommerce-loop-category__title">';
                    echo $term->name . ' <mark class="count">(' . $term->count . ')</mark>';
                    echo '</h2>';
                    echo '</a>';
                    echo '</li>';
                }
            }
            echo '</ul>';
        }
    }
}

add_action('woocommerce_archive_description', 'mynew_product_subcategories', 30);
function get_category_display_type()
{
    $display_type = get_option('woocommerce_category_taxonomy_archive_display_product_cat'); // Получаем значение типа отображения категорий
    return $display_type;
}

function catalogDescription($content)
{ ?>
    <div class="catalog-description section">
        <?php echo $content; ?>
    </div>
    <?php
}

function faqBlock($title, $items)
{
    if ($items) {
    ?>
        <div class="faq section" itemscope itemtype="https://schema.org/FAQPage">
            <h2 class="faq__title title"><?php echo $title; ?></h2>
            <div class="faq__items">
                <?php foreach ($items as $key => $item) { ?>
                    <div class="faq-item" itemscope itemprop="mainEntity" itemtype="http://schema.org/Question">
                        <div class="faq-item__title">
                            <h3 class="subtitle" itemprop="name"><?php echo $item['title']; ?></h3>
                            <span>
                                <svg width="29" height="16" viewBox="0 0 29 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 2L14.5 14.5L27 2" stroke="#1f1f1f" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div class="faq-item__spoller" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: none;">
                            <div class="faq-item__content<?= $item['img'] ? ' grid' : '' ?>" itemprop="text">
                                <div class="faq-item__text"><?php echo $item['text']; ?></div>
                                <?php if ($item['img']) { ?>
                                    <img class="faq-item__img" src="<?php echo $item['img']; ?>" alt="">
                                <?php } ?>
                            </div>
                            <?php if ($item['table']) { ?>
                                <div class="faq-item__table"><?php echo $item['table']; ?></div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <script>
            $('.faq-item__title').on('click', function() {
                $(this).toggleClass('open')
                $(this).next().slideToggle()
            })

            $('.faq-item__table table').each(function() {
                let $table = $(this);
                // Получаем заголовки (th) из первой строки таблицы
                let headers = [];
                $table.find('tr:first-child th').each(function() {
                    headers.push($(this).text().trim());
                });
                // Проходим по каждой строке таблицы, кроме первой
                $table.find('tr').not(':first').each(function() {
                    // Проходим по каждой ячейке строки (td)
                    $(this).find('td').each(function(index) {
                        // Добавляем атрибут data-label с соответствующим заголовком
                        $(this).attr('data-label', headers[index]);
                    });
                });
            });
        </script>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
                "mainEntity": [
                    <?php
                    $json_items = [];
                    foreach ($items as $item) {
                        $json_items[] = [
                            "@type" => "Question",
                            "name" => $item['title'],
                            "acceptedAnswer" => [
                                "@type" => "Answer",
                                "text" => $item['text']
                            ]
                        ];
                    }

                    // Преобразуем массив в JSON и выводим
                    echo json_encode($json_items, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
                    ?>
                ]
            }
        </script>



<?php
    }
}

add_filter('aioseo_description', 'aioseo_filter_description');
function aioseo_filter_description($description)
{
    if (is_shop() || is_product_category()) {
        $seo_description = get_field('meta_description', get_queried_object());
        if ($seo_description) {
            $description = $seo_description;
        } else {
            $description = 'Интернет-магазин "База стройка" предлагает широкий выбор ' . get_queried_object()->name . ' по выгодной цене. Купить строительные и хозяйственные товары с доставкой по Приморскому краю и Владивостоку до 3-х дней.';
        }
        return $description;
    }
    return $description;
}

add_filter('aioseo_title', 'aioseo_filter_title');
function aioseo_filter_title($title)
{
    if (is_shop() || is_product_category()) {
        $seo_title = get_field('meta_title', get_queried_object());
        if ($seo_title) {
            $title = $seo_title;
        } else {
            $title = get_queried_object()->name . ' в Кавалерово | База стройка';
        }
        return $title;
    }
    return $title;
}

add_filter('aioseo_twitter_tags', 'aioseo_filter_twitter_title');

function aioseo_filter_twitter_title($twitterMeta)
{
    if (is_shop() || is_product_category()) {
        $seo_title = get_field('meta_title', get_queried_object());
        $seo_description = get_field('meta_description', get_queried_object());
        $twitterMeta['twitter:title'] = $seo_title;
        $twitterMeta['twitter:description'] = $seo_description;
    }
    return $twitterMeta;
}
