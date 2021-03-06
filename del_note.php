<?php
header('Content-type: text/html; charset=utf-8');
require_once("logreg/is_logged_in.php"); //Onko käyttäjä kirjautunut sisään

include("db_conn.php"); //DB yhteys
include("sanity_checks.php"); //tarkistuksia ovatko syötteet järkeviä

$noteid =trim($_POST['notez']);
$note_sanity = note_is_users($noteid,$_SESSION['userid']); //Kuuluuko merkintä käyttäjälle
//CHECK USER INPUT
if($noteid == NULL || $noteid=='' || !($note_sanity)) { echo "ERROR, must choose a note!"; return; }
//END CHECK

//Poistetaan merkintä notes-taulusta
$sql = $dbconn->prepare("DELETE FROM notes WHERE id = ?");
$sql->execute(array($noteid));

?>
<html>
<h3> Note deleted! Redirecting back to <a href="index.php">main page</a> </h3>
<meta http-equiv="refresh" content="2; URL=index.php">
</html>

