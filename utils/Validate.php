<?php

require_once "Input.php";

class Validate
{
	protected static $errors=[];

	public static function getErrors()
	{
		return self::$errors;
	}

	protected static function addError($error)
	{
		return array_push(self::$errors, $error);
	}
}

?>