<?php
header('Content-type: text/html; charset=utf-8');
require_once("logreg/is_logged_in.php");

include("dbconn.php");
include("sanity_checks.php");
$classid = trim($_POST['clas']);
$class_sanity = class_is_users($classid,$_SESSION['userid']);
//CHECK INPUT
if($classid == NULL || $classid=='' || !($class_sanity)) { echo "ERROR, must choose a class!"; return; }
//END CHECK
$sql = $dbconn->prepare("DELETE FROM classes WHERE id = ?");
$sql->execute(array($classid));

?>
<html>
<h3> Class deleted! Redirecting back to <a href="delclass.php">previous page</a> </h3>
<meta http-equiv="refresh" content="2; URL=delclass.php">
</html>

