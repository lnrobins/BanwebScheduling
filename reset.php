<?php 
$db = new SQLITE3('updated_classes');
$del = "DELETE from schedule";									
$delete = $db->query($del);

header('Location: Home.php');
exit;
?>