<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 7:47 μμ
 * To change this template use File | Settings | File Templates.
 */

class ModelDB1
{

    public $arr;

    public $string1;

    public $number;

    public function __construct()
    {

        $this->arr = array ("Value1 <br/>& array.", "Value2");

        $this->arr = Security::sanitizeSystemDataForHTMLOutput($this->arr);

        $this->string1 = "Value3";

        $this->string1 = Security::sanitizeSystemDataForHTMLOutput($this->string1);

        $this->number = 5;

        $this->number = Security::sanitizeSystemDataForHTMLOutput($this->number);

    }

}