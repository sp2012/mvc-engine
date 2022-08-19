<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 8/7/2013
 * Time: 11:59 μμ
 * To change this template use File | Settings | File Templates.
 */

final class Template
{

    private $vars  = array();

    public $template_vars;

    public function __construct(TemplateVars $template_vars)
    {

        $this->template_vars = $template_vars;

        

    }


    public function __get($name) {
        return $this->vars[$name];
    }

    public function __set($name, $value) {
        if($name == 'template') {
            throw new Exception("Cannot bind variable named 'template'");
        }

        $this->vars[$name] = $value;
    }






    public function renderTemplate($template, $cache_file_name, $enable_caching)
    {
        if($cache_file_name === false) { $enable_caching = false; }


        return $this->cache(
            $template,
            $this->template_vars->path_to_cached_files . $cache_file_name, $enable_caching);



    }


    private function cache($template, $path_name_of_cache_file, $enable_caching)
    {
        if(array_key_exists('template', $this->vars)) {
            throw new Exception("Cannot bind variable called 'template'");
        }

        extract($this->vars);
        ob_start();

        $cached_file = $path_name_of_cache_file . ".cache";


        if($enable_caching === true)
        {


            if (file_exists($cached_file)) {
                $file_contents = file_get_contents($cached_file);
                ob_end_clean();
                return $file_contents;
            }
            $temp_file = tempnam("temporary_files/", $cached_file);
            $fp_temp = fopen($temp_file, "w");
            ob_start();


            require($template . ".html");


            if ($fp_temp) {
                $buffered_contents = ob_get_contents();
                fwrite($fp_temp, $buffered_contents);
                fclose($fp_temp);
                rename($temp_file, $cached_file);
            }
            ob_end_clean();
            echo $buffered_contents;



        }
        else
        {

            require($template . ".html");

        }

        return ob_get_clean();

    }

}