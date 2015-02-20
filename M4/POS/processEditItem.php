<?php
require('initialize.php');
$id = $_POST['itemid'];

$sql = "UPDATE item
		SET `price` = :price, `name` = :name
		WHERE item.id = $id
		";

$sql_values = [
	':price' => $_POST['price'],
	':name' => $_POST['name']
];

$statement = DB::prepare($sql);

DB::execute($statement, $sql_values);

header('Location: /pos/itemInventory.php');
exit();