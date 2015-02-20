<?php 
require_once("initialize.php");

$sql = "
	SELECT 
		customer.first_name, 
		customer.last_name,
		invoice.id AS invoice_id,
		invoice_item.item_id,
		SUM(invoice_item.quantity * item.price) AS total
	FROM invoice_item 
	JOIN item ON (invoice_item.item_id = item.id)
	JOIN invoice ON (invoice_item.invoice_id = invoice.id)
	JOIN customer ON (customer.id = invoice.customer_id)
	GROUP BY invoice_id
	";

$stmt = DB::prepare($sql);
DB::execute($stmt);
$results = $stmt->fetchAll();

$list = '';
foreach($results as $row) {
	$list .= '<tr><td>' . $row['invoice_id'] . '</td><td>' . $row['first_name'] . ' ' . $row['last_name'] . '</td><td>$' 
			. $row['total'] . '<td><a href="invoice_details.php?invoice_id=' . $row['invoice_id'] . '">Details</a></td></tr>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>POS System</title>
</head>
<body>
	<a href="/pos/">Home</a>
	<h1>Invoices</h1>
	<table border=1><tr><th>Invoice #</th><th>Name</th><th>Total</th><th>Details</th></tr>
		<?php echo $list;?>
	</table>
</body>
</html>