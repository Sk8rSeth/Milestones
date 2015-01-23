<?php
include_once("Arrays.php");

if ($_GET['quantity'] > 7) {
	if ($urlID == 2) {
		$msg = "You Can't Choose more than 7 Macs";
	}
}


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Products</title>
		<link rel="stylesheet" href="http://necolas.github.io/normalize.css/3.0.2/normalize.css">
		<link href='http://fonts.googleapis.com/css?family=Lato:300|Lobster' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="project.css">
	</head>

	<body>

		<?php include("header.php") ?>

		<main>
			<h1><?php echo $msg;?></h1>
		</main>

		<?php include("footer.php") ?>

	</body>
</html>