<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package estore
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="yandex-verification" content="d110421a12c125db" />
	<meta name="google-site-verification" content="ObopOfpSIjKpSaqMy5s7zivQ6fyzH0NL7Zkx85qmQXU" />
	<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(98387146, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/98387146" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="wrapper">
        <header>
            <nav class="headerTopWrapper">
                <div class="container">
                    <?php
                    wp_nav_menu([
                        'menu'            => 31,
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'before'          => '<span class="headerTopLink">',
                        'after'           => '</span>',
                        'link_before'     => '<span>',
                        'link_after'      => '</span>',
                        'menu_class'      => 'headerTopInner',
                        'menu_id'         => 'headerTopInner',
                    ]); ?>
                </div>
            </nav>

            <div class="headerMiddleWrapper">
                <div class="container">
                    <div class="headerMiddleInner">
                        <div class="headerMiddleAddressIconWrapper">
                            <div class="headerMiddleLogosWrapper">
                                <div class="headerBottomLogos">
                                    <div class="headerBottomLogo">
                                        <?php the_custom_logo(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="headerMiddleMenuIcon">
                            </div>
                            <div class="headerMiddleAddressWrapper">
                                <div class="headerMiddleAddressIcon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 0C9.66645 0 7.42845 0.92701 5.77837 2.5771C4.12828 4.22719 3.20127 6.46519 3.20127 8.79876C3.20127 13.4461 11.0402 23.2767 11.3761 23.7007C11.4511 23.7941 11.546 23.8695 11.654 23.9213C11.762 23.9731 11.8803 24 12 24C12.1198 24 12.238 23.9731 12.346 23.9213C12.454 23.8695 12.549 23.7941 12.6239 23.7007C12.9599 23.2767 20.7988 13.4461 20.7988 8.79876C20.7988 6.46519 19.8718 4.22719 18.2217 2.5771C16.5716 0.92701 14.3336 0 12 0ZM12 11.1984C11.3672 11.1984 10.7486 11.0108 10.2225 10.6592C9.69629 10.3076 9.2862 9.80793 9.04403 9.22329C8.80186 8.63865 8.7385 7.99533 8.86196 7.37467C8.98541 6.75402 9.29014 6.18392 9.73761 5.73645C10.1851 5.28899 10.7552 4.98426 11.3758 4.8608C11.9965 4.73735 12.6398 4.80071 13.2244 5.04288C13.8091 5.28504 14.3088 5.69514 14.6604 6.2213C15.0119 6.74746 15.1996 7.36606 15.1996 7.99887C15.1996 8.84745 14.8625 9.66127 14.2625 10.2613C13.6624 10.8613 12.8486 11.1984 12 11.1984Z" fill="#1F1F1F" />
                                        <path d="M12 0C9.66645 0 7.42845 0.92701 5.77837 2.5771C4.12828 4.22719 3.20127 6.46519 3.20127 8.79876C3.20127 13.4461 11.0402 23.2767 11.3761 23.7007C11.4511 23.7941 11.546 23.8695 11.654 23.9213C11.762 23.9731 11.8803 24 12 24C12.1198 24 12.238 23.9731 12.346 23.9213C12.454 23.8695 12.549 23.7941 12.6239 23.7007C12.9599 23.2767 20.7988 13.4461 20.7988 8.79876C20.7988 6.46519 19.8718 4.22719 18.2217 2.5771C16.5716 0.92701 14.3336 0 12 0ZM12 11.1984C11.3672 11.1984 10.7486 11.0108 10.2225 10.6592C9.69629 10.3076 9.2862 9.80793 9.04403 9.22329C8.80186 8.63865 8.7385 7.99533 8.86196 7.37467C8.98541 6.75402 9.29014 6.18392 9.73761 5.73645C10.1851 5.28899 10.7552 4.98426 11.3758 4.8608C11.9965 4.73735 12.6398 4.80071 13.2244 5.04288C13.8091 5.28504 14.3088 5.69514 14.6604 6.2213C15.0119 6.74746 15.1996 7.36606 15.1996 7.99887C15.1996 8.84745 14.8625 9.66127 14.2625 10.2613C13.6624 10.8613 12.8486 11.1984 12 11.1984Z" fill="black" fill-opacity="0.2" />
                                    </svg>
                                </div>
                                <?php $addres_group = get_field('addres_group', 'options'); ?>
                                <div class="headerMiddleAddressInner">
                                    <a class="headerMiddleAddressItem" href="<?php echo  $addres_group['address_link']['url']; ?>">
                                        <?php $addres_group = get_field('addres_group', 'options');
                                        echo  $addres_group['address']; ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="headerMiddleSeparator"></div>
                        <?php $menu_items = get_field('menu_items', 'options'); ?>
                        <div class="headerMiddleButtonsWrapper">
                            <div class="headerMiddleButtonWrapper">
                                <?php $phones_group = get_field('phones_group', 'options'); ?>
                                <div class="headerMiddleButtonPhone">
                                    <a href="tel:<?php echo getPhoneHref($phones_group['phone_item'][0]['phone_number']); ?>">
                                        <?php echo $phones_group['phone_item'][0]['phone_number']; ?>
                                    </a>
                                </div>
                                <div class="headerMiddleButton">
                                    <a href="<?php echo $menu_items[0]['link']['url']; ?>">
                                        <span><?php echo $menu_items[0]['link']['title']; ?></span>
                                        <?php echo file_get_contents($menu_items[0]['icon']); ?>
                                    </a>
                                </div>
                            </div>
                            <div class="headerMiddleButtonWrapper">
                                <div class="headerMiddleButtonPhone">
                                    <a href="tel:<?php echo getPhoneHref($phones_group['phone_item'][1]['phone_number']); ?>">
                                        <?php echo $phones_group['phone_item'][1]['phone_number']; ?>
                                    </a>
                                </div>
                                <div class="headerMiddleButton">
                                    <a href="<?php echo $menu_items[1]['link']['url']; ?>">
                                        <span><?php echo $menu_items[1]['link']['title']; ?></span>
                                        <?php echo file_get_contents($menu_items[1]['icon']); ?>
                                    </a>
                                </div>
                            </div>
                            <div class="headerMiddleButtonWrapper">
                                <div class="headerMiddleButton">
                                    <a href="<?php echo $menu_items[2]['link']['url']; ?>">
                                        <span><?php echo $menu_items[2]['link']['title']; ?></span>
                                        <?php echo file_get_contents($menu_items[2]['icon']); ?>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="headerMiddleWorkingTimeWrapper">
                            <div class="headerMiddleWorkingTimeTitle">Время работы базы</div>
                            <div class="headerMiddleWorkingTimeItem"><?php the_field('worktime', 'options'); ?></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="headerBottomWrapper">
                <div class="container">
                    <div class="headerBottomInner">
                        <div class="headerBottomMenuIcon"></div>

                        <div class="headerBottomLogos">
                            <?php the_custom_logo(); ?>
                        </div>

                        <div class="headerBottomCatalogSearchWrapper">
                            <button class="headerBottomCatalogButton">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="6.5" cy="6" r="2" fill="#1F1F1F" />
                                    <circle cx="6.5" cy="6" r="2" fill="black" fill-opacity="0.2" />
                                    <circle cx="12.5" cy="6" r="2" fill="#1F1F1F" />
                                    <circle cx="12.5" cy="6" r="2" fill="black" fill-opacity="0.2" />
                                    <circle cx="18.5" cy="6" r="2" fill="#1F1F1F" />
                                    <circle cx="18.5" cy="6" r="2" fill="black" fill-opacity="0.2" />
                                    <circle cx="6.5" cy="18" r="2" fill="#1F1F1F" />
                                    <circle cx="6.5" cy="18" r="2" fill="black" fill-opacity="0.2" />
                                    <circle cx="6.5" cy="12" r="2" fill="#1F1F1F" />
                                    <circle cx="6.5" cy="12" r="2" fill="black" fill-opacity="0.2" />
                                    <circle cx="12.5" cy="12" r="2" fill="#1F1F1F" />
                                    <circle cx="12.5" cy="12" r="2" fill="black" fill-opacity="0.2" />
                                    <circle cx="18.5" cy="12" r="2" fill="#1F1F1F" />
                                    <circle cx="18.5" cy="12" r="2" fill="black" fill-opacity="0.2" />
                                    <circle cx="12.5" cy="18" r="2" fill="#1F1F1F" />
                                    <circle cx="12.5" cy="18" r="2" fill="black" fill-opacity="0.2" />
                                    <circle cx="18.5" cy="18" r="2" fill="#1F1F1F" />
                                    <circle cx="18.5" cy="18" r="2" fill="black" fill-opacity="0.2" />
                                </svg>
                                <span>Каталог товаров</span>
                            </button>
                            <div class="headerBottomSearchWrapper">
                                <?php echo get_search_form(); ?>
                            </div>
                        </div>

                        <div class="headerBottomProfileCartWrapper">
                            <div class="headerBottomProfileWrapper">
                                <?php if (is_user_logged_in()) {
                                    $current_user = wp_get_current_user();
                                    $username = $current_user->display_name; ?>
                                    <a href="/my-account/">
                                        <div class="headerBottomProfileIcon">
                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g id="icon">
                                                    <g id="Union">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.1854 19.0971C21.0721 17.3191 22.25 14.7971 22.25 12C22.25 6.61522 17.8848 2.25 12.5 2.25C7.11522 2.25 2.75 6.61522 2.75 12C2.75 14.7971 3.92785 17.3191 5.81463 19.0971C7.56012 20.7419 9.91234 21.75 12.5 21.75C15.0877 21.75 17.4399 20.7419 19.1854 19.0971ZM6.64512 17.8123C8.01961 16.0978 10.1316 15 12.5 15C14.8684 15 16.9804 16.0978 18.3549 17.8123C16.8603 19.3178 14.789 20.25 12.5 20.25C10.211 20.25 8.13973 19.3178 6.64512 17.8123ZM16.25 9C16.25 11.0711 14.5711 12.75 12.5 12.75C10.4289 12.75 8.75 11.0711 8.75 9C8.75 6.92893 10.4289 5.25 12.5 5.25C14.5711 5.25 16.25 6.92893 16.25 9Z" fill="#1F1F1F" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.1854 19.0971C21.0721 17.3191 22.25 14.7971 22.25 12C22.25 6.61522 17.8848 2.25 12.5 2.25C7.11522 2.25 2.75 6.61522 2.75 12C2.75 14.7971 3.92785 17.3191 5.81463 19.0971C7.56012 20.7419 9.91234 21.75 12.5 21.75C15.0877 21.75 17.4399 20.7419 19.1854 19.0971ZM6.64512 17.8123C8.01961 16.0978 10.1316 15 12.5 15C14.8684 15 16.9804 16.0978 18.3549 17.8123C16.8603 19.3178 14.789 20.25 12.5 20.25C10.211 20.25 8.13973 19.3178 6.64512 17.8123ZM16.25 9C16.25 11.0711 14.5711 12.75 12.5 12.75C10.4289 12.75 8.75 11.0711 8.75 9C8.75 6.92893 10.4289 5.25 12.5 5.25C14.5711 5.25 16.25 6.92893 16.25 9Z" fill="black" fill-opacity="0.2" />
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="headerBottomProfile">
                                            <div class="headerBottomProfileName">
                                                <?php echo $username; ?>
                                            </div>
                                            <div class="headerBottomProfileLink">
                                                Ваш профиль
                                            </div>
                                        </div>
                                    </a>
                                <?php } else { ?>
                                    <a href="/my-account/">
                                        <div class="headerBottomProfileIcon">
                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g id="icon">
                                                    <g id="Union">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.1854 19.0971C21.0721 17.3191 22.25 14.7971 22.25 12C22.25 6.61522 17.8848 2.25 12.5 2.25C7.11522 2.25 2.75 6.61522 2.75 12C2.75 14.7971 3.92785 17.3191 5.81463 19.0971C7.56012 20.7419 9.91234 21.75 12.5 21.75C15.0877 21.75 17.4399 20.7419 19.1854 19.0971ZM6.64512 17.8123C8.01961 16.0978 10.1316 15 12.5 15C14.8684 15 16.9804 16.0978 18.3549 17.8123C16.8603 19.3178 14.789 20.25 12.5 20.25C10.211 20.25 8.13973 19.3178 6.64512 17.8123ZM16.25 9C16.25 11.0711 14.5711 12.75 12.5 12.75C10.4289 12.75 8.75 11.0711 8.75 9C8.75 6.92893 10.4289 5.25 12.5 5.25C14.5711 5.25 16.25 6.92893 16.25 9Z" fill="#1F1F1F" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.1854 19.0971C21.0721 17.3191 22.25 14.7971 22.25 12C22.25 6.61522 17.8848 2.25 12.5 2.25C7.11522 2.25 2.75 6.61522 2.75 12C2.75 14.7971 3.92785 17.3191 5.81463 19.0971C7.56012 20.7419 9.91234 21.75 12.5 21.75C15.0877 21.75 17.4399 20.7419 19.1854 19.0971ZM6.64512 17.8123C8.01961 16.0978 10.1316 15 12.5 15C14.8684 15 16.9804 16.0978 18.3549 17.8123C16.8603 19.3178 14.789 20.25 12.5 20.25C10.211 20.25 8.13973 19.3178 6.64512 17.8123ZM16.25 9C16.25 11.0711 14.5711 12.75 12.5 12.75C10.4289 12.75 8.75 11.0711 8.75 9C8.75 6.92893 10.4289 5.25 12.5 5.25C14.5711 5.25 16.25 6.92893 16.25 9Z" fill="black" fill-opacity="0.2" />
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="headerBottomProfile">
                                            <div class="headerBottomProfileName">
                                                Войти
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="headerBottomCartWrapper">
                                <?php store_woocommerce_cart_link(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="burgerPopupWrapper burgerHidden">

                <!--<div class="burgerPopupCloseIconWrapper">
                    <div class="burgerPopupCloseIcon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                            <rect width="40" height="40" rx="10" fill="white" />
                            <path d="M12 28L28 12M12 12L28 28" stroke="#1F1F1F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 28L28 12M12 12L28 28" stroke="black" stroke-opacity="0.2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div> 
                </div>-->
                <div class="burgerPopupInner">
                    <div class="burgerPopupContent">
                        <div class="burgerPopupContentInner">
                            <div class="burgerPopupCatalogWrapper burgerCatalogHidden">
                                <div class="burgerPopupCatalogButton">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                        <circle cx="2" cy="2.5" r="2" fill="#1F1F1F" />
                                        <circle cx="2" cy="2.5" r="2" fill="black" fill-opacity="0.2" />
                                        <circle cx="8" cy="2.5" r="2" fill="#1F1F1F" />
                                        <circle cx="8" cy="2.5" r="2" fill="black" fill-opacity="0.2" />
                                        <circle cx="14" cy="2.5" r="2" fill="#1F1F1F" />
                                        <circle cx="14" cy="2.5" r="2" fill="black" fill-opacity="0.2" />
                                        <circle cx="2" cy="14.5" r="2" fill="#1F1F1F" />
                                        <circle cx="2" cy="14.5" r="2" fill="black" fill-opacity="0.2" />
                                        <circle cx="2" cy="8.5" r="2" fill="#1F1F1F" />
                                        <circle cx="2" cy="8.5" r="2" fill="black" fill-opacity="0.2" />
                                        <circle cx="8" cy="8.5" r="2" fill="#1F1F1F" />
                                        <circle cx="8" cy="8.5" r="2" fill="black" fill-opacity="0.2" />
                                        <circle cx="14" cy="8.5" r="2" fill="#1F1F1F" />
                                        <circle cx="14" cy="8.5" r="2" fill="black" fill-opacity="0.2" />
                                        <circle cx="8" cy="14.5" r="2" fill="#1F1F1F" />
                                        <circle cx="8" cy="14.5" r="2" fill="black" fill-opacity="0.2" />
                                        <circle cx="14" cy="14.5" r="2" fill="#1F1F1F" />
                                        <circle cx="14" cy="14.5" r="2" fill="black" fill-opacity="0.2" />
                                    </svg>
                                    <span>Каталог товаров</span>
                                </div>
                            </div>
                            <div class="burgerPopupContentYellow">
                                <a href="/my-account/">
                                    <div class="burgerPopupProfile">
                                        <div class="burgerPopupProfileIcon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.6854 19.5971C20.5721 17.8191 21.75 15.2971 21.75 12.5C21.75 7.11522 17.3848 2.75 12 2.75C6.61522 2.75 2.25 7.11522 2.25 12.5C2.25 15.2971 3.42785 17.8191 5.31463 19.5971C7.06012 21.2419 9.41234 22.25 12 22.25C14.5877 22.25 16.9399 21.2419 18.6854 19.5971ZM6.14512 18.3123C7.51961 16.5978 9.63161 15.5 12 15.5C14.3684 15.5 16.4804 16.5978 17.8549 18.3123C16.3603 19.8178 14.289 20.75 12 20.75C9.711 20.75 7.63973 19.8178 6.14512 18.3123ZM15.75 9.5C15.75 11.5711 14.0711 13.25 12 13.25C9.92893 13.25 8.25 11.5711 8.25 9.5C8.25 7.42893 9.92893 5.75 12 5.75C14.0711 5.75 15.75 7.42893 15.75 9.5Z" fill="#1F1F1F" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.6854 19.5971C20.5721 17.8191 21.75 15.2971 21.75 12.5C21.75 7.11522 17.3848 2.75 12 2.75C6.61522 2.75 2.25 7.11522 2.25 12.5C2.25 15.2971 3.42785 17.8191 5.31463 19.5971C7.06012 21.2419 9.41234 22.25 12 22.25C14.5877 22.25 16.9399 21.2419 18.6854 19.5971ZM6.14512 18.3123C7.51961 16.5978 9.63161 15.5 12 15.5C14.3684 15.5 16.4804 16.5978 17.8549 18.3123C16.3603 19.8178 14.289 20.75 12 20.75C9.711 20.75 7.63973 19.8178 6.14512 18.3123ZM15.75 9.5C15.75 11.5711 14.0711 13.25 12 13.25C9.92893 13.25 8.25 11.5711 8.25 9.5C8.25 7.42893 9.92893 5.75 12 5.75C14.0711 5.75 15.75 7.42893 15.75 9.5Z" fill="black" fill-opacity="0.2" />
                                            </svg>
                                        </div>
                                        <div class="burgerPopupProfileText">
                                            <div class="burgerPopupProfileName">
                                                <?php if (is_user_logged_in()) {
                                                    $current_user = wp_get_current_user();
                                                    $username = $current_user->display_name;
                                                    echo $username;
                                                } else { ?>
                                                    Войти
                                                <?php } ?>
                                            </div>
                                            <div class="burgerPopupProfileLink">
                                                Ваш профиль
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php $menu_items = get_field('menu_items', 'options'); ?>
                                <div class="burgerPopupButtonsWrapper">
                                    <a href="<?php echo $menu_items[2]['link']['url']; ?>">
                                        <div class="burgerPopupButton">
                                            <span><?php echo $menu_items[2]['link']['title']; ?></span>
                                            <?php echo file_get_contents($menu_items[2]['icon']); ?>
                                        </div>
                                    </a>

                                    <div class="burgerPopupPhoneWrapper">
                                        <div class="burgerPopupPhone">
                                            <a href="tel:84237592199">
                                                8 (42375) 9-21-99
                                            </a>
                                        </div>
                                    </div>
                                    <a href="<?php echo $menu_items[0]['link']['url']; ?>">
                                        <div class="burgerPopupButton">
                                            <span><?php echo $menu_items[0]['link']['title']; ?></span>
                                            <?php echo file_get_contents($menu_items[0]['icon']); ?>
                                        </div>
                                    </a>
                                    <div class="burgerPopupPhoneWrapper burgerPopupPhoneWrapper2">
                                        <div class="burgerPopupPhone">
                                            <a href="tel:+79247391685">
                                                +7 (924) 739-16-85
                                            </a>
                                        </div>
                                    </div>
                                    <a href="<?php echo $menu_items[1]['link']['url']; ?>">
                                        <div class="burgerPopupButton">
                                            <span><?php echo $menu_items[1]['link']['title']; ?></span>
                                            <?php echo file_get_contents($menu_items[1]['icon']); ?>
                                        </div>
                                    </a>
                                </div>
                                <div class="burgerPopupAddressWorkingTimeWrapper">
                                    <div class="burgerPopupAddressWrapper">
                                        <div class="burgerPopupAddressIcon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24" fill="none">
                                                <path d="M8.99993 0C6.66636 0 4.42836 0.92701 2.77827 2.5771C1.12818 4.22719 0.201172 6.46519 0.201172 8.79876C0.201172 13.4461 8.04007 23.2767 8.37602 23.7007C8.45097 23.7941 8.54595 23.8695 8.65393 23.9213C8.76192 23.9731 8.88016 24 8.99993 24C9.11971 24 9.23795 23.9731 9.34593 23.9213C9.45392 23.8695 9.5489 23.7941 9.62385 23.7007C9.9598 23.2767 17.7987 13.4461 17.7987 8.79876C17.7987 6.46519 16.8717 4.22719 15.2216 2.5771C13.5715 0.92701 11.3335 0 8.99993 0ZM8.99993 11.1984C8.36712 11.1984 7.74852 11.0108 7.22236 10.6592C6.6962 10.3076 6.2861 9.80793 6.04394 9.22329C5.80177 8.63865 5.73841 7.99533 5.86186 7.37467C5.98532 6.75402 6.29005 6.18392 6.73751 5.73645C7.18498 5.28899 7.75508 4.98426 8.37573 4.8608C8.99638 4.73735 9.63971 4.80071 10.2243 5.04288C10.809 5.28504 11.3087 5.69514 11.6603 6.2213C12.0118 6.74746 12.1995 7.36606 12.1995 7.99887C12.1995 8.84745 11.8624 9.66127 11.2624 10.2613C10.6623 10.8613 9.84851 11.1984 8.99993 11.1984Z" fill="#1F1F1F" />
                                                <path d="M8.99993 0C6.66636 0 4.42836 0.92701 2.77827 2.5771C1.12818 4.22719 0.201172 6.46519 0.201172 8.79876C0.201172 13.4461 8.04007 23.2767 8.37602 23.7007C8.45097 23.7941 8.54595 23.8695 8.65393 23.9213C8.76192 23.9731 8.88016 24 8.99993 24C9.11971 24 9.23795 23.9731 9.34593 23.9213C9.45392 23.8695 9.5489 23.7941 9.62385 23.7007C9.9598 23.2767 17.7987 13.4461 17.7987 8.79876C17.7987 6.46519 16.8717 4.22719 15.2216 2.5771C13.5715 0.92701 11.3335 0 8.99993 0ZM8.99993 11.1984C8.36712 11.1984 7.74852 11.0108 7.22236 10.6592C6.6962 10.3076 6.2861 9.80793 6.04394 9.22329C5.80177 8.63865 5.73841 7.99533 5.86186 7.37467C5.98532 6.75402 6.29005 6.18392 6.73751 5.73645C7.18498 5.28899 7.75508 4.98426 8.37573 4.8608C8.99638 4.73735 9.63971 4.80071 10.2243 5.04288C10.809 5.28504 11.3087 5.69514 11.6603 6.2213C12.0118 6.74746 12.1995 7.36606 12.1995 7.99887C12.1995 8.84745 11.8624 9.66127 11.2624 10.2613C10.6623 10.8613 9.84851 11.1984 8.99993 11.1984Z" fill="black" fill-opacity="0.2" />
                                            </svg>
                                        </div>
                                        <?php $addres_group = get_field('addres_group', 'options'); ?>
                                        <div class="burgerPopupAddressText">
                                            <div class="burgerPopupAddressItem">
                                                <?php echo $addres_group['address']; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="burgerPopupWorkingTimeWrapper">
                                        <div class="burgerPopupWorkingTimeTitle">
                                            Время работы базы
                                        </div>
                                        <div class="burgerPopupWorkingTimeItem">
                                            <?php the_field('worktime', 'options'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php wp_nav_menu([
                                'menu'            => 33,
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'burgerPopupLinksWrapper',
                                'menu_id'         => 'burgerPopupLinksWrapper',
                            ]); ?>
                        </div>
                        <?php include 'includes/components/PopupCatalogContent.php'; ?>
                    </div>
                </div>

            </div>
        </header>
        <?php include 'includes/components/catalogMenu.php'; ?>
        <div class="main">