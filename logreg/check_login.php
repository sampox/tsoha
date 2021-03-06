<html>
<head>
<link rel="stylesheet" href="../style.css">
</head>
<div class="succ">
<?php
header('Content-type: text/html; charset=utf-8');

include("../db_conn.php"); //yhdistä mysql
include("../sanity_checks.php"); //syötteen järkevyyden tarkastelu
$username=trim($_POST['myusername']);
$password=$_POST['mypassword'];

//Ovatko syötteet oikean mittaisia
$string_lengths_ok = FALSE;
if(string_length_check($username,65) && string_length_check($password,65)) { $string_lengths_ok = TRUE; }

//CHECK USER INPUT
if($password == NULL || $password=='' || $username== NULL || $username=='') { echo "Must input the password and the username!"; return; }
elseif(!($string_lengths_ok)) { echo "error, username and password max length is 65 characters"; return; }

//Löytyykö käyttäjä databeissistä
$sql= $dbconn->prepare("SELECT id,username FROM members WHERE username=? and password=md5(?)");
$sql->execute(array($username,$password));

$result=$sql->fetch();

// laskee taulun rivit
$count=$sql->rowCount();

// Jos $myusername ja $mypassword oikein, taulussa 1 rivi
if($count==1){

// Laitetaan $myusername, $mypassword sessioon and ohjataan  login_success.php
session_start();
$_SESSION['user']=htmlspecialchars($result["username"]);
$_SESSION['userid']=htmlspecialchars($result["id"]);
header("location:loginsuccess.php");
}
else {
echo "<br />Invalid/unrecognized username or password, redirecting back to <a href='login.php'>login page</a> in 2 seconds";
}
 
?>
</div>
<meta http-equiv="refresh" content="2; URL=login.php">
</html>


