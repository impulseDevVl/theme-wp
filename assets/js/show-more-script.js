$(function () {
    $('.load-more').on('click', function () {
        let button = $(this);
        let page = button.data('page'); // Получаем текущую страницу
        let productIds = button.data('product-ids'); // Получаем текущую страницу
        let productCount = Math.round(button.data('count') / 4); // Получаем текущую страницу
        console.log(productCount)
        // let taxonomy = show_more_params.taxonomy; // Получаем таксономию
        // let term = show_more_params.term; // Получаем термин
        let nonce = show_more_params.nonce; // Получаем Nonce
        let postsPerPage = show_more_params.posts_per_page; // Получаем количество товаров на странице

        // Получаем данные AJAX-запроса
        let data = {
            action: 'load_more_products',
            page: page,
            productIds: productIds,
            nonce: nonce,
            posts_per_page: postsPerPage,
        };

        // Отправляем AJAX-запрос
        $.ajax({
            url: show_more_params.ajax_url, // Путь к файлу admin-ajax.php
            method: 'POST',
            data: data,
            beforeSend: function () {
                button.children('span').html('<img class="more-btn-preloader" src="https://baza-stroika.ru/wp-content/themes/baza-stroika/assets/images/preloader-gray.gif" />'); // Изменяем текст кнопки
                button.attr('disabled', 'disabled'); // Делаем кнопку неактивной
            },
            success: function (response) {
                if (response) {
                    page++;
                    // Добавляем полученный HTML в контейнер товаров
                    button.closest('.product-tab-item').find('.products').append(response);
                    // Если загружено меньше товаров, чем указано в posts_per_page, скрываем кнопку "Показать еще"
                    if (page > productCount) {
                        button.hide();
                    } else {
                        button.children('span').html('<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="#1F1F1F" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 9.5L14 9.5M14 9.5L9.95 5M14 9.5L9.95 14" stroke="black" stroke-opacity="0.2" stroke-linecap="round" stroke-linejoin="round"/></svg>'); // Восстанавливаем текст кнопки
                        button.removeAttr('disabled'); // Включаем кнопку
                        button.data('page', page); // Обновляем текущую страницу
                    }
                } else {
                    // Если запрос не удался, выводим сообщение об ошибке
                    console.log('Ошибка при загрузке товаров.');
                }
            },
            error: function () {
                // Если запрос не удался, выводим сообщение об ошибке
                console.log('Ошибка при загрузке товаров.');
            }
        });
    });
})
// $(document).ready(function () {
//     $('.load-more').on('click', function () {
//         let button = $(this);
//         let productIds = $(this).data('product-ids').split(",");
//         let data = {
//             action: 'load_products',
//             product_ids: productIds
//         };

//         $.ajax({
//             url: show_more_params.ajax_url,
//             method: 'POST',
//             data: data,
//             success: function (response) {
//                 button.closest('.product-tab-item').find('.products').append(response);
//                 // $('.product-container').html(response);
//             },
//             error: function (xhr, status, error) {
//                 console.log(error);
//             }
//         });
//     });
// });