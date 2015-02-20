<?php 
require_once('initialize.php');

$invoice_item = getGet('invoice_item');
$invoice_id = getGet('invoice_id');

$sql = "
	DELETE FROM invoice_item
	WHERE invoice_item.Invoice_Item_id = :invoice_item
	";
$sql_values = [
	':invoice_item' => $invoice_item
];

$stmt = DB::prepare($sql);
DB::execute($stmt, $sql_values);

header('Location: /pos/invoice_details.php?invoice_id=' . $invoice_id);
exit;