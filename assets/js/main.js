$(function () { 
    // menu button
    $('.menu-btn').on('click', function () {
        $(this).toggleClass('open')
        $('.menu').toggleClass('open')
        $('.header__inner').toggleClass('open')
    })

})