<?php

/*
MVC framework with templates, one controller, many models, many views, many triads per page, no third_party_code.

How to use the framework:

The views, models and controllers classes per page you declare in the configuration file,
are instantiated automatically as $NameOfClass_object. You can manually instantiate them for a second or more
times if you want.

The URL parameters are automatically instantiated as $get_var_0, $get_var_1 etc. They are also saved
in $get_variables['get_var'] array, so you can use them as $get_variables['get_var'][0],
$get_variables['get_var'][1] etc. Finally, they are also saved in $get_variables_object->get_var array
and you can use them as $get_variables_object->get_var[0], $get_variables_object->get_var[1] etc.
You can use any of the three variable formats.

To develop with this framework, you will need to alter the json files in folder user_configuration
and then to write your Model, View, and controller classes, your templates (also, your classes and functions
- by default, in php_files/classes and php_files/functions) and your pages
in the folder php_files/include_procedural_code.

Classes are automatically called when you instantiate them. The parent classes you extend from
are also included automatically.

Pages you write are also automatically included.

Your View classes should extend View class that has the path to the templates to get the variable:
$this->path_to_templates that you should use in your View classes for requiring the template files.
If you need to add more template paths to be available to View classes you have to put then in View.php and extend
it from your View classes.

Your automatically instantiated View objects also acquire a property root_path that has the dynamically generated
path to root_user_files (your root that will be exposed online). This property should be called as $this->root_path;
from your templates when you include files like JavaScript scripts, css files or images; If you manually instantiate
your Views, you can add a property to your View objects e.g. ViewMain_object->root_path =$root_path to get the path
to root_user_files.

Template file names should be saved in properties in your View classes. If you have many template names you want
to use in many View classes, put them in a View parent class that will extend View. Then in your View classes
extend the View parent class you made.

*/

require_once "../mvc_engine/mvc_framework.php";


run();

