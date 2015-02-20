<?php 
require_once("initialize.php");

$allItems = new ItemModel();
$items = $allItems->fetchAll();


$list = '';
foreach($items as $row) {
	$list .= '<tr><td>' . $row['name'] . '</td><td>' . $row['price'] . '</td><td><a href="EditItems.php?itemid=' 
		. $row['id'] . '">Edit</a></td><td><a href="deleteItems.php?itemid=' . $row['id'] . '">Delete</a></td></tr>';
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
	<h1>Items</h1>
	<table border=1><tr><th>Item</th><th>Price</th></tr>
		<?php echo $list; ?>
	</table>
	<h4><a href="addNewItem.php">Add New Item</a></h4>
</body>
</html>