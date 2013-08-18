<?php
header('Content-type: text/html; charset=utf-8');
require_once("isloggedin.php");

include("dbconn.php");
include("select_ids.php");
$noteid =$_POST['notez'];
$classid = $_POST['clas'];
//CHECK INPUT
if($classid == NULL || trim($classid)=='') { echo "The note must have a class!"; return; }
else if($noteid == NULL || trim($noteid)=='') {echo "Must choose a note!"; return; }
else if($_POST['importance'] != NULL || trim($_POST['importance'])!='') {
        if($_POST['importance']<0 || $_POST['importance']>99) {echo "Importance must be between 0 and 99";return; }}
//END CHECK
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

