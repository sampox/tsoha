<?php

function selectClasses($user) {
include("dbconn.php");
$out = '';
$sql = $dbconn->prepare("SELECT classname FROM classes where user_id=(SELECT id FROM members where username= ? )");
$sql->execute(array($user));
        $out .="<select name='clas'>";
        while($row = $sql->fetch()) {
        $out .= "\r\n<option value='{$row[0]}'>{$row[0]}</option>";
} $out .= "\r\n</select>";
return $out;
}
?>

