<?php

/**
 * Category template
 * 
 * @package Nittambuwa
 */
//load category info
$category = get_queried_object();

//SUB CATEGORIES
$categories = get_categories(array(
    'parent' => $category->term_id,
    'hide_empty' => false,
));

//load header
get_header();

$the_page = get_query_var('paged', 1);

$args = array(
    'post_type' => 'post',
    'posts_per_page' => get_option('posts_per_page'),
    'paged' => $the_page,
    'category_name' => $category->slug,
    'orderby' => 'modified',
);
query_posts($args);


//load content of post/page

echo '<div class="page md:flex">';

//category sidebar
echo '<div class=" md:bg-slate-200 md:min-w-[200px] md:max-w-xs ">';
//if have a parent category
if ($category->parent) {

    $parent = get_category($category->parent);
    //replace "-" with "<br>" in category name
    $name = preg_replace('/-/', '<br>', $parent->name);
    echo '      <a class=" p-2 block bg-slate-300 hover:bg-slate-400 pl-5 font-bold " href="' . get_category_link($parent->term_id) . '">' . $name . '</a>';
}
// sub categories
if ($categories) {
    echo '<div class="mb-4">';
    echo '<h3 class="text-lg font-bold p-2 text-slate-800">Sub Categories</h3>';
    echo '<div class=" md:-mr-2  grid grid-cols-2 md:block gap-3">';
    foreach ($categories as $cat) {
        //replace "-" with "<br>" in category name
        $name = preg_replace('/-/', '<br>', $cat->name);
        echo '<a    class=" bg-slate-300 hover:bg-slate-400 p-2 pr-4 md:mb-3 font-bold shadow-md block"
                    href="' . get_category_link($cat->term_id) . '">' . $name . '</a>';
    }
    echo '</div>';
    echo '</div>';
}
//sidebar
echo '<sidebar id="the_sidebar" class="sidebar p-2 hidden md:block  bg-gray-200">';
get_sidebar();
echo '</sidebar>';

echo '</div>';


echo '  <div class="content p-4 flex-grow min-h-[calc(100vh-105px)] md:min-h-[calc(100vh-118px)]">';
echo '      <h1 class="text-2xl font-bold  ">' . $category->name . '</h1>';
echo '      <h3 class="mb-4 font-bold text-gray-600">' . $category->description . '</h3>';

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
