<?php






function generateRandomCode($length){


    $user_class_object = new UserClass();

    return $user_class_object->generateRandomCode($length);

}



$general_object->content_for_pages['object_phplivex']->Ajaxify ("generateRandomCode");



$general_object->content_for_pages['object_phplivex']->Run(); // Must be called inside the 'body' tag



$ViewMain_object->output_page_show_all();





