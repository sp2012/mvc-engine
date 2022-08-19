<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Solon Papageorgiou.
 * Date: 15/8/2013
 * Time: 9:05 μμ
 * It allows Aspect Oriented Programming.
 */



trait AspectOrientedProgramming
{

    protected $functions_before = array();

    protected $functions_before_args = array();


    protected $functions_after = array();

    protected $functions_after_args = array();

    /**
     * Set method to run before another method. You can pass arguments to the before method in a array.
     * @param $function
     * @param $function_to_add
     * @param array $args
     */
    public function setBefore($function, $function_to_add, array $args = array() )
    {

        $this->functions_before[$function] = $function_to_add;
        $this->functions_before_args[$function] = $args;

    }

    /**
     * Set method to run after another method. You can pass arguments to the after method in a array.
     * @param $function
     * @param $function_to_add
     * @param array $args
     */
    public function setAfter($function, $function_to_add, array $args = array())
    {

        $this->functions_after[$function] = $function_to_add;
        $this->functions_after_args[$function] = $args;

    }


    public function __call($name, $arguments)
    {

        // Call before method.
        if(array_key_exists($name, $this->functions_before))
        {

            $fun_before = $this->functions_before[$name];

            call_user_func_array([$this, $fun_before], $this->functions_before_args[$name]);
        }

        //Call actual method.

        call_user_func_array( [$this, "_" . $name], $arguments);

        // Call after method.
        if(array_key_exists($name, $this->functions_after))
        {

            $fun_after = $this->functions_after[$name];

            call_user_func_array([$this, $fun_after], $this->functions_after_args[$name]);
        }


    }


}