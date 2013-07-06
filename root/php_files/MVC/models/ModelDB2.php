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

    public $template_file;

    public $arr;

    public $string2 ;

    public function __construct()
    {
        $this->template_file = "ModelDB2.template.php";

        $this->arr = array ("Value4 <br/>& array.", "Value5");

        $this->string2 = "Value6";
    }

}