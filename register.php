<?php
header('Content-type: text/html; charset=utf-8');
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
<script>
function validateForm()
{
var a=document.forms["regform"]["regname"].value;
if (a==null || a=="")
  {
  alert("Enter a username to register!");
  return false;
  }


var x=document.forms["regform"]["regpass"].value;
if (x==null || x=="")
  {
  alert("Enter the password!");
  return false;
  }

var z=document.forms["regform"]["regpass2"].value;
if (z==null || z="")
	{
	alert("Remember to enter the password again!");
	return false;
}
/*if(z!=x)
	{
	alert("Passwords do not match!");
	return false;
}*/
}
</script>
</head>
<div class="logreg"> 
<h2><br />Register<br /><br /></h2>

<form name="regform" action="checkregister.php" onsubmit="return validateForm()" method="post">
	<input type="text" id="regname" name="regname" placeholder="Username">
	<input type="password" id="regpass" name="regpass" placeholder="Password">
<input type="password" id="regpass2" name="regpass2" placeholder="Repeat password">
<br />	<input type="submit" id="register" value="Register">
</form>
</div>
</html>						
