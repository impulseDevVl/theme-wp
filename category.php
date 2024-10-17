<?php get_header();
$category = get_queried_object();
$category_id = $category->term_id;
?>
<div class="container">
    <div class="woocommerce-breadcrumb">
        <?php echo bcn_display(); ?>
    </div>
</div>
<div class="h1TitleWrapper">
    <div class="h1TitleInner">
        <h1>Блог, акции, новости</h1>
    </div>
</div>
<!-- <div class="tabs-block">
    <div class="home-category-tabs tabs mb-3">
        <span class="category-tab btn active" data-id="1">Строительные материалы</span>
        <span class="category-tab btn" data-id="2">Хозяйственные материалы</span>
    </div>
    <div class="tab_content mb-3">
        <div class="category-tab-item active-tab" id="1">
            <div class="category__items">
                <div class="category-item"></div>
            </div>
        </div>
        <div class="category-tab-item" id="2" style="display: none;">2</div>
    </div>

</div> -->
<div class="blogListWrapper section">
    <div class="blogListInner">
        <div class="tabs-block">
            <?php
            $categories = get_categories([
                'taxonomy'     => 'category',
                'type'         => 'post',
                'orderby'      => 'name',
                'order'        => 'ASC',
                'hide_empty'   => true,
            ]);
            if ($categories) { ?>
                <div class="blogListTabs tabs">
                    <?php
                    // active
                    foreach ($categories as $cat) { ?>
                        <div class="blogListTab<?php echo ($category_id == $cat->term_id) ? ' active' : '' ?>" data-id="<?php echo $cat->term_id; ?>">
                            <span><?php echo $cat->name; ?></span>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="tab_content">
                <?php if ($categories) {
                    foreach ($categories as $cat) {
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'cat' => $cat->term_id,
                        );

                        $posts = new WP_Query($args);

                        // Цикл
                        if ($posts->have_posts()) {
                            if ($category_id == $cat->term_id) {
                                $tab_item_class = ' active-tab';
                                $tab_item_style = '';
                            } else {
                                $tab_item_class = '';
                                $tab_item_style = 'style="display:none;"';
                            } ?>
                            <div class="category-tab-item<?php echo $tab_item_class; ?>" <?php echo $tab_item_style; ?> id="<?php echo $cat->term_id; ?>">
                                <div class="blogListContent">
                                    <?php echo get_loop_posts($posts, false); ?>
                                </div>
                            </div>
                <?php }
                    }
                    wp_reset_postdata();
                } ?>
            </div>
        </div>
        <!-- <div class="blogListShowMoreButtonWrapper">
            <div class="blogListShowMoreButton">
                Показать еще
            </div>
        </div> -->
    </div>
</div>



<?php
$cat_title = get_field('cat_title', $category);
$thumbnail_image_url = get_field('cat_img',  $category);
$cat_text = get_field('cat_text',  $category);
if ($cat_title && $cat_text) { ?>
    <section class="seoblock section">
        <div class="container">
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
        </div>
    </section>
<?php } ?>

<?php get_footer(); ?>