<?php

session_start();

if (!(isset($_SESSION['user']) && $_SESSION['user'] != '')) {

header ("Location: login.php");

}
?>

<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<div class=logout>
<a href="logout.php"> Log Out</a>
</div>
<div class=user>
<p> Logged in as: <b><?php echo ''.$_SESSION['user'].''; ?></b> </p>
</div>
</html>

