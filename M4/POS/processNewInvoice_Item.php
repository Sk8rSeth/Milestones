<?php 
require_once('initialize.php');

$sql = 'SELECT * 
		FROM invoice_item
		WHERE item_id = :item_id
		AND invoice_id = :invoice_id
		';
$sql_values = [
	':item_id' => getPost('item_id'),
	':invoice_id' => getPost('invoice_id')
];
$stmt = DB::prepare($sql);
$statement = DB::execute($stmt, $sql_values);

$results = $statement->fetch();
if ($results) {
	echo 'update  . . . ';
	$previousQTY = $results['quantity'];
	$sql = 'UPDATE invoice_item  
			SET quantity=:quantity
			WHERE item_id = :item_id
			AND invoice_id = :invoice_id
			';

	$sql_values = [
		':invoice_id' => getPost('invoice_id'),
		':item_id' => getPost('item_id'),
		':quantity' => (getPost('quantity') + $previousQTY)
	];


	$stmt = DB::prepare($sql);

	DB::execute($stmt, $sql_values);
} else {
	echo 'insert new . . . . ';
	$sql = 'INSERT INTO invoice_item ( `invoice_id`, `item_id`, `quantity`) 
			VALUES ( :invoice_id, :item_id, :quantity)';

	$sql_values = [
		':invoice_id' => getPost('invoice_id'),
		':item_id' => getPost('item_id'),
		':quantity' => getPost('quantity')
	];


	$stmt = DB::prepare($sql);

	DB::execute($stmt, $sql_values);
}
header('Location: /pos/invoice_details.php?invoice_id=' . getPost('invoice_id'));
exit;


?>