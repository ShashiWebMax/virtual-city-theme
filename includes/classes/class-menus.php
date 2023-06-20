<?php
/**
 * Theme menus
 * 
 * @package Nittambuwa
 */

namespace Nittambuwa\Includes\Classes;

use Nittambuwa\Includes\Traits\Singleton;

class Menus
{
    use Singleton;

    protected function __construct()
    {
        //load class
        $this->set_hooks();
    }

    protected function set_hooks()
    {
        //register menus
        add_action('init', [$this, 'register_menus']);
    }

    /**
     * Register menus
     * return void
     */
    public function register_menus()
    {
        register_nav_menus([
            'nittambuwa-header-menu' => esc_html__('Header Menu', 'nittambuwa'),
            'nittambuwa-footer-menu' => esc_html__('Side Menu', 'nittambuwa'),
        ]);
    }

    /**
     * Get menu items by location
     * 
     * @param string $location
     * @return array
     */
    public function get_menu_items_by_location($location)
    {
        //get all locations
        $locations = get_nav_menu_locations();

        //get object id by location
        if(!isset($locations[$location])  || !$locations[$location]){
            return array();
        }
        
        $menu_id = $locations[$location];
        

        //return menu items array by menu id
        return wp_get_nav_menu_items($menu_id);
    }
}