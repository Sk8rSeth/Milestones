<?php 
require_once('initialize.php');

$sql = "
	UPDATE customer
	SET `first_name`= :first_name, `last_name`= :last_name, `email`= :email, `gender`= :gender
	WHERE customer.id = :customer_id
	";

$sql_values = [
	':first_name' => getPost('first_name'),
	':last_name' => getPost('last_name'),
	':email' => getPost('email'),
	':gender' => getPost('gender'),
	':customer_id' => getPost('customer_id')
];
$stmt = DB::prepare($sql);
DB::execute($stmt, $sql_values);

header('Location: /pos/customerlist.php');
exit;

?>
