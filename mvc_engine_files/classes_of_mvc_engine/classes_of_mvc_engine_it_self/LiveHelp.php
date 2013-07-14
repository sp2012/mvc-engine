<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 12/7/2013
 * Time: 8:16 μμ
 * To change this template use File | Settings | File Templates.
 */

class LiveHelp
{

    public static $gather_variable_names_added_dynamically;

    public static $gather_variable_names_added_dynamically_second_array;

    public static $gather_method_name_added_dynamically;

    public static $gather_triads_MVC;

    public static $gather_variable_names_added_dynamically_third_array;


    public function __construct()
    {

        self::$gather_method_name_added_dynamically[] = array();

        self::$gather_variable_names_added_dynamically_second_array[] = array();

        self::$gather_variable_names_added_dynamically = array();

        self::$gather_triads_MVC = array( array() );

        self::$gather_variable_names_added_dynamically_third_array = array();



    }


}