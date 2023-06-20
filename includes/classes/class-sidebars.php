<?php
/**
 * Register widget area.
 * 
 * @package Nittambuwa
 */
namespace Nittambuwa\Includes\Classes;

use Nittambuwa\Includes\Traits\Singleton;

class Sidebars{
    use Singleton;

    protected function __construct()
    {
        //load class
        $this->set_hooks();
    }

    protected function set_hooks()
    {
        //register sidebars
        add_action('widgets_init', [$this, 'register_sidebars']);

    }

    /**
     * Register sidebars
     * return void
     */
    public function register_sidebars(){
        //primary sidebar
        register_sidebar([
            'name'          => __('Primary Sidebar', 'nittambuwa'),
            'id'            => 'primary-sidebar',
            'description'   => __('Primary sidebar', 'nittambuwa'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]);
        //footer sidebar
        register_sidebar([
            'name'          => __('Footer Sidebar', 'nittambuwa'),
            'id'            => 'footer-sidebar',
            'description'   => __('Footer sidebar', 'nittambuwa'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]);
    }

    
}