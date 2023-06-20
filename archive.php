<?php

/**
 * Category template
 * 
 * @package Nittambuwa
 */
//load category info
$page = get_queried_object();



//load header
get_header();



//load content of post/page

echo '<div class="page md:flex">';

//page sidebar
echo '<div class=" md:bg-slate-200 md:min-w-[200px] ">';
//sidebar
echo '<sidebar id="the_sidebar" class="sidebar p-2 hidden md:block  bg-gray-200">';
get_sidebar();
echo '</sidebar>';

echo '</div>'; //sidebar


echo '  <div class="content p-4 flex-grow min-h-[calc(100vh-105px)] md:min-h-[calc(100vh-118px)]">';
echo '      <h1 class="text-2xl font-bold  ">' . $page->name . '</h1>';
echo '      <h3 class="mb-4 font-bold text-gray-600">' . $page->description . '</h3>';

// Post grid
if (have_posts()) {
    echo '      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">';
    while (have_posts()) {
        the_post();
        get_template_part('templates/post-card');
    }
    echo '  </div>';    //grid
    //pagination links
    get_template_part('templates/pagination-links');
    echo '</div>';      //content
}
echo '</div>';  //page

//load footer
get_footer();
