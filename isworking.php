<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>


	<script src="jquery-1.7.2.js"></script>	
	<script src="jquery.min.js"></script>
	<script src="jquery.validate.js" type="text/javascript"></script>
	<script src="js/slides.min.jquery.js"></script>
	<script src="ui/jquery.ui.core.js"></script>
	<script src="ui/jquery.ui.widget.js"></script>
	<script src="ui/jquery.ui.accordion.js"></script>
	<script src="ui/jquery.ui.mouse.js"></script>
	<script src="ui/jquery.ui.button.js"></script>
	<script src="ui/jquery.ui.draggable.js"></script>
	<script src="ui/jquery.ui.position.js"></script>
	<script src="ui/jquery.ui.resizable.js"></script>
	<script src="ui/jquery.ui.dialog.js"></script>
	<script src="ui/jquery.effects.core.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
$.ajax({
        	type: "POST",
        	url: "cat.php",
        	dataType: "html",
        	success: function(data) {
				//alert(data);
				$( "#yes" ).html(data);
				
			},
			});//end ajax call

});

</script>
<style type="text/css">
<!--
.empty {color: #999999}
-->
</style>			
</head>

<body>
<div id="yes" align="left">
</div>
</body>
</html>