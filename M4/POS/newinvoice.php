<?php 
require_once("initialize.php");
$sql = "INSERT INTO invoice (`customer_id`)
		values (:customer_id)
		";
$sql_values = [
	':customer_id' => getGet('customer_id')
];

$statement = DB::prepare($sql);
DB::execute($statement, $sql_values);



header('Location: /pos/invoice_details.php?invoice_id=' . DB::lastInsertId() . '&customer_id=' . getGet('customer_id'));

?>