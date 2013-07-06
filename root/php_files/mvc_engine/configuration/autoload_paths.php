<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 8:21 μμ
 * To change this template use File | Settings | File Templates.
 */

$array_paths = array();

$json_paths = file_get_contents(".././configuration_files/autoload_paths.json");

if($json_paths === false)
{

    die("Error loading paths from json configuration file.");

}

$array_paths = json_decode($json_paths, true);

if($array_paths === NULL)
{

    die("Error decoding paths from json configuration file.");

}