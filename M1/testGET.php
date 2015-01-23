<?php 

	echo "hello GET<br>";
	//print_r($_GET);//dumps the array of variables given back in the URL query string
	$name = $_GET['name'];
	$age = $_GET['age'];

	$url = "/testGET.php?name=$name&age=$age";


 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<?php echo "Welcome $name, You are $age years old<br><br>" ?>
	<a href="<?php $url?>"></a>
	<!-- <a href="/testGet.php?name=Thomas&age=20">Here is Thomas</a> -->

 </body>
 </html>