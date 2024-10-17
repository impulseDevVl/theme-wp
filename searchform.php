<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php _e('Search for:', 'baza-stroika'); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr('Поиск товара', 'baza-stroika'); ?>" value="<?php echo get_search_query(); ?>" name="s" autocomplete="off"/>
    </label>
    <input type="hidden" name="post_type" value="product" />
    <button class="search-clean" type="button">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 18L18 6M6 6L18 18" stroke="#A7A7A7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </button>
    <button type="submit" class="search-submit">
        <span>Найти</span>
        <i>
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="heroicons-outline/magnifying-glass">
                    <rect width="32" height="32" rx="16" fill="#FFD300" />
                    <path id="Vector" d="M25 24L20.3807 19.3807M20.3807 19.3807C21.5871 18.1743 22.3333 16.5076 22.3333 14.6667C22.3333 10.9848 19.3486 8 15.6667 8C11.9848 8 9 10.9848 9 14.6667C9 18.3486 11.9848 21.3333 15.6667 21.3333C17.5076 21.3333 19.1743 20.5871 20.3807 19.3807Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </g>
            </svg>
        </i>
    </button>
    <div class="search-result" style="display: none;">
</form>