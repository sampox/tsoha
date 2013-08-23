<?php
header('Content-type: text/html; charset=utf-8');
require_once("logreg/is_logged_in.php"); //Onko käyttäjä kirjautunut


function selectClasses() {
include("db_conn.php"); //DB yhteys
$out = '';
//Haetaan käyttäjän luokat ja esitetään ne drop-down menussa, josta valittu luokka tulee $_POST['clas'] muuttujaan
$sql = $dbconn->prepare("SELECT classname,id FROM classes where user_id=?");
$sql->execute(array($_SESSION['userid']));
        $out .="<select name='clas'>";
        while($row = $sql->fetch()) {
        $out .= "\r\n<option value='{$row[1]}'>{$row[0]}</option>";
} $out .= "\r\n</select>";
return $out;
}
?>

