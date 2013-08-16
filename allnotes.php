/*<?php
header('Content-type: text/html; charset=utf-8');
require_once("isloggedin.php");

function getNotes($user) {
include("dbconn.php");
include("select_ids.php");
$userid = guid($user);
$sql = $dbconn->prepare("SELECT DISTINCT importance,classname AS class,subclass,name,description from notes,classes where notes.user_id=? AND notes.class_id=classes.id ORDER BY importance DESC");
$sql->execute(array($userid));

echo "<table>";
while ($row = $sql->fetch()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row["importance"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["class"]) . "</td>";
    echo  "<td>" . htmlspecialchars($row["subclass"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["description"]) . "</td>";

    echo  "</tr>";
}
 echo= "</table>";
}

?>

*/
