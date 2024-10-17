<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

add_filter('woocommerce_account_menu_items', 'misha_remove_my_account_links');
function misha_remove_my_account_links($menu_links)
{

    // unset($menu_links['edit-address']); // Addresses
    // unset( $menu_links['dashboard'] ); // Dashboard
    //unset( $menu_links['payment-methods'] ); // Payment Methods
    //unset( $menu_links['orders'] ); // Orders
    unset($menu_links['downloads']); // Downloads
    //unset( $menu_links['edit-account'] ); // Account details
    //unset( $menu_links['customer-logout'] ); // Logout

    return $menu_links;
}

function filter_woocommerce_get_endpoint_url($url, $endpoint, $value, $permalink)
{
    // DEBUG INFO (uncomment if needed)
    //echo '<pre> 1. ', print_r($url, 1), '</pre>';
    //echo '<pre> 2. ', print_r($endpoint, 1), '</pre>';
    //echo '<pre> 3. ', print_r($value, 1), '</pre>';
    //echo '<pre> 4. ', print_r($permalink, 1), '</pre>';

    if ($endpoint === 'edit-address') {
        // Custom URL
        $url = site_url() . '/my-account/edit-address/billing/';
    }

    return $url;
}
add_filter('woocommerce_get_endpoint_url', 'filter_woocommerce_get_endpoint_url', 10, 4);


// function add_custom_class_to_form_field_args($args, $key, $value)
// {
//     if (is_array($args) && isset($args['type']) && $args['type'] === 'text') {
//         $args['class'][] = 'input';
//     }
//     return $args;
// }
// add_filter('woocommerce_form_field_args', 'add_custom_class_to_form_field_args', 10, 3);

add_filter('woocommerce_billing_fields', 'custom_override_billing_fields');
function custom_override_billing_fields($address_fields)
{

    $address_fields['billing_postcode']['required'] = false;
    $address_fields['billing_state']['required'] = false;
    $address_fields['billing_country']['required'] = false;
    $address_fields['billing_last_name']['required'] = false;
    $address_fields['billing_company']['required'] = false;
    $address_fields['billing_city']['label'] = 'Город';

    // unset($address_fields['billing_postcode']);
    unset($address_fields['billing_state']);
    unset($address_fields['billing_last_name']);
    unset($address_fields['billing_company']);
    unset($address_fields['billing_address_2']);
    //не сработает unset( $address_fields ['billing_country'] ); 

    return $address_fields;
}

/**
 * Добавляем поля в форму регистрации 
 */
add_action('woocommerce_register_form_start', 'truemisha_form_registration_fields', 25);

function truemisha_form_registration_fields()
{

    // поле "Имя"
    $billing_phone = !empty($_POST['billing_phone']) ? $_POST['billing_phone'] : '';
    echo '<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		    <input data-tel-input maxlength="18" type="text" class="input-text" placeholder="Телефон" name="billing_phone" id="kind_of_phone" value="' . esc_attr($billing_phone) . '" />
	    </p>';

    // чтобы всё не съехало, ведь у нас "на флоатах"
    echo '<div class="clear"></div>';
}

// Валидация полей
add_filter('woocommerce_registration_errors', 'truemisha_validate_registration', 25);

function truemisha_validate_registration($errors)
{

    // если хотя бы одно из полей не заполнено
    if (empty($_POST['billing_phone'])) {
        $errors->add('name_err', '<strong>Ошибка</strong>: Введите номер телефона');
    }

    return $errors;
}

// Сохранение полей в профиль пользователя
add_action('woocommerce_created_customer', 'truemisha_save_fields', 25);

function truemisha_save_fields($user_id)
{

    // сохраняем Имя
    if (isset($_POST['billing_phone'])) {
        update_user_meta($user_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
    }
}
// function remove_last_name_field($fields)
// {
//     unset($fields['account_last_name']);
//     return $fields;
// }
// add_filter('woocommerce_billing_fields', 'remove_last_name_field');
