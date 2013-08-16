<?php
require_once("isloggedin.php");
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<div class="logreg"> 
<h2><br />Add a class<br /><br /></h2>
<form name="addclass" action="add_class.php" method="post">
	<input type="hidden" name="userna" value=<?php echo ''.$_SESSION['user'].'';?>>
        <input type="text" id="classname" name="classname" placeholder="Classname" >
<br />  <input type="submit" value="Add class">
</form>
<br />
<h3> Back to <a href="index.php"> main page </a> </h3>
</div>
</html>

