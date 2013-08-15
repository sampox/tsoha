<?php
require_once("isloggedin.php");
?>

<html>
<head>
<link rel="stylesheet" href="style.css">

<script>
function validateForm()
{
var x=document.forms["noteform"]["notename"].value;
if (x==null || x=="")
  {
  alert("The note must have a name");
  return false;
  }

var y=document.forms["noteform"]["importance"].value;
if (y==null || y=="") {}
else 
{
        if (isNaN(y) || y < 1 || y > 99)
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

</head>
<body>
<div class=logreg>
<h2><br />Add a note<br /><br /></h2>

<form name="noteform" action="new_note.php" onsubmit="return validateForm()" method="post">
        Note class:
<?php
include("users_classes.php");
echo selectClasses($_SESSION['user']);
?>
<input type="hidden" name="userna" value=<?php echo ''.$_SESSION['user'].'';?>>
<input type="text" id="notename" name="notename" placeholder="Name of the note">
<input type="text" id="subclass" name="subclass" placeholder="Subclass name (optional)">
<input type="text" id="description" name="description" placeholder="Description (optional)">
<input type="text" id="importance" name="importance" placeholder="Importance (1-99) (optional)">
<br />
        <input type="submit" value="Create note">
</form>

</div>
</body>
</html>