
<?php
include "utility_funcs.php";





include "dbconnect.php";
	$query = "SELECT resource_id FROM  personal_table WHERE user_id  = '1'";
	$result = mysqli_query($db,$query);
	$count = mysqli_num_rows($result);
	
	while(list($rid) = mysqli_fetch_array($result)){
		if(getContentType($rid) == "text"){
			$tit = getResourceTitle($rid);
			echo "
			<table width=\"522\">
			  <tr>
				<td width=\"451\">$tit</td>
				<td width=\"29\"><a id = \"share\" title = \"$rid\">share</a></td>
				<td width=\"26\"><a id = \"del\" title = \"$rid\">share</a></td>
			  </tr>
			</table>
			";
		}
	}
	   ?> 