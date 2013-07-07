<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 7:48 μμ
 * To change this template use File | Settings | File Templates.
 */

class ViewDB3 extends ViewDB
{

    private $model2;


    public function __construct(ModelDB2 $model2)
    {
        parent::__construct();

        $this->model2 = $model2;

    }

    public function output()
    {

        $data[] = $this->model2->string2;
        $data[] = $this->model2->arr;

        require $this->path_to_templates . $this->template_file5;


    }


}