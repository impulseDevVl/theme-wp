<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function add_class_to_review_submit_button()
{
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            var submitButton = document.querySelector(".woocommerce form p.form-submit input[type=submit]");
            if (submitButton) {
                submitButton.classList.add("btn","btn-primary");
            }
        });
    </script>';
}
add_action('wp_footer', 'add_class_to_review_submit_button');

add_filter('comment_form_fields', 'kama_reorder_comment_fields');
function kama_reorder_comment_fields($fields)
{
    // die(print_r( $fields )); // посмотрим какие поля есть

    $fields['author'] = '<p class="comment-form-author form-row"><input id="author" class="input" name="author" type="text" value="" size="30" placeholder="Ваше Имя*" required=""></p>';
    $fields['email'] = '<p class="comment-form-email form-row"><input id="email"  class="input" name="email" placeholder="Email*" type="email" value="" size="30" required=""></p>';
    // die(print_r( $fields )); // посмотрим какие поля есть

    $new_fields = array(); // сюда соберем поля в новом порядке

    $myorder = array('author', 'email', 'comment'); // нужный порядок

    foreach ($myorder as $key) {
        $new_fields[$key] = $fields[$key];
        unset($fields[$key]);
    }

    // если остались еще какие-то поля добавим их в конец
    if ($fields)
        foreach ($fields as $key => $val)
            $new_fields[$key] = $val;

    return $new_fields;
}

function modify_comment_notes_before($defaults)
{
    // print_r($defaults);
    $new_text = 'Ваш email не будет опубликован. Обязательные поля помечены *'; // Замените это на новый текст
    $defaults['comment_notes_before'] = '<p class="comment-notes">' . $new_text . '</p>';
    return $defaults;
}
add_filter('comment_form_defaults', 'modify_comment_notes_before');
