<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 7/7/2013
 * Time: 3:16 μμ
 * To change this template use File | Settings | File Templates.
 */

$uri = explode('/', $_SERVER['REQUEST_URI']);

$uri_parts = 0;

$get_variables = array();

$get_variables_object = new stdClass();

$get_variables_object->get_var = array();

foreach ($uri as $part) {


        if (sizeof($uri) > ($uri_parts + $index_php_position_in_folder_hierarchy[0]) AND
            !empty($uri[($uri_parts +  $index_php_position_in_folder_hierarchy[0])]))
        {
            $var_name = "get_var_" . $uri_parts;

            $$var_name = $get_variables['get_var'][] = $get_variables_object->get_var[] =
            $uri[($uri_parts + $index_php_position_in_folder_hierarchy[0])];


        }



    $uri_parts++;
}


