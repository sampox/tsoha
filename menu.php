<?php
header('Content-type: text/html; charset=utf-8');
require_once("logreg/is_logged_in.php");
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title> Memo </title>
</head>
<body>
<div class=user>
<p>Welcome to Memo! Logged in as: <b><?php echo ''.$_SESSION['user'].''; ?></b> <a href="logreg/logout.php"> Log Out</a> </p>
</div>
<div class=linkz>
<a href="index.php" style="padding-right:20px;"><b>Main page</b></a>
<a href="addnote.php" style="padding-right:20px;"><b>Add a new note</b></a>
<a href="modnote.php" style="padding-right:20px;"><b>Modify a note</b></a>
<a href="addclass.php" style="padding-right:20px;"><b>Add a new class</b></a>
<a href="delclass.php"><b>Remove a class</b></a>
</div>

