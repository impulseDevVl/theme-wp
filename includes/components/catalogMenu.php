<?php
// Получаем все категории WooCommerce
$taxonomy     = 'product_cat';
$orderby      = 'name';
$show_count   = 0;      // Показывать количество товаров
$pad_counts   = 0;      // Заполнить счетчик нулями
$hierarchical = 1;      // Использовать иерархическую структуру

$args = array(
    'taxonomy'     => $taxonomy,
    'orderby'      => $orderby,
    'show_count'   => $show_count,
    'pad_counts'   => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li'     => '',
    'exclude'      => '15,424',
);

$all_categories = get_categories($args);

?>
<div class="catalog-menu" style="display: none;">
    <div class="catalog-menu__wrapper">
        <div class="container">
            <div class="catalog-menu__head mb-3">
                <h3 class="title">Каталог</h3>
                <button class="catalog-menu-btn__close">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6L18 18" stroke="#A7A7A7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="catalog-menu__inner">
                <div class="tabs-block">
                    <div class="catalog-menu-tabs tabs mb-3">
                        <?php $first_category = true;
                        foreach ($all_categories as $category) {
                            if ($category->parent == 0) { ?>

                                <span class="catalog-menu__title catalog-menu-tab btn tab<?php echo $first_category ? ' active' : ''; ?>" data-id="<?php echo $category->term_id.'1'; ?>">
                                    <?php echo $category->name; ?>
                                </span>

                        <?php $first_category = false;
                            }
                        } ?>
                    </div>
                    <div class="tab_content mb-3">
                        <?php $first_category = true;
                        foreach ($all_categories as $category) {
                            if ($category->parent == 0) { ?>
                                <div class="catalog-menu-tab-item<?php echo $first_tab_category ? ' active-tab' : ''; ?>" id="<?php echo $category->term_id.'1'; ?>" <?php echo $first_tab_category ? '' : 'style="display: none;"'; ?>>
                                    <ul class="catalog-menu__items">
                                        <?php $child_categories = get_terms(
                                            array(
                                                'taxonomy'   => 'product_cat',
                                                'parent'     => $category->term_id,
                                                'hide_empty' => true,
                                                // 'number' => 5,
                                            )
                                        );
                                        foreach ($child_categories as $subcat) {
                                            $subcat_name = $subcat->name;
                                            $subcat_id = $subcat->term_id;
                                            $thumbnail_id = get_term_meta($subcat_id, 'thumbnail_id', true);
                                            $image = wp_get_attachment_image_src($thumbnail_id, 'full'); ?>
                                            <li class="catalog-menu-item">
                                                <a class="catalog-menu__link" href="<?php echo get_term_link($subcat); ?>">
                                                    <?php echo $subcat_name; ?>
                                                </a>
                                                <?php $args['child_of'] = $subcat_id;
                                                // $args['number'] = 4;
                                                $child_subcategories = get_categories($args);
                                                if ($child_subcategories) { ?>
                                                    <ul class="catalog-menu__subitems">
                                                        <?php foreach ($child_subcategories as $child) { ?>
                                                            <li class="catalog-menu-subitem">
                                                                <a class="catalog-menu-subitem__link" href="<?php echo get_term_link($child); ?>">
                                                                    <?php echo $child->name; ?>
                                                                </a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                    <button class="catalog-menu-item__btn">Показать еще</button>
                                                <?php } ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                        <?php
                                $first_category = false;
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>