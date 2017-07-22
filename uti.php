<?php
extract($_POST);
switch ($mode) {
    case "gen":
        getGeneralNotices();
        break;
	case "adm":
		getAdminNotices();
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
	include "dbconnect.php";
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
	echo "<br/>";
}

function mostViewed() {
	include "dbconnect.php";
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
	echo "<br/>";
}

function mostHeard() {
	include "dbconnect.php";
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
	echo "<br/>";
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



?>