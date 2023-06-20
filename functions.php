<?php
/**
 * Theme functions and definitions
 * 
 * @package Nittambuwa
 */

 //set path to const if not already set
 if(!defined('NITTAMBUWA_DIR_PATH')){
    define('NITTAMBUWA_DIR_PATH', untrailingslashit(get_template_directory()));
}

//set url to const if not already set
if(!defined('NITTAMBUWA_DIR_URL')){
    define('NITTAMBUWA_DIR_URL', untrailingslashit(get_template_directory_uri()));
}

//include autoloader
require_once NITTAMBUWA_DIR_PATH . '/includes/helpers/autoloader.php';

//include theme class
$theme = Nittambuwa\Includes\Classes\NITTAMBUWA_THEME::get_instance();





// https://www.youtube.com/watch?v=KdrHOgCvR3w&list=PLD8nQCAhR3tT3ehpyOpoYeUj3KHDEVK9h&index=9
// https://www.youtube.com/watch?v=ohVe8bdtGiY
