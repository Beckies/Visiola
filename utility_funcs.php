<?php
extract($_POST);
$userof = "1";
switch ($mode) {
    case "gen":
        getGeneralNotices();
        break;
	case "adm":
		getAdminNotices();
		break;
		case "genAd":
        getGeneralNoticesAd();
        break;
	case "admAd":
		getAdminNoticesAd();
		break;
	case "resInfT":
		mostWrit();
		break;
	case "resInfV":
		mostViewed();
		break;
	case "resInfA":
		mostHeard();
		break;	
	case "getCat":
		getCat();
		break;	
	case "getSubCat":
		getSubCat($cat);
		break;
	case "stuffText":
		myText($userof);
		break;
	case "stuffAudio":
		myAudio($userof);
		break;	
	case "stuffVideo":
		myVideo($userof);
		break;	
				
		
  } 




function getGeneralNotices(){

	include "dbconnect.php";
	$query = "SELECT description FROM notices WHERE status = 'General'";
	$result = mysqli_query($db,$query);
	$count = mysqli_num_rows($result);
	if($count = 0) {echo "No notices!"; die();}
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
	echo "</ul>";
}

function getGeneralNoticesAd(){

	include "dbconnect.php";
	$query = "SELECT description FROM notices WHERE status = 'General'";
	$result = mysqli_query($db,$query);
	$count = mysqli_num_rows($result);
	if($count = 0) {echo "No notices!"; die();}
	if(!$result) { echo "could not execute query";
	die(mysqli_error($db)); }
	echo "<ul>";
	for( $counter = 0; $row = mysqli_fetch_row($result); $counter++ )
                 {
				  
				foreach ($row as $key => $value)
				    {	
					   echo "<li type=\"square\">$value</li>&nbsp;&nbsp; <a><img src=\"img/unchecked.gif\" alt=\"DELETE\" /></a>";
					   
					 }
				
				}	
	echo "</ul>";
}



function getAdminNotices() {
	
	include "dbconnect.php";
	$query = "SELECT description FROM notices WHERE(status = 'Admin' and desc_status = 'Post')";
	$result = mysqli_query($db,$query);
	$count = mysqli_num_rows($result);
	if($count == 0) {echo "No notices!"; die();}
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
	echo "</ul>";
}


function getAdminNoticesAd() {
	
	include "dbconnect.php";
	$query = "SELECT notice_id,description,resource_id,filename,previous_location,present_location FROM notices WHERE(status = 'Admin')";
	$result = mysqli_query($db,$query);
	$count = mysqli_num_rows($result);
	if($count == 0) {echo "No notices!"; die();}
	if(!$result) { echo "could not execute query";
	die(mysqli_error($db)); }
	echo "<ul>";
	while(list($nid,$desc,$id,$fle,$prev,$pres)=mysqli_fetch_array($result)){
		$text = getStatus($nid);
		if($text == "POST")$text = "REMOVE";
		else $text = "POST";
		echo "<li>The resource ".getResourceTitle($id)." has been moved from $prev to $pres  <a>$text</a></li>";
	}
	echo "</ul>";
}

function getStatus($nid){
	$host = "localhost";
	$user = "root";
	$pass = "lookout4detox";
	$dbname = "virtual_library";

	$db=mysqli_connect($host, $user, $pass) or die("Could not connect to database server");
	mysqli_select_db($db,$dbname) or die ("Could not connect to database name");
	$query = "SELECT desc_status FROM  notices WHERE notice_id  = '$nid'";
	$result = mysqli_query($db,$query);
	list($stat) = mysqli_fetch_array($result);
	return $stat;
}


function login(){
	include "dbconnect.php";
	$userisadmin = false;
	$query = "SELECT count(*) FROM user_table WHERE(email ='$email' AND password = md5('$pass'))";
	$result = mysqli_query($db,$query);
	if(!$result) {echo "could not execute query";
	die(mysqli_error($db)); }
	list($count)=mysqli_fetch_array($result);
		if($count>0)
	{
		$query2="SELECT Access FROM user_table WHERE email='$email'";
		$result2 = mysqli_query($db,$query2);
		if(!$result2) {echo "could not execute query";
		die(mysqli_error($db));}
	
		list($access)=mysqli_fetch_array($result2);
		if($access=="privileged")
		{
			$userisadmin=true;
			begin_session($uname,$userisadmin);
			header("Location: home.php");
		}else if($access=="normal"){
			begin_session($uname,$userisadmin);
			header("Location: home.php");
			}
	
	}else return "invalid";
}	

function mostWrit() {
	$host = "localhost";
	$user = "root";
	$pass = "lookout4detox";
	$dbname = "virtual_library";

	$db=mysqli_connect($host, $user, $pass) or die("Could not connect to database server");
	mysqli_select_db($db,$dbname) or die ("Could not connect to database name");

	$writ = array();
	$i = 0;
	$query = "SELECT resource_id,view_count,resource_title FROM resources WHERE content_type = 'text' ORDER BY 'view_count' DESC LIMIT 5";
	$result = mysqli_query($db,$query);
	if(!$result) {echo "could not execute query";
	die(mysqli_error($db));}
	
	$numRows = mysqli_num_rows($result);
	if($numRows==0){ echo "Nothing to display"; return;}
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
	echo "<br />";
}

function mostViewed() {
	$host = "localhost";
	$user = "root";
	$pass = "lookout4detox";
	$dbname = "virtual_library";

	$db=mysqli_connect($host, $user, $pass) or die("Could not connect to database server");
	mysqli_select_db($db,$dbname) or die ("Could not connect to database name");

	$writ = array();
	$i = 0;
	$query = "SELECT resource_id,view_count,resource_title FROM resources WHERE content_type = 'video' ORDER BY 'view_count' DESC LIMIT 5";
	$result = mysqli_query($db,$query);
	if(!$result) {echo "could not execute query";
	die(mysqli_error($db));}
	
	$numRows = mysqli_num_rows($result);
	if($numRows==0){ echo "<li type=\"square\">No video to display</li><br/>"; return;}
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
	echo "<br />";
}

function mostHeard() {
	$host = "localhost";
	$user = "root";
	$pass = "lookout4detox";
	$dbname = "virtual_library";

	$db=mysqli_connect($host, $user, $pass) or die("Could not connect to database server");
	mysqli_select_db($db,$dbname) or die ("Could not connect to database name");

	$writ = array();
	$i = 0;
	$query = "SELECT resource_id,view_count,resource_title FROM resources WHERE content_type = 'audio' ORDER BY 'view_count' DESC LIMIT 5";
	$result = mysqli_query($db,$query);
	if(!$result) {echo "could not execute query";
	die(mysqli_error($db));}
	
	$numRows = mysqli_num_rows($result);
	if($numRows==0){ echo "<li type=\"square\">No audio to display</li><br/>"; return;}
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
	echo "<br />";
}

function MyStuff(){
	$MyAud = array();
	$MyVid = array();
	$MyWrit = array();
	$query = "SELECT ressource_id WHERE email = '$email'";
	$result = mysqli_query($db,$query);
	if(!$result) { echo "could not execute query";
	die(mysqli_error($db)); }
	for($i = 0; $row = mysqli_fetch_row($result); $i++){
			foreach($row as $key=>$value){
				if(getConTyp($value) == 'Video')
				$MyVid[] = $value;
				elseif(getConTyp($value) == 'Audio')
				$MyAud[] = $value;
				else $MyWrit[] = $value;
			}
	}
	$MyStuff = array($MyWrit,$MyAud,$MyVid);
	return $MyStuff;
}

function clearAdmNotc($email){
	include "dbconnect.php";
	$query = "DELETE FROM notices WHERE status = 'Admin'";
	$result = mysqli_query($db,$query);
	if(!$result) {echo "could not execute query";
	die(mysqli_error($db)); }
}


function extract_common_words($string, $max_count = 15) {
	 $stop_words = file('stop_words.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      $string = preg_replace('/ss+/i', '', $string);
      $string = trim($string); // trim the string
      $string = preg_replace('/[^a-zA-Z -]/', '', $string); // only take alphabet characters, but keep the spaces and dashes too…
      $string = strtolower($string); // make it lowercase

      preg_match_all('/\b.*?\b/i', $string, $match_words);
      $match_words = $match_words[0];

      foreach ( $match_words as $key => $item ) {
          if ( $item == '' || in_array(strtolower($item), $stop_words) || strlen($item) <= 3 ) {
              unset($match_words[$key]);
          }
      }  

      $word_count = str_word_count( implode(" ", $match_words) , 1); 
      $frequency = array_count_values($word_count);
      arsort($frequency);

        $keywords = array_slice($frequency, 0, $max_count);
		$fin = array();
		$auto = extract_common_words( $nghtMre, $stop_words);
		foreach($auto as $key=>$value)
		$fin[] = $key;
		$finn = implode(',',$fin);
		return $finn;
		  
}


function getCat(){

	include "dbconnect.php";
	$query = "SELECT category_name FROM category WHERE parent = '0'";
	$result = mysqli_query($db,$query);
	$count = mysqli_num_rows($result);
	if($count = 0) {echo "No notices!"; die();}
	if(!$result) { echo "could not execute query";
	die(mysqli_error($db)); }
	echo "<ul>";
	for( $counter = 0; $row = mysqli_fetch_row($result); $counter++ )
                 {
				  
				foreach ($row as $key => $value)
				    {	
					   echo "<li id=\"categ\" type=\"square\">$value</li>";
					   
					 }
				
				}	
	echo "</ul>";
}

function getSubCat($cat){
	
	//echo "$cat"; die();

	include "dbconnect.php";
	$query = "SELECT category_id FROM category WHERE category_name = '$cat'";
	$result = mysqli_query($db,$query);
	list($id) = mysqli_fetch_array($result);
	
	$query1 = "SELECT category_name FROM category WHERE parent = '$id'";
	$result1 = mysqli_query($db,$query1);
	$count = mysqli_num_rows($result1);
	if($count = 0) {echo "No notices!"; die();}
	if(!$result1) { echo "could not execute query";
	die(mysqli_error($db)); }
	echo "<ul>";
	for( $counter = 0; $row = mysqli_fetch_row($result1); $counter++ )
                 {
				  
				foreach ($row as $key => $value)
				    {	
					   echo "<li id=\"Subcateg\" type=\"square\">$value</li><br />";
					   
					 }
				
				}	
	echo "</ul>";
	
}

function getContenttype($rid){
	//include "dbconnect.php";
	$host = "localhost";
	$user = "root";
	$pass = "lookout4detox";
	$dbname = "virtual_library";

	$db=mysqli_connect($host, $user, $pass) or die("Could not connect to database server");
	mysqli_select_db($db,$dbname) or die ("Could not connect to database name");
	$query = "SELECT content_type FROM  resources WHERE resource_id  = '$rid'";
	$result = mysqli_query($db,$query);
	list($type) = mysqli_fetch_array($result);
	return $type;
		
}

function getResourceTitle($rid){
	//include "dbconnect.php";
	$host = "localhost";
	$user = "root";
	$pass = "lookout4detox";
	$dbname = "virtual_library";

	$db=mysqli_connect($host, $user, $pass) or die("Could not connect to database server");
	mysqli_select_db($db,$dbname) or die ("Could not connect to database name");
	$query = "SELECT resource_title FROM  resources WHERE resource_id  = '$rid'";
	$result = mysqli_query($db,$query);
	list($resTit) = mysqli_fetch_array($result);
	return $resTit;
		
}

function myText($user){
	include "dbconnect.php";
	$query = "SELECT resource_id FROM  personal_table WHERE user_id  = '1'";
	$result = mysqli_query($db,$query);
	$count = mysqli_num_rows($result);
	
	while(list($rid) = mysqli_fetch_array($result)){
		if(getContentType($rid) == "TEXT"){
			$tit = getResourceTitle($rid);
			echo "
			<table width=\"522\">
			  <tr>
				<td width=\"451\">$tit</td>
				<td width=\"29\"><a id = \"share\" title = \"$rid\">share</a>&nbsp;</td>
				<td width=\"26\"><a id = \"del\" title = \"$rid\">remove</a></td>
			  </tr>
			</table>
			";
		}
	}
}
	
function myAudio($user){
	include "dbconnect.php";
	$query = "SELECT resource_id FROM  personal_table WHERE user_id  = '1'";
	$result = mysqli_query($db,$query);
	$count = mysqli_num_rows($result);
	
	while(list($rid) = mysqli_fetch_array($result)){
		if(getContentType($rid) == "AUDIO"){
			$tit = getResourceTitle($rid);
			echo "
			<table width=\"522\">
			  <tr>
				<td width=\"451\">$tit</td>
				<td width=\"29\"><a id = \"share\" title = \"$rid\">share</a>&nbsp;</td>&nbsp;
				<td width=\"26\"><a id = \"del\" title = \"$rid\">remove</a></td>
			  </tr>
			</table>
			";
		}
	}
}


function myVideo($user){
	include "dbconnect.php";
	$query = "SELECT resource_id FROM  personal_table WHERE user_id  = '1'";
	$result = mysqli_query($db,$query);
	
	while(list($rid) = mysqli_fetch_array($result)){
		if(getContentType($rid) == "VIDEO"){
			$tit = getResourceTitle($rid);
			echo "
			<table width=\"522\">
			  <tr>
				<td width=\"451\">$tit</td>
				<td width=\"29\"><a id = \"share\" title = \"$rid\">share</a>&nbsp;</td>&nbsp;
				<td width=\"26\"><a id = \"del\" title = \"$rid\"><img src=\"img/unchecked.gif\" alt=\"remove\" /></a></td>
			  </tr>
			</table>
			";
		}
	}
}

?>