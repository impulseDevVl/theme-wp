$(function () {

    let relatedProductsCount = $('.related-products .product').length
    let products = $('.related-products').find('.product');
    if (relatedProductsCount > 4) {
        products.slice(3).hide();
        $('.show-more-btn-wrapper').fadeIn()
        $('.show-more-btn').on('click', function () {
            $(this).fadeOut();
            products.slice(3).show();
        })
    }
    if (window.innerWidth < 751) {
        $('.burgerPopupCatalogWrapper').after($('.burgerPopupCatalogContent'))
    }
    if (window.innerWidth < 601) {
        $('.headerBottomInner').after($('.search-result'))
    }

    // headerBottomCatalogButton start
    $('.headerBottomCatalogButton').on('click', function () {
        $('.catalog-menu').fadeIn();
        $('body').addClass('overflow')
    })
    $('.catalog-menu-btn__close').on('click', function () {
        $('.catalog-menu').fadeOut();
        $('body').removeClass('overflow')
    })

    const lists = document.querySelectorAll('.catalog-menu__subitems');

    lists.forEach((ul) => {
        const liList = ul.querySelectorAll('li');
        const btnMore = ul.nextElementSibling;

        if (liList.length > 5) {
            btnMore.classList.add('active');
            btnMore.textContent = 'Показать ещё';
        } else {
            btnMore.classList.add('hidden');
        }
        liList.forEach((li, index) => {
            if (index >= 5) {
                li.classList.add('hidden');
            }
        });

        let hiddenElements = Array.from(liList).slice(5);

        btnMore.addEventListener('click', () => {
            hiddenElements.forEach((li) => {
                if (li.classList.contains('hidden')) {
                    li.classList.remove('hidden');
                    li.classList.add('visible');
                    btnMore.textContent = 'Свернуть';
                } else {
                    li.classList.remove('visible');
                    li.classList.add('hidden');
                    btnMore.textContent = 'Показать ещё';
                }
            });
        });
    });
    // headerBottomCatalogButton end
    // menu button
    $('.headerMiddleMenuIcon').on('click', function () {
        $('.burgerPopupWrapper').toggleClass('burgerShow')
        $('.burgerPopupWrapper').toggleClass('burgerHidden')
        $(this).toggleClass('open')
        $('body').toggleClass('overflow')
        $('.burgerPopupCatalogContent').fadeOut()
        $('.burgerPopupCatalogWrapper').removeClass('burgerCatalogShow')

    })
    $('.headerBottomMenuIcon').on('click', function () {
        $(this).toggleClass('open')
        $('.burgerPopupWrapper').toggleClass("burgerHidden");
        $('.burgerPopupWrapper').toggleClass("burgerShow");
        $('body').toggleClass('overflow')
    })

    $('.burgerPopupCatalogWrapper').on('click', function () {
        $(this).toggleClass('burgerCatalogShow')
        $('.burgerPopupCatalogContent').fadeToggle()
    })

    const items = document.querySelectorAll('.burgerPopupCatalogContentItem');
    const titles = document.querySelectorAll('.burgerPopupCatalogContentItemTitle');


    for (let i = 0; i < items.length; i++) {

        titles[i].addEventListener('click', () => {
            if ([...items[i].classList].includes('hiddenCatalogItem')) {
                items[i].classList.replace("hiddenCatalogItem", "showCatalogItem");
            } else if ([...items[i].classList].includes('showCatalogItem')) {
                items[i].classList.replace("showCatalogItem", "hiddenCatalogItem");
            }
        })
    }

    $('.menu-btn').on('click', function () {
        $(this).toggleClass('open')
        $('.menu').toggleClass('open')
        $('.header__inner').toggleClass('open')
    })

    // swiper

    const bannerSwiper = new Swiper('.banner-swiper', {
        slidesPerView: "auto",
        spaceBetween: 5,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        scrollbar: {
            el: '.swiper-scrollbar',
        },
        breakpoints: {
            768: {
                spaceBetween: 15,
            },
            1000: {
                spaceBetween: 20,
            },

        },
    });
    const productThumbs = new Swiper(".product-thumbs", {
        spaceBetween: 5,
        slidesPerView: 'auto',
        direction: "vertical",
        breakpoints: {
            1280: {
                direction: "horizontal",
                slidesPerView: 4,
                spaceBetween: 10,
            },
            768: {
                direction: "horizontal",
                slidesPerView: 3,
                spaceBetween: 10,
            },
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    const productImagesSwiper = new Swiper(".product-images-swiper", {
        spaceBetween: 10,
        thumbs: {
            swiper: productThumbs,
        }
    });
    const carrierPageSwiper = new Swiper('.carrierPageSwiper', {
        loop: false,
        slidesPerView: 1,
        spaceBetween: 20,

        navigation: {
            nextEl: '.carrierPageSwiperNavigationNext',
            prevEl: '.carrierPageSwiperNavigationPrev',
        },
        breakpoints: {
            1001: {
                slidesPerView: 2,
            }
        }
    });
    const blogPageSwiper = new Swiper('.blogPageSwiper', {
        loop: false,
        slidesPerView: 1,
        spaceBetween: 20,

        navigation: {
            nextEl: '.blogPageSwiperNavigationNext',
            prevEl: '.blogPageSwiperNavigationPrev',
        },
        breakpoints: {
            501: {
                slidesPerView: 2,
            },
            901: {
                slidesPerView: 3,
            },
            1301: {
                slidesPerView: 4,
            }
        }
    });



    // вывод сообщения об успешной отправки
    document.addEventListener('wpcf7mailsent', function (event) {
        Fancybox.close();
        Fancybox.show([{
            src: "#success",
            type: "inline"
        }]);
        if ($('.carrierPageFormFile').length > 0) {
            $('.carrierPageFormFile span').text('Прикрепить резюме')
            $('.carrierPageFormFile span').removeClass('active')
        }
    }, false);

    function addTabClickHandler(tabClass, tabContainer, tabItem, tab) {
        $(tabClass).on("click", function (event) {
            var id = $(this).attr("data-id");
            $(this).closest(tabContainer).find(tabItem).removeClass("active-tab").hide();
            $(this).closest(tabContainer).find(".tabs").find(tab).removeClass("active");
            $(this).addClass("active");
            $("#" + id)
                .addClass("active-tab")
                .fadeIn();
            return false;
        });
    }

    // Применяем функцию к заданному классу
    addTabClickHandler(".tabs-block .category-tab", ".tabs-block", ".category-tab-item", ".category-tab");
    addTabClickHandler(".tabs-block .blogListTab", ".tabs-block", ".category-tab-item", ".blogListTab");
    addTabClickHandler(".tabs-block .product-tab", ".tabs-block", ".product-tab-item", ".product-tab");
    addTabClickHandler(".tabs-block .catalog-menu-tab", ".tabs-block", ".catalog-menu-tab-item", ".catalog-menu-tab");


    // catalog page
    // $(document).on('click', '.wp-element-button', function(e) {
    //     let input = $(this).closest('.product').find('input.qty').val();
    // });
    $('.order-selected').on('click', function () {
        $(this).toggleClass('open');
        $(this).closest('.orderby-block').find('.orderby-dropdown').fadeToggle()
    })

    $(document).on('change', 'input.qty', function () {
        let value = $(this).val()
        $(this).closest('.product').find('.add_to_cart_button').attr('data-quantity', value);
    })

    $(window).on('scroll', function () {
        if ($(window).scrollTop() >= 142) {
            $('header').addClass('scrolled')
        } else {
            $('header').removeClass('scrolled')
        }
    });

    $('.category-item-arrow').on('click', function () {
        $(this).closest('.category-item').find('.category-item__content').slideToggle()
    })
    $(".page-numbers a").on('click', function () {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#main").offset().top
        }, 1500);
    });

    // при нажитие на кнопку 
    let currentPage = 1; // Начальная страница
    const urlParams = window.location.href.match(/\/page\/(\d+)\//);
    if (urlParams) {
        currentPage = parseInt(urlParams[1], 10); // Получаем текущую страницу из URL
    }

    const totalPages = $('.pagination').data('total-pages'); // Общее количество страниц
    const categoryIds = $('.pagination').data('category-ids'); // Получаем ID категорий
    const categoryArray = categoryIds.split(',').map(Number); // Преобразуем строку в массив

    $('#load-more-products .lmp_button').on('click', function (e) {
        e.preventDefault();
        currentPage++;

        if (currentPage > totalPages) {
            $(this).hide(); // Скрываем кнопку, если страницы закончились
            return;
        }

        let currentUrl = window.location.href.split('/page/')[0]; // Получаем текущий URL без /page/
        currentUrl = currentUrl.replace(/\/+$/, '');
        let newUrl = currentUrl + '/page/' + currentPage + '/'; // Добавляем номер страницы
        console.log(currentUrl);

        // Обновляем href кнопки
        $(this).attr('href', newUrl);
        // Загружаем товары
        load_products(currentPage, categoryArray, newUrl);
        load_pagination(currentPage, totalPages);
    });

    // При нажатии на пагинацию
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();

        let categoryIds = $('.pagination').data('category-ids');
        let totalPages = $('.pagination').data('total-pages');
        let categoryArray = categoryIds.split(',').map(Number);

        let page = $(this).attr('href').split('paged=')[1]; // Получаем номер страницы
        let currentUrl = window.location.href.split('/page/')[0]; // Убираем все, что идет после /page/

        // Убираем / в конце currentUrl, если он есть
        currentUrl = currentUrl.replace(/\/+$/, '');

        if (page === undefined) {
            page = 1;
        }

        var newUrl = currentUrl + '/page/' + page + '/'; // Добавляем номер страницы
        $('#load-more-products .lmp_button').attr('href', newUrl)
        load_products(page, categoryArray, newUrl);
        load_pagination(page, totalPages);
    });


    function load_products(page, categoryArray, newUrl) {
        $.ajax({
            url: ajaxurl, // WordPress AJAX URL
            type: 'POST',

            data: {
                action: 'load_products',
                page: page,
                category_ids: categoryArray
            },
            success: function (response) {
                $('.products').html(response);
                $('.pagination .page-numbers').removeClass('current');
                setTimeout(function() {
                    $('.pagination a[href*="paged=' + currentPage + '"]').addClass('current');
                }, 100); 

                // Прокручиваем страницу к началу списка товаров
                $('html, body').animate({
                    scrollTop: $(".catalog-page").offset().top
                }, 500);
                history.pushState(null, null, newUrl);
            }
        });
    }

    function load_pagination(page, totalPages) {
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'load_pagination',
                page: page,
                total_pages: totalPages
            },
            success: function (response) {
                $('.pagination').html(response);
            }
        });
    }

})