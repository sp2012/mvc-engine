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

    $uri_extra_index = $uri_parts + $website_settings_array[1];

        if (sizeof($uri) > ($uri_extra_index) AND
            !empty($uri[($uri_extra_index)]))
        {
            $var_name = "get_var_" . $uri_parts;


            $$var_name = $get_variables['get_var'][] = $get_variables_object->get_var[] =
            $uri[($uri_extra_index)];


        }



    $uri_parts++;
}


