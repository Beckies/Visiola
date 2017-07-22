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
				$( "#genNtc" ).append(data);
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
	color: #669966;
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 14pt;
	font-weight:bold;
}
.cont{
	padding:2px 12px 2px 12px;
	margin:5px;
	line-height:3em;
	background:#FFF;
	border-radius:4px;
	word-spacing:.3em;
	border:1px #999999 solid;
	font-size:12px;
	
}
#form{
	padding:2px 12px 2px 12px;
	margin:5px;
	background:#FFF;
	border-radius:4px;
	border:1px #999999 solid;
}
h2 {
	letter-spacing: 2px;
	word-spacing: 3px;
	line-height: 1em;
	text-shadow: rgba(0,171,0,.5) 2px 2px 2px;
	text-align: center;
}

-->
</style>
</head>

<body>

<div id="demo">
<div align="center"  id="dialog-form" title="Create new user">
	<p align="left">All form fields are required.</p>
	<form action="" method="get" name="signupform" id="signupform" autocomplete="off">
	  		    <table width="544" height="306">
	  		      <tr>
	  		        <td width="132" height="37" class="label"><label id="lfirstname" for="firstname">First Names</label></td>
	  		  	  <td width="206" class="field"><input id="firstname" name="firstname" type="text" value="" maxlength="100" /></td>
	  		  	  <td width="190" class="status"></td>
	  		    </tr>
	  		      <tr>
	  		        <td height="35" class="label"><label id="llastname" for="lastname">Last Name</label></td>
	  			  <td class="field"><input id="lastname" name="lastname" type="text" value="" maxlength="100" /></td>
	  			  <td class="status"></td>
	  		    </tr>
	  		      <tr>
	  		        <td height="35" class="label"><label id="lusername" for="username">Matric no. </label></td>
	  			  <td class="field"><input id="matric" name="matric" type="text" value="" maxlength="50" /></td>
	  			  <td class="status"></td>
	  		    </tr>
	  		      <tr>
	  		        <td height="36" class="label"><label id="lpassword" for="password">Password</label></td>
	  			  <td class="field"><input id="password" name="password" type="password" maxlength="50" value="" /></td>
	  			  <td class="status"></td>
	  		    </tr>
	  		      <tr>
	  		        <td height="35" class="label"><label id="lpassword_confirm" for="password_confirm">Confirm Password</label></td>
	  			  <td class="field"><input id="password_confirm" name="password_confirm" type="password" maxlength="50" value="" /></td>
	  			  <td class="status"></td>
	  		    </tr>
	  		      <tr>
	  		        <td height="37" class="label"><label id="lemail" for="email">Email Address</label></td>
	  			  <td class="field"><input id="email" name="email" type="text" value="" maxlength="150" /></td>
	  			  <td class="status"><br /></td>
	  		    </tr>
	  		      <tr>
	  		        <td class="field" colspan="2"><div align="center">
	  		          <input id="signupsubmit" class="nextbutton" name="signup" type="submit" value="Signup" />
  		            </div></td>
	  		    </tr>
      </table>
	</form>
</div>
<div align="left">
  <script type="text/javascript">
$(document).ready(function() { 
    // validate signup form on keyup and submit 
    var validator = $("#signupform").validate({ 
        rules: { 
            firstname: "required", 
            lastname: "required", 
            matric: { 
                required: true, 
            }, 
            password: { 
                required: true, 
                minlength: 5 
            }, 
            password_confirm: { 
                required: true, 
                minlength: 5, 
                equalTo: "#password" 
            }, 
			email: { 
                remote: "users.php",
				required: true, 
                email: true, 
            }, 
        }, 
        messages: { 
            firstname: "Enter your firstname", 
            lastname: "Enter your lastname", 
            address: { 
                required: "Please enter an address", 
                minlength: jQuery.format("Enter at least {0} characters"), 
            }, 
            password: { 
                required: "Please Provide a password", 
                rangelength: jQuery.format("Enter at least {0} characters") 
            }, 
            password_confirm: { 
                required: "Please Repeat your password", 
                minlength: jQuery.format("Enter at least {0} characters"), 
                equalTo: "Please Enter the same password as above" 
            }, 
            email: { 
                 required: "Please enter a valid email address", 
                minlength: "Please enter a valid email address", 
                remote: jQuery.format("This user is already registered to this system")  
            },  
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
         // specifying a submitHandler prevents the default submit, good for the demo 
        submitHandler: function() { 
            //alert("submitted!"); 
			dataString = $("#signupform").serialize();
     
        	$.ajax({
        	type: "POST",
        	url: "signup.php",
        	data: dataString,
        	dataType: "json",
        	success: function(data) {
				if(data.status == "valid"){
					//alert succesful signup
					$( "#dialog-form" ).dialog( "close" );
					alert("signup completed successfully. You can now login");
				}else{
					//alert unsuccessful signup
					$( "#dialog-form" ).dialog( "close" );
					alert("we are sorry, some problems were encountered during signup please try again ");
				}
			},
			});//end ajax call
        }, 
        // set this class to error-labels to indicate valid fields 
        success: function(label) { 
            // set   as text for IE 
            label.html(" ").addClass("checked"); 
        } 
    }); 
 
});
</script>
</div>
</div>

<div align="center">
<table width="1127" height="986" border="0" align="center">
    <tr>
      <th height="68" colspan="3" scope="col">
        <div align="left">
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
      </div></th>
    </tr>
    <tr>
      <th height="85" colspan="3" scope="col">
        <div id="container">
          <div id="example">
            <img src="img/new-ribbon.png" width="112" height="112" alt="New Ribbon" id="ribbon">		  
            <div id="slides">
              <div class="slides_container">
                <div class="slide">
                  <a href="http://www.flickr.com/photos/jliba/4665625073/" title="145.365 - Happy Bokeh Thursday! | Flickr - Photo Sharing!" target="_blank"><img src="img/slide-1.jpg" width="570" height="270" alt="Slide 1"></a>					  
                  <div class="caption" style="bottom:0">
                    <p>Convocating Computer Science Student</p>
			      </div>
		        </div>
			      <div class="slide">
				      <a href="http://www.flickr.com/photos/stephangeyer/3020487807/" title="Taxi | Flickr - Photo Sharing!" target="_blank"><img src="img/slide-2.jpg" width="570" height="270" alt="Slide 2"></a>					  
			        <div class="caption">
				        <p>Shopping for more book to stock library</p>
			        </div>
			      </div>
			      <div class="slide">
				      <a href="http://www.flickr.com/photos/childofwar/2984345060/" title="Happy Bokeh raining Day | Flickr - Photo Sharing!" target="_blank"><img src="img/slide-3.jpg" width="570" height="270" alt="Slide 3"></a>					  
			        <div class="caption">
				        <p>Books on the shelve</p>
			        </div>
			      </div>
			      <div class="slide">
				      <a href="http://www.flickr.com/photos/b-tal/117037943/" title="We Eat Light | Flickr - Photo Sharing!" target="_blank"><img src="img/slide-4.jpg" width="570" height="270" alt="Slide 4"></a>					  
			        <div class="caption">
				        <p>Studious Student</p>
			        </div>
			      </div>
			      <div class="slide">
				      <a href="http://www.flickr.com/photos/bu7amd/3447416780/" title="&ldquo;I must go down to the sea again, to the lonely sea and the sky; and all I ask is a tall ship and a star to steer her by.&rdquo; | Flickr - Photo Sharing!" target="_blank"><img src="img/slide-5.jpg" width="570" height="270" alt="Slide 5"></a>					  
			        <div class="caption">
				        <p>&ldquo;Student accessin the virtual library at home&rdquo;</p>
			        </div>
			      </div>
			      <div class="slide">
				      <a href="http://www.flickr.com/photos/streetpreacher/2078765853/" title="twelve.inch | Flickr - Photo Sharing!" target="_blank"><img src="img/slide-6.jpg" width="570" height="270" alt="Slide 6"></a>					  
			        <div class="caption">
				        <p>We need our share our resources with our colleague </p>
			        </div>
			      </div>
			      <div class="slide">
				      <a href="http://www.flickr.com/photos/aftab/3152515428/" title="Save my love for loneliness | Flickr - Photo Sharing!" target="_blank"><img src="img/slide-7.jpg" width="570" height="270" alt="Slide 7"></a>					  
			        <div class="caption">
				        <p>Accessing the library in the library complex</p>
			        </div>
			      </div>
		      </div>
				  <a href="#" class="prev"><img src="img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
              <a href="#" class="next"><img src="img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a> </div>
	      <img src="img/example-frame.png" alt="Example Frame" name="frame" width="739" height="341" id="frame">		      </div>
	    </div></th>
    </tr>
    <tr>
      <th width="387" height="186" rowspan="2" scope="col"> <div id="title">
          <h1 class="style2" >NOTICES</h1>
          <div id="accordion">
            <h3><a href="#">GENERAL NOTICES</a></h3>
          <div id="genNtc">
              <p> Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate. </p>
          </div>
          <h3><a href="#">ADMIN NOTICES</a></h3>
          <div id="admNtc">
              <p> Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                suscipit faucibus urna. </p>
          </div>
        </div>
      </div><div id="chc"></div></th>
      <th width="496" rowspan="2" scope="col"><div class="cont"><h3 class="style3">Computer Science Virtual Library</h3>Feasibility Study Project Proposal of Virtual Library for Computer Science, Universityof Calabar.   &nbsp;<img alt="asorock.gif" src="img/2.jpg" align="right" border="1" hspace="10" />The purpose of a Virtual Library (VL) is to underpin learning and     acquisition of knowledge, to provide a more solid basis for education     and to enhance quality of life by drawing on digitally available     (preferably on-line) books, materials and journals via ICT-based tools. A     VL provides remote (on-line or CD-ROM-based) access to a variety of     national and international content (e.g. curricula, learning materials,     books, journals, magazines, newspapers), services traditionally   offered   by libraries and other information sources. VLs thus combine   on-site   collections of materials in electronic format with an   electronic network   which ensures access to and delivery of those   materials.</div></th>
      <th width="337" height="91" scope="col">
      <div id="form">
      	<h3 class="style2">LOGIN / SIGN UP </h3>
      	<div class="ui-state-error" id="loginStatus">Please fill in all fields correctly </div>
        <br />
        <form id="loginform" name="loginform" method="post" action="">
          <table width="317" border="0">
            <tr>
              <th width="103" height="20" scope="col">Email:</th>
              <th width="101" scope="col"><input type="text" name="email" id="email" /></th>
              <td width="101" nowrap="nowrap" class="ui-state-error" scope="col">&nbsp;</td>
            </tr>
            <tr>
              <td>Password:</td>
              <td><input type="password" name="passw" id="passw"/></td>
              <td nowrap="nowrap" class="ui-state-error">&nbsp;</td>
            </tr>
          </table>
		  <input name="Login" type="submit" class="nextbutton" id="Login" value="Login.." />
          OR
          <input name="create-user"  class="nextbutton" id="create-user" value="Sign Up.." />
        </form>
      </div></th>
    </tr>
    <tr>
      <td height="328">
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

  
</div>
</body>
</html>
