<?php include("menu.php"); ?>

<!-- JAVASCRIPT BEGIN -->

<script>
function validateForm()
{
var a=document.forms["noteform"]["clas"].value;
if (a==null || a=="")
  {
  alert("You must have a class to delete! If you have no classes yet, add one now.");
  return false;
  }
}
</script>

<!-- JAVASCRIPT END -->

<div class=logreg>
<h2><br />Delete a class<br /><br /></h2>

<form name="noteform" action="del_class.php" onsubmit="return validateForm()" method="post">
        Which class:
<?php
include("users_classes.php");
echo selectClasses($_SESSION['user']);
?>
<br /><br />
        <input type="submit" value="Delete class">
</form>
<br /><br />
<h4> !!! Remember that removing a class will remove all the notes of that class as well !!!</h4>
<br />
<h3>No classes? <a href="addclass.php">Add a class now!</a></h3>
</div>
</body>
</html>
