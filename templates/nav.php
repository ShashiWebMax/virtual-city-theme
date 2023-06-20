<?php

/**
 * Navigation bar template
 * 
 * @package Nittambuwa
 * 
 */

//load header menu items to array
$header_menu_items = Nittambuwa\Includes\Classes\Menus::get_instance()->get_menu_items_by_location('nittambuwa-header-menu');
// print aray 
// echo '<pre>';
// print_r($header_menu_items);

$title = get_bloginfo('name');
$title = explode('.', $title);
$lead = $title[0];
$sub = @$title[1] ? '.' . $title[1] : '';



?>
<nav id="nav-bar" style="background-color:<?php echo get_theme_mod('city_menu_color'); ?>;" class="relative shadow duration-100 transform z-50">
    <div class="container px-6 py-3 mx-auto md:flex">
        <div class="flex items-center justify-between">
            <a class="flex items-center text-gray-800 transition-colors duration-300 transform dark:text-white hover:text-gray-700 dark:hover:text-gray-300" href="<?php echo home_url(); ?>">
                <?php
                if (has_custom_logo()) {
                    $logo_url = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
                    echo '<img class="w-8 h-8 max-w-none" src="' . esc_url($logo_url[0]) . '" alt="' . get_bloginfo('name') . '">';
                }      
                ?>
                <h1 class="ml-2 title"><span style="color:<?php echo get_theme_mod('city_primary_color'); ?>;" class=" "><?php echo $lead; ?></span><span style="color:<?php echo get_theme_mod('city_accent_color'); ?>;"><?php echo $sub ?></span></h1>
            </a>

            <!-- Mobile menu button -->
            <div class="flex">
                <button id="menu-btn" type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400 md:hidden" aria-label="toggle menu">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div id="mobile-menu" style="background-color:<?php echo get_theme_mod('city_menu_color'); ?>;" class="-translate-x-full absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out md:mt-0 md:p-0 md:top-0 md:relative md:opacity-100 md:flex md:items-center md:justify-between md:-translate-x-0 hidden">
            <div class="flex flex-col px-2 -mx-4 md:flex-row md:mx-10 md:py-0">
                <?php
                foreach ($header_menu_items as $menu_item) {
                    //if url is current page
                    if ($menu_item->url != get_permalink())
                        echo '<a href="' . $menu_item->url . '" class="block px-4 py-2 mt-2 text-sm font-medium text-gray-700 transition-colors duration-300 transform rounded-md dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 md:mt-0 md:ml-4">' . $menu_item->title . '</a>';
                }
                ?>
            </div>
            <!-- Search -->
            <form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url('/'); ?>">
                <div class="relative mt-4 md:mt-0">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                            <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>

                    <input value="" name="s" id="s" type="text" class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300" placeholder="Search">
                </div>
            </form>
        </div>
    </div>
</nav>
<script>
    let menuOpen = false;
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    //when page loads remove mobile menu hidden class
    document.addEventListener('DOMContentLoaded', () => {
        mobileMenu.classList.remove('hidden');
    });
    //initially hide mobile menu
    //toggle menu
    menuBtn.addEventListener('click', () => {

        if (!menuOpen) {
            mobileMenu.classList.remove('-translate-x-full');
            mobileMenu.classList.add('translate-x-0');
            menuOpen = true;
            //change svg to close
            menuBtn.innerHTML = `
            <svg  xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            `;
        } else {
            mobileMenu.classList.remove('translate-x-0');
            mobileMenu.classList.add('-translate-x-full');
            menuOpen = false;
            //change svg to menu
            menuBtn.innerHTML = `
            <svg  xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
            </svg>
            `;
        }
    });
</script>