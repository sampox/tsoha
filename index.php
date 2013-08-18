<?php include("menu.php"); ?>
<?php if($_GET['order']==NULL) {include("order_by.php"); getNotes('importance DESC'); }
else if($_GET['order']==1) {include("order_by.php"); getNotes('classname');}
else if($_GET['order']==2) {include("order_by.php"); getNotes('subclass');}	
else if($_GET['order']==3) {include("order_by.php"); getNotes('name');}
else if($_GET['order']==4) {include("order_by.php"); getNotes('description');}
?> 
</body>
</html>
