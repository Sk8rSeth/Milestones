<?php 

$choices = [
	'1' => 'Windows',
	'2' => 'Mac OS X',
	'3' => 'Ubuntu',
	'4' => 'Tablet'
];

$msg = '';
$opts = '';
$urlID = '';


if (isset($_GET['pID'])) {
	$urlID = $_GET['pID'];
}
foreach ($choices as $pID => $pName) {
	$opts .= "<option value=\"$pID\">$pName</option>";
	if ($pID == $urlID){
	$msg = "You Chose " . $_GET['quantity'] . " " . $pName . " Device(s)!";	
	} else{

	}
}

 

