<?php 
require_once("Validator.php");
require_once("EmailValidator.php");
require_once("NameValidator.php");
require_once("PhoneValidator.php");
require_once("PasswordValidator.php");

$fields = [
	[
		'name' => 'Email1', 
		'type' => 'email',
		'error' => '',
		'isValid' => '',
		'value' => '',
		'label' => 'Email',

	],
	[
		'name' => 'Name1', 
		'type' => 'name',
		'error' => '',
		'isValid' => '',
		'value' => '',
		'label' => 'Name',

	],
	[
		'name' => 'Pass1', 
		'type' => 'password',
		'error' => '',
		'isValid' => '',
		'value' => '',
		'label' => 'Password',
	],
	[
		'name' => 'Phone1', 
		'type' => 'phone',
		'error' => '',
		'isValid' => '',
		'value' => '',
		'label' => 'Phone #',
	]
];

function checkRequired($value) {
	$rf = new Validator();
	return $rf->isRequired($value);
	// return $required->isRequired($value);
}

function validate($type, $value) {
	$vf = new ValidatorFactory();
	$validator = $vf->getValidator($type);
	return $validator->isValid($value);
}

//===================================================
//================ Validation Mode ==================
//===================================================

$welcomeMsg = '';
$html_inputs = [];
$msg = '';
$cssTrue = '';
$checkReq = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	foreach($fields as $idx => $fieldAttributes) {
		$name = $fieldAttributes['name'];
		if (isset($_POST[$name])) {
			$value = $_POST[$name];
			$fieldAttributes['value'] = $value;
			$checkReq = checkRequired($value);
			if ($checkReq) {
				$fieldAttributes['isValid'] = validate($fieldAttributes['type'], $value);
				if ($fieldAttributes['isValid'] == 1){
					$msg = "Valid";
					$cssTrue = 'valid';
				} elseif ($fieldAttributes['isValid'] == 0){
					$msg = "Invalid Entry";
					$cssTrue = 'invalid';
				} else {
					$msg = "Unknown Error";
				}
			} else {
				$msg = $fieldAttributes['label'] . " Is A Required Field";
				$cssTrue = 'invalid';
			}
		}
		$html = $fieldAttributes['label'] . ': <input type="text" name="' . $fieldAttributes['name'] . 
				'" ' . 'value="' . $fieldAttributes['value'] . '">' . "<span class=\"$cssTrue\"> " .  $msg . " </span>";
		$html_inputs[] = $html;
	}

//===================================================
//=============== Construction Mode =================
//===================================================

} else {
	$welcomeMsg = "Welcome! Please FIll The Form.";
	foreach ($fields as $fieldAttributes) {
		$html = $fieldAttributes['label'] . ': <input type="text" name="' . $fieldAttributes['name'] . '">';
		$html_inputs[] = $html;
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Site</title>
	<style>
		.valid {
			color: #fff;
			background-color: green;
			border: 1px dashed green;
		}

		.invalid {
			color: #fff;
			background-color: red;
			border: 1px solid red;
		}
	</style>
</head>
<body>

	<?php echo $welcomeMsg, '<br>'; ?>

	<form action="" method="POST">
		<?php echo implode('<br>',$html_inputs), '<br>'; ?>
		<button>Try It Out</button>
	</form>

</body>
</html>