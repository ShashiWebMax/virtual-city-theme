<?php
/**
 * Post template
 * 
 * @package Nittambuwa
 */
$featured_image = get_the_post_thumbnail_url();
?>
<div class="my-2 mx-2  rounded-md shadow-md overflow-hidden  ">
    <?php if ($featured_image) : ?>
        <div class="mb-2 h-80 bg-cover bg-center" style=" background-image: url('<?php echo $featured_image; ?>')">
           
        </div>
    <?php else: ?>
        <div class=" h-24 bg-gradient-to-tr from-white to-indigo-800"></div>
    <?php endif; ?>
    <div class=" -mt-14">
        <h2 class=" text-3xl font-bold p-4 pt-12  bg-gradient-to-t from-white via-white to-transparent pb-1 ">
            <?php the_title(); ?>
        </h2>
        <hr class="">
        <div class=" bg-white p-4">
            <?php the_content(); ?>
        </div>
    </div>
    <?php if (comments_open() || get_comments_number()) : ?>
        <hr>
        <div class="bg-white p-4">
            <?php comments_template(); ?>
        </div>   
    <?php endif; ?>       

</div>