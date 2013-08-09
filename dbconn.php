<?php
//CREATE A DB CONNECTION
try {
    $dbconn = new PDO("mysql:host=localhost;dbname=test", "root", "nakki");
} catch (PDOException $e) {
    die("ERROR: " . $e->getMessage());
}
$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbconn->exec("SET NAMES utf8");
?>
