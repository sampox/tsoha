<?php
require_once("logreg/is_logged_in.php"); //Onko käyttäjä kirjautunut

function getNotes($order) {
echo "<div class=notes>";
echo "<br /><h2>Notes ordered by $order:</h2><br />";

include("orderby.php"); //Valikko jossa listataan järjestykset
include("db_conn.php"); //DB yhteys
$userid = $_SESSION['userid'];

// !!!HUOM!!! PDO:n lauseissa ei voi käyttää '?' ORDER BY-kanssa (haulla tulee vääriä tuloksia), ja muuttuja $order ei tule käyttäjän syötteenä vaan suoraan koodista, joten $order php muuttujan käyttö tässä SELECT lauseessa on turvallista.
$sql = $dbconn->prepare("SELECT DISTINCT importance,classname,subclass,name,description from notes,classes where notes.user_id=? AND notes.class_id=classes.id ORDER BY $order");
$sql->execute(array($userid));

//Luodaan html taulukko johon merkinnät laitetaan haetussa järjestyksessä
echo "<table border='3' cellpadding='2' cellspacing='0'>";
    echo "<tr>";
echo "<td> <b>Importance</b> </td>";
    echo "<td> <b>Class</b> </td>";
    echo  "<td> <b> Subclass</b> </td>";
    echo "<td> <b>Note name</b> </td>";
    echo "<td><b> Description</b> </td>";

    echo  "</tr>";


//Haetaan merkinnät html taulukkoon rivi kerrallaan
while ($row = $sql->fetch()) {
    echo "<tr>";
echo "<td>" . htmlspecialchars($row["importance"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["classname"]) . "</td>";
    echo  "<td>" . htmlspecialchars($row["subclass"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["description"]) . "</td>";

    echo  "</tr>";
}
 echo "</table>";
echo "</div>";
}
?>

