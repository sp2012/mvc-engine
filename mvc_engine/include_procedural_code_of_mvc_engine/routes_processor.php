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

                        $dynamic_name_view = $component . "_object";

                        $reflection = new ReflectionClass($component);

                        $$dynamic_name_view = $reflection->newInstanceArgs($model_args);





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
