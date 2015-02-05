<?php 

class EmailValidator extends Validator {
	protected $regex = '/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/';
}
