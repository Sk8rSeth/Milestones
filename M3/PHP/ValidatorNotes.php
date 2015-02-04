<?php

if ($type == 'email') {
	return new EmailValidator();
} else


//==================================================





$fields = [
	'email1' => [
		'type' => 'email',
		'error' => 'email must contain @',
		'isValid' => false,
		'value' => ''
	],
	'num1' => [
		'type' => 'number',
		'error' => 'must contain only digits',
		'isValid' => false,
		'value' => ''
	]

];

$vf = new ValidatorFactory();

// $html_inputs = [];
foreach ($fields as $name => $fieldAttributes) {
	if(isset($_GET[$name])) {
		$value = $_GET[$name];
		$validator = $vf->getValidator($fieldAttributes['type']);
		$fieldAttributes['value'] = $value;
		$fieldAttributes['isValid'] = $validator->isValid($value));
	} else {
		$fieldAttributes['error'] = 'no input';
	}
}

<input type="text" name="email1">
<input type="text" name="num1">










//=====================================
$e = $inputs['email1']['error']; // each set of [] takes you one step deeper into the array tree
//^^^ same thing as vvvvvvv
$input_type = $inputs['email1'];
$e = $input_type['error'];
//=====================================