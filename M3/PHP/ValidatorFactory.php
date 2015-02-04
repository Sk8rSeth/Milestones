<?php 

class ValidatorFactory {
	public function getValidator($type) {
		if ($type == 'email'){
			return new EmailValidator();
		} elseif ($type == 'phone') {
			return new PhoneValidator();
		} elseif ($type == 'name') {
			return new NameValidator();
		}elseif ($type == 'number') {
			return new NumberValidator();
		} elseif ($type == 'password') {
			return new PasswordValidator();
		}
	}
}