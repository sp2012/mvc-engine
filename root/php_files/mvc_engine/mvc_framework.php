<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 9:33 μμ
 * To change this template use File | Settings | File Templates.
 */

function run($all_pages)
{

    require "php_files/mvc_engine/autoload.php";

    if(isset($_GET['page']) AND $_GET['page'] !== "")
    {

//Security Class sanitization should be here.

        $page_selected = $_GET['page'];


        require "php_files/mvc_engine/configuration/routes.php";


        require "php_files/mvc_engine/routes_processor.php";


        require "php_files/mvc_engine/set_pages.php";


    }



}