<?php
/**
 * Comment template
 * 
 * @package Nittambuwa
 */

 echo '<div class="comment">';
    echo '<div class="comment-header">';
        echo '<div class="comment-author">';
            // echo get_avatar($comment, 50);
            echo '<div class="comment-author-name">';
                // echo get_comment_author_link();
            echo '</div>';
        echo '</div>';
        echo '<div class="comment-date">';
            // echo get_comment_date();
        echo '</div>';
    echo '</div>';
    echo '<div class="comment-body">';
        // echo get_comment_text();
        echo '----------------------';
    echo '</div>';
    echo '</div>';
?>