<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<div class="succ">
<?php
header('Content-type: text/html; charset=utf-8');
$regname=trim($_POST['regname']);
if($regname && $_POST['regpass'] && $_POST['regpass2'] )
{
if($_POST['regpass']==$_POST['regpass2'])
{

include("dbconn.php");

//katotaan löytyykö username jo databeissistä
    $sqll = $dbconn->prepare("SELECT * FROM members WHERE username = ?");
    $sqll->execute(array($regname));
if($sqll->rowCount()!=0) {
      echo "<br />Username exists, redirecting back to <a href='register.php'>registration page</a> in 5 seconds";
    }

//ei löytynyt -> rekisteröidään käyttäjä
else {
$sql=$dbconn->prepare("insert into members (username,password) values(?,md5(?))");
$sql->execute(array($regname,$_POST['regpass']));
echo "<h4><br />you have registered successfully with the username: <font color='red'>".htmlspecialchars($regname)."</font></h4>";

echo "<a href='login.php'>go to login page</a>";
return;
}}
else echo "<br />passwords do not match, redirecting back to <a href='register.php'>registration page</a> in 2 seconds";
}
else echo "<br />invalid data, redirecting back to <a href='register.php'>registration page</a> in 2 seconds";
?>
</div>
<meta http-equiv="refresh" content="2; URL=register.php">
</html>
