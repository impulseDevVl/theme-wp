<?php get_header(); ?>
<div class="container">
    <div class="woocommerce-breadcrumb">
        <?php echo bcn_display(); ?>
    </div>
</div>

<div class="blogPageArticleWrapper">
    <div class="blogPageArticleInner">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</div>



<div class="blogPageSliderWrapper">
    <div class="blogPageSwiperNavigation">
        <div class="blogPageSwiperNavigationPrev">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
                <g filter="url(#filter0_d_356_3328)">
                    <circle cx="28" cy="28" r="20" fill="white" />
                    <path d="M37 29C37.5523 29 38 28.5523 38 28C38 27.4477 37.5523 27 37 27V29ZM20.2929 27.2929C19.9024 27.6834 19.9024 28.3166 20.2929 28.7071L26.6569 35.0711C27.0474 35.4616 27.6805 35.4616 28.0711 35.0711C28.4616 34.6805 28.4616 34.0474 28.0711 33.6569L22.4142 28L28.0711 22.3431C28.4616 21.9526 28.4616 21.3195 28.0711 20.9289C27.6805 20.5384 27.0474 20.5384 26.6569 20.9289L20.2929 27.2929ZM37 27L21 27V29L37 29V27Z" fill="#1F1F1F" />
                    <path d="M37 29C37.5523 29 38 28.5523 38 28C38 27.4477 37.5523 27 37 27V29ZM20.2929 27.2929C19.9024 27.6834 19.9024 28.3166 20.2929 28.7071L26.6569 35.0711C27.0474 35.4616 27.6805 35.4616 28.0711 35.0711C28.4616 34.6805 28.4616 34.0474 28.0711 33.6569L22.4142 28L28.0711 22.3431C28.4616 21.9526 28.4616 21.3195 28.0711 20.9289C27.6805 20.5384 27.0474 20.5384 26.6569 20.9289L20.2929 27.2929ZM37 27L21 27V29L37 29V27Z" fill="black" fill-opacity="0.2" />
                </g>
                <defs>
                    <filter id="filter0_d_356_3328" x="0" y="0" width="60" height="60" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                        <feOffset dx="2" dy="2" />
                        <feGaussianBlur stdDeviation="5" />
                        <feComposite in2="hardAlpha" operator="out" />
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" />
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_356_3328" />
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_356_3328" result="shape" />
                    </filter>
                </defs>
            </svg>
        </div>
        <div class="blogPageSwiperNavigationNext">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
                <g filter="url(#filter0_d_356_3329)">
                    <circle cx="28" cy="28" r="20" fill="white" />
                    <path d="M21 26.9995C20.4477 26.9995 20 27.4472 20 27.9995C20 28.5518 20.4477 28.9995 21 28.9995V26.9995ZM37.7071 28.7066C38.0976 28.3161 38.0976 27.6829 37.7071 27.2924L31.3431 20.9284C30.9526 20.5379 30.3195 20.5379 29.9289 20.9284C29.5384 21.319 29.5384 21.9521 29.9289 22.3427L35.5858 27.9995L29.9289 33.6564C29.5384 34.0469 29.5384 34.6801 29.9289 35.0706C30.3195 35.4611 30.9526 35.4611 31.3431 35.0706L37.7071 28.7066ZM21 28.9995H37V26.9995H21V28.9995Z" fill="#1F1F1F" />
                    <path d="M21 26.9995C20.4477 26.9995 20 27.4472 20 27.9995C20 28.5518 20.4477 28.9995 21 28.9995V26.9995ZM37.7071 28.7066C38.0976 28.3161 38.0976 27.6829 37.7071 27.2924L31.3431 20.9284C30.9526 20.5379 30.3195 20.5379 29.9289 20.9284C29.5384 21.319 29.5384 21.9521 29.9289 22.3427L35.5858 27.9995L29.9289 33.6564C29.5384 34.0469 29.5384 34.6801 29.9289 35.0706C30.3195 35.4611 30.9526 35.4611 31.3431 35.0706L37.7071 28.7066ZM21 28.9995H37V26.9995H21V28.9995Z" fill="black" fill-opacity="0.2" />
                </g>
                <defs>
                    <filter id="filter0_d_356_3329" x="0" y="0" width="60" height="60" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                        <feOffset dx="2" dy="2" />
                        <feGaussianBlur stdDeviation="5" />
                        <feComposite in2="hardAlpha" operator="out" />
                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" />
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_356_3329" />
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_356_3329" result="shape" />
                    </filter>
                </defs>
            </svg>
        </div>
    </div>
    <div class="blogPageSliderInner">
        <div class="blogPageSliderTitle">
            <h3>Другие материалы в категории</h3>
        </div>
        <div class="blogPageSlider">
            <div class="blogPageSwiper">
                <div class="swiper-wrapper">
                    <?php
                    $current_cat = get_the_category(get_the_ID())[0]->term_id;

                    $args = array(
                        'post_type'      => 'post',
                        'cat'            => $current_cat,
                        'post__not_in'   => array(get_the_ID()),
                        'posts_per_page' => -1,
                    );

                    $posts = new WP_Query($args); ?>
                    <?php echo get_loop_posts($posts, true); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>