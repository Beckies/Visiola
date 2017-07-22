<html>
<head>
<title></title>
<style>
.handle {
background: transparent url(tree-handle.png) no-repeat left top;
display:block;
float:left;
width:10px;
height:10px;
cursor:pointer;
}
.closed { background-position: left top; }
.opened { background-position: left -10px; }
</style>
</head>
<body>
    <?php
        $toCreate = array('TEXT','AUDIO','VIDEO');
        include "dbconnect.php";
        $query = "SELECT category_name FROM category WHERE parent = '0'";
        $result = mysqli_query($db,$query);
        if(!$result) 
        { 
            echo "could not execute query";
            die(mysqli_error($db)); 
        }
        echo"<ul id=\"cat\">";
		for( $counter = 0; $row = mysqli_fetch_row($result); $counter++ )
   	    {
			foreach ($row as $key => $value)
			{	
               echo"<li class=\"subcat\" type=\"square\">$value</li>";
                //get subcategories
			   $query1 = "SELECT category_id FROM category WHERE category_name = '$value'";
			   $result1 = mysqli_query($db,$query1);
			   if(!$result1)
			   { 
			   		echo "could not execute query";
			   		die(mysqli_error($db)); 
			   }
			   list($id) = mysqli_fetch_array($result1);
			   
			   
			   $query2 = "SELECT category_name FROM category WHERE parent = '$id'";
			   $result2 = mysqli_query($db,$query2);
			   if(!$result2)
			   { 
				   echo "could not execute query";
				   die(mysqli_error($db)); 
			   }
				   echo"<ul id=\"subcat\">";
				    for( $counter = 0; $row = mysqli_fetch_row($result2); $counter++ )
					{
						foreach ($row as $key => $value)
						{
							echo"<li class=\"\" type=\"circle\">$value</li>";
							foreach ($toCreate as $type) 
							{
								echo"<ul id=\"type\">";
								
									echo"<li class=\"\" title=\"dot\">$type</li>";
									$query3 = "SELECT resource_id,resource_title FROM resources WHERE(content_type = '$type' and sub_category = '$value')";
									$result3 = mysqli_query($db,$query3);
										if(!$result3) 
										{ 
											echo "could not execute query";
											die(mysqli_error($db)); 
										}
										echo"<ul id=\"resources\">";
												while(list($rid,$tit)=mysqli_fetch_array($result3))
												{
														//$subcattypres = $subcattyp.$tit;
														echo "<li id = \"subcatTreslist\" class = \"\" type=\"\">$tit</li>";
												}
										echo"</ul>";
								echo"</ul>";
							}
						}
					}
					echo"</ul>";
			}
		}
       echo"</ul>";
	?>
</body>
</html>