<?php
require('initialize.php');

if (isset($_POST)){
	$sql = "INSERT INTO customer (`id`, `first_name`, `last_name`, `email`, `gender`) 
			VALUES (NULL, :first_name, :last_name, :email, :gender)";

	$sql_values = [
		':first_name' => getPost('first_name'),
		':last_name' => getPost('last_name'),
		':email' => getPost('email'),
		':gender' => getPost('gender')
	];

	$statement = DB::prepare($sql);

	DB::execute($statement, $sql_values);

	header('Location: /pos/customerlist.php');
	exit();
}