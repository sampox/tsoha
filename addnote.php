<?php include("menu.php"); ?>

<!-- JAVASCRIPT BEGIN -->

<script>
function validateForm()
{
var a=document.forms["noteform"]["clas"].value;
if (a==null || a.trim()=="")
  {
  alert("The note must have a class! If you have no classes yet, add one now.");
  return false;
  }


var x=document.forms["noteform"]["notename"].value;
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
        alert("The importance factor must be a number from 1 to 99, or left empty");
         return false;
        }
}
if(x.length > 65) { alert("Name too long, max length is 65");return false; }
if((document.forms["noteform"]["description"].value).length > 100) {alert("Description too long, max length is 100");return false; }
if((document.forms["noteform"]["subclass"].value ).length > 65) {alert("Subclass name too long, max length is 65");return false; }
}
</script>

<!-- JAVASCRIPT END -->

<div class=logreg>
<h2><br />Add a note<br /><br /></h2>

<form name="noteform" action="add_note.php" onsubmit="return validateForm()" method="post">
        Note class: &nbsp&nbsp
<?php
include("users_classes.php");
echo selectClasses(); //käyttäjän luokat drop-down valikossa
?>
<br />
<input type="text" id="notename" name="notename" placeholder="Name of the note">
<input type="text" id="subclass" name="subclass" placeholder="Subclass name (optional)">
<input type="text" id="description" name="description" placeholder="Description (optional)">
<input type="text" id="importance" name="importance" placeholder="Importance (0-99) (optional)">
<br />
        <input type="submit" value="Create note">
</form>
<br />
<h3>No classes? <a href="addclass.php">Add a class now!</a></h3>
</div>
</body>
</html>
