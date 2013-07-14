<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 8:19 μμ
 * To change this template use File | Settings | File Templates.
 */

$routes = array();

$json_triads_object = new JSON();

$routes =$json_triads_object->jsonDecodeToArray(".././user_configuration_files/routes.json");


foreach($routes as $page => $triads)
{

    if($page === $page_selected)
    {


        $dynamic_name_template_vars = "template_vars_object";

        $$dynamic_name_template_vars = new TemplateVars();

        $create_remember_dynamically_added_variables_and_methods->addAndrememberNameOfDynamicallyAddedVar
            ($dynamic_name_template_vars, $$dynamic_name_template_vars->root_path, $root_path, $$dynamic_name_template_vars);


        $create_remember_dynamically_added_variables_and_methods->addAndrememberNameOfDynamicallyAddedVar
            ($dynamic_name_template_vars,$$dynamic_name_template_vars->url_path_to_root, "http://" . $website_settings_array[2] . "/",
                $$dynamic_name_template_vars);



        $create_remember_dynamically_added_variables_and_methods->addAndrememberNameOfDynamicallyAddedVar
            ($dynamic_name_template_vars,
                $$dynamic_name_template_vars->concatenated_javascript_file,
                $array_concatenator[2] . "/" . "all-v." . $array_concatenator[0] . ".js",
                $$dynamic_name_template_vars);


        $create_remember_dynamically_added_variables_and_methods->addAndrememberNameOfDynamicallyAddedVar
            ($dynamic_name_template_vars,
                $$dynamic_name_template_vars->concatenated_css_file,
                $array_concatenator[4] . "/" . "all-v." . $array_concatenator[0] . ".css",
                $$dynamic_name_template_vars);


        $create_remember_dynamically_added_variables_and_methods->addAndrememberNameOfDynamicallyAddedVar
            ($dynamic_name_template_vars, $$dynamic_name_template_vars->path_to_cached_files, "cached_files/", $$dynamic_name_template_vars);


        $dynamic_name_template = "template_object";

        $$dynamic_name_template = new Template($$dynamic_name_template_vars);


        $triad_index = 0;
        foreach($triads as $triad)
        {

            foreach($triad as $key => $components)
            {
                if($key === "model")
                {
                    $model_args = array();

                    foreach($components as $component)
                    {

                        $dynamic_name_model = $component . "_object";

                        LiveHelp::$gather_triads_MVC[$triad_index][] = $dynamic_name_model;

                        $$dynamic_name_model = new $component;

                        $model_args[] = $$dynamic_name_model;




                    }

                }

                if($key === "view")
                {



                    foreach($components as $component)
                    {

                        $model_args_chosen = array();

                        $models_args_view = $model_args;

                        $modifier = explode(",", $component);

                        $component = $modifier[0];

                        // ALL is enables, View class will get all Models.
                        if(in_array("ALL", $modifier))
                        {
                            $model_args_chosen = $models_args_view;
                        }

                        // not ALL enabled, View will only get certain models.
                        $id = 0;
                        if(!in_array("ALL", $modifier))
                        {
                            foreach($modifier as $modifier_model_name)
                            {
                                if($id > 0)
                                {

                                    foreach($model_args as $model_arg)
                                    {

                                        if($modifier_model_name === get_class($model_arg))
                                        {
                                            $model_args_chosen[] = $model_arg;

                                        }

                                    }
                                }

                                $id++;

                            }


                        }

                        $models_args_view  = $model_args_chosen;

                        $models_args_view[] = $$dynamic_name_template;

                        $dynamic_name_view = $component . "_object";

                        LiveHelp::$gather_triads_MVC[$triad_index][] = $dynamic_name_view;

                        $reflection = new ReflectionClass($component);

                        $$dynamic_name_view = $reflection->newInstanceArgs($models_args_view );



                        $create_remember_dynamically_added_variables_and_methods->addAndrememberNameOfDynamicallyAddedVar
                            ($dynamic_name_view, $$dynamic_name_view->template_files_array, $template_files_array, $$dynamic_name_view);


                        $create_remember_dynamically_added_variables_and_methods->addAndrememberNameOfDynamicallyAddedVar
                            ($dynamic_name_view, $$dynamic_name_view->path_to_templates, "template_files/",$$dynamic_name_view);




                    }

                }

                if($key === "controller")
                {

                    $dynamic_name_controller = $components . "_object";

                    LiveHelp::$gather_triads_MVC[$triad_index][] = $dynamic_name_controller;

                    $reflection = new ReflectionClass($components);

                    $$dynamic_name_controller = $reflection->newInstanceArgs($model_args);



                    $$dynamic_name_controller = new MethodAdder($$dynamic_name_controller);


                    $create_remember_dynamically_added_variables_and_methods->addAndrememberNameOfDynamicallyAddedMethod
                    ($dynamic_name_controller, $$dynamic_name_controller, 'update', function ($model, $variable, $value ) { $this->$model->$variable = $value; });




                }
            }

            $triad_index++;
        }

        require "../../../mvc_engine_files/include_procedural_code_of_mvc_engine/live_help.php";


    }
}

