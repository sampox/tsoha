<?php
require_once("isloggedin.php");
?>
<html>
<head>
<link rel="stylesheet" href="style.css">

</head>
<body>
<div class=logout>
<a href="logout.php"><b> Log Out</b></a>
</div>
<div class=user>
<p> Logged in as: <b><?php echo ''.$_SESSION['user'].''; ?></b> </p>
</div>
<div class=linkz>
<a href="addnote.php" style="padding-right:20px;"> <b>Add a new note</b> </a>
<a href="modnote.php" style="padding-right:20px;"> <b> Modify a note </b> </a>
<a href="addclass.php" style="padding-right:20px;"> <b>Add a new class</b> </a>
<a href="delclass.php"> <b>Remove a class</b> </a>
</div>
<div class=notes>

<h2> <br /> Your notes ordered by importance: <br /><br /></h2>
<?php
include("dbconn.php");
include("select_ids.php");
$userid = guid($_SESSION['user']);
$sql = $dbconn->prepare("SELECT DISTINCT importance,classname,subclass,name,description from notes,classes where notes.user_id=? AND notes.class_id=classes.id ORDER BY importance DESC");
$sql->execute(array($userid));

echo "<table border='3' cellpadding='2' cellspacing='2' width='80%'>";
    echo "<tr>";
echo "<td> <b>Importance</b> </td>";
    echo "<td> <b>Class</b> </td>";
    echo  "<td> <b> Subclass</b> </td>";
    echo "<td> <b>Note name</b> </td>";
    echo "<td><b> Description</b> </td>";

    echo  "</tr>";

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


?>
</div>
</body>
</html>
