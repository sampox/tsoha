<?php include("menu.php"); ?>

<!-- BEGIN JAVASCRIPT -->
<script>
function validateForm()
{
var a=document.forms["addclass"]["classname"].value;
if (a==null || a.trim()=="")
  {
  alert("The class must have a name.");
  return false;
  }
}
</script>
<!-- END JAVASCRIPT -->

<div class="logreg"> 
<h2><br />Add a class<br /><br /></h2>
<form name="addclass" action="controllers/add_class.php" onsubmit="return validateForm()" method="post">
	<input type="text" id="classname" name="classname" placeholder="Classname" >
<br />  <input type="submit" value="Add class">
</form>
<br />
<h3> Back to <a href="index.php"> main page </a> </h3>
</div>
</body>
</html>

