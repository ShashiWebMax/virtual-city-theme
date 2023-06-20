<?php

namespace Nittambuwa\Includes\Traits;

trait Singleton
{
    

    protected function __construct()
    {
        // $this->init();
    }

    protected function __clone()
    {
    }

    final public static function get_instance()
    {
        //the instance is stored in a static array. this is to ensure that there is only one instance of the class.
        static $instance = [];
        //get_called_class() returns the class name of the class that is calling the method. this is to ensure that 
        // the instance is stored in the static array with the class name as the key.
        $called_class = get_called_class();
        if(!isset($instance[$called_class])){
            $instance[$called_class] = new $called_class();
            //the wordpress action hook nittambuwa_singleton_init{$called_class} is fired when the singleton is initialized. so that other classes can hook into it.
            do_action( sprintf('nittambuwa_singleton_init%s', $called_class) );
        }

        return $instance[$called_class];
    }

}