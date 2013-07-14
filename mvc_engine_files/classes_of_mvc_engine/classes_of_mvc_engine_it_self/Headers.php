<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 6/7/2013
 * Time: 3:43 μμ
 * To change this template use File | Settings | File Templates.
 */

class Headers
{

    public function __construct()
    {

        //Make sure web pages are not cached in all browsers.
        header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
        header('Pragma: no-cache'); // HTTP 1.0.
        header('Expires: 0'); // Proxies.

        //utf-8 headers
        header('Content-type: text/html; charset=UTF-8');

    }


}