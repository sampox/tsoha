<?php
require_once("isloggedin.php");

include("dbconn.php");
include("select_ids.php");
$userid = guid($_POST['userna']);
//katotaan löytyykö luokka jo databeissistä
   $sqll = $dbconn->prepare("SELECT * FROM classes WHERE classname=? AND user_id=?");
    $sqll->execute(array($_POST['classname'],$userid));
if($sqll->rowCount()!=0) {
      echo "<br />Class exists, redirecting back to <a href='addclass.php'>previous page</a> in 2 seconds";
    }

//ei löytynyt -> lisätään
else {
$sql=$dbconn->prepare("insert into classes (user_id,classname) values(?, ?)");
$sql->execute(array($userid,$_POST['classname']));
echo "<h3><br /> Class added successfully, redirecting back to <a href='addclass.php'>previous page</a> in 2 seconds</h3>";
}
?>
<html>
<meta http-equiv="refresh" content="2; URL=addclass.php">
</html>
