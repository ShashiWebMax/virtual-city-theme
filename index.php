<?php
/**
 * Main template file
 * 
 * @package Nittambuwa
 */
//load header
get_header();
//load content of post/page
if(have_posts()){
    echo '<div class="page flex">';
    echo '<div class="content flex-grow min-h-[calc(100vh-105px)] md:min-h-[calc(100vh-118px)] ">';
    while(have_posts()){
        the_post();
        
        //get template part
        get_template_part('templates/post');
    }
    echo '</div>';
    echo '<sidebar id="the_sidebar" class="sidebar p-2 hidden md:block md:shadow-md bg-gray-200 md:max-w-[250px]">';
    //sidebar
    get_sidebar();
    echo '</sidebar>';
    echo '</div>';
}else{
    //show 404 template
    get_template_part('templates/404');
}


//load footer
get_footer();
?>

