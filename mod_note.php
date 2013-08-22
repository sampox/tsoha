
<?php
header('Content-type: text/html; charset=utf-8');
require_once("isloggedin.php");

include("dbconn.php");
include("sanity_checks.php");
//REMOVE WHITESPACE FROM BEFORE AND AFTER VARIABLES
$noteid =trim($_POST['notez']);
$classid = trim($_POST['clas']);
$importance = trim($_POST['importance']);
$subclass = trim($_POST['subclass']);
$description = trim($_POST['description']);

$note_sanity=note_is_users($noteid,$_SESSION['userid']);
$class_sanity=class_is_users($classid,$_SESSION['userid']);
//CHECK INPUT
if($classid == NULL || $classid=='' || !($class_sanity)) { echo "The note must have a class!"; return; }
else if($noteid == NULL || $noteid=='' || !($note_sanity)) {echo "Must choose a note!"; return; }
else if($importance != NULL || $importance!='') {
        if($importance<0 || $importance>99) {echo "Importance must be between 0 and 99";return; }}
//END CHECK
if (isset($_POST['modbutton'])) {
$sql = $dbconn->prepare("UPDATE notes SET class_id=?,subclass=IF(? = '', subclass, ?),description=IF(? = '', description, ?),importance=IF(?='' ,importance, ?) WHERE id=?");
$sql->execute(array($classid,$subclass,$subclass, $description,$description, $importance,$importance,$noteid));
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

