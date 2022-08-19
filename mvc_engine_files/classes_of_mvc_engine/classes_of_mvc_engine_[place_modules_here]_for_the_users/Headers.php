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

        headersNoCache();

        headersUTF8();

    }

    /**
     * Sends no cache headers.
     * @param none
     * @return nothing
     */
    public function headersNoCache()
    {
        //Make sure web pages are not cached in all browsers.
        header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
        header('Pragma: no-cache'); // HTTP 1.0.
        header('Expires: 0'); // Proxies.

    }

    /**
     * Sends UTF-8 headers.
     * @param none
     * @return nothing
     */
    public function headersUTF8()
    {

        //utf-8 headers
        header('Content-type: text/html; charset=UTF-8');

    }


}