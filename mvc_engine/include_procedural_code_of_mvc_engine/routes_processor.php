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

                        $dynamic_name_view = $component . "_object";

                        $reflection = new ReflectionClass($component);

                        $$dynamic_name_view = $reflection->newInstanceArgs($models_args_view );

                        $$dynamic_name_view->root_path = $root_path;

                        $$dynamic_name_view->url_path_to_root = "http://" . $url_path_to_root[0];



                    }

                }

                if($key === "controller")
                {

                    $dynamic_name_controller = $components . "_object";

                    $reflection = new ReflectionClass($components);

                    $$dynamic_name_controller = $reflection->newInstanceArgs($model_args);


                }
            }
        }
    }
}
