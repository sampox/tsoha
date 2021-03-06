<?php
header('Content-type: text/html; charset=utf-8');
require_once("logreg/is_logged_in.php"); //Tarkistetaan onko käyttäjä kirjautunut sisään

include("db_conn.php"); //DB yhteys
include("sanity_checks.php"); //tarkistuksia ovatko syötteet järkeviä
$classid = trim($_POST['clas']);
$class_sanity = class_is_users($classid,$_SESSION['userid']); //Kuuluuko luokka käyttäjälle
//CHECK USER INPUT
if($classid == NULL || $classid=='' || !($class_sanity)) { echo "ERROR, must choose a class!"; return; }
//END CHECK

//Poistetaan luokka
$sql = $dbconn->prepare("DELETE FROM classes WHERE id = ?");
$sql->execute(array($classid));

?>
<html>
<h3> Class deleted! Redirecting back to <a href="delclass.php">previous page</a> </h3>
<meta http-equiv="refresh" content="2; URL=delclass.php">
</html>

