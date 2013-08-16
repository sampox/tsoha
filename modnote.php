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
var a=document.forms["noteform"]["clas"].value;
if (a==null || a=="")
  {
  alert("The note must have a class! If you have no classes yet, add one now.");
  return false;
  }


var x=document.forms["noteform"]["notez"].value;
if (x==null || x=="")
  {
  alert("The note must have a name");
  return false;
  }


var y=document.forms["noteform"]["importance"].value;
if (y==null || y=="") {}
else 
{
        if (isNaN(y) || y < 0 || y > 99)
        {
        alert("The importance factor must be a number from 0 to 99, or left empty");
         return false;
        }
}
if((document.forms["noteform"]["description"].value).length > 100) {alert("Description too long, max length is 100");return false; }
if((document.forms["noteform"]["subclass"].value ).length > 65) {alert("Subclass name too long, max length is 65");return false; }
}
</script>

</head>
<body>
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

<div class=logreg>
<h2><br />Modify a note<br /><br /></h2>

<form name="noteform" action="mod_note.php" onsubmit="return validateForm()" method="post">
        Choose note:
<?php
include("users_notes.php");
echo getNotes($_SESSION['user']);
echo "<br /> Notes class: &nbsp";

include("users_classes.php");
echo selectClasses($_SESSION['user']);
echo "<br />";
?>

<input type="text" id="subclass" name="subclass" placeholder="Subclass name (optional)">
<input type="text" id="description" name="description" placeholder="Description (optional)">
<input type="text" id="importance" name="importance" placeholder="Importance (0-99) (optional)">
<br />
        <input type="submit" name="modbutton" value="Modify note">
<br /><br />
Or delete it! 
<br />
<input type="submit" name="delbutton" value="Delete note">
</form>

</div>
</body>
</html>
