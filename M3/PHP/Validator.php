<?php
require_once('ValidatorFactory.php');

class Validator extends ValidatorFactory {
	protected $regex = '';
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

class EmailValidator extends Validator {
	protected $regex = '/[a-zA-Z0-9]+/';
}

class PhoneValidator extends Validator {
	protected $regex = '/\d{3}[\-]\d{3}[\-]\d{4}/';

}

class PasswordValidator extends Validator {
	protected $regex = '/[a-zA-Z0-9]+/';

}

class NameValidator extends Validator {
	protected $regex = '/[a-zA-Z0-9]+/';

}

// class NumberValidator extends Validator {
// 	protected $regex = '/^\d+$/';

// }
