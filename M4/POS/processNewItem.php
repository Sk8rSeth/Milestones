<?php
require('initialize.php');

$sql = "INSERT INTO item (`name`, `price`) 
		VALUES (:item_name, :price)";

$sql_values = [
	':item_name' => getPost('item_name'),
	':price' => getPost('price')
];

$statement = DB::prepare($sql);

DB::execute($statement, $sql_values);

header('Location: /pos/itemInventory.php');
exit();