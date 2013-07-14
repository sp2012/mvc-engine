<?php

$pages_array = array();

// Build default page if URL is just index.php.
$json_all_pages_object = new JSON();

$pages_array = $json_all_pages_object->jsonDecodeToArray
    (".././user_configuration_files/application_pages.json");

$pages_array = array_values($pages_array);



$json_template_files_object = new JSON();

$template_files_array = $json_template_files_object->jsonDecodeToArray
    (".././user_configuration_files/template_files.json");



$json_concatenator_object = new JSON();

$array_concatenator = $json_concatenator_object->jsonDecodeToArray
    (".././user_configuration_files/javascript_and_css_concatenator_settings.json");

$array_concatenator = array_values($array_concatenator);



$json_user_require_files_autoload_object = new JSON();

$user_require_files_autoload_array = $json_user_require_files_autoload_object->jsonDecodeToArray
    (".././user_configuration_files/user_require_files_autoload.json");

$user_require_files_autoload_array = array_values($user_require_files_autoload_array);



$json_ajax_pages_object = new JSON();

$ajax_pages_array = $json_ajax_pages_object->jsonDecodeToArray
    (".././user_configuration_files/ajax_pages.json");