<?php 
require_once('initialize.php');
$id = $_GET['itemid'];

$sql = "
	DELETE FROM item
	WHERE item.id = $id
	";
$stmt = DB::prepare($sql);
DB::execute($stmt);

header('Location: /pos/iteminventory.php');
exit;
?>