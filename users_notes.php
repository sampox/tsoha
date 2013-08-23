<?php
header('Content-type: text/html; charset=utf-8');
require_once("logreg/is_logged_in.php"); //Onko käyttäjä kirjautunut sisään

function getNotes() {
include("db_conn.php"); //DB yhteys
$out = '';
//Haetaan käyttäjän merkinnät ja esitetään ne drop-down menussa, josta valittu merkintä tulee $_POST['notez'] muuttujaan
$sql = $dbconn->prepare("SELECT name,id FROM notes where user_id=?");
$sql->execute(array($_SESSION['userid']));
        $out .="<select name='notez'>";
        while($row = $sql->fetch()) {
        $out .= "\r\n<option value=\"" . $row['id'] . "\">" . $row['name'] . "</option>";
} $out .= "\r\n</select>";
return $out;
}
?>

