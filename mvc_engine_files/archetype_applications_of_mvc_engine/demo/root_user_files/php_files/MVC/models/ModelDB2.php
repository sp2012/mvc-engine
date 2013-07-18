<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 7:47 μμ
 * To change this template use File | Settings | File Templates.
 */

class ModelDB2
{

    public $arr;

    public $string2 ;

    public function __construct()
    {
        $this->arr = array ("Value4 <br/>& array.", "Value5");

        $this->arr = MVC_ENGINE::Run('Security', 'sanitizeSystemDataForHTMLOutput', array($this->arr));

        $this->string2 = "Value6";

        $this->string2 = MVC_ENGINE::Run('Security', 'sanitizeSystemDataForHTMLOutput', array($this->string2));
    }

}