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

    private $template_file;

    private $model;

    public function __construct(ModelMain $model)
    {
        parent::__construct();

        $this->template_file = "ModelMain.template.php";

        $this->model = $model;

    }

    public function output()
    {
        $data = $this->model->string;

        require $this->path_to_templates . $this->template_file;
    }

}