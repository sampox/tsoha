<?php
header('Content-type: text/html; charset=utf-8');
//Luodaan DB yhteys PDO:lla
try {
    $dbconn = new PDO("mysql:host=localhost;dbname=test", "root", "nakki"); //syötteinä Hostname, tietokannan nimi, käyttätunnus ja salasana
} catch (PDOException $e) {
    die("ERROR: " . $e->getMessage());
}
$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbconn->exec("SET NAMES utf8");
?>
