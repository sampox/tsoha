<?php
header('Content-type: text/html; charset=utf-8');
session_start(); //Voimme käyttää $_SESSION muuttujia tämän jälkeen

//Tarkistetaan onko käyttäjä kirjautunut; eli ovat $_SESSION muuttujat käytössä
if (!(isset($_SESSION['user']) && isset($_SESSION['userid']) && $_SESSION['user'] != '' && $_SESSION['user'] != NULL)) {

//Jos eivät ole, ohjataan kirjautumissivulle
header ("Location: logreg/login.php");

}
?>
