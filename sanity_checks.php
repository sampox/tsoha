<?php
header('Content-type: text/html; charset=utf-8');

//Kuuluuko luokka käyttäjälle TRUE/FALSE
function class_is_users($classid,$userid) {
include("db_conn.php"); //DB Yhteys
$sql = $dbconn->prepare("SELECT * FROM classes where id=? AND user_id=?");
$sql->execute(array($classid,$userid));
if($sql->rowCount()==1) { return TRUE; }
return FALSE;
}

//Kuuluuko merkintä käyttäjälle TRUE/FALSE
function note_is_users($noteid,$userid) {
include("db_conn.php"); //DB yhteys
$sql = $dbconn->prepare("SELECT * FROM notes where id=? AND user_id=?");
$sql->execute(array($noteid,$userid));
if($sql->rowCount()==1) { return TRUE; } 
return FALSE;
}

//Onko syöte oikean mittainen TRUE/FALSE
function string_length_check($str,$max_length) {
if (strlen($str)>$max_length) {
	return FALSE;
}
return TRUE;
}

?>

