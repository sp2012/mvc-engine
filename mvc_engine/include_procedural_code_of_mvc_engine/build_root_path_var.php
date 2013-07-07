<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 7/7/2013
 * Time: 10:02 μμ
 * To change this template use File | Settings | File Templates.
 */

$last_char_of_uri = substr($_SERVER['REQUEST_URI'], -1);

// If last character in URL is only / remove /, and redirect. Otherwise paths for resources (JavaScript scripts, css, images)
// in $route_path that is created later are incorrect and resource don't load.

if($last_char_of_uri === "/" AND
    count($get_variables['get_var']) >= 1 )
{

    $_SERVER['REQUEST_URI']  = substr($_SERVER['REQUEST_URI'], 0, -1);

    header("Location: {$_SERVER['REQUEST_URI']}");
    exit();

}


//This is the path to php_files, create dynamically, to allow for relative paths for loading your
//JavaScript scripts, css files and image files.
$root_path = "";

foreach($get_variables['get_var'] as $var)
{

    $root_path .= "../";

}

$root_path = substr($root_path, 0, -3);

