<?php
/**
 * Theme pagination links
 * 
 * @package Nittambuwa
 * 
 */
?>
<div class="flex w-full my-4 pagination justify-around">
    <div class="prev ">
        <?php previous_posts_link('Previous'); ?>
    </div>
    <div class="next">
        <?php next_posts_link('Next'); ?>
    </div>
</div>
<style>
    
    .pagination a{
        padding: 0 10px;
        background-color: #1f2937;
        color: #fff;
        border-radius: 5px;
        width: 100px;
        display: block;
        text-align: center;
    }
</style>