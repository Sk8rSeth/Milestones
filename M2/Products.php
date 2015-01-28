<?php
require_once("Arrays.php");

//variable declarations
$msg = "Please Choose A Valid Product";
$urlID = $_GET['pID'];
$quan = $_GET['quantity'];

// --LOGIC-- if the key exists, set $msg different, and choose less than 7 macs
if (array_key_exists($urlID, $choices)) {
	if ($quan > 0) {
		$msg = "You Chose " . $quan . " " . $choices[$urlID] . " Device(s)!";	
	}
	if ($quan > 7) {
		if ($urlID == 1) {
			$msg = "You Can't Choose more than 7 Macs";
		} 
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