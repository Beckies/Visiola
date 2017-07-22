<?php
extract($_POST);
//include "session_func.php";
$return_array = array();
$status = "invalid";
include "dbconnect.php";
	$query1="SELECT count(*) FROM user_table WHERE(email='$email' and password=md5('$passw'))";	
	$result = mysqli_query($db,$query1);
	if(!$result) {echo "could not execute query";
	die(mysqli_error($db));} 
	
	list($count)=mysqli_fetch_array($result);
	   
	if($count>0){ 
	//begin_session($uname);
	$status="valid";
	$return_array["status"] = $status;}
	else {$status = "invalid"; $return_array["status"] = $status;}
	echo json_encode($return_array);
	

?>
