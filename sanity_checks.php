<?php
header('Content-type: text/html; charset=utf-8');
require_once("isloggedin.php");

function class_is_users($classid,$userid) {
include("dbconn.php");
$sql = $dbconn->prepare("SELECT * FROM classes where id=? AND user_id=?");
$sql->execute(array($classid,$userid));
if($sql->rowCount()==1) { return TRUE; }
return false;
}

function note_is_users($noteid,$userid) {
include("dbconn.php");
$sql = $dbconn->prepare("SELECT * FROM notes where id=? AND user_id=?");
$sql->execute(array($noteid,$userid));
if($sql->rowCount()==1) { return TRUE; } 
return FALSE;
}
?>

