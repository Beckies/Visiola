<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
		<meta name="author" content="Oliver Tse">
		<meta name="description" content="A Tree from HTML Lists">
		<meta http-equiv="pragma" content="nocache">
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>A Tree from HTML Lists</title>
		<style type="text/css">
			body {
				font-family:verdana;
				font-size:12px;
			}
			li {
			     	cursor:pointer; 
				display:block; 
				width:100px;
			}
			.Folder {
			}
			.ExpandCollapse {
				float:left;
				margin-right:5px;
				width:8px;
			}
			ul {
				list-style-type:none;
			}
		</style>
		<style type="text/css" media="all">
			@import url("skypoet.css");
		</style>	
		<script type="text/javascript" src="treelist_files/skypoet.js"></script>
		<script type="text/javascript">
			function resolveSrcMouseover(e) {
				var node = e.srcElement == undefined ? e.target : e.srcElement;
				if (node.nodeName != "UL") {
					node.style.fontWeight= "bold";
					showRollover(e, node.innerHTML);
				}
			}
			function resolveSrcMouseout(e) {
				var node = e.srcElement == undefined ? e.target : e.srcElement;
				node.style.fontWeight = "normal";
				clearRollover(e);
			}
			function takeAction(e) {
				var node = e.srcElement == undefined ? e.target : e.srcElement;
				//document.getElementById("DisplayInfo").innerHTML = "Clicked " + node.innerHTML;
				var id = node.getAttribute("id"); 
				if (id != null && id.indexOf("Folder") > -1) {
					if (node.innerHTML == "+") {
						node.innerHTML = "-";
						document.getElementById("ExpandCollapse" + id).style.display = "block";
					} else if (node.innerHTML == "-") {
						node.innerHTML = "+";
						document.getElementById("ExpandCollapse" + id).style.display = "none";
					}
				}
			}
		</script>
	</head>
	<body>
		<ul style="font-weight: normal;" onmouseover="resolveSrcMouseover(event);" onmouseout="resolveSrcMouseout(event);" onclick="takeAction(event);">
			<li><div style="font-weight: normal;" id="Folder1" class="ExpandCollapse">+</div><div style="font-weight: normal;" class="Folder">Folder 1</div></li>
			<ul style="font-weight: normal; display: block;" id="ExpandCollapseFolder1">
				<li style="font-weight: normal;">Item 1</li> 
				<li style="font-weight: normal;">Item 2</li>
				<li style="font-weight: normal;">Item 3</li>
			</ul>
			<li><div style="font-weight: normal;" id="Folder2" class="ExpandCollapse">+</div><div style="font-weight: normal;" class="Folder">Folder 2</div></li>
			<ul style="font-weight: normal; display: block;" id="ExpandCollapseFolder2">
				<li style="font-weight: normal;">Item 4</li>
				<li style="font-weight: normal;">Item 5</li>
				<li><div style="font-weight: normal;" id="Folder3" class="ExpandCollapse">+</div><div style="font-weight: normal;" class="Folder">Folder 3</div></li>
				<ul style="font-weight: normal; display: none;" id="ExpandCollapseFolder3">
					<li style="font-weight: normal;">Item 6</li>
					<li style="font-weight: normal;">Item 7</li>
					<li>Item 8</li>
					<li>Item 9</li>
				</ul>
			</ul>
		</ul>
		<div style="display: none; margin-top: 87px; margin-left: 94px;" id="Rollover">Folder 2</div>
	

</body></html>