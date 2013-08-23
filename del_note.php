<?php
header('Content-type: text/html; charset=utf-8');
require_once("logreg/is_logged_in.php");

include("dbconn.php");
include("select_ids.php");
$noteid =$_POST['notez'];

$sql = $dbconn->prepare("DELETE FROM notes WHERE id = ?");
$sql->execute(array($noteid));

?>
<html>
<h3> Note deleted! Redirecting back to <a href="index.php">main page</a> </h3>
<meta http-equiv="refresh" content="2; URL=index.php">
</html>

