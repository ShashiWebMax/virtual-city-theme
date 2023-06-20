<?php
/**
 * Theme assets class
 * 
 * @package Nittambuwa
 */
namespace Nittambuwa\Includes\Classes;
use Nittambuwa\Includes\Traits\Singleton;

class Assets{
    use Singleton;

    function __construct()
    {        
        //load class
        $this->set_hooks();
    }

    protected function set_hooks()
    {
        //add action hooks
        // add_action('after_setup_theme', [$this, 'setup_theme']);
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }
    //register styles
    public function register_styles()
    {
        ///add css files
        wp_enqueue_style(
            'nittambuwa-style',
            get_stylesheet_uri(),
            array(),
            filemtime(NITTAMBUWA_DIR_PATH . '/style.css'),
            'all'
        );
        //add tailwind css
        wp_enqueue_style(
            'nittambuwa-tailwind',
            NITTAMBUWA_DIR_URL . '/tailwind.css',
            array(),
            filemtime(NITTAMBUWA_DIR_PATH . '/tailwind.css'),
            'all'
        );
    }

    //register scripts
    public function register_scripts()
    {
        //add js files
        wp_enqueue_script(
            'nittambuwa-script',
            NITTAMBUWA_DIR_URL . '/resources/js/main.js',
            array(),
            filemtime(NITTAMBUWA_DIR_PATH . '/resources/js/main.js'),
            true
        );
    }
}