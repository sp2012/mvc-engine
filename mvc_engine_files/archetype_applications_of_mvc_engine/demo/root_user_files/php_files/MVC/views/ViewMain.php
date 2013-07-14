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

    public function __construct(ModelMain $model, Template $template)
    {

        $this->template = $template;

        $this->model = $model;

        /* Initialising data in the constructor to write less code. */

        $this->template->child1 = "I am child 1!";

        $this->template->child2 = "I am child 2!";


        $this->template->mother = "I am the mother!";


        $this->template->view_main_string = $this->model->string;

        $this->template->view_main_number = $this->model->number;

    }

    public function output()
    {
        //This is placed here, because the controller changes it in main.php. The construct will have the default value for this. */
        $this->template->view_main_number = $this->model->number;

        $this->template->placeholder_child1 = $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelMain_child1'], false, false);

        $this->template->placeholder_child2 = $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelMain_child2'], false, false);

        $this->template->placeholder_mother = $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelMain_mother'], false, false);

        echo $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelMain'], false, false);
    }

    /* The following is only for page show-all */
    public function output_page_show_all()
    {

        $this->template->placeholder_child1 = $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelMain_child1'], false, false);

        $this->template->placeholder_child2 = $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelMain_child2'], false, false);

        $this->template->placeholder_mother = $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelMain_mother'], false, false);

        echo $this->template->renderTemplate($this->path_to_templates . $this->template_files_array['ModelMain_page_show-all'], false, false);

    }

}