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

    require "php_files/mvc_engine/configuration/autoload_paths.php";

    foreach($array_paths as $path)
    {

        if(file_exists($path . $class_name . ".php"))
        {

            require $path . $class_name . ".php";

        }

    }

}