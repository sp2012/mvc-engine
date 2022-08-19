<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 24/8/2013
 * Time: 2:15 μμ
 * To change this template use File | Settings | File Templates.
 */

namespace SpecialFunctionality\ConstantsAnyDataStructures
{

final class ConstantsAnyDataStructures
{

    /**
     * Create a constant with any variable, e.g. array, object etc.
     * @param $con_name
     * @param $variable
     */
    public function customConstant($con_name, $variable)
    {

        define($con_name,  serialize($variable));

    }


    /**
     * Retrieve constant with any variable, e.g. array, object etc.
     * @param $con_name
     * @return mixed
     */

    public function retrieveCustomConstant($con_name)
    {

        return unserialize($con_name);

    }

}

}