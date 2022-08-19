<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 12/8/2013
 * Time: 8:56 μμ
 * To change this template use File | Settings | File Templates.
 */

// headers for Internet Exlporer:

header('Pragma: public');

header("Content-Disposition: attachment; filename=abc.csv");


echo file_get_contents("../CSV_files/" . "test" . ".csv");