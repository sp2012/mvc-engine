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

    require "../mvc_engine/functions_of_mvc_engine/autoload.php";

    if(isset($_GET['page']) AND $_GET['page'] !== "")
    {


        $sessions_object = new Sessions;

        $headers_object = new Headers();

        $security_object = new Security;

        
        $page_selected = $_GET['page'];


        require "../mvc_engine/include_procedural_code_of_mvc_engine/routes_processor.php";


        require "../mvc_engine/include_procedural_code_of_mvc_engine/set_pages.php";


    }



}