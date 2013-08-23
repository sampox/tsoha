<?php
header('Content-type: text/html; charset=utf-8');
require_once("logreg/is_logged_in.php"); //Onko käyttäjä kirjautunut

function class_is_users($classid,$userid) {
include("db_conn.php"); //DB Yhteys
//Kuuluuko luokka käyttäjälle TRUE/FALSE
$sql = $dbconn->prepare("SELECT * FROM classes where id=? AND user_id=?");
$sql->execute(array($classid,$userid));
if($sql->rowCount()==1) { return TRUE; }
return FALSE;
}

function note_is_users($noteid,$userid) {
include("db_conn.php"); //DB yhteys
//Kuuluuko merkintä käyttäjälle TRUE/FALSE
$sql = $dbconn->prepare("SELECT * FROM notes where id=? AND user_id=?");
$sql->execute(array($noteid,$userid));
if($sql->rowCount()==1) { return TRUE; } 
return FALSE;
}
?>

