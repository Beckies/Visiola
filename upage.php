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

<script>
		$(function() {
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
			
			$( "#resCount" ).accordion();
			$( "#accordion" ).accordion();
			
			$( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 500,
			width: 700,
			modal: true,
			buttons: {
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				$('#signupform input').not('input.nextbutton').val("");
				$('*[class=status]').text("");
			}
		});

		$( "#create-user" )
			.click(function() {
				$( "#dialog-form" ).dialog( "open" );
			});
			
			var links = $('#categ');
			$('#categ').live('click', function() {
			cav =  $(this);	
			links = cav;
			ca = $(this).html();
			dat1 = "mode=getSubCat&cat="+ca+"";

			$.ajax({
						type: "POST",
						url: "utility_funcs.php",
						data: dat1,
						dataType: "html",
						success: function(data) {
							cav.append(data);
						},
						});//end ajax call
						//cav.unbind('click');
			
			$('#Subcateg').live('click', function() { } );
			
			
			links.click(function() {
				$("#Subcateg" ).hide();

			});	
			
	});
	alert(links.html());
});
									
	</script>
  <script type="text/javascript">
$(document).ready(function() { 
dat = "mode=getCat";

$.ajax({
        	type: "POST",
        	url: "utility_funcs.php",
   			data: dat,
        	dataType: "html",
        	success: function(data) {
				$( "#cat" ).html(data);
			},
			});//end ajax call


});
</script>
	
<style type="text/css">
<!--
.style2 {
	font-family: Verdana, Arial, sans-serif;
	color: #669966;
	font-size: larger;
}
.style3 {
	color: #FF0000;
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 10pt;
}
#links ul{
	padding-right:20px;
}

#links li{
	float:left;
	padding:10px;
	
}
#links a{
	color:#669966;
	padding:5px;
	font-weight:bold;
	font-size:14px;
	background-color: #F0F0F0;
	text-decoration: none;
	font: Geneva;
}
#links a:hover{
	color:#000;
	padding:5px;
	font-weight:bold;
	font-size:14px;
	background-color: #F0F0F0;
	text-decoration: none;
	font: Geneva;
}
#srch{
	position:15px 3px;
}
.text{
	width:200px;
	height:15px;
}


.btn{
	padding:5px 16px;
	background:#669966;
	color:#fff;
	font-weight:bold;
	
}

.text{
	padding:10px 5px;
	height:10px;
	border:2px solid #CCF;
	color:#333;
	background:#DDD;
	position:relative;
	z-index:2;
}

.btn,
.text,
.textarea,
.file,
.blocks label.error,
.blocks label.ok {
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	border-radius:8px;
}
#cat{
	background:#fff;
}
-->
</style>
</head>

<body>
  <table width="1244" height="737" border="0" align="center">
    <tr>
      <th height="68" colspan="3" scope="col">
        <div align="right">
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="1230" height="126">
            <param name="BGCOLOR" value="#CCCCFF" />
            <param name="BGCOLOR" value="#CCCCFF" />
            <param name="BGCOLOR" value="#CCCCFF" />
            <param name="BGCOLOR" value="#CCCCCF" />
            <param name="BGCOLOR" value="#CCFFFF" />
            <param name="BGCOLOR" value="#CCCFFF" />
            <param name="BGCOLOR" value="#CCCCCC" />
            <param name="BGCOLOR" value="#CCCCCC" />
            <param name="BGCOLOR" value="#FFFFFF" />
            <param name="BGCOLOR" value="#FFFFFF" />
            <param name="BGCOLOR" value="#CCCCCC" />
            <param name="BGCOLOR" value="#FFFFFF" />
            <param name="BGCOLOR" value="#FFFFFF" />
            <param name="BGCOLOR" value="#FFFFFF" />
            <param name="BGCOLOR" value="" />
            <param name="BGCOLOR" value="" />
            <param name="movie" value="text1.swf" />
            <param name="quality" value="high" />
            <embed src="text1.swf" width="1230" height="126" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" bgcolor="#CCCCFF" ></embed>
          </object>
          <br />
          <div id="links">
          	<ul>
            	<li><a>Upload Resources</a></li>
                <li><a>Upload Resources</a></li>
                <li><a>Upload Resources</a></li>
                <li><a>Upload Resources</a></li>
                <li><a>Upload Resources</a></li>
            </ul>
          </div>
          <div id="srch">
          	<form>
          		<input name="search" id="search" type="text" class="text" value="search.." /><input name="submit" type="submit" class="btn" value="search"/>
            </form>
          </div>
          </div></th>
    </tr>
    <tr>
      <th width="388" height="372" scope="col">&nbsp;</th>
      <th width="598" height="372" scope="col"><div id="container">
        <div id="example">
          <div id="slides">
            <div class="slides_container">
              <div class="slide"> <a href="http://www.flickr.com/photos/aftab/3152515428/" title="Save my love for loneliness | Flickr - Photo Sharing!" target="_blank"><img src="img/slide-7.jpg" width="570" height="270" alt="Slide 7" /></a>
                <div class="caption">
                  <p>Save my love for loneliness</p>
                </div>
              </div>
            </div>
            <a href="#" class="prev"><img src="img/arrow-prev.png" width="24" height="43" alt="Arrow Prev" /></a> <a href="#" class="next"><img src="img/arrow-next.png" width="24" height="43" alt="Arrow Next" /></a></div>
          <img src="img/example-frame.png" alt="Example Frame" name="frame" width="739" height="341" id="frame" /></div>
      </div></th>
      <tr width="244" height="372" scope="col">&nbsp;</tr>
    </tr>
  </table>
  <div id="chc">cvbnm,./</div>
  
   <script type="text/javascript">
$(document).ready(function() { 
    // validate signup form on keyup and submit 
    var validatorThree = $("#loginform").validate({ 
        rules: { 
            email: "required", 
            pass: "required",
        }, 
        messages: { 
            email: "please enter your email address",
			pass: "please enter your password", 
            
        }, 
        // the errorPlacement has to take the table layout into account 
        errorPlacement: function(error, element) { 
            if ( element.is(":radio") ) 
                error.appendTo( element.parent().next().next() ); 
            else if ( element.is(":checkbox") ) 
                error.appendTo ( element.next() ); 
            else 
                error.appendTo( element.parent().next() ); 
        }, 
        // specifying a submitHandler prevents the default submit, good for the demo 
        submitHandler: function() { 
            //alert("submitted!"); 
			dataString = $("#loginform").serialize();
			//$("#chc").text(dataString);
			//var sec2 = document.getElementById("loginStatus");
        	$.ajax({
        	type: "POST",
        	url: "logchck.php",
        	data: dataString,
        	dataType: "json",
        	success: function(data) {
				if(data.status == "valid"){
					//go to welcome page
					window.location.href = "new.php";
				}else{
					//alert unsuccessful signup
					var msg = "invalid login credentials..please try again";
					$("#loginStatus").focus();
					$("#loginStatus").text(msg);
				}
			},
			});//end ajax call*/
        }, 
        // set this class to error-labels to indicate valid fields 
        success: function(label) { 
            // set   as text for IE 
            label.html(" ").addClass("checked"); 
        } 
    }); 
 
});
</script>


</body>
</html>
