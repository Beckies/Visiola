<?php
include "dbconnect.php";
extract($_POST);
$status = "invalid";
$return_array = array();
$access = "normal";
$name = "$lastname $firstname";
$query = "INSERT INTO `virtual_library`.`user_table` (`email`, `password`, `name`, `matric_no`, `Access`) VALUES ('$email', md5('$password'), '$name', '$matric', '$access')";
$result = mysqli_query($db,$query);
if(!$result) {$status = "invalid";
die(mysqli_error($db));}
else {$status = "valid";}
$return_array["status"] = $status;
echo json_encode($return_array);
?>