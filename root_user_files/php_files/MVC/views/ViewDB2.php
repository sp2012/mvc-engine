<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 7:49 μμ
 * To change this template use File | Settings | File Templates.
 */

class ViewDB2 extends ViewDB
{

    private $model1;

    private $model2;


    public function __construct(ModelDB1 $model1, ModelDB2 $model2)
    {
        parent::__construct();

        $this->model1 = $model1;
        $this->model2 = $model2;

    }

    public function output1()
    {
        $data[] = $this->model1->arr;
        $data[] = $this->model2->arr;

        require $this->path_to_templates . $this->template_file3;

    }

    public function output2()
    {
        $data[] = $this->model1->string1;
        $data[] = $this->model1->number;
        $data[] = $this->model2->string2;

        require $this->path_to_templates . $this->template_file1;
        require $this->path_to_templates . $this->template_file2;

    }

    public function output3()
    {
        $data[] = $this->model1->string1;
        $data[] = $this->model1->number;
        $data[] = $this->model2->string2;
        $data[] = $this->model1->arr;
        $data[] = $this->model2->arr;

        require $this->path_to_templates . $this->template_file4;

    }

}