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
    'title_li'     => ''
);

$all_categories = get_categories($args);      ?>


<div class="burgerPopupCatalogContent" style="display: none;">
    <?php $first_tab_category = true;
    foreach ($all_categories as $category) {
        if ($category->parent == 0) {

            $child_categories = get_terms(
                array(
                    'taxonomy'   => 'product_cat',
                    'parent'     => $category->term_id,
                    'hide_empty' => true,
                )
            );
            foreach ($child_categories as $subcat) {
                $subcat_name = $subcat->name;
                $subcat_id = $subcat->term_id;
                $args['child_of'] = $subcat_id;
                // $args['number'] = 5;
                $child_subcategories = get_categories($args);
                if ($child_subcategories) {
                    $catalog_item_class = ' hiddenCatalogItem';
                } else {
                    $catalog_item_class = '';
                }
    ?>
                <div class="burgerPopupCatalogContentItem <?php echo  $catalog_item_class; ?>">
                    <div class="burgerPopupCatalogContentItemTitle">
                        <a href="<?php echo get_term_link($subcat); ?>"><?php echo $subcat_name; ?></a>
                        <?php if ($child_subcategories) { ?>
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="11" viewBox="0 0 10 11" fill="none">
                                    <path d="M8.125 3.9375L5 7.0625L1.875 3.9375" stroke="#1F1F1F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8.125 3.9375L5 7.0625L1.875 3.9375" stroke="black" stroke-opacity="0.2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </i>
                        <?php  } ?>
                    </div>
                    <?php

                    if ($child_subcategories) { ?>
                        <div class="burgerPopupCatalogContentItemHidden">
                            <?php foreach ($child_subcategories as $child) { ?>
                                <div class="burgerPopupCatalogContentItemHiddenTitle">
                                    <a href="<?php echo get_term_link($child); ?>"><?php echo $child->name; ?></a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
    <?php }
        }
    } ?>

</div>