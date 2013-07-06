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

    public $template_file1;

    public $template_file2;

    public $arr;

    public $string1;

    public function __construct()
    {

        $this->template_file1 = "ModelDB1.1.template.php";

        $this->template_file2 = "ModelDB1.2.template.php";

        $this->arr = array ("Value1 <br/>& array.", "Value2");

        $this->string1 = "Value3";

    }

}