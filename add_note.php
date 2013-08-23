<?php
header('Content-type: text/html; charset=utf-8');
require_once("logreg/is_logged_in.php");
include("dbconn.php");
include("sanity_checks.php");
$userid = $_SESSION['userid'];
$classid = trim($_POST['clas']);
$class_sanity = class_is_users($classid,$userid);
$notename=trim($_POST['notename']);
$importance=trim($_POST['importance']); 
//CHECK INPUT
if($classid == NULL || $classid=='' || !($class_sanity)) { echo "The note must have a class!"; return; }
else if($notename == NULL || $notename=='') {echo "The note must have a name"; return; }
else if($importance != NULL || $importance!='') {
	if($importance<0 || $importance>99) {echo "Importance must be between 0 and 99";return; }}
//END CHECK

//CCHECK IF NOTE WITH THAT NAME ALREADY EXISTS
$sql = $dbconn->prepare("SELECT * FROM notes WHERE name=? and user_id=?");
$sql->execute(array($notename,$userid));
if($sql->rowCount()!=0) {echo "Note with that name already exists!";return; }
//END CHECK
$sql = $dbconn->prepare("INSERT INTO notes(class_id,user_id,subclass,name,description,importance) values(?,?,?,?,?,?)");
$sql->execute(array($classid,$userid,trim($_POST['subclass']),$notename,trim($_POST['description']),$importance));

?>
<html>
<h3> Note added! Redirecting back to <a href="index.php">main page</a></h3>
<meta http-equiv="refresh" content="2; URL=index.php">
</html>
