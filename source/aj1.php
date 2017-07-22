<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<script src="jquery-1.7.2.js"></script>	
<script>
$(function(){
    $("#JqAjaxForm").submit(function(e){
       e.preventDefault();
 
        dataString = $("#JqAjaxForm").serialize();
     
        $.ajax({
        type: "POST",
        url: "aj2.php",
        data: dataString,
        dataType: "json",
        success: function(data) {
         
            if(data.email_check == "invalid"){
                $("#message_ajax").html("<div class='errorMessage'>Sorry " + data.name + ", " + data.email + " is NOT a valid e-mail address. Try again.</div>");
            } else {
                $("#message_ajax").html("<div class='successMessage'>" + data.email + " is a valid e-mail address. Thank you, " + data.name + ".</div>");
            }
          
        }
           
        });         
         
    });
});
</script>
<body>
<form id="JqAjaxForm">
<fieldset>
<legend>jQuery.ajax Form Submit</legend>
 
<p><label for="name_ajax">Name:</label><br />
 
<input id="name_ajax" type="text" name="name_ajax" /></p>
 
<p><label for="email_ajax">E-mail:</label><br />
 
<input id="email_ajax" type="text" name="email_ajax"  /></p>
 
<p><input type="submit" value="Submit" /></p>
 
</fieldset>
</form>
<div id="message_ajax"></div>
</body>
</html>
