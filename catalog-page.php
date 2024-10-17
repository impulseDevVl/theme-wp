<?php
/*
Template Name: Дополнительные категории
Template Post Type: page
*/
?>
<?php get_header();
$category_ids = get_field('category');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 8, // Количество выводимых товаров (-1 для вывода всех)
    'paged' => $paged,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat', // Таксономия для категорий товаров WooCommerce
            'field' => 'term_id', // Используем ID категорий
            'terms' => $category_ids, // ID категорий для фильтрации
            'operator' => 'IN', // Оператор для поиска
        ),
    ),
);

?>
<section class="section woocommerce">
    <div class="container">
        <div class="section catalog-page">
            <div class="woocommerce-breadcrumb">
                <?php echo bcn_display(); ?>
            </div>
            <h1 class="woocommerce-products-header__title title"><?php the_title(); ?></h1>
            <div class="products-wrapper section">
                <div class="products-filter br-20">
                    <?php echo do_shortcode('[fe_widget]'); ?>
                </div>
                <div class="products__inner">
                    <?php
                    $products = new WP_Query($args);
                    if ($products->have_posts()) : ?>
                        <ul class="products columns-1">
                            <?php while ($products->have_posts()) : $products->the_post(); ?>
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
                            <?php endwhile; ?>
                        </ul>
                        <?php if ($products->max_num_pages > 1) { ?>
                            <div id="load-more-products" class="lmp_load_more_button br_lmp_button_settings center-block">
                                <a class="lmp_button btn btn-outline" href="">Показать еще</a>
                            </div>
                        <?php } ?>
                        <nav class="woocommerce-pagination pagination" data-total-pages="<?php echo $products->max_num_pages; ?>" data-category-ids="<?php echo implode(',', $category_ids); ?>">
                            <?php
                            // Выводим пагинацию
                            echo paginate_links(array(
                                'total' => $products->max_num_pages, // Общее количество страниц
                                'current' => $paged, // Текущая страница
                                'format' => '?paged=%#%', // Формат ссылки
                                'prev_text' => __('←'),
                                'next_text' => __('→'),
                                'type'         => 'list',
                                'mid_size' => 3
                            ));
                            ?>
                        </nav>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </div>
            </div>
            <?php
            catalogDescription(get_field('seo_text'));
            faqBlock(get_field('faq_title'), get_field('faq_items')); ?>
        </div>
</section>
<?php get_footer(); ?>