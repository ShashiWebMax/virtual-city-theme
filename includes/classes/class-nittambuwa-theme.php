<?php

/**
 * Bootstrap file for the theme
 * 
 * @package Nittambuwa
 */

namespace Nittambuwa\Includes\Classes;

use Nittambuwa\Includes\Traits\Singleton;
use Nittambuwa\Includes\Classes\Assets;

class NITTAMBUWA_THEME
{
    use Singleton;

    function __construct()
    {       
        //load class
        Assets::get_instance();
        Menus::get_instance();
        Meta_Boxes::get_instance();
        Sidebars::get_instance();
        Block_Patterns::get_instance();
        

        $this->set_hooks();
    }

    protected function set_hooks()
    {
        //load Assets (css, js)
        
        //set up theme
        add_action('after_setup_theme', [$this, 'setup_theme']);

        //register widgets
        add_action('widgets_init', [$this, 'register_widgets']);

        //register customizer
        add_action('customize_register', [$this, 'nittambuwa_register_customizer']);

        //register rewrite rules
        add_action('init', [$this, 'nittambuwa_register_rewrite_rules']);


    }

    /**
     * Set up theme
     * @return void
     */
    public function setup_theme()
    {
        // enabling different theme support features
        //enable title tag
        add_theme_support('title-tag');
        //custom logo
        add_theme_support('custom-logo', [
            'header-text' => ['site-title', 'site-description'],
            'height' => 100,
            'width' => 100,
            'flex-height' => true,
            'flex-width' => true,
        ]);
        //custom background
        add_theme_support('custom-background', [
            'default-color' => '#ffffff',
            'default-image' => '',
        ]);
        //post thumbnails
        add_theme_support('post-thumbnails');
        // selective refresh for widgets
        add_theme_support('customize-selective-refresh-widgets');
        //automatic feed links
        add_theme_support('automatic-feed-links');
        //html5 support
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]);
        //editor style - add css to the editor area 
        // add_theme_support( 'editor-styles' );
        // add_editor_style( 'tailwind.css' );

        //width of the content area
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 1240;
        }

        //allow wide
        add_theme_support('align-wide');

        //enable nav menus
        // add_theme_support('menus');
        
        //add custom rewrite rules


    }

    /**
     * Register widgets
     * @return void
     */
    public function register_widgets(){
        register_widget('Nittambuwa\Includes\Classes\Animation_Widget');
        register_widget('Nittambuwa\Includes\Classes\Swmax_Widget');
    }

    /**
     * Register customizer
     * @return void
     */
    public function nittambuwa_register_customizer($wp_customize){
        //register hero media to homepage settings section
        $wp_customize->add_setting('nittambuwa_hero_media_1', [
            'default' => '',
            'transport' => 'refresh',
        ]);
        
        $wp_customize->add_control(new \WP_Customize_Media_Control($wp_customize, 'nittambuwa_hero_media_control_1', [
            'label' => __('Hero Media 1', 'nittambuwa'),
            'section' => 'static_front_page',
            'settings' => 'nittambuwa_hero_media_1',
            'mime_type' => 'image',
        ]));

        //register hero media to homepage settings section
        $wp_customize->add_setting('nittambuwa_hero_media_2', [
            'default' => '',
            'transport' => 'refresh',
        ]);

        $wp_customize->add_control(new \WP_Customize_Media_Control($wp_customize, 'nittambuwa_hero_media_control_2', [
            'label' => __('Hero Media 2', 'nittambuwa'),
            'section' => 'static_front_page',
            'settings' => 'nittambuwa_hero_media_2',
            'mime_type' => 'image',
        ]));

        //register hero media to homepage settings section
        $wp_customize->add_setting('nittambuwa_hero_media_3', [
            'default' => '',
            'transport' => 'refresh',
        ]);

        $wp_customize->add_control(new \WP_Customize_Media_Control($wp_customize, 'nittambuwa_hero_media_control_3', [
            'label' => __('Hero Media 3', 'nittambuwa'),
            'section' => 'static_front_page',
            'settings' => 'nittambuwa_hero_media_3',
            'mime_type' => 'image',
        ]));

        //register primary color to colors section
        $wp_customize->add_setting('city_primary_color', [
            'default' => '#ff6600',
            'transport' => 'refresh',
        ]);

        $wp_customize->add_control(new \WP_Customize_Color_Control($wp_customize, 'city_primary_color_control', [
            'label' => __('Primary Color', 'virtual-city'),
            'section' => 'colors',
            'settings' => 'city_primary_color',
        ]));

        // Register accent color to colors section
        $wp_customize->add_setting('city_accent_color', [
            'default' => '#002596',
            'transport' => 'refresh',
        ]);

        $wp_customize->add_control(new \WP_Customize_Color_Control($wp_customize, 'city_accent_color_control', [
            'label' => __('Accent Color', 'virtual-city'),
            'section' => 'colors',
            'settings' => 'city_accent_color',
        ]));

        // Register menu color to colors section
        $wp_customize->add_setting('city_menu_color', [
            'default' => '#000536',
            'transport' => 'refresh',
        ]);

        $wp_customize->add_control(new \WP_Customize_Color_Control($wp_customize, 'city_menu_color_control', [
            'label' => __('Menu Color', 'virtual-city'),
            'section' => 'colors',
            'settings' => 'city_menu_color',
        ]));



    }

    /**
     * Register custom rewrite rules
     * @return void
     */
    public function nittambuwa_register_rewrite_rules(){
        // category/[category-slug]/pg/[page-number]
        // add_rewrite_rule('^category/([^/]*)/pg/([0-9]{1,})/?', 'index.php?category_name=$matches[1]&pg=$matches[2]', 'top');

    }

}
