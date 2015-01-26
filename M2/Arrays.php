<?php 

$choices = [
	'1' => 'Windows',
	'2' => 'Mac OS X',
	'3' => 'Ubuntu',
	'4' => 'Tablet',
];

$msg = "Please Choose A Valid Product";
$urlID = '';
$opts = '';

if (isset($_GET['pID'])) {
	if (isset($_GET['quantity'])) {
		$urlID = $_GET['pID'];
		$quan = $_GET['quantity'];
	}
}

foreach ($choices as $pID => $pName) {
	$opts .= "<option value=\"$pID\">$pName</option>";
	if ($pID == $urlID) {
		$msg = "You Chose " . $quan . " " . $pName . " Device(s)!";	
	} 
}