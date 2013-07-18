<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 5/7/2013
 * Time: 8:42 μμ
 * To change this template use File | Settings | File Templates.
 */

$ViewDB2_object->output_isolated();



/* Working with Redbean ORM. */

//Ready. Now insert a bean!
$bean = $general_object->content_for_pages['object_redbean']->dispense('leaflet');
$bean->title = 'Hello World from redbean ORM. Redbean allow pure ORM queries, pure SQL queries or a mix of the two. Using the object model.';

//Store the bean
$id = $general_object->content_for_pages['object_redbean']->store($bean);

//Reload the bean
$leaflet = $general_object->content_for_pages['object_redbean']->load('leaflet',$id);

//Display the title
echo "<p>" . $leaflet->title . "</p>";


//Ready. Now insert a bean!
$bean = R::dispense('leaflet2');
$bean->title2 = 'Hello World from redbean ORM. Redbean allow pure ORM queries, pure SQL queries or a mix of the two. Using the static calls.';

//Store the bean
$id = R::store($bean);

//Reload the bean
$leaflet = R::load('leaflet2',$id);

//Display the title
echo "<p>" . $leaflet->title2 . "</p>";


echo "<p>" . MVC_ENGINE::Run('Security', 'sanitizeSystemDataForHTMLOutput', array ("Testing Global Static call invoker, Security module sanitize this: <br/>") ) . "</p>";

