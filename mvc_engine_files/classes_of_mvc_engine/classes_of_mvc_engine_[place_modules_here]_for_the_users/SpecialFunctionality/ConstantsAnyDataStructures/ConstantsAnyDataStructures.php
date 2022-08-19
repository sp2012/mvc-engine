<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 24/8/2013
 * Time: 2:15 μμ
 * To change this template use File | Settings | File Templates.
 */

class ConstantsAnyDataStructures
{


    public function customConstant($con_name, $variable)
    {

        define($con_name,  serialize($variable));

    }


    public function retrieveCustomConstant($con_name)
    {

        return unserialize($con_name);

    }

}