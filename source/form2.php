<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery UI Dialog - Modal form</title>
	<link rel="stylesheet" href="themes/base/jquery.ui.all.css">
	<link rel="stylesheet" type="text/css" media="screen" href="milk.css" />
	<script src="jquery-1.7.2.js"></script>
	<script src="external/jquery.bgiframe-2.1.2.js"></script>
	<script src="jquery.min.js" type="text/javascript"></script>
	<script src="jquery.validate.js" type="text/javascript"></script>
	<script src="ui/jquery.ui.core.js"></script>
	<script src="ui/jquery.ui.widget.js"></script>
	<script src="ui/jquery.ui.mouse.js"></script>
	<script src="ui/jquery.ui.button.js"></script>
	<script src="ui/jquery.ui.draggable.js"></script>
	<script src="ui/jquery.ui.position.js"></script>
	<script src="ui/jquery.ui.resizable.js"></script>
	<script src="ui/jquery.ui.dialog.js"></script>
	<script src="ui/jquery.effects.core.js"></script>
	<link rel="stylesheet" href="demos.css">
	<style>
		body { font-size: 62.5%; }
		label, input { display:block; }
		input.text { margin-bottom:12px; width:95%; padding: .4em; }
		fieldset { padding:0; border:0; margin-top:25px; }
		h1 { font-size: 1.2em; margin: .6em 0; }
		div#users-contain { width: 350px; margin: 20px 0; }
		div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
		div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
		.ui-dialog .ui-state-error { padding: .3em; }
		.validateTips { border: 1px solid transparent; padding: 0.3em; }
	</style>
	<script>
	$(function() {
	
	$( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 500,
			width: 700,
			modal: true,
			buttons: {
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			}
		});

		$( "#create-user" )
			.button()
			.click(function() {
				$( "#dialog-form" ).dialog( "open" );
			});
			
	});
	</script>
</head>
<body>
<div id="demo">
<div align="center"  id="dialog-form" title="Create new user">
	<p align="left">All form fields are required.</p>
	<form action="" method="get" name="signupform" id="signupform" autocomplete="off">
	  		    <table width="544" height="340">
	  		      <tr>
	  		        <td width="131" height="28" class="label"><label id="lfirstname" for="firstname">First Name</label></td>
	  		  	  <td width="208" class="field"><input id="firstname" name="firstname" type="text" value="" maxlength="100" /></td>
	  		  	  <td width="189" class="status"></td>
	  		    </tr>
	  		      <tr>
	  		        <td class="label"><label id="llastname" for="lastname">Last Name</label></td>
	  			  <td class="field"><input id="lastname" name="lastname" type="text" value="" maxlength="100" /></td>
	  			  <td class="status"></td>
	  		    </tr>
	  		      <tr>
	  		        <td class="label"><label id="lusername" for="username">Username</label></td>
	  			  <td class="field"><input id="username" name="username" type="text" value="" maxlength="50" /></td>
	  			  <td class="status"></td>
	  		    </tr>
	  		      <tr>
	  		        <td class="label"><label id="lpassword" for="password">Password</label></td>
	  			  <td class="field"><input id="password" name="password" type="password" maxlength="50" value="" /></td>
	  			  <td class="status"></td>
	  		    </tr>
	  		      <tr>
	  		        <td class="label"><label id="lpassword_confirm" for="password_confirm">Confirm Password</label></td>
	  			  <td class="field"><input id="password_confirm" name="password_confirm" type="password" maxlength="50" value="" /></td>
	  			  <td class="status"></td>
	  		    </tr>
	  		      <tr>
	  		        <td class="label"><label id="lemail" for="email">Email Address</label></td>
	  			  <td class="field"><input id="email" name="email" type="text" value="" maxlength="150" /></td>
	  			  <td class="status"></td>
	  		    </tr>
	  		      <tr>
	  		        <td class="label"><label>Which Looks Right</label></td>
	  			  <td class="field" colspan="2" style="vertical-align: top; padding-top: 2px;">
	  			    <table>
	  			      <tbody>
	  			        
	  			        <tr>
	  			          <td style="padding-right: 5px;">
	  			            <input id="dateformat_eu" name="dateformat" type="radio" value="0" />
	  			            <label id="ldateformat_eu" for="dateformat_eu">14/02/07</label>	  				</td>
	  				  <td style="padding-left: 5px;">
	  				    <input id="dateformat_am" name="dateformat" type="radio" value="1"  />
	  				    <label id="ldateformat_am" for="dateformat_am">02/14/07</label>	  				</td>
	  				  <td>	  				</td>
	  			  </tr>
  			          </tbody>
  			        </table>	  			</td>
	  		    </tr>
	  		      
	  		      <tr>
	  		        <td height="46" class="label">&nbsp;</td>
	  			  <td class="field" colspan="2">
	  			    <div id="termswrap">
	  			      <input id="terms" type="checkbox" name="terms" />
	  			      <label id="lterms" for="terms">I have read and accept the Terms of Use.<br>
	  			      </label>
  			        </div> <!-- /termswrap -->	  			</td>
	  		    </tr>
	  		      <tr>
	  		        <td class="field" colspan="2"><div align="center">
	  		          <input id="signupsubmit" name="signup" type="submit" value="Signup" />
  		            </div></td>
	  		    </tr>
      </table>
	</form>
</div>
<div align="left">
  <button id="create-user">Create new user</button>
  <script type="text/javascript">
$(document).ready(function() { 
    // validate signup form on keyup and submit 
    var validator = $("#signupform").validate({ 
        rules: { 
            firstname: "required", 
            lastname: "required", 
            username: { 
                required: true, 
                minlength: 2, 
                remote: "users.php" 
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
                required: true, 
                email: true, 
                remote: "emails.php" 
            }, 
            dateformat: "required", 
            terms: "required" 
        }, 
        messages: { 
            firstname: "Enter your firstname", 
            lastname: "Enter your lastname", 
            username: { 
                required: "Enter a username", 
                minlength: jQuery.format("Enter at least {0} characters"), 
                remote: jQuery.format("{0} is already in use") 
            }, 
            password: { 
                required: "Provide a password", 
                rangelength: jQuery.format("Enter at least {0} characters") 
            }, 
            password_confirm: { 
                required: "Repeat your password", 
                minlength: jQuery.format("Enter at least {0} characters"), 
                equalTo: "Enter the same password as above" 
            }, 
            email: { 
                required: "Please enter a valid email address", 
                minlength: "Please enter a valid email address", 
                remote: jQuery.format("{0} is already in use") 
            }, 
            dateformat: "Choose your preferred dateformat", 
            terms: " " 
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
            alert("submitted!"); 
        }, 
        // set this class to error-labels to indicate valid fields 
        success: function(label) { 
            // set   as text for IE 
            label.html(" ").addClass("checked"); 
        } 
    }); 
     
    // propose username by combining first- and lastname 
    $("#username").focus(function() { 
        var firstname = $("#firstname").val(); 
        var lastname = $("#lastname").val(); 
        if(firstname && lastname && !this.value) { 
            this.value = firstname + "." + lastname; 
        } 
    }); 
 
});
</script>
</div>
</div>
</body>
</html>
