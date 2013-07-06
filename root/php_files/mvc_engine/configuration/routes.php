<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 8:16 μμ
 * To change this template use File | Settings | File Templates.
 */


$routes = array();

$json_triads = file_get_contents(".././configuration_files/routes.json");

if($json_triads === false)
{

    die("Error loading triads from json configuration file.");

}

$routes = json_decode($json_triads, true);

if($routes === NULL)
{

    die("Error decoding triads from json configuration file.");

}