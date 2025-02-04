<?php

/* Создаем глобальные настройки */
function ea_acf_options_page()
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => 'Основные данные',
            'menu_title' => 'Основные данные',
            'menu_slug'  => 'global-options',
            'capability' => 'edit_posts',
            'icon_url'   => 'dashicons-superhero-alt',
            'redirect'   => false,
            'position' => '11',
        ));
    }
}

add_action('init', 'ea_acf_options_page');

