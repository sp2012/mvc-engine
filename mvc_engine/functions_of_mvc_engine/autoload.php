<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 8:14 μμ
 * To change this template use File | Settings | File Templates.
 */


function __autoload($class_name)
{

    require_once "../mvc_engine/classes_of_mvc_engine/JSON.php";

    $array_paths = array();

    $json_paths_classes_of_mvc_engine_object = new JSON();

    //Build autoload paths for classes of the mvc engine.
    $array_paths_of_classes_of_mvc_engine = $json_paths_classes_of_mvc_engine_object->jsonDecodeToArray
        ("../mvc_engine/configuration_files/autoload_paths_of_mvc_engine.json");

    // Build autoload paths for user created classes.
    $json_paths_user_classes_object = new JSON;

    $array_paths_of_classes_of_the_user = $json_paths_user_classes_object->jsonDecodeToArray
        (".././user_configuration_files/autoload_paths.json");

    $array_paths = array_merge($array_paths_of_classes_of_mvc_engine, $array_paths_of_classes_of_the_user);

    foreach($array_paths as $path)
    {

        if(file_exists($path . $class_name . ".php"))
        {

            require_once $path . $class_name . ".php";

        }

    }

}