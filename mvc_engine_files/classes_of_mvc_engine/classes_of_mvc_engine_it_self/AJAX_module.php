<?php

class AJAX_module
{


public function outputJavaScript()
{

$the_ajax_javascript = "";

$the_ajax_javascript .= 
"<script>" . 

file_get_contents('../../../mvc_engine_files/file_get_contents_resources_js_css_etc_of_mvc_engine/AJAX_module/ajax_without_library.js') .
		
"</script>";


$the_ajax_javascript .= 
"<script>" . 

file_get_contents('../../../mvc_engine_files/file_get_contents_resources_js_css_etc_of_mvc_engine/AJAX_module/event_driven_ajax_module.js') .

"</script>";

return $the_ajax_javascript;

}


public function ajaxify()
{

if(isset($_POST['runAjaxClassMethod']))
{
 

$json_parameters = json_decode($_POST['json_parameters'], true);



$arguments = $json_parameters['parameters'];//array($val1, $val2);

 
//file_put_contents('test.txt', "here" . print_r($arguments , true));

 
$$_POST['class_name'] = new $_POST['class_name'];

$class = new ReflectionClass($_POST['class_name']); 
$method = $class->getMethod($_POST['method']); 

$method->invokeArgs($$_POST['class_name'], $arguments);

 
exit();
	

}



}

}