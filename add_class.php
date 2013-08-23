<?php
header('Content-type: text/html; charset=utf-8');

require_once("logreg/is_logged_in.php");

include("dbconn.php");
$userid = $_SESSION['userid'];
$classname=trim($_POST['classname']);
//CHECK INPUT
if($classname == NULL || $classname=='') { echo "Must name the class!"; return; }
//END CHECK
//katotaan löytyykö luokka jo databeissistä
   $sqll = $dbconn->prepare("SELECT * FROM classes WHERE classname=? AND user_id=?");
    $sqll->execute(array($classname,$userid));
if($sqll->rowCount()!=0) {
      echo "<br />Class exists, redirecting back to <a href='addclass.php'>previous page</a> in 2 seconds";
    }

//ei löytynyt -> lisätään
else {
$sql=$dbconn->prepare("insert into classes (user_id,classname) values(?, ?)");
$sql->execute(array($userid,$classname));
echo "<h3><br /> Class added successfully, redirecting back to <a href='addclass.php'>previous page</a> in 2 seconds</h3>";
}
?>
<html>
<meta http-equiv="refresh" content="2; URL=addclass.php">
</html>
