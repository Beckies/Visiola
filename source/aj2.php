<?php

extract($_POST);
$email_check = '';
$return_arr = array();
 

    $email_check = 'valid';
 
 
$return_arr["email_check"] = $email_check;
$return_arr["name"] = $name_ajax;
$return_arr["email"] = $email_ajax;


 
 
echo json_encode($return_arr);


?>