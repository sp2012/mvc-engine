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


    private function htmlspecialchars_deep($mixed, $quote_style = ENT_QUOTES, $charset = 'UTF-8')
    {
        if (is_array($mixed)) {
            foreach($mixed as $key => $value) {
                $mixed[$key] = $this->htmlspecialchars_deep($value, $quote_style, $charset);
            }
        } elseif (is_string($mixed)) {
            $mixed = htmlspecialchars(htmlspecialchars_decode($mixed, $quote_style), $quote_style, $charset);
        }
        return $mixed;
    }

    public function sanitizeDataFromUserInput($user_input_data)
    {

        $this->user_input_data = $user_input_data;

        if(get_magic_quotes_gpc())
        {
            $this->user_input_data = stripslashes($this->user_input_data);
        }

        //Anti XSS.
        $this->user_input_data = strip_tags($this->user_input_data);

        //Anti SQL injection, replace with escape function for the database you use, like mysqli_real_escape for MySQL.
        $this->user_input_data = sqlite_escape_string($this->user_input_data);

        return $this->user_input_data;

    }

    public function sanitizeSystemDataForHTMLOutput($data_from_system)
    {

        $this->data_from_system = $data_from_system;

        $this->data_from_system = $this->htmlspecialchars_deep($this->data_from_system);

        return $this->data_from_system;

    }

}