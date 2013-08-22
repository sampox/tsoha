<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<div class="succ">
<?php
header('Content-type: text/html; charset=utf-8');

include("dbconn.php"); //yhdistä mysql

$sql= $dbconn->prepare("SELECT id,username FROM members WHERE username=? and password=md5(?)");
$sql->execute(array($_POST['myusername'],$_POST['mypassword']));

$result=$sql->fetch();

// laskee taulun rivit
$count=$sql->rowCount();

// Jos $myusername ja $mypassword oikein, taulussa 1 rivi
if($count==1){

// Laitetaan $myusername, $mypassword sessioon and ohjataan  login_success.php
session_start();
$_SESSION['user']=htmlspecialchars($result["username"]);
$_SESSION['userid']=htmlspecialchars($result["id"]);
header("location:login_success.php");
}
else {
echo "<br />Invalid/unrecognized username or password, redirecting back to <a href='login.php'>login page</a> in 2 seconds";
}
 
?>
</div>
<meta http-equiv="refresh" content="2; URL=login.php">
</html>


