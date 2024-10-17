</main> <!-- main end -->
<footer>
    <div class="container">
        <div class="footerTopWrapper">
            <div class="footerTopInner">
                <div class="footerTopLogosWrapper">
                    <div class="footerTopLogos">
                        <?php the_custom_logo(); ?>
                    </div>
                    <a href="<?php echo get_home_url(); ?>">
                        <div class="footerTopLogosText">
                            Интернет-магазин строительных <br /> и хозяйственных материалов
                        </div>
                    </a>
                </div>
                <nav class="footerTopLinksWrapper">
                    <div class="footerTopLinksInner">
                        <div class="footerTopLinksTitle">
                            Меню
                        </div>
                        <?php
                        wp_nav_menu([
                            'menu'            => 32,
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'footerTopLinks',
                            'menu_id'         => 'footerTopLinks',
                        ]); ?>

                    </div>
                    <div class="footerTopLinksInner">
                        <div class="footerTopLinksTitle">
                            Каталог
                        </div>
                        <?php
                        wp_nav_menu([
                            'menu'            => 34,
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'footerTopLinks',
                            'menu_id'         => 'footerTopLinksCatalog',
                        ]); ?>

                    </div>
                </nav>
                <div class="footerTopContactsWrapper">
                    <div class="footerTopContactsTitle">
                        Контакты
                    </div>
                    <div class="footerTopContactsAddressWrapper">
                        <div class="footerTopContactsAddress">
                            <div class="footerTopContactsAddressIcon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="25" viewBox="0 0 18 25" fill="none">
                                    <path d="M9.00006 0.5C6.66648 0.5 4.42848 1.42701 2.77839 3.0771C1.1283 4.72719 0.201294 6.96519 0.201294 9.29876C0.201294 13.9461 8.04019 23.7767 8.37614 24.2007C8.45109 24.2941 8.54607 24.3695 8.65405 24.4213C8.76204 24.4731 8.88028 24.5 9.00006 24.5C9.11983 24.5 9.23807 24.4731 9.34606 24.4213C9.45404 24.3695 9.54902 24.2941 9.62397 24.2007C9.95992 23.7767 17.7988 13.9461 17.7988 9.29876C17.7988 6.96519 16.8718 4.72719 15.2217 3.0771C13.5716 1.42701 11.3336 0.5 9.00006 0.5ZM9.00006 11.6984C8.36724 11.6984 7.74865 11.5108 7.22248 11.1592C6.69632 10.8076 6.28622 10.3079 6.04406 9.72329C5.80189 9.13865 5.73853 8.49533 5.86198 7.87467C5.98544 7.25402 6.29017 6.68392 6.73763 6.23645C7.1851 5.78899 7.7552 5.48426 8.37586 5.3608C8.99651 5.23735 9.63983 5.30071 10.2245 5.54288C10.8091 5.78504 11.3088 6.19514 11.6604 6.7213C12.012 7.24746 12.1996 7.86606 12.1996 8.49887C12.1996 9.34745 11.8625 10.1613 11.2625 10.7613C10.6624 11.3613 9.84863 11.6984 9.00006 11.6984Z" fill="#1F1F1F" />
                                    <path d="M9.00006 0.5C6.66648 0.5 4.42848 1.42701 2.77839 3.0771C1.1283 4.72719 0.201294 6.96519 0.201294 9.29876C0.201294 13.9461 8.04019 23.7767 8.37614 24.2007C8.45109 24.2941 8.54607 24.3695 8.65405 24.4213C8.76204 24.4731 8.88028 24.5 9.00006 24.5C9.11983 24.5 9.23807 24.4731 9.34606 24.4213C9.45404 24.3695 9.54902 24.2941 9.62397 24.2007C9.95992 23.7767 17.7988 13.9461 17.7988 9.29876C17.7988 6.96519 16.8718 4.72719 15.2217 3.0771C13.5716 1.42701 11.3336 0.5 9.00006 0.5ZM9.00006 11.6984C8.36724 11.6984 7.74865 11.5108 7.22248 11.1592C6.69632 10.8076 6.28622 10.3079 6.04406 9.72329C5.80189 9.13865 5.73853 8.49533 5.86198 7.87467C5.98544 7.25402 6.29017 6.68392 6.73763 6.23645C7.1851 5.78899 7.7552 5.48426 8.37586 5.3608C8.99651 5.23735 9.63983 5.30071 10.2245 5.54288C10.8091 5.78504 11.3088 6.19514 11.6604 6.7213C12.012 7.24746 12.1996 7.86606 12.1996 8.49887C12.1996 9.34745 11.8625 10.1613 11.2625 10.7613C10.6624 11.3613 9.84863 11.6984 9.00006 11.6984Z" fill="black" fill-opacity="0.2" />
                                </svg>
                            </div>
                            <?php $addres_group = get_field('addres_group', 'options'); ?>
                            <div class="footerTopContactsAddressText">
                                <div class="footerTopContactsAddressTextItem">
                                    <?php echo $addres_group['address']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footerTopContactsShowMap">
                        <a href="<?php echo $addres_group['address_link']['url']; ?>">Посмотреть на карте</a>
                    </div>
                    <div class="footerTopContactsTimeWorking">
                        <div class="footerTopContactsTimeWorkingIcon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="23" viewBox="0 0 22 23" fill="none">
                                <path d="M11 0.5C8.82441 0.5 6.69767 1.14514 4.88873 2.35383C3.07979 3.56253 1.66989 5.2805 0.83733 7.29048C0.00476617 9.30047 -0.213071 11.5122 0.211367 13.646C0.635804 15.7798 1.68345 17.7398 3.22183 19.2782C4.76021 20.8166 6.72022 21.8642 8.85401 22.2886C10.9878 22.7131 13.1995 22.4952 15.2095 21.6627C17.2195 20.8301 18.9375 19.4202 20.1462 17.6113C21.3549 15.8023 22 13.6756 22 11.5C21.9966 8.58368 20.8365 5.78778 18.7744 3.72563C16.7122 1.66347 13.9163 0.50344 11 0.5ZM14.707 15.207C14.5195 15.3945 14.2652 15.4998 14 15.4998C13.7348 15.4998 13.4805 15.3945 13.293 15.207L10.293 12.207C10.1055 12.0195 10.0001 11.7652 10 11.5V5.5C10 5.23478 10.1054 4.98043 10.2929 4.79289C10.4804 4.60536 10.7348 4.5 11 4.5C11.2652 4.5 11.5196 4.60536 11.7071 4.79289C11.8946 4.98043 12 5.23478 12 5.5V11.086L14.707 13.793C14.8945 13.9805 14.9998 14.2348 14.9998 14.5C14.9998 14.7652 14.8945 15.0195 14.707 15.207Z" fill="#1F1F1F" />
                                <path d="M11 0.5C8.82441 0.5 6.69767 1.14514 4.88873 2.35383C3.07979 3.56253 1.66989 5.2805 0.83733 7.29048C0.00476617 9.30047 -0.213071 11.5122 0.211367 13.646C0.635804 15.7798 1.68345 17.7398 3.22183 19.2782C4.76021 20.8166 6.72022 21.8642 8.85401 22.2886C10.9878 22.7131 13.1995 22.4952 15.2095 21.6627C17.2195 20.8301 18.9375 19.4202 20.1462 17.6113C21.3549 15.8023 22 13.6756 22 11.5C21.9966 8.58368 20.8365 5.78778 18.7744 3.72563C16.7122 1.66347 13.9163 0.50344 11 0.5ZM14.707 15.207C14.5195 15.3945 14.2652 15.4998 14 15.4998C13.7348 15.4998 13.4805 15.3945 13.293 15.207L10.293 12.207C10.1055 12.0195 10.0001 11.7652 10 11.5V5.5C10 5.23478 10.1054 4.98043 10.2929 4.79289C10.4804 4.60536 10.7348 4.5 11 4.5C11.2652 4.5 11.5196 4.60536 11.7071 4.79289C11.8946 4.98043 12 5.23478 12 5.5V11.086L14.707 13.793C14.8945 13.9805 14.9998 14.2348 14.9998 14.5C14.9998 14.7652 14.8945 15.0195 14.707 15.207Z" fill="black" fill-opacity="0.2" />
                            </svg>
                        </div>
                        <div class="footerTopContactsTimeWorkingText">
                            <div class="footerTopContactsTimeWorkingTextItem">
                                <?php the_field('worktime', 'options'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="footerTopContactsPhonesWrapper">
                        <div class="footerTopContactsPhonesIcon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.9847 16.5859L19.3069 14.3972C18.9105 14.1609 18.4466 14.0635 17.9886 14.1205C17.5307 14.1775 17.1048 14.3856 16.7784 14.7118C16.335 15.1548 15.9815 15.4918 15.7284 15.7145C15.6719 15.7672 15.6047 15.8071 15.5314 15.8314C15.4581 15.8558 15.3804 15.864 15.3037 15.8555C13.9288 15.7477 12.2123 14.7877 10.7127 13.2882C9.2132 11.7887 8.2532 10.0721 8.14492 8.69683C8.13651 8.62005 8.14476 8.54237 8.16911 8.46907C8.19346 8.39577 8.23334 8.32858 8.28602 8.2721C8.5082 8.01939 8.84523 7.666 9.28867 7.2221C9.6149 6.89579 9.82297 6.47 9.87994 6.01211C9.93691 5.55423 9.83953 5.09043 9.6032 4.69413L7.41414 1.01585C7.15309 0.575901 6.73855 0.248051 6.25029 0.0953972C5.76203 -0.0572567 5.23457 -0.0239262 4.76941 0.188974L1.21487 1.81085C0.811699 1.99322 0.477703 2.30018 0.26203 2.68656C0.0463575 3.07295 -0.039603 3.51836 0.0167968 3.95725C0.615859 8.73804 3.02102 13.4453 6.78789 17.2126C10.5548 20.9799 15.2624 23.3846 20.0432 23.9837C20.482 24.0393 20.927 23.953 21.3132 23.7375C21.6994 23.522 22.0065 23.1886 22.1896 22.786L23.8114 19.2315C24.0243 18.7662 24.0576 18.2386 23.905 17.7502C23.7523 17.2619 23.4245 16.8472 22.9846 16.5859H22.9847ZM13.2834 6.90986C13.2834 6.79943 13.3078 6.69035 13.3549 6.59045C13.402 6.49055 13.4705 6.40229 13.5557 6.33199L16.8033 3.64783C16.9568 3.5231 17.1534 3.46407 17.3502 3.48358C17.547 3.5031 17.7282 3.59959 17.8542 3.75204C17.9803 3.90449 18.041 4.10056 18.0231 4.29756C18.0053 4.49456 17.9104 4.67653 17.759 4.80386L15.2109 6.90986L17.759 9.01596C17.8357 9.07849 17.8991 9.15555 17.9459 9.24272C17.9926 9.32988 18.0216 9.42543 18.0313 9.52385C18.0409 9.62228 18.031 9.72164 18.0021 9.81622C17.9732 9.9108 17.9259 9.99872 17.8628 10.0749C17.7998 10.1512 17.7223 10.2142 17.6349 10.2603C17.5474 10.3065 17.4517 10.3349 17.3532 10.3439C17.2547 10.3529 17.1554 10.3424 17.061 10.3128C16.9666 10.2833 16.879 10.2354 16.8032 10.1719L13.5558 7.48783C13.4706 7.41753 13.402 7.32927 13.3549 7.22935C13.3078 7.12943 13.2834 7.02033 13.2834 6.90986ZM18.3497 6.90986C18.3497 6.79943 18.3741 6.69036 18.4211 6.59046C18.4682 6.49056 18.5368 6.4023 18.622 6.33199L21.8695 3.64783C21.9451 3.58267 22.0329 3.53326 22.1278 3.50248C22.2228 3.47171 22.3229 3.46019 22.4223 3.4686C22.5218 3.47701 22.6186 3.50519 22.707 3.55148C22.7954 3.59777 22.8737 3.66124 22.9373 3.73817C23.0008 3.8151 23.0484 3.90395 23.0772 3.99951C23.106 4.09506 23.1154 4.19541 23.105 4.29466C23.0945 4.39391 23.0643 4.49007 23.0162 4.57751C22.9681 4.66494 22.903 4.7419 22.8248 4.80386L20.2766 6.90986L22.8253 9.01596C22.9014 9.07868 22.9643 9.15577 23.0105 9.24283C23.0567 9.32989 23.0853 9.4252 23.0947 9.52332C23.104 9.62144 23.094 9.72045 23.065 9.81467C23.0361 9.90889 22.9889 9.99649 22.9261 10.0724C22.8633 10.1484 22.7861 10.2112 22.699 10.2574C22.6119 10.3035 22.5165 10.332 22.4184 10.3412C22.3203 10.3504 22.2213 10.3403 22.1271 10.3112C22.0329 10.2822 21.9453 10.2348 21.8695 10.1719L18.622 7.48783C18.5368 7.41751 18.4682 7.32923 18.4211 7.22931C18.3741 7.1294 18.3497 7.02031 18.3497 6.90986Z" fill="#1F1F1F" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.9847 16.5859L19.3069 14.3972C18.9105 14.1609 18.4466 14.0635 17.9886 14.1205C17.5307 14.1775 17.1048 14.3856 16.7784 14.7118C16.335 15.1548 15.9815 15.4918 15.7284 15.7145C15.6719 15.7672 15.6047 15.8071 15.5314 15.8314C15.4581 15.8558 15.3804 15.864 15.3037 15.8555C13.9288 15.7477 12.2123 14.7877 10.7127 13.2882C9.2132 11.7887 8.2532 10.0721 8.14492 8.69683C8.13651 8.62005 8.14476 8.54237 8.16911 8.46907C8.19346 8.39577 8.23334 8.32858 8.28602 8.2721C8.5082 8.01939 8.84523 7.666 9.28867 7.2221C9.6149 6.89579 9.82297 6.47 9.87994 6.01211C9.93691 5.55423 9.83953 5.09043 9.6032 4.69413L7.41414 1.01585C7.15309 0.575901 6.73855 0.248051 6.25029 0.0953972C5.76203 -0.0572567 5.23457 -0.0239262 4.76941 0.188974L1.21487 1.81085C0.811699 1.99322 0.477703 2.30018 0.26203 2.68656C0.0463575 3.07295 -0.039603 3.51836 0.0167968 3.95725C0.615859 8.73804 3.02102 13.4453 6.78789 17.2126C10.5548 20.9799 15.2624 23.3846 20.0432 23.9837C20.482 24.0393 20.927 23.953 21.3132 23.7375C21.6994 23.522 22.0065 23.1886 22.1896 22.786L23.8114 19.2315C24.0243 18.7662 24.0576 18.2386 23.905 17.7502C23.7523 17.2619 23.4245 16.8472 22.9846 16.5859H22.9847ZM13.2834 6.90986C13.2834 6.79943 13.3078 6.69035 13.3549 6.59045C13.402 6.49055 13.4705 6.40229 13.5557 6.33199L16.8033 3.64783C16.9568 3.5231 17.1534 3.46407 17.3502 3.48358C17.547 3.5031 17.7282 3.59959 17.8542 3.75204C17.9803 3.90449 18.041 4.10056 18.0231 4.29756C18.0053 4.49456 17.9104 4.67653 17.759 4.80386L15.2109 6.90986L17.759 9.01596C17.8357 9.07849 17.8991 9.15555 17.9459 9.24272C17.9926 9.32988 18.0216 9.42543 18.0313 9.52385C18.0409 9.62228 18.031 9.72164 18.0021 9.81622C17.9732 9.9108 17.9259 9.99872 17.8628 10.0749C17.7998 10.1512 17.7223 10.2142 17.6349 10.2603C17.5474 10.3065 17.4517 10.3349 17.3532 10.3439C17.2547 10.3529 17.1554 10.3424 17.061 10.3128C16.9666 10.2833 16.879 10.2354 16.8032 10.1719L13.5558 7.48783C13.4706 7.41753 13.402 7.32927 13.3549 7.22935C13.3078 7.12943 13.2834 7.02033 13.2834 6.90986ZM18.3497 6.90986C18.3497 6.79943 18.3741 6.69036 18.4211 6.59046C18.4682 6.49056 18.5368 6.4023 18.622 6.33199L21.8695 3.64783C21.9451 3.58267 22.0329 3.53326 22.1278 3.50248C22.2228 3.47171 22.3229 3.46019 22.4223 3.4686C22.5218 3.47701 22.6186 3.50519 22.707 3.55148C22.7954 3.59777 22.8737 3.66124 22.9373 3.73817C23.0008 3.8151 23.0484 3.90395 23.0772 3.99951C23.106 4.09506 23.1154 4.19541 23.105 4.29466C23.0945 4.39391 23.0643 4.49007 23.0162 4.57751C22.9681 4.66494 22.903 4.7419 22.8248 4.80386L20.2766 6.90986L22.8253 9.01596C22.9014 9.07868 22.9643 9.15577 23.0105 9.24283C23.0567 9.32989 23.0853 9.4252 23.0947 9.52332C23.104 9.62144 23.094 9.72045 23.065 9.81467C23.0361 9.90889 22.9889 9.99649 22.9261 10.0724C22.8633 10.1484 22.7861 10.2112 22.699 10.2574C22.6119 10.3035 22.5165 10.332 22.4184 10.3412C22.3203 10.3504 22.2213 10.3403 22.1271 10.3112C22.0329 10.2822 21.9453 10.2348 21.8695 10.1719L18.622 7.48783C18.5368 7.41751 18.4682 7.32923 18.4211 7.22931C18.3741 7.1294 18.3497 7.02031 18.3497 6.90986Z" fill="black" fill-opacity="0.2" />
                            </svg>
                        </div>
                        <?php $phones_group =  get_field('phones_group', 'options'); ?>
                        <div class="footerTopContactsPhonesItems">
                            <?php foreach ($phones_group['phone_item'] as $key => $item) { ?>
                                <div class="footerTopContactsPhonesItem">
                                    <div class="footerTopContactsPhonesItemTitle">
                                        <?php echo $item['title']; ?>
                                    </div>
                                    <div class="footerTopContactsPhonesItemPhone">
                                        <a href="tel:<?php echo getPhoneHref($item['phone_number']); ?>"><?php echo $item['phone_number']; ?></a>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="FooterMiddleWrapper">
            <div class="footerMiddleInner">
                <?php $categories = get_categories([
                    'taxonomy'     => 'product_cat',
                    'type'         => 'product',
                    'child_of'     => 0,
                    'parent'       => '',
                    'orderby'      => 'id',
                    'order'        => 'ASC',
                    'number'       => 14,
                    'hide_empty'   => 1,
                    'hierarchical' => 1,
                    'exclude'      => '',
                ]);
                if ($categories) {
                    foreach ($categories as $cat) { ?>
                        <div class="footerMiddleLink">
                            <a href="<?php echo get_category_link($cat->term_id); ?>">
                                <?php echo $cat->name; ?>
                            </a>
                        </div>
                <?php }
                } ?>

            </div>
        </div>
        <div class="footerBottomWrapper">
            <div class="footerBottomInner">
                <div class="footerBottomLinks">
                    <div class="footerBottomLink">
                        <a href="/privacy-policy/">
                            Политика конфиденциальности
                        </a>
                    </div>
                    <div class="footerBottomLink">
                        <a href="/yuridicheskaya-informacziya/">
                            Юридическая информация
                        </a>
                    </div>
                    <div class="footerBottomLink">
                        <a href="https://baza-stroika.ru/wp-content/uploads/2024/03/tekst_politiki_bezopasnosti_platezhej.pdf" target="_blank">
                            Политики безопасности платежей
                        </a>
                    </div>
                </div>
                <div class="footerBottomProdWrapper">
                    <a href="https://impulse-marketing.ru/" target="_blank">
                        <div class="footerBottomProdInner">
                            <div class="footerBottomProdTitle">
                                Разработка сайта
                            </div>
                            <div class="footerBottomProdLogo">
                                <svg xmlns="http://www.w3.org/2000/svg" width="127" height="26" viewBox="0 0 127 26" fill="none">
                                    <path d="M0 5.23535H2.94227V25.8168H0V5.23535Z" fill="#1F1F1F" />
                                    <path d="M0 5.23535H2.94227V25.8168H0V5.23535Z" fill="black" fill-opacity="0.2" />
                                    <path d="M49.5609 7.07258C50.2955 7.6958 50.8767 8.47967 51.2593 9.36345C51.642 10.2472 51.8159 11.2072 51.7676 12.169C51.814 13.1269 51.639 14.0826 51.2564 14.9622C50.8737 15.8417 50.2936 16.6214 49.5609 17.2408C47.8133 18.5551 45.6554 19.2064 43.472 19.0784H37.5956V25.8164H36.0918V5.23495H43.4475C45.6392 5.10111 47.8068 5.75268 49.5609 7.07258ZM48.5066 16.2852C49.0875 15.7814 49.5456 15.1515 49.8458 14.4438C50.1461 13.7361 50.2807 12.9692 50.2392 12.2016C50.2839 11.4277 50.1511 10.6537 49.8508 9.93891C49.5505 9.2241 49.0907 8.58731 48.5066 8.07716C47.0534 7.01182 45.2702 6.49401 43.472 6.61522H37.5956V17.7308H43.4802C45.2732 17.8506 47.0516 17.3391 48.5066 16.2852Z" fill="#1F1F1F" />
                                    <path d="M49.5609 7.07258C50.2955 7.6958 50.8767 8.47967 51.2593 9.36345C51.642 10.2472 51.8159 11.2072 51.7676 12.169C51.814 13.1269 51.639 14.0826 51.2564 14.9622C50.8737 15.8417 50.2936 16.6214 49.5609 17.2408C47.8133 18.5551 45.6554 19.2064 43.472 19.0784H37.5956V25.8164H36.0918V5.23495H43.4475C45.6392 5.10111 47.8068 5.75268 49.5609 7.07258ZM48.5066 16.2852C49.0875 15.7814 49.5456 15.1515 49.8458 14.4438C50.1461 13.7361 50.2807 12.9692 50.2392 12.2016C50.2839 11.4277 50.1511 10.6537 49.8508 9.93891C49.5505 9.2241 49.0907 8.58731 48.5066 8.07716C47.0534 7.01182 45.2702 6.49401 43.472 6.61522H37.5956V17.7308H43.4802C45.2732 17.8506 47.0516 17.3391 48.5066 16.2852Z" fill="black" fill-opacity="0.2" />
                                    <path d="M57.9383 23.6852C56.4999 22.1742 55.7725 19.9691 55.7725 17.0697V5.23535H57.2763V17.0207C57.2763 19.5525 57.8538 21.4582 59.009 22.7378C59.6663 23.3909 60.4552 23.8969 61.3232 24.2222C62.1912 24.5475 63.1185 24.6846 64.0435 24.6244C64.9637 24.6846 65.8861 24.5474 66.7488 24.222C67.6115 23.8966 68.3945 23.3905 69.0454 22.7378C70.206 21.4882 70.7781 19.5934 70.7781 17.0615V5.23535H72.2819V17.086C72.2819 19.9827 71.5572 22.1878 70.1079 23.7015C69.3038 24.48 68.3466 25.0831 67.2971 25.4725C66.2475 25.8619 65.1285 26.0293 64.0108 25.9638C62.8956 26.0277 61.7794 25.858 60.7337 25.4656C59.6879 25.0732 58.7358 24.4667 57.9383 23.6852Z" fill="#1F1F1F" />
                                    <path d="M57.9383 23.6852C56.4999 22.1742 55.7725 19.9691 55.7725 17.0697V5.23535H57.2763V17.0207C57.2763 19.5525 57.8538 21.4582 59.009 22.7378C59.6663 23.3909 60.4552 23.8969 61.3232 24.2222C62.1912 24.5475 63.1185 24.6846 64.0435 24.6244C64.9637 24.6846 65.8861 24.5474 66.7488 24.222C67.6115 23.8966 68.3945 23.3905 69.0454 22.7378C70.206 21.4882 70.7781 19.5934 70.7781 17.0615V5.23535H72.2819V17.086C72.2819 19.9827 71.5572 22.1878 70.1079 23.7015C69.3038 24.48 68.3466 25.0831 67.2971 25.4725C66.2475 25.8619 65.1285 26.0293 64.0108 25.9638C62.8956 26.0277 61.7794 25.858 60.7337 25.4656C59.6879 25.0732 58.7358 24.4667 57.9383 23.6852Z" fill="black" fill-opacity="0.2" />
                                    <path d="M78.3711 5.23535H79.8749V24.5019H91.7339V25.8577H78.3711V5.23535Z" fill="#1F1F1F" />
                                    <path d="M78.3711 5.23535H79.8749V24.5019H91.7339V25.8577H78.3711V5.23535Z" fill="black" fill-opacity="0.2" />
                                    <path d="M96.7845 25.1794C95.5783 24.7654 94.4845 24.0777 93.5889 23.1703L94.2672 22.0514C95.0929 22.8824 96.092 23.5211 97.1932 23.9217C98.4283 24.4005 99.7423 24.6443 101.067 24.6404C102.628 24.7486 104.182 24.3566 105.505 23.5215C105.977 23.1989 106.361 22.7644 106.623 22.257C106.886 21.7496 107.018 21.1851 107.009 20.614C107.027 20.2105 106.963 19.8076 106.823 19.4289C106.683 19.0502 106.468 18.7034 106.192 18.4088C105.647 17.8482 104.982 17.4182 104.246 17.151C103.206 16.784 102.144 16.4786 101.067 16.2363C99.8335 15.9499 98.6188 15.5871 97.4302 15.1501C96.5332 14.8057 95.7357 14.2445 95.109 13.5166C94.4365 12.6826 94.096 11.6297 94.1528 10.5601C94.1516 9.58526 94.4357 8.63139 94.9701 7.81587C95.5719 6.92558 96.4255 6.23464 97.422 5.83123C98.717 5.30071 100.11 5.0502 101.508 5.09618C102.644 5.09517 103.773 5.26307 104.859 5.59438C105.877 5.88933 106.841 6.34719 107.712 6.95014L107.066 8.16706C106.232 7.59793 105.313 7.16254 104.345 6.87664C103.396 6.58896 102.41 6.44041 101.419 6.43561C99.8882 6.33133 98.3661 6.73313 97.0869 7.57902C96.6257 7.91851 96.2523 8.36318 95.9978 8.87603C95.7434 9.38887 95.6152 9.95504 95.6239 10.5274C95.6062 10.9308 95.6694 11.3337 95.8098 11.7124C95.9501 12.0911 96.1648 12.438 96.4412 12.7326C96.9934 13.2981 97.6669 13.7309 98.4109 13.9985C99.461 14.3695 100.531 14.6831 101.615 14.9377C102.844 15.2215 104.053 15.5843 105.235 16.024C106.125 16.3767 106.918 16.9367 107.548 17.6574C108.219 18.4701 108.56 19.5048 108.505 20.5568C108.51 21.5296 108.225 22.4821 107.687 23.2928C107.066 24.1773 106.199 24.8614 105.195 25.2611C103.897 25.7833 102.506 26.0335 101.108 25.9962C99.6287 25.9939 98.1626 25.717 96.7845 25.1794Z" fill="#1F1F1F" />
                                    <path d="M96.7845 25.1794C95.5783 24.7654 94.4845 24.0777 93.5889 23.1703L94.2672 22.0514C95.0929 22.8824 96.092 23.5211 97.1932 23.9217C98.4283 24.4005 99.7423 24.6443 101.067 24.6404C102.628 24.7486 104.182 24.3566 105.505 23.5215C105.977 23.1989 106.361 22.7644 106.623 22.257C106.886 21.7496 107.018 21.1851 107.009 20.614C107.027 20.2105 106.963 19.8076 106.823 19.4289C106.683 19.0502 106.468 18.7034 106.192 18.4088C105.647 17.8482 104.982 17.4182 104.246 17.151C103.206 16.784 102.144 16.4786 101.067 16.2363C99.8335 15.9499 98.6188 15.5871 97.4302 15.1501C96.5332 14.8057 95.7357 14.2445 95.109 13.5166C94.4365 12.6826 94.096 11.6297 94.1528 10.5601C94.1516 9.58526 94.4357 8.63139 94.9701 7.81587C95.5719 6.92558 96.4255 6.23464 97.422 5.83123C98.717 5.30071 100.11 5.0502 101.508 5.09618C102.644 5.09517 103.773 5.26307 104.859 5.59438C105.877 5.88933 106.841 6.34719 107.712 6.95014L107.066 8.16706C106.232 7.59793 105.313 7.16254 104.345 6.87664C103.396 6.58896 102.41 6.44041 101.419 6.43561C99.8882 6.33133 98.3661 6.73313 97.0869 7.57902C96.6257 7.91851 96.2523 8.36318 95.9978 8.87603C95.7434 9.38887 95.6152 9.95504 95.6239 10.5274C95.6062 10.9308 95.6694 11.3337 95.8098 11.7124C95.9501 12.0911 96.1648 12.438 96.4412 12.7326C96.9934 13.2981 97.6669 13.7309 98.4109 13.9985C99.461 14.3695 100.531 14.6831 101.615 14.9377C102.844 15.2215 104.053 15.5843 105.235 16.024C106.125 16.3767 106.918 16.9367 107.548 17.6574C108.219 18.4701 108.56 19.5048 108.505 20.5568C108.51 21.5296 108.225 22.4821 107.687 23.2928C107.066 24.1773 106.199 24.8614 105.195 25.2611C103.897 25.7833 102.506 26.0335 101.108 25.9962C99.6287 25.9939 98.1626 25.717 96.7845 25.1794Z" fill="black" fill-opacity="0.2" />
                                    <path d="M127 24.5019V25.8577H112.787V5.23535H126.559V6.58295H114.299V14.7012H125.275V16.0243H114.283V24.5019H127Z" fill="#1F1F1F" />
                                    <path d="M127 24.5019V25.8577H112.787V5.23535H126.559V6.58295H114.299V14.7012H125.275V16.0243H114.283V24.5019H127Z" fill="black" fill-opacity="0.2" />
                                    <path d="M30.3052 5.23535H27.8942L19.4188 19.6996L10.9107 5.36603L8.41797 10.0949V25.8168H11.2458V10.9116L18.6832 23.3176H20.04L27.4855 10.8218L27.5101 25.8168H30.3379L30.3052 5.23535Z" fill="#1F1F1F" />
                                    <path d="M30.3052 5.23535H27.8942L19.4188 19.6996L10.9107 5.36603L8.41797 10.0949V25.8168H11.2458V10.9116L18.6832 23.3176H20.04L27.4855 10.8218L27.5101 25.8168H30.3379L30.3052 5.23535Z" fill="black" fill-opacity="0.2" />
                                    <path d="M6.88935 6.60731H5.58984L6.71772 0H10.3629L6.88935 6.60731Z" fill="#1F1F1F" />
                                    <path d="M6.88935 6.60731H5.58984L6.71772 0H10.3629L6.88935 6.60731Z" fill="black" fill-opacity="0.2" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
</div> <!-- wrapper end -->

<div id="success" class="popup popup-success" style="display: none;">
    <div class="popup-text__content text-center">
        <h3 class="popup__title popup-success__title title">Отправленно</h3>
        <p class="popup-success__text text-center">Мы получили Ваше сообщение и свяжемся с Вами в ближайшее время.</p>
        <button class="btn btn-outline" onclick="Fancybox.close();">Хорошо, жду!</button>
    </div>
</div>
<?php wp_footer(); ?>
<script>
    jQuery(document).ready(function($) {
        let timeout = null;
        $('.search-field').on('input', function() {
            clearTimeout(timeout);
            var search_term = $(this).val();
            if (search_term.length >= 3) { // Ограничение на минимальное количество символов для поиска
                $('.search-clean').fadeIn()
                timeout = setTimeout(function() {
                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        type: 'post',
                        data: {
                            action: 'custom_search',
                            search_term: search_term
                        },
                        beforeSend: function() {
                            $('.search-result').fadeIn();
                            $('.search-result').html('<img class="search-preloader" src="<?php echo get_template_directory_uri(); ?>/assets/images/preloader.gif" />');
                        },
                        success: function(response) {
                            $('.search-result').html(response);
                            $('.search-result').addClass('has-result');
                        }
                    });
                }, 500); // Задержка перед отправкой запроса AJAX (в миллисекундах)
            } else {
                $('.search-clean').fadeOut()
                $('.search-result').html('');
                $('.search-result').removeClass('has-result');
                $('.search-result').fadeOut();
            }
        });

        $(".search-field").focus(function() {
            if ($(this).closest('.search-form').find('.search-item').length > 1) {
                $(this).closest('.search-form').find('.search-result').fadeIn();
                $('.search-clean').fadeIn()
            }
        });
        $(".search-field").blur(function() {
            $(this).closest('.search-form').find('.search-result').fadeOut();
            $('.search-clean').fadeOut()
        });
    });

    $('.search-clean').on('click', function(e) {
        e.preventDefault()
        $(".search-field").val('')
        $('.search-result').html('');
    })
    $("#billing_phone").attr('data-tel-input', '');
    $("#billing_phone").attr('maxlength', '18');
    $("#billing_phone").on("focus", function() {
        if ($(this).val() === '') {
            $(this).val('+7 ')
        }
    });
    $("input[type='tel']").on("focus", function() {
        if ($(this).val() === '') {
            $(this).val('+7 ')
        }
    });
    $('body').on('input', 'input[type="number"][maxlength]', function() {
        if (this.value.length > this.maxLength) {
            this.value = this.value.slice(0, this.maxLength);
        }
    });

    $('input[type=tel]').attr('data-tel-input', '');
    $('input[type=tel]').attr('maxlength', '18');
</script>