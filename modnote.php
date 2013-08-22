<?php include("menu.php"); ?>

<!-- BEGIN JAVASCRIPT -->
<script>
function validateForm()
{
var a=document.forms["noteform"]["clas"].value;
if (a==null || a.trim()=="")
  {
  alert("The note must have a class! If you have no classes yet, add one now.");
  return false;
  }


var x=document.forms["noteform"]["notez"].value;
if (x==null || x.trim()=="")
  {
  alert("The note must have a name");
  return false;
  }


var y=document.forms["noteform"]["importance"].value;
if (y==null || y.trim()=="") {}
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

<!-- END JAVASCRIPT-->

<div class=logreg>
<h2><br />Modify a note<br /><br /></h2>

<form name="noteform" action="mod_note.php" onsubmit="return validateForm()" method="post">
        Choose note:
<?php
include("users_notes.php");
echo getNotes($_SESSION['user']);
echo "<br /> Note's class:&nbsp";

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
