<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 1:22 πμ
 * To change this template use File | Settings | File Templates.
 */

class Security
{
    private $user_input_data;

    private $data_from_system;


    public function __construct()
    {

        foreach($_POST as $key => $value)
        {

            $_POST[$key] = $this->sanitizeDataFromUserInput($value);

        }

        foreach($_GET as $key => $value)
        {

            $_GET[$key] = $this->sanitizeDataFromUserInput($value);

        }

        foreach($_COOKIE as $key => $value)
        {

            $_COOKIE[$key] = $this->sanitizeDataFromUserInput($value);

        }

    }

    private static function htmlspecialchars_deep($mixed, $quote_style = ENT_QUOTES, $charset = 'UTF-8')
    {
        if (is_array($mixed)) {
            foreach($mixed as $key => $value) {
                $mixed[$key] = self::htmlspecialchars_deep($value, $quote_style, $charset);
            }
        } elseif (is_string($mixed)) {
            $mixed = htmlspecialchars(htmlspecialchars_decode($mixed, $quote_style), $quote_style, $charset);
        }
        return $mixed;
    }

    private static function escapeStringForInputInDatabase($string)
    {

        return $string;

    }

    public static function sanitizeDataFromUserInput($user_input_data)
    {

        if(get_magic_quotes_gpc())
        {
            $user_input_data = stripslashes($user_input_data);
        }

        //Anti XSS.
        $user_input_data = strip_tags($user_input_data);

        //Anti SQL injection, replace with escape function for the database you use, like mysqli_real_escape for MySQL.
        $user_input_data = self::escapeStringForInputInDatabase($user_input_data);

        return $user_input_data;

    }

    public static function sanitizeSystemDataForHTMLOutput($data_from_system)
    {

        $data_from_system = self::htmlspecialchars_deep($data_from_system);

        return $data_from_system;

    }


}