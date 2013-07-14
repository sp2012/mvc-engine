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

    private $model1;

    private $model2;


    public function __construct(ModelDB1 $model1, ModelDB2 $model2, Template $template)
    {

        $this->template = $template;

        $this->model1 = $model1;
        $this->model2 = $model2;

    }

    public function output1()
    {


        $this->template->array_data_viewdb1 = $this->model1->string1;
        $this->template->array_data_viewdb2 = $this->model1->number;
        $this->template->array_data_viewdb3 = $this->model2->string2;




        $this->template->placeholder_ModelDB1_1 = $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelDB1.1'], false, false);

        $this->template->placeholder_ModelDB1_2 = $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelDB1.2'], false, false);



    }

    public function output2()
    {
        $this->template->array_data = $this->model1->arr;
        $this->template->array_datab = array( 0 => $this->model2->arr, 1 => array(0 =>'HI 1!') );

        $this->template->placeholder_ModelDB2_3 = $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelDB2.3'], false, false);

    }

}