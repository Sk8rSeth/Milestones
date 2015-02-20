<?php 

function getPost($name) {
	return (isset($_POST[$name]) && $_POST[$name]) ? $_POST[$name] : '';
}

function getGet($name) {
	return (isset($_GET[$name]) && $_GET[$name]) ? $_GET[$name] : '';
}