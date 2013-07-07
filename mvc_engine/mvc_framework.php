<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 9:33 μμ
 * To change this template use File | Settings | File Templates.
 */

function run()
{

    require "../mvc_engine/functions_of_mvc_engine/autoload.php";

    $pages_array = array();

    // Build default page if URL is just index.php.
    $json_all_pages_object = new JSON();

    $pages_array = $json_all_pages_object->jsonDecodeToArray
        (".././user_configuration_files/application_pages.json");


    $index_php_position_in_folder_hierarchy = array();

    $json_index_php_position_in_folder_hierarchy_object = new JSON();

    $index_php_position_in_folder_hierarchy = $json_index_php_position_in_folder_hierarchy_object->jsonDecodeToArray
        (".././user_configuration_files/index.php_position_in_folder_hierarchy.json");

    $url_path_to_root = array();

    $json_url_path_to_root_object = new JSON();

    $url_path_to_root = $json_url_path_to_root_object->jsonDecodeToArray
        (".././user_configuration_files/URL_path_to_root.json");


    require "../mvc_engine/include_procedural_code_of_mvc_engine/URL_processor.php";

    require "../mvc_engine/include_procedural_code_of_mvc_engine/build_root_path_var.php";

    if(isset($get_variables_object->get_var[0]) AND $get_variables_object->get_var[0] !== "")
    {

        $security_object = new Security;

        $security_object->antiSessionHijackingPartA();


        $sessions_object = new Sessions;


        $security_object->antiSessionHijackingPartB();


        $headers_object = new Headers();



        $page_selected = $get_variables_object->get_var[0];


        require "../mvc_engine/include_procedural_code_of_mvc_engine/routes_processor.php";


        require "../mvc_engine/include_procedural_code_of_mvc_engine/set_pages.php";


    }

    else
    {

        $array_default_page_of_user = array();

        // Build default page if URL is just index.php.
        $json_default_user_page_object = new JSON();

        $array_default_page_of_user = $json_default_user_page_object->jsonDecodeToArray
            (".././user_configuration_files/default_page.json");

        header("Location: {$array_default_page_of_user[0]}");
        exit();

    }

}