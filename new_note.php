<?php
require_once("isloggedin.php");
include("dbconn.php");
include("select_ids.php");
$userid = guid($_POST['userna']);
$classid = clid($_POST['clas']);
$sql = $dbconn->prepare("INSERT INTO notes(class_id,user_id,subclass,name,description,importance) values(?,?,?,?,?,?)");
$sql->execute(array($classid,$userid,$_POST['subclass'],$_POST['notename'],$_POST['description'],$_POST['importance']));

?>
<html>
<h3> Note added! Redirecting back to main page </h3>
<meta http-equiv="refresh" content="2; URL=index.php">
</html>
