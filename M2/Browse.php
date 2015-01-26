<?php
require_once("Arrays.php");

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Browse</title>
		<link rel="stylesheet" href="http://necolas.github.io/normalize.css/3.0.2/normalize.css">
		<link rel="stylesheet" href="project.css">
		<link href='http://fonts.googleapis.com/css?family=Lato:300|Lobster' rel='stylesheet' type='text/css'>
	</head>

	<body>

		<?php include("header.php") ?>

		<main>
			<h1>Browse Products</h1>
			<form action="Products.php">
				<span>Product:</span>
				<select name="pID">
					<?php echo $opts; ?>
				</select>
				<span>Quantity:</span>
				<input type="number" min="0"; name="quantity" required>
				<button type="submit">Add To Cart</button>
			</form>
		</main>

		<?php include('footer.php') ?>

	</body>
</html>