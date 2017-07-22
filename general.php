
<?php 

extract($_POST);
echo "$mode"; die();
	include "dbconnect.php";
	$query = "SELECT description FROM notices WHERE status = 'General'";
	$result = mysqli_query($db,$query);
	if(!$result) { echo "could not execute query";
	die(mysqli_error($db)); }
	echo "<ul>";
	for( $counter = 0; $row = mysqli_fetch_row($result); $counter++ )
                 {
				  
				foreach ($row as $key => $value)
				    {	
					   echo "<li type=\"square\">$value</li>";
					   
					 }
				
				}	
	echo "</ul>"
	?>