<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>POS SYSTEM</title>
</head>
<body>
	<a href="/pos/">Home</a>
	<h1>Add New Customer</h1>
	<form action="processNewCustomer.php" method="POST">
		<div>First Name:
			<input type="text" name="first_name">
		</div>
		<div>Last Name:
			<input type="text" name="last_name">
		</div>
		<div>Email:
			<input type="email" name="email">
		</div>
		<div>Gender:
			<select name="Gender">
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>
		</div>
		<div>
			<button type="submit" value="Submit">Create</button>
  			<button type="reset" value="Reset">Clear</button>
  		</div>
	</form>
</body>
</html>