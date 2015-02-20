<?php 
require_once("initialize.php");
$id = getGet('customer_id');
$delete = '';

$sql = "
	SELECT *
	FROM customer
	WHERE id = :id
	";
$sql_values = [
	':id' => $id
];

$stmt = DB::prepare($sql);
DB::execute($stmt, $sql_values);
$results = $stmt->fetchAll();

$info = '';
$female = '';
$male = '';


foreach($results as $row) {
	if ($row['gender'] == 'male'){
		$male = ' selected';
	} else {
		$female = ' selected';
	}

	$info .= '<div>First Name:<input type="text" name="first_name" value="' . $row['first_name'] . '"></div>'  
			. '<div>Last Name:<input type="text" name="last_name" value="' . $row['last_name'] . '"></div>' 
			. '<div>Email:<input type="email" name="email" value="' . $row['email'] .  '"></div>'
			. '<div>Gender:<select name="gender"><option' . $male . '>Male</option><option' . $female . '>Female</option></select>';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>POS SYSTEM</title>
</head>
<body>
	<h1>Edit Customer</h1>
	<form action="ProcessEditCustomer.php" method="POST">
		<?php echo $info; ?>
		<input type="hidden" name="customer_id" value="<?php echo $id; ?>">
  		<div>
  			<button type="submit" value="Submit">Submit</button>
  			<a href="CustomerList.php">Cancel</a>
  		</div>
	</form>
	<h3><a href="deleteitems.php?cid=<?php echo $id; ?>">Delete Item</a></h3>
</body>
</html>