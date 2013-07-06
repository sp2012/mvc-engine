<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 9:23 μμ
 * To change this template use File | Settings | File Templates.
 */

$pages_array = explode(",", $all_pages);

foreach($pages_array as $page)
{

    if($page_selected == $page)
    {

        require_once "php_files/include_procedural_code/" . $page . ".php";

    }

}