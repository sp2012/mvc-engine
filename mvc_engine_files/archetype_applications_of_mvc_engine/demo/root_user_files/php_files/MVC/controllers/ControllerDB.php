<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 7:45 μμ
 * To change this template use File | Settings | File Templates.
 */

class ControllerDB
{

    private $model1;

    public function __construct(ModelDB1 $model1, ModelDB2 $model2)
    {

        $this->model1 = $model1;


    }

    public function update1($user_input)
    {

        $this->model1->string1 = $user_input;

    }



}






