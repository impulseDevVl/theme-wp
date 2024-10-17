<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
// перенос ссылки на товар
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
add_action('woocommerce_after_shop_loop_item_title', 'wc_template_loop_product_link_close', 6);
function wc_template_loop_product_link_close()
{
    woocommerce_template_loop_product_link_close();
}

// контейнер для меток, артикула и название товара 
add_action('woocommerce_shop_loop_item_title', 'product_content_inner_open', 5);
function product_content_inner_open()
{
    echo '<div class="product__content">';
}
add_action('woocommerce_shop_loop_item_title', 'product_content_inner_close', 12);
function product_content_inner_close()
{
    echo '</div>';
}
// перенос вывода информации о скидки в вывод меток товара
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
add_action('woocommerce_shop_loop_item_title', 'added_product_tags', 6);
function added_product_tags()
{
    get_product_tags();
}

function get_product_tags()
{
    global $product;
    echo '<div class="products-tags tags">';
    switch ($product->get_stock_status()) {
        case 'instock':
            echo '<div class="tag tag-outline">В наличии</div>';
            break;
        case 'outofstock':
            echo '<div class="tag tag-outline">Под заказ</div>';
            break;
        case 'onbackorder':
            echo '<div class="tag tag-outline">Под заказ</div>';
            break;
    }
    if ($product->is_on_sale()) {
        echo '<div class="tag tag-sale">Распродажа</div>';
    }
    // woocommerce_show_product_loop_sale_flash();

    // $terms = get_terms([
    //     'taxonomy' => 'product_tag',
    //     'include'  => $product->get_tag_ids()
    // ]);
    // if ($terms) {
    //     foreach ($terms as $key => $tag) {
    //         $color = get_field('color', $tag);
    //         if ($color) {
    //             echo '<div class="tag bg" style="background-color: ' . $color . '">' . $tag->name . '</div>';
    //         } else {
    //             echo '<div class="tag default">' . $tag->name . '</div>';
    //         }
    //     }
    // }

    $tag_ids = wp_get_post_terms($product->get_id(), 'product_tag', array('fields' => 'ids')); // Получение массива ID тегов для товара

    if ($tag_ids) {
        foreach ($tag_ids as $tag_id) {
            $tag = get_term_by('id', $tag_id, 'product_tag'); // Получение объекта тега по его ID
            $color = get_field('color', 'product_tag_' . $tag->term_id); // Получение значения поля 'color' для тега

            if ($color) {
                echo '<div class="tag bg" style="background-color: ' . $color . '">' . $tag->name . '</div>';
            } else {
                echo '<div class="tag default">' . $tag->name . '</div>';
            }
        }
    }
    echo '</div>';
}

// вывод артикула
add_action('woocommerce_shop_loop_item_title', 'get_product_sku', 7);
function get_product_sku()
{
    global $product;
    echo '<div class="product__sku">' . $product->get_sku() . '</div>';
}

add_action('woocommerce_after_shop_loop_item_title', 'product_right_col_open', 8);
function product_right_col_open()
{
    echo '<div class="product-right-col">';
}
add_action('woocommerce_after_shop_loop_item', 'product_right_col_close', 12);
function product_right_col_close()
{
    echo '</div>';
}

add_action('woocommerce_after_shop_loop_item_title', 'product_actions_box_open', 13);
function product_actions_box_open()
{
    echo '<div class="product-actions-box">';
}
add_action('woocommerce_after_shop_loop_item', 'product_actions_box_close', 14);
function product_actions_box_close()
{
    echo '</div>';
}

add_action('woocommerce_after_shop_loop_item', 'added_product_quantity', 5);
function added_product_quantity()
{
    global $product;
    if ($product->is_sold_individually()) return;
    echo '<div class="product-quantity">';
    echo '<div class="quantity">
            <label class="screen-reader-text" for="smntcswcb">Quantity</label>
            <button class="minus button wp-element-button">-</button>
            <input type="number" id="smntcswcb" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" inputmode="numeric">
            <button class="plus button wp-element-button">+</button>       
        </div>';
    echo '</div>';
}
