<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 16/7/2013
 * Time: 9:13 μμ
 * To change this template use File | Settings | File Templates.
 */



/*
 * The following static method is a utility that allows to call other classes's non static methods.
It is a good replacement of static methods in the classes provided to the user.
*/

class MVC_ENGINE
{

    public static function Run($my_class_name, $my_method_name, array $parameters)
    {
        if(class_exists($my_class_name))
        {
            $my_object = new $my_class_name();

            if(method_exists($my_object, $my_method_name))
            {

                // No parameters.
                if(empty($parameters))
                {

                    return $my_object->$my_method_name();

                }
                // Variable number of parameters.
                else
                {

                    return call_user_func_array(array($my_object, $my_method_name), $parameters);

		        }


            }
        }
    }

}
