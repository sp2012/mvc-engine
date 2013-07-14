<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 12/7/2013
 * Time: 11:42 μμ
 * To change this template use File | Settings | File Templates.
 */


if($website_settings_array[8] == true)
{

$MVC_ENGINE = '$MVC_ENGINE_';

//Gather all HTML;
HTML::$gather_all_html = "<div style='background-color:white; color:black; border: solid 1'>\n";


HTML::$gather_all_html .= "<p style='color:red'>Classes available to you are:</p>";

HTML::$gather_all_html .= "<ul>\n";

$directory = '../../../mvc_engine_files/classes_of_mvc_engine/classes_of_mvc_engine_[place_modules_here]_for_the_users/';
$scanned_directory = array_diff(scandir($directory), array('..', '.'));

foreach($scanned_directory as $item)
{

    HTML::$gather_all_html .= "<p><li>" . substr($item, 0, -4) . "</li></p>\n";

}

HTML::$gather_all_html .= "</ul>\n";


HTML::$gather_all_html .= "<p style='color:red'>For use in pages, automatically added <b>properties</b> and <b>objects</b>:</p>\n";



HTML::$gather_all_html .= "<ul>\n";


    foreach( LiveHelp::$gather_variable_names_added_dynamically_second_array as $key => $auto_created_name)
    {

        $type = "";

     if(strstr($key, 'php'))
    {
        $type = "For use with PHP, variable: ";
    }
    else if(strstr($key, 'javascript'))
    {
        $type = "For use with JavaScript, variable: ";
    }

        HTML::$gather_all_html .= "<li>" .  $type . $MVC_ENGINE . $key . ":  " . $auto_created_name . "</li>";

    }

foreach($general_object->content_for_pages as $key_auto_created_name =>$auto_created_name)
{
    $type = "";

    if(strstr($key_auto_created_name, 'object'))
    {
        $type = "Object: ";

        HTML::$gather_all_html .= "<p><li>" . $type . $MVC_ENGINE . 'general_object->content_for_pages[' . "'" . $key_auto_created_name . "'" . "]" . "</li></p>\n";
    }



}

HTML::$gather_all_html .= "</ul>\n";




HTML::$gather_all_html .= "<p style='color:red'>For Model, View, Controller objects, automatically added <b>properties:</b></p>\n";

HTML::$gather_all_html .= "<ul>\n";


    foreach(LiveHelp::$gather_variable_names_added_dynamically_third_array as $key =>$auto_created_name)
    {

        HTML::$gather_all_html .= "<li>" . "$" . $key . ": " . $auto_created_name . "</li>";

    }

    foreach(LiveHelp::$gather_variable_names_added_dynamically  as $key =>$auto_created_name)
    {

        HTML::$gather_all_html .= "<li>"  . $MVC_ENGINE . $key . ": " . (is_array($auto_created_name) ? "Array" :  $auto_created_name) . "</li>";

    }





HTML::$gather_all_html .= "</ul>\n";

HTML::$gather_all_html .= "<p style='color:red'>For Model, View, Controller objects, automatically added <b>methods</b>:</p>\n";


HTML::$gather_all_html .= "<ul>\n";



    foreach(LiveHelp::$gather_method_name_added_dynamically as $auto_created_name)
    {

        HTML::$gather_all_html .= "<li>" . $MVC_ENGINE . str_replace("|", ", ", $auto_created_name) . "</li>";

    }


HTML::$gather_all_html .= "</ul>\n";


    HTML::$gather_all_html .= "<p style='color:red'>Your triad MVC objects:</p>\n";


    $triad_index = 0;
    foreach(LiveHelp::$gather_triads_MVC as $triad)
    {

        HTML::$gather_all_html .= "<ul>\n";

        HTML::$gather_all_html .= "<li>" . "Your triad " . ($triad_index + 1) . ": " . "</li>\n";


        HTML::$gather_all_html .= "<ul>\n";

        foreach($triad as $component)
        {

            HTML::$gather_all_html .= "<li>" . $MVC_ENGINE . $component . "</li>";



        }

        HTML::$gather_all_html .= "</ul>\n";

        $triad_index++;

        HTML::$gather_all_html .= "</ul>\n";

    }




HTML::$gather_all_html .= "</div>\n";




}



