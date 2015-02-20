<?php 
require_once("initialize.php");

$invoice_id = getGet('invoice_id');

$sql = "
	SELECT *
	FROM invoice_item 
	JOIN item ON (invoice_item.item_id = item.id)
	WHERE invoice_item.invoice_id = :invoice_id
	";

$sql_values = [
	':invoice_id' => $invoice_id
];

$stmt = DB::prepare($sql);
DB::execute($stmt, $sql_values);
$results = $stmt->fetchAll();
$list = '';
$opts = '';

foreach($results as $row) {
	$list .= '<tr><td>' . $row['quantity'] . '</td><td>' . $row['name'] . '</td><td>$' 
			. $row['price'] . '</td><td>' . ($row['quantity'] * $row['price']) . '</td><td><a href="deleteInvoice_Item.php?invoice_item=' 
			. $row['Invoice_Item_id'] . '&invoice_id=' . $row['invoice_id'] . '">Remove</a></td></tr>';
}

$href = '';
$allItems = new ItemModel();
$items = $allItems->fetchAll();
foreach($items as $item) {
	$opts .= '<option value="' . $item['id'] . '">' . $item['name'] . '</option>'; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>POS SYSTEM</title>
</head>
<body>
	<a href="/pos/">Home</a>
	<h1>Invoice No. <?php echo $invoice_id; ?></h1>
	<table border=1>
		<th>Qty.</th><th>Item Name</th><th>Cost</th><th>Subtotal</th>
		<?php echo $list; ?>
	</table>
	
	<form action="processNewInvoice_Item.php" method="POST">
		<div><span>Qty.</span>
		<input type="number" name="quantity" value="1" min="1" required>
		<span>Item:</span>
		<select name="item_id">
			<?php echo $opts; ?>
		</select></div>
		<button>Add</button>
		<input type="hidden" name="invoice_id" value="<?php echo $invoice_id; ?>">
	</form>
	<a href="/pos/invoices.php">Back</a>
	
</body>
</html>