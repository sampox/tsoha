<?php
require_once("isloggedin.php");

include("dbconn.php");
include("select_ids.php");
$noteid =$_POST['notez'];
$classid = clid($_POST['clas']);
if (isset($_POST['modbutton'])) {
$sql = $dbconn->prepare("UPDATE notes SET class_id=?,subclass=IF(? = '', subclass, ?),description=IF(? = '', description, ?),importance=IF(?='' ,importance, ?) WHERE id=?");
$sql->execute(array($classid,$_POST['subclass'],$_POST['subclass'], $_POST['description'],$_POST['description'], $_POST['importance'],$_POST['importance'],$noteid));
} 
else if (isset($_POST['delbutton'])) {
$sql = $dbconn->prepare("DELETE FROM notes WHERE id = ?");
$sql->execute(array($noteid));
}
else {}
?>
<html>
<h3> Note modified! Redirecting back to <a href="index.php">main page</a> </h3>
<meta http-equiv="refresh" content="2; URL=index.php">
</html>

