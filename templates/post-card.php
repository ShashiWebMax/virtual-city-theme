<?php

/**
 * Page card template
 * 
 * @package Nittambuwa
 */
//image
$image = get_the_post_thumbnail_url();
$image = $image ? $image : get_template_directory_uri() . '/resources/images/placeholder-biz.png';

//post categories
// $categories = get_the_category();


?>
<a href="<?php echo get_the_permalink(); ?>" style=" height: 300px;  " class=" rounded-md shadow-xl overflow-hidden hover:shadow-2xl bg-gradient-to-br from-slate-100 to-slate-300">
    <div style=" background-image: url('<?php echo $image; ?>'); height: 165px;   background-size: cover;  background-position: center;     "></div>
    <div class="p-2">
        <h3 class=" text-lg font-bold"><?php echo get_the_title(); ?></h3>
        <p><?php echo get_the_excerpt(); ?></p>
    </div>

</a>