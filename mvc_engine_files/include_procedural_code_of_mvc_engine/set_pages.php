<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 9:23 μμ
 * To change this template use File | Settings | File Templates.
 */

$html_utilities = new HTMLUtilities;

ob_start();

foreach($ajax_pages_array as $page)
{

    if($page_selected == $page)
    {

        require 'php_files/include_procedural_code_of_pages/ajax/' . $page . '.php';

    }

}

foreach($pages_array as $page)
{

    if($page_selected == $page)
    {

        $page_file_name = 'php_files/include_procedural_code_of_pages/normal/' . $page . '.php';
        $page_content = require($page_file_name);

    }

}


HTML::$gather_all_html .= ob_get_contents();
ob_end_clean();


if($website_settings_array[7] != false)
{
//Tidy options for validating HTML5.
    $options = array(
        'hide-comments' => true,
        'tidy-mark' => false,
        'indent' => true,
        'indent-spaces' => 4,
        'new-blocklevel-tags' => 'article,header,footer,section,nav',
        'new-inline-tags' => 'video,audio,canvas,ruby,rt,rp',
        'doctype' => '<!DOCTYPE HTML>',
        'sort-attributes' => 'alpha',
        'vertical-space' => false,
        'output-xhtml' => true,
        'wrap' => 180,
        'wrap-attributes' => false,
        'break-before-br' => false,
    );





$tidy = tidy_parse_string(HTML::$gather_all_html, $options, 'utf8');

echo "<div style='font-size: 12px; color: black; background-color: silver; border: 1 solid;'><pre>";

echo tidy_error_count($tidy) . "<br/>";

echo $tidy->errorBuffer;

echo "</pre></div>";

echo "<div><pre>";


    $geshi = new GeSHi(HTML::$gather_all_html, 'html5');
    $geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS);
    echo $geshi->parse_code();

    echo "</div>";
}

else
{
//Auto indent html code.
HTML::$gather_all_html =$html_utilities->clean_html_code(HTML::$gather_all_html);
echo HTML::$gather_all_html;
}


