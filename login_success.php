<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<div class="succ">
<?php
session_start();
if($_SESSION['user']==''){
header("location:login.php");
}
else
{
echo '<h3>Login successful <br /><br /> Welcome '.$_SESSION['user'].'<br /><br /></h3>';

echo '<p> you will be redirected to the <a href="index.php"> Main page </a> in 5 seconds if you do nothing<br /><br /></p>';

echo '<a href="logout.php"> Log Out</a>';
}
?>
</div>
<meta http-equiv="refresh" content="5; URL='index.php'">
</html>
