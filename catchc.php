<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" href="css/global.css">
<link rel="stylesheet" href="themes/base/jquery.ui.all.css">
<link rel="stylesheet" type="text/css" media="screen" href="milk.css" />
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
	<link rel="stylesheet" href="demos.css">
     <script type="text/javascript">
		$(function() {

			$( "#resCount" ).accordion();

		});
									
	</script>
    
 <script type="text/javascript">
$(document).ready(function() { 
dat = "mode=stuffText";
dat1 = "mode=stuffAudio";
dat2 = "mode=stuffVideo";
$.ajax({
        	type: "POST",
        	url: "utility_funcs.php",
   			data: dat,
        	dataType: "html",
        	success: function(data) {
				$( "#txt" ).html(data);
				
			},
			});//end ajax call
			
$.ajax({
        	type: "POST",
        	url: "utility_funcs.php",
   			data: dat1,
        	dataType: "html",
        	success: function(data) {
				$( "#aud" ).html(data);
				
			},
			});//end ajax call

$.ajax({
        	type: "POST",
        	url: "utility_funcs.php",
   			data: dat2,
        	dataType: "html",
        	success: function(data) {
				$( "#vid" ).html(data);
				
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
      	<h1 class="style2" >MY STUFF</h1>
          <div id="resCount">
            <h3><a href="#">TEXT</a></h3>
          <div id="txt">
              <p> Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate. </p>
          </div>
          <h3><a href="#">AUDIO</a></h3>
          <div id="aud">
              <p> Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                suscipit faucibus urna. </p>
          </div>
          <h3><a href="#">VIDEO</a></h3>
          <div id="vid">
              <p> Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                suscipit faucibus urna. </p>
          </div>

        </div>
</body>
</html>