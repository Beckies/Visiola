

<?php
$toCreate = array('TEXT','AUDIO','VIDEO');
$content = "some";
$mark = "fghjk";
include "dbconnect.php";
	$query = "SELECT category_name FROM category WHERE parent = '0'";
	$result = mysqli_query($db,$query);
	if(!$result) { echo "could not execute query";
	die(mysqli_error($db)); }
	echo "<ul id=\"cat\" >";
	for( $counter = 0; $row = mysqli_fetch_row($result); $counter++ )
    {
				  
				foreach ($row as $key => $value)
				    {	
						//$value = preg_replace('_',' ');
						$cat = "cat".$value;
					   // show categories
					   echo "<li id= \"catlist\" class = \"$cat\" type=\"square\" >$value</li>";  
					   
					   //get subcategories
					   $query1 = "SELECT category_id FROM category WHERE category_name = '$value'";
					   $result1 = mysqli_query($db,$query1);
					   if(!$result1) { echo "could not execute query";
					   die(mysqli_error($db)); }
					   list($id) = mysqli_fetch_array($result1);
					   
					   
					   $query2 = "SELECT category_name FROM category WHERE parent = '$id'";
					   $result2 = mysqli_query($db,$query2);
					   if(!$result2) { $content = "none"; }
					   
					   //show subcategories
					   //print("<ul class= \"  $str  \" >");
					   $cate = $value;
					   $subcat = $cate."subcat367";
					   echo "<ul class = \"$subcat\"  >";
					   
					   for( $counter = 0; $row = mysqli_fetch_row($result2); $counter++ )
					   {
						  
							foreach ($row as $key => $value)
							{		
									$subcat = "subcat".$cate;
								    //display sub categories as list
									if($content=="none"){
										echo "<span class = \" empty\"><li id=\"subcatlist\" class = \"$subcat\" type=\"square\">Nothing to display.</li></span>"; }
								
								  	 echo "<li id=\"subcatlist\" class = \"$subcat\" type=\"square\">$value</li>"; 
									 
									 //echo types
									 	$s = $value."subcatType367";
									 	 echo "<ul class = \"$s\">";
											foreach ($toCreate as $type) {
												$subcattyp = "Typesubcat";
												//$y = $value.$type;
												$query3 = "SELECT resource_id,resource_title FROM resources WHERE(content_type = '$type' and sub_category = '$value')";
												    $result3 = mysqli_query($db,$query3);
												    if(!$result3) { }
													$subcattyplist = $value."subcatType367".$type."367";
													$count = mysqli_num_rows($result3);
													if($count == 0) echo "<span class = \"empty\"><li id=\"subcatTypelist\" class = \"$subcattyp\" type=\"square\">$type</li></span>"; else {
											 	echo "<li id=\"subcatTypelist\" class = \"$subcattyp\" type=\"square\">$type</li>"; }
													
													// for each type echo resources
													
													 echo "<ul class = \"$subcattyplist\">";											 
													while(list($rid,$tit)=mysqli_fetch_array($result3)){
														echo "<li id = \"subcatTreslist\"  type=\"square\">$tit</li>";
													}  
													echo "</ul>";
													
													
											}	
					   					echo "</ul>";
					   			}
					      }
					   
		echo "</ul>";}
				
				}	
	echo "</ul>";
	
//hide subs
echo "
<script type=\"text/javascript\">

$('*[class$=367]').hide();

//handler for category
$('*[class^=cat]').click( function() {
	see = $(this).html();
	
	if($('*[class='+see+'subcat367]').is(':visible')){
		$('*[class='+see+'subcat367]').hide();
	}else{
			$('*[class='+see+'subcat367]').show();
	}

});

//handler for sub category
$('*[class^=subcat]').click( function() {
	see = $(this).html();
	if($('*[class='+see+'subcatType367]').is(':visible')){
		$('*[class='+see+'subcatType367]').hide();
	}else{
		$('*[class='+see+'subcatType367]').show();
	}	

});
	

//handler for sub category type
$('*[class^=Typesubcat]').click( function() {
	we = $(this).html();	
	see = $(this).parent().attr('class');
	see = see+we;
	if($('*[class='+see+'367]').is(':visible')){
		$('*[class='+see+'367]').hide();
	}else{
		$('*[class='+see+'367]').show();
	}

});	


</script>
";	

?>