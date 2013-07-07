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
        // Generic automatic sanitation.
        $this->automaticSanitation();
    }


    private function automaticSanitation()
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

        $_SERVER['REQUEST_URI'] = $this->sanitizeDataFromUserInput($_SERVER['REQUEST_URI']);

    }

    /*
     * Must run before session_start().
     */
    public function antiSessionHijackingPartA()
    {
        //This will tell PHP not to include the identifier in the URL, and not to read the URL for identifiers.
        ini_set('session.use_trans_sid', false);
        //Makes JavaScript to not have access to the cookies of the PHP Sessions.
        ini_set('session.cookie_httponly', true);
        //It prevents attacks passing session id in URL.
        ini_set('session.use_only_cookies', true);

    }

    /*
     * Must run after session_start();
     */
    public function antiSessionHijackingPartB()
    {

        // Using the user's IP.
        if(!isset($_SESSION['legit_user_ip']))
        {

            $_SESSION['legit_user_ip'] = $_SERVER['REMOTE_ADDR'];

        }

        if($_SESSION['legit_user_ip'] !== $_SERVER['REMOTE_ADDR'])
        {
            session_unset();
            session_destroy();
        }


        // Using the user's user agent (Browser, with its vendor and version).
        if(!isset($_SESSION['legit_user_agent']))
        {

            $_SESSION['legit_user_agent'] = $_SERVER['HTTP_USER_AGENT'];

        }

        if($_SESSION['legit_user_agent'] !== $_SERVER['HTTP_USER_AGENT'])
        {

            session_unset();
            session_destroy();

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