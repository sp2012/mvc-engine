<?php

/*
MVC framework with templates, one controller, many models, many views, many triads per page, no third_party_code.

How to use the framework:

The views, models and controllers classes per page you declare in the configuration file,
are instantiated automatically as $NameOfClass_object. You can manually instantiate them for more
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

Extending the View classes from your View classes also get a property path_to_cached_files that can be accessed by your
View classes as $this->path_to_caching_files. This property is given to $this->displayTemplate.

$this->displayTemplate takes as arguments, data in a array, the template file, the caching file and true/false.
True means it will use caching, false it won't.

Your automatically instantiated View objects also acquire a property root_path that has the dynamically generated
path to root_user_files (your root that will be exposed online). This property should be called as $this->root_path;
from your templates when you include files like JavaScript scripts, css files or images; If you manually instantiate
your Views, you can add a property to your View objects e.g. ViewMain_object->root_path =$root_path to get the path
to root_user_files.

Your automatically instantiated View objects also acquire a property url_path_to_root that is generated from user
configured json file in the user_configuration_files. You can use this property in your templates
as $this->url_path_to_root to create links with anchor <a> html tag.

Your automatically instantiated View objects also has this->concatenated_javascript_file and
this->concatenated_css_file that have the paths and concatenated javascript files and concatenated css files
along with the version number in their filenames.

Template files are specified in the json configuration file. You give a name to the template and it's filename
without the extension (you should save your templates in the disk with .html extension). Then, your View
objects will have a property template_files_array which you can access from your View classes
as $this->template_files_array['name of template'];

Template file names can saved in properties in your View classes. If you have many template names you want
to use in many View classes, put them in a View parent class that will extend View. Then in your View classes
extend the View parent class you made.

In json user configuration file routes.json, pass a , + the name of the Models you want you View class to have or ALL
if you want your View class to get all Models for that triad.

In your templates you should always work with an array $array_data.

*/

require_once "../../../mvc_engine_files/mvc_engine.php";


run();

