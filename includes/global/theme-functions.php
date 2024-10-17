<?php
// генерация ссылки для номера телефона
function getPhoneHref($phone)
{
    $phone = str_replace(array(' ', '–', '-', '(', ')'), '', $phone);
    return $phone;
}
// added menu-item class
add_filter('wp_nav_menu_objects', 'wp_nav_menu_custom_class_top_footer_menu', 10, 2);

function wp_nav_menu_custom_class_top_footer_menu($items, $args)
{
    if ($args->menu == 32 || $args->menu == 34) {
        foreach ($items as &$item) {
            $item->classes = 'footerTopLink';
        }
    }else if($args->menu == 33){
        foreach ($items as &$item) {
            $item->classes = 'burgerPopupLink';
        }
    }
    return $items;
}
// add icon in menu
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects($items, $args)
{
    foreach ($items as &$item) {
        $icon = get_field('icon', $item);
        if ($icon) {
            $item->title .= ' <i>' . file_get_contents($icon) . '</i>';
            $item->classes = 'menu-item with-arrow';
        }
    }
    return $items;
}

function get_loop_vacancy($vacancy, $slide)
{
    if ($vacancy->have_posts()) {
        while ($vacancy->have_posts()) {
            $vacancy->the_post();
            $vacancy_id = $vacancy->ID;
            $salary = get_field('salary', $vacancy_id);
            if ($slide == true) {
                echo '<div class="swiper-slide">';
            } ?>
            <a href="<?php echo get_permalink(); ?>">
                <div class="carrierListItem">
                    <div class="carrierListItemTextWrapper">
                        <div class="carrierListItemTitle">
                            <?php the_title() ?>
                        </div>
                        <div class="carrierListItemSalary">
                            <?php echo $salary; ?>
                        </div>
                    </div>
                    <div class="carrierListItemButton">
                        <span>Подробнее</span>
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                <path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </i>
                    </div>
                </div>
            </a>
            <?php if ($slide) {
                echo ' </div>';
            } ?>
        <?php
        }
    } else {
        echo '<p class="text text-center">Вакансий нет</p>';
    }
}


function get_loop_posts($posts, $slide)
{
    if ($posts->have_posts()) {
        while ($posts->have_posts()) {
            $posts->the_post();
            if ($slide == true) {
                echo '<div class="swiper-slide">';
            } ?>
            <a class="blogListLink" href="<?php echo get_permalink(); ?>">
                <div class="blogListItem">
                    <div class="blogListItemText">
                        <?php $post_tags = get_the_tags($posts->ID);
                        $post_categories = get_the_category($posts->ID);
                        if ($post_tags || $post_categories) { ?>
                            <div class="blogListItemLabelsWrapper">
                                <?php if ($post_tags) {
                                    foreach ($post_tags as $tag) { ?>
                                        <div class="blogListItemLabel">
                                            <?php echo $tag->name; ?>
                                        </div>
                                    <?php }
                                }
                                if ($post_categories) {
                                    foreach ($post_categories as $cat) { ?>
                                        <div class="blogListItemLabel">
                                            <?php echo $cat->name; ?>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        <?php  } ?>
                        <div class="blogListItemTitle">
                            <?php the_title() ?>
                        </div>
                    </div>
                    <div class="blogListItemImage">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="blog" />
                    </div>
                </div>
            </a>
            <?php if ($slide) {
                echo ' </div>';
            } ?>
<?php
        }
    } else {
        echo '<p class="text text-center">Постов нет</p>';
    }
}


// add_filter('wpcf7_form_elements', function ($content) {
//     $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
//     return $content;
// });
