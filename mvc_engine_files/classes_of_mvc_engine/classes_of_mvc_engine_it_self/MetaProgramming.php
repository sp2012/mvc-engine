<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 8/7/2013
 * Time: 9:24 μμ
 * To change this template use File | Settings | File Templates.
 */

class MetaProgramming {

 public $test;

  public function __construct()
  {

        $this->test = "testing";



}

    public function get_func_argNames($funcName) {
        $f = new ReflectionFunction($funcName);
        $result = array();
        foreach ($f->getParameters() as $param) {
            $result[] = $param->name;
        }
        return $result;
    }


    public function runCode($string_with_code)
    {

        eval($string_with_code);

    }


    public function addAndrememberNameOfDynamicallyAddedVar($class,  &$var, $value, $scope=false, $prefix='UNIQUE', $suffix='VARIABLE' ){
        if($scope) {
            $vals = $scope;
        } else {
            $vals = $GLOBALS;
        }
        $old = $var;
        $var = $new = $prefix.rand().$suffix;
        $vname = FALSE;
        foreach($vals as $key => $val) {
            if($val === $new) $vname = $key;
        }
        $var = $old;

        //Store the value.
        $var = $value;




        if(LiveHelp::$gather_variable_names_added_dynamically === null OR
            !in_array($vname, LiveHelp::$gather_variable_names_added_dynamically)
            )
        {


            if(isset($class))
            {
                if($class === 'general_object->content_for_pages')
                {

                    $class = $class . "[" . "'" . $vname . "'" . "] ";

                    LiveHelp::$gather_variable_names_added_dynamically_second_array[$class] = $value;  ;
                }

                else if($class === 'template_vars')
                {

                    $class =  "template->" . $class . "->" . $vname;

                    LiveHelp::$gather_variable_names_added_dynamically_third_array[$class] = $value;  ;
                }

                else
                {
                    $class =   ucfirst($class) . "->" . $vname;

                    LiveHelp::$gather_variable_names_added_dynamically[$class] = $value;

                }
            }

        }

        return $vname;
    }


    public function addAndrememberNameOfDynamicallyAddedMethod($class, &$var, $method_name, $function)
    {

        $var->attach($method_name, function ($model, $variable, $value ) { $this->$model->$variable = $value; });


        $parameters = "";

        foreach($this->get_func_argNames($function) as $parameter)
        {

            $parameters .= '$' . $parameter . "|";

        }

        $parameters = substr_replace($parameters,"",-1);

        if(isset($class))
        {

          $class =  ucfirst($class) . "->";

        }


        LiveHelp::$gather_method_name_added_dynamically[] = $class . $method_name . "(" . $parameters . ")";

    }



    public function createRememberClass($class_name, $triad_index)
    {

        LiveHelp::$gather_triads_MVC[$triad_index][] = $class_name . "_object";


        return new $class_name;

    }


    public function reflectionCreateRememberClass($class_name, $triad_index)
    {

        LiveHelp::$gather_triads_MVC[$triad_index][] = $class_name . "_object";


        return new ReflectionClass($class_name);

    }


    public function showPublicMethodsOnlyAndTheirArgs($classname)
    {
//Show public methods only and their parameters of Classes available to the user.
//Put the snippet under the code where you show Classes available to the user:


        $reflection = new ReflectionClass($classname);

        $public_methods_and_their_args = "";


        foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method)
        {

            $public_methods_and_their_args .= "" . $method . "<br/> ";


        }


        return $public_methods_and_their_args;

    }





}

