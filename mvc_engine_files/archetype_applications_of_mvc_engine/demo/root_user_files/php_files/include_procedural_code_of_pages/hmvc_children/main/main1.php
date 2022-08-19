<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 21/7/2013
 * Time: 5:38 μμ
 * To change this template use File | Settings | File Templates.
 */

echo "<p>" . "Echoing before outputting the template, should place this message after the outputting of the template." . "</p>";

/* ViewMain reoutputs the whole page, it stored above. */

$ControllerMain_object->update("model", "number", 20);
$ViewMain_object->output();


$ControllerDB_object->update("model1", "string1", "Update is a Magic method available to all controllers!");

$ViewDB2_object->output_isolated();


example();

$example_object = new Example();


require $general_object->content_for_pages['php_path_to_user_include_php_files'] . "user_php.php";

user_function();

$user_class_object = new UserClass();

$user_class_object->test();