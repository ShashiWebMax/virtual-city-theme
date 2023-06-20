<?php

/**
 * Home page template
 * 
 * @package Nittambuwa
 */
//load header
get_header();


//load content of post/page
if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_content();
    }
} else {
    //show 404 template
    get_template_part('templates/404');
}



//load footer
get_footer();
?>