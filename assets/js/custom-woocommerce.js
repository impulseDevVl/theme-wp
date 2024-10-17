$(function () {
    setTimeout(() => {
        $('#shipping_method_0_wc_russian_post_courier6').trigger('click')
      }, 3000);  

    // suggestions start
    $("#billing_client_company").suggestions({
        serviceUrl: "https://suggestions.dadata.ru/suggestions/api/4_1/rs",
        token: 'c8af4922f7c007fd5f0cb04ff44fe74dfca3539f',
        type: "PARTY",
        count: 5,
        onSelect: function (suggestion) {
            console.log(suggestion.data.inn);
            $('#billing_company').val(suggestion.unrestricted_value);
            // $('#billing_address').val(suggestion.data.address.value);
            $('#billing_requisites').val(suggestion.data.inn);
        }
    });
    $("#billing_city").suggestions({
        serviceUrl: "https://suggestions.dadata.ru/suggestions/api/4_1/rs",
        token: 'c8af4922f7c007fd5f0cb04ff44fe74dfca3539f',
        type: "ADDRESS",
        count: 5,
        // onSelect: function (suggestion) {
        //     if (suggestion.data.city && suggestion.data.settlement) {
        //         $("#billing_city").val(suggestion.data.settlement);
        //     } else if (suggestion.data.city) {
        //         $("#billing_city").val(suggestion.data.city);
        //     } else {
        //         $("#billing_city").val(suggestion.data.settlement);
        //     }
        //     $("#billing_state").val(suggestion.data.region_with_type);
        //     $("#billing_postcode").val(suggestion.data.postal_code);
        // },
        // constraints: {
        //     locations: {
        //         region: "Приморский"
        //     },
        // },
        restrict_value: true
    });
    $("#billing_new_address").suggestions({
        serviceUrl: "https://suggestions.dadata.ru/suggestions/api/4_1/rs",
        token: 'c8af4922f7c007fd5f0cb04ff44fe74dfca3539f',
        type: "ADDRESS",
        count: 5,
        // constraints: {
        //     locations: {
        //         region: "Приморский"
        //     },
        //     restrict_value: true
        // },
        onSelect: function (suggestion) {
            $('#billing_new_address').val(suggestion.value);
            $('#billing_address_1').val(suggestion.value);
            if (suggestion.data.city && suggestion.data.settlement) {
                $("#billing_city").val(suggestion.data.settlement);
            } else if (suggestion.data.city) {
                $("#billing_city").val(suggestion.data.city);
            } else {
                $("#billing_city").val(suggestion.data.settlement);
            }
            if (suggestion.data.area === 'Чугуевский' && suggestion.data.settlement === 'Каменка') {
                $("#billing_city").val(suggestion.data.settlement + ' (' + suggestion.data.area + ')');
            }
            // $("#billing_state").val(suggestion.data.region);
            $("#billing_postcode").val(suggestion.data.postal_code);
            $("#billing_state").val(suggestion.data.region_with_type);
            if (suggestion.data.settlement === 'Зеркальное') {
                $("#billing_new_address_field").after(`
                    <p id="billing_city_zeerkalnoe" class="">
                        <input type="checkbox" id="billing_city_zeerkalnoe_checkbox" value="Зеркальное (бухта)">
                        <label for="billing_city_zeerkalnoe_checkbox">Зеркальное (бухта)</label>
                    </p>
                `);
                $('#billing_city_zeerkalnoe_checkbox').on('change', function () {
                    $(document.body).trigger('update_checkout');
                    if ($(this).is(':checked')) {
                        $("#billing_city").val('Зеркальное (бухта)');
                    } else {
                        $("#billing_city").val('Зеркальное');
                    }
                });
            } else {
                $('#billing_city_zeerkalnoe').remove()
            }
        }
    });

    // suggestions end 

    // выводо стоимости доставки в зависимости от списка городов
    function updateCustomDelivery() {
        let city = $('#billing_city').val();
        let matchedCity = afcData.cities.find(c => c.city === city);
        if (matchedCity) {
            $('#shipping_method_0_flat_rate9').parent().show();
        } else {
            $('#shipping_method_0_flat_rate9').parent().remove();
        }
    }
    updateCustomDelivery();

    // Отслеживание изменения значения в поле billing_city
    $('#billing_city, #billing_new_address').on('blur', function () {
        updateCustomDelivery()
        $(document.body).trigger('update_checkout');
    });

    // Отображение полей и способов доставки
    $('#billing_client_company_field, #billing_requisites_field').hide();
    let selectedEntity = $('input[name="billing_entity"]:checked').val();
    toggleBillingFields(selectedEntity);

    $(document.body).on('updated_checkout', function () {
        let method = woocommerce_params.chosen_shipping_method;
        $('select.shipping_method, input[name^=shipping_method][type=radio]:checked, input[name^=shipping_method][type=hidden]').each(function (index, input) {
            method = $(this).val();
        });
        updateCustomDelivery();
        toggleBillingFields(selectedEntity);
        // toggleShippingMethod();

        switch (true) { //начинаем перебор вариантов и проверяем их
            case (method.indexOf('local_pickup') >= 0): //если наш метод Самовывоз будем выполнять этот участок кода
                $('.payment_method_cod').show()
                // $('#billing_address_1_field, #billing_state_name_field,#billing_state_field, #billing_address_2_field, #billing_postcode_field, #billing_city_field').hide(); //Прячем адрес
                // if ($('#billing_address_1').val() === '') { //если клиент не авторизован или у него нет адреса, нам что-то надо передать,т.к. поле адрес обязательное
               $('#billing_address_1').attr('value', 'Самовывоз'); //передадим туда строку "самовывоз"
               $('#billing_city').attr('value', 'Владивосток');
               $('#billing_state').attr('value', 'Приморский край');
                // $('#billing_new_address_field').hide()
                $('#billing_new_address_field').removeClass('validate-required')

                // }
                break;
            case (method.indexOf('wc_russian_post_postal:7') >= 0 || method.indexOf('official_cdek_136') >= 0 || method.indexOf('official_cdek_137') >= 0): // если наш метод доставки Почта России
                toggleBillingFields(selectedEntity);
                // $('#billing_new_address_field').show()
                $('.payment_method_cod').hide()
                // $('#billing_address_1_field, #billing_state_name_field,#billing_state_field, #billing_address_2_field, #billing_postcode_field, #billing_city_field').hide();
                break;
            case (method.indexOf('flat_rate:9') >= 0): // если наш метод доставки Почта России
                toggleBillingFields(selectedEntity);
                $('.payment_method_cod').hide()
                // $('#billing_new_address_field').show()
                break;
            default:
                toggleBillingFields(selectedEntity);
                $('.payment_method_cod').show()
                // $('#billing_address_1_field, #billing_address_2_field,#billing_state_field, #billing_state_name_field, #billing_city_field, #billing_city_field').show(); //Показываем всё кроме индекса    
                $('#billing_address_1').attr('value', '');
                $('#billing_city').attr('value', 'Владивосток');
                $('#billing_state').attr('value', 'Приморский край');
                // $('#billing_new_address_field').show()
                $('#billing_new_address_field').addClass('validate-required')
        }
    });

    // Обработчик изменения значения input с id billing_state
    // $('#billing_city').on('change', function () {
    //     toggleShippingMethod();
    // });

    // function toggleShippingMethod() {
    //     let billingState = $('#billing_state').val();
    //     if (billingState === 'Приморский край') {
    //         $('#shipping_method_0_flat_rate9').parent().show();
    //     } else {
    //         $('#shipping_method_0_flat_rate9').parent().hide();
    //     }
    // }

    // // Обработчик изменения значения радио кнопок
    $('input[name="billing_entity"]').on('change', function () {
        selectedEntity = $(this).val();
        toggleBillingFields(selectedEntity);
    });

    // Функция для скрытия или отображения полей в зависимости от выбранного значения
    function toggleBillingFields(selectedEntity) {
        // console.log(selectedEntity);

        if (selectedEntity === 'individual') {
            $('#billing_client_company_field, #billing_requisites_field').hide();
            $('#billing_city_field').addClass('half');
            $('#payment .payment_method_bacs').hide();
        } else if (selectedEntity === 'business') {
            $('#billing_city_field').removeClass('half');
            $('#payment .payment_method_bacs').show();
            $('#billing_client_company_field, #billing_requisites_field').show();
        }
    }


});