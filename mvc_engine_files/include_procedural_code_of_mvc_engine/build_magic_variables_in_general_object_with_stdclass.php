<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 12/7/2013
 * Time: 7:52 μμ
 * To change this template use File | Settings | File Templates.
 */

$pass_class = 'general_object->content_for_pages';

$create_remember_dynamically_added_variables_and_methods->addAndrememberNameOfDynamicallyAddedVar
    ($pass_class, $general_object->content_for_pages['javascript_path_url_to_path'], 'http://' . $website_settings_array[2] . '/', $general_object->content_for_pages);

$general_object->content_for_pages['object_log'] = $application_log_file_object;


$create_remember_dynamically_added_variables_and_methods->addAndrememberNameOfDynamicallyAddedVar
    ($pass_class, $general_object->content_for_pages['php_path_to_user_functions'], $website_settings_array[9] . '/', $general_object->content_for_pages);

        $create_remember_dynamically_added_variables_and_methods->addAndrememberNameOfDynamicallyAddedVar
    ($pass_class, $general_object->content_for_pages['php_path_to_user_include_php_files'], $website_settings_array[10] . '/', $general_object->content_for_pages);


$general_object->content_for_pages['object_redbean'] = $redbean_object;


$general_object->content_for_pages['object_phplivex'] = $phplivex_ajax_object;