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

		});
									
	</script>
  <script type="text/javascript">
$(document).ready(function() { 
dat = "mode=gen";
datum = "mode=adm";
text = "mode=resInfT";
video= "mode=resInfV";
audio = "mode=resInfA";
$.ajax({
        	type: "POST",
        	url: "utility_funcs.php",
   			data: dat,
        	dataType: "html",
        	success: function(data) {
				$( "#genNtc" ).html(data);
			},
			});//end ajax call

$.ajax({
        	type: "POST",
        	url: "utility_funcs.php",
   			data: datum,
        	dataType: "html",
        	success: function(data) {
				$( "#admNtc" ).html(data);
			},
			});//end ajax call*/
$.ajax({
        	type: "POST",
        	url: "utility_funcs.php",
   			data: text,
        	dataType: "html",
        	success: function(data) {
				//alert(data);
				$( "#txt" ).html(data);
			},
			});//end ajax call

$.ajax({
        	type: "POST",
        	url: "utility_funcs.php",
   			data: video,
        	dataType: "html",
        	success: function(data) {
				$( "#video" ).html(data);
			},
			});//end ajax call
			
$.ajax({
        	type: "POST",
        	url: "utility_funcs.php",
   			data: audio,
        	dataType: "html",
        	success: function(data) {
				$( "#audio" ).html(data);
			},
			});//end ajax call*/			


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

.cont{
	
	margin:5px;

	background:#FFF;
	border-radius:4px;
	
	border:1px #999999 solid;
	
}
-->
</style>
</head>

<body>
<table width="1175">
  <tr>
    <td colspan="3">
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
            <input name="search" id="search" type="text" class="text" value="search.." />
            <input name="submit" type="submit" class="btn" value="search"/>
          </form>
        </div>
    </td>
  </tr>
  <tr>
    <td width="469">
        <div class="box">
        	Nigerian Virtual Library

Feasibility Study Project Proposal Nigerian Virtual Library for Universities and other Institutions of Higher Education. The purpose of a Virtual Library (VL) is to underpin learning and acquisition of knowledge, to provide a more solid basis for education and to enhance quality of life by drawing on digitally available (preferably on-line) books, materials and journals via ICT-based tools. A VL provides remote (on-line or CD-ROM-based) access to a variety of national and international content (e.g. curricula, learning materials, books, journals, magazines, newspapers), services traditionally offered by libraries and other information sources. VLs thus combine on-site collections of materials in electronic format with an electronic network which ensures access to and delivery of those materials.
        
        Nigerian Virtual Library

Feasibility Study Project Proposal Nigerian Virtual Library for Universities and other Institutions of Higher Education. The purpose of a Virtual Library (VL) is to underpin learning and acquisition of knowledge, to provide a more solid basis for education and to enhance quality of life by drawing on digitally available (preferably on-line) books, materials and journals via ICT-based tools. A VL provides remote (on-line or CD-ROM-based) access to a variety of national and international content (e.g. curricula, learning materials, books, journals, magazines, newspapers), services traditionally offered by libraries and other information sources. VLs thus combine on-site collections of materials in electronic format with an electronic network which ensures access to and delivery of those materials</div>
     </td>
    <td width="672"><img src="img/slide.jpg" width="570" height="270" alt="" /></td>
    <td width="79">
        <div class="box">
            Number of users: 1000<br/>
            Number of user online: 50<br/>
            Number of user offline: 50<br/>
        </div>
    </td>
  </tr>
  <tr>
     <tr>
        <td>
            <div class="box">
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
            </div>
        </td>
    <td>&nbsp;</td>
    <td>
    	 <div id="VResInf">
      	<h1 class="style2" >RESOURCE STATS</h1>
          <div id="resCount">
            <h3><a href="#">MOST READ</a></h3>
          <div id="txt">
              <p> Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate. </p>
          </div>
          <h3><a href="#">MOST WATCHED</a></h3>
          <div id="video">
              <p> Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                suscipit faucibus urna. </p>
          </div>
          <h3><a href="#">MOST HEARD</a></h3>
          <div id="audio">
              <p> Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                suscipit faucibus urna. </p>
          </div>

        </div>
      </div>
    </td>
  </tr>
</table>
</body>
</html>