<?php
$request = trim(strtolower($_REQUEST['email']));
//sleep(2);
//usleep(150000);

$users = array();
include "dbconnect.php";
$query= "select email from user_table";
$result = mysqli_query($db,$query);
	if(!$result) {echo "could not execute query";
	die(mysqli_error($db));}
for( $counter = 0; $row = mysqli_fetch_row($result); $counter++ )
                 {
				  
				foreach ($row as $key => $value)
				    {	
					   $users[] = $value;
					   
					 }
				
				}	

//$users = array('asdf', 'Peter', 'Peter2', 'George');
$valid = 'true';
foreach($users as $user) {
	if( strtolower($user) == $request )
		$valid = 'false';
}
echo $valid;
?>