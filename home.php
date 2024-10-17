<?php
/*
Template Name: home
Template Post Type: post, page
*/
?>
<?php get_header(); ?>

<?php
// include('includes/components/feedback-questions.php'); 
?>
<?php $top_slider = get_field('top_slider');
if ($top_slider) { ?>
    <section class="banner">
        <h1 class="hidden">Интернет-магазин «БазаСтройка»</h1>
        <div class="container">
            <div class="banner__inner">
                <div class="banner-swiper swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($top_slider as $key => $item) { ?>
                            <div class="banner-item swiper-slide" style="background-image: url(<?php echo $item['img']['url']; ?>);">
                                <div class="banner-item__content">
                                    <h3 class="banner-item__title title-l"><?php echo $item['title']; ?></h3>
                                    <p class="banner-item__text"><?php echo $item['text']; ?></p>
                                    <?php if ($item['btn']['url'] == '#') {
                                        $btn_url = 'data-fancybox data-src="#cooperation"';
                                    } else {
                                        $btn_url = 'href="' . $item['btn']['url'] . '"';
                                    } ?>
                                    <a class="banner-item__btn btn btn-default" <?php echo $btn_url; ?>>
                                        <?php echo $item['btn']['title']; ?>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-scrollbar"></div>
                </div>
                <div class="swiper-button-next swiper-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
                        <g filter="url(#filter0_d_186_3439)">
                            <circle cx="28" cy="28" r="20" fill="white" />
                            <path d="M21 26.9995C20.4477 26.9995 20 27.4472 20 27.9995C20 28.5518 20.4477 28.9995 21 28.9995V26.9995ZM37.7071 28.7066C38.0976 28.3161 38.0976 27.6829 37.7071 27.2924L31.3431 20.9284C30.9526 20.5379 30.3195 20.5379 29.9289 20.9284C29.5384 21.319 29.5384 21.9521 29.9289 22.3427L35.5858 27.9995L29.9289 33.6564C29.5384 34.0469 29.5384 34.6801 29.9289 35.0706C30.3195 35.4611 30.9526 35.4611 31.3431 35.0706L37.7071 28.7066ZM21 28.9995H37V26.9995H21V28.9995Z" fill="#1F1F1F" />
                            <path d="M21 26.9995C20.4477 26.9995 20 27.4472 20 27.9995C20 28.5518 20.4477 28.9995 21 28.9995V26.9995ZM37.7071 28.7066C38.0976 28.3161 38.0976 27.6829 37.7071 27.2924L31.3431 20.9284C30.9526 20.5379 30.3195 20.5379 29.9289 20.9284C29.5384 21.319 29.5384 21.9521 29.9289 22.3427L35.5858 27.9995L29.9289 33.6564C29.5384 34.0469 29.5384 34.6801 29.9289 35.0706C30.3195 35.4611 30.9526 35.4611 31.3431 35.0706L37.7071 28.7066ZM21 28.9995H37V26.9995H21V28.9995Z" fill="black" fill-opacity="0.2" />
                        </g>
                        <defs>
                            <filter id="filter0_d_186_3439" x="0" y="0" width="60" height="60" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset dx="2" dy="2" />
                                <feGaussianBlur stdDeviation="5" />
                                <feComposite in2="hardAlpha" operator="out" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_186_3439" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_186_3439" result="shape" />
                            </filter>
                        </defs>
                    </svg>
                </div>
                <div class="swiper-button-prev swiper-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
                        <g filter="url(#filter0_d_186_3436)">
                            <circle cx="28" cy="28" r="20" fill="white" />
                            <path d="M37 29C37.5523 29 38 28.5523 38 28C38 27.4477 37.5523 27 37 27V29ZM20.2929 27.2929C19.9024 27.6834 19.9024 28.3166 20.2929 28.7071L26.6569 35.0711C27.0474 35.4616 27.6805 35.4616 28.0711 35.0711C28.4616 34.6805 28.4616 34.0474 28.0711 33.6569L22.4142 28L28.0711 22.3431C28.4616 21.9526 28.4616 21.3195 28.0711 20.9289C27.6805 20.5384 27.0474 20.5384 26.6569 20.9289L20.2929 27.2929ZM37 27L21 27V29L37 29V27Z" fill="#1F1F1F" />
                            <path d="M37 29C37.5523 29 38 28.5523 38 28C38 27.4477 37.5523 27 37 27V29ZM20.2929 27.2929C19.9024 27.6834 19.9024 28.3166 20.2929 28.7071L26.6569 35.0711C27.0474 35.4616 27.6805 35.4616 28.0711 35.0711C28.4616 34.6805 28.4616 34.0474 28.0711 33.6569L22.4142 28L28.0711 22.3431C28.4616 21.9526 28.4616 21.3195 28.0711 20.9289C27.6805 20.5384 27.0474 20.5384 26.6569 20.9289L20.2929 27.2929ZM37 27L21 27V29L37 29V27Z" fill="black" fill-opacity="0.2" />
                        </g>
                        <defs>
                            <filter id="filter0_d_186_3436" x="0" y="0" width="60" height="60" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                <feOffset dx="2" dy="2" />
                                <feGaussianBlur stdDeviation="5" />
                                <feComposite in2="hardAlpha" operator="out" />
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" />
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_186_3436" />
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_186_3436" result="shape" />
                            </filter>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<section class="home-category">
    <div class="container">
        <h2 class="home-category__title title mb-3"><?php the_field('home_category_title'); ?></h2>
        <div class="tabs-block">
            <div class="home-category-tabs tabs mb-3">
                <span class="category-tab btn active" data-id="1">Строительные материалы «База стройка»</span>
                <span class="category-tab btn" data-id="2">Хозяйственные материалы «Радости»</span>
            </div>
            <div class="tab_content mb-3">
                <div class="category-tab-item active-tab" id="1">
                    <div class="category__items">
                        <?php $cat_construction_materials = get_field('cat_construction_materials');
                        foreach ($cat_construction_materials as $key => $item) {
                            $id = $item->term_id;
                            $name = $item->name;
                            $thumbnail_id = get_term_meta($id, 'thumbnail_id', true);
                            $image = wp_get_attachment_image_src($thumbnail_id, 'full');
                            $child_categories = get_terms(
                                array(
                                    'taxonomy'   => 'product_cat', // Таксономия категорий товаров в WooCommerce
                                    'parent'     => $id, // ID родительской категории
                                    'hide_empty' => true, // Отображать все категории, включая пустые
                                    'number' => 5,
                                )
                            ); ?>
                            <div class="home-category-item category-item">
                                <div class="category-item__content">
                                    <a href="<?php echo get_term_link($item); ?>">
                                        <h4 class="home-category-item__title title-m">
                                            <?php echo $name; ?>
                                        </h4>
                                    </a>
                                    <?php if ($child_categories) { ?>
                                        <ul class="home-category-item__list">
                                            <?php foreach ($child_categories as $child_category) { ?>
                                                <li class="category-item__li">
                                                    <a class="category-item__link" href="<?php echo get_term_link($child_category); ?>">
                                                        <?php echo $child_category->name; ?>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                                <?php if ($image) { ?>
                                    <img class="home-category-item__img" src="<?php echo $image[0]; ?>" alt="<?php echo $name; ?>">
                                <?php } ?>
                                <a class="category-item__btn btn btn-outline" href="<?php echo get_term_link($item); ?>">
                                    Все подкатегории
                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="#1F1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="black" stroke-opacity="0.2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        <?php } ?>

                    </div>
                </div>
                <div class="category-tab-item" id="2" style="display: none;">
                    <div class="category__items">
                        <?php $cat_construction_materials = get_field('cat_household_materials');
                        foreach ($cat_construction_materials as $key => $item) {
                            $id = $item->term_id;
                            $name = $item->name;
                            $thumbnail_id = get_term_meta($id, 'thumbnail_id', true);
                            $image = wp_get_attachment_image_src($thumbnail_id, 'full');
                            $child_categories = get_terms(
                                array(
                                    'taxonomy'   => 'product_cat', // Таксономия категорий товаров в WooCommerce
                                    'parent'     => $id, // ID родительской категории
                                    'hide_empty' => true, // Отображать все категории, включая пустые
                                    'number' => 5,
                                )
                            ); ?>
                            <div class="home-category-item category-item">
                                <div class="category-item__content">
                                    <a href="<?php echo get_term_link($item); ?>">
                                        <h4 class="home-category-item__title title-m">
                                            <?php echo $name; ?>
                                        </h4>
                                    </a>
                                    <?php if ($child_categories) { ?>
                                        <ul class="home-category-item__list">
                                            <?php foreach ($child_categories as $child_category) { ?>
                                                <li class="category-item__li">
                                                    <a class="category-item__link" href="<?php echo get_term_link($child_category); ?>">
                                                        <?php echo $child_category->name; ?>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                                <?php if ($image) { ?>
                                    <img class="home-category-item__img" src="<?php echo $image[0]; ?>" alt="<?php echo $name; ?>">
                                <?php } ?>
                                <a class="category-item__btn btn btn-outline" href="<?php echo get_term_link($item); ?>">
                                    Все подкатегории
                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="#1F1F1F" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="black" stroke-opacity="0.2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="center-block">
                <a href="/katalog" class="btn btn-outline default">
                    Смотреть полный каталог
                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 9.5L14.5 9.5M14.5 9.5L10.45 5M14.5 9.5L10.45 14" stroke="#A7A7A7" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="promoblock section">
    <div class="container container-fluid">
        <div class="promoblock__inner">
            <div class="promoblock__content">
                <div class="promoblock__title title"><?php the_field('promo_title'); ?></div>
                <div class="promoblock__text subtitle"><?php the_field('promo_text'); ?></div>
                <?php $promo_btn = get_field('promo_btn'); ?>
                <button class="promoblock__btn btn btn-outline white" data-fancybox data-src="#sales-department">
                    <?php echo $promo_btn['title']; ?>
                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
<div class="home-products section">
    <div class="container container-fluid">
        <div class="home-products__wrapper br-20">
            <h3 class="home-products__title title mb-3">Выгодные предложения и новые поступления</h3>
            <div class="tabs-block">
                <div class="products-tabs__inner">
                    <div class="home-products-tabs tabs mb-3">
                        <?php $home_products = get_field('home_products');
                        $first_category = true;
                        foreach ($home_products as $key => $item) {
                            $key += 3; ?>
                            <span class="product-tab btn btn-outline <?php echo $first_category ? ' active' : ''; ?>" data-id="<?php echo $key; ?>">
                                <?php echo file_get_contents($item['icon']); ?>
                                <?php echo $item['tab_name'] ?>
                            </span>
                        <?php $first_category = false;
                        } ?>
                    </div>
                </div>
                <div class="tab_content">
                    <?php $first_category = true;
                    foreach ($home_products as $key => $item) {
                        $key += 3; ?>
                        <div class="product-tab-item<?php echo $first_category ? ' active-tab' : ''; ?>" id="<?php echo $key; ?>" <?php echo $first_category ? '' : 'style="display: none;"'; ?>>
                            <div class="products__items">
                                <div class="woocommerce">
                                    <?php display_products($item['products']); ?>
                                </div>
                            </div>
                        </div>
                    <?php
                        $first_category = false;
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Выгодные предложения и новые поступления -->
<section class="quiz section">
    <div class="container">
        <h3 class="quiz__title title"><?php the_field('quiz_title'); ?></h3>
        <p class="quiz__text subtitle mb-3"><?php the_field('quiz_text'); ?></p>
        <div class="quiz__inner br-20"><?php the_field('quiz_code'); ?></div>
    </div>
</section>

<section class="delivery section">
    <div class="container container-fluid">
        <div class="delivery__inner br-20">
            <h4 class="delivery__title title"><?php the_field('delivery_title'); ?></h4>
            <p class="delivery__text subtitle"><?php the_field('delivery_text'); ?></p>
            <div class="delivery__items">
                <?php $delivery_items = get_field('delivery_items');
                foreach ($delivery_items as $key => $item) { ?>
                    <div class="delivery-item">
                        <h5 class="delivery-item__title text"><?php echo $item['title']; ?></h5>

                        <ul class="delivery-item__list">
                            <?php foreach ($item['delivery_list'] as $list) { ?>
                                <li class="delivery-item__li d-flex">
                                    <div class="delivery-item__icon"><?php echo file_get_contents($list['icon']); ?></div>
                                    <div class="delivery-item__text"><?php echo $list['text']; ?></div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <div class="delivery-wrapper-item">
                    <?php $delivery_link = get_field('delivery_link'); ?>
                    <div class="delivery-item-outline btn btn-outline white">
                        <a class="delivery-item-outline__text" href="<?php echo $delivery_link['url']; ?>">
                            <span><?php echo $delivery_link['title']; ?></span>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 10L14.5 10M14.5 10L10.45 5.5M14.5 10L10.45 14.5" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    <?php $delivery_link_wa = get_field('delivery_link_wa'); ?>
                    <a class="delivery-item-outline__btn btn btn-outline white" href=" <?php echo $delivery_link_wa['url']; ?>">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_691_920)">
                                <path d="M12.003 0.5H11.997C5.3805 0.5 0 5.882 0 12.5C0 15.125 0.846 17.558 2.2845 19.5335L0.789 23.9915L5.4015 22.517C7.299 23.774 9.5625 24.5 12.003 24.5C18.6195 24.5 24 19.1165 24 12.5C24 5.8835 18.6195 0.5 12.003 0.5ZM18.9855 17.4455C18.696 18.263 17.547 18.941 16.6305 19.139C16.0035 19.2725 15.1845 19.379 12.4275 18.236C8.901 16.775 6.63 13.1915 6.453 12.959C6.2835 12.7265 5.028 11.0615 5.028 9.3395C5.028 7.6175 5.9025 6.779 6.255 6.419C6.5445 6.1235 7.023 5.9885 7.482 5.9885C7.6305 5.9885 7.764 5.996 7.884 6.002C8.2365 6.017 8.4135 6.038 8.646 6.5945C8.9355 7.292 9.6405 9.014 9.7245 9.191C9.81 9.368 9.8955 9.608 9.7755 9.8405C9.663 10.0805 9.564 10.187 9.387 10.391C9.21 10.595 9.042 10.751 8.865 10.97C8.703 11.1605 8.52 11.3645 8.724 11.717C8.928 12.062 9.633 13.2125 10.671 14.1365C12.0105 15.329 13.0965 15.71 13.485 15.872C13.7745 15.992 14.1195 15.9635 14.331 15.7385C14.5995 15.449 14.931 14.969 15.2685 14.4965C15.5085 14.1575 15.8115 14.1155 16.1295 14.2355C16.4535 14.348 18.168 15.1955 18.5205 15.371C18.873 15.548 19.1055 15.632 19.191 15.7805C19.275 15.929 19.275 16.6265 18.9855 17.4455Z" fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_691_920">
                                    <rect width="24" height="24" fill="white" transform="translate(0 0.5)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <?php echo $delivery_link_wa['title']; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="benefits section">
    <div class="container">
        <h3 class="benefits__title title mb-3"><?php echo the_field('benefits_title'); ?></h3>
        <div class="benefits__inner">
            <div class="benefits__text text">
                <?php echo the_field('benefits_text'); ?>
            </div>
            <div class="benefits__items">
                <?php $benefits_items = get_field('benefits_items');
                foreach ($benefits_items as $key => $item) { ?>
                    <div class="benefits-item br-20">
                        <div class="benefits-item__icon">
                            <?php echo file_get_contents($item['icon']); ?>
                        </div>
                        <h6 class="benefits-item__title text"><?php echo $item['text']; ?></h6>
                    </div>
                <?php
                } ?>
            </div>
        </div>
    </div>
</div>
<div id="cooperation" class="popup popup-form" style="display: none;">
    <div class="popup-text__content">
        <h4 class="popup__title title-m">Начать сотрудничество</h4>
        <p class="popup__text">Возможно какой то текст</p>
    </div>
    <?php echo do_shortcode('[contact-form-7 id="cf0fda5" title="Начать сотрудничество" html_name="form-cooperation" html_class="form-cooperation"]'); ?>
</div>
<div id="sales-department" class="popup popup-form" style="display: none;">
    <div class="popup-text__content">
        <h4 class="popup__title title-m">Связаться с отделом продаж</h4>
        <p class="popup__text">Заказать коплексный заказ</p>
    </div>
    <?php echo do_shortcode('[contact-form-7 id="6ed5ab8" title="Начать сотрудничество" html_name="form-cooperation" html_class="form-cooperation"]'); ?>

</div>
<?php get_footer(); ?>

<?php
$args = array(
    'post_type'       => 'services',
    'posts_per_page'  => -1,
);
$query = new WP_Query($args);
//if($query->have_posts()) { 
?>