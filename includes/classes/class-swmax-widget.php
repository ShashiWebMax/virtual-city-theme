<?php

/**
 * SWMAX widget
 * 
 * @package Nittambuwa
 */

namespace Nittambuwa\Includes\Classes;

use Nittambuwa\Includes\Traits\Singleton;
use WP_Widget;

class Swmax_Widget extends WP_Widget
{
    use Singleton;

    /**
     * * Constructor
     * parent is constructed with the following parameters
     */
    public function __construct()
    {
        parent::__construct(
            'nittambuwa_swmax_widget', // Base ID
            __('SWMAX Widget', 'nittambuwa'), // Name
            ['description' => __('SWMAX Widget', 'nittambuwa'),]   // Args
        );
    }

    /**
     * Front-end display of widget
     * 
     * @param array $args
     * @param array $instance
     * @return void
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        ?>
        <div class=" text-gray-400 leading-none text-right h-5 ">            
            <p  class=" text-xs font-serif italic">Developed and maintained by </p>
            <a href="https://swmax.com" target="_blank" class=" text-lg font-bold font-mono">
                <span class=" text-blue-500">SW</span><span class="max" class="">MAX</span>
                <span  class=" text-xs">www.swmax.lk</span>
            </a>
        </div>
        <style>
            /* animate max colors */
            .max {
                animation: max 2s infinite;
            }

            @keyframes max {
                0% {
                    color: #fffbe4;
                }

                50% {
                    color: #f13d3d;
                }

                100% {
                    color: #fffbe4;
                }
            }
        </style>
        <?php
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form
     * 
     * @param array $instance
     * @return void
     */
    public function form($instance)
    {
        echo '<p>SWMAX Widget</p>';
    }

    /**
     * Sanitize widget form values as they are saved (OPTIONAL)
     * 
     * @param array $new_instance
     * @param array $old_instance
     * @return array
     */
    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['animation'] = (!empty($new_instance['animation'])) ? strip_tags($new_instance['animation']) : '';
        $instance['animation_speed'] = (!empty($new_instance['animation_speed'])) ? strip_tags($new_instance['animation_speed']) : '';
        //speed is a number
        $instance['animation_speed'] = is_numeric($instance['animation_speed']) ? $instance['animation_speed'] : 0;
        return $instance;
    }
}
