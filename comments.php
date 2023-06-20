<?php
/**
 * Comments template
 * 
 * @package Nittambuwa
 */


//if post is password protected
if (post_password_required()) {
    return;
}



?>

<div id="comments" class="comments-area">
    <?php 
    //if comments are open
    if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            printf(
                _nx(
                    'One thought on "%2$s"',
                    '%1$s thoughts on "%2$s"',
                    get_comments_number(),
                    'comments title',
                    'twentythirteen'
                ),
                number_format_i18n( get_comments_number() ),
                '<span>' . get_the_title() . '</span>'
            );
            ?>
        </h2><!-- .comments-title -->

        <?php 
        // comment navigation
        the_comments_navigation(); 

        ?>   
        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size'=> 0,
            ));            

            ?>
        </ol><!-- .comment-list -->

        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open()) : ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'nittambuwa'); ?></p>
        <?php
        endif;

    endif; // Check for have_comments().

    //show comment form
    comment_form([
        'title_reply' => 'Your Comment - ඔබේ අදහස', 
              
    ]);
    ?>


</div>