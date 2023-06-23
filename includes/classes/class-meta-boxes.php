<?php
/**
 * Register Meta boxes for the theme
 * 
 * @package Nittambuwa
 */

namespace Nittambuwa\Includes\Classes;
use Nittambuwa\Includes\Traits\Singleton;
class Meta_Boxes{

    use Singleton;

    protected function __construct()
    {
        //load class
        $this->set_hooks();
    }

    protected function set_hooks()
    {
        //register meta boxes
        add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
        //save meta boxes
        add_action('save_post', [$this, 'save_meta_boxes']);
    }

    /**
     * Add meta boxes
     * return void
     */
    public function add_meta_boxes(){
        add_meta_box(
            'show_title_meta',                  //Unique ID
            __('Show Title', 'nittambuwa'),      //Box title
            [$this, 'show_title_meta_box'],     //Content callback, must be of type callable
            
        );

    }

    /**
     * Show title meta box
     * return void
     */
    public function show_title_meta_box($post){
        // Add a nonce field so we can check for it later.
        wp_nonce_field('nittambuwa_show_title_meta_box', 'nittambuwa_show_title_meta_box_nonce');
        $value = get_post_meta($post->ID, '_show_title_meta', true);

        ?>
        <label for="nittambuwa_show_title"><?php _e('Show Title', 'nittambuwa'); ?></label>
        <select name="nittambuwa_show_title" id="nittambuwa_show_title" class="postbox">
            <option value="yes" <?php selected($value, 'yes'); ?>><?php _e('Yes', 'nittambuwa'); ?></option>
            <option value="no" <?php selected($value, 'no'); ?>><?php _e('No', 'nittambuwa'); ?></option>
        </select>
        <?php
    }

    /**
     * Save meta boxes
     * return void
     */
    public function save_meta_boxes($post_id){
        // Check if our nonce is set.
        if (!isset($_POST['nittambuwa_show_title_meta_box_nonce'])) {
            return;
        }
        // Verify that the nonce is valid.
        if (!wp_verify_nonce($_POST['nittambuwa_show_title_meta_box_nonce'], 'nittambuwa_show_title_meta_box')) {
            return;
        }
        // check if user has permission to save data
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
        
        //if meta box is set then update the meta box
        if(isset($_POST['nittambuwa_show_title'])){
            update_post_meta($post_id, '_show_title_meta', sanitize_text_field($_POST['nittambuwa_show_title']));
        }

    }



}
