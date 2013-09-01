<?php
header('Content-type: text/html; charset=utf-8');
require_once("logreg/is_logged_in.php"); //Onko käyttäjä kirjautunut
include("db_conn.php"); //DB yhteys
include("sanity_checks.php");
$userid = $_SESSION['userid'];
$classid = trim($_POST['clas']);
$class_sanity = class_is_users($classid,$userid); //Katsotaan kuuluuko luokka käyttäjälle
$notename=trim($_POST['notename']);
$importance=trim($_POST['importance']); 
$description=trim($_POST['description']);
$subclass=trim($_POST['subclass']);

//Ovatko syötteet sopivan mittaisia
$string_lengths_ok=FALSE;
if(string_length_check($notename,65) && string_length_check($subclass,65) && string_length_check($description,100) && string_length_check($importance,2)) { 
$string_lengths_ok=TRUE; }

//Tarkistetaan ovatko käyttäjän syötteet käyttökelpoisia
if($classid == NULL || $classid=='' || !($class_sanity)) { echo "The note must have a class!"; return; }
else if($notename == NULL || $notename=='') {echo "The note must have a name"; return; }
else if($importance != NULL || $importance!='') {
	if($importance<0 || $importance>99) {echo "Importance must be between 0 and 99";return; }}
else if(!$string_lengths_ok) {
	echo "Too long input into field(s). The limit is 65 characters for note name and subclass, 100 for description and 2 for importance";return;
}

//katsotaan löytyykö jo samanniminen merkintä tietokannasta
$sql = $dbconn->prepare("SELECT * FROM notes WHERE name=? and user_id=?");
$sql->execute(array($notename,$userid));
if($sql->rowCount()!=0) {echo "Note with that name already exists!";return; }

//Ei löytynyt -> lisätään
$sql = $dbconn->prepare("INSERT INTO notes(class_id,user_id,subclass,name,description,importance) values(?,?,?,?,?,?)");
$sql->execute(array($classid,$userid,trim($_POST['subclass']),$notename,trim($_POST['description']),$importance));

?>
<html>
<h3> Note added! Redirecting back to <a href="index.php">main page</a></h3>
<meta http-equiv="refresh" content="2; URL=index.php">
</html>
