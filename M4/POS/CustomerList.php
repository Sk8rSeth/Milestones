<?php
require_once("initialize.php");

$sql = "
	SELECT *
	FROM customer
	";

$stmt = DB::prepare($sql);
DB::execute($stmt);
$results = $stmt->fetchAll();


$header = '';
$list = '';
foreach($results as $row) {
	$list .= '<tr><td>' . $row['first_name'] . ' ' . $row['last_name'] 
			. '</td><td><a href="NewInvoice.php?customer_id=' . $row['id'] . '">New Invoice</a></td><td><a href="EditCustomer.php?customer_id=' . $row['id'] 
			. '">Edit</a></td><td><a href="deleteCustomer.php?customer_id=' . $row['id'] . '">Delete</a></td></tr>';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>pos System</title>
</head>
<body>
	<a href="/pos/">Home</a>
	<h1>Customers</h1>
	<table border=1><tr><th>Name</th></tr>
		<?php echo $list; ?>
	</table>
	<h4><a href="AddNewCustomer.php">Add New Customer</a></h4>
</body>
</html>