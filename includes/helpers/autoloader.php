<?php

/**
 * Theme auto loader helper function
 * 
 * @package Nittambuwa
 */

namespace Nittambuwa\Includes\Helpers;

function autoloader($resource = '')
{
    $resource_path = false;
    $namespace_root = 'Nittambuwa\\';
    $resource = trim($resource, '\\');

    // This function returns false if the resource is empty or does not contain a backslash or does not begin with the namespace root.
    if (empty($resource) || strpos($resource, '\\') === false || strpos($resource, $namespace_root) !== 0) {
        return false;
    }

    //remove the namespace root from the resource
    $resource = str_replace($namespace_root, '', $resource);

    //convert the resource name to a path.
    $path = explode('\\', str_replace('_', '-', strtolower($resource)));

    //determine the resource type
    if (empty($path[0]) || empty($path[1])) {
        return false;
    }

    $directory = '';
    $file = '';

    if ($path[0] != 'includes') {
        return false;
    }

    switch (strtolower($path[1])) {
        case 'traits':
            $directory = 'includes/traits';
            $file = sprintf('trait-%s.php', $path[2]);
            break;
        case 'helpers':
            $directory = 'includes/helpers';
            $file = sprintf('helper-%s.php', $path[2]);
            break;
        case 'classes':
            $directory = 'includes/classes';
            $file = sprintf('class-%s.php', $path[2]);
            break;
        default:
            return false;
            break;
    }

    $resource_path = sprintf('%s/%s/%s', get_template_directory(), $directory, $file);

    if (file_exists($resource_path)) {
        require_once $resource_path;
    }
}

//register autoloader
spl_autoload_register('\Nittambuwa\Includes\Helpers\autoloader');
