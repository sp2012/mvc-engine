<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 7:49 μμ
 * To change this template use File | Settings | File Templates.
 */

class ViewDB2 extends View
{

    private $model1;

    private $model2;


    public function __construct(ModelDB1 $model1, ModelDB2 $model2, Template $template)
    {

        $this->template = $template;

        $this->model1 = $model1;
        $this->model2 = $model2;

        /* Data of output_isolated. */
        $this->template->array_data_viewdb2 = $this->model1->number . " " . "Extra Data 4";
        $this->template->array_data_viewdb3 = $this->model2->string2 . " " . "Extra Data 5";

    }

    public function output1()
    {
        $this->template->array_data = array_merge($this->model1->arr, array(0 => "Extra Data 1."));
        $this->template->array_datab = array( 0 => array_merge($this->model2->arr, array(0 => "Extra Data 2.")), 1 => array(1 => "Hi 2!"));

        $this->template->placeholder_ModelDB2_3_b = $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelDB2.3'], false, false);

    }

    public function output2()
    {
        $this->template->array_data_viewdb1 = $this->model1->string1 . " " . "Extra Data 3";
        $this->template->array_data_viewdb2 = $this->model1->number . " " . "Extra Data 4";
        $this->template->array_data_viewdb3 = $this->model2->string2 . " " . "Extra Data 5";

        $this->template->placeholder_ModelDB1_1_b = $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelDB1.1'], false, false);
        $this->template->placeholder_ModelDB1_2_b = $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelDB1.2'], false, false);

    }

    public function output3()
    {
        $array_data[] = $this->model1->string1;
        $array_data[] = $this->model1->number;
        $array_data[] = $this->model2->string2;
        $array_data[] = $this->model1->arr;
        $array_data[] = $this->model2->arr;

        $this->template->array_data = $array_data;

        $this->template->placeholder_ModelDB_4 = $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelDB.4'], false, false);

    }

    /* The following can show on its own, independed form ViewMain->output().
    Its data has been assigned in the constructor for writing less code. */
    public function output_isolated()
    {

        // The following has to be here, instead of the contructor, because the Controller changes it. */
        $this->template->array_data_viewdb1 = $this->model1->string1 . " " . "Extra Data 3";

        echo $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelDB1.1'], false, false);
        echo $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelDB1.2'], false, false);

    }

}