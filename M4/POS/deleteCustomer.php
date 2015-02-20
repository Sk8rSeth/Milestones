<?php 
require_once('initialize.php');

$id = getGet('customer_id');

$sql = "
	DELETE FROM customer
	WHERE customer.id = $id
	";
$stmt = DB::prepare($sql);
DB::execute($stmt);

header('Location: /pos/customerlist.php');
exit;

?>