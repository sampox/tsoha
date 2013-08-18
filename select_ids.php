<?php
header('Content-type: text/html; charset=utf-8');
require_once("isloggedin.php");

function guid($user) {
include ("dbconn.php");
$sql = $dbconn->prepare("SELECT id FROM members where username=?");
$sql->execute(array($user));
$out = $sql->fetch();
return $out['id'];
}
function clid($clas,$userid) {
include ("dbconn.php");
$sql = $dbconn->prepare("SELECT id FROM classes where classname= ? and user_id=?");
$sql->execute(array($clas,$userid));
$out = $sql->fetch();
return $out['id'];
}
?>
