<?php


require_once $general_object->content_for_pages['php_path_to_user_functions'] . "user_function.php";

user_function();

$user_class_object = new UserClass();

$user_class_object->test();

require $general_object->content_for_pages['php_path_to_user_include_php_files'] . "user_php.php";



$general_object->content_for_pages['object_log']->log('Logging a message...');


$ViewDB1_object->output1();


$ViewDB1_object->output2();

$ControllerDB_object->update1($get_variables_object->get_var[1]);

$ViewDB2_object->output1();

$ViewDB2_object->output2();

$ViewDB2_object->output3();


$ViewDB3_object->output();


$ControllerMain_object->update1($get_variables_object->get_var[2]);

$ViewMain_object->output();






/* ViewMain reoutputs the whole page, it stored above. */

$ControllerMain_object->update("model", "number", 20);
$ViewMain_object->output();


$ControllerDB_object->update("model1", "string1", "Update is a Magic method available to all controllers!");

$ViewDB2_object->output_isolated();



function example()
{

    echo "<p>Better use MVC instead of echoing! And better storing functions in separate files!</p>";

}

class Example
{

    public function __construct()
    {

        echo "<p>Better use MVC instead of echoing! And better store classes in their own files!</p>";

    }


}

example();

$example_object = new Example();



