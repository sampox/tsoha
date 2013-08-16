<?php
header('Content-type: text/html; charset=utf-8');
require_once("isloggedin.php");
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
<script>
function validateForm()
{
var a=document.forms["addclass"]["classname"].value;
if (a==null || a=="")
  {
  alert("The class must have a name.");
  return false;
  }
}
</script>
</head>
<div class=logout>
<a href="logout.php"><b> Log Out</b></a>
</div>
<div class=user>
<p> Logged in as: <b><?php echo ''.$_SESSION['user'].''; ?></b> </p>
</div>
<div class=linkz>
<a href="index.php" style="padding-right:20px;"> <b> Main page </b> </a>
<a href="addnote.php" style="padding-right:20px;"> <b>Add a new note</b> </a>
<a href="modnote.php" style="padding-right:20px;"> <b> Modify a note </b> </a>
<a href="addclass.php" style="padding-right:20px;"> <b>Add a new class</b> </a>
<a href="delclass.php"> <b>Remove a class</b> </a>
</div>

<div class="logreg"> 
<h2><br />Add a class<br /><br /></h2>
<form name="addclass" action="add_class.php" onsubmit="return validateForm()" method="post">
	<input type="text" id="classname" name="classname" placeholder="Classname" >
<br />  <input type="submit" value="Add class">
</form>
<br />
<h3> Back to <a href="index.php"> main page </a> </h3>
</div>
</html>

