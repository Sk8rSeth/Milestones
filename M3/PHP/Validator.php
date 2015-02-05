<?php
require_once('ValidatorFactory.php');
class Validator extends ValidatorFactory {
	protected $regex = '';
	public function isRequired($value){
		if (strlen($value) > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function isValid($input) {
		if (strlen($this->regex) == 0) {
			throw new Exception('called validator instead of subclass');
		}
		if (preg_match($this->regex, $input)) {
			return '1';
		} else {
			return '0';
		}
	}
}