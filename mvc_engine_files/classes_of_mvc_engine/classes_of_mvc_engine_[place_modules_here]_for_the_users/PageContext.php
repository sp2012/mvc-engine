<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 11/8/2013
 * Time: 2:41 μμ
 * To change this template use File | Settings | File Templates.
 */

abstract class PageContext extends Controller {



    /**
     * I assign a value, usually an object to a key.
     * @param $key
     * @param $value
     * @throws Exception
     * @return nothing
     */
    public function set($key, $value) {

        $GLOBALS['context'][$key] = $value;
    }


    /**
     * It returns the variable, using the key.
     * @param $key
     * @return mixed (the variable)
     * @throws Exception
     */

    public function get($key) {
        if (!isset($GLOBALS['context'][$key])) {
            throw new Exception("There is no entry for key " . $key);
        }

        return $GLOBALS['context'][$key];
    }

}