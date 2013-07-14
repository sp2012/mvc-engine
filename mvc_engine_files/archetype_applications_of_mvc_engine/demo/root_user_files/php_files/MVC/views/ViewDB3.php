<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 7:48 μμ
 * To change this template use File | Settings | File Templates.
 */

class ViewDB3 extends View
{

    private $model2;


    public function __construct(ModelDB2 $model2, Template $template)
    {


        $this->template = $template;

        $this->model2 = $model2;

    }

    public function output()
    {

        $array_data[] = $this->model2->string2;
        $array_data[] = $this->model2->arr;

        $this->template->array_data = $array_data;

        $this->template->placeholder_ModelDB_5 = $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelDB.5'], false, false);


    }


}