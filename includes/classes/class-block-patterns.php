<?php
/**
 * Register block patterns.
 * 
 * @package Nittambuwa
 */

namespace Nittambuwa\Includes\Classes;

use Nittambuwa\Includes\Traits\Singleton;

class Block_Patterns{
    use Singleton;

    protected function __construct()
    {
        //load class
        $this->set_hooks();
    }


    protected function set_hooks()
    {
        //register block patterns
        add_action('init', [$this, 'register_block_patterns']);
    }

    /**
     * Register block patterns
     * 
     * @return void
     */
    public function register_block_patterns(){
        if(function_exists('register_block_pattern')){
            register_block_pattern(
                'nittambuwa/hero',
                array(
                    'title' => __('Hero', 'nittambuwa'),
                    'description' => __('Hero section with a heading and a button', 'nittambuwa'),
                    'content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"100px","bottom":"100px"}}},"backgroundColor":"primary","textColor":"white"} -->
                    <div class="wp-block-group alignfull has-primary-background-color has-text-color has-white-color has-background" style="padding-top:100px;padding-bottom:100px"><div class="wp-block-group__inner-container"><!-- wp:heading {"align":"center","style":{"typography":{"fontSize":60}}} -->
                    <h2 class="has-text-align-center" style="font-size:60px">Heading</h2>
                    <!-- /wp:heading -->
                    
                    <!-- wp:buttons {"align":"center"} -->
                    <div class="wp-block-buttons aligncenter"><!-- wp:button {"borderRadius":0,"style":{"color":{"background":"#ffffff","text":"#000000"}}} -->
                    <div class="wp-block-button"><a class="wp-block-button__link no-border-radius has-text-color has-background" style="background-color:#ffffff;color:#000000">Button</a></div>
                    <!-- /wp:button --></div>
                    <!-- /wp:buttons --></div></div>
                    <!-- /wp:group -->',
                )
            );
        }
    }
}