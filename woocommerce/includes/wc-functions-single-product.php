<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// remove sale flash
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
// remove product images
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
//remove price
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);


add_action('woocommerce_single_product_summary', 'added_single_product_tags', 8);
function added_single_product_tags()
{
    get_product_tags();
    // woocommerce_show_product_images(); // вывод изображений товара
}

// обертка для цены и кнопки купить
add_action('woocommerce_single_product_summary', 'added_product_price_add_cart_open', 25);
function added_product_price_add_cart_open()
{
    global $product;
    echo wc_get_stock_html($product); // WPCS: XSS ok.
    echo '<div class="product-price-add-cart">';
}
add_action('woocommerce_single_product_summary', 'added_product_price_add_cart_close', 32);
function added_product_price_add_cart_close()
{
    echo '</div>';
}

// перенос цены к кнопке купить
add_action('woocommerce_single_product_summary', 'added_single_price', 26);
function added_single_price()
{
    woocommerce_template_single_price();
}

// output of additional information
add_action('woocommerce_single_product_summary', 'additional_information_inner_open', 10);

function additional_information_inner_open()
{
    global $product;
    echo '<div class="product-information">';
    // вывод артикула 
    if ($product->get_sku()) {
?>
        <div class="product-info-row d-flex">
            <div class="product-info__text">Артикул</div>
            <div class="product-info__title"><?php echo $product->get_sku(); ?></div>
        </div>
    <?php
    }
    $attr = $product->get_attributes(); // Получаем атрибуты товара
    if (is_array($attr)) {
        foreach ($attr as $key => $value) {
            echo ' <div class="product-info-row d-flex">';
            echo '<div class="product-info__text">' . wc_attribute_label($value['name']) . "</div>"; // Выводим наименование атрибута
            echo '<div class="product-info__title">';
            foreach ($value->get_terms() as $pa) { // Выборка значения заданного атрибута
                echo $pa->name; // Выводим значение атрибута
            }
            echo '</div>';
            echo '</div>';
        }
    }
}

add_action('woocommerce_single_product_summary', 'additional_information_inner_close', 24);

function additional_information_inner_close()
{
    echo '</div>';
}


add_action('woocommerce_before_single_product_summary', 'product_wrapper_open', 30);
function product_wrapper_open()
{
    echo '<div class="ptoduct-wrapper section">';
    echo '<div class="product__inner">';
}

add_action('woocommerce_after_single_product_summary', 'product_wrapper_close', 12);
function product_wrapper_close()
{
    echo '</div>';
    wc_show_product_images();
    // woocommerce_show_product_images(); // вывод изображений товара
    echo '</div>';
}


function wc_show_product_images()
{
    // Получаем объект товара по его ID
    $product_id = get_the_ID(); // ID текущего товара
    $product = wc_get_product($product_id);
    // Получаем галерею изображений товара
    $attachment_ids = $product->get_gallery_image_ids();
    $main_img = wp_get_attachment_url($product->get_image_id());

    // Выводим изображения товара
    if (count($attachment_ids) > 0) { ?>
        <div class="product-images">
            <div class="product-image product-images-swiper swiper br-20">
                <div class="swiper-wrapper">
                    <?php
                    echo ' <div class="swiper-slide br-20">
                            <a data-fancybox="gallary" data-src="' . $main_img . '">
                                <img class="product-img" src="' . $main_img . '" alt="' . $product->get_image_id() . '" />
                            </a>
                        </div>';
                    foreach ($attachment_ids as $attachment_id) {
                        // Получаем URL изображения
                        $image_url = wp_get_attachment_url($attachment_id);
                        // Выводим HTML-код изображения
                        echo ' <div class="swiper-slide br-20">
                                    <a data-fancybox="gallary" data-src="' . $image_url . '">
                                        <img class="product-img" src="' . $image_url . '" alt="' . $attachment_id . '" />
                                    </a>
                                </div>';
                    }
                    $video_items = get_field('video_items');
                    if ($video_items) {
                        foreach ($video_items as $key => $item) { ?>
                            <div class="swiper-slide swiper-slide--is-video br-20">
                                <a data-fancybox data-src="<?php echo $item['url']; ?>">
                                    <div class="btn-play">
                                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="40" cy="40" r="40" fill="#1f1f1f" />
                                            <circle cx="40" cy="40" r="40" fill="#ffd300" />
                                            <path d="M29 48.9859C29.0513 51.3135 31.3516 52.7234 33.3673 51.6149L49.5762 42.0828C50.4594 41.5628 51.0585 40.6103 51.0585 39.4943C51.0585 38.3782 50.4594 37.4252 49.5768 36.9057L33.3678 27.387C31.3521 26.2786 29.0513 27.6747 29.0005 30.0027L29 48.9859Z" fill="white" />
                                        </svg>
                                    </div>
                                    <video>
                                        <source src="<?php echo $item['url']; ?>" type="video/mp4" />
                                        Ваш браузер не поддерживает тег <code>video</code>.
                                    </video>
                                </a>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
            <!-- thumbs -->
            <div class="product-thumbs__wrapper">
                <div class="product-thumbs swiper" thumbsSlider="">
                    <div class="swiper-wrapper">
                        <?php
                        echo ' <div class="swiper-slide product-thumb"><img class="product-img" src="' . $main_img . '" alt="' . $product->get_image_id() . '" /></div>';
                        foreach ($attachment_ids as $attachment_id) {
                            $image_url = wp_get_attachment_url($attachment_id);
                            echo ' <div class="swiper-slide product-thumb"><img class="product-img" src="' . $image_url . '" alt="' . $attachment_id . '" /></div>';
                        }
                        $video_items = get_field('video_items');
                        if ($video_items) {
                            foreach ($video_items as $key => $item) { ?>
                                <div class="swiper-slide product-thumb">
                                    <div class="btn-play">
                                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="40" cy="40" r="40" fill="#1f1f1f" />
                                            <circle cx="40" cy="40" r="40" fill="#ffd300" />
                                            <path d="M29 48.9859C29.0513 51.3135 31.3516 52.7234 33.3673 51.6149L49.5762 42.0828C50.4594 41.5628 51.0585 40.6103 51.0585 39.4943C51.0585 38.3782 50.4594 37.4252 49.5768 36.9057L33.3678 27.387C31.3521 26.2786 29.0513 27.6747 29.0005 30.0027L29 48.9859Z" fill="white" />
                                        </svg>
                                    </div>
                                    <video>
                                        <source src="<?php echo $item['url']; ?>" type="video/mp4" />
                                        Ваш браузер не поддерживает тег <code>video</code>.
                                    </video>
                                </div>
                        <?php }
                        } ?>

                    </div>
                </div>
                <div class="swiper-button-prev product-swiper-btn">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.5625 8.125L3.4375 5L6.5625 1.875" stroke="#1F1F1F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.5625 8.125L3.4375 5L6.5625 1.875" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="swiper-button-next product-swiper-btn">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.4375 1.875L6.5625 5L3.4375 8.125" stroke="#1F1F1F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3.4375 1.875L6.5625 5L3.4375 8.125" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>

        </div>
    <?php
    } else {
        if (!$main_img) {
            $main_img = wc_placeholder_img_src();
            $main_img_class = 'no-img';
        } else {
            $main_img_class = '';
        }
        // $main_img = wc_placeholder_img_src();
        echo '<figure class="product-images ' . $main_img_class . '">
                <a class="product-main-img product-image" href="' . $main_img . '" data-fancybox>
                    <img src="' . $main_img . '" alt="' . $product->get_image_id() . '"/>
                </a>';
        echo '</figure>';
    }
}

// Добавление Таба доставка и оплата 
add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);
function woo_remove_product_tabs($tabs)
{
    global $product;

    $tabs['delivery'] = array(
        'title'    => 'Доставка и оплата',
        'priority' => 20,
        'callback' => 'baza_delivery_tab'
    );

    if ($product->has_attributes() || $product->has_dimensions() || $product->has_weight()) {
        $tabs['additional_information'] = array(
            'title'    => 'Характеристики',
            'callback' => 'baza_additional_information_tab'
        );
    } else {
        unset($tabs['additional_information']);
    }

    // unset( $tabs['additional_information'] );  	// Remove the additional information tab
    return $tabs;
}

function baza_delivery_tab()
{
    wc_get_template('single-product/tabs/delivery.php');
}
function baza_additional_information_tab()
{
    wc_get_template('single-product/tabs/additional-information.php');
}

// изменяме количетсво выводимиых товаров в карточке товара
add_filter('woocommerce_upsell_display_args', 'wc_change_number_related_products', 20);

function wc_change_number_related_products($args)
{

    $args['posts_per_page'] = 6;
    $args['columns'] = 1; //change number of upsells here
    return $args;
}
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

add_action('wp_footer', 'wp_single_product_footer_action');
function wp_single_product_footer_action()
{
    if (is_product()) { ?>
        <script>
            // let product_inner = $('.product__inner')
            let product_images = $('.product-images')
            if (window.innerWidth < 786) {
                $('.summary .products-tags').after(product_images)
            } else {
                $('.product__inner').after(product_images)
            }
            $(window).resize(function() {
                if (window.innerWidth < 786) {
                    $('.summary .products-tags').after(product_images)
                } else {
                    $('.product__inner').after(product_images)
                }
            })
        </script>
<?php }
}
