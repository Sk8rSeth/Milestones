<?php 
require_once("Validator.php");

$field = [
	[
		'name' => 'Email1', 
		'type' => 'email',
		'error' => '',
		'isValid' => 'butt',
		'value' => '',
		'label' => 'Email',

	],
	[
		'name' => 'Name1', 
		'type' => 'name',
		'error' => '',
		'label' => 'Name',
		'value' => '',

	],
	[
		'name' => 'Pass1', 
		'type' => 'password',
		'error' => '',
		'label' => 'Password',
		'value' => '',
	],
	[
		'name' => 'Phone1', 
		'type' => 'phone',
		'error' => '',
		'label' => 'Phone #',
		'value' => '',
	]
];
function validate($type, $value) {
	$vf = new ValidatorFactory();
	$validator = $vf->getValidator($type);
	return $validator->isValid($value);
}

$html_inputs = [];
$msg = '';

foreach($field as $idx => $fieldAttributes) {
	$name = $fieldAttributes['name'];
	if (isset($_GET[$name])) {
		$value = $_GET[$name];
		$fieldAttributes['value'] = $value;
		$fieldAttributes['isValid'] = validate($fieldAttributes['type'], $value);
		if ($fieldAttributes['isValid'] == 1){
			$msg = "valid";
		} elseif ($fieldAttributes['isValid'] == 0){
			$msg = "invalid";
		} else {
			$msg = "error";
		}
	}
	$html = $fieldAttributes['label'] . ': <input type="text" name="' . $fieldAttributes['name'] . 
			'" ' . 'value="' . $fieldAttributes['value'] . '">' . $msg;
	$html_inputs[] = $html;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<form action="" method="GET">

		<?php echo implode('<br>',$html_inputs), "<br>"; ?>
		<button>Try It Out</button>
	</form>
</body>
</html>