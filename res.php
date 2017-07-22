<?php
include "dbconnect.php";
	echo "MOST VIEWED TEXTS";
	$writ = array();
	$i = 0;
	$query = "SELECT resource_id,view_count,resource_title FROM resources WHERE content_type = 'text' ORDER BY 'view_count' DESC LIMIT 5";
	$result = mysqli_query($db,$query);
	if(!$result) {echo "could not execute query";
	die(mysqli_error($db));}
	
	$numRows = mysqli_num_rows($result);
	while($row = mysqli_fetch_row($result))
	$writ[] = $row;
	while($i<$numRows){
		$id = $writ[$i][0];
		echo "<li type=\"disc\">";
		echo "<a href=\"view.php?id=$id\">";
		echo $writ[$i][2];
		echo "</a>"."              ".$writ[$i][1]." "."views";
		echo "</li> ";
		$i++;
	}
	
	
	
	
	
	//print_r($writ);
	die();
	
	for($i = 0; $row = mysqli_fetch_row($result); $i++){
		foreach($row as $key=>$value){
			for($j = 0; $j<$numRows; $j++)
				for($k = 0; $k<3; $k++)
					$writArr[$j][$k] =$value;
		}
	}
	print_r($writArr);

?>