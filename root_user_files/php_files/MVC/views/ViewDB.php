<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 6/7/2013
 * Time: 9:35 μμ
 * To change this template use File | Settings | File Templates.
 */

class ViewDB extends View
{

    protected $template_file1;

    protected $template_file2;

    protected $template_file3;

    protected $template_file4;

    public function __construct()
    {
        parent::__construct();

        $this->template_file1 = "ModelDB1.1.template.php";

        $this->template_file2 = "ModelDB1.2.template.php";

        $this->template_file3 = "ModelDB2.3.template.php";

        $this->template_file4 = "ModelDB.4.template.php";
    }

}