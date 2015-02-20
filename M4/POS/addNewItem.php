<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>POS SYSTEM</title>
</head>
<body>
	<a href="/pos/">Home</a>
	<h1>Add New Item</h1>
	<form action="processNewItem.php" method="POST">
		<div>Item Name:
			<input type="text" name="item_name">
		</div>
		<div>Price:
			<input type="text" name="price">
		</div>
		<div>
			<button type="submit" value="Submit">Create</button>
  			<button type="reset" value="Reset">Clear</button>
  		</div>
	</form>
</body>
</html>