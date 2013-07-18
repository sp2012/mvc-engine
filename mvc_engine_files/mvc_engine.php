<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 9:33 μμ
 * To change this template use File | Settings | File Templates.
 */

function run()
{

    $website_settings_array = json_decode(file_get_contents('.././user_configuration_files/website_settings.json'), true);

    $website_settings_array = array_values($website_settings_array );


    if($website_settings_array[4] != false)
    {

        ini_set("zlib.output_compression", "On");

    }

    // Report all PHP errors (see changelog)
        if($website_settings_array[3] == false)
        {

        ini_set('display_errors', 'Off');
        error_reporting(0);

    }
    else
    {
        ini_set('display_errors', 'Off');
        error_reporting(0);

        function shutdown_error_handler() {

            if (null !== $error = error_get_last())
            {
                echo "<div style='background-color: white;color:red;border: solid 1;'>" .
                ($error['message'] . $error['type'] . $error['file'] . $error['line'])
                . "</div>";
            }

        }

        register_shutdown_function('shutdown_error_handler');

        function alert_errors($errno, $errstr, $errfile, $errline){

            $errorType = array (
                E_ERROR                            => 'ERROR',
                E_CORE_ERROR           => 'CORE ERROR',
                E_COMPILE_ERROR        => 'COMPILE ERROR',
                E_USER_ERROR           => 'USER ERROR',
                E_RECOVERABLE_ERROR  => 'RECOVERABLE ERROR',
                E_WARNING              => 'WARNING',
                E_CORE_WARNING         => 'CORE WARNING',
                E_COMPILE_WARNING      => 'COMPILE WARNING',
                E_USER_WARNING         => 'USER WARNING',
                E_NOTICE               => 'NOTICE',
                E_USER_NOTICE          => 'USER NOTICE',
                E_DEPRECATED                   => 'DEPRECATED',
                E_USER_DEPRECATED      => 'USER_DEPRECATED',
                E_PARSE                => 'PARSING ERROR'
            );

            if (array_key_exists($errno, $errorType)) {
                $errname = $errorType[$errno];
            } else {
                $errname = 'UNKNOWN ERROR';
            }
            ob_start();?>
            <div style='background-color: white;color:red;border: solid 1;'>
                <p>
                    <strong><?php echo $errname; ?> Error: [<?php echo $errno; ?>] </strong><?php echo $errstr; ?><strong> <?php echo $errfile; ?></strong> on line <strong><?php echo $errline; ?></strong>
                <p/>
            </div>
            <?php
            echo ob_get_clean();
        }

        set_error_handler("alert_errors", E_ERROR ^ E_CORE_ERROR ^ E_COMPILE_ERROR ^ E_USER_ERROR ^ E_RECOVERABLE_ERROR ^  E_WARNING ^  E_CORE_WARNING ^ E_COMPILE_WARNING ^ E_USER_WARNING ^ E_NOTICE ^  E_USER_NOTICE ^ E_DEPRECATED    ^  E_USER_DEPRECATED    ^  E_PARSE );
    }

    //General object for the user. It will hold utility library onjects and PHP/JavaScript paths directly available to the pages.

    $general_object = new stdClass();

    //Logging support with PEAR Log.
    require_once "third_party_libraries_of_mvc_engine/Log-1.12.7/Log.php";

    $application_log_file = '../user_log_files/' . $website_settings_array[5] . '.log';

    $application_log_file_object = Log::factory('file', $application_log_file , 'MAIN');


    require_once('third_party_libraries_of_mvc_engine/geshi/geshi.php');


    require_once('third_party_libraries_of_mvc_engine/RedBeanPHP3_4_7/rb.php');

    R::setup('sqlite:../serverless_databases/website.sqlitedb'); // -- for other systems
    $toolbox = R::$toolbox;
    $redbean_object = $toolbox->getRedBean();





    require "../../../mvc_engine_files/functions_of_mvc_engine/autoload.php";

    require "../../../mvc_engine_files/include_procedural_code_of_mvc_engine/configuration_processor.php";



    require "../../../mvc_engine_files/include_procedural_code_of_mvc_engine/URL_processor.php";

    require "../../../mvc_engine_files/include_procedural_code_of_mvc_engine/build_root_path_var.php";


    require_once('third_party_libraries_of_mvc_engine/PHPLiveX-2.6-tr/PHPLiveX.php');

    $phplivex_ajax_object = new PHPLiveX();

    // Metaprogramming object.
    $create_remember_dynamically_added_variables_and_methods  = new MetaProgramming();

    require "../../../mvc_engine_files/include_procedural_code_of_mvc_engine/build_magic_variables_in_general_object_with_stdclass.php";


    //For JavaScript files.
    ConcatenatorOfJavaScriptAndCSSFiles::combine($array_concatenator[1],
        $array_concatenator[2] . "/" . "all-v." . $array_concatenator[0] . ".js");

    //For CSS files.
     ConcatenatorOfJavaScriptAndCSSFiles::combine($array_concatenator[3],
         $array_concatenator[4] . "/" . "all-v." . $array_concatenator[0] . ".css");


    if(isset($get_variables_object->get_var[0]) AND $get_variables_object->get_var[0] !== "")
    {

        $security_object = new Security;

        $security_object->antiSessionHijackingPartA();


        $sessions_object = new Sessions;


        $security_object->antiSessionHijackingPartB();



        $headers_object = new Headers();


        $page_selected = $get_variables_object->get_var[0];


        require "../../../mvc_engine_files/include_procedural_code_of_mvc_engine/routes_processor.php";


        require "../../../mvc_engine_files/include_procedural_code_of_mvc_engine/set_pages.php";


    }

    else
    {

        header("Location: {$website_settings_array[0]}");
        exit();

    }




}