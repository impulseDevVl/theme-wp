<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

add_filter('woocommerce_checkout_fields', 'estore_woocommerce_form_checkout_fields');
function estore_woocommerce_form_checkout_fields($fields)
{
    $fields['billing']['billing_city']['label'] = 'Город';
    $fields['billing']['billing_first_name']['label'] = '';
    // $fields['billing']['billing_company']['label'] = '';
    $fields['billing']['billing_address_1']['label'] = '';
    $fields['billing']['billing_phone']['label'] = '';
    $fields['billing']['billing_city']['label'] = '';
    $fields['billing']['billing_email']['label'] = '';
    $fields['billing']['billing_postcode']['label'] = '';

    $fields['billing']['billing_first_name']['placeholder'] = 'Имя*';
    // $fields['billing']['billing_company']['placeholder'] = 'Название компании';
    $fields['billing']['billing_city']['placeholder'] = 'Город*';
    $fields['billing']['billing_phone']['placeholder'] = 'Телефон*';
    $fields['billing']['billing_email']['placeholder'] = 'Электронная почта*';
    $fields['billing']['billing_postcode']['placeholder'] = 'Почтовый индекс';

    $fields['billing']['billing_state']['required'] = false;
    $fields['billing']['billing_address_1']['required'] = false;
    $fields['billing']['billing_phone']['required'] = true;

    // $fields['billing']['billing_company']['priority'] = 8;
    $fields['billing']['billing_city']['priority'] = 120;
    $fields['billing']['billing_email']['priority'] = 70;
    $fields['billing']['billing_phone']['priority'] = 20;


    $fields['order']['order_comments']['label'] = 'Комментарий к заказу';
    $fields['order']['order_comments']['placeholder'] = 'Примечания к вашему заказу, например, пожелания к отделу доставки';


    $fields['billing']['billing_first_name']['class'] = 'form-row-half mr';
    // $fields['billing']['billing_company']['class'] = 'form-row-half';
    $fields['billing']['billing_phone']['class'] = 'form-row-half';

    return $fields;
}

add_filter('woocommerce_checkout_fields', 'truemisha_del_fields', 25);

function truemisha_del_fields($fields)
{
    // удаляем поля
    // unset($fields['billing']['billing_postcode']); // Почтовый индекс
    unset($fields['billing']['billing_company']); // компания
    // unset($fields['billing']['billing_state']);
    // unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_last_name']);

    return $fields;
}

add_filter('woocommerce_default_address_fields', 'wc_override_address_fields');
function wc_override_address_fields($fields)
{
    $fields['address_1']['required'] = true;
    $fields['address_1']['placeholder'] = 'Адрес доставки*';
    $fields['address_1']['priority'] = 130;
    return $fields;
}
/** 
 * Убираем слвоо неоязательно
 * PHP: Remove "(optional)" from our non required fields
 */
add_filter('woocommerce_form_field', 'remove_checkout_optional_fields_label', 10, 4);
function remove_checkout_optional_fields_label($field, $key, $args, $value)
{
    // Only on checkout page
    if (is_checkout() && !is_wc_endpoint_url()) {
        $optional = '&nbsp;<span class="optional">(' . esc_html__('optional', 'woocommerce') . ')</span>';
        $field = str_replace($optional, '', $field);
    }
    return $field;
}


// function awoohc_override_checkout_fields($fields)
// {

//     // получаем выбранные методы доставки.
//     $chosen_methods = WC()->session->get('chosen_shipping_methods');
// print_r( $chosen_methods);
//     // проверяем текущий метод и убираем не ненужные поля.
//     if (false !== strpos($chosen_methods[0], 'local_pickup')) {
//         $fields['billing']['billing_new_address']['required'] = true;
//         // unset(
//         //     // $fields['billing']['billing_city'],
//         //     // $fields['billing']['billing_address_1'],
//         // );
//     }

//     return $fields;
// }

// add_filter('woocommerce_checkout_fields', 'awoohc_override_checkout_fields');

// Добавление нового поля
add_action('woocommerce_before_checkout_billing_form', 'true_custom_checkout_field');

function true_custom_checkout_field()
{
    $checkout = WC()->checkout();
    // выводим поле функцией woocommerce_form_field()

    woocommerce_form_field(
        'billing_entity',
        array(
            'type'              => 'radio', // text, textarea, select, radio, checkbox, password
            'required'          => false, // по сути только добавляет значок "*" и всё
            'class'             => array('form-row-wide'), // массив классов поля
            'default'           => 'individual',
            'label_class'       => 'custom-radio-label', // класс лейбла
            'options'           => array(
                'individual'    => 'Физическое лицо',
                'business'      => 'Юридическое лицо',
            ),

        ),
        $checkout->get_value('entity')
    );


    woocommerce_form_field(
        'billing_client_company',
        array(
            'type'          => 'text', // text, textarea, select, radio, checkbox, password
            'required'      => false, // по сути только добавляет значок "*" и всё
            'class'         => array('true-field', 'form-row-wide', 'hidden', 'form-row-half', 'mr'), // массив классов поля
            'input_class'   => array('input'), 
            'label'         => '',
            'placeholder'   => 'Название компании',
            'priority'      => '7'

        ),
        $checkout->get_value('client_company')
    );

    woocommerce_form_field(
        'billing_requisites',
        array(
            'type'          => 'number', // text, textarea, select, radio, checkbox, password
            'required'      => false, // по сути только добавляет значок "*" и всё
            'class'         => array('true-field', 'form-row-wide', 'hidden', 'form-row-half'), // массив классов поля
            'input_class'   => array('input'),
            'label'         => '',
            'placeholder'   => 'ИНН',
            'priority'      => '6',
            'custom_attributes'      => array('maxlength' => 10)
            // 'label_class'   => 'true-label', // класс лейбла

        ),
        $checkout->get_value('requisites')
    );
}

add_filter('woocommerce_checkout_fields', 'custom_woocommerce_billing_fields');
function custom_woocommerce_billing_fields($fields)
{
    $fields['billing']['billing_additional_question'] = array(
        'label'       => '', // Add custom field label
        'placeholder' => __('Откуда узнали о нашем сайте', 'woocommerce'), // Add custom field placeholder
        'required'    => true, // if field is required or not
        'clear'       => false, // add clear or not
        'type'        => 'text', // add field type
        'class'       => array('billing_additional_question'),   // add class name
        'priority'    => 130, // Priority sorting option
    );

    return $fields;
}

// добавление кастомного поля адрес
add_filter( 'woocommerce_billing_fields', 'custom_billing_fields' );

function custom_billing_fields( $fields ) {
    $fields['billing_new_address'] = array(
        'label'       => '',
        'placeholder' => _x('Адрес доставки (Область, город, улица)', 'placeholder', 'woocommerce'),
        'required'    => false,
        'class'       => array('form-row-wide'),
        'clear'       => true
    );
    return $fields;
}

// Проверка выбранного метода доставки
add_action('woocommerce_checkout_process', 'custom_check_shipping_method');

function custom_check_shipping_method() {
    // Получение выбранного метода доставки
    $chosen_shipping_methods = WC()->session->get( 'chosen_shipping_methods' );
    $chosen_shipping_method = isset($chosen_shipping_methods[0]) ? $chosen_shipping_methods[0] : '';

    // Если выбран не самовывоз (local_pickup:2), делаем поле обязательным
    if ( $chosen_shipping_method !== 'local_pickup:2' ) {
        if ( empty( $_POST['billing_new_address'] ) ) {
            wc_add_notice( __( 'Пожалуйста, заполните поле адрес' ), 'error' );
        }
    }
}

// Сохранение в информацию о заказе новых поелй
add_action('woocommerce_checkout_update_order_meta', 'true_save_field', 25);

function true_save_field($order_id)
{

    if (!empty($_POST['billing_entity'])) {
        update_post_meta($order_id, 'billing_entity', sanitize_text_field($_POST['billing_entity']));
    }

    if (!empty($_POST['billing_requisites'])) {
        update_post_meta($order_id, 'billing_requisites', sanitize_text_field($_POST['billing_requisites']));
    }
    if (!empty($_POST['billing_client_company'])) {
        update_post_meta($order_id, 'billing_client_company', sanitize_text_field($_POST['billing_client_company']));
    }
    if (!empty($_POST['billing_additional_question'])) {
        update_post_meta($order_id, 'billing_additional_question', sanitize_text_field($_POST['billing_additional_question']));
    }
}

//  Отображение в редактировании заказа в админке
add_action('woocommerce_admin_order_data_after_billing_address', 'true_print_field_value', 25);

function true_print_field_value($order)
{

    if ($method = get_post_meta($order->get_id(), 'billing_entity', true)) {
        echo '<p><strong>Тип покупателя:</strong><br>' . esc_html($method) . '</p>';
    }
    if ($method = get_post_meta($order->get_id(), 'billing_requisites', true)) {
        echo '<p><strong>ИНН:</strong><br>' . esc_html($method) . '</p>';
    }
    if ($method = get_post_meta($order->get_id(), 'billing_client_company', true)) {
        echo '<p><strong>Название компании:</strong><br>' . esc_html($method) . '</p>';
    }
    if ($method = get_post_meta($order->get_id(), 'billing_additional_question', true)) {
        echo '<p><strong>Откуда узнали о нашем сайте:</strong><br>' . esc_html($method) . '</p>';
    }
}
// Отображение в email-письмах
add_filter('woocommerce_get_order_item_totals', 'truemisha_field_in_email', 25, 2);

function truemisha_field_in_email($rows, $order)
{

    // удалите это условие, если хотите добавить значение поля и на страницу "Заказ принят"
    if (is_order_received_page()) {
        return $rows;
    }

    $rows['billing_requisites'] = array(
        'label' => 'ИНН',
        'value' => get_post_meta($order->get_id(), 'billing_requisites', true)
    );
    $rows['billing_client_company'] = array(
        'label' => 'Название компании',
        'value' => get_post_meta($order->get_id(), 'billing_client_company', true)
    );

    return $rows;
}


// Добавить поле Отчество ниже информации о плательщике
function cloudways_show_email_order_meta_customer($order, $sent_to_admin, $plain_text)
{
    $additional_question = get_post_meta($order->id, 'billing_additional_question', true);
    if ($additional_question) {
        if ($sent_to_admin) {
            echo 'Откуда узнали о нашем сайте: ' . $additional_question;
        }
    }
}
add_action('woocommerce_email_customer_details', 'cloudways_show_email_order_meta_customer', 30, 3);

// Обновляем значение радио кнопки при отправке формы
function update_customer_type_checkout_order_meta($order_id)
{
    if (!empty($_POST['customer_type'])) {
        update_post_meta($order_id, 'customer_type', sanitize_text_field($_POST['customer_type']));
    }
    if (!empty($_POST['billing_requisites'])) {
        update_post_meta($order_id, 'billing_requisites', sanitize_text_field($_POST['billing_requisites']));
    }
    if (!empty($_POST['billing_client_company'])) {
        update_post_meta($order_id, 'billing_client_company', sanitize_text_field($_POST['billing_client_company']));
    }
    if (!empty($_POST['billing_additional_question'])) {
        update_post_meta($order_id, 'billing_additional_question', sanitize_text_field($_POST['billing_additional_question']));
    }
}

add_action('woocommerce_checkout_create_order', 'update_customer_type_checkout_order_meta');

// Отображаем выбранное значение радио кнопки и поле с реквизитами на странице заказа
function display_customer_type_on_order_details($order)
{
    $customer_type = get_post_meta($order->get_id(), 'billing_entity', true);
    $billing_requisites = get_post_meta($order->get_id(), 'billing_requisites', true);
    $billing_client_company = get_post_meta($order->get_id(), 'billing_client_company', true);

    if ($customer_type) {
        echo '<p><strong>Тип покупателя:</strong> ' . esc_html($customer_type) . '</p>';
        if ($customer_type === 'business' && $billing_requisites) {
            echo '<p><strong>ИНН:</strong> ' . esc_html($billing_requisites) . '</p>';
        }
        if ($customer_type === 'business' && $billing_client_company) {
            echo '<p><strong>Название компании:</strong> ' . esc_html($billing_client_company) . '</p>';
        }
    }
}

add_action('init', function () {

    remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);
    add_action('woocommerce_checkout_after_customer_details', 'woocommerce_checkout_payment', 20);
    // add_action('woocommerce_checkout_before_order_review', 'woocommerce_order_review', 20);
});




add_filter('woocommerce_checkout_fields', 'addCustomClassToCheckoutFields');
function addCustomClassToCheckoutFields($fields)
{
    foreach ($fields as &$fieldset) {
        foreach ($fieldset as &$field) {
            // if you want to add the form-group class around the label and the input
            // $field['class'] = 'form-input'; 

            // add form-control to the actual input
            $field['input_class'][] = 'input';
        }
    }
    return $fields;
}

// Перенос купона
// remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);
// add_action('woocommerce_checkout_order_review', 'added_woocommerce_checkout_coupon_form', 5);

// function added_woocommerce_checkout_coupon_form(){
//     woocommerce_checkout_coupon_form();
// }

function my_custom_billing_address_text($translated_text, $text, $domain)
{
    if ($text === 'Billing address' && $domain === 'woocommerce') {
        $translated_text = 'Информация покупателя';
    }
    return $translated_text;
}
add_filter('gettext', 'my_custom_billing_address_text', 10, 3);

add_filter('itglx_wc1c_order_xml_contragent_data_array', function ($contragentData, $order) {
    $contragentData['ИНН'] = get_post_meta($order->get_id(), 'billing_requisites', true);
    return $contragentData;
}, 10, 2);

add_filter('itglx_wc1c_order_xml_requisites_data_array', function ($requisitesArray, $order) {
    $requisitesArray['Название компании'] = get_post_meta($order->get_id(), 'billing_client_company', true);;
    return $requisitesArray;
}, 10, 2);


// add_filter('woocommerce_checkout_fields', 'default_values_checkout_fields');
// function default_values_checkout_fields($fields)
// {
//     $fields['billing']['billing_city']['default'] = 'Владивосток';
//     $fields['shipping']['shipping_city']['default'] = 'Владивосток';
//     $fields['billing']['billing_state']['default'] = 'Приморский край';
//     $fields['shipping']['shipping_state']['default'] = 'Приморский край';
//     return $fields;
// }

add_filter( 'default_checkout_billing_country', 'truemisha_default_checkout_country' );
add_filter( 'default_checkout_billing_state', 'truemisha_default_checkout_state' );
add_filter( 'default_checkout_billing_city', 'truemisha_default_checkout_city' );
 
function truemisha_default_checkout_country( $country ) {
 
	if ( WC()->customer->get_is_paying_customer() ) {
		return $country;
	}
 
	return 'RUS';
}
 
function truemisha_default_checkout_city( $city ) {
 
	if ( WC()->customer->get_is_paying_customer() ) {
		return $city;
	}
 
	return 'Владивосток';
}

function truemisha_default_checkout_state( $city ) {
 
	if ( WC()->customer->get_is_paying_customer() ) {
		return $city;
	}
 
	return 'Приморский край';
}



/**
 * @snippet       Вспомогательная функция для вывода сообщения
 * @sourcecode    https://wpruse.ru/?p=4114
 * @testedwith    WooCommerce 3.9
 *
 * @param  string $desc Входящий параметр
 *
 * @author        Artem Abramovich
 */
function art_shipping_method_notice($desc = '')
{

    if (empty($desc)) {
        return;
    }
    ?>
    <div class="order-notice shipping_box">
        <p> <?php echo $desc; ?></p>
    </div>
<?php

}

add_action('woocommerce_after_shipping_rate', 'art_action_after_shipping_rate', 20, 2);

/**
 * @snippet       Функция вывода сообщения для выбранного метода доставки
 * @sourcecode    https://wpruse.ru/?p=4114
 * @testedwith    WooCommerce 3.9
 *
 * @param  object $method объект метода доставки
 * @param  int    $index  счетчик
 *
 * @author        Artem Abramovich
 */
function art_action_after_shipping_rate($method, $index)
{

    // Переменная для сообщения
    $notice = '';

    // Если корзина, то ничего не выводим
    if (is_cart()) {
        return;
    }

    // Получаем выбранный метод
    $chosen_methods = WC()->session->get('chosen_shipping_methods');

    if ('flat_rate:9' === $chosen_methods[0] && 'flat_rate:9' === $method->id) {
        // Сообщение для конкретного способа доставки
        $notice = 'Внимание! Расчет доставки осуществляется по километражу. Для уточнения стоимости дождитесь звонка от нашего оператора';
        // Вывод сообщения.
        art_shipping_method_notice($notice);
    }
    if ('local_pickup:2' === $chosen_methods[0] && 'local_pickup:2' === $method->id) {
        // Сообщение для конкретного способа доставки
        $notice = 'Заказа самовывозом и оплатой на кассе, резервируется на базе в течение 3х дней';
        // Вывод сообщения.
        art_shipping_method_notice($notice);
    }
}


function enqueue_custom_script() {
    if (is_checkout()) {
        // Получение данных из ACF
        $cities = get_field('cities');
        $fixed_rate = get_field('fixed_rate');

        // Регистрация и подключение скрипта
        wp_register_script('custom-woocommerce-script', get_template_directory_uri() . '/assets/js/custom-woocommerce.js?ver=0.1.0', array('jquery'), null, true);
        wp_enqueue_script('custom-woocommerce-script');

        // Локализация скрипта с данными
        wp_localize_script('custom-woocommerce-script', 'afcData', array(
            'cities' => $cities,
            'fixedRate' => $fixed_rate
        ));
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script');


function add_custom_shipping_cost($rates, $package) {
    // Получение города
    $city = WC()->customer->get_shipping_city();

    // Получение данных из ACF
    $cities = get_field('cities', 9);
    $fixed_rate = get_field('fixed_rate', 9);
    $matchedCity = null;

    // Поиск совпадения города
    foreach ($cities as $c) {
        if ($c['city'] === $city) {
            $matchedCity = $c;
            break;
        }
    }

    if ($matchedCity) {
        // Вычисление стоимости доставки
        $delivery_cost = $matchedCity['distance'] * $fixed_rate;

        // Добавление пользовательской стоимости доставки к методу с ID flat_rate:9
        $method_id = 'flat_rate:9';
        if (isset($rates[$method_id])) {
            $rates[$method_id]->cost += $delivery_cost;
        }
    }

    return $rates;
}
add_filter('woocommerce_package_rates', 'add_custom_shipping_cost', 10, 2);
