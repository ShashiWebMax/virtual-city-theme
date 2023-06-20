<?php

/**
 * Category template
 * 
 * @package Nittambuwa
 */


//load header
get_header();

$the_page = get_query_var('paged', 1);

//get search qyery
$search_query = get_search_query();

//get search results
$args = array(
    'post_type' => 'post',
    'posts_per_page' => get_option('posts_per_page'),
    'paged' => $the_page,
    's' => $search_query,
    'orderby' => 'modified',
);
query_posts($args);


//load content of post/page

echo '<div class="page md:flex">';

//category sidebar
echo '<div class=" md:bg-slate-200 md:min-w-[200px] max-w-xs ">';

//sidebar
echo '<sidebar id="the_sidebar" class="sidebar p-2 hidden md:block  bg-gray-200">';
get_sidebar();
echo '</sidebar>';

echo '</div>';


echo '  <div class="content p-4 flex-grow min-h-[calc(100vh-105px)] md:min-h-[calc(100vh-118px)]">';
echo '      <h1 class="text-2xl font-bold mb-2  ">Search Results for <i class=" italic">"'.$search_query.'"</i></h1>';

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
}else{
    get_template_part( 'templates/no-results' );
}
echo '</div>';  //page

//load footer
get_footer();
