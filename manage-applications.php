<?php

Class Operations
{

    private $original_directory;

    private $destination_directory;

    private $project_name;

    public function __construct($project_name)
    {

       $this->original_directory = 'mvc_engine_files/archetype_applications_of_mvc_engine/demo/';

       $this->destination_directory = "user_applications/" . $project_name . "/";

       $this->project_name = $project_name;

    }

public function recurse_copy($src,$dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                $this->recurse_copy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}


public function delete_dir($dest) {
    $dir = opendir($dest);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($dest . '/' . $file) ) {
                $this->delete_dir($dest . '/' . $file);
            }
            else {
                unlink($dest . '/' . $file);
            }
        }
    }
    rmdir($dest);
    closedir($dir);
}

public function update()
{

    if($this->project_name === "demo")
    {

        echo "Update command will update the demo project.\n";

        $operation_result = $this->delete();

        if($operation_result === true)
        {
            $this->create();

        }
    }
    else
    {

        echo "Update command is only for the demo project. Try update then demo for this to work.\n";

    }

}

public function create()
{

    if($this->project_name != "")
    {

        if(!file_exists( $this->destination_directory))
        {

            echo "Attempting to create project. Directory does not exist.\n";
            echo "Proceeding to creating it.\n";

            $this->recurse_copy($this->original_directory, $this->destination_directory);

            echo "Done creating.\n";

            return true;
        }
        else
        {

            echo "Attempting to create project. Directory exists.\n";
            echo "Aborting.\n";

        }

    }
    else
    {

            echo "You have not given Project name, try again later.";

    }


}

public function delete()
{

    if($this->project_name != "")
    {


        if(file_exists($this->destination_directory))
        {

            echo "Attempting to delete project. Directory exists.\n";
            echo "Proceeding to deleting it.\n";

            $this->delete_dir($this->destination_directory);

            echo "Done deleting.\n";

            return true;
        }
        else
        {

            echo "Attempting to delete project. Directory does not exist.\n";
            echo "Aborting.\n";

        }


    }
    else

    {

        echo "You have not given Project name, try again later.";

    }


}

public function clearcache()
{

$cache_directory = "user_applications/" . $this->project_name . "/root_user_files/cached_files/";

    if(file_exists($cache_directory))
    {

        echo "Attempting to delete project. Directory exists.\n";
        echo "Proceeding to deleting it.\n";

        $files = glob($cache_directory . "*"); // get all file names
        foreach($files as $file){ // iterate files
            if(is_file($file))
                unlink($file); // delete file
        }

        echo "Done deleting cache files.\n";

        return true;
    }
    else
    {

        echo "Attempting to delete project. Directory does not exist.\n";
        echo "Aborting.\n";

    }


}


public function listoriginal($project_name)
{



    $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->original_directory));

    while($it->valid()) {

        if (!$it->isDot()) {

            echo 'SubPathName: ' . $it->getSubPathName() . "\n";
            echo 'SubPath:     ' . $it->getSubPath() . "\n";
            echo 'Key:         ' . $it->key() . "\n\n";
        }

        $it->next();
    }



}



}


function list_projects()
{

    echo "Your projects are:\n\n";

    $directory = 'user_applications/';
    $scanned_directory = array_diff(scandir($directory), array('..', '.'));

    foreach($scanned_directory as $item)
    {

        echo $item . "\n";

    }

    echo "\n";

}

function runUpdateDemo()
{

    $run_update_demo_object = new Operations("demo");

    $run_update_demo_object->update();

    exit();

}

if(defined('STDIN') )
{
    echo("\n");
    echo("Running from CLI.\n");
}
else
{
    echo("Not Running from CLI. This application is command line only.");
    exit();
}



$shortopts = "";
$shortopts .= "r:"; // Required value

$longopts = array(
    "run:", // Required value

);
$options = getopt($shortopts, $longopts);


//This is used as: php manage-applications.php -run "update-demo"

if(isset($options['r']))
{

    if(trim($options['r']) === "update-demo")
    {

        runUpdateDemo();

    }

}

if(isset($options['run']))
{

    if(trim($options['run']) === "update-demo")
    {
        runUpdateDemo();

    }

}





$commands_array = array("update", "create", "delete", 'clearcache', "listoriginal");

echo "--------------------------------------------------\n";
echo "Manage Applications v.1. Manage your Applications.\n";
echo "--------------------------------------------------\n\n";

list_projects();

echo "You will be asked to provide a command and then a project name. Available commands:\n";

echo("\n");

foreach($commands_array as $value)
{

    echo $value . "\n";

}

echo("\n");

echo "If you have the demo project in user_applications folder, you can enter update and then demo. This will update your project with changes in the original demo. Other than that update does nothing more.\n";

echo "Please enter provide a command: ";

$handle = fopen ("php://stdin","r");

$command = fgets($handle);

if(in_array(trim($command), $commands_array)){

    $command = trim($command);

    echo "\n";
    echo "Thank you, now please enter the project name(only a-z, A-Z and 0-9 are allowed, any other characters will be removed): ";

    $handle = fopen ("php://stdin","r");

    $project_name = fgets($handle);

    if(trim($project_name) !== ""){

        $project_name = trim($project_name);

        $project_name = preg_replace("/[^a-zA-Z0-9]+/", "", $project_name);

        echo "\n";
        echo "Thank you, your project name is: " . $project_name . "\n";
        echo "If you are satisfied with the name, enter yes: ";

        $handle = fopen ("php://stdin","r");

        $verification_command = fgets($handle);

        if(trim($verification_command) === "yes")
        {
            echo "\n";
            echo "Running your command...\n";


            $command_object = new Operations($project_name);

            $command_object->$command();
        }
        else
        {

            echo "OK. Please try again.\n";
            exit;

        }


    }
    else
    {

        echo "No project name is given. Please try again.\n";
        exit;

    }

}
else
{

    echo "This command does not exist. Perhaps you misspelled it. Please try again.\n";
    exit;

}
