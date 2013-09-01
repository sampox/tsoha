
<?php
header('Content-type: text/html; charset=utf-8');
require_once("logreg/is_logged_in.php"); //Onko käyttäjä kirjautunut

include("db_conn.php"); //DB yhteys
include("sanity_checks.php"); //Tarkistetuksia syötteiden järkevyydestä

//trim() poistaa tyhjät välit muuttujien edestä ja jälkeen.
$noteid =trim($_POST['notez']);
$classid = trim($_POST['clas']);
$importance = trim($_POST['importance']);
$subclass = trim($_POST['subclass']);
$description = trim($_POST['description']);

//Kuuluuko merkintä ja luokka käyttäjälle
$note_sanity=note_is_users($noteid,$_SESSION['userid']); 
$class_sanity=class_is_users($classid,$_SESSION['userid']);

//Ovatko syötteet sopivan mittaisia
$string_lengths_ok=FALSE;
if(string_length_check($subclass,65) && string_length_check($description,100) && string_length_check($importance,2)) { 
$string_lengths_ok=TRUE; }

//Tarkistetaan ovatko käyttäjän syötteet käyttökelpoisia
if($classid == NULL || $classid=='' || !($class_sanity)) { echo "The note must have a class!"; return; }
else if($noteid == NULL || $noteid=='' || !($note_sanity)) {echo "Must choose a note!"; return; }
else if($importance != NULL || $importance!='') {
        if($importance<0 || $importance>99) {echo "Importance must be between 0 and 99";return; }}
else if(!$string_lengths_ok) {
	echo "Too long input into field(s). The limit is 65 characters for subclass, 100 for description and 2 for importance";return;
}

//Jos käyttäjä haluaa muokata merkintää
if (isset($_POST['modbutton'])) {
$sql = $dbconn->prepare("UPDATE notes SET class_id=?,subclass=IF(? = '', subclass, ?),description=IF(? = '', description, ?),importance=IF(?='' ,importance, ?) WHERE id=?");
$sql->execute(array($classid,$subclass,$subclass, $description,$description, $importance,$importance,$noteid));
}
//Jos käyttäjä haluaa poistaa merkinnän 
else if (isset($_POST['delbutton'])) {
$sql = $dbconn->prepare("DELETE FROM notes WHERE id = ?");
$sql->execute(array($noteid));
}
else {}
?>
<html>
<h3> Note modified! Redirecting back to <a href="index.php">main page</a> </h3>
<meta http-equiv="refresh" content="2; URL=index.php">
</html>

