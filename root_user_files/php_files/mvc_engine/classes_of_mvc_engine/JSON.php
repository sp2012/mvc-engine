<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 6/7/2013
 * Time: 6:33 μμ
 * To change this template use File | Settings | File Templates.
 */

class JSON
{

    public function jsonDecodeToArray($json_path)
    {

        $json_contents = file_get_contents($json_path);

        if($json_contents === false)
        {

            die("Error loading content from json configuration file.");

        }

        $json_array = json_decode($json_contents, true);

        if($json_array === NULL)
        {

            die("Error decoding json to array from json configuration file.");

        }

        return $json_array;

    }


}