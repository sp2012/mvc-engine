<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 7:51 μμ
 * To change this template use File | Settings | File Templates.
 */

class ViewMain extends View
{

    public function __construct(ModelMain $model)
    {
        parent::__construct();

        $this->model = $model;



    }

    public function output()
    {
        echo "ViewMain" . $this->model->string;
    }

}