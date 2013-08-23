<?php
header('Content-type: text/html; charset=utf-8');
session_start();

if (!(isset($_SESSION['user']) && $_SESSION['user'] != '' && $_SESSION['user'] != NULL)) {

header ("Location: logreg/login.php");

}
?>
