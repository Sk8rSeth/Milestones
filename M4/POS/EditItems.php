<?php 
require_once("initialize.php");
$id = getGet('itemid');
$delete = '';

$sql = "
	SELECT *
	FROM item
	WHERE id = $id
	";

$stmt = DB::prepare($sql);
DB::execute($stmt);
$results = $stmt->fetchAll();

$info = '';


foreach($results as $row) {
	$info .= '<div>Item Name:<input type="text" name="name" value="' . $row['name'] . '"></div>'  
			. '<div>Price:<input type="number" name="price" value="' . $row['price'] . '"></div>'; 
}

// $delete = '<h3><a href="deleteitems.php?cid=' . $id . '">Delete Item</a></h3>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>POS SYSTEM</title>
</head>
<body>
	<h1>Edit Item</h1>
	<form action="ProcessEditItem.php" method="POST">
  		<input type="hidden" name="itemid" value="<?php echo $id; ?>">
		<?php echo $info; ?>
  		<div>
  			<button type="submit" value="Submit">Submit</button>
  			<a href="itemInventory.php">Cancel</a>
  		</div>
	</form>
	<h3><a href="deleteitems.php?cid=<?php echo $id; ?>">Delete Item</a></h3>
</body>
</html>