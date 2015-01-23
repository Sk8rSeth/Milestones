<?php

$os = $_GET["chosen"];
if ($os == 1) {
	$choice = "Ubuntu";
} else if ($os == 2) {
	$choice = "Windows";
} else if ($os == 3) {
	$choice = "Mac OS X";
} else {
	$choice = "An Invalid Product";
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Products</title>
		<link rel="stylesheet" href="project.css">
	</head>

	<body>
		<?php include("header.php") ?>

		<h1><?php echo "You Chose $choice" ?>!</h1>

		<?php include("footer.php") ?>

	</body>
</html>