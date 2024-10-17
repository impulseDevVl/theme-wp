<?php
/*
Template Name: Каталог
Template Post Type: page
*/
?>
<?php get_header(); ?>
<div class="catalog section">
    <div class="container">
        <div class="breadcrams mb-3">
            <nav class="woocommerce-breadcrumb">
                <?php echo bcn_display(); ?>
            </nav>
        </div>
        <h1 class="title-l mb-6"><?php the_title(); ?></h1>
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
        <div class="tabs-block">
            <div class="home-category-tabs tabs mb-3">
                <?php $first_category = true;
                foreach ($all_categories as $category) {
                    if ($category->parent == 0) { ?>
                        <span class="category-tab btn<?php echo $first_category ? ' active' : ''; ?>" data-id="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></span>
                <?php
                        $first_category = false;
                    }
                } ?>
            </div>
            <div class="tab_content mb-3">
                <?php $first_tab_category = true;
                foreach ($all_categories as $category) {
                    if ($category->parent == 0) { ?>
                        <div class="category-tab-item<?php echo $first_tab_category ? ' active-tab' : ''; ?>" id="<?php echo $category->term_id; ?>" <?php echo $first_tab_category ? '' : 'style="display: none;"'; ?>>
                            <div class="category__items">
                                <?php
                                $child_categories = get_terms(
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

                                    <div class="home-category-item category-item">
                                        <div class="category-item__content">
                                            <a href="<?php echo get_term_link($subcat); ?>">
                                                <h4 class="home-category-item__title title-m">
                                                    <?php echo $subcat_name; ?>
                                                </h4>
                                            </a>
                                            <?php $args['parent'] = $subcat_id;
                                            $args['number'] = 4;
                                            $child_subcategories = get_categories($args);
                                            if ($child_subcategories) { ?>
                                                <ul class="home-category-item__list">
                                                    <?php foreach ($child_subcategories as $child) { ?>
                                                        <li class="category-item__li">
                                                            <a class="category-item__link" href="<?php echo get_term_link($child); ?>">
                                                                <?php echo $child->name; ?>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>
                                        </div>
                                        <?php if ($image) { ?>
                                            <img class="home-category-item__img" src="<?php echo $image[0]; ?>" alt="<?php echo $name; ?>">
                                        <?php }
                                        if ($child_subcategories) {  ?>
                                            <a class="category-item__btn btn btn-outline" href="<?php echo get_term_link($subcat); ?>">
                                                Все подкатегории
                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="#1F1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="black" stroke-opacity="0.2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        <?php }else{ ?>
                                            <a class="category-item__btn btn btn-outline" href="<?php echo get_term_link($subcat); ?>">
                                               Все товары
                                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="#1F1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="black" stroke-opacity="0.2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                <?php
                        $first_tab_category = false;
                    }
                } ?>
            </div>
        </div>
    </div>
</div>



<?php get_footer(); ?>

<script>
    // const lists = document.querySelectorAll('.category-item__list');

    // lists.forEach((ul) => {
    //   const liList = ul.querySelectorAll('li');
    //   const btnMore = ul.nextElementSibling;

    //   if (liList.length > 5) {
    //     btnMore.classList.add('active');
    //   }

    //   liList.forEach((li, index) => {
    //     if (index >= 5) {
    //       li.classList.add('hidden');
    //     }
    //   });

    //   btnMore.addEventListener('click', () => {
    //     liList.forEach((li) => {
    //       if (li.classList.contains('hidden')) {
    //         li.classList.remove('hidden');
    //         li.classList.add('visible');
    //       }
    //     //   if(li.classList.contains('visible')){
    //     //     li.classList.add('hidden');
    //     //     li.classList.remove('visible');
    //     //   }
    //     });

    //     // btnMore.classList.add('hidden');
    //     // btnMore.textContent = 'Свернуть';
    //   });
    // });


  
</script>