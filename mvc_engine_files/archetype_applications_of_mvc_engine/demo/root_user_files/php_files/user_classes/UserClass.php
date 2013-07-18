<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 13/7/2013
 * Time: 11:26 μμ
 * To change this template use File | Settings | File Templates.
 */

class UserClass
{


    public function test()
    {

        echo "<h1>User Class used.</h1>";

    }


    public function generateRandomCode($length){
        $chars = array("1","2","3","4","5","6","a","b","c","d","e","f");
        $code = array_rand(array_flip($chars), $length);
        return implode($code);
    }

}