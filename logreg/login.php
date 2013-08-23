<?php
header('Content-type: text/html; charset=utf-8');
?>
<html>
<head>
<link rel="stylesheet" href="../style.css">
<title> Memo </title>
<script>
function validateForm()
{
var a=document.forms["loginform"]["myusername"].value;
if (a==null || a=="")
  {
  alert("Remember to enter your username!");
  return false;
  }


var x=document.forms["loginform"]["mypassword"].value;
if (x==null || x=="")
  {
  alert("Remember to enter your password!");
  return false;
  }
}
</script>
</head>
<div class="logreg"> 
<h2><br />Log In<br /><br /></h2>
<form name="loginform" action="check_login.php" onsubmit="return validateForm()" method="post">
	<input type="text" id="myusername" name="myusername" placeholder="Username" >
	<input type="password" id="mypassword" name="mypassword" placeholder="Password">
<br />	<input type="submit" id="login" value="Log In">
</form>

<h4> <br />Not registered yet? <a href='register.php'>Register now</a></h4>
</div>
</html>
