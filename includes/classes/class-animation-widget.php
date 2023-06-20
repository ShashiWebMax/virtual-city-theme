<?php

/**
 * Animation widget
 * 
 * @package Nittambuwa
 */

namespace Nittambuwa\Includes\Classes;

use Nittambuwa\Includes\Traits\Singleton;
use WP_Widget;

class Animation_Widget extends WP_Widget
{
    use Singleton;

    /**
     * * Constructor
     * parent is constructed with the following parameters
     */
    public function __construct()
    {
        parent::__construct(
            'nittambuwa_animation_widget', // Base ID
            __('Animation Widget', 'nittambuwa'), // Name
            ['description' => __('Animation Widget', 'nittambuwa'),]   // Args
        );
    }

    /**
     * Front-end display of widget
     * 
     * @param array $args
     * @param array $instance
     * @return void
     */
    public function widget($args, $instance){
        $title = apply_filters('widget_title', $instance['title']);
        $animation = !empty($instance['animation']) ? $instance['animation'] : '';
        $animation_speed = !empty($instance['animation_speed']) ? $instance['animation_speed'] : '';
        

        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        echo '<div class="" >----------</div>';
        printf('<div class="animation"  >%s - %s</div>', $animation, $animation_speed);
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form
     * 
     * @param array $instance
     * @return void
     */
    public function form($instance){
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $animation = !empty($instance['animation']) ? $instance['animation'] : '';
        $animation_speed = !empty($instance['animation_speed']) ? $instance['animation_speed'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('animation'); ?>"><?php _e('Animation:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('animation'); ?>" name="<?php echo $this->get_field_name('animation'); ?>" type="text" value="<?php echo esc_attr($animation); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('animation_speed'); ?>"><?php _e('Animation Speed:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('animation_speed'); ?>" name="<?php echo $this->get_field_name('animation_speed'); ?>" type="text" value="<?php echo esc_attr($animation_speed); ?>">
        </p>
        <?php
    }  

    /**
     * Sanitize widget form values as they are saved (OPTIONAL)
     * 
     * @param array $new_instance
     * @param array $old_instance
     * @return array
     */
    public function update($new_instance, $old_instance){
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['animation'] = (!empty($new_instance['animation'])) ? strip_tags($new_instance['animation']) : '';
        $instance['animation_speed'] = (!empty($new_instance['animation_speed'])) ? strip_tags($new_instance['animation_speed']) : '';
        //speed is a number
        $instance['animation_speed'] = is_numeric($instance['animation_speed']) ? $instance['animation_speed'] : 0;
        return $instance;
    }

}
