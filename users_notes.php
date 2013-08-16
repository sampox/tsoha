<?php
header('Content-type: text/html; charset=utf-8');
require_once("isloggedin.php");

function getNotes($user) {
include("dbconn.php");
$out = '';
$sql = $dbconn->prepare("SELECT name,id FROM notes where user_id=(SELECT id FROM members where username= ? )");
$sql->execute(array($user));
        $out .="<select name='notez'>";
        while($row = $sql->fetch()) {
        $out .= "\r\n<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
} $out .= "\r\n</select>";
return $out;
}
?>

