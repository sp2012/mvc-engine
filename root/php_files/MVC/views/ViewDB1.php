<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 7:48 μμ
 * To change this template use File | Settings | File Templates.
 */

class ViewDB1 extends View
{

    public function __construct(ModelDB1 $model1, ModelDB2 $model2)
    {
        parent::__construct();

        $this->model1 = $model1;
        $this->model2 = $model2;

    }

    public function output1()
    {
        echo "ViewDB1" . $this->model1->string1 . $this->model2->string2;
    }

    public function output2()
    {
        echo "ViewDB1" . $this->model1->string1 . $this->model2->string2;
    }

}